<x-layout>
    <x-slot:heading>Create new job listing</x-slot:heading>

    <form method="POST" action="/jobs">
        
        @csrf

        <div class="space-y-12">
            <div>
                <div class="mt-5 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="title" class="block font-medium">Job Title</label>
                        <div class="mt-2">
                            <div
                                class="flex items-center rounded-md pl-3 outline-1 -outline-offset-1 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-500">
                                <input id="title" type="text" name="title"
                                    class="block min-w-0 grow bg-transparent py-1.5 pr-3 pl-1 text-base placeholder:text-gray-500 focus:outline-none sm:text-sm/6" required/>
                            </div>
                        </div>
                        @error('title')
                            <p class="text-red-500 text-sm/6 font-semibold">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-5 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="salary" class="block font-medium">Salary</label>
                        <div class="mt-2">
                            <div
                                class="flex items-center rounded-md pl-3 outline-1 -outline-offset-1 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-500">
                                <input id="salary" type="number" name="salary"
                                    class="block min-w-0 grow bg-transparent py-1.5 pr-3 pl-1 text-base placeholder:text-gray-500 focus:outline-none sm:text-sm/6" required/>
                            </div>
                        </div>
                        @error('salary')
                            <p class="text-red-500 text-sm/6 font-semibold">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-span-full mt-5">
                    <label for="description" class="block font-medium">Description</label>
                    <div class="mt-2">
                        <textarea id="description" name="description" rows="3"
                            class="block w-full rounded-md  px-3 py-1.5 text-base outline-1 -outline-offset-1 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" required>
                            {{ trim('') }}
                        </textarea>
                    </div>
                    @error('description')
                        <p class="text-red-500 text-sm/6 font-semibold">{{ $message }}</p>
                    @enderror
                </div>

            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/" class="text-sm font-semibold">Cancel</a>
            
            <button type="submit"
                class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                Save
            </button>
        </div>
    </form>

</x-layout>
