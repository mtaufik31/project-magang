@extends('layout.app')

@section('content')
    <section class="shadow-lg">
        <div
            class="w-full h-[396px] bg-[url(/public/asset/img/bg.jpg)] bg-fixed bg-cover bg-center bg-opacity-75 backdrop-blur-lg relative overflow-hidden">
            <div class="backdrop-blur-sm w-full h-[396px] flex justify-center items-center">
                <img class="w-[700px] absolute bottom-0 left-0 top-0z hidden lg:block slide-left"
                    src="{{ asset('asset/img/yujii.png') }}" data-aos="fade-right" data-aos-duration="800" alt="">
                <p class="justify-center text-7xl font-extrabold text-[#FE9800] font-fira lg:ps-96" data-aos="fade-up"
                    data-aos-duration="800">JOIN US</p>
            </div>
        </div>
    </section>

    <section class="w-full h-full relative">
        <div class="lg:bg-[url(/public/asset/img/bgjjk.jpg)] bg-no-repeat bg-contain bg-right-top w-full h-full absolute -z-10 opacity-20 bg-fixed md:bg-none
        ">
        </div>
        <div class="flex justify-center md:p-0 px-8 pt-8 md:justify-start items-center gap-12 flex-col-reverse md:flex-row shadow-lg">
            <img src="{{ asset('asset/img/join.jpg') }}" alt=""  class="w-[350px] md:opacity-20">
            <div class="md:w-2/5 md:me-10" data-aos="fade-right">
                <h1 class="text-5xl font-medium font-fira">WE'RE <span class="text-[#FE9800]">HIRING</span></h1>
                <h2 class="text-3xl w-3/4">OUR VISION IS "<span class="text-[#FE9800]">From fans, To fans, By
                        fans</span>".</h2>
                <p class="w-">
                    <span class="text-[#FE9800] font-poppins"> MangaLo </span>membuka kesempatan untuk kalian yang ingin
                    bergabung jadi salah satu bagian staff kami.
                </p>
                <p>jadi, Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla animi temporibus accusantium. In
                    tenetur porro accusamus, ex minus pariatur nihil.</p>
            </div>
        </div>
    </section>
@endsection

@section('script')
@endsection
