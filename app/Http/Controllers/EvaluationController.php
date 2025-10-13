<?php
// app/Http/Controllers/EvaluationController.php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use Illuminate\Http\Request;
use App\Exports\EvaluationsExport;
use Maatwebsite\Excel\Facades\Excel;

class EvaluationController extends Controller
{
    public function showForm()
    {
        return view('evaluation-form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'designation' => 'required|string|max:255',
            'experience' => 'required|string|max:255',
            'evaluation_date' => 'required|date',

            // All 16 rating questions
            'q1_evaluation_clarity' => 'required|integer|between:1,5',
            'q2_performance_alignment' => 'required|integer|between:1,5',
            // ... include all 16 questions validation
            'q16_impartial_evaluators' => 'required|integer|between:1,5',

            // Open-ended questions
            'q17_learning_requirements' => 'nullable|string',
            'q18_additional_skills' => 'nullable|string',
        ]);

        // Add user_id to validated data
        $validated['user_id'] = auth()->id();

        // Create evaluation
        $evaluation = Evaluation::create($validated);

        // Calculate and save overall score and category
        $evaluation->overall_score = $evaluation->calculateOverallScore();
        $evaluation->evaluation_category = $evaluation->determineCategory();
        $evaluation->save();

        return response()->json([
            'success' => true,
            'message' => 'تشخیص کا ڈیٹا کامیابی سے محفوظ ہو گیا ہے۔',
            'overall_score' => $evaluation->overall_score,
            'category' => $evaluation->evaluation_category
        ]);
    }

    // ... rest of the controller methods
}
