<x-admin-layout>
    <x-slot:heading>Job Management</x-slot:heading>

    {{-- Status filter tabs (pill-style segmented control) --}}
    <div class="mb-4 flex items-center gap-3">
        <div class="inline-flex gap-0.5 p-0.5 bg-gray-100 dark:bg-gray-800 rounded-xl shadow-inner">
            <a href="{{ route('admin.jobs.index', ['status' => 'all']) }}"
               class="filter-tab px-4 py-2 text-sm font-medium rounded-lg transition-all {{ $status === 'all' ? 'bg-white dark:bg-gray-700 text-teal-600 dark:text-teal-400 shadow-sm' : 'text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300' }}"
               data-status="all">
                All
            </a>
            <a href="{{ route('admin.jobs.index', ['status' => 'pending']) }}"
               class="filter-tab px-4 py-2 text-sm font-medium rounded-lg transition-all {{ $status === 'pending' ? 'bg-white dark:bg-gray-700 text-amber-600 dark:text-amber-400 shadow-sm' : 'text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300' }}"
               data-status="pending">
                Pending
            </a>
            <a href="{{ route('admin.jobs.index', ['status' => 'approved']) }}"
               class="filter-tab px-4 py-2 text-sm font-medium rounded-lg transition-all {{ $status === 'approved' ? 'bg-white dark:bg-gray-700 text-green-600 dark:text-green-400 shadow-sm' : 'text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300' }}"
               data-status="approved">
                Approved
            </a>
            <a href="{{ route('admin.jobs.index', ['status' => 'rejected']) }}"
               class="filter-tab px-4 py-2 text-sm font-medium rounded-lg transition-all {{ $status === 'rejected' ? 'bg-white dark:bg-gray-700 text-red-600 dark:text-red-400 shadow-sm' : 'text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300' }}"
               data-status="rejected">
                Rejected
            </a>
        </div>
    </div>

    <div id="jobs-table-container">
        @include('admin.jobs._table')
    </div>

    <script>
        // --- Dropdown logic ---
        function toggleDropdown(id, btn) {
            const menu = document.getElementById(id);
            const isOpen = !menu.classList.contains('hidden');

            document.querySelectorAll('.action-dropdown-menu').forEach(function(m) {
                m.classList.add('hidden');
                if (m.closest('tr')) m.closest('tr').style.zIndex = '';
            });

            if (isOpen) return;

            const tr = btn.closest('tr');
            if (tr) tr.style.zIndex = '50';
            menu.classList.remove('hidden');
        }

        document.addEventListener('click', function(e) {
            if (!e.target.closest('.action-dropdown')) {
                document.querySelectorAll('.action-dropdown-menu').forEach(function(m) {
                    m.classList.add('hidden');
                    if (m.closest('tr')) m.closest('tr').style.zIndex = '';
                });
            }
        });

        function deleteJob(id, title) {
            if (confirm('Move "' + title + '" (#' + id + ') to trash? You can restore it from the Trashed tab.')) {
                const form = document.getElementById('delete-job-form');
                form.action = '/admin/jobs/' + id;
                form.submit();
            }
        }

        // --- AJAX filter switching ---
        document.querySelectorAll('.filter-tab').forEach(function(tab) {
            tab.addEventListener('click', function(e) {
                e.preventDefault();
                var url = this.href;
                var status = this.dataset.status;

                // Update active tab styling
                document.querySelectorAll('.filter-tab').forEach(function(t) {
                    t.className = t.className.replace(/bg-white dark:bg-gray-700 text-\w+-600 dark:text-\w+-400 shadow-sm/g, '');
                    t.className = t.className.replace(/text-gray-500 dark:text-gray-400/g, '');
                    t.classList.add('text-gray-500', 'dark:text-gray-400', 'hover:text-gray-700', 'dark:hover:text-gray-300');
                });
                this.classList.remove('text-gray-500', 'dark:text-gray-400', 'hover:text-gray-700', 'dark:hover:text-gray-300');

                var colorMap = { all: 'teal', pending: 'amber', approved: 'green', rejected: 'red' };
                this.classList.add('bg-white', 'dark:bg-gray-700', 'text-' + colorMap[status] + '-600', 'dark:text-' + colorMap[status] + '-400', 'shadow-sm');

                // Fetch new table content
                fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
                    .then(function(res) { return res.text(); })
                    .then(function(html) {
                        document.getElementById('jobs-table-container').innerHTML = html;
                        history.pushState(null, '', url);
                        if (typeof initDraggableTables === 'function') {
                            initDraggableTables();
                        }
                    });
            });
        });

        // --- View Listing Modal ---
        function openPreviewModal(jobId) {
            var modal = document.getElementById('preview-modal');
            var overlay = document.getElementById('preview-overlay');
            var container = document.getElementById('preview-content');

            // Show modal with loading
            container.innerHTML = '<div class="flex items-center justify-center py-16"><svg class="animate-spin h-8 w-8 text-teal-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg></div>';
            modal.classList.remove('hidden');
            overlay.classList.remove('hidden');
            // Force reflow, then fade in
            void modal.offsetHeight;
            modal.classList.remove('opacity-0');
            overlay.classList.remove('opacity-0');

            fetch('/admin/jobs/' + jobId + '/preview', { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
                .then(function(res) { return res.json(); })
                .then(function(job) {
                    var statusColors = {
                        approved: 'bg-green-50 dark:bg-green-900/30 text-green-700 dark:text-green-300 border-green-200 dark:border-green-800',
                        pending: 'bg-amber-50 dark:bg-amber-900/30 text-amber-700 dark:text-amber-300 border-amber-200 dark:border-amber-800',
                        rejected: 'bg-red-50 dark:bg-red-900/30 text-red-700 dark:text-red-300 border-red-200 dark:border-red-800'
                    };
                    var statusIcons = {
                        approved: '<svg class=\"w-3 h-3 mr-1\" fill=\"none\" viewBox=\"0 0 24 24\" stroke-width=\"2.5\" stroke=\"currentColor\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M4.5 12.75l6 6 9-13.5\" /></svg>',
                        pending: '<svg class=\"w-3 h-3 mr-1\" fill=\"none\" viewBox=\"0 0 24 24\" stroke-width=\"2.5\" stroke=\"currentColor\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z\" /></svg>',
                        rejected: '<svg class=\"w-3 h-3 mr-1\" fill=\"none\" viewBox=\"0 0 24 24\" stroke-width=\"2.5\" stroke=\"currentColor\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M6 18L18 6M6 6l12 12\" /></svg>'
                    };

                    container.innerHTML =
                        '<div class=\"flex items-start justify-between pb-4 border-b border-gray-200 dark:border-gray-700\">' +
                            '<div>' +
                                '<h3 class=\"text-lg font-semibold text-gray-900 dark:text-white\">' + escapeHtml(job.title) + '</h3>' +
                                '<p class=\"text-sm text-gray-500 dark:text-gray-400 mt-1\">ID: #' + job.id + ' &middot; Posted ' + job.created_at + '</p>' +
                            '</div>' +
                            '<span class=\"inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium border shrink-0 ' + (statusColors[job.status] || '') + '\">' +
                                (statusIcons[job.status] || '') + job.status.charAt(0).toUpperCase() + job.status.slice(1) +
                            '</span>' +
                        '</div>' +

                        '<div class=\"grid grid-cols-2 sm:grid-cols-3 gap-4 mt-4\">' +
                            '<div class=\"p-3 bg-gray-50 dark:bg-gray-800 rounded-lg\">' +
                                '<p class=\"text-xs text-gray-500 dark:text-gray-400\">Company</p>' +
                                '<p class=\"text-sm font-medium text-gray-900 dark:text-white mt-0.5\">' + (job.company_name || job.posted_by) + '</p>' +
                            '</div>' +
                            '<div class=\"p-3 bg-gray-50 dark:bg-gray-800 rounded-lg\">' +
                                '<p class=\"text-xs text-gray-500 dark:text-gray-400\">Salary</p>' +
                                '<p class=\"text-sm font-medium text-gray-900 dark:text-white mt-0.5\">$' + job.salary + ' / day</p>' +
                            '</div>' +
                            '<div class=\"p-3 bg-gray-50 dark:bg-gray-800 rounded-lg\">' +
                                '<p class=\"text-xs text-gray-500 dark:text-gray-400\">Category</p>' +
                                '<p class=\"text-sm font-medium text-gray-900 dark:text-white mt-0.5\">' + job.category + '</p>' +
                            '</div>' +
                            '<div class=\"p-3 bg-gray-50 dark:bg-gray-800 rounded-lg\">' +
                                '<p class=\"text-xs text-gray-500 dark:text-gray-400\">Location</p>' +
                                '<p class=\"text-sm font-medium text-gray-900 dark:text-white mt-0.5\">' + (job.location || '—') + '</p>' +
                            '</div>' +
                            '<div class=\"p-3 bg-gray-50 dark:bg-gray-800 rounded-lg\">' +
                                '<p class=\"text-xs text-gray-500 dark:text-gray-400\">Posted By</p>' +
                                '<p class=\"text-sm font-medium text-gray-900 dark:text-white mt-0.5\">' + job.posted_by + '</p>' +
                            '</div>' +
                            '<div class=\"p-3 bg-gray-50 dark:bg-gray-800 rounded-lg\">' +
                                '<p class=\"text-xs text-gray-500 dark:text-gray-400\">Last Updated</p>' +
                                '<p class=\"text-sm font-medium text-gray-900 dark:text-white mt-0.5\">' + job.updated_at + '</p>' +
                            '</div>' +
                        '</div>' +

                        '<div class=\"mt-5\">' +
                            '<h4 class=\"text-sm font-semibold text-gray-900 dark:text-white mb-2\">Description</h4>' +
                            '<div class=\"text-sm text-gray-700 dark:text-gray-300 leading-relaxed whitespace-pre-line bg-gray-50 dark:bg-gray-800 rounded-lg p-4 border border-gray-100 dark:border-gray-700 max-h-60 overflow-y-auto\">' +
                                escapeHtml(job.description) +
                            '</div>' +
                        '</div>' +

                        '<div class=\"flex items-center justify-end gap-3 mt-6 pt-4 border-t border-gray-200 dark:border-gray-700\">' +
                            '<a href=\"/admin/jobs/' + job.id + '/edit\" class=\"inline-flex items-center gap-1.5 px-4 py-2 text-sm font-medium rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition\">' +
                                '<svg class=\"w-4 h-4\" fill=\"none\" viewBox=\"0 0 24 24\" stroke-width=\"1.5\" stroke=\"currentColor\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10\" /></svg>' +
                                'Edit Listing' +
                            '</a>' +
                            '<button onclick=\"closePreviewModal()\" class=\"inline-flex items-center gap-1.5 px-4 py-2 text-sm font-medium rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition\">' +
                                'Close' +
                            '</button>' +
                        '</div>';
                })
                .catch(function() {
                    container.innerHTML = '<div class=\"py-12 text-center text-red-500\">Failed to load listing details.</div>';
                });
        }

        function closePreviewModal() {
            var modal = document.getElementById('preview-modal');
            var overlay = document.getElementById('preview-overlay');
            modal.classList.add('opacity-0');
            overlay.classList.add('opacity-0');
            setTimeout(function() {
                modal.classList.add('hidden');
                overlay.classList.add('hidden');
            }, 200);
        }

        function escapeHtml(str) {
            var div = document.createElement('div');
            div.appendChild(document.createTextNode(str));
            return div.innerHTML;
        }
    </script>

    {{-- Preview Modal --}}
    <div id="preview-overlay" class="fixed inset-0 z-40 bg-black/50 opacity-0 transition-opacity duration-200 hidden" onclick="closePreviewModal()"></div>
    <div id="preview-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 opacity-0 transition-opacity duration-200 hidden">
        <div class="bg-white dark:bg-gray-900 rounded-2xl shadow-2xl border border-gray-200 dark:border-gray-700 w-full max-w-3xl max-h-[90vh] overflow-y-auto" onclick="event.stopPropagation()">
            <div class="p-6" id="preview-content">
                <div class="flex items-center justify-center py-16">
                    <svg class="animate-spin h-8 w-8 text-teal-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
