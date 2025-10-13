<?php
// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEvaluations = Evaluation::count();
        $averageScore = Evaluation::avg('overall_score') ?? 0;
        $userEvaluations = Evaluation::where('user_id', auth()->id())->count();

        // Category distribution
        $categoryDistribution = Evaluation::select('evaluation_category', DB::raw('COUNT(*) as count'))
            ->groupBy('evaluation_category')
            ->get();

        // Recent evaluations
        $recentEvaluations = Evaluation::with('user')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Score distribution
        $scoreRanges = [
            '4.5-5.0' => Evaluation::whereBetween('overall_score', [4.5, 5.0])->count(),
            '4.0-4.4' => Evaluation::whereBetween('overall_score', [4.0, 4.4])->count(),
            '3.5-3.9' => Evaluation::whereBetween('overall_score', [3.5, 3.9])->count(),
            '3.0-3.4' => Evaluation::whereBetween('overall_score', [3.0, 3.4])->count(),
            '2.9 اور کم' => Evaluation::where('overall_score', '<', 3.0)->count(),
        ];

        return view('dashboard', compact(
            'totalEvaluations',
            'averageScore',
            'userEvaluations',
            'categoryDistribution',
            'recentEvaluations',
            'scoreRanges'
        ));
    }
}
