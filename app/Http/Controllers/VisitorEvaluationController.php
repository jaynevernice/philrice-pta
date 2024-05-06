<?php

namespace App\Http\Controllers;

use App\Models\VisitorEvaluation;
use App\Models\WebAnalytics;
use Illuminate\Http\Request;

class VisitorEvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // 'sex' => 'required',
            'name' => 'nullable|string',
            'sector' => 'required',
            'purpose' => 'required|string',
        ]);

        VisitorEvaluation::create($validatedData);

        return redirect()->back()->with('success', 'Form submitted successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getEvaluations()
    {
        // $evaluations = VisitorEvaluation::all();
        $evaluations = VisitorEvaluation::paginate(5);
        return response()->json(['evaluations' => $evaluations]);
    }
}
