<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

/*
 *  So a little detour from the example in the video:
 * The instructor shows a lot of logic in the web.php file, which I dislike greatly.
 * I would prefer to keep logic in a controller
 */
Route::get('/welcome', function () { // Keeping the welcome page for fun.
    return view('welcome');
});
Route::get('/', function(){
    return redirect()->route('tasks.index');
});

Route::resource('/tasks', TaskController::class);

Route::fallback(function () {
    return "Fallback Route";
});
