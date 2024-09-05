<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class Cart extends Controller
{
    public function index()
    {
        // Retrieve all medicines using the Medicine model
        $medicines = Medicine::all();

        // Pass the retrieved data to the view using Inertia
        return Inertia::render('Medicines/Index', [
            'medicines' => $medicines
        ]);
    } 
}
