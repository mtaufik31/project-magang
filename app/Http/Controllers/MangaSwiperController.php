<?php

namespace App\Http\Controllers;

use App\Models\Manga;
use App\Models\MangaSwiper;
use Illuminate\Http\Request;

class MangaSwiperController extends Controller
{
    public function index()
    {
        $swiperMangas = MangaSwiper::with('manga')
            ->orderBy('order')
            ->get();

        $availableMangas = Manga::whereDoesntHave('swiper')
            ->select('id', 'title')
            ->orderBy('title')
            ->get();


        return view('dashboard.swiper', compact('swiperMangas', 'availableMangas'))
            ->with('title', 'Dashboard | Swiper');
    }

    public function store(Request $request)
    {
        $request->validate([
            'manga_id' => 'required|exists:manga,id',
            'order' => 'nullable|integer|min:1'
        ]);

        $maxOrder = MangaSwiper::max('order') ?? 0;

        if ($request->order) {
            $newOrder = $request->order;
        } else {
            // Cari order terendah yang tersedia
            $usedOrders = MangaSwiper::pluck('order')->toArray();
            $newOrder = 1;
            while (in_array($newOrder, $usedOrders)) {
                $newOrder++;
            }
        }

        MangaSwiper::create([
            'manga_id' => $request->manga_id,
            'order' => $newOrder,
            'is_active' => true
        ]);

        return redirect()->route('swiper.list')
            ->with('success', 'Manga added to swiper successfully');
    }

    public function updateOrder(Request $request)
    {
        $request->validate([
            'orders' => 'required|array',
            'orders.*' => 'required|integer|exists:manga_swipers,id'
        ]);

        foreach ($request->orders as $index => $id) {
            MangaSwiper::where('id', $id)->update(['order' => $index]);
        }

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $swiperManga = MangaSwiper::findOrFail($id);
        $deletedOrder = $swiperManga->order;

        // Delete the swiper item
        $swiperManga->delete();

        // Reorder the remaining items
        MangaSwiper::where('order', '>', $deletedOrder)
            ->decrement('order');

        return redirect()->route('swiper.list')
            ->with('success', 'Swiper item deleted and order updated successfully');
    }

    public function toggleActive($id)
    {
        $swiperManga = MangaSwiper::findOrFail($id);
        $swiperManga->is_active = !$swiperManga->is_active;
        $swiperManga->save();

        return redirect()->route('swiper.list')
            ->with('success', 'Swiper status updated successfully');
    }
}
