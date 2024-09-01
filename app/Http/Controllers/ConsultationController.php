<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function index()
    {
        return Consultation::with('appointment', 'medicalRecord', 'doctor')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'medical_record_id' => 'required|exists:medical_records,id',
            'doctor_id' => 'required|exists:users,id',
            'consultation_notes' => 'required|string',
            'consultation_date' => 'required|date',
        ]);

        $consultation = Consultation::create($request->all());

        return response()->json($consultation, 201);
    }

    public function show(Consultation $consultation)
    {
        return $consultation->load('appointment', 'medicalRecord', 'doctor');
    }

    public function update(Request $request, Consultation $consultation)
    {
        $request->validate([
            'appointment_id' => 'sometimes|exists:appointments,id',
            'medical_record_id' => 'sometimes|exists:medical_records,id',
            'doctor_id' => 'sometimes|exists:users,id',
            'consultation_notes' => 'sometimes|string',
            'consultation_date' => 'sometimes|date',
        ]);

        $consultation->update($request->all());

        return response()->json($consultation);
    }

    public function destroy(Consultation $consultation)
    {
        $consultation->delete();

        return response()->json(null, 204);
    }
}
