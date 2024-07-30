<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertySpec;

class PropertySpecController extends Controller
{
    public function view(){
        $propertySpecs = PropertySpec::all();
        return view('admin.masters.property-spec.index', compact('propertySpecs'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'property_spec' => 'required|string|max:255',
        ]);

        PropertySpec::create([
            'property_spec' => $request->property_spec,
            'state_property_spec' => 1
        ]);

        return redirect()->back()->with('success', 'Property Spec created successfully!');
    }
    public function destroy(PropertySpec $propertySpec)
    {
        $propertySpec->delete();
        return redirect()->route('property-specs.view')->with('success', 'Property Type deleted successfully!');
    }
}

