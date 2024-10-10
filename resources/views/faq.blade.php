@extends('layout.app')

@section('content')
    <section class="relative bg-gradient-to-r bg-[#e2e2e2] text-black pt-20">
        <div class="max-w-7xl mx-auto flex flex-wrap md:flex-nowrap items-center justify-center  gap-10 px-10">
            <div class="space-y-4">
                <h1 class="text-5xl font-semibold font-fira text-orange-400">FAQ!</h1>
                <p class="text-lg font-semibold">We Had All the Answer!</p>
                <p class="text-base">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptas architecto
                    reprehenderit ea molestias enim. Accusamus, nulla! Expedita porro qui repellendus minus! Dolore dolor
                    aut nihil!</p>
                <a href="#learn-more"
                    class="inline-block bg-white text-orange-400 font-semibold px-6 py-3 rounded-md shadow hover:bg-gray-100 transition">Learn
                    More</a>
            </div>
            <div class="md:w-1/2">
                <img class="w-[275px] md:w-[300px] rounded-lg mx-auto md:mx-0" src="{{ asset('asset/img/join.jpg') }}"
                    alt="Hero Image">
            </div>
        </div>
    </section>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#e2e2e2" fill-opacity="1"
            d="M0,128L40,144C80,160,160,192,240,186.7C320,181,400,139,480,154.7C560,171,640,245,720,240C800,235,880,149,960,128C1040,107,1120,149,1200,170.7C1280,192,1360,192,1400,192L1440,192L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z">
        </path>
    </svg>

    <main class="relative min-h-screen flex flex-col justify-center overflow-hidden">
        <div class="w-full max-w-4xl mx-auto px-4 md:px-6 pb-12 pt-5">
            <h1 class="text-2xl font-semibold text-slate-900 mb-4 font-fira">We Are</h1>

            <div class="divide-y divide-slate-200">
                <x-accordion title="Siapa Kalian" id="1">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis nihil rem dolor aut voluptatum.
                    Explicabo soluta adipisci quam praesentium earum quia debitis possimus, quisquam neque nesciunt, sed
                    corporis laborum architecto!
                </x-accordion>

                <x-accordion title="Apa yang kalian lakukan?" id="2">
                    You can choose between monthly and yearly billing options depending on your preference.
                </x-accordion>

                <x-accordion title="Kenapa kalian buat ini?" id="3">
                    You can choose between monthly and yearly billing options depending on your preference.
                </x-accordion>
            </div>
        </div>
        <div class="w-full max-w-4xl mx-auto px-4 md:px-6 pt-4">
            <h1 class="text-2xl font-semibold text-slate-900 mb-4 font-fira">Service</h1>

            <div class="divide-y divide-slate-200">
                <x-accordion title="Apakah mangaLo gratis?" id="4">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis nihil rem dolor aut voluptatum.
                    Explicabo soluta adipisci quam praesentium earum quia debitis possimus, quisquam neque nesciunt, sed
                    corporis laborum architecto!
                </x-accordion>

                <x-accordion title="How does the pricing work?" id="5">
                    You can choose between monthly and yearly billing options depending on your preference.
                </x-accordion>

                <x-accordion title="How does the pricing work?" id="6">
                    You can choose between monthly and yearly billing options depending on your preference.
                </x-accordion>
            </div>
        </div>
    </main>
@endsection

@section('script')
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
    </script>
@endsection
