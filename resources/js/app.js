import './bootstrap';

// ─── Dark/Light Theme Toggle ────────────────────────────────────────

(function () {
    const html = document.documentElement;
    const STORAGE_KEY = 'listinghub-theme';

    // Apply saved theme (or system preference as fallback)
    function applyTheme(theme) {
        if (theme === 'dark' || (!theme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            html.classList.add('dark');
        } else {
            html.classList.remove('dark');
        }
    }

    // Restore theme on load
    applyTheme(localStorage.getItem(STORAGE_KEY));

    // Listen for toggle clicks
    document.addEventListener('click', function (e) {
        const toggle = e.target.closest('#theme-toggle, #theme-toggle *');
        if (!toggle) return;

        html.classList.toggle('dark');
        const newTheme = html.classList.contains('dark') ? 'dark' : 'light';
        localStorage.setItem(STORAGE_KEY, newTheme);
    });
})();
