@extends('layout.app')

@section('content')
    <section>
        <div class="bg-white w-[90%] mx-auto py-5 px-6 my-10 rounded-sm shadow-lg">
            <div class="flex flex-col md:flex-row transition-all justify-center md:items-start">
                <div class="font-poppins py-5 md:w-1/2">
                    <h1 class="text-black text-3xl text-center md:text-left font-semibold mb-2">
                        How to make an account in website MangaLo
                    </h1>
                    <p class="text-[12px] text-center md:text-left"><span class="italic">BudiJago -</span> Nov 12, 2024</p>
                    <div class="mt-4">  
                        <div class="image md:w-1/2 flex md:hidden  justify-center items-center my-5 md:mt-0">
                            <img class="w-[80%] rounded-lg" src="{{ asset('asset/img/image.png') }}" alt="MangaLo">
                        </div>
                        <p class="text-gray-700">
                            DDOS attack atau Distributed Denial of Service merupakan serangan cyber dengan cara mengirimkan
                            fake traffic atau lalu lintas palsu ke suatu sistem atau server secara terus menerus. Dampaknya,
                            server tersebut tidak dapat mengatur seluruh traffic sehingga menyebabkan down.

                            Umumnya serangan ini menyasar jaringan, layanan online, hingga website, dengan tujuan agar
                            server tersebut tidak dapat mengakomodasi traffic atau lalu lintas sehingga website mengalami
                            down dan tidak dapat beroperasi. Tak hanya menargetkan perseorangan atau perusahaan tertentu,
                            serangan ini juga bisa menyasar sektor lebih tinggi seperti sektor pemerintahan.

                            Dalam prakteknya agar dapat menyerang suatu server, DDOS akan mengerahkan host dalam jumlah
                            besar. Namun host yang dikerahkan tersebut adalah palsu, selanjutnya para hacker akan membanjiri
                            lalu lintas server dengan host palsu tersebut. Sehingga ketika server berhasil dibanjiri oleh
                            traffic hacker, dampaknya server akan lebih sulit diakses oleh host atau pengguna nyata.

                            Guna memastikan apakah suatu website terkena serangan DDOS terbilang cukup sulit karena
                            memerlukan bantuan ahli IT. Pasalnya ciri-ciri yang timbul tak jauh berbeda dengan permasalahan
                            umum seperti koneksi internet lambat. Namun terdapat beberapa gejala yang dapat menandakan
                            website terkena serangan DDOS, diantaranya :

                            Adanya spam email dalam jumlah besar dan masuk dalam waktu hampir bersamaan. <br>
                            <br>
                            1. Koneksi internet lambat sehingga memerlukan waktu lebih lama untuk mengaksesnya atau bahkan
                            tidak dapat diakses. <br>
                            2. Pemakaian CPU tinggi meskipun tidak ada aktivitas yang berjalan. <br>
                            3. Peningkatan traffic tidak wajar dan alamat IP memiliki profil tidak sama contohnya browser
                            yang digunakan, tipe perangkat, dan lokasi.<br>
                            4. Peningkatan traffic padat di bandwith, baik upload maupun download.
                        </p>
                    </div>
                </div>
                <div class="image md:w-1/2 justify-center  items-center mt-5 md:mt-0 hidden md:block">
                    <img class="w-[80%] mx-auto rounded-lg" src="{{ asset('asset/img/image.png') }}" alt="MangaLo">
                </div>
            </div>
        </div>
    </section>
@endsection
