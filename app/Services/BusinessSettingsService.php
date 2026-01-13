<?php

namespace App\Services;

use App\Models\BusinessSettings;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class BusinessSettingsService
{
    /**
     * Update business settings
     */
    public function update(array $data): BusinessSettings
    {
        $settings = BusinessSettings::current();
        
        // Handle logo upload separately
        if (isset($data['logo'])) {
            $logoPath = $this->handleLogoUpload($data['logo'], $settings);
            $data['logo_path'] = $logoPath;
            unset($data['logo']);
        }
        
        $settings->update($data);
        
        return $settings;
    }

    /**
     * Handle logo upload to private storage
     */
    private function handleLogoUpload(UploadedFile $file, BusinessSettings $settings): string
    {
        // Delete old logo if exists
        if ($settings->logo_path) {
            Storage::disk('local')->delete($settings->logo_path);
        }

        // Store new logo in local disk (private)
        $path = $file->store('business', 'local');

        return $path;
    }

    /**
     * Delete logo
     */
    public function deleteLogo(): bool
    {
        $settings = BusinessSettings::current();
        
        if (!$settings->logo_path) {
            return false;
        }

        Storage::disk('local')->delete($settings->logo_path);
        $settings->update(['logo_path' => null]);

        return true;
    }
}