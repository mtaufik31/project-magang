@extends('layout.app')

@section('content')
@if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: "Welcome!",
                    text: "{{ session('success') }}", // Use the session success message here
                    icon: "success"
                });
            });
        </script>
    @endif
    <section>
        <div class="relative">
            <div
                class="w-full h-[300px] bg-[url(/public/asset/img/postdan.jpg)] bg-fixed bg-cover bg-bottom overflow-hidden">
                <div class="absolute inset-0 bg-white/30 backdrop-blur-lg"></div>
            </div>
    </section>
    <section>
        <div class="relative z-20 mt-[-200px]">
            <div class="bg-white w-[80%] mx-auto py-5 px-6 my-10 rounded-sm shadow-lg flex flex-col md:flex-row md:flex-nowrap">
                <div class="flex flex-col items-center md:items-start">
                    <div class="judul">
                        <h1 class="text-black text-3xl text-center md:text-left mb-4">
                            Jujutsu Kaisen
                        </h1>

                    </div>

                    <!-- Flex container for isi-kiri and isi-kanan -->
                    <div class="flex flex-col md:flex-row md:pt-3">

                        <!-- Left Section: Image and Info -->
                        <div class="isi-kiri justify-between flex flex-col items-center md:items-start">
                            <img class="w-[210px] h-[310px] mb-4" src="{{ asset('asset/img/postjjk.jpg') }}" alt="">

                            <div class="space-y-3">
                                <div class="w-[210px] flex justify-between items-center px-4 py-2 bg-gray-200 rounded-lg shadow">
                                    <span class="text-gray-500 mr-2">Status</span>
                                    <span class="text-yellow-700">Ongoing</span>
                                </div>
                                <div class="w-[210px] flex justify-between items-center px-4 py-2 bg-gray-200 rounded-lg shadow">
                                    <span class="text-gray-500 mr-2">Rating</span>
                                    <span class="text-black">8.0</span>
                                </div>
                            </div>
                        </div>

                        <!-- Right Section: Synopsis -->
                        <div class="isi-kanan mt-8 md:ml-10 md:mt-0  md:w-full">
                            <h2 class="text-2xl text-[#ff9900] font-semibold mb-2">Sinopsis</h2>
                            <p class="text-gray-700">
                                Yuuji adalah seorang jenius di trek dan lapangan. Tapi dia sama sekali tidak tertarik untuk
                                berputar-putar, dia bahagia sebagai seorang claim di Klub Penelitian Ilmu Gaib. Meskipun dia hanya
                                ada di klub untuk iseng, segalanya menjadi serius ketika roh asli muncul di sekolah! Hidup akan
                                menjadi sangat aneh di SMA Kota Sugisawa 3!
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
