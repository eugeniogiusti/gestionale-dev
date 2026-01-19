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
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CostController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ReceiptController;

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
    // ==========================================
    // DASHBOARD
    // ==========================================
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // ==========================================
    // PROFILE MANAGEMENT
    // ==========================================

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ==========================================
    // TWO-FACTOR SETUP (Profile Settings)
    // ==========================================

    // Manage 2FA setup
    Route::prefix('two-factor')->name('two-factor.')->group(function () {
        Route::post('/enable', [TwoFactorSetupController::class, 'enable'])->name('enable');
        Route::post('/confirm', [TwoFactorSetupController::class, 'confirm'])->name('confirm');
        Route::post('/cancel', [TwoFactorSetupController::class, 'cancel'])->name('cancel'); 
        Route::delete('/disable', [TwoFactorSetupController::class, 'disable'])->name('disable');
    });

    // ==========================================
    // TRUSTED DEVICES MANAGEMENT (2FA)
    // ==========================================

    // Manage trusted devices for 2FA
    Route::prefix('profile/trusted-devices')->name('profile.trusted-devices.')->group(function () {
        Route::get('/', [TrustedDeviceController::class, 'index'])->name('index');
        Route::delete('/{deviceId}', [TrustedDeviceController::class, 'revoke'])->name('revoke');
        Route::delete('/', [TrustedDeviceController::class, 'revokeAll'])->name('revoke-all');
    });

    // ==========================================
    // LOCALE SWITCHING
    // ==========================================

    // Switch application locale
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

    // ==========================================
    // MEETINGS MODULE
    // ==========================================

    // Global meetings index (stats + list)
    Route::prefix('meetings')->name('meetings.')->group(function () {
        Route::get('/', [MeetingController::class, 'index'])->name('index');
    });

    // Meeting CRUD in project context
    Route::prefix('projects/{project}/meetings')->name('meetings.')->group(function () {
        Route::post('/', [MeetingController::class, 'store'])->name('store');
        Route::put('/{meeting}', [MeetingController::class, 'update'])->name('update');
        Route::delete('/{meeting}', [MeetingController::class, 'destroy'])->name('destroy');
        
        // Actions
        Route::post('/{meeting}/complete', [MeetingController::class, 'markCompleted'])->name('complete');
        Route::post('/{meeting}/cancel', [MeetingController::class, 'markCancelled'])->name('cancel');
    });

    // ==========================================
    // PAYMENTS MODULE
    // ==========================================

    // Global payments index (stats + list)
    Route::prefix('payments')->name('payments.')->group(function () {
        Route::get('/', [PaymentController::class, 'index'])->name('index');
    });

    // Payment CRUD in project context
    Route::prefix('projects/{project}/payments')->name('payments.')->group(function () {
        Route::post('/', [PaymentController::class, 'store'])->name('store');
        Route::put('/{payment}', [PaymentController::class, 'update'])->name('update');
        Route::delete('/{payment}', [PaymentController::class, 'destroy'])->name('destroy');
    });

    
    // ==========================================
    // COSTS MODULE
    // ==========================================

    // Global costs index (stats + list)
    Route::prefix('costs')->name('costs.')->group(function () {
        Route::get('/', [CostController::class, 'index'])->name('index');
    });

    // Cost CRUD in project context
    Route::prefix('projects/{project}/costs')->name('costs.')->group(function () {
        Route::post('/', [CostController::class, 'store'])->name('store');
        Route::put('/{cost}', [CostController::class, 'update'])->name('update');
        Route::delete('/{cost}', [CostController::class, 'destroy'])->name('destroy');
    });

    // ==========================================
    // INVOICE MODULE (for payments)
    // ==========================================

    Route::prefix('invoices')->name('invoices.')->group(function () {
        Route::post('/payments/{payment}/generate', [InvoiceController::class, 'generate'])->name('generate');
        Route::get('/payments/{payment}/download', [InvoiceController::class, 'download'])->name('download');
        Route::get('/payments/{payment}/preview', [InvoiceController::class, 'preview'])->name('preview');
        Route::delete('/payments/{payment}', [InvoiceController::class, 'destroy'])->name('destroy'); 
    });

     // ==========================================
    // RECEIPTS MODULE (for costs)
    // ==========================================

    // Receipt management in project context
    Route::prefix('projects/{project}/costs/{cost}/receipt')->name('receipts.')->group(function () {
        Route::post('/', [ReceiptController::class, 'upload'])->name('upload');
        Route::get('/download', [ReceiptController::class, 'download'])->name('download');
        Route::get('/preview', [ReceiptController::class, 'preview'])->name('preview');
        Route::delete('/', [ReceiptController::class, 'destroy'])->name('destroy');
    });

}); 

require __DIR__.'/auth.php';