@extends('layout.app')

@section('content')
    <div class="payment-container w-[60%] bg-white mx-auto my-10 font-fira">
        <div class="justify-center text-center items-center justify-items-center py-10">
            <i class="fa-solid fa-coins text-6xl text-orange-500"></i>
            <h4 class="text-2xl">Pembayaran Coin</h4>
            <div class="my-4">
                <p>Jumlah Coin: <strong>{{ $coinAmount }} Coin</strong></p>
                <p>Total Pembayaran: <strong>Rp {{ number_format($totalPrice, 0, ',', '.') }}</strong></p>
            </div>
            <button class="bg-orange-500 py-2 px-5 text-white" id="pay-button">Bayar Sekarang</button>
            <div id="result"></div>
        </div>
    </div>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
    </script>
    <script>
document.getElementById('pay-button').addEventListener('click', function() {
    // Gunakan Midtrans Snap
    snap.pay('{{ $midtransToken }}', {
        onSuccess: function(result) {
            // Kirim permintaan POST ke rute payment.success
            fetch('{{ route("payment.success") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(result)
            })
            .then(response => {
                // Redirect atau tampilkan pesan sukses
                window.location.href = '{{ route("coins.topup") }}';
            })
            .catch(error => {
                alert('Terjadi kesalahan saat memproses pembayaran');
            });
        },
        onPending: function(result) {
            alert('Pembayaran sedang diproses');
        },
        onError: function(result) {
            alert('Pembayaran gagal');
        }
    });
});
    </script>
@endsection
