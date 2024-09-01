<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        return Report::with('user')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'report_data' => 'required|string',
            'generated_at' => 'required|date',
        ]);

        $report = Report::create($request->all());

        return response()->json($report, 201);
    }

    public function show(Report $report)
    {
        return $report->load('user');
    }

    public function update(Request $request, Report $report)
    {
        $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            'report_data' => 'sometimes|string',
            'generated_at' => 'sometimes|date',
        ]);

        $report->update($request->all());

        return response()->json($report);
    }

    public function destroy(Report $report)
    {
        $report->delete();

        return response()->json(null, 204);
    }
}
