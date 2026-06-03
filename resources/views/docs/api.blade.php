<x-layout :heading="''" :backUrl="''">
    {{-- Two-column docs layout: sticky sidebar + content --}}
    <div class="lg:grid lg:grid-cols-[260px_1fr] lg:gap-10 xl:gap-14">

        {{-- ─── Sidebar ────────────────────────────────────────────── --}}
        <aside class="hidden lg:block">
            <nav class="sticky top-6 max-h-[calc(100vh-3rem)] overflow-y-auto pr-2 -mr-2 pb-12" aria-label="Docs navigation">

                <div class="mb-6 pb-4 border-b border-gray-200 dark:border-gray-800">
                    <div class="flex items-center gap-2 text-sm font-semibold text-gray-900 dark:text-white">
                        <svg class="w-5 h-5 text-teal-600" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5" />
                        </svg>
                        API Reference
                    </div>
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">ListingHub REST API</p>
                </div>

                <div class="space-y-6 text-sm">
                    <div>
                        <h4 class="px-2 mb-2 text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">Getting Started</h4>
                        <ul class="space-y-0.5">
                            <li><a href="#introduction" class="docs-nav-link block px-2 py-1.5 rounded-md text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800">Introduction</a></li>
                            <li><a href="#authentication" class="docs-nav-link block px-2 py-1.5 rounded-md text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800">Authentication</a></li>
                            <li><a href="#errors" class="docs-nav-link block px-2 py-1.5 rounded-md text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800">Error Codes</a></li>
                        </ul>
                    </div>

                    <div>
                        <h4 class="px-2 mb-2 text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">Auth</h4>
                        <ul class="space-y-0.5">
                            <li><a href="#register" class="docs-nav-link block px-2 py-1.5 rounded-md text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800">Register</a></li>
                            <li><a href="#login" class="docs-nav-link block px-2 py-1.5 rounded-md text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800">Login</a></li>
                            <li><a href="#logout" class="docs-nav-link block px-2 py-1.5 rounded-md text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800">Logout</a></li>
                            <li><a href="#user" class="docs-nav-link block px-2 py-1.5 rounded-md text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800">Get Current User</a></li>
                        </ul>
                    </div>

                    <div>
                        <h4 class="px-2 mb-2 text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">Jobs</h4>
                        <ul class="space-y-0.5">
                            <li><a href="#list-jobs" class="docs-nav-link block px-2 py-1.5 rounded-md text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800">List Listings</a></li>
                            <li><a href="#show-job" class="docs-nav-link block px-2 py-1.5 rounded-md text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800">Get Listing</a></li>
                            <li><a href="#create-job" class="docs-nav-link block px-2 py-1.5 rounded-md text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800">Create Listing</a></li>
                            <li><a href="#update-job" class="docs-nav-link block px-2 py-1.5 rounded-md text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800">Update Listing</a></li>
                            <li><a href="#delete-job" class="docs-nav-link block px-2 py-1.5 rounded-md text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800">Delete Listing</a></li>
                        </ul>
                    </div>

                    <div>
                        <h4 class="px-2 mb-2 text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">Categories</h4>
                        <ul class="space-y-0.5">
                            <li><a href="#list-categories" class="docs-nav-link block px-2 py-1.5 rounded-md text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800">List Categories</a></li>
                            <li><a href="#show-category" class="docs-nav-link block px-2 py-1.5 rounded-md text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800">Get Category</a></li>
                        </ul>
                    </div>

                    <div>
                        <h4 class="px-2 mb-2 text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">My Listings</h4>
                        <ul class="space-y-0.5">
                            <li><a href="#my-stats" class="docs-nav-link block px-2 py-1.5 rounded-md text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800">Statistics</a></li>
                            <li><a href="#my-jobs" class="docs-nav-link block px-2 py-1.5 rounded-md text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800">My Listings</a></li>
                        </ul>
                    </div>

                    <div class="pt-4 border-t border-gray-200 dark:border-gray-800">
                        <a href="{{ url('/') }}" class="flex items-center gap-1.5 px-2 py-1.5 text-sm text-gray-500 dark:text-gray-400 hover:text-teal-600 dark:hover:text-teal-400">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg>
                            Back to site
                        </a>
                    </div>
                </div>
            </nav>
        </aside>

        {{-- ─── Main Content ────────────────────────────────────────── --}}
        <main class="min-w-0 pb-8">

            {{-- Mobile-only nav select (replaces hidden sidebar on small screens) --}}
            <details class="lg:hidden mb-6 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl">
                <summary class="cursor-pointer px-4 py-3 text-sm font-semibold text-gray-900 dark:text-white flex items-center justify-between">
                    On this page
                    <svg class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" /></svg>
                </summary>
                <div class="px-4 pb-4 pt-2 space-y-3 text-sm border-t border-gray-200 dark:border-gray-700">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400 mb-1">Getting Started</p>
                        <ul class="space-y-0.5">
                            <li><a href="#introduction" class="block px-2 py-1 rounded text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800">Introduction</a></li>
                            <li><a href="#authentication" class="block px-2 py-1 rounded text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800">Authentication</a></li>
                            <li><a href="#errors" class="block px-2 py-1 rounded text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800">Error Codes</a></li>
                        </ul>
                    </div>
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400 mb-1">Auth</p>
                        <ul class="space-y-0.5">
                            <li><a href="#register" class="block px-2 py-1 rounded text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800">Register</a></li>
                            <li><a href="#login" class="block px-2 py-1 rounded text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800">Login</a></li>
                            <li><a href="#logout" class="block px-2 py-1 rounded text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800">Logout</a></li>
                            <li><a href="#user" class="block px-2 py-1 rounded text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800">Get Current User</a></li>
                        </ul>
                    </div>
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400 mb-1">Jobs</p>
                        <ul class="space-y-0.5">
                            <li><a href="#list-jobs" class="block px-2 py-1 rounded text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800">List Listings</a></li>
                            <li><a href="#show-job" class="block px-2 py-1 rounded text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800">Get Listing</a></li>
                            <li><a href="#create-job" class="block px-2 py-1 rounded text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800">Create Listing</a></li>
                            <li><a href="#update-job" class="block px-2 py-1 rounded text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800">Update Listing</a></li>
                            <li><a href="#delete-job" class="block px-2 py-1 rounded text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800">Delete Listing</a></li>
                        </ul>
                    </div>
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400 mb-1">Categories</p>
                        <ul class="space-y-0.5">
                            <li><a href="#list-categories" class="block px-2 py-1 rounded text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800">List Categories</a></li>
                            <li><a href="#show-category" class="block px-2 py-1 rounded text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800">Get Category</a></li>
                        </ul>
                    </div>
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400 mb-1">My Listings</p>
                        <ul class="space-y-0.5">
                            <li><a href="#my-stats" class="block px-2 py-1 rounded text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800">Statistics</a></li>
                            <li><a href="#my-jobs" class="block px-2 py-1 rounded text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800">My Listings</a></li>
                        </ul>
                    </div>
                </div>
            </details>

            {{-- ─── Page Header ───────────────────────────────────────── --}}
            <div class="mb-10">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-teal-50 dark:bg-teal-900/30 text-teal-700 dark:text-teal-300 text-xs font-semibold mb-4">
                    <span class="w-1.5 h-1.5 rounded-full bg-teal-500"></span>
                    v1 • JSON • Bearer Token
                </div>
                <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight text-gray-900 dark:text-white">API Documentation</h1>
                <p class="mt-4 text-lg text-gray-600 dark:text-gray-300 max-w-2xl">
                    Build on top of ListingHub. Every endpoint returns JSON, every protected route is gated by a Sanctum Bearer token.
                </p>
            </div>

            {{-- ─── Introduction ──────────────────────────────────────── --}}
            <section id="introduction" class="scroll-mt-20">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-1">Introduction</h2>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">The basics of the ListingHub API.</p>

                <div class="prose-docs space-y-5">
                    <p>The ListingHub API enables developers to integrate job listings, categories, and user management into their applications. This API uses <strong class="text-gray-900 dark:text-white">RESTful</strong> conventions with JSON request/response bodies and Bearer token authentication via <strong class="text-gray-900 dark:text-white">Laravel Sanctum</strong>.</p>

                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mt-8 mb-3">Base URL</h3>
                    <pre class="docs-code"><code>{{ url('/api') }}</code></pre>

                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mt-8 mb-3">Headers</h3>
                    <p class="text-gray-600 dark:text-gray-300">All requests must include the following headers:</p>
                    <div class="overflow-x-auto rounded-xl border border-gray-200 dark:border-gray-700">
                        <table class="docs-table">
                            <thead>
                                <tr><th>Header</th><th>Value</th><th>Required</th></tr>
                            </thead>
                            <tbody>
                                <tr><td><code>Accept</code></td><td><code>application/json</code></td><td><span class="docs-tag docs-tag-req">Required</span></td></tr>
                                <tr><td><code>Content-Type</code></td><td><code>application/json</code></td><td><span class="docs-tag docs-tag-req">Required</span></td></tr>
                                <tr><td><code>Authorization</code></td><td><code>Bearer {token}</code></td><td><span class="docs-tag docs-tag-req">Required</span> for protected endpoints</td></tr>
                            </tbody>
                        </table>
                    </div>

                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mt-8 mb-3">Response Format</h3>
                    <p class="text-gray-600 dark:text-gray-300">All responses follow consistent patterns:</p>
                    <div class="overflow-x-auto rounded-xl border border-gray-200 dark:border-gray-700">
                        <table class="docs-table">
                            <thead>
                                <tr><th>Pattern</th><th>Example</th><th>HTTP Code</th></tr>
                            </thead>
                            <tbody>
                                <tr><td>Single resource</td><td><code>{ "data": { ... } }</code></td><td>200</td></tr>
                                <tr><td>Collection</td><td><code>{ "data": [...], "meta": {...}, "links": {...} }</code></td><td>200</td></tr>
                                <tr><td>Mutation</td><td><code>{ "message": "...", "data": { ... } }</code></td><td>200 / 201</td></tr>
                                <tr><td>Delete</td><td><em>empty body</em></td><td>204</td></tr>
                                <tr><td>Error</td><td><code>{ "message": "..." }</code></td><td>401 / 403 / 404 / 422</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            {{-- ─── Authentication ─────────────────────────────────────── --}}
            <section id="authentication" class="scroll-mt-20 mt-16">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-1">Authentication</h2>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Bearer tokens, issued by Sanctum.</p>

                <div class="prose-docs space-y-5">
                    <p>The API uses <strong class="text-gray-900 dark:text-white">Bearer token</strong> authentication via <strong class="text-gray-900 dark:text-white">Laravel Sanctum</strong>. Tokens are obtained by registering or logging in, and must be included in the <code>Authorization</code> header for protected endpoints.</p>

                    <div class="docs-info">
                        <p>Tokens expire after <strong>30 days</strong> (configurable via <code>SANCTUM_TOKEN_EXPIRATION</code> in <code>.env</code>). Logging in again revokes all previous tokens.</p>
                    </div>

                    <div class="docs-info">
                        <p>To use a protected endpoint, pass your token as: <code>Authorization: Bearer 1|abc123...</code></p>
                    </div>
                </div>
            </section>

            {{-- ─── Register ──────────────────────────────────────────── --}}
            <section id="register" class="scroll-mt-20 mt-16">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-1">Register</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Create a new user account and receive an API token.</p>

                <div class="docs-endpoint">
                    <div class="docs-endpoint-head">
                        <span class="docs-method docs-method-post">POST</span>
                        <code class="text-sm font-semibold text-gray-900 dark:text-gray-100 break-all">{{ url('/api/register') }}</code>
                    </div>

                    <h4 class="docs-h4">Request Body</h4>
                    <div class="overflow-x-auto rounded-xl border border-gray-200 dark:border-gray-700">
                        <table class="docs-table">
                            <thead><tr><th>Field</th><th>Type</th><th>Required</th><th>Description</th></tr></thead>
                            <tbody>
                                <tr><td><code>first_name</code></td><td>string</td><td><span class="docs-tag docs-tag-req">Required</span></td><td>Max 255 characters</td></tr>
                                <tr><td><code>last_name</code></td><td>string</td><td><span class="docs-tag docs-tag-req">Required</span></td><td>Max 255 characters</td></tr>
                                <tr><td><code>email</code></td><td>string (email)</td><td><span class="docs-tag docs-tag-req">Required</span></td><td>Must be unique. Max 255 characters.</td></tr>
                                <tr><td><code>password</code></td><td>string</td><td><span class="docs-tag docs-tag-req">Required</span></td><td>Must be confirmed. At least 8 characters.</td></tr>
                                <tr><td><code>password_confirmation</code></td><td>string</td><td><span class="docs-tag docs-tag-req">Required</span></td><td>Must match <code>password</code></td></tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="docs-code-label">Example Request</div>
                    <pre class="docs-code"><code><span class="text-gray-500"># </span>curl -X POST {{ url('/api/register') }} \
  -H <span class="text-emerald-400">"Accept: application/json"</span> \
  -H <span class="text-emerald-400">"Content-Type: application/json"</span> \
  -d <span class="text-emerald-400">'{
    "first_name": "John",
    "last_name": "Doe",
    "email": "john@example.com",
    "password": "securepass123",
    "password_confirmation": "securepass123"
  }'</span></code></pre>

                    <div class="docs-code-label">Response <span class="text-gray-500 dark:text-gray-400">— 201 Created</span></div>
                    <pre class="docs-code"><code>{
  <span class="text-emerald-400">"message"</span>: <span class="text-emerald-400">"Account created successfully."</span>,
  <span class="text-emerald-400">"data"</span>: {
    <span class="text-emerald-400">"user"</span>: {
      <span class="text-emerald-400">"id"</span>: <span class="text-amber-300">1</span>,
      <span class="text-emerald-400">"first_name"</span>: <span class="text-emerald-400">"John"</span>,
      <span class="text-emerald-400">"last_name"</span>: <span class="text-emerald-400">"Doe"</span>,
      <span class="text-emerald-400">"email"</span>: <span class="text-emerald-400">"john@example.com"</span>,
      <span class="text-emerald-400">"is_admin"</span>: <span class="text-purple-400">false</span>,
      <span class="text-emerald-400">"created_at"</span>: <span class="text-emerald-400">"2026-06-02T00:00:00.000000Z"</span>,
      <span class="text-emerald-400">"updated_at"</span>: <span class="text-emerald-400">"2026-06-02T00:00:00.000000Z"</span>
    },
    <span class="text-emerald-400">"token"</span>: <span class="text-emerald-400">"1|abc123..."</span>
  }
}</code></pre>
                </div>
            </section>

            {{-- ─── Login ─────────────────────────────────────────────── --}}
            <section id="login" class="scroll-mt-20 mt-16">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-1">Login</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Authenticate with existing credentials. Returns a user object and a Bearer token. Previous tokens are revoked.</p>

                <div class="docs-endpoint">
                    <div class="docs-endpoint-head">
                        <span class="docs-method docs-method-post">POST</span>
                        <code class="text-sm font-semibold text-gray-900 dark:text-gray-100 break-all">{{ url('/api/login') }}</code>
                    </div>

                    <h4 class="docs-h4">Request Body</h4>
                    <div class="overflow-x-auto rounded-xl border border-gray-200 dark:border-gray-700">
                        <table class="docs-table">
                            <thead><tr><th>Field</th><th>Type</th><th>Required</th><th>Description</th></tr></thead>
                            <tbody>
                                <tr><td><code>email</code></td><td>string (email)</td><td><span class="docs-tag docs-tag-req">Required</span></td><td>User's email address</td></tr>
                                <tr><td><code>password</code></td><td>string</td><td><span class="docs-tag docs-tag-req">Required</span></td><td>User's password</td></tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="docs-code-label">Example Request</div>
                    <pre class="docs-code"><code><span class="text-gray-500"># </span>curl -X POST {{ url('/api/login') }} \
  -H <span class="text-emerald-400">"Accept: application/json"</span> \
  -H <span class="text-emerald-400">"Content-Type: application/json"</span> \
  -d <span class="text-emerald-400">'{
    "email": "john@example.com",
    "password": "securepass123"
  }'</span></code></pre>

                    <div class="docs-code-label">Response <span class="text-gray-500 dark:text-gray-400">— 200 OK</span></div>
                    <pre class="docs-code"><code>{
  <span class="text-emerald-400">"message"</span>: <span class="text-emerald-400">"Logged in successfully."</span>,
  <span class="text-emerald-400">"data"</span>: {
    <span class="text-emerald-400">"user"</span>: {
      <span class="text-emerald-400">"id"</span>: <span class="text-amber-300">1</span>,
      <span class="text-emerald-400">"first_name"</span>: <span class="text-emerald-400">"John"</span>,
      <span class="text-emerald-400">"last_name"</span>: <span class="text-emerald-400">"Doe"</span>,
      <span class="text-emerald-400">"email"</span>: <span class="text-emerald-400">"john@example.com"</span>,
      <span class="text-emerald-400">"is_admin"</span>: <span class="text-purple-400">false</span>,
      <span class="text-emerald-400">"created_at"</span>: <span class="text-emerald-400">"2026-06-02T00:00:00.000000Z"</span>,
      <span class="text-emerald-400">"updated_at"</span>: <span class="text-emerald-400">"2026-06-02T00:00:00.000000Z"</span>
    },
    <span class="text-emerald-400">"token"</span>: <span class="text-emerald-400">"2|def456..."</span>
  }
}</code></pre>

                    <div class="docs-warn">
                        <p><strong>Incorrect credentials</strong> — returns <code>401</code> with <code>{ "message": "The provided credentials are incorrect." }</code></p>
                    </div>
                </div>
            </section>

            {{-- ─── Logout ────────────────────────────────────────────── --}}
            <section id="logout" class="scroll-mt-20 mt-16">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-1">Logout</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Revoke the current access token.</p>

                <div class="docs-endpoint">
                    <div class="docs-endpoint-head">
                        <span class="docs-method docs-method-post">POST</span>
                        <code class="text-sm font-semibold text-gray-900 dark:text-gray-100 break-all">{{ url('/api/logout') }}</code>
                    </div>

                    <div class="docs-warn">
                        <p><strong>Authentication required.</strong> Must include <code>Authorization: Bearer {token}</code> header.</p>
                    </div>

                    <div class="docs-code-label">Example Request</div>
                    <pre class="docs-code"><code><span class="text-gray-500"># </span>curl -X POST {{ url('/api/logout') }} \
  -H <span class="text-emerald-400">"Accept: application/json"</span> \
  -H <span class="text-emerald-400">"Authorization: Bearer 2|def4..."</span> \

                    <div class="docs-code-label">Response <span class="text-gray-500 dark:text-gray-400">— 200 OK</span></div>
                    <pre class="docs-code"><code>{
  <span class="text-emerald-400">"message"</span>: <span class="text-emerald-400">"Logged out successfully."</span>
}</code></pre>
                </div>
            </section>

            {{-- ─── Get Current User ──────────────────────────────────── --}}
            <section id="user" class="scroll-mt-20 mt-16">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-1">Get Current User</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Return the authenticated user's profile.</p>

                <div class="docs-endpoint">
                    <div class="docs-endpoint-head">
                        <span class="docs-method docs-method-get">GET</span>
                        <code class="text-sm font-semibold text-gray-900 dark:text-gray-100 break-all">{{ url('/api/user') }}</code>
                    </div>

                    <div class="docs-warn">
                        <p><strong>Authentication required.</strong> Must include <code>Authorization: Bearer {token}</code> header.</p>
                    </div>

                    <div class="docs-code-label">Example Request</div>
                    <pre class="docs-code"><code><span class="text-gray-500"># </span>curl {{ url('/api/user') }} \
  -H <span class="text-emerald-400">"Accept: application/json"</span> \
  -H <span class="text-emerald-400">"Authorization: Bearer 2|def4..."</span> \

                    <div class="docs-code-label">Response <span class="text-gray-500 dark:text-gray-400">— 200 OK</span></div>
                    <pre class="docs-code"><code>{
  <span class="text-emerald-400">"data"</span>: {
    <span class="text-emerald-400">"id"</span>: <span class="text-amber-300">1</span>,
    <span class="text-emerald-400">"first_name"</span>: <span class="text-emerald-400">"John"</span>,
    <span class="text-emerald-400">"last_name"</span>: <span class="text-emerald-400">"Doe"</span>,
    <span class="text-emerald-400">"email"</span>: <span class="text-emerald-400">"john@example.com"</span>,
    <span class="text-emerald-400">"is_admin"</span>: <span class="text-purple-400">false</span>,
    <span class="text-emerald-400">"created_at"</span>: <span class="text-emerald-400">"2026-06-02T00:00:00.000000Z"</span>,
    <span class="text-emerald-400">"updated_at"</span>: <span class="text-emerald-400">"2026-06-02T00:00:00.000000Z"</span>
  }
}</code></pre>
                </div>
            </section>

            {{-- ─── Jobs ──────────────────────────────────────────────── --}}
            <section id="list-jobs" class="scroll-mt-20 mt-16">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-1">Jobs</h2>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Public read endpoints. Authenticated write endpoints are owner-scoped.</p>

                <h3 class="text-xl font-bold text-gray-900 dark:text-white mt-10 mb-1">List All Listings</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Returns a paginated list of all job listings, ordered by newest first.</p>

                <div class="docs-endpoint">
                    <div class="docs-endpoint-head">
                        <span class="docs-method docs-method-get">GET</span>
                        <code class="text-sm font-semibold text-gray-900 dark:text-gray-100 break-all">{{ url('/api/jobs') }}</code>
                    </div>

                    <h4 class="docs-h4">Query Parameters</h4>
                    <div class="overflow-x-auto rounded-xl border border-gray-200 dark:border-gray-700">
                        <table class="docs-table">
                            <thead><tr><th>Parameter</th><th>Type</th><th>Required</th><th>Description</th></tr></thead>
                            <tbody>
                                <tr><td><code>per_page</code></td><td>integer</td><td><span class="docs-tag docs-tag-opt">Optional</span></td><td>Results per page (default: <code>10</code>)</td></tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="docs-code-label">Example Request</div>
                    <pre class="docs-code"><code><span class="text-gray-500"># </span>curl <span class="text-emerald-400">"{{ url('/api/jobs?per_page=5') }}"</span> \
  -H <span class="text-emerald-400">"Accept: application/json"</span></code></pre>

                    <div class="docs-code-label">Response <span class="text-gray-500 dark:text-gray-400">— 200 OK</span></div>
                    <pre class="docs-code"><code>{
  <span class="text-emerald-400">"data"</span>: [
    {
      <span class="text-emerald-400">"id"</span>: <span class="text-amber-300">1</span>,
      <span class="text-emerald-400">"title"</span>: <span class="text-emerald-400">"Senior Laravel Developer"</span>,
      <span class="text-emerald-400">"company_name"</span>: <span class="text-emerald-400">"Acme Inc"</span>,
      <span class="text-emerald-400">"salary"</span>: <span class="text-amber-300">120000</span>,
      <span class="text-emerald-400">"description"</span>: <span class="text-emerald-400">"We are looking for..."</span>,
      <span class="text-emerald-400">"category"</span>: { <span class="text-emerald-400">"id"</span>: <span class="text-amber-300">1</span>, <span class="text-emerald-400">"name"</span>: <span class="text-emerald-400">"Technology"</span>, <span class="text-emerald-400">"slug"</span>: <span class="text-emerald-400">"technology"</span> },
      <span class="text-emerald-400">"user"</span>: { <span class="text-emerald-400">"id"</span>: <span class="text-amber-300">1</span>, <span class="text-emerald-400">"first_name"</span>: <span class="text-emerald-400">"John"</span>, <span class="text-emerald-400">"last_name"</span>: <span class="text-emerald-400">"Doe"</span>, <span class="text-emerald-400">"email"</span>: <span class="text-emerald-400">"john@example.com"</span> },
      <span class="text-emerald-400">"created_at"</span>: <span class="text-emerald-400">"2026-06-01T00:00:00.000000Z"</span>,
      <span class="text-emerald-400">"updated_at"</span>: <span class="text-emerald-400">"2026-06-01T00:00:00.000000Z"</span>
    }
  ],
  <span class="text-emerald-400">"meta"</span>: {
    <span class="text-emerald-400">"current_page"</span>: <span class="text-amber-300">1</span>,
    <span class="text-emerald-400">"last_page"</span>: <span class="text-amber-300">5</span>,
    <span class="text-emerald-400">"per_page"</span>: <span class="text-amber-300">5</span>,
    <span class="text-emerald-400">"total"</span>: <span class="text-amber-300">25</span>
  },
  <span class="text-emerald-400">"links"</span>: {
    <span class="text-emerald-400">"first"</span>: <span class="text-emerald-400">"http://..."</span>,
    <span class="text-emerald-400">"last"</span>: <span class="text-emerald-400">"http://..."</span>,
    <span class="text-emerald-400">"prev"</span>: <span class="text-purple-400">null</span>,
    <span class="text-emerald-400">"next"</span>: <span class="text-emerald-400">"http://..."</span>
  }
}</code></pre>
                </div>
            </section>

            <section id="show-job" class="scroll-mt-20 mt-16">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-1">Get a Single Listing</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Returns the details of a specific job listing.</p>

                <div class="docs-endpoint">
                    <div class="docs-endpoint-head">
                        <span class="docs-method docs-method-get">GET</span>
                        <code class="text-sm font-semibold text-gray-900 dark:text-gray-100 break-all">{{ url('/api/jobs/{id}') }}</code>
                    </div>

                    <h4 class="docs-h4">Path Parameters</h4>
                    <div class="overflow-x-auto rounded-xl border border-gray-200 dark:border-gray-700">
                        <table class="docs-table">
                            <thead><tr><th>Parameter</th><th>Type</th><th>Required</th><th>Description</th></tr></thead>
                            <tbody>
                                <tr><td><code>id</code></td><td>integer</td><td><span class="docs-tag docs-tag-req">Required</span></td><td>The job listing ID</td></tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="docs-code-label">Example Request</div>
                    <pre class="docs-code"><code><span class="text-gray-500"># </span>curl {{ url('/api/jobs/1') }} \
  -H <span class="text-emerald-400">"Accept: application/json"</span></code></pre>

                    <div class="docs-code-label">Response <span class="text-gray-500 dark:text-gray-400">— 200 OK</span></div>
                    <pre class="docs-code"><code>{
  <span class="text-emerald-400">"data"</span>: {
    <span class="text-emerald-400">"id"</span>: <span class="text-amber-300">1</span>,
    <span class="text-emerald-400">"title"</span>: <span class="text-emerald-400">"Senior Laravel Developer"</span>,
    <span class="text-emerald-400">"company_name"</span>: <span class="text-emerald-400">"Acme Inc"</span>,
    <span class="text-emerald-400">"salary"</span>: <span class="text-amber-300">120000</span>,
    <span class="text-emerald-400">"description"</span>: <span class="text-emerald-400">"We are looking for..."</span>,
    <span class="text-emerald-400">"category"</span>: { <span class="text-emerald-400">"id"</span>: <span class="text-amber-300">1</span>, <span class="text-emerald-400">"name"</span>: <span class="text-emerald-400">"Technology"</span> },
    <span class="text-emerald-400">"user"</span>: { <span class="text-emerald-400">"id"</span>: <span class="text-amber-300">1</span>, <span class="text-emerald-400">"first_name"</span>: <span class="text-emerald-400">"John"</span>, <span class="text-emerald-400">"last_name"</span>: <span class="text-emerald-400">"Doe"</span> },
    <span class="text-emerald-400">"created_at"</span>: <span class="text-emerald-400">"2026-06-01T00:00:00.000000Z"</span>,
    <span class="text-emerald-400">"updated_at"</span>: <span class="text-emerald-400">"2026-06-01T00:00:00.000000Z"</span>
  }
}</code></pre>
                </div>
            </section>

            <section id="create-job" class="scroll-mt-20 mt-16">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-1">Create a Listing</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Create a new job listing. The authenticated user is automatically set as the owner.</p>

                <div class="docs-endpoint">
                    <div class="docs-endpoint-head">
                        <span class="docs-method docs-method-post">POST</span>
                        <code class="text-sm font-semibold text-gray-900 dark:text-gray-100 break-all">{{ url('/api/jobs') }}</code>
                    </div>

                    <div class="docs-warn">
                        <p><strong>Authentication required.</strong> Must include <code>Authorization: Bearer {token}</code> header.</p>
                    </div>

                    <h4 class="docs-h4">Request Body</h4>
                    <div class="overflow-x-auto rounded-xl border border-gray-200 dark:border-gray-700">
                        <table class="docs-table">
                            <thead><tr><th>Field</th><th>Type</th><th>Required</th><th>Description</th></tr></thead>
                            <tbody>
                                <tr><td><code>title</code></td><td>string</td><td><span class="docs-tag docs-tag-req">Required</span></td><td>Max 255 characters</td></tr>
                                <tr><td><code>company_name</code></td><td>string</td><td><span class="docs-tag docs-tag-opt">Optional</span></td><td>Company name. Falls back to user's name if null.</td></tr>
                                <tr><td><code>category_id</code></td><td>integer</td><td><span class="docs-tag docs-tag-opt">Optional</span></td><td>Must reference an existing category</td></tr>
                                <tr><td><code>salary</code></td><td>integer</td><td><span class="docs-tag docs-tag-req">Required</span></td><td>Minimum <code>100</code></td></tr>
                                <tr><td><code>description</code></td><td>string</td><td><span class="docs-tag docs-tag-req">Required</span></td><td>Job description (text)</td></tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="docs-code-label">Example Request</div>
                    <pre class="docs-code"><code><span class="text-gray-500"># </span>curl -X POST {{ url('/api/jobs') }} \
  -H <span class="text-emerald-400">"Accept: application/json"</span> \
  -H <span class="text-emerald-400">"Content-Type: application/json"</span> \
  -H <span class="text-emerald-400">"Authorization: Bearer 2|def4..."</span> \
  -d <span class="text-emerald-400">'{
    "title": "Senior Laravel Developer",
    "company_name": "Acme Inc",
    "category_id": 1,
    "salary": 120000,
    "description": "We are looking for an experienced Laravel developer..."
  }'</span></code></pre>

                    <div class="docs-code-label">Response <span class="text-gray-500 dark:text-gray-400">— 201 Created</span></div>
                    <pre class="docs-code"><code>{
  <span class="text-emerald-400">"message"</span>: <span class="text-emerald-400">"Listing created successfully."</span>,
  <span class="text-emerald-400">"data"</span>: {
    <span class="text-emerald-400">"id"</span>: <span class="text-amber-300">26</span>,
    <span class="text-emerald-400">"title"</span>: <span class="text-emerald-400">"Senior Laravel Developer"</span>,
    <span class="text-emerald-400">"company_name"</span>: <span class="text-emerald-400">"Acme Inc"</span>,
    <span class="text-emerald-400">"salary"</span>: <span class="text-amber-300">120000</span>,
    <span class="text-emerald-400">"description"</span>: <span class="text-emerald-400">"We are looking for an experienced Laravel developer..."</span>,
    <span class="text-emerald-400">"category"</span>: { <span class="text-emerald-400">"id"</span>: <span class="text-amber-300">1</span>, <span class="text-emerald-400">"name"</span>: <span class="text-emerald-400">"Technology"</span>, <span class="text-emerald-400">"slug"</span>: <span class="text-emerald-400">"technology"</span> },
    <span class="text-emerald-400">"created_at"</span>: <span class="text-emerald-400">"2026-06-02T00:00:00.000000Z"</span>,
    <span class="text-emerald-400">"updated_at"</span>: <span class="text-emerald-400">"2026-06-02T00:00:00.000000Z"</span>
  }
}</code></pre>
                </div>
            </section>

            <section id="update-job" class="scroll-mt-20 mt-16">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-1">Update a Listing</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Update an existing job listing. Only the listing owner or an admin can update.</p>

                <div class="docs-endpoint">
                    <div class="docs-endpoint-head">
                        <span class="docs-method docs-method-patch">PATCH</span>
                        <code class="text-sm font-semibold text-gray-900 dark:text-gray-100 break-all">{{ url('/api/jobs/{id}') }}</code>
                    </div>

                    <div class="docs-warn">
                        <p><strong>Authentication required.</strong> Must include <code>Authorization: Bearer {token}</code> header.</p>
                    </div>

                    <h4 class="docs-h4">Path Parameters</h4>
                    <div class="overflow-x-auto rounded-xl border border-gray-200 dark:border-gray-700">
                        <table class="docs-table">
                            <thead><tr><th>Parameter</th><th>Type</th><th>Required</th><th>Description</th></tr></thead>
                            <tbody>
                                <tr><td><code>id</code></td><td>integer</td><td><span class="docs-tag docs-tag-req">Required</span></td><td>The job listing ID</td></tr>
                            </tbody>
                        </table>
                    </div>

                    <h4 class="docs-h4">Request Body <span class="text-xs font-normal text-gray-500 dark:text-gray-400">(partial update — all fields optional)</span></h4>
                    <div class="overflow-x-auto rounded-xl border border-gray-200 dark:border-gray-700">
                        <table class="docs-table">
                            <thead><tr><th>Field</th><th>Type</th><th>Required</th><th>Description</th></tr></thead>
                            <tbody>
                                <tr><td><code>title</code></td><td>string</td><td><span class="docs-tag docs-tag-opt">Optional</span></td><td>Max 255 characters</td></tr>
                                <tr><td><code>company_name</code></td><td>string</td><td><span class="docs-tag docs-tag-opt">Optional</span></td><td>Pass <code>null</code> to clear</td></tr>
                                <tr><td><code>category_id</code></td><td>integer</td><td><span class="docs-tag docs-tag-opt">Optional</span></td><td>Must reference an existing category</td></tr>
                                <tr><td><code>salary</code></td><td>integer</td><td><span class="docs-tag docs-tag-opt">Optional</span></td><td>Minimum <code>100</code></td></tr>
                                <tr><td><code>description</code></td><td>string</td><td><span class="docs-tag docs-tag-opt">Optional</span></td><td>Job description (text)</td></tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="docs-code-label">Example Request</div>
                    <pre class="docs-code"><code><span class="text-gray-500"># </span>curl -X PATCH {{ url('/api/jobs/1') }} \
  -H <span class="text-emerald-400">"Accept: application/json"</span> \
  -H <span class="text-emerald-400">"Content-Type: application/json"</span> \
  -H <span class="text-emerald-400">"Authorization: Bearer 2|def4..."</span> \
  -d <span class="text-emerald-400">'{
    "title": "Updated: Senior Laravel Developer",
    "salary": 130000
  }'</span></code></pre>

                    <div class="docs-code-label">Response <span class="text-gray-500 dark:text-gray-400">— 200 OK</span></div>
                    <pre class="docs-code"><code>{
  <span class="text-emerald-400">"message"</span>: <span class="text-emerald-400">"Listing updated successfully."</span>,
  <span class="text-emerald-400">"data"</span>: {
    <span class="text-emerald-400">"id"</span>: <span class="text-amber-300">1</span>,
    <span class="text-emerald-400">"title"</span>: <span class="text-emerald-400">"Updated: Senior Laravel Developer"</span>,
    <span class="text-emerald-400">"salary"</span>: <span class="text-amber-300">130000</span>,
    <span class="text-gray-500">// ...</span>
  }
}</code></pre>

                    <div class="docs-warn">
                        <p><strong>Authorization</strong> — returns <code>403 Forbidden</code> if the token does not belong to the listing owner or an admin.</p>
                    </div>
                </div>
            </section>

            <section id="delete-job" class="scroll-mt-20 mt-16">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-1">Delete a Listing</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Delete a job listing. Only the listing owner or an admin can delete.</p>

                <div class="docs-endpoint">
                    <div class="docs-endpoint-head">
                        <span class="docs-method docs-method-delete">DELETE</span>
                        <code class="text-sm font-semibold text-gray-900 dark:text-gray-100 break-all">{{ url('/api/jobs/{id}') }}</code>
                    </div>

                    <div class="docs-warn">
                        <p><strong>Authentication required.</strong> Must include <code>Authorization: Bearer {token}</code> header.</p>
                    </div>

                    <h4 class="docs-h4">Path Parameters</h4>
                    <div class="overflow-x-auto rounded-xl border border-gray-200 dark:border-gray-700">
                        <table class="docs-table">
                            <thead><tr><th>Parameter</th><th>Type</th><th>Required</th><th>Description</th></tr></thead>
                            <tbody>
                                <tr><td><code>id</code></td><td>integer</td><td><span class="docs-tag docs-tag-req">Required</span></td><td>The job listing ID</td></tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="docs-code-label">Example Request</div>
                    <pre class="docs-code"><code><span class="text-gray-500"># </span>curl -X DELETE {{ url('/api/jobs/1') }} \
  -H <span class="text-emerald-400">"Accept: application/json"</span> \
  -H <span class="text-emerald-400">"Authorization: Bearer 2|def4..."</span> \

                    <div class="docs-code-label">Response <span class="text-gray-500 dark:text-gray-400">— 204 No Content</span></div>
                    <pre class="docs-code"><code><span class="text-gray-500">// Empty body — HTTP 204</span></code></pre>

                    <div class="docs-warn">
                        <p><strong>Authorization</strong> — returns <code>403 Forbidden</code> if the token does not belong to the listing owner or an admin.</p>
                    </div>
                </div>
            </section>

            {{-- ─── Categories ────────────────────────────────────────── --}}
            <section id="categories" class="scroll-mt-20 mt-16">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-1">Categories</h2>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Public read-only category endpoints.</p>
            </section>

            <section id="list-categories" class="scroll-mt-20 mt-10">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-1">List All Categories</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Returns all categories with their job count.</p>

                <div class="docs-endpoint">
                    <div class="docs-endpoint-head">
                        <span class="docs-method docs-method-get">GET</span>
                        <code class="text-sm font-semibold text-gray-900 dark:text-gray-100 break-all">{{ url('/api/categories') }}</code>
                    </div>

                    <div class="docs-code-label">Example Request</div>
                    <pre class="docs-code"><code><span class="text-gray-500"># </span>curl {{ url('/api/categories') }} \
  -H <span class="text-emerald-400">"Accept: application/json"</span></code></pre>

                    <div class="docs-code-label">Response <span class="text-gray-500 dark:text-gray-400">— 200 OK</span></div>
                    <pre class="docs-code"><code>{
  <span class="text-emerald-400">"data"</span>: [
    {
      <span class="text-emerald-400">"id"</span>: <span class="text-amber-300">1</span>,
      <span class="text-emerald-400">"name"</span>: <span class="text-emerald-400">"Technology"</span>,
      <span class="text-emerald-400">"slug"</span>: <span class="text-emerald-400">"technology"</span>,
      <span class="text-emerald-400">"description"</span>: <span class="text-emerald-400">"Tech-related job listings"</span>,
      <span class="text-emerald-400">"jobs_count"</span>: <span class="text-amber-300">15</span>
    },
    {
      <span class="text-emerald-400">"id"</span>: <span class="text-amber-300">2</span>,
      <span class="text-emerald-400">"name"</span>: <span class="text-emerald-400">"Design"</span>,
      <span class="text-emerald-400">"slug"</span>: <span class="text-emerald-400">"design"</span>,
      <span class="text-emerald-400">"description"</span>: <span class="text-emerald-400">"Design and creative roles"</span>,
      <span class="text-emerald-400">"jobs_count"</span>: <span class="text-amber-300">8</span>
    }
  ]
}</code></pre>
                </div>
            </section>

            <section id="show-category" class="scroll-mt-20 mt-10">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-1">Get a Single Category</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Returns a category with its job count.</p>

                <div class="docs-endpoint">
                    <div class="docs-endpoint-head">
                        <span class="docs-method docs-method-get">GET</span>
                        <code class="text-sm font-semibold text-gray-900 dark:text-gray-100 break-all">{{ url('/api/categories/{id}') }}</code>
                    </div>

                    <div class="docs-code-label">Example Request</div>
                    <pre class="docs-code"><code><span class="text-gray-500"># </span>curl {{ url('/api/categories/1') }} \
  -H <span class="text-emerald-400">"Accept: application/json"</span></code></pre>

                    <div class="docs-code-label">Response <span class="text-gray-500 dark:text-gray-400">— 200 OK</span></div>
                    <pre class="docs-code"><code>{
  <span class="text-emerald-400">"data"</span>: {
    <span class="text-emerald-400">"id"</span>: <span class="text-amber-300">1</span>,
    <span class="text-emerald-400">"name"</span>: <span class="text-emerald-400">"Technology"</span>,
    <span class="text-emerald-400">"slug"</span>: <span class="text-emerald-400">"technology"</span>,
    <span class="text-emerald-400">"description"</span>: <span class="text-emerald-400">"Tech-related job listings"</span>,
    <span class="text-emerald-400">"jobs_count"</span>: <span class="text-amber-300">15</span>
  }
}</code></pre>
                </div>
            </section>

            {{-- ─── My Listings ───────────────────────────────────────── --}}
            <section id="my-listings" class="scroll-mt-20 mt-16">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-1">My Listings</h2>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Endpoints for the authenticated user to manage their own listings.</p>
            </section>

            <section id="my-stats" class="scroll-mt-20 mt-10">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-1">Statistics</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Returns listing statistics for the authenticated user.</p>

                <div class="docs-endpoint">
                    <div class="docs-endpoint-head">
                        <span class="docs-method docs-method-get">GET</span>
                        <code class="text-sm font-semibold text-gray-900 dark:text-gray-100 break-all">{{ url('/api/my/stats') }}</code>
                    </div>

                    <div class="docs-warn">
                        <p><strong>Authentication required.</strong> Must include <code>Authorization: Bearer {token}</code> header.</p>
                    </div>

                    <div class="docs-code-label">Example Request</div>
                    <pre class="docs-code"><code><span class="text-gray-500"># </span>curl {{ url('/api/my/stats') }} \
  -H <span class="text-emerald-400">"Accept: application/json"</span> \
  -H <span class="text-emerald-400">"Authorization: Bearer 2|def4..."</span> \

                    <div class="docs-code-label">Response <span class="text-gray-500 dark:text-gray-400">— 200 OK</span></div>
                    <pre class="docs-code"><code>{
  <span class="text-emerald-400">"data"</span>: {
    <span class="text-emerald-400">"total_listings"</span>: <span class="text-amber-300">5</span>,
    <span class="text-emerald-400">"posted_this_week"</span>: <span class="text-amber-300">2</span>,
    <span class="text-emerald-400">"latest_listing"</span>: {
      <span class="text-emerald-400">"id"</span>: <span class="text-amber-300">26</span>,
      <span class="text-emerald-400">"title"</span>: <span class="text-emerald-400">"Senior Laravel Developer"</span>,
      <span class="text-emerald-400">"salary"</span>: <span class="text-amber-300">120000</span>,
      <span class="text-emerald-400">"category"</span>: { <span class="text-gray-500">...</span> },
      <span class="text-emerald-400">"created_at"</span>: <span class="text-emerald-400">"2026-06-02T00:00:00.000000Z"</span>
    },
    <span class="text-emerald-400">"oldest_listing"</span>: {
      <span class="text-emerald-400">"id"</span>: <span class="text-amber-300">22</span>,
      <span class="text-emerald-400">"title"</span>: <span class="text-emerald-400">"UI/UX Designer"</span>,
      <span class="text-emerald-400">"salary"</span>: <span class="text-amber-300">85000</span>,
      <span class="text-emerald-400">"category"</span>: { <span class="text-gray-500">...</span> },
      <span class="text-emerald-400">"created_at"</span>: <span class="text-emerald-400">"2026-05-15T00:00:00.000000Z"</span>
    }
  }
}</code></pre>
                </div>
            </section>

            <section id="my-jobs" class="scroll-mt-20 mt-10">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-1">My Listings</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Returns a paginated list of the authenticated user's own job listings.</p>

                <div class="docs-endpoint">
                    <div class="docs-endpoint-head">
                        <span class="docs-method docs-method-get">GET</span>
                        <code class="text-sm font-semibold text-gray-900 dark:text-gray-100 break-all">{{ url('/api/my/jobs') }}</code>
                    </div>

                    <div class="docs-warn">
                        <p><strong>Authentication required.</strong> Must include <code>Authorization: Bearer {token}</code> header.</p>
                    </div>

                    <h4 class="docs-h4">Query Parameters</h4>
                    <div class="overflow-x-auto rounded-xl border border-gray-200 dark:border-gray-700">
                        <table class="docs-table">
                            <thead><tr><th>Parameter</th><th>Type</th><th>Required</th><th>Description</th></tr></thead>
                            <tbody>
                                <tr><td><code>per_page</code></td><td>integer</td><td><span class="docs-tag docs-tag-opt">Optional</span></td><td>Results per page (default: <code>10</code>)</td></tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="docs-code-label">Example Request</div>
                    <pre class="docs-code"><code><span class="text-gray-500"># </span>curl <span class="text-emerald-400">"{{ url('/api/my/jobs?per_page=5') }}"</span> \
  -H <span class="text-emerald-400">"Accept: application/json"</span> \
  -H <span class="text-emerald-400">"Authorization: Bearer 2|def4..."</span> \

                    <div class="docs-code-label">Response <span class="text-gray-500 dark:text-gray-400">— 200 OK</span></div>
                    <pre class="docs-code"><code>{
  <span class="text-emerald-400">"data"</span>: [
    {
      <span class="text-emerald-400">"id"</span>: <span class="text-amber-300">26</span>,
      <span class="text-emerald-400">"title"</span>: <span class="text-emerald-400">"Senior Laravel Developer"</span>,
      <span class="text-emerald-400">"company_name"</span>: <span class="text-emerald-400">"Acme Inc"</span>,
      <span class="text-emerald-400">"salary"</span>: <span class="text-amber-300">120000</span>,
      <span class="text-emerald-400">"category"</span>: { <span class="text-gray-500">...</span> },
      <span class="text-emerald-400">"created_at"</span>: <span class="text-emerald-400">"2026-06-02T00:00:00.000000Z"</span>,
      <span class="text-emerald-400">"updated_at"</span>: <span class="text-emerald-400">"2026-06-02T00:00:00.000000Z"</span>
    }
  ],
  <span class="text-emerald-400">"meta"</span>: { <span class="text-gray-500">...</span> },
  <span class="text-emerald-400">"links"</span>: { <span class="text-gray-500">...</span> }
}</code></pre>
                </div>
            </section>

            {{-- ─── Error Codes ───────────────────────────────────────── --}}
            <section id="errors" class="scroll-mt-20 mt-16">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-1">Error Codes</h2>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Standard HTTP status codes returned by the API.</p>

                <div class="prose-docs space-y-6">
                    <p class="text-gray-600 dark:text-gray-300">The API uses standard HTTP status codes to indicate success or failure.</p>

                    <div class="overflow-x-auto rounded-xl border border-gray-200 dark:border-gray-700">
                        <table class="docs-table">
                            <thead><tr><th>Status Code</th><th>Description</th><th>Response Body</th></tr></thead>
                            <tbody>
                                <tr><td><code>200</code></td><td>Success</td><td>Request completed normally</td></tr>
                                <tr><td><code>201</code></td><td>Created</td><td>Resource successfully created</td></tr>
                                <tr><td><code>204</code></td><td>No Content</td><td>Resource successfully deleted</td></tr>
                                <tr><td><code>400</code></td><td>Bad Request</td><td><code>{ "message": "..." }</code></td></tr>
                                <tr><td><code>401</code></td><td>Unauthenticated</td><td><code>{ "message": "Unauthenticated." }</code> — missing or invalid token</td></tr>
                                <tr><td><code>403</code></td><td>Forbidden</td><td><code>{ "message": "This action is unauthorized." }</code> — not the owner/admin</td></tr>
                                <tr><td><code>404</code></td><td>Not Found</td><td><code>{ "message": "Resource not found." }</code></td></tr>
                                <tr><td><code>422</code></td><td>Validation Error</td><td><code>{ "message": "...", "errors": { "field": ["..."] } }</code></td></tr>
                                <tr><td><code>429</code></td><td>Too Many Requests</td><td><code>{ "message": "Too Many Attempts." }</code> — rate limited</td></tr>
                            </tbody>
                        </table>
                    </div>

                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mt-10 mb-4">Common Error Examples</h3>

                    <div class="space-y-6">
                        <div>
                            <p class="font-semibold text-gray-900 dark:text-white mb-2">401 — Unauthenticated</p>
                            <pre class="docs-code"><code>{
  <span class="text-emerald-400">"message"</span>: <span class="text-emerald-400">"Unauthenticated."</span>
}</code></pre>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">Occurs when making a request to a protected endpoint without a valid <code>Authorization: Bearer</code> header.</p>
                        </div>

                        <div>
                            <p class="font-semibold text-gray-900 dark:text-white mb-2">422 — Validation Error</p>
                            <pre class="docs-code"><code>{
  <span class="text-emerald-400">"message"</span>: <span class="text-emerald-400">"The salary field must be at least 100. (and 1 more error)"</span>,
  <span class="text-emerald-400">"errors"</span>: {
    <span class="text-emerald-400">"salary"</span>: [<span class="text-emerald-400">"The salary field must be at least 100."</span>],
    <span class="text-emerald-400">"title"</span>: [<span class="text-emerald-400">"The title field is required."</span>]
  }
}</code></pre>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">Returns field-level error messages when request validation fails.</p>
                        </div>

                        <div>
                            <p class="font-semibold text-gray-900 dark:text-white mb-2">403 — Forbidden</p>
                            <pre class="docs-code"><code>{
  <span class="text-emerald-400">"message"</span>: <span class="text-emerald-400">"This action is unauthorized."</span>
}</code></pre>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">Occurs when trying to update or delete a listing that does not belong to the authenticated user (and the user is not an admin).</p>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Footer --}}
            <div class="mt-20 pt-8 border-t border-gray-200 dark:border-gray-800">
                <p class="text-center text-sm text-gray-500 dark:text-gray-400">
                    ListingHub API Documentation · Built with Laravel {{ \Illuminate\Foundation\Application::VERSION }}
                </p>
            </div>
        </main>
    </div>

    {{-- ─── Component styles (scoped to this page via class prefix) ──── --}}
    <style>
        /* Sidebar active state */
        .docs-nav-link.active {
            background-color: rgb(240 253 250); /* teal-50 */
            color: rgb(13 148 136);            /* teal-600 */
            font-weight: 600;
        }
        .dark .docs-nav-link.active {
            background-color: rgba(20, 184, 166, 0.12);
            color: rgb(45 212 191);            /* teal-400 */
        }

        /* Endpoint card */
        .docs-endpoint {
            background-color: rgb(255 255 255);
            border: 1px solid rgb(229 231 235);   /* gray-200 */
            border-radius: 0.75rem;               /* rounded-xl */
            padding: 1.5rem;
            transition: border-color 0.15s;
        }
        .docs-endpoint:hover {
            border-color: rgb(209 213 219);       /* gray-300 */
        }
        .dark .docs-endpoint {
            background-color: rgb(17 24 39);      /* gray-900 */
            border-color: rgb(55 65 81);         /* gray-700 */
        }
        .dark .docs-endpoint:hover {
            border-color: rgb(75 85 99);         /* gray-600 */
        }

        .docs-endpoint-head {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding-bottom: 1.25rem;
            margin-bottom: 1.25rem;
            border-bottom: 1px solid rgb(229 231 235);
        }
        .dark .docs-endpoint-head { border-bottom-color: rgb(55 65 81); }

        .docs-h4 {
            font-size: 0.875rem;
            font-weight: 600;
            color: rgb(17 24 39);
            margin-top: 1.5rem;
            margin-bottom: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }
        .dark .docs-h4 { color: rgb(229 231 235); }

        /* Method badges */
        .docs-method {
            display: inline-block;
            font-size: 0.6875rem;
            font-weight: 700;
            padding: 0.25rem 0.6rem;
            border-radius: 0.375rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #fff;
            flex-shrink: 0;
        }
        .docs-method-get    { background-color: #22c55e; }
        .docs-method-post   { background-color: #3b82f6; }
        .docs-method-patch  { background-color: #f59e0b; }
        .docs-method-delete { background-color: #ef4444; }

        /* Code blocks */
        .docs-code {
            background-color: rgb(15 23 42);      /* slate-900 */
            color: rgb(226 232 240);              /* slate-200 */
            padding: 1rem 1.25rem;
            border-radius: 0.5rem;
            overflow-x: auto;
            font-size: 0.8125rem;
            line-height: 1.65;
            margin-bottom: 1rem;
            font-family: 'JetBrains Mono', 'Fira Code', 'Cascadia Code', 'Menlo', monospace;
        }
        .docs-code code { font-family: inherit; }
        .docs-code::-webkit-scrollbar { height: 6px; }
        .docs-code::-webkit-scrollbar-thumb { background: rgb(71 85 105); border-radius: 3px; }

        .docs-code-label {
            font-size: 0.6875rem;
            font-weight: 600;
            color: rgb(100 116 139);              /* slate-500 */
            text-transform: uppercase;
            letter-spacing: 0.06em;
            margin-top: 1.5rem;
            margin-bottom: 0.5rem;
        }
        .dark .docs-code-label { color: rgb(148 163 184); }

        /* Tables */
        .docs-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.875rem;
        }
        .docs-table th {
            text-align: left;
            padding: 0.65rem 0.9rem;
            background-color: rgb(248 250 252);   /* slate-50 */
            font-weight: 600;
            color: rgb(71 85 105);               /* slate-600 */
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }
        .dark .docs-table th {
            background-color: rgb(15 23 42);      /* slate-900 */
            color: rgb(148 163 184);
        }
        .docs-table td {
            padding: 0.65rem 0.9rem;
            color: rgb(71 85 105);
            border-top: 1px solid rgb(241 245 249);
        }
        .dark .docs-table td {
            color: rgb(203 213 225);
            border-top-color: rgb(51 65 85);
        }
        .docs-table code {
            font-size: 0.8125rem;
            background-color: rgb(241 245 249);
            color: rgb(15 23 42);
            padding: 0.1rem 0.4rem;
            border-radius: 0.25rem;
        }
        .dark .docs-table code {
            background-color: rgb(30 41 59);
            color: rgb(226 232 240);
        }

        /* Tags */
        .docs-tag {
            display: inline-block;
            font-size: 0.6875rem;
            font-weight: 600;
            padding: 0.15rem 0.5rem;
            border-radius: 0.25rem;
        }
        .docs-tag-req { background-color: rgb(254 242 242); color: rgb(220 38 38); }
        .docs-tag-opt { background-color: rgb(240 253 244); color: rgb(22 163 74); }
        .dark .docs-tag-req { background-color: rgba(220, 38, 38, 0.15); color: rgb(252 165 165); }
        .dark .docs-tag-opt { background-color: rgba(22, 163, 74, 0.15); color: rgb(134 239 172); }

        /* Info / warn boxes */
        .docs-info {
            background-color: rgb(240 253 244);
            border-left: 4px solid #22c55e;
            padding: 0.875rem 1.25rem;
            border-radius: 0 0.5rem 0.5rem 0;
            margin: 1rem 0;
        }
        .docs-info p {
            color: rgb(22 101 52);
            font-size: 0.875rem;
            line-height: 1.6;
        }
        .docs-info code {
            background-color: rgba(34, 197, 94, 0.1);
            color: rgb(21 128 61);
            padding: 0.1rem 0.3rem;
            border-radius: 0.25rem;
            font-size: 0.8125rem;
        }
        .dark .docs-info { background-color: rgba(34, 197, 94, 0.08); }
        .dark .docs-info p { color: rgb(134 239 172); }
        .dark .docs-info code { background-color: rgba(34, 197, 94, 0.15); color: rgb(187 247 208); }

        .docs-warn {
            background-color: rgb(255 251 235);
            border-left: 4px solid #f59e0b;
            padding: 0.875rem 1.25rem;
            border-radius: 0 0.5rem 0.5rem 0;
            margin: 1rem 0;
        }
        .docs-warn p {
            color: rgb(146 64 14);
            font-size: 0.875rem;
            line-height: 1.6;
        }
        .docs-warn code {
            background-color: rgba(245, 158, 11, 0.1);
            color: rgb(146 64 14);
            padding: 0.1rem 0.3rem;
            border-radius: 0.25rem;
            font-size: 0.8125rem;
        }
        .dark .docs-warn { background-color: rgba(245, 158, 11, 0.08); }
        .dark .docs-warn p { color: rgb(252 211 77); }
        .dark .docs-warn code { background-color: rgba(245, 158, 11, 0.15); color: rgb(254 215 170); }

        /* Prose content (uses Tailwind + custom dark: for safety) */
        .prose-docs p {
            color: rgb(75 85 99);
            line-height: 1.75;
        }
        .dark .prose-docs p { color: rgb(203 213 225); }
        .prose-docs strong { color: rgb(17 24 39); }
        .dark .prose-docs strong { color: rgb(255 255 255); }
        .prose-docs code {
            font-size: 0.8125rem;
            background-color: rgb(241 245 249);
            color: rgb(15 23 42);
            padding: 0.1rem 0.35rem;
            border-radius: 0.25rem;
        }
        .dark .prose-docs code {
            background-color: rgb(30 41 59);
            color: rgb(226 232 240);
        }
    </style>

    <script>
        // ── Active sidebar link tracking ──
        const sections = document.querySelectorAll('section[id]');
        const navLinks = document.querySelectorAll('.docs-nav-link');

        function updateActiveLink() {
            let current = '';
            const scrollY = window.scrollY;
            sections.forEach(s => {
                if (s.offsetTop <= scrollY + 140) current = s.id;
            });
            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === '#' + current) {
                    link.classList.add('active');
                }
            });
        }

        window.addEventListener('scroll', updateActiveLink, { passive: true });
        updateActiveLink();
    </script>
</x-layout>
