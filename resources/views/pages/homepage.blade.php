<x-layout>
    <x-slot:heading>Home page</x-slot:heading>
    
    <div class="space-y-4">
        @foreach ($jobs as $job)
            <a href="jobs/{{ $job->id }}" class="block px-4 py-6 border border-gray-200 round-lg">
                <p><b>Title</b> : {{ $job->title }}</p>
                <p><b>Publish by</b> : {{ $job->user->first_name }} {{ $job->user->last_name }}</p>
                <p><b>Salary</b> : ${{ $job->salary }} per day</p>
                <p><b>Description</b> : {{$job->description}}</p>
            </a>
        @endforeach
    </div>
    <div class="py-6">
        {{ $jobs->links() }}
    </div>
</x-layout>