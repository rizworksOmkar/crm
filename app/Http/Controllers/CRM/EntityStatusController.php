<?php

namespace App\Http\Controllers\CRM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LeadStatus;
use App\Models\Lead;

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
}
