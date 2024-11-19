
        document.addEventListener('DOMContentLoaded', () => {
            const toggleDropdown = (buttonId, dropdownId) => {
                const button = document.getElementById(buttonId);
                const dropdown = document.getElementById(dropdownId);

                button.addEventListener('click', () => {
                    dropdown.classList.toggle('show');
                    dropdown.classList.toggle('hidden');
                });

                document.addEventListener('click', (e) => {
                    if (!button.contains(e.target) && !dropdown.contains(e.target)) {
                        dropdown.classList.add('hidden');
                        dropdown.classList.remove('show');
                    }
                });
            };

            toggleDropdown('sortDropdown', 'sortOptions');
            toggleDropdown('genreDropdown', 'genreOptions');
            toggleDropdown('statusDropdown', 'statusOptions');
        });


         document.addEventListener('DOMContentLoaded', () => {
        const applyFilterButton = document.getElementById('applyFilter');
        const filterForm = document.getElementById('filterForm');
        const mangaListContainer = document.getElementById('manga-list-container');

        applyFilterButton.addEventListener('click', () => {
            // Serialize form data
            const formData = new FormData(filterForm);
            const queryString = new URLSearchParams(formData).toString();

            // AJAX Request
            fetch(`{{ route('list') }}?${queryString}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(response => response.text())
                .then(data => {
                    mangaListContainer.innerHTML = data; // Replace manga list
                })
                .catch(error => console.error('Error:', error));
        });

        // Optional: Reset dropdowns when re-filtering
        const resetDropdowns = () => {
            const dropdowns = document.querySelectorAll('.dropdown-content');
            dropdowns.forEach(dropdown => dropdown.classList.add('hidden'));
        };

        // Close dropdowns on outside click
        document.addEventListener('click', (e) => {
            if (!e.target.closest('.dropdown')) {
                resetDropdowns();
            }
        });
    });


        document.getElementById('genreSearch').addEventListener('input', function() {
            const searchValue = this.value.toLowerCase();
            const genres = document.querySelectorAll('#genreList .genre-item');
            const noResults = document.getElementById('noResults');
            let hasResults = false;

            genres.forEach(function(genre) {
                const genreText = genre.textContent.toLowerCase();
                const parentLabel = genre.closest('label');

                if (genreText.includes(searchValue)) {
                    parentLabel.style.display = ''; // Tampilkan
                    hasResults = true;
                } else {
                    parentLabel.style.display = 'none'; // Sembunyikan
                }
            });

            // Tampilkan/hidden logo "No Results"
            if (hasResults) {
                noResults.classList.add('hidden');
            } else {
                noResults.classList.remove('hidden');
            }
        });

