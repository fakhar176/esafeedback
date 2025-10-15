<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('evaluations', function (Blueprint $table) {

            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->string('designation');
            $table->string('district');
            $table->string('experience');
            $table->date('evaluation_date');

            // Evaluation Structure and Clarity (Questions 1-4)
            $table->integer('q1_evaluation_clarity')->nullable();
            $table->integer('q2_performance_alignment')->nullable();
            $table->integer('q3_time_adequacy')->nullable();
            $table->integer('q4_feedback_quality')->nullable();

            // Practical Relevance of Scenarios (Questions 5-8)
            $table->integer('q5_scenario_relevance')->nullable();
            $table->integer('q6_capability_enhancement')->nullable();
            $table->integer('q7_skill_improvement')->nullable();
            $table->integer('q8_problem_solving')->nullable();

            // Environment and Safety Arrangements (Questions 9-12)
            $table->integer('q9_equipment_adequacy')->nullable();
            $table->integer('q10_safety_priority')->nullable();
            $table->integer('q11_process_organization')->nullable();
            $table->integer('q12_safety_satisfaction')->nullable();

            // Transparency of Evaluation (Questions 13-16)
            $table->integer('q13_consistent_standards')->nullable();
            $table->integer('q14_equal_opportunities')->nullable();
            $table->integer('q15_written_criteria')->nullable();
            $table->integer('q16_impartial_evaluators')->nullable();

            // Open-ended questions
            $table->text('q17_learning_requirements')->nullable();
            $table->text('q18_additional_skills')->nullable();

            // Analysis fields
            $table->decimal('overall_score', 5, 2)->nullable();
            $table->string('evaluation_category')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};
