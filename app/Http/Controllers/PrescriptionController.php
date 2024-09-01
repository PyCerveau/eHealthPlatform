<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    public function index()
    {
        return Prescription::with('medicalRecord', 'doctor')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'medical_record_id' => 'required|exists:medical_records,id',
            'doctor_id' => 'required|exists:users,id',
            'medication_details' => 'required|string',
            'dosage' => 'required|string',
            'duration' => 'required|string',
        ]);

        $prescription = Prescription::create($request->all());

        return response()->json($prescription, 201);
    }

    public function show(Prescription $prescription)
    {
        return $prescription->load('medicalRecord', 'doctor');
    }

    public function update(Request $request, Prescription $prescription)
    {
        $request->validate([
            'medical_record_id' => 'sometimes|exists:medical_records,id',
            'doctor_id' => 'sometimes|exists:users,id',
            'medication_details' => 'sometimes|string',
            'dosage' => 'sometimes|string',
            'duration' => 'sometimes|string',
        ]);

        $prescription->update($request->all());

        return response()->json($prescription);
    }

    public function destroy(Prescription $prescription)
    {
        $prescription->delete();

        return response()->json(null, 204);
    }
}
