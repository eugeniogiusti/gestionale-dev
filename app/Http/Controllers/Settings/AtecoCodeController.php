<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\StoreAtecoCodeRequest;
use App\Models\AtecoCode;

class AtecoCodeController extends Controller
{
    /**
     * Store a new ATECO code.
     */
    public function store(StoreAtecoCodeRequest $request)
    {
        $validated = $request->validated();

        AtecoCode::create($validated);

        return redirect()->route('settings.business.edit', ['tab' => 'tax'])
            ->withFragment('ateco')
            ->with('success', __('business_settings.ateco_add'));
    }

    /**
     * Delete an ATECO code.
     */
    public function destroy(AtecoCode $atecoCode)
    {
        $atecoCode->delete();

        return redirect()->route('settings.business.edit', ['tab' => 'tax'])
            ->withFragment('ateco');
    }

    /**
     * Set the given ATECO code as primary, unsetting all others.
     */
    public function setPrimary(AtecoCode $atecoCode)
    {
        AtecoCode::query()->update(['is_primary' => false]);
        $atecoCode->update(['is_primary' => true]);

        return redirect()->route('settings.business.edit', ['tab' => 'tax'])
            ->withFragment('ateco');
    }
}
