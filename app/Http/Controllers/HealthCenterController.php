<?php

namespace App\Http\Controllers;

use App\Models\HealthCenter;
use Illuminate\Http\Request;

class HealthCenterController extends Controller
{
    public function index()
    {
        return HealthCenter::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'contact_info' => 'required|string',
        ]);

        $healthCenter = HealthCenter::create($request->all());

        return response()->json($healthCenter, 201);
    }

    public function show(HealthCenter $healthCenter)
    {
        return $healthCenter;
    }

    public function update(Request $request, HealthCenter $healthCenter)
    {
        $request->validate([
            'name' => 'sometimes|string',
            'address' => 'sometimes|string',
            'contact_info' => 'sometimes|string',
        ]);

        $healthCenter->update($request->all());

        return response()->json($healthCenter);
    }

    public function destroy(HealthCenter $healthCenter)
    {
        $healthCenter->delete();

        return response()->json(null, 204);
    }
}
