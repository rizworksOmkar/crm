<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertySpec;

class PropertySpecController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'property_spec' => 'required|string|max:255',
        ]);

        PropertySpec::create([
            'property_spec' => $request->property_spec,
        ]);

        return redirect()->back()->with('success', 'Property Spec created successfully!');
    }
}

