<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\UpdateAiSettingsRequest;
use App\Models\AiSettings;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AiSettingsController extends Controller
{
    /**
     * Show the AI settings page (global settings).
     */
    public function edit(): View
    {
        $settings = AiSettings::current();

        return view('settings.ai', compact('settings'));
    }

    /**
     * Update global AI settings (enable flag + API key).
     */
    public function update(UpdateAiSettingsRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $settings = AiSettings::current();
        $wantsEnabled = (bool) ($data['ai_enabled'] ?? false);

        if ($wantsEnabled && !$request->filled('ai_api_key') && !$settings->ai_api_key) {
            return back()
                ->withErrors(['ai_api_key' => __('ai_settings.api_key_required')])
                ->withInput();
        }

        $update = [
            'ai_enabled' => $wantsEnabled,
        ];

        if ($request->filled('ai_api_key')) {
            $update['ai_api_key'] = $data['ai_api_key'];
        }

        $settings->update($update);

        return back()->with('success', __('ai_settings.updated_successfully'));
    }
}
