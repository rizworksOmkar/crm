<?php

namespace App\Http\Controllers\CRM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LeadStatus;
use App\Models\LeadSource;
use App\Models\Lead;
use App\Models\PropertyType;
use App\Models\PropertySpec;
use App\Models\Role;

class EntityStatusController extends Controller
{
    public function toggleleadStatuschange($id)
    {
        // Retrieve the user by their primary key (ID)
        $LeadStatus = LeadStatus::findOrFail($id);

        // Toggle the user's status
        if ($LeadStatus->state_status == 1) {
            $LeadStatus->state_status = 0;
        } else {
            $LeadStatus->state_status = 1;
        }

        // Save the updated user record
        $LeadStatus->save();

        // Return a response (e.g., JSON)
        return response()->json([
            'message' => 'Lead status updated successfully.',
            'status' => $LeadStatus->state_status
        ], 200);
    }

    public function toggleleadSourcechange($id)
    {
        // Retrieve the user by their primary key (ID)
        $LeadSource = LeadSource::findOrFail($id);

        // Toggle the user's status
        if ($LeadSource->state_lead_source == 1) {
            $LeadSource->state_lead_source = 0;
        } else {
            $LeadSource->state_lead_source = 1;
        }

        // Save the updated user record
        $LeadSource->save();

        // Return a response (e.g., JSON)
        return response()->json([
            'message' => 'Lead source updated successfully.',
            'status' => $LeadSource->state_lead_source
        ], 200);
    }

    public function toggleProptypeStatuschange($id)
    {
        // Retrieve the user by their primary key (ID)
        $PropertyType = PropertyType::findOrFail($id);

        // Toggle the user's status
        if ($PropertyType->state_property_type == 1) {
            $PropertyType->state_property_type = 0;
        } else {
            $PropertyType->state_property_type = 1;
        }

        // Save the updated user record
        $PropertyType->save();

        // Return a response (e.g., JSON)
        return response()->json([
            'message' => 'Property type status updated successfully.',
            'status' => $PropertyType->state_property_type
        ], 200);
    }

    public function togglePropSpecStatuschange($id)
    {
        // Retrieve the user by their primary key (ID)
        $PropertySpec = PropertySpec::findOrFail($id);

        // Toggle the user's status
        if ($PropertySpec->state_property_spec == 1) {
            $PropertySpec->state_property_spec = 0;
        } else {
            $PropertySpec->state_property_spec = 1;
        }

        // Save the updated user record
        $PropertySpec->save();

        // Return a response (e.g., JSON)
        return response()->json([
            'message' => 'Property Specification status updated successfully.',
            'status' => $PropertySpec->state_property_spec
        ], 200);
    }

    public function toggleRoleStatuschange($id)
    {
        // Retrieve the user by their primary key (ID)
        $Role = Role::findOrFail($id);

        // Toggle the user's status
        if ($Role->state_role_type == 1) {
            $Role->state_role_type = 0;
        } else {
            $Role->state_role_type = 1;
        }

        // Save the updated user record
        $Role->save();

        // Return a response (e.g., JSON)
        return response()->json([
            'message' => 'Role status updated successfully.',
            'status' => $Role->state_role_type
        ], 200);
    }

}
