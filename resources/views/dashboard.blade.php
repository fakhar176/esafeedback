@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Welcome Card -->
        <div class="card mb-4">
            <div class="card-body text-center py-5">
                <h1 class="display-4 text-primary mb-3">
                    <i class="fas fa-first-aid"></i>
                    خوش آمدید!
                </h1>
                <h2 class="text-dark">{{ Auth::user()->name }}</h2>
                <p class="lead text-muted">ایمرجنسی سروسز اکیڈمی کے تشخیص سسٹم میں آپ کا استقبال ہے</p>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="row mb-4">
            <div class="col-md-4 mb-3">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <div class="text-primary mb-3">
                            <i class="fas fa-clipboard-list fa-3x"></i>
                        </div>
                        <h3 class="text-primary">{{ $totalEvaluations }}</h3>
                        <p class="text-muted">کل تشخیصات</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <div class="text-success mb-3">
                            <i class="fas fa-chart-line fa-3x"></i>
                        </div>
                        <h3 class="text-success">{{ number_format($averageScore, 1) }}/5.0</h3>
                        <p class="text-muted">اوسط اسکور</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <div class="text-warning mb-3">
                            <i class="fas fa-user fa-3x"></i>
                        </div>
                        <h3 class="text-warning">{{ $userEvaluations }}</h3>
                        <p class="text-muted">آپ کے تشخیصات</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Row -->
        <div class="row mb-4">
            <div class="col-md-6 mb-3">
                <div class="card h-100">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">
                            <i class="fas fa-chart-pie me-2"></i>
                            تشخیصی زمرہ جات
                        </h5>
                    </div>
                    <div class="card-body">
                        <canvas id="categoryChart" height="250"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="card h-100">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">
                            <i class="fas fa-chart-bar me-2"></i>
                            اسکور تقسیم
                        </h5>
                    </div>
                    <div class="card-body">
                        <canvas id="scoreChart" height="250"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card h-100">
                    <div class="card-header bg-warning text-white">
                        <h5 class="mb-0">
                            <i class="fas fa-bolt me-2"></i>
                            فوری اقدامات
                        </h5>
                    </div>
                    <div class="card-body text-center">
                        <a href="{{ route('evaluation.form') }}" class="btn btn-primary btn-lg mb-3 w-100">
                            <i class="fas fa-plus-circle me-2"></i>
                            نیا تشخیص فارم
                        </a>
                        <a href="{{ route('evaluation.export') }}" class="btn btn-success btn-lg mb-3 w-100">
                            <i class="fas fa-file-excel me-2"></i>
                            ایکسل رپورٹ ڈاؤن لوڈ
                        </a>
                        <a href="{{ route('evaluation.analysis') }}" class="btn btn-info btn-lg w-100">
                            <i class="fas fa-chart-line me-2"></i>
                            مکمل تجزیہ دیکھیں
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="card h-100">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0">
                            <i class="fas fa-history me-2"></i>
                            حالیہ تشخیصات
                        </h5>
                    </div>
                    <div class="card-body">
                        @if($recentEvaluations->count() > 0)
                            @foreach($recentEvaluations as $evaluation)
                                <div class="d-flex justify-content-between align-items-center border-bottom py-2">
                                    <div>
                                        <strong>{{ $evaluation->user->name }}</strong>
                                        <br>
                                        <small class="text-muted">{{ $evaluation->designation }}</small>
                                    </div>
                                    <div class="text-end">
                                        <span class="badge bg-primary">{{ $evaluation->overall_score }}/5.0</span>
                                        <br>
                                        <small class="text-muted">{{ $evaluation->created_at->format('d/m/Y') }}</small>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class="text-center text-muted my-4">ابھی تک کوئی تشخیص درج نہیں ہوئی</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
        <script>
            // Category Distribution Chart
            const categoryCtx = document.getElementById('categoryChart').getContext('2d');
            const categoryChart = new Chart(categoryCtx, {
                type: 'pie',
                data: {
                    labels: {!! json_encode($categoryDistribution->pluck('evaluation_category')) !!},
                    datasets: [{
                        data: {!! json_encode($categoryDistribution->pluck('count')) !!},
                        backgroundColor: [
                            '#2ecc71',
                            '#3498db',
                            '#e74c3c',
                            '#f39c12',
                            '#9b59b6'
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            rtl: true
                        }
                    }
                }
            });

            // Score Distribution Chart
            const scoreCtx = document.getElementById('scoreChart').getContext('2d');
            const scoreChart = new Chart(scoreCtx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode(array_keys($scoreRanges)) !!},
                    datasets: [{
                        label: 'تشخیصات',
                        data: {!! json_encode(array_values($scoreRanges)) !!},
                        backgroundColor: '#3498db'
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    @endsection
@endsection
