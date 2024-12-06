<?php

namespace App\Http\Controllers;

use App\Models\BizMatch;
use Illuminate\Http\Request;

class BizMatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json([
            'success' => true,
            'data' => BizMatch::all(),
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

        $bizmatch = BizMatch::create([
            'company_id' => $request->company_id,
            'name' => $request->name,
        ]);

        if ($bizmatch) {
            return response()->json([
                'success' => true,
                'data' => $bizmatch,
                'message' => 'Data berhasil ditambah',
            ], 201);
        }
    }

    public function getBizMatchByCompanyId(BizMatch $bizMatch)
    {
        $result = BizMatch::select('name')->where('company_id', '=', $bizMatch->company_id);

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
    public function show(BizMatch $bizMatch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BizMatch $bizMatch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BizMatch $bizMatch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BizMatch $bizMatch)
    {
        //
    }
}
