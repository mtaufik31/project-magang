@if (Auth::check())
    <a href="{{ route('points') }}"
        class="relative inline-flex items-center justify-center me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-orange-500 to-orange-300 group-hover:from-orange-500 group-hover:to-orange-300 hover:text-white">
        <span
            class="relative px-2 py-2 flex transition-all ease-in duration-75 bg-slate-50 md:bg-gray-100  rounded-md group-hover:bg-opacity-0 justify-between items-center space-x-7 w-full">
            <div>
                <i class="fa-solid fa-coins text-orange-500 group-hover:text-white duration-200"></i>
                <span id="manyPoin">0</span> <!-- Nilai awal diatur ke 0 -->
            </div>
            <i class="fa-solid fa-plus"></i>
        </span>
    </a>
@endif

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Data dari server
        const counters = {
            manga: {{ $manyPoin ?? 10000 }}, // Pastikan nilai tidak undefined
        };

        // Fungsi untuk animasi penghitung
        function animateCounter(elementId, targetNumber, duration) {
            const element = document.getElementById(elementId);
            const stepTime = Math.abs(Math.floor(duration / targetNumber));
            let currentNumber = 0;

            const increment = () => {
                currentNumber += 10;
                element.textContent = currentNumber;
                if (currentNumber < targetNumber) {
                    setTimeout(increment, stepTime);
                }
            };

            increment();
        }

        // Menjalankan animasi untuk counter poin
        animateCounter("manyPoin", counters.manga, 1000);
    });
</script>
