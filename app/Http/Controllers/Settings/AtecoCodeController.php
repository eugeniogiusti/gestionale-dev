<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\AtecoCode;
use Illuminate\Http\Request;

class AtecoCodeController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => ['required', 'string', 'max:20'],
            'description' => ['nullable', 'string', 'max:255'],
        ]);

        AtecoCode::create($validated);

        return redirect()->route('settings.business.edit', ['tab' => 'tax'])
            ->withFragment('ateco')
            ->with('success', __('business_settings.ateco_add'));
    }

    public function destroy(AtecoCode $atecoCode)
    {
        $atecoCode->delete();

        return redirect()->route('settings.business.edit', ['tab' => 'tax'])
            ->withFragment('ateco');
    }

    public function setPrimary(AtecoCode $atecoCode)
    {
        AtecoCode::query()->update(['is_primary' => false]);
        $atecoCode->update(['is_primary' => true]);

        return redirect()->route('settings.business.edit', ['tab' => 'tax'])
            ->withFragment('ateco');
    }
}
