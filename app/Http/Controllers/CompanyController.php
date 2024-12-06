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
            'key_product_lines.*' => 'sometimes',
            'biz_matchings' => 'sometimes|array',
            'biz_matchings.*' => 'sometimes',
            'preferred_platforms' => 'sometimes|array',
            'preferred_platforms.*' => 'sometimes',
            'schedules' => 'sometimes|array',
            'schedules.*.date' => 'sometimes',
            'schedules.*.time_start' => 'sometimes',
            'schedules.*.time_end' => 'sometimes',
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

        if (isset($validatedData['key_product_lines'])) {
            foreach ($validatedData['key_product_lines'] as $prod) {
                $company->keyproductline()->create([
                    'name' => $prod,
                ]);
            }
        }

        if (isset($validatedData['biz_matchings'])) {
            foreach ($validatedData['biz_matchings'] as $bizmatch) {
                $company->bizmatch()->create([
                    'name' => $bizmatch,
                ]);
            }
        }

        if (isset($validatedData['preferred_platforms'])) {
            foreach ($validatedData['preferred_platforms'] as $prefplat) {
                $company->preferred_platform()->create([
                    'name' => $prefplat,
                ]);
            }
        }

        if (isset($validatedData['schedules'])) {
            foreach ($validatedData['schedules'] as $schedule) {
                $company->schedule()->create([
                    'date' => $schedule["date"],
                    'time_start' => $schedule["time_start"],
                    'time_end' => $schedule["time_end"],
                ]);
            }
        }


        return response()->json([
            'success' => true,
            'message' => 'Data berhasil ditambah',
        ], 201);
    }
}
