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
                        <p class="mb-0">ریسکیو 1122 - نیا اکاؤنٹ بنائیں</p>
                    </div>
                </div>

                <!-- Register Card -->
                <div class="card" style="border-radius: 15px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2); border: none;">
                    <div class="card-header text-center py-3" style="background: linear-gradient(to right, #3498db, #2980b9); color: white; border-radius: 15px 15px 0 0 !important;">
                        <h4 class="mb-0">
                            <i class="fas fa-user-plus me-2"></i>
                            {{ __('نیا اکاؤنٹ بنائیں') }}
                        </h4>
                    </div>

                    <div class="card-body py-4">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Name Field -->
                            <div class="row mb-4">
                                <label for="name" class="col-md-4 col-form-label text-md-end" style="font-weight: bold; color: #2c3e50;">
                                    <i class="fas fa-user me-2"></i>
                                    {{ __('مکمل نام') }}
                                </label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                           name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                           style="padding: 12px 15px; border: 2px solid #ddd; border-radius: 8px; font-size: 16px; transition: all 0.3s;"
                                           onfocus="this.style.borderColor='#e74c3c'; this.style.boxShadow='0 0 0 3px rgba(231, 76, 60, 0.2)';"
                                           onblur="this.style.borderColor='#ddd'; this.style.boxShadow='none';"
                                           placeholder="اپنا مکمل نام درج کریں">

                                    @error('name')
                                    <div class="invalid-feedback d-block mt-2" style="font-size: 14px; background: #fee; padding: 8px; border-radius: 5px; border-right: 3px solid #e74c3c;">
                                        <i class="fas fa-exclamation-circle me-1"></i>
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Email Field -->
                            <div class="row mb-4">
                                <label for="email" class="col-md-4 col-form-label text-md-end" style="font-weight: bold; color: #2c3e50;">
                                    <i class="fas fa-envelope me-2"></i>
                                    {{ __('ای میل ایڈریس') }}
                                </label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                           name="email" value="{{ old('email') }}" required autocomplete="email"
                                           style="padding: 12px 15px; border: 2px solid #ddd; border-radius: 8px; font-size: 16px; transition: all 0.3s;"
                                           onfocus="this.style.borderColor='#e74c3c'; this.style.boxShadow='0 0 0 3px rgba(231, 76, 60, 0.2)';"
                                           onblur="this.style.borderColor='#ddd'; this.style.boxShadow='none';"
                                           placeholder="example@domain.com">

                                    @error('email')
                                    <div class="invalid-feedback d-block mt-2" style="font-size: 14px; background: #fee; padding: 8px; border-radius: 5px; border-right: 3px solid #e74c3c;">
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
                                           name="password" required autocomplete="new-password"
                                           style="padding: 12px 15px; border: 2px solid #ddd; border-radius: 8px; font-size: 16px; transition: all 0.3s;"
                                           onfocus="this.style.borderColor='#e74c3c'; this.style.boxShadow='0 0 0 3px rgba(231, 76, 60, 0.2)';"
                                           onblur="this.style.borderColor='#ddd'; this.style.boxShadow='none';"
                                           placeholder="کم از کم 8 حروف">

                                    @error('password')
                                    <div class="invalid-feedback d-block mt-2" style="font-size: 14px; background: #fee; padding: 8px; border-radius: 5px; border-right: 3px solid #e74c3c;">
                                        <i class="fas fa-exclamation-circle me-1"></i>
                                        {{ $message }}
                                    </div>
                                    @enderror

                                    <!-- Password Requirements -->
                                    <div class="mt-2" style="font-size: 12px; color: #666;">
                                        <small>
                                            <i class="fas fa-info-circle me-1"></i>
                                            پاس ورڈ میں کم از کم 8 حروف ہونے چاہئیں
                                        </small>
                                    </div>
                                </div>
                            </div>

                            <!-- Confirm Password Field -->
                            <div class="row mb-4">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end" style="font-weight: bold; color: #2c3e50;">
                                    <i class="fas fa-lock me-2"></i>
                                    {{ __('پاس ورڈ کی تصدیق') }}
                                </label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required autocomplete="new-password"
                                           style="padding: 12px 15px; border: 2px solid #ddd; border-radius: 8px; font-size: 16px; transition: all 0.3s;"
                                           onfocus="this.style.borderColor='#e74c3c'; this.style.boxShadow='0 0 0 3px rgba(231, 76, 60, 0.2)';"
                                           onblur="this.style.borderColor='#ddd'; this.style.boxShadow='none';"
                                           placeholder="پاس ورڈ دوبارہ درج کریں">
                                </div>
                            </div>

                            <!-- Register Button -->
                            <div class="row mb-4">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary"
                                            style="padding: 12px 40px; background: linear-gradient(to right, #2ecc71, #27ae60); border: none; border-radius: 8px; font-size: 18px; font-weight: bold; transition: all 0.3s; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);"
                                            onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 10px rgba(0, 0, 0, 0.15)';"
                                            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 6px rgba(0, 0, 0, 0.1)';">
                                        <i class="fas fa-user-plus me-2"></i>
                                        {{ __('اکاؤنٹ بنائیں') }}
                                    </button>
                                </div>
                            </div>

                            <!-- Login Link -->
                            <div class="row">
                                <div class="col-md-8 offset-md-4">
                                    <hr style="border-color: #ddd;">
                                    <p class="text-muted mb-2">
                                        {{ __('پہلے سے اکاؤنٹ ہے؟') }}
                                    </p>
                                    <a href="{{ route('login') }}" class="btn btn-outline-primary"
                                       style="border: 2px solid #3498db; color: #3498db; border-radius: 8px; font-weight: 500; transition: all 0.3s;"
                                       onmouseover="this.style.background='#3498db'; this.style.color='white';"
                                       onmouseout="this.style.background='transparent'; this.style.color='#3498db';">
                                        <i class="fas fa-sign-in-alt me-2"></i>
                                        {{ __('لاگ ان کریں') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Benefits Card -->
                <div class="card mt-4" style="border-radius: 15px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); border: none;">
                    <div class="card-body">
                        <h5 class="text-center mb-3" style="color: #2c3e50;">
                            <i class="fas fa-gift me-2"></i>
                            اکاؤنٹ بنانے کے فوائد
                        </h5>
                        <div class="row text-center">
                            <div class="col-md-3 mb-3">
                                <div class="text-primary">
                                    <i class="fas fa-clipboard-check fa-2x mb-2"></i>
                                </div>
                                <h6 style="color: #2c3e50; font-size: 14px;">مہارت تشخیص</h6>
                                <small class="text-muted">اپنی کارکردگی کا جائزہ لیں</small>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="text-success">
                                    <i class="fas fa-chart-bar fa-2x mb-2"></i>
                                </div>
                                <h6 style="color: #2c3e50; font-size: 14px;">تجزیہ رپورٹس</h6>
                                <small class="text-muted">مکمل کارکردگی کا تجزیہ</small>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="text-warning">
                                    <i class="fas fa-history fa-2x mb-2"></i>
                                </div>
                                <h6 style="color: #2c3e50; font-size: 14px;">تاریخ محفوظ</h6>
                                <small class="text-muted">پچھلے ریکارڈز دیکھیں</small>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="text-info">
                                    <i class="fas fa-download fa-2x mb-2"></i>
                                </div>
                                <h6 style="color: #2c3e50; font-size: 14px;">رپورٹ ڈاؤن لوڈ</h6>
                                <small class="text-muted">ایکسل رپورٹس حاصل کریں</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Security Note -->
                <div class="alert alert-info mt-4 text-center" style="border-radius: 10px; border: none; background: linear-gradient(135deg, #e3f2fd, #bbdefb);">
                    <i class="fas fa-shield-alt me-2"></i>
                    <strong>محفوظ رجسٹریشن:</strong> آپ کی ذاتی معلومات مکمل طور پر محفوظ ہیں اور صرف تشخیصی مقاصد کے لیے استعمال ہوں گی۔
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
        }

        /* Custom animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add smooth animations
            const cards = document.querySelectorAll('.card, .alert');
            cards.forEach((card, index) => {
                card.classList.add('fade-in-up');
                card.style.animationDelay = `${index * 0.2}s`;
            });

            // Password strength indicator (optional enhancement)
            const passwordInput = document.getElementById('password');
            if (passwordInput) {
                passwordInput.addEventListener('input', function() {
                    const password = this.value;
                    const strengthIndicator = document.getElementById('password-strength');

                    if (!strengthIndicator) {
                        const indicator = document.createElement('div');
                        indicator.id = 'password-strength';
                        indicator.style.marginTop = '5px';
                        indicator.style.fontSize = '12px';
                        this.parentNode.appendChild(indicator);
                    }

                    const indicator = document.getElementById('password-strength');
                    let strength = 'کمزور';
                    let color = '#e74c3c';

                    if (password.length >= 8) {
                        strength = 'اچھا';
                        color = '#f39c12';
                    }
                    if (password.length >= 12) {
                        strength = 'مضبوط';
                        color = '#27ae60';
                    }

                    indicator.innerHTML = `<i class="fas fa-shield me-1"></i> پاس ورڈ کی طاقت: <span style="color: ${color}; font-weight: bold;">${strength}</span>`;
                });
            }
        });
    </script>
@endsection
