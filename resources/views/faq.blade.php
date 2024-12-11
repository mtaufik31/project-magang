@extends('layout.app')

@section('content')
    <div id="particles-js" class="absolute w-full h-[65vh] ">

    </div>
    <section class="bg-gradient-to-r  text-black md:pt-20 pt-6 pb-32 relative z-100">
        <div class="flex flex-wrap sm:flex-nowrap justify-center">
            <div class="w-full self-center px-6 sm:w-[45%]  font-inter pb-16 md:pb-0">
                <h1 class="text-6xl text-[#ff9900] font-semibold ">FAQ</h1>
                <h3 class="text-2xl font-medium my-3">We Have All The Answers!</h3>
                <p class="pb-6"><span class="text-orange-600">Assalamualaikum All Hail Wibu!</span> Jika kalian penasaran
                    dengan apa yang ada di website ini, mungkin kalian akan menemukan jawabannya di halaman ini! Jika Anda tidak menemukan jawaban atas pertanyaan Anda, jangan ragu untuk menghubungi tim layanan pelanggan kami. Kami dengan senang hati akan membantu Anda!

                    Selamat membaca dan menikmati cerita manga terbaik di MangaLo!</p>
                <a href="#anjay"
                    class="before:ease rounded-lg absolute px-10 py-2 overflow-hidden border border-orange-500 bg-orange-500 text-white shadow-2xl transition-all before:absolute before:right-0 before:top-0 before:h-14 before:w-6 before:translate-x-12 before:rotate-6 before:bg-white before:opacity-50 before:duration-700 hover:shadow-orange-500 hover:before:-translate-x-44">
                    <span relative="relative z-10">Click More</span>
                </a>
            </div>
            <div class=" px-5 self-center w-[350px]">
                <img class="rounded-xl" src="{{ asset('asset/img/apasih.jpg') }}" alt="">
            </div>
        </div>
    </section>
    {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="relative -z-100">
        <path fill="#e2e2e2" fill-opacity="1"
            d="M0,128L40,144C80,160,160,192,240,186.7C320,181,400,139,480,154.7C560,171,640,245,720,240C800,235,880,149,960,128C1040,107,1120,149,1200,170.7C1280,192,1360,192,1400,192L1440,192L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z">
        </path>
    </svg> --}}

    <main class="relative py-16 flex flex-col justify-center overflow-hidden">
        <svg class="md:absolute -z-20 bottom-0" xmlns="http://www.w3.org/2000/svg" version="1.1"
            xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev/svgjs" viewBox="0 0 800 400">
            <path
                d="M5.489231109619141,212.052490234375C30.698062260945637,193.40690739949545,109.15868695576987,86.90333811442058,156.74221801757812,100.17899322509766C204.32574907938638,113.45464833577473,233.56201680501303,280.66823450724286,290.99041748046875,291.7064208984375C348.4188181559245,302.74460728963214,428.96775309244794,173.26968383789062,501.3126220703125,166.40811157226562C573.6574910481771,159.54653930664062,675.3877970377604,244.57040150960287,725.0596313476562,250.5369873046875C774.7314656575521,256.50357309977215,786.9629618326823,210.26251983642578,799.3436279296875,202.20762634277344"
                fill="none" stroke-width="4" stroke="url(&quot;#SvgjsLinearGradient1004&quot;)" stroke-linecap="round"
                stroke-dasharray="36 10"></path>
            <defs>
                <linearGradient id="SvgjsLinearGradient1004">
                    <stop stop-color="hsl(37, 99%, 67%)" offset="0"></stop>
                    <stop stop-color="hsl(316, 73%, 52%)" offset="1"></stop>
                </linearGradient>
            </defs>
        </svg>
        <div class="w-full max-w-4xl mx-auto px-4 md:px-6 pb-12 pt-1">
            <div class="text-center">
                <h1 id="anjay" class="text-5xl font-bold text-slate-900 mb-2">Apa Yang Anda Ingin Cari Tahu <span
                        class="text-[#ff9900]">Tentang Kami?</span></h1>
                <p class="text-lg text-gray-500 mb-6">
                    Dapatkan info seputar tentang kami di halaman ini!
                </p>
            </div>

            <h1 class="text-2xl font-semibold text-slate-900 mb-4 font-fira">Siapakah Kami?</h1>
            <div class="divide-y divide-slate-200 font-poppins">
                <x-accordion title="Apa Itu MangaLo!?" id="1">
                    <span class="text-white">MangaLo!</span> adalah sebuah platform berbasis web yang menyediakan layanan
                    untuk membaca manga secara online. Platform ini menawarkan berbagai macam manga dari berbagai genre yang
                    dapat dinikmati oleh pengguna, baik secara gratis maupun berbayar. <span
                        class="text-white">MangaLo!</span> juga dilengkapi dengan fitur-fitur interaktif seperti sistem akun
                    pengguna, top-up poin, dan pembelian chapter manga.
                </x-accordion>

                <x-accordion title="Apakah MangaLo! Gratis?" id="2">
                    <div class="px-5 py-3 text-black font-poppins font-medium text-sm leading-relaxed">
                        <p>MangaLo! memiliki dua sistem akses:</p>
                        <ul class="list-disc list-inside">
                            <li>
                                <strong>Gratis:</strong> Beberapa manga atau chapter tersedia untuk dibaca secara gratis.
                            </li>
                            <li>
                                <strong>Berbayar:</strong> Manga tertentu atau chapter premium memerlukan poin untuk
                                diakses.
                                Poin ini dapat dibeli melalui sistem top-up yang tersedia di platform.
                            </li>
                        </ul>
                    </div>
                </x-accordion>

                <x-accordion title="Kenapa MangaLo! diciptakan?" id="3">
                    <div class="px-5 py-3 text-black font-poppins font-medium text-sm leading-relaxed">
                        <p>MangaLo! diciptakan untuk memberikan pengalaman membaca manga yang mudah, praktis, dan
                            terjangkau. Platform ini bertujuan untuk:</p>
                        <ul class="list-disc list-inside">
                            <li>Menyediakan akses legal kepada pembaca manga.</li>
                            <li>Mendukung kreator manga melalui sistem berbayar.</li>
                            <li>Menciptakan komunitas pecinta manga yang aman dan menyenangkan.</li>
                        </ul>
                    </div>
                </x-accordion>
            </div>
        </div>
        <div class="w-full max-w-4xl mx-auto px-4 md:px-6 pt-4">
            <h1 class="text-2xl font-semibold text-slate-900 mb-4 font-fira">Tutorial yang diperlukan</h1>

            <div class="divide-y divide-slate-200 font-poppins">
                <x-accordion title="Bagaimana cara membaca komik di MangaLo!?" id="4">
                    <div class="px-5 py-3 text-black font-poppins font-medium text-sm leading-relaxed">
                        <p>Untuk membaca komik di MangaLo!, Anda dapat mengikuti langkah-langkah berikut:</p>
                        <ol class="list-decimal list-inside">
                            <li>Daftar atau Login: Pastikan Anda sudah memiliki akun dan masuk ke platform.</li>
                            <li>Cari Manga: Gunakan fitur pencarian untuk menemukan manga yang Anda sukai.</li>
                            <li>
                                Akses Chapter:
                                <ul class="list-disc list-inside pl-5">
                                    <li>Jika manga atau chapternya gratis, Anda dapat langsung membaca.</li>
                                    <li>Jika berbayar, pastikan Anda memiliki cukup poin untuk membuka chapter tersebut.
                                    </li>
                                </ul>
                            </li>
                            <li>Mulai membaca dan nikmati cerita favorit Anda.</li>
                        </ol>
                    </div>
                </x-accordion>
                <x-accordion title="Apa yang harus dilakukan jika kita lupa password akun kita?" id="5">
                    <div class="px-5 py-3 text-black font-poppins font-medium text-sm leading-relaxed">
                        <p>Jika Anda lupa password akun MangaLo!, ikuti langkah berikut:</p>
                        <ol class="list-decimal list-inside">
                            <li>Klik tombol "Lupa Password" pada halaman login.</li>
                            <li>Masukkan email yang terdaftar pada akun Anda.</li>
                            <li>Periksa email Anda untuk mendapatkan tautan reset password.</li>
                            <li>
                                Klik tautan tersebut dan ikuti petunjuk untuk membuat password baru.
                                Jika Anda tidak menerima email, pastikan untuk memeriksa folder spam atau promosi.
                            </li>
                        </ol>
                    </div>
                </x-accordion>


                <x-accordion title="Bagaimana cara top up di MangaLo!?" id="6">
                    <div class="px-5 py-3 text-black font-poppins font-medium text-sm leading-relaxed">
                        <p>Untuk melakukan top-up di MangaLo!, ikuti langkah ini:</p>
                        <ol class="list-decimal list-inside">
                            <li>Login ke akun MangaLo! Anda.</li>
                            <li>Masuk ke menu Top Up atau Wallet di dashboard Anda.</li>
                            <li>Pilih jumlah poin yang ingin dibeli.</li>
                            <li>Pilih metode pembayaran yang tersedia (transfer bank, e-wallet, atau lainnya).</li>
                            <li>Ikuti instruksi pembayaran hingga selesai.</li>
                            <li>
                                Setelah pembayaran berhasil diverifikasi, poin Anda akan otomatis bertambah.
                                Jika terjadi kendala, Anda dapat menghubungi layanan pelanggan MangaLo!.
                            </li>
                        </ol>
                    </div>
                </x-accordion>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script src="
                                                        https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js
                                                        "></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const accordions = document.querySelectorAll('button[id^="accordion-btn-"]');

            accordions.forEach(button => {
                const id = button.id.split('-')[2];
                const content = document.getElementById(`accordion-content-${id}`);
                const rect1 = document.getElementById(`rect-1-${id}`);
                const rect2 = document.getElementById(`rect-2-${id}`);

                button.addEventListener('click', function() {
                    const isExpanded = content.style.maxHeight && content.style.maxHeight !== '0px';

                    if (isExpanded) {
                        // Close the accordion
                        content.style.maxHeight = '0';
                        rect1.style.transform = 'rotate(0deg)'; // Back to horizontal
                        rect2.style.transform = 'rotate(90deg)'; // Vertical line
                    } else {
                        // Open the accordion
                        content.style.maxHeight = content.scrollHeight + 'px';
                        rect1.style.transform = 'rotate(135deg)'; // Diagonal for the X
                        rect2.style.transform = 'rotate(45deg)'; // Diagonal for the X
                    }
                });
            });

        });
        particlesJS.load('particles-js', '{{ asset('js/particles.json') }}', function() {
            console.log('callback - particles.js config loaded');
        });
    </script>
@endsection
