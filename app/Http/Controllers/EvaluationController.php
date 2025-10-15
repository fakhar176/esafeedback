<?php
// app/Http/Controllers/EvaluationController.php

namespace App\Http\Controllers;

use App\Models\Designation;
use App\Models\District;
use App\Models\Evaluation;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Exports\EvaluationsExport;
use Maatwebsite\Excel\Facades\Excel;

class EvaluationController extends Controller
{
    public function showForm()
    {
//        $provance=Province::all();

        $districts=District::where('province_id','1')->get();
        $designations=Designation::all();
        return view('evaluation-form',compact('districts','designations'));
    }



    public function store_old(Request $request)
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


    public function store(Request $request)
    {
        // ✅ Validate all input fields
        $validated = $request->validate([
            'designation' => 'required|string|max:255',
            'experience' => 'required|string|max:255',
            'evaluation_date' => 'required|date',

            // ✅ 16 Rating questions
            'q1_evaluation_clarity' => 'required|integer|between:1,5',
            'q2_performance_alignment' => 'required|integer|between:1,5',
            'q3_time_adequacy' => 'required|integer|between:1,5',
            'q4_feedback_quality' => 'required|integer|between:1,5',
            'q5_scenario_relevance' => 'required|integer|between:1,5',
            'q6_capability_enhancement' => 'required|integer|between:1,5',
            'q7_skill_improvement' => 'required|integer|between:1,5',
            'q8_problem_solving' => 'required|integer|between:1,5',
            'q9_equipment_adequacy' => 'required|integer|between:1,5',
            'q10_safety_priority' => 'required|integer|between:1,5',
            'q11_process_organization' => 'required|integer|between:1,5',
            'q12_safety_satisfaction' => 'required|integer|between:1,5',
            'q13_consistent_standards' => 'required|integer|between:1,5',
            'q14_equal_opportunities' => 'required|integer|between:1,5',
            'q15_written_criteria' => 'required|integer|between:1,5',
            'q16_impartial_evaluators' => 'required|integer|between:1,5',

            // ✅ Open-ended questions
            'q17_learning_requirements' => 'nullable|string',
            'q18_additional_skills' => 'nullable|string',

            // ✅ Guest user info (only used if not logged in)
            'user_name' => 'nullable|string|max:255',
            'user_email' => 'nullable|email|max:255',
        ]);

        // ✅ Handle user info (auth or guest)
        if (auth()->check()) {
            // If logged in — take data from authenticated user
            $validated['user_id'] = auth()->id();
            $validated['user_name'] = auth()->user()->name ?? null;
            $validated['user_email'] = auth()->user()->email ?? null;
        } else {
            // Guest user — leave user_id null
            $validated['user_id'] = null;
        }

        // ✅ Create the evaluation record
        $evaluation = Evaluation::create($validated);

        // ✅ Compute overall score & category
        $evaluation->overall_score = $evaluation->calculateOverallScore();
        $evaluation->evaluation_category = $evaluation->determineCategory();
        $evaluation->save();

        // ✅ Return success JSON response
        return response()->json([
            'success' => true,
            'message' => 'تشخیص کا ڈیٹا کامیابی سے محفوظ ہو گیا ہے۔',
            'overall_score' => $evaluation->overall_score,
            'category' => $evaluation->evaluation_category,
        ]);
    }


    // ... rest of the controller methods
}
