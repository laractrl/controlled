<?php

use Controlled\ControlledController;
use Illuminate\Support\Facades\Route;

Route::get('test/confirme', [ ControlledController::class ,'confirme' ]);
Route::get('closed', [ ControlledController::class ,'closed' ])->name('closed');
