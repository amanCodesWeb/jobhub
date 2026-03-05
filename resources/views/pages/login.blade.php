<x-layout>
    <x-slot:heading>Login</x-slot:heading>
    
    <form class="max-w-sm mx-auto">
    <div class="mb-5">
        <label for="email" class="block mb-2.5 text-sm font-medium text-heading">Your email</label>
        <input type="email" id="email" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="name@flowbite.com" required />
    </div>
    <div class="mb-5">
        <label for="password" class="block mb-2.5 text-sm font-medium text-heading">Your password</label>
        <input type="password" id="password" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="••••••••" required />
    </div>
    <label for="remember" class="flex items-center mb-5">
        <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft" required />
        <p class="ms-2 text-sm font-medium text-heading select-none">I agree with the <a href="#" class="text-fg-brand hover:underline">terms and conditions</a>.</p>
    </label>
    
    <div class="grid md:grid-cols-2 md:gap-6">
    <x-button.primary-button>Login</x-button.primary-button>
    <x-button.secoundary href="/register">Create Account</x-button.secoundary>
    </div>
</x-layout>