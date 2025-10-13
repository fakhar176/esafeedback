<?php
// app/Models/Evaluation.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'designation',
        'experience',
        'evaluation_date',
        'q1_evaluation_clarity',
        'q2_performance_alignment',
        'q3_time_adequacy',
        'q4_feedback_quality',
        'q5_scenario_relevance',
        'q6_capability_enhancement',
        'q7_skill_improvement',
        'q8_problem_solving',
        'q9_equipment_adequacy',
        'q10_safety_priority',
        'q11_process_organization',
        'q12_safety_satisfaction',
        'q13_consistent_standards',
        'q14_equal_opportunities',
        'q15_written_criteria',
        'q16_impartial_evaluators',
        'q17_learning_requirements',
        'q18_additional_skills',
        'overall_score',
        'evaluation_category'
    ];

    protected $casts = [
        'evaluation_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Calculate overall score
    public function calculateOverallScore()
    {
        $ratings = [
            $this->q1_evaluation_clarity,
            $this->q2_performance_alignment,
            $this->q3_time_adequacy,
            $this->q4_feedback_quality,
            $this->q5_scenario_relevance,
            $this->q6_capability_enhancement,
            $this->q7_skill_improvement,
            $this->q8_problem_solving,
            $this->q9_equipment_adequacy,
            $this->q10_safety_priority,
            $this->q11_process_organization,
            $this->q12_safety_satisfaction,
            $this->q13_consistent_standards,
            $this->q14_equal_opportunities,
            $this->q15_written_criteria,
            $this->q16_impartial_evaluators,
        ];

        $validRatings = array_filter($ratings, function($rating) {
            return !is_null($rating);
        });

        if (count($validRatings) > 0) {
            return array_sum($validRatings) / count($validRatings);
        }

        return null;
    }

    // Determine evaluation category
    public function determineCategory()
    {
        $score = $this->overall_score;

        if ($score >= 4.5) return 'بہترین';
        if ($score >= 4.0) return 'بہت اچھا';
        if ($score >= 3.5) return 'اچھا';
        if ($score >= 3.0) return 'متوسط';
        if ($score >= 2.5) return 'کم';
        return 'ناقص';
    }
}
