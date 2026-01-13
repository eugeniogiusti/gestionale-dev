<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateBusinessSettingsRequest;
use App\Models\BusinessSettings;
use App\Services\BusinessSettingsService;

class BusinessSettingsController extends Controller
{
    public function __construct(
        private BusinessSettingsService $service
    ) {}

    /**
     * Show business settings form
     */
    public function edit()
    {
        $settings = BusinessSettings::current();
        
        return view('settings.business', compact('settings'));
    }

    /**
     * Update business settings
     */
    public function update(UpdateBusinessSettingsRequest $request)
    {
        $this->service->update($request->validated());

        return back()->with('success', __('business_settings.updated_successfully'));
    }

    /**
     * Delete logo
     */
    public function deleteLogo()
    {
        $this->service->deleteLogo();

        return back()->with('success', __('business_settings.logo_deleted'));
    }
}