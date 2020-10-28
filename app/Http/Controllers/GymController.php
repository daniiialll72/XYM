<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use Illuminate\Http\Request;

class GymController extends Controller
{
    public function index()
    {
        $gyms = Gym::all();
        return view('panel.gyms')->with('gyms',$gyms);
    }

    public function add(Request $request)
    {
    }
    public function delete()
    {
    }
}
