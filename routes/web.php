<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;


Route::get('/', function () {
    return view('welcome');
    // $users = DB::select("select * from users");
    // $users = DB::table('users')->first();
    // $users = User::where('id' , 1);
    // $user = DB::table('users')->where('id' , 1)->first();
    // $user = DB::insert("insert into users (name , email , password) values (? , ? , ? ) " , ['Mohamed' , 'medo@gamil.com' , 'Medokaanoun@2002']  );
    // dd($users);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
