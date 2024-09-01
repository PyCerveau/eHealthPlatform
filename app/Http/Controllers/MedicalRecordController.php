<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use Illuminate\Http\Request;

class MedicalRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return MedicalRecord::with('user', 'consultations', 'prescriptions', 'documents')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'record_details' => 'required|string',
        ]);

        $medicalRecord = MedicalRecord::create($request->all());

        return response()->json($medicalRecord, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(MedicalRecord $medicalRecord)
    {
        return $medicalRecord->load('user', 'consultations', 'prescriptions', 'documents');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MedicalRecord $medicalRecord)
    {
        $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            'record_details' => 'sometimes|string',
        ]);

        $medicalRecord->update($request->all());

        return response()->json($medicalRecord);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MedicalRecord $medicalRecord)
    {
        $medicalRecord->delete();

        return response()->json(null, 204);
    }
}
