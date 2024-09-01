<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        return Document::with('medicalRecord')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'medical_record_id' => 'required|exists:medical_records,id',
            'file_path' => 'required|string',
            'uploaded_at' => 'required|date',
        ]);

        $document = Document::create($request->all());

        return response()->json($document, 201);
    }

    public function show(Document $document)
    {
        return $document->load('medicalRecord');
    }

    public function update(Request $request, Document $document)
    {
        $request->validate([
            'medical_record_id' => 'sometimes|exists:medical_records,id',
            'file_path' => 'sometimes|string',
            'uploaded_at' => 'sometimes|date',
        ]);

        $document->update($request->all());

        return response()->json($document);
    }

    public function destroy(Document $document)
    {
        $document->delete();

        return response()->json(null, 204);
    }
}
