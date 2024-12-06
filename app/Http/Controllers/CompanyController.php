<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //

    public function index()
    {
        //
        return response()->json([
            'success' => true,
            'data' => Company::all(),
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
            'company_name' => 'required',
            'representative_name' => 'required',
            'address' => 'required',
            'company_logo' => 'sometimes',
            'about_us' => 'sometimes',
            'company_type' => 'required',
            'country' => 'required',
            'status' => 'required',
            'user_id' => 'required'
        ]);

        $company = Company::create([
            'company_id' => $request->company_id,
            'company_name' => $request->company_name,
            'representative_name' => $request->representative_name,
            'address' => $request->address,
            'company_logo' => $request->company_logo,
            'about_us' => $request->about_us,
            'company_type' => $request->company_type,
            'country' => $request->country,
            'status' => $request->status,
            'user_id' => $request->user_id,
        ]);

        if ($company) {
            return response()->json([
                'success' => true,
                'data' => $company,
                'message' => 'Data berhasil ditambah',
            ], 201);
        }
    }
}
