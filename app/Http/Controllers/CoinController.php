<?php

namespace App\Http\Controllers;

use App\Models\CoinTransaction;
use App\Models\Manga;
use App\Models\MangaPurchase;
use App\Models\UserCoinBalance;
use App\Providers\MidtransServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Snap;

class CoinController extends Controller
{
    const COIN_PRICE = 20000 / 90; // Rp 20.000 per 90 koin
    const MANGA_UNLOCK_COST = 90; // 90 koin per manga

    public function showTopUpPage()
    {
        $user = Auth::user();
        $currentBalance = UserCoinBalance::firstOrCreate(
            ['user_id' => $user->id],
            ['total_coins' => 0]
        );

        return view('topup', [
            'title' => 'MangaLo! | Top Up',
            'currentBalance' => $currentBalance->total_coins
        ]);
    }

    public function processTopUp(Request $request)
    {
        $request->validate([
            'coin_amount' => 'required|integer|min:90'
        ]);

        $user = Auth::user();
        $coinAmount = $request->coin_amount;
        $totalPrice = $coinAmount * self::COIN_PRICE;

        // Simulasi integrasi payment gateway
        $transaction = CoinTransaction::create([
            'user_id' => $user->id,
            'amount' => $coinAmount,
            'type' => 'topup',
            'price' => $totalPrice,
            'payment_method' => $request->payment_method,
            'status' => 'pending' // Anda perlu menggantinya dengan logika pembayaran sebenarnya
        ]);

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.serveyKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $transaction->id,
                'gross_amount' => $totalPrice,
            ),
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ],
            'callbacks' => [
                'finish' => url('/payment/success') // URL setelah selesai pembayaran
            ],
        );

        $snapToken = Snap::getSnapToken($params);
        return view('checkout', [
            'title' => 'MangaLo | Checkout',
            'coinAmount' => $coinAmount,
            'totalPrice' => $totalPrice,
            'midtransToken' => $snapToken
        ]);
    }

    public function unlockManga(Manga $manga)
    {
        $user = Auth::user();
        $userBalance = UserCoinBalance::firstOrCreate(
            ['user_id' => $user->id],
            ['total_coins' => 0]
        );

        if ($userBalance->deductCoins(self::MANGA_UNLOCK_COST)) {
            MangaPurchase::create([
                'user_id' => $user->id,
                'manga_id' => $manga->id,
                'coins_spent' => self::MANGA_UNLOCK_COST
            ]);

            return redirect()->route('manga', $manga->id);
        }

        return redirect()->back()->with('error', 'Coin tidak mencukupi!');
    }

    public function successPayment(Request $request)
    {
        $transaction = CoinTransaction::where('id', $request->order_id)->first();

        // Perbarui status transaksi menjadi 'success'
        $transaction->status = 'success';
        $transaction->save();

        // Perbarui saldo koin pengguna
        $userBalance = UserCoinBalance::firstOrCreate(
            ['user_id' => $transaction->user_id],
            ['total_coins' => 0]
        );
        $userBalance->addCoins($transaction->amount);

        // Flash pesan sukses ke sesi
        session()->flash('success', 'Pembayaran berhasil! Saldo koin Anda telah bertambah.');

        // Kembalikan tampilan 'topup' atau 'success'
        return view('topup', [
            'title' => 'MangaLo | Pembayaran Berhasil'
        ]);
    }
}
