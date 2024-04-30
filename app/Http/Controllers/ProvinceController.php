<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Province;

class ProvinceController extends Controller
{
    public function index(Request $request)
    {   
        if(empty($request->regCode)) {
            $data = Province::select('*')
                ->orderBy('provDesc', 'asc')
                ->get(['provDesc', 'provCode']);
        } else {
            $data = Province::where('regCode', $request->regCode)
                ->orderBy('provDesc', 'asc')
                ->get(['provDesc', 'provCode']);
        }

        return response()->json($data);
    }
}
