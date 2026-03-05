<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Validator;

// simple views
// Route::get('/about', function () {
//     return view('pages.about');
// });

Route::view('/about', 'pages.about');
Route::view('/contact', 'pages.contact');
Route::view('/createjob', 'pages.create-job');
Route::view('/login', 'pages.login');
Route::view('/register', 'pages.register');

Route::get('/jobs', function () {
    return redirect('/');
});

Route::get('/', function () {
    
    $jobs = Job::with('user')->simplePaginate(5);

    return view('pages.homepage', [
        'jobs' => $jobs
    ]);
});

Route::post('/jobs', function () { 
    
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required', 'min:400', 'numeric'],
        'description' => ['required']
    ]);

    return redirect('/'); 
});

Route::get('/jobs/{id}/edit', function ($id) {
    return view("pages.edit-job", [
        'job' => Job::find($id)
    ]);
});

Route::patch('/jobs/{id}', function ($id) {
    
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required', 'min:400', 'numeric'],
        'description' => ['required']
    ]);

    // authonication

    $job = Job::findorfail($id);
    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
        'description' => trim(request('description')),
    ]);

    return view("pages.joblisting", [
        'job' => Job::find($id)
    ]);
});

Route::delete('/jobs/{id}', function ($id) {
    
    $job = Job::findorfail($id)->delete();
    return redirect('/jobs');
});

Route::get('/jobs/{id}', function ($id) {
    return view("pages.joblisting", [
        'job' => Job::find($id)
    ]);
});
