<?php

use Illuminate\Support\Facades\Route;
use App\Models\UserLinks;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/{code}', function ($code) {
    $link = UserLinks::where('short_code', $code)->firstOrFail();

    $link->visits()->create([
        'ip_address' => request()->ip(),
        'user_agent' => request()->userAgent(),
    ]);

    return redirect()->away($link->original_link);
});
