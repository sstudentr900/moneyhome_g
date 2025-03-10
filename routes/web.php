<?php

use Illuminate\Support\Facades\Route;

Route::get('/{any?}', function () {
  return view('any');
})->where('any', '^(?!api\/)[\/\w\.-]*');
