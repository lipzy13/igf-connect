<?php

namespace App\Http\Controllers;

use App\Models\PrefferedPlatform;
use Illuminate\Http\Request;

class PrefferedPlatformController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json([
            'success' => true,
            'data' => PrefferedPlatform::all(),
            'message' => 'Data berhasil ditemukan',
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

        $prefPlat = PrefferedPlatform::create([
            'company_id' => $request->company_id,
            'name' => $request->name,
        ]);

        if ($prefPlat) {
            return response()->json([
                'success' => true,
                'data' => $prefPlat,
                'message' => 'Data berhasil ditambah',
            ], 201);
        }
    }

    public function getPrefPlatByCompanyId(PrefferedPlatform $prefPlat)
    {
        $result = PrefferedPlatform::select('name')->where('company_id', '=', $prefPlat->company_id);

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
    public function show(PrefferedPlatform $prefferedPlatform)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PrefferedPlatform $prefferedPlatform)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PrefferedPlatform $prefferedPlatform)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PrefferedPlatform $prefferedPlatform)
    {
        //
    }
}
