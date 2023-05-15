<?php

namespace App\Http\Controllers;

use App\Models\CargoTemplate;
use Illuminate\Http\Request;

class CargoTemplateController extends Controller
{
    public function getCargoTemplates()
    {
        return response()->json(['success' => true, 'data' => CargoTemplate::all()]);
    }
}