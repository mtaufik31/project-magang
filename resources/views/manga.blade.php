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
            <div
                class="bg-white w-[80%] mx-auto py-5 px-6 my-10 rounded-sm shadow-lg flex flex-col md:flex-row md:flex-nowrap">
                <div class="flex flex-col transition-all items-center md:items-start">
                    <div class="judul md:border-b-2 w-full shadow-lg">
                        <h1 class="text-black font-fira text-3xl text-center md:text-left mb-2 ">
                            Jujutsu Kaisen
                        </h1>
                        <p class="mb-2 text-slate-600 text-center md:text-left">Jujur kasian, cingcong dingdong, rahmat wahyu, apple, kiko, </p>
                    </div>

                    <!-- Flex container for isi-kiri and isi-kanan -->
                    <div class="flex flex-col md:flex-row md:pt-5   ">

                        <!-- Left Section: Image and Info -->
                        <div class="isi-kiri flex flex-col items-center md:items-start">
                            <img class="w-[210px] h-[310px] mb-4 shadow-xl" src="{{ asset('asset/img/postjjk.jpg') }}"
                                alt="">
                            <div class="space-y-3">
                                <div
                                    class="w-[210px] flex justify-between items-center px-4 py-2 bg-gray-200 rounded-lg shadow">
                                    <span class="text-gray-500 mr-2">Status</span>
                                    <span class="text-[#ff9900]">Ongoing</span>
                                </div>
                                <div
                                    class="w-[210px] flex justify-between items-center px-4 py-2 bg-gray-200 rounded-lg shadow">
                                    <span class="text-gray-500 mr-2">Rating</span>
                                    <span class="text-black">8.0</span>
                                </div>
                            </div>
                        </div>

                        <!-- Right Section: Synopsis -->
                        <div class="isi-kanan w-full mt-8 md:ml-10 md:mt-0">
                            <h2 class="text-2xl text-[#ff9900] font-semibold mb-2">Sinopsis</h2>
                            <p class="text-gray-700">
                                Yuuji adalah seorang jenius di trek dan lapangan. Tapi dia sama sekali tidak tertarik untuk
                                berputar-putar, dia bahagia sebagai seorang claim di Klub Penelitian Ilmu Gaib. Meskipun dia
                                hanya
                                ada di klub untuk iseng, segalanya menjadi serius ketika roh asli muncul di sekolah! Hidup
                                akan
                                menjadi sangat aneh di SMA Kota Sugisawa 3!

                            </p>

                            <!-- Released and Author Section -->
                            <div class="baris-satu flex pt-5 gap-5">
                                <x-statusmanga judul="Released">2020</x-statusmanga>
                                <x-statusmanga judul="Author">Gege Akutami</x-statusmanga>
                            </div>

                            <!-- Artist Section -->
                            <div class="baris-satu flex pt-3 gap-5">
                                <x-statusmanga judul="Artist">Gege Akutami</x-statusmanga>
                            </div>

                            <!-- Publisher and Another Released Section -->
                            <div class="baris-satu flex pt-3 gap-5 ">
                                <x-statusmanga judul="Publisher">Shuuken Shounen Jump (Shueisha)</x-statusmanga>
                                <x-statusmanga judul="Posted By">Budijago</x-statusmanga>
                            </div>
                            <div class="baris-satu flex pt-3 gap-5">
                                <x-statusmanga judul="Posted On">August 2, 2021</x-statusmanga>
                            </div>
                            <div class="baris-satu flex pt-3 gap-5">
                                <div class="w-full md:w-1/2">
                                    <h2 class="mb-2 text-[18px]">Genre</h2>
                                    <x-buttongenre>Anjay</x-buttongenre>
                                    <x-buttongenre>Adventure</x-buttongenre>
                                    <x-buttongenre>Gore</x-buttongenre>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
