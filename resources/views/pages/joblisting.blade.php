<x-layout>
    <x-slot:heading>Home page</x-slot:heading>
    
    <b>Title :</b> 
    <p>{{$job['title']}}</p>
    
    <b>Salary :</b> 
    <p>{{$job['salary']}}</p>
    
    <b>Description :</b>
    <p>{{$job['description']}}</p>

    <div class="py-5">
        <x-button.secoundary href="/jobs/{{$job->id}}/edit">Edid Job</x-button.secoundary>
    </div>
</x-layout>