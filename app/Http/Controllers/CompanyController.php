<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\KeyProductLine;
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
        $validatedData = $request->validate([
            'company_name' => 'required',
            'representative_name' => 'required',
            'address' => 'required',
            'company_logo' => 'sometimes',
            'about_us' => 'sometimes',
            'company_type' => 'required',
            'country' => 'required',
            'status' => 'required',
            'user_id' => 'required',
            'key_product_lines' => 'sometimes|array',
            'key_product_lines.*.nama' => 'sometimes',
            'biz_matchings' => 'sometimes|array',
            'biz_matchings.*' => 'sometimes',
            'prefered_platforms' => 'sometimes|array',
            'preferred_platforms.*' => 'sometimes',
        ]);

        $company = Company::create([
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

        if (isset($validatedData['key_product_Lines'])) {
            foreach ($validatedData['key_product_lines'] as $prod) {
                $company->keyproductline()->create([
                    'nama' => $prod->nama,
                    'company_id' => $company->id
                ]);
            }
        }

        if (isset($validatedData['biz_matchings'])) {
            foreach ($validatedData['biz_matchings'] as $bizmatch) {
                $company->bizmatch()->create([
                    'nama' => $bizmatch->nama,
                    'company_id' => $company->id
                ]);
            }
        }

        if (isset($validatedData['preffered_platforms'])) {
            foreach ($validatedData['preffered_platforms'] as $prefplat) {
                $company->preferred_platform()->create([
                    'nama' => $prefplat->nama,
                    'company_id' => $company->id
                ]);
            }
        }


        return response()->json([
            'success' => true,
            'message' => 'Data berhasil ditambah',
        ], 201);
    }
}
