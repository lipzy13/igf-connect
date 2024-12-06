<?php

namespace App\Http\Controllers;

use App\Models\KeyProductLine;
use Illuminate\Http\Request;

class KeyProductLineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json([
            'success' => true,
            'data' => KeyProductLine::all(),
            "message" => "Data berhasil ditemukan",
        ]);
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
        $request->validate([
            'company_id' => 'required',
            'name' => 'required',
        ]);

        $keyprod = KeyProductLine::create([
            'company_id' => $request->company_id,
            'name' => $request->name,
        ]);

        if ($keyprod) {
            return response()->json([
                'success' => true,
                'data' => $keyprod,
                'message' => 'Data berhasil ditambah',
            ], 201);
        }
    }

    public function getKeyProductByCompanyId(KeyProductLine $keyProd)
    {
        $result = KeyProductLine::select('name')->where('company_id', '=', $keyProd->company_id);

        if ($result) {
            return response()->json([
                'success' => true,
                'data' => $result,
                'message' => 'Data berhasil ditemukan',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(KeyProductLine $keyProductLine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KeyProductLine $keyProductLine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KeyProductLine $keyProductLine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KeyProductLine $keyProductLine)
    {
        //
    }
}
