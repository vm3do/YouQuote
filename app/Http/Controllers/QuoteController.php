<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Quote::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $vaidated = $request->validate([
            'title' => 'required|min:2|max:255',
            'body' => 'required',
        ]);

        $quote = Quote::create($vaidated);

        return $quote;
    }

    /**
     * Display the specified resource.
     */
    public function show(Quote $quote)
    {
        return $quote;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quote $quote)
    {
        $vaidated = $request->validate([
            'title' => 'required|min:2|max:255',
            'body' => 'required',
        ]);

        $quote->update($vaidated);

        return $quote;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quote $quote)
    {
        $quote->delete();
        return ['message' => 'quote deleted'];
    }
}
