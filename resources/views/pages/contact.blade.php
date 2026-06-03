<x-layout>
    <x-slot:heading>Contact Us</x-slot:heading>

    {{-- Header --}}
    <div class="mx-auto max-w-7xl px-6 lg:px-8 mb-16">
        <div class="mx-auto max-w-2xl text-center">
            <h1 class="text-4xl font-bold tracking-tight text-gray-900 dark:text-white sm:text-5xl">Get in touch</h1>
            <p class="mt-4 text-lg text-gray-600 dark:text-gray-400">
                Have a question, suggestion, or want to partner with us? We'd love to hear from you. Our team typically responds within 24 hours.
            </p>
        </div>
    </div>

    <div class="mx-auto max-w-7xl px-6 lg:px-8 mb-20">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

            {{-- Contact Info Cards --}}
            <div class="space-y-6">
                <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-2xl p-6 shadow-sm">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-teal-100 dark:bg-teal-900/30 rounded-xl flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 text-teal-600 dark:text-teal-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 dark:text-white">Email</h3>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Our friendly team is here to help.</p>
                            <a href="mailto:hello@listinghub.com" class="mt-1 block text-sm font-medium text-teal-600 dark:text-teal-400 hover:text-teal-500">hello@listinghub.com</a>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-2xl p-6 shadow-sm">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-amber-100 dark:bg-amber-900/30 rounded-xl flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 text-amber-600 dark:text-amber-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 dark:text-white">Office</h3>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Come say hello at our headquarters.</p>
                            <p class="mt-1 text-sm font-medium text-gray-800 dark:text-gray-200">123 Tech Avenue, Suite 400<br>San Francisco, CA 94105</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-2xl p-6 shadow-sm">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900/30 rounded-xl flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 dark:text-white">Hours</h3>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">We're available during business hours.</p>
                            <p class="mt-1 text-sm font-medium text-gray-800 dark:text-gray-200">Mon-Fri: 9:00 AM - 6:00 PM<br>Sat: 10:00 AM - 2:00 PM</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-2xl p-6 shadow-sm">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-purple-100 dark:bg-purple-900/30 rounded-xl flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 text-purple-600 dark:text-purple-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 dark:text-white">Phone</h3>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Call us during business hours.</p>
                            <a href="tel:+1 (555) 123-4567" class="mt-1 block text-sm font-medium text-teal-600 dark:text-teal-400 hover:text-teal-500">+1 (555) 123-4567</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Contact Form --}}
            <div class="lg:col-span-2">
                <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-2xl p-8 shadow-sm">
                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-1">Send us a message</h2>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-8">Fill out the form and we'll get back to you within 24 hours.</p>

                    <form class="space-y-6">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label for="first_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">First name</label>
                                <input type="text" id="first_name" name="first_name" value="Jane"
                                    class="block w-full rounded-lg border border-gray-300 dark:border-gray-600 px-4 py-3 text-sm text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 dark:bg-gray-800 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 focus:outline-none transition" readonly />
                            </div>
                            <div>
                                <label for="last_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Last name</label>
                                <input type="text" id="last_name" name="last_name" value="Doe"
                                    class="block w-full rounded-lg border border-gray-300 dark:border-gray-600 px-4 py-3 text-sm text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 dark:bg-gray-800 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 focus:outline-none transition" readonly />
                            </div>
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
                            <input type="email" id="email" name="email" value="jane.doe@example.com"
                                class="block w-full rounded-lg border border-gray-300 dark:border-gray-600 px-4 py-3 text-sm text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 dark:bg-gray-800 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 focus:outline-none transition" readonly />
                        </div>
                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Subject</label>
                            <select id="subject" name="subject"
                                class="block w-full rounded-lg border border-gray-300 dark:border-gray-600 px-4 py-3 text-sm text-gray-900 dark:text-gray-100 dark:bg-gray-800 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 focus:outline-none transition">
                                <option>General Inquiry</option>
                                <option selected>Partnership Opportunity</option>
                                <option>Technical Support</option>
                                <option>Report an Issue</option>
                                <option>Other</option>
                            </select>
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Message</label>
                            <textarea id="message" name="message" rows="5"
                                class="block w-full rounded-lg border border-gray-300 dark:border-gray-600 px-4 py-3 text-sm text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 dark:bg-gray-800 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 focus:outline-none transition"
                                readonly>Hi team! I'm interested in partnering with ListingHub to list our company's open positions. Can we schedule a call to discuss?</textarea>
                        </div>
                        <div class="flex items-center justify-between pt-2">
                            <p class="text-xs text-gray-400 dark:text-gray-500"><span class="text-red-400">*</span> This is a demo form (pre-filled with sample data)</p>
                            <button type="button" disabled
                                class="rounded-lg bg-teal-600 px-6 py-3 text-sm font-semibold text-white shadow-sm opacity-50 cursor-not-allowed">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Map placeholder --}}
    <div class="mx-auto max-w-7xl px-6 lg:px-8 mb-20">
        <div class="bg-gray-200 dark:bg-gray-800 rounded-2xl h-64 sm:h-80 overflow-hidden relative">
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400 dark:text-gray-500 mb-3" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                    </svg>
                    <p class="text-gray-500 dark:text-gray-400 text-sm font-medium">123 Tech Avenue, Suite 400, San Francisco, CA 94105</p>
                    <p class="text-gray-400 dark:text-gray-500 text-xs mt-1">Map placeholder</p>
                </div>
            </div>
            <div class="absolute inset-0 bg-gradient-to-t from-gray-300/30 dark:from-gray-700/30 to-transparent pointer-events-none"></div>
        </div>
    </div>

    {{-- CTA --}}
    <div class="mx-auto max-w-7xl px-6 lg:px-8 mb-20">
        <div class="relative isolate overflow-hidden bg-gradient-to-r from-gray-900 to-gray-800 px-6 py-16 sm:px-16 rounded-2xl text-center shadow-lg">
            <div class="mx-auto max-w-xl">
                <h2 class="text-3xl font-bold tracking-tight text-white">Join our newsletter</h2>
                <p class="mt-4 text-lg text-gray-300">Get weekly job alerts and career tips delivered to your inbox.</p>
                <form class="mt-8 flex max-w-md mx-auto gap-3">
                    <input type="email" placeholder="Enter your email" value="jane@example.com"
                        class="flex-1 rounded-lg border-0 px-4 py-3 text-sm text-gray-900 dark:text-gray-100 dark:bg-gray-800 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-600 placeholder:text-gray-400 dark:placeholder-gray-500 focus:ring-2 focus:ring-teal-500 focus:outline-none" readonly />
                    <button type="button" disabled
                        class="rounded-lg bg-teal-600 px-6 py-3 text-sm font-semibold text-white shadow-sm opacity-50 cursor-not-allowed">
                        Subscribe
                    </button>
                </form>
                <p class="mt-3 text-xs text-gray-500 dark:text-gray-400">Demo — pre-filled with sample data</p>
            </div>
        </div>
    </div>
</x-layout>
