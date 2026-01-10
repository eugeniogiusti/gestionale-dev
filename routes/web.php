<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TwoFactorController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

// Redirect root to login
Route::get('/', function () {
    return redirect()->route('login');
});

// ==========================================
// Routes for 2FA management
// Only 'auth', NO middleware '2fa'
// ==========================================
Route::middleware('auth')->group(function () {
    Route::post('/two-factor/enable', [TwoFactorController::class, 'enable'])
        ->name('two-factor.enable');
    
    Route::post('/two-factor/confirm', [TwoFactorController::class, 'confirm'])
        ->name('two-factor.confirm');
    
    Route::post('/two-factor/disable', [TwoFactorController::class, 'disable'])
        ->name('two-factor.disable');
    
    // Management trusted devices
    Route::get('/profile/trusted-devices', [TwoFactorController::class, 'listDevices'])
        ->name('profile.trusted-devices');
    
    Route::delete('/profile/trusted-devices/{device}', [TwoFactorController::class, 'revokeDevice'])
        ->name('profile.trusted-devices.revoke');
    
    Route::delete('/profile/trusted-devices', [TwoFactorController::class, 'revokeAllDevices'])
        ->name('profile.trusted-devices.revoke-all');
});

// ==========================================
// Routes for 2FA challenge
// Only 'auth', NO middleware '2fa' (this avoid loop)
// ==========================================
Route::middleware('auth')->group(function () {
    Route::get('/two-factor/challenge', [TwoFactorController::class, 'show'])
        ->name('2fa.show');
    
    Route::post('/two-factor/challenge', [TwoFactorController::class, 'verify'])
        ->name('2fa.verify');
});

// ==========================================
// ROUTES PROTECTED BY 2FA
// ==========================================
Route::middleware(['auth', 'verified', '2fa'])->group(function () {
    
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Change locale
    Route::get('/locale/{locale}', function (string $locale) {
    $allowed = ['it', 'en'];
    if (!in_array($locale, $allowed, true)) {
        $locale = config('app.locale');
    }
    
    // Save the session
    session(['locale' => $locale]);
    
    // if user logged, save on DB as well
    if (auth()->check()) {
        auth()->user()->update(['preferred_locale' => $locale]);
    }
    
    return back();
    })->name('locale.switch');

    // ==========================================
    // CLIENTS MODULE
    // ==========================================
    
    // Resource routes for clients (index, create, store, show, edit, update, destroy)
    Route::resource('clients', ClientController::class);
    
    // Additional routes for soft delete management
    Route::post('/clients/{id}/restore', [ClientController::class, 'restore'])
        ->name('clients.restore')
        ->withTrashed();
    
    Route::delete('/clients/{id}/force-delete', [ClientController::class, 'forceDelete'])
        ->name('clients.force-delete')
        ->withTrashed();

    // ==========================================
    // PROJECTS MODULE
    // ==========================================

    // Resource routes
    Route::resource('projects', ProjectController::class);

    // Restore and force delete
    Route::post('/projects/{id}/restore', [ProjectController::class, 'restore'])->name('projects.restore');
    Route::delete('/projects/{id}/force-delete', [ProjectController::class, 'forceDelete'])->name('projects.force-delete');

    // ==========================================
    // API ROUTES SEARCH CLIENTS
    // ==========================================

    // API: Search clients (for project form)
    Route::get('/api/clients/search', \App\Http\Controllers\Api\ClientSearchController::class)
    ->name('api.clients.search');


        

}); 

require __DIR__.'/auth.php';