@extends('layout.app')

@section('content')
    {{-- <section class="">
        <div class="flex flex-wrap md:flex-nowrap">
            <div class="items-center justify-center ">
                <h1 class="text-3xl">FAQ</h1>
                <p class="">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero, sapiente!</p>
                <p class="">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptas architecto reprehenderit ea molestias enim. Accusamus, nulla! Expedita porro qui repellendus minus! Dolore dolor aut nihil!</p>
            </div>
            <img class="w-[200px] absolute" src="{{ asset('asset/img/kasian.webp') }}" alt="">
        </div>
    </section> --}}

    <main class="relative min-h-screen flex flex-col justify-center bg-slate-100 overflow-hidden">
        <div class="w-full max-w-2xl mx-auto px-4 md:px-6 pb-12 pt-0">
            <h1 class="text-2xl font-semibold text-slate-900 mb-4 font-fira">Tentang Kami?</h1>

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
        <div class="w-full max-w-2xl mx-auto px-4 md:px-6 py-12">
            <h1 class="text-2xl font-semibold text-slate-900 mb-4 font-fira">Tentang Kami?</h1>

            <div class="divide-y divide-slate-200">
                <x-accordion title="Siapa Kalian" id="4">
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
