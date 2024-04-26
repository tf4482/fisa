<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/panel');
});

Route::get('/', function () {
    return redirect('/panel/login');
});
