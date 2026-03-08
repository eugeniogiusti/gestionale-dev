<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TwoFactor\TwoFactorChallengeController;
use App\Http\Controllers\TwoFactor\TwoFactorSetupController;
use App\Http\Controllers\TwoFactor\TrustedDeviceController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Settings\ProfileController;
use App\Http\Controllers\Settings\LocaleController;
use App\Http\Controllers\Settings\AiSettingsController;
use App\Http\Controllers\Settings\BusinessSettingsController;
use App\Http\Controllers\Clients\ClientController;
use App\Http\Controllers\Projects\ProjectController;
use App\Http\Controllers\Api\Clients\ClientSearchController;
use App\Http\Controllers\Api\Projects\ProjectSearchController;
use App\Http\Controllers\Projects\ProjectChatController;
use App\Http\Controllers\Projects\ProjectRepositoryController;
use App\Http\Controllers\Tasks\TaskController;
use App\Http\Controllers\Meetings\MeetingController;
use App\Http\Controllers\Payments\PaymentController;
use App\Http\Controllers\Costs\CostController;
use App\Http\Controllers\Invoices\InvoiceController;
use App\Http\Controllers\Receipts\ReceiptController;
use App\Http\Controllers\Documents\DocumentController;
use App\Http\Controllers\Labels\LabelController;
use App\Http\Controllers\Statistics\StatisticsController;
use App\Http\Controllers\Trash\TrashController;
use App\Http\Controllers\Timesheets\TimesheetController;

// Redirect root to login
Route::get('/', fn () => redirect()->route('login'));

// ===================================================
// CHALLENGE 2FA — ONLY AUTH 
// ===================================================
Route::middleware(['auth'])->group(function () {

    Route::get('/two-factor/challenge', [TwoFactorChallengeController::class, 'show'])
        ->name('2fa.show');

    Route::post('/two-factor/challenge', [TwoFactorChallengeController::class, 'verify'])
        ->name('2fa.verify');
});

// ===================================================
// SETUP 2FA + TRUSTED DEVICES — AUTH + VERIFIED
// ===================================================
Route::middleware(['auth', 'verified'])->group(function () {

    // 2FA setup/management
    Route::prefix('two-factor')->name('two-factor.')->group(function () {
        Route::post('/enable', [TwoFactorSetupController::class, 'enable'])->name('enable');
        Route::post('/confirm', [TwoFactorSetupController::class, 'confirm'])->name('confirm');
        Route::post('/cancel', [TwoFactorSetupController::class, 'cancel'])->name('cancel');
        Route::delete('/disable', [TwoFactorSetupController::class, 'disable'])->name('disable');
    });

    // Trusted devices
    Route::prefix('profile/trusted-devices')->name('profile.trusted-devices.')->group(function () {
        Route::get('/', [TrustedDeviceController::class, 'index'])->name('index');
        Route::delete('/{deviceId}', [TrustedDeviceController::class, 'revoke'])->name('revoke');
        Route::delete('/', [TrustedDeviceController::class, 'revokeAll'])->name('revoke-all');
    });
});

