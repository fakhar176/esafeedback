@extends('layouts.app')

@section('content')
    @push('styles')
        <link href="https://fonts.googleapis.com/css2?family=Noto+Nastaliq+Urdu&display=swap" rel="stylesheet">
        <style>
            * {
                box-sizing: border-box;
                margin: 0;
                padding: 0;
                font-family: 'Noto Nastaliq Urdu', 'Segoe UI', sans-serif;
            }

            .evaluation-container {
                background: linear-gradient(135deg, #1a2a6c, #b21f1f, #fdbb2d);
                min-height: 100vh;
                padding: 20px;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .containers {
                max-width: 900px;
                width: 100%;
                /*background: rgba(255, 255, 255, 0.95);*/
                border-radius: 15px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
                overflow: hidden;
                margin: 0 auto;
            }

            .header {
                background: linear-gradient(to right, #c0392b, #e74c3c);
                color: white;
                padding: 25px;
                text-align: center;
                position: relative;
                overflow: hidden;
            }

            .header::before {
                content: "";
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" width="100" height="100" opacity="0.1"><path d="M20,20 L80,20 L80,80 L20,80 Z" fill="none" stroke="white" stroke-width="2"/><path d="M30,30 L70,30 L70,70 L30,70 Z" fill="none" stroke="white" stroke-width="1"/></svg>');
            }

            .header h1 {
                font-size: 28px;
                margin-bottom: 10px;
                position: relative;
                text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
            }

            .header p {
                font-size: 16px;
                position: relative;
            }

            .form-container {
                padding: 25px;
            }

            .personal-info {
                background: #f8f9fa;
                padding: 20px;
                border-radius: 10px;
                margin-bottom: 20px;
                border-right: 5px solid #e74c3c;
                box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
            }

            .user-info {
                background: #e8f5e8;
                padding: 15px;
                border-radius: 8px;
                margin-bottom: 15px;
                border-right: 4px solid #2ecc71;
            }

            .form-group {
                margin-bottom: 20px;
            }

            label {
                display: block;
                margin-bottom: 8px;
                font-weight: bold;
                color: #2c3e50;
                font-size: 16px;
            }

            input[type="text"],
            input[type="email"],
            input[type="date"],
            textarea {
                width: 100%;
                padding: 12px 15px;
                border: 2px solid #ddd;
                border-radius: 8px;
                font-size: 16px;
                transition: all 0.3s;
            }

            input[type="text"]:focus,
            input[type="email"]:focus,
            input[type="date"]:focus,
            textarea:focus {
                border-color: #e74c3c;
                box-shadow: 0 0 0 3px rgba(231, 76, 60, 0.2);
                outline: none;
            }

            .note {
                background: #fff9e6;
                padding: 15px;
                border-radius: 8px;
                border-right: 4px solid #f1c40f;
                margin-bottom: 20px;
                font-size: 14px;
                color: #7d6608;
            }

            .question-container {
                background: white;
                padding: 20px;
                border-radius: 10px;
                margin-bottom: 20px;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
                border-right: 5px solid #3498db;
                transition: all 0.3s;
            }

            .question-container:hover {
                transform: translateY(-2px);
                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            }

            .question-header {
                color: #2c3e50;
                font-size: 18px;
                margin-bottom: 10px;
                padding-bottom: 10px;
                border-bottom: 2px dashed #ecf0f1;
            }

            .question-text {
                font-size: 18px;
                margin-bottom: 20px;
                color: #34495e;
                line-height: 1.6;
            }

            .rating-options {
                display: flex;
                justify-content: space-between;
                gap: 8px;
                margin-bottom: 15px;
                flex-wrap: wrap;
            }

            .rating-option {
                flex: 1;
                min-width: 60px;
                text-align: center;
                padding: 12px 8px;
                border: 2px solid #ddd;
                border-radius: 8px;
                cursor: pointer;
                transition: all 0.3s;
                font-size: 16px;
                font-weight: bold;
                background: white;
            }

            .rating-option:hover {
                background-color: #f8f9fa;
                transform: scale(1.05);
            }

            .rating-option.selected {
                background-color: #2ecc71;
                color: white;
                border-color: #27ae60;
                box-shadow: 0 4px 8px rgba(46, 204, 113, 0.3);
            }

            .rating-labels {
                display: flex;
                justify-content: space-between;
                margin-top: 5px;
                font-size: 13px;
                color: #7f8c8d;
            }

            .nav-buttons {
                display: flex;
                justify-content: space-between;
                gap: 15px;
                margin-top: 25px;
            }

            button {
                padding: 12px 25px;
                background: linear-gradient(to right, #3498db, #2980b9);
                color: white;
                border: none;
                border-radius: 8px;
                cursor: pointer;
                font-size: 16px;
                transition: all 0.3s;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                flex: 1;
            }

            button:hover {
                transform: translateY(-2px);
                box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
            }

            button:active {
                transform: translateY(1px);
            }

            button:disabled {
                background: #bdc3c7;
                cursor: not-allowed;
                transform: none;
                box-shadow: none;
            }

            #prev-btn {
                background: linear-gradient(to right, #e67e22, #d35400);
            }

            #submit-btn {
                background: linear-gradient(to right, #2ecc71, #27ae60);
            }

            .progress-container {
                margin-bottom: 20px;
            }

            .progress-bar {
                height: 10px;
                background-color: #ecf0f1;
                border-radius: 5px;
                overflow: hidden;
                margin-bottom: 8px;
            }

            .progress {
                height: 100%;
                background: linear-gradient(to right, #3498db, #2ecc71);
                width: 0%;
                transition: width 0.5s;
                border-radius: 5px;
            }

            .progress-text {
                text-align: center;
                font-size: 14px;
                color: #2c3e50;
                font-weight: bold;
            }

            .hidden {
                display: none;
            }

            .thank-you {
                text-align: center;
                padding: 40px 20px;
            }

            .thank-you h2 {
                color: #2ecc71;
                margin-bottom: 15px;
                font-size: 28px;
            }

            .thank-you p {
                font-size: 18px;
                color: #7f8c8d;
            }

            .section-title {
                font-size: 20px;
                color: #c0392b;
                margin: 20px 0 15px;
                padding-bottom: 10px;
                border-bottom: 2px solid #ecf0f1;
            }

            .user-status {
                background: #e3f2fd;
                padding: 10px 15px;
                border-radius: 8px;
                margin-bottom: 15px;
                border-right: 4px solid #2196f3;
                font-size: 14px;
            }

            /* Mobile Responsive Styles */
            @media (max-width: 768px) {
                .evaluation-container {
                    padding: 10px;
                }

                .container {
                    border-radius: 10px;
                }

                .header {
                    padding: 20px 15px;
                }

                .header h1 {
                    font-size: 22px;
                }

                .header p {
                    font-size: 14px;
                }

                .form-container {
                    padding: 15px;
                }

                .personal-info {
                    padding: 15px;
                }

                .question-container {
                    padding: 15px;
                }

                .rating-options {
                    flex-direction: column;
                    gap: 5px;
                }

                .rating-option {
                    min-width: auto;
                    padding: 10px 5px;
                }

                .nav-buttons {
                    flex-direction: column;
                }

                button {
                    width: 100%;
                    margin-bottom: 10px;
                }

                .question-text {
                    font-size: 16px;
                }

                .question-header {
                    font-size: 16px;
                }
            }

            @media (max-width: 480px) {
                .header h1 {
                    font-size: 20px;
                }

                .form-container {
                    padding: 10px;
                }

                .personal-info {
                    padding: 12px;
                }

                input[type="text"],
                input[type="email"],
                input[type="date"],
                textarea {
                    padding: 10px 12px;
                    font-size: 14px;
                }

                label {
                    font-size: 14px;
                }
            }

            /* Loading spinner */
            .loading {
                display: inline-block;
                width: 20px;
                height: 20px;
                border: 3px solid #ffffff;
                border-radius: 50%;
                border-top-color: transparent;
                animation: spin 1s ease-in-out infinite;
                margin-right: 10px;
            }

            @keyframes spin {
                to { transform: rotate(360deg); }
            }
        </style>
    @endpush

    <div class="evaluation-container">
        <div class="containers">
            <div class="header">
                <h1>ایمرجنسی سروسز اکیڈمی (ریسکیو 1122)</h1>
                <p>خدمت میں مصروف ریسکیو ورکرز کی مہارت کی تشخیص کے لیے فیڈ بیک فارم</p>
            </div>

            <div class="form-container">
                <!-- User Status Info -->
                @auth
                    <div class="user-status">
                        <i class="fas fa-user-check me-2"></i>
                        آپ لاگ ان ہیں: <strong>{{ Auth::user()->name }}</strong> ({{ Auth::user()->email }})
                    </div>
                @else
                    <div class="user-info">
                        <i class="fas fa-info-circle me-2"></i>
                        <strong>نوٹ:</strong> براہ کرم اپنا نام اور ای میل درج کریں۔ اگر آپ کا اکاؤنٹ موجود نہیں ہے تو خود بخود بن جائے گا۔
                    </div>
                @endauth

                <div id="personal-info">
                    <div class="personal-info">
                        <!-- User Information for Guests -->
                        @guest
                            <div class="form-group">
                                <label for="user_name"><i class="fas fa-user me-2"></i>مکمل نام:</label>
                                <input type="text" id="user_name" name="user_name" required placeholder="اپنا مکمل نام درج کریں">
                            </div>

                            <div class="form-group">
                                <label for="user_email"><i class="fas fa-envelope me-2"></i>ای میل ایڈریس:</label>
                                <input type="email" id="user_email" name="user_email" required placeholder="example@domain.com">
                            </div>
                        @endguest

                        <!-- Professional Information -->
                        <div class="form-group">
                            <label for="designation"><i class="fas fa-briefcase me-2"></i>عہدہ:</label>
                            <input type="text" id="designation" name="designation" required placeholder="اپنا عہدہ درج کریں">
                        </div>

                        <div class="form-group">
                            <label for="experience"><i class="fas fa-chart-line me-2"></i>نوکری کا کل تجربہ:</label>
                            <input type="text" id="experience" name="experience" required placeholder="مثال: 5 سال">
                        </div>

                        <div class="form-group">
                            <label for="date"><i class="fas fa-calendar me-2"></i>تاریخ:</label>
                            <input type="date" id="date" name="date" required>
                        </div>
                    </div>

                    <div class="note">
                        <strong><i class="fas fa-exclamation-circle me-2"></i>نوٹ:</strong>
                        اس فارم پر اپنا نام نہ لکھیں۔ تشخیص کے عمل کے متعلق آپ کا تجزیہ انتہائی قیمتی ہے۔
                        اگر آپ کو اضافی جگہ کی ضرورت ہے تو براۓ مہربانی صفحہ کے دوسری جانب لکھیں۔
                    </div>

                    <div class="nav-buttons">
                        <button id="start-btn">
                            <i class="fas fa-play-circle me-2"></i>
                            تشخیص شروع کریں
                        </button>
                    </div>
                </div>

                <div id="evaluation-section" class="hidden">
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="progress" id="progress-bar"></div>
                        </div>
                        <div class="progress-text" id="progress-text">سوال 1 کا 16</div>
                    </div>

                    <div class="question-container">
                        <div class="question-header" id="question-category">تشخیص کی ساخت اور واضحیت</div>
                        <div class="question-text" id="question-text"></div>

                        <div class="rating-options">
                            <div class="rating-option" data-value="5">5</div>
                            <div class="rating-option" data-value="4">4</div>
                            <div class="rating-option" data-value="3">3</div>
                            <div class="rating-option" data-value="2">2</div>
                            <div class="rating-option" data-value="1">1</div>
                        </div>

                        <div class="rating-labels">
                            <span>بہترین</span>
                            <span>کم ترین</span>
                        </div>
                    </div>

                    <div class="nav-buttons">
                        <button id="prev-btn">
                            <i class="fas fa-arrow-right me-2"></i>
                            پچھلا سوال
                        </button>
                        <button id="next-btn">
                            اگلا سوال
                            <i class="fas fa-arrow-left me-2"></i>
                        </button>
                    </div>
                </div>

                <div id="open-ended-section" class="hidden">
                    <div class="section-title">
                        <i class="fas fa-comments me-2"></i>
                        اضافی تجاویز اور تجربات
                    </div>

                    <div class="question-container">
                        <div class="question-text" id="open-question-text"></div>

                        <div class="form-group">
                            <textarea id="open-response" rows="5" placeholder="اپنا جواب یہاں لکھیں..."></textarea>
                        </div>
                    </div>

                    <div class="nav-buttons">
                        <button id="prev-open-btn">
                            <i class="fas fa-arrow-right me-2"></i>
                            پچھلا سوال
                        </button>
                        <button id="next-open-btn">
                            اگلا سوال
                            <i class="fas fa-arrow-left me-2"></i>
                        </button>
                    </div>
                </div>

                <div id="thank-you-section" class="thank-you hidden">
                    <h2><i class="fas fa-check-circle me-2"></i>آپ کا شکریہ!</h2>
                    <p>آپ کی قیمتی رائے ہمارے لیے بہت اہم ہے اور ہماری بہتری کا باعث بنے گی۔</p>
                    <div class="mt-4">
                        <a href="{{ route('dashboard') }}" class="btn btn-primary me-2">
                            <i class="fas fa-tachometer-alt me-2"></i>
                            ڈیش بورڈ پر جائیں
                        </a>
                        <a href="{{ route('evaluation.form') }}" class="btn btn-success">
                            <i class="fas fa-plus-circle me-2"></i>
                            نیا تشخیص فارم
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Questions data organized by categories
                const questionCategories = [
                    {
                        name: "تشخیص کی ساخت اور واضحیت",
                        questions: [
                            "تشخیص کے مراحل اور مقاصد تمام شرکاء کو پہلے سے واضح طور پر بتائے جاتے ہیں۔",
                            "کارکردگی کا جائزہ طے شدہ اہداف کے مطابق لیا جاتا ہے۔",
                            "تمام عملی مشقوں کو مکمل کرنے لئے دیا گیا وقت مناسب تھا۔",
                            "جائزہ لینے کے عمل کے بعد بریفینگ میں غلطیوں کی نشاندہی اصلاحی انداز میں کی گئی۔"
                        ]
                    },
                    {
                        name: "منظر ناموں کی عملی مطابقت",
                        questions: [
                            "عملی کارکردگی کو جانچنے کے دوران دیئے گئے تمام منظر نامے پیشہ ورانہ مہارتوں کے مطابق تھے۔",
                            "تربیتی منظر ناموں نے پیشہ ورانہ ذمہ داریوں کو پورا کرنے میں میری صلاحیت کو بڑھایا۔",
                            "تشخیص میں دیے گئے منظر ناموں سے مجھے اپنی پیشہ وارانہ مہارتوں کو مزید بہتر بنانے میں مدد ملے گی۔",
                            "منظر نامہ پر مبنی تشخیص کے بعد مجھے اپنے پیشہ وارانہ مسائل کو حل کرنے میں آسانی ہو گی۔"
                        ]
                    },
                    {
                        name: "ماحول اور حفاظتی انتظامات",
                        questions: [
                            "عملی کارکردگی کو جانچنے کے دوران تمام آلات مناسب تھے۔",
                            "عملی کارکردگی کے دوران حفاظتی ہدایات کو اولین ترجیح دی گئی۔",
                            "جائزہ لینے کا عمل منظم تھا۔",
                            "مجموعی طور پر حفاظتی انتظامات اطمینان بخش تھے۔"
                        ]
                    },
                    {
                        name: "تشخیص کی شفافیت",
                        questions: [
                            "تمام شرکاء کے لیے ایک ہی معیار رکھا گیا ہے۔",
                            "تمام شرکاء کو وقت اور مواقع یکساں فراہم کیے جاتے ہیں۔",
                            "معیارات تحریری طور پر دستیاب ہیں اور تمام شرکاء کو انہی اصولوں پر جانچا گیا ہے۔",
                            "جائزہ لینے کے عمل کے دوران ماہرین / اساتذہ نے ذاتی پسند ناپسند کو اہمیت نہیں دی۔"
                        ]
                    }
                ];

                const openQuestions = [
                    "بطور ریسکور اپنی پیشہ وارانہ ذمہ داریوں کو پورا کرنے کے لیے آپ مزید کیا سیکھنا چاہتے ہیں؟",
                    "کون سی ایسی پیشہ وارانہ مہارتیں ہیں جن کو تشخیص کے عمل میں شامل کیا جانا چاہیے؟"
                ];

                // Flatten all questions for easier navigation
                const allQuestions = [];
                questionCategories.forEach(category => {
                    category.questions.forEach(question => {
                        allQuestions.push({
                            text: question,
                            category: category.name
                        });
                    });
                });

                // DOM elements
                const personalInfoSection = document.getElementById('personal-info');
                const evaluationSection = document.getElementById('evaluation-section');
                const openEndedSection = document.getElementById('open-ended-section');
                const thankYouSection = document.getElementById('thank-you-section');

                const startBtn = document.getElementById('start-btn');
                const prevBtn = document.getElementById('prev-btn');
                const nextBtn = document.getElementById('next-btn');
                const prevOpenBtn = document.getElementById('prev-open-btn');
                const nextOpenBtn = document.getElementById('next-open-btn');

                const questionCategory = document.getElementById('question-category');
                const questionText = document.getElementById('question-text');
                const openQuestionText = document.getElementById('open-question-text');
                const progressBar = document.getElementById('progress-bar');
                const progressText = document.getElementById('progress-text');

                const ratingOptions = document.querySelectorAll('.rating-option');
                const openResponse = document.getElementById('open-response');

                // State variables
                let currentQuestionIndex = 0;
                let currentOpenQuestionIndex = 0;
                const answers = new Array(allQuestions.length).fill(null);
                const openAnswers = new Array(openQuestions.length).fill('');
                let isSubmitting = false;

                // Event listeners
                startBtn.addEventListener('click', startEvaluation);
                prevBtn.addEventListener('click', prevQuestion);
                nextBtn.addEventListener('click', nextQuestion);
                prevOpenBtn.addEventListener('click', prevOpenQuestion);
                nextOpenBtn.addEventListener('click', nextOpenQuestion);

                ratingOptions.forEach(option => {
                    option.addEventListener('click', function () {
                        // Remove selected class from all options
                        ratingOptions.forEach(opt => opt.classList.remove('selected'));

                        // Add selected class to clicked option
                        this.classList.add('selected');

                        // Store the answer
                        answers[currentQuestionIndex] = parseInt(this.getAttribute('data-value'));
                    });
                });

                openResponse.addEventListener('input', function () {
                    openAnswers[currentOpenQuestionIndex] = this.value;
                });

                // Set today's date as default
                document.getElementById('date').valueAsDate = new Date();

                // Functions
                function startEvaluation() {
                    const designation = document.getElementById('designation').value;
                    const experience = document.getElementById('experience').value;
                    const date = document.getElementById('date').value;

                    // For guest users, validate name and email
                    const isGuest = {{ Auth::check() ? 'false' : 'true' }};
                    if (isGuest) {
                        const userName = document.getElementById('user_name').value;
                        const userEmail = document.getElementById('user_email').value;

                        if (!userName || !userEmail) {
                            alert('براہ کرم اپنا نام اور ای میل درج کریں');
                            return;
                        }

                        // Validate email format
                        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                        if (!emailRegex.test(userEmail)) {
                            alert('براہ کرم درست ای میل ایڈریس درج کریں');
                            return;
                        }
                    }

                    if (!designation || !experience || !date) {
                        alert('براہ کرم تمام ذاتی معلومات درج کریں');
                        return;
                    }

                    personalInfoSection.classList.add('hidden');
                    evaluationSection.classList.remove('hidden');
                    showQuestion();
                }

                function showQuestion() {
                    const question = allQuestions[currentQuestionIndex];
                    questionCategory.textContent = question.category;
                    questionText.textContent = question.text;

                    // Update progress
                    const progress = ((currentQuestionIndex + 1) / allQuestions.length) * 100;
                    progressBar.style.width = `${progress}%`;
                    progressText.textContent = `سوال ${currentQuestionIndex + 1} کا ${allQuestions.length}`;

                    // Update navigation buttons
                    prevBtn.disabled = currentQuestionIndex === 0;
                    nextBtn.textContent = currentQuestionIndex === allQuestions.length - 1 ? 'اگلا حصہ' : 'اگلا سوال';

                    // Show selected rating if exists
                    ratingOptions.forEach(option => {
                        option.classList.remove('selected');
                        if (parseInt(option.getAttribute('data-value')) === answers[currentQuestionIndex]) {
                            option.classList.add('selected');
                        }
                    });
                }

                function prevQuestion() {
                    if (currentQuestionIndex > 0) {
                        currentQuestionIndex--;
                        showQuestion();
                    }
                }

                function nextQuestion() {
                    if (answers[currentQuestionIndex] === null) {
                        alert('براہ کرم ایک درجہ منتخب کریں');
                        return;
                    }

                    if (currentQuestionIndex < allQuestions.length - 1) {
                        currentQuestionIndex++;
                        showQuestion();
                    } else {
                        // Move to open-ended questions
                        evaluationSection.classList.add('hidden');
                        openEndedSection.classList.remove('hidden');
                        showOpenQuestion();
                    }
                }

                function showOpenQuestion() {
                    openQuestionText.textContent = openQuestions[currentOpenQuestionIndex];
                    openResponse.value = openAnswers[currentOpenQuestionIndex];

                    // Update navigation buttons
                    prevOpenBtn.disabled = currentOpenQuestionIndex === 0;
                    nextOpenBtn.textContent = currentOpenQuestionIndex === openQuestions.length - 1 ? 'جمع کرائیں' : 'اگلا سوال';
                }

                function prevOpenQuestion() {
                    if (currentOpenQuestionIndex > 0) {
                        currentOpenQuestionIndex--;
                        showOpenQuestion();
                    }
                }

                async function nextOpenQuestion() {
                    if (currentOpenQuestionIndex < openQuestions.length - 1) {
                        currentOpenQuestionIndex++;
                        showOpenQuestion();
                    } else {
                        await submitForm();
                    }
                }

                async function submitForm() {
                    if (isSubmitting) return;

                    isSubmitting = true;
                    const submitBtn = document.getElementById('next-open-btn');
                    const originalText = submitBtn.innerHTML;
                    submitBtn.innerHTML = '<span class="loading"></span> جمع کر رہے ہیں...';
                    submitBtn.disabled = true;

                    try {
                        const formData = {
                            // User information (for guests)
                            user_name: {{ Auth::check() ? 'null' : 'document.getElementById("user_name").value' }},
                            user_email: {{ Auth::check() ? 'null' : 'document.getElementById("user_email").value' }},

                            // Professional information
                            designation: document.getElementById('designation').value,
                            experience: document.getElementById('experience').value,
                            evaluation_date: document.getElementById('date').value,

                            // All 16 rating questions
                            q1_evaluation_clarity: answers[0],
                            q2_performance_alignment: answers[1],
                            q3_time_adequacy: answers[2],
                            q4_feedback_quality: answers[3],
                            q5_scenario_relevance: answers[4],
                            q6_capability_enhancement: answers[5],
                            q7_skill_improvement: answers[6],
                            q8_problem_solving: answers[7],
                            q9_equipment_adequacy: answers[8],
                            q10_safety_priority: answers[9],
                            q11_process_organization: answers[10],
                            q12_safety_satisfaction: answers[11],
                            q13_consistent_standards: answers[12],
                            q14_equal_opportunities: answers[13],
                            q15_written_criteria: answers[14],
                            q16_impartial_evaluators: answers[15],

                            // Open-ended questions
                            q17_learning_requirements: openAnswers[0],
                            q18_additional_skills: openAnswers[1]
                        };

                        const response = await fetch('{{ route("evaluation.store") }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'X-Requested-With': 'XMLHttpRequest'
                            },
                            body: JSON.stringify(formData)
                        });

                        const result = await response.json();

                        if (result.success) {
                            openEndedSection.classList.add('hidden');
                            thankYouSection.classList.remove('hidden');

                            // Show success message with score
                            const successMessage = document.createElement('div');
                            successMessage.className = 'alert alert-success mt-3';
                            successMessage.innerHTML = `
                                <i class="fas fa-check-circle me-2"></i>
                                تشخیص کامیابی سے جمع کرائی گئی!
                                <strong>مجموعی اسکور: ${result.overall_score}/5.0</strong>
                            `;
                            thankYouSection.appendChild(successMessage);
                        } else {
                            throw new Error(result.message || 'جمع کرانے میں خرابی');
                        }
                    } catch (error) {
                        console.error('Error:', error);
                        alert('ڈیٹا جمع کرانے میں مسئلہ پیش آیا۔ براہ کرم دوبارہ کوشش کریں۔');
                    } finally {
                        isSubmitting = false;
                        submitBtn.innerHTML = originalText;
                        submitBtn.disabled = false;
                    }
                }
            });
        </script>
    @endpush
@endsection
