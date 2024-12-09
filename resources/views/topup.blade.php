@extends('layout.app')

@section('content')
    <section class="py-5">
        <div class="bg-slate-100 md:w-full lg:w-[65%] md:ps-4 md:pe-4 mx-auto relative shadow-xl">
            <div class="flex items-center md:justify-start justify-center">
                <h1 class="font-fira text-[24px] md:px-0 pt-3 pb-2 px-6 font-medium">Top Up Coin MangaLo!</h1>
            </div>
            <hr>

            <div class="flex items-center justify-center py-6">
                <form action="{{ route('process.topup') }}" method="POST" class="">
                    @csrf
                    <div class="mb-6">
                        <label for="current-balance" class="block text-sm font-medium text-gray-700">Saldo Coin Anda:</label>
                        <p id="current-balance" class="text-lg font-semibold">{{ $currentBalance }} Coin</p>
                    </div>

                    <div class="mb-6">
                        <label for="coin_amount" class="block text-sm pb-2 font-medium text-gray-700">Pilih Jumlah
                            Coin</label>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            <a href="#" onclick="selectCoin(90)" class="coin-card" data-amount="90">
                                <div
                                    class="flex relative flex-col items-center group duration-200 hover:bg-gray-300 bg-gray-200 text-black rounded-lg w-64 overflow-hidden">
                                    <div class="flex items-center justify-center w-16 h-16 bg-white rounded-full mt-7">
                                        <i class="fa-solid fa-coins text-3xl text-orange-500"></i>
                                    </div>
                                    <p class="text-3xl font-bold my-4">90 Coin</p>
                                    <div
                                        class="bg-orange-300 p-4 w-full text-center border-t duration-200 group-hover:bg-orange-400 border-slate-200">
                                        <h1 class="font-fira text-xl duration-200 text-gray-700 group-hover:text-black">Rp.
                                            20.000</h1>
                                    </div>
                                </div>
                            </a>
                            <a href="#" onclick="selectCoin(180)" class="coin-card" data-amount="180">
                                <div
                                    class="flex relative flex-col items-center group duration-200 hover:bg-gray-300 bg-gray-200 text-black rounded-lg w-64 overflow-hidden">
                                    <div class="flex items-center justify-center w-16 h-16 bg-white rounded-full mt-7">
                                        <i class="fa-solid fa-coins text-3xl text-orange-500"></i>
                                    </div>
                                    <p class="text-3xl font-bold my-4">180 Coin</p>
                                    <div
                                        class="bg-orange-300 p-4 w-full text-center border-t duration-200 group-hover:bg-orange-400 border-slate-200">
                                        <h1 class="font-fira text-xl duration-200 text-gray-700 group-hover:text-black">Rp.
                                            40.000</h1>
                                    </div>
                                </div>
                            </a>
                            <a href="#" onclick="selectCoin(270)" class="coin-card" data-amount="270">
                                <div
                                    class="flex relative flex-col items-center group duration-200 hover:bg-gray-300 bg-gray-200 text-black rounded-lg w-64 overflow-hidden">
                                    <div class="flex items-center justify-center w-16 h-16 bg-white rounded-full mt-7">
                                        <i class="fa-solid fa-coins text-3xl text-orange-500"></i>
                                    </div>
                                    <p class="text-3xl font-bold my-4">270 Coin</p>
                                    <div
                                        class="bg-orange-300 p-4 w-full text-center border-t duration-200 group-hover:bg-orange-400 border-slate-200">
                                        <h1 class="font-fira text-xl duration-200 text-gray-700 group-hover:text-black">Rp.
                                            60.000</h1>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <input type="hidden" name="coin_amount" id="coin_amount">
                    </div>

                    <div class="text-center">
                        <button type="submit"
                            class="w-full bg-orange-500 duration-200 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-orange-500">
                            Top Up Sekarang
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- SweetAlert Script -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            function selectCoin(amount) {
                // Set value input hidden
                document.getElementById('coin_amount').value = amount;

                // Optional: Tambahkan visual feedback
                document.querySelectorAll('.coin-card').forEach(card => {
                    card.classList.remove('border-2', 'border-orange-500');
                });

                event.currentTarget.classList.add('border-2', 'border-orange-500');
            }
        </script>
        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    showConfirmButton: true,
                    confirmButtonText: 'OK'
                });
            </script>
        @endif
    </section>
@endsection
