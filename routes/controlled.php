<?php

use Controlled\ControlledController;
use Illuminate\Support\Facades\Route;

Route::get('test/confirme', [ ControlledController::class ,'confirme' ]);
Route::get('Locked', [ LinkController::class ,'locked' ])->name('locked');
