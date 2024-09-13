<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Medicine;

class DashboardController extends Controller
{
    public function index()
    {
        $medicineCount = Medicine::count();  // Get the count of medicines

        // Return the count to the Inertia dashboard view
        return inertia('Admin/Dashboard', [
            'medicineCount' => $medicineCount
        ]);
    }
}
