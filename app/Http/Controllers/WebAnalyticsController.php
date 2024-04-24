<?php

namespace App\Http\Controllers;

use App\Models\WebAnalytics;
use Illuminate\Http\Request;

class WebAnalyticsController extends Controller
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
        //
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

    public function incrementSiteView()
    {
        // Find the record in the web_analytics table
        $analytics = WebAnalytics::first();

        if ($analytics) {
            // Increment the site_view column
            $analytics->increment('site_views', 1);
        } else {
            // Create a new record if it doesn't exist
            WebAnalytics::create(['site_views' => 1]);
        }

        // Redirect back or to any other page
        return redirect()->route('guest.overview');
        
    }

    public function fetchSiteView() {
        $siteViews = WebAnalytics::value('site_views');
        return response()->json(['siteViews' => $siteViews]);
    }
}
