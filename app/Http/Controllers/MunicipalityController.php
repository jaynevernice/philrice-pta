<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Municipality;

class MunicipalityController extends Controller
{
    public function index(Request $request)
    {
        // $data['municipalities'] = Municipality::where('provCode', $request->provCode)
        $data = Municipality::where('provCode', $request->provCode)
            ->orderBy('citymunDesc', 'asc')
            ->get(['citymunDesc', 'citymunCode']);
        
        return response()->json($data);
    }
}
