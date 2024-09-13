<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Inertia\Inertia;
use App\Models\Announcement;
use App\Models\Medicine;



class AnnouncementController extends Controller
{
    public function index()
    {
        // Retrieve all medicines using the Medicine model
        $medicines = Medicine::all();

        // Pass the retrieved data to the view using Inertia
        return Inertia::render('Admin/Announcements/Index', [
            'medicines' => $medicines
        ]);
    }
    public function store(Request $request)
    {
        Medicine::create([
            'name' => $request->name,
            'lprice' => $request->lprice,
            'mprice' => $request->mprice,
            'hprice' => $request->hprice,
            'quantity' => $request->quantity,
            'dosage' => $request->dosage,
            'expdate' => $request->expdate,
        ]);

        return redirect()->route('admin.announcements.index');
    }
}
