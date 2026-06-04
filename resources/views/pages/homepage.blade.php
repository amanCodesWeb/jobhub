<x-layout>
    <x-slot:heading>
        @if ($search)
            Search results for &ldquo;{{ e($search) }}&rdquo;
        @else
            Latest Job Listings
        @endif
    </x-slot:heading>

    {{-- Success message --}}
    @if (session('success'))
        <div class="mb-6 flex items-center gap-3 p-4 bg-green-50 dark:bg-green-900/30 border border-green-200 dark:border-green-800 text-green-700 dark:text-green-300 rounded-xl">
            <svg class="w-5 h-5 shrink-0 text-green-500" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <p class="text-sm font-medium">{{ session('success') }}</p>
        </div>
    @endif

    {{-- Job listings container --}}
    <div id="job-listings">
        @include('partials._job-listings')
    </div>
</x-layout>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const listingsContainer = document.getElementById('job-listings');
    const headingEl = document.querySelector('h1');

    /**
     * Fetch listings via AJAX, update the DOM and push the URL.
     */
    let currentFetchUrl = null;

    function fetchListings(url) {
        // Prevent duplicate fetches
        if (currentFetchUrl === url) return;
        currentFetchUrl = url;

        const separator = url.includes('?') ? '&' : '?';
        const ajaxUrl = url + separator + 'ajax=1';

        fetch(ajaxUrl, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(res => {
            if (!res.ok) throw new Error('Request failed');
            return res.json();
        })
        .then(data => {
            currentFetchUrl = null;

            // Update heading if search term changed
            if (data.heading !== undefined) {
                headingEl.innerHTML = data.heading;
            }

            // Replace listings content
            listingsContainer.innerHTML = data.html;

            // Update URL without page reload
            const cleanUrl = url.replace(/[?&]ajax=1/g, '');
            window.history.pushState({ search: true }, '', cleanUrl);
        })
        .catch(err => {
            currentFetchUrl = null;
            // Fallback: full page reload
            window.location.href = url.replace(/[?&]ajax=1/g, '');
        });
    }

    /**
     * Event delegation: handle pagination clicks on the container.
     * Only intercept links that contain "page=" in the href.
     */
    listingsContainer.addEventListener('click', function (e) {
        const link = e.target.closest('a[href*="page="]');
        if (link) {
            e.preventDefault();
            fetchListings(link.href);
        }
    });

    /**
     * Intercept search form submission.
     */
    const searchForm = document.querySelector('form[action="/"]');
    if (searchForm) {
        searchForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const params = new URLSearchParams(new FormData(this));
            const searchValue = params.get('search') || '';
            const url = searchValue ? '/?search=' + encodeURIComponent(searchValue) : '/';
            fetchListings(url);
        });
    }

    // Handle browser back/forward
    window.addEventListener('popstate', function () {
        fetchListings(window.location.href);
    });
});
</script>
