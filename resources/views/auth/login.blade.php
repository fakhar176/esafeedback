@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Header Card -->
                <div class="card mb-4" style="border-radius: 15px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);">
                    <div class="card-body text-center py-4" style="background: linear-gradient(to right, #c0392b, #e74c3c); color: white;">
                        <h1 class="mb-3">
                            <i class="fas fa-first-aid me-2"></i>
                            ایمرجنسی سروسز اکیڈمی
                        </h1>
                        <p class="mb-0">ریسکیو 1122 - لاگ ان پورٹل</p>
                    </div>
                </div>

                <!-- Login Card -->
                <div class="card" style="border-radius: 15px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2); border: none;">
                    <div class="card-header text-center py-3" style="background: linear-gradient(to right, #3498db, #2980b9); color: white; border-radius: 15px 15px 0 0 !important;">
                        <h4 class="mb-0">
                            <i class="fas fa-sign-in-alt me-2"></i>
                            {{ __('لاگ ان') }}
                        </h4>
                    </div>

                    <div class="card-body py-4">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email Field -->
                            <div class="row mb-4">
                                <label for="email" class="col-md-4 col-form-label text-md-end" style="font-weight: bold; color: #2c3e50;">
                                    <i class="fas fa-envelope me-2"></i>
                                    {{ __('ای میل ایڈریس') }}
                                </label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                           name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                           style="padding: 12px 15px; border: 2px solid #ddd; border-radius: 8px; font-size: 16px; transition: all 0.3s;"
                                           onfocus="this.style.borderColor='#e74c3c'; this.style.boxShadow='0 0 0 3px rgba(231, 76, 60, 0.2)';"
                                           onblur="this.style.borderColor='#ddd'; this.style.boxShadow='none';"
                                           placeholder="اپنا ای میل درج کریں">

                                    @error('email')
                                    <div class="invalid-feedback d-block" style="font-size: 14px;">
                                        <i class="fas fa-exclamation-circle me-1"></i>
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Password Field -->
                            <div class="row mb-4">
                                <label for="password" class="col-md-4 col-form-label text-md-end" style="font-weight: bold; color: #2c3e50;">
                                    <i class="fas fa-lock me-2"></i>
                                    {{ __('پاس ورڈ') }}
                                </label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                           name="password" required autocomplete="current-password"
                                           style="padding: 12px 15px; border: 2px solid #ddd; border-radius: 8px; font-size: 16px; transition: all 0.3s;"
                                           onfocus="this.style.borderColor='#e74c3c'; this.style.boxShadow='0 0 0 3px rgba(231, 76, 60, 0.2)';"
                                           onblur="this.style.borderColor='#ddd'; this.style.boxShadow='none';"
                                           placeholder="اپنا پاس ورڈ درج کریں">

                                    @error('password')
                                    <div class="invalid-feedback d-block" style="font-size: 14px;">
                                        <i class="fas fa-exclamation-circle me-1"></i>
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Remember Me & Forgot Password -->
                            <div class="row mb-4">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}
                                        style="transform: scale(1.2); margin-left: 5px;">

                                        <label class="form-check-label" for="remember" style="color: #2c3e50; font-weight: 500;">
                                            <i class="fas fa-check-circle me-1"></i>
                                            {{ __('مجھے یاد رکھیں') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Login Button -->
                            <div class="row mb-3">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary"
                                            style="padding: 12px 30px; background: linear-gradient(to right, #2ecc71, #27ae60); border: none; border-radius: 8px; font-size: 18px; font-weight: bold; transition: all 0.3s; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);"
                                            onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 10px rgba(0, 0, 0, 0.15)';"
                                            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 6px rgba(0, 0, 0, 0.1)';">
                                        <i class="fas fa-sign-in-alt me-2"></i>
                                        {{ __('لاگ ان') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link mt-2 d-block" href="{{ route('password.request') }}"
                                           style="color: #e74c3c; text-decoration: none; font-weight: 500;">
                                            <i class="fas fa-key me-1"></i>
                                            {{ __('پاس ورڈ بھول گئے؟') }}
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <!-- Register Link -->
                            <div class="row">
                                <div class="col-md-8 offset-md-4">
                                    <hr style="border-color: #ddd;">
                                    <p class="text-muted mb-2">
                                        {{ __('اکاؤنٹ نہیں ہے؟') }}
                                    </p>
                                    <a href="{{ route('register') }}" class="btn btn-outline-primary"
                                       style="border: 2px solid #3498db; color: #3498db; border-radius: 8px; font-weight: 500; transition: all 0.3s;"
                                       onmouseover="this.style.background='#3498db'; this.style.color='white';"
                                       onmouseout="this.style.background='transparent'; this.style.color='#3498db';">
                                        <i class="fas fa-user-plus me-2"></i>
                                        {{ __('نیا اکاؤنٹ بنائیں') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Features Card -->
                <div class="card mt-4" style="border-radius: 15px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); border: none;">
                    <div class="card-body">
                        <h5 class="text-center mb-3" style="color: #2c3e50;">
                            <i class="fas fa-star me-2"></i>
                            سسٹم کی خصوصیات
                        </h5>
                        <div class="row text-center">
                            <div class="col-md-4 mb-3">
                                <div class="text-primary">
                                    <i class="fas fa-clipboard-list fa-2x mb-2"></i>
                                </div>
                                <h6 style="color: #2c3e50;">تشخیص فارم</h6>
                                <small class="text-muted">پیشہ ورانہ مہارت کی تشخیص</small>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="text-success">
                                    <i class="fas fa-chart-line fa-2x mb-2"></i>
                                </div>
                                <h6 style="color: #2c3e50;">تجزیہ رپورٹس</h6>
                                <small class="text-muted">مکمل کارکردگی کا تجزیہ</small>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="text-warning">
                                    <i class="fas fa-file-excel fa-2x mb-2"></i>
                                </div>
                                <h6 style="color: #2c3e50;">ایکسل ایکسپورٹ</h6>
                                <small class="text-muted">ڈیٹا کی برآمدگی</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .card {
            border: none;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .form-control:focus {
            border-color: #e74c3c !important;
            box-shadow: 0 0 0 3px rgba(231, 76, 60, 0.2) !important;
        }

        .btn-primary:hover {
            background: linear-gradient(to right, #27ae60, #219653) !important;
        }

        .invalid-feedback {
            display: block;
            margin-top: 5px;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add smooth animations
            const cards = document.querySelectorAll('.card');
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';

                setTimeout(() => {
                    card.style.transition = 'all 0.5s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 200);
            });
        });
    </script>
@endsection
