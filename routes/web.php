<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TwoFactorSetupController;
use App\Http\Controllers\TwoFactorChallengeController;
use App\Http\Controllers\TrustedDeviceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Api\ClientSearchController;
use App\Http\Controllers\Api\ProjectSearchController;
use App\Http\Controllers\BusinessSettingsController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Redirect root to login
Route::get('/', function () {
    return redirect()->route('login');
});

// ==========================================
// TWO-FACTOR CHALLENGE (Login Flow)
// Only 'auth', NO middleware '2fa' (avoid loop)
// ==========================================
Route::middleware('auth')->group(function () {
    Route::get('/two-factor/challenge', [TwoFactorChallengeController::class, 'show'])
        ->name('2fa.show');
    
    Route::post('/two-factor/challenge', [TwoFactorChallengeController::class, 'verify'])
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

    // ==========================================
    // TWO-FACTOR SETUP (Profile Settings)
    // ==========================================
    Route::prefix('two-factor')->name('two-factor.')->group(function () {
        Route::post('/enable', [TwoFactorSetupController::class, 'enable'])->name('enable');
        Route::post('/confirm', [TwoFactorSetupController::class, 'confirm'])->name('confirm');
        Route::delete('/disable', [TwoFactorSetupController::class, 'disable'])->name('disable');
    });

    // ==========================================
    // TRUSTED DEVICES MANAGEMENT
    // ==========================================
    Route::prefix('profile/trusted-devices')->name('profile.trusted-devices.')->group(function () {
        Route::get('/', [TrustedDeviceController::class, 'index'])->name('index');
        Route::delete('/{deviceId}', [TrustedDeviceController::class, 'revoke'])->name('revoke');
        Route::delete('/', [TrustedDeviceController::class, 'revokeAll'])->name('revoke-all');
    });

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

    // Resource routes for projects (index, create, store, show, edit, update, destroy)
    Route::resource('projects', ProjectController::class);

    // Restore and force delete
    Route::post('/projects/{id}/restore', [ProjectController::class, 'restore'])->name('projects.restore');
    Route::delete('/projects/{id}/force-delete', [ProjectController::class, 'forceDelete'])->name('projects.force-delete');

    // ==========================================
    // API ROUTES
    // ==========================================

    // Search clients (for project form)
    Route::get('/api/clients/search', \App\Http\Controllers\Api\ClientSearchController::class)
        ->name('api.clients.search');

    // Search projects (navbar global search)
    Route::get('/api/search/projects', \App\Http\Controllers\Api\ProjectSearchController::class)
        ->name('api.search.projects');

    // ==========================================
    // BUSINESS SETTINGS MODULE
    // ==========================================

    // Business Settings Routes
    Route::prefix('settings')->group(function () {
        Route::get('/business', [BusinessSettingsController::class, 'edit'])->name('settings.business.edit');
        Route::put('/business', [BusinessSettingsController::class, 'update'])->name('settings.business.update');
        Route::delete('/business/logo', [BusinessSettingsController::class, 'deleteLogo'])->name('settings.business.delete-logo');
    });
    
    // ==========================================
    // TASKS MODULE
    // ==========================================

    // Task routes
    Route::prefix('tasks')->name('tasks.')->group(function () {
        // Global task index with filters (accessible from sidebar/main menu)
        Route::get('/', [TaskController::class, 'index'])->name('index');
    });

    Route::prefix('projects/{project}/tasks')->name('tasks.')->group(function () {
        // Create task within project context
        Route::post('/', [TaskController::class, 'store'])->name('store');
        
        // Update existing task
        Route::put('/{task}', [TaskController::class, 'update'])->name('update');
        
        // Delete task (soft delete if implemented, otherwise hard delete)
        Route::delete('/{task}', [TaskController::class, 'destroy'])->name('destroy');
    });

}); 

require __DIR__.'/auth.php';