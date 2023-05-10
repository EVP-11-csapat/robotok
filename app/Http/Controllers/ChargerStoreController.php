<?php

namespace App\Http\Controllers;

use App\Models\ChargerStore;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ChargerStoreController extends Controller
{
    public function getStoreChargers() : JsonResponse {
        $data = ChargerStore::all();
        return response()->json($data);
    }
}
