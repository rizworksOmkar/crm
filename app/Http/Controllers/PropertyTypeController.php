<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertyType;

class PropertyTypeController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'property_type' => 'required|string|max:255',
        ]);

        PropertyType::create([
            'property_type' => $request->property_type,
        ]);

        return redirect()->back()->with('success', 'Property Type created successfully!');
    }
}