// ===================================================
// APP AREA (2FA REQUIRED)
// ===================================================
Route::middleware(['auth', 'verified', '2fa'])->group(function () {

    // DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // CALENDAR
    Route::get('/calendar', fn () => view('calendar.index'))->name('calendar.index');

    // PROFILE
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // LOCALE SWITCHING
    Route::get('/locale/{locale}', [LocaleController::class, 'switch'])->name('locale.switch');

    // ==========================================
    // CLIENTS MODULE
    // ==========================================

    // Resource routes (index, create, store, show, edit, update, destroy)
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
    // TIMESHEETS MODULE
    // ==========================================

    // Global timesheets index
    Route::prefix('timesheets')->name('timesheets.')->group(function () {
        Route::get('/', [TimesheetController::class, 'index'])->name('index');
    });

    Route::prefix('projects/{project}/timesheets')->name('timesheets.')->group(function () {
        Route::post('/', [TimesheetController::class, 'store'])->name('store');
        Route::get('/{timesheet}/report', [TimesheetController::class, 'report'])->name('report');
        Route::delete('/{timesheet}', [TimesheetController::class, 'destroy'])->name('destroy');
    });

    // ==========================================
    // GITHUB MODULE
    // ==========================================

    Route::prefix('projects/{project}')->group(function () {
        Route::get('/repository', ProjectRepositoryController::class)->name('projects.repository');
    });

    // ==========================================
    // AI MODULE
    // ==========================================

    Route::prefix('projects/{project}')->name('projects.')->group(function () {
        Route::post('/chat', [ProjectChatController::class, 'chat'])->name('chat');
        Route::post('/chat/stream', [ProjectChatController::class, 'stream'])->name('chat.stream');
        Route::get('/chat/history', [ProjectChatController::class, 'history'])->name('chat.history');
        Route::delete('/chat/reset', [ProjectChatController::class, 'reset'])->name('chat.reset');
    });

    // ==========================================
    // API ROUTES
    // ==========================================

    // Search clients (for project form)
    Route::get('/api/clients/search', ClientSearchController::class)->name('api.clients.search');

    // Search projects (navbar global search)
    Route::get('/api/search/projects', ProjectSearchController::class)->name('api.search.projects');

    // ==========================================
    // BUSINESS SETTINGS MODULE
    // ==========================================

    // Business settings routes
    Route::prefix('settings')->group(function () {
        Route::get('/business', [BusinessSettingsController::class, 'edit'])->name('settings.business.edit');
        Route::put('/business', [BusinessSettingsController::class, 'update'])->name('settings.business.update');
        Route::delete('/business/logo', [BusinessSettingsController::class, 'deleteLogo'])->name('settings.business.delete-logo');
        // AI Settings Routes - API key management
        Route::get('/ai', [AiSettingsController::class, 'edit'])->name('settings.ai.edit');
        Route::patch('/ai', [AiSettingsController::class, 'update'])->name('settings.ai.update');
    });
    
    // ==========================================
    // TASKS MODULE
    // ==========================================

    // Task routes
    Route::prefix('tasks')->name('tasks.')->group(function () {
        // Global task index with filters and stats
        Route::get('/', [TaskController::class, 'index'])->name('index');
    });

    Route::prefix('projects/{project}/tasks')->name('tasks.')->group(function () {
        // Create task within project context
        Route::post('/', [TaskController::class, 'store'])->name('store');

        // Update existing task
        Route::put('/{task}', [TaskController::class, 'update'])->name('update');

        // Toggle task done status (AJAX)
        Route::post('/{task}/toggle-done', [TaskController::class, 'toggleDone'])->name('toggleDone');

        // Delete task
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
        // Generate and download invoice PDF for a payment
        Route::post('/payments/{payment}/generate', [InvoiceController::class, 'generate'])->name('generate');
        
        // Upload manual invoice
        Route::post('/payments/{payment}/upload', [InvoiceController::class, 'upload'])->name('upload');
        
        // Download/preview existing invoice
        Route::get('/payments/{payment}/download', [InvoiceController::class, 'download'])->name('download');
        Route::get('/payments/{payment}/preview', [InvoiceController::class, 'preview'])->name('preview');
        
        // Delete invoice
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

    // ==========================================
    // DOCUMENTS MODULE
    // ==========================================

    // Global documents index (stats + list)
    Route::prefix('documents')->name('documents.')->group(function () {
        Route::get('/', [DocumentController::class, 'index'])->name('index');
    });

    // Document CRUD in project context
    Route::prefix('projects/{project}/documents')->name('documents.')->group(function () {
        Route::post('/', [DocumentController::class, 'store'])->name('store');
        Route::put('/{document}', [DocumentController::class, 'update'])->name('update');
        Route::delete('/{document}', [DocumentController::class, 'destroy'])->name('destroy');
        Route::get('/{document}/download', [DocumentController::class, 'download'])->name('download');
        Route::get('/{document}/preview', [DocumentController::class, 'preview'])->name('preview');
    });

    // ==========================================
    // LABELS MODULE
    // ==========================================

    // Label management (global)
    Route::prefix('labels')->name('labels.')->group(function () {
        Route::get('/', [LabelController::class, 'index'])->name('index');
        Route::post('/', [LabelController::class, 'store'])->name('store');
        Route::put('/{label}', [LabelController::class, 'update'])->name('update');
        Route::delete('/{label}', [LabelController::class, 'destroy'])->name('destroy');
    });

    // ==========================================
    // STATISTICS MODULE
    // ==========================================

    Route::get('/statistics', [StatisticsController::class, 'index'])->name('statistics.index');
    Route::get('/statistics/export-pdf', [StatisticsController::class, 'exportPdf'])->name('statistics.export-pdf');

    // ==========================================
    // TRASH MODULE 
    // ==========================================

    Route::prefix('trash')->name('trash.')->group(function () {
        Route::get('/', [TrashController::class, 'index'])->name('index');
        Route::delete('/empty', [TrashController::class, 'emptyAll'])->name('empty');
    });

}); 

require __DIR__.'/auth.php';
