<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () { 
    return view('welcome'); 
    //$comments ცვლადი უკვე შესაძლებელია ვიხმაროთ welcome.blade.php ში
});
