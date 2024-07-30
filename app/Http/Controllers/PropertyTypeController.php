<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertyType;

class PropertyTypeController extends Controller
{
    public function view(){
        $property = PropertyType::all();
        return view('admin.masters.property-type.index', compact('property'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'property_type' => 'required|string|max:255',
        ]);

        PropertyType::create([
            'property_type' => $request->property_type,
            'state_property_type' => 1,
        ]);

        return redirect()->back()->with('success', 'Property Type created successfully!');
    }
    public function destroy(PropertyType $propertyType)
    {
        $propertyType->delete();
        return redirect()->route('property-types.view')->with('success', 'Property Type deleted successfully!');
    }
}

