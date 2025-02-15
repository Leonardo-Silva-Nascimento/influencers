<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfluencerController;
use App\Http\Controllers\CampaignController;
use App\Http\Middleware\JwtAuthMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/cadastro', function () {
    return view('cadastro');
})->name('cadastro');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware([JwtAuthMiddleware::class])->group(function () {
    Route::get('/home', [HomeController::class, 'home']);
    Route::post('/createInfluencer', [InfluencerController::class, 'store']);
    Route::post('/createCampaign', [CampaignController::class, 'store']);
});
