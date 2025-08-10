<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fresh Juice Paradise - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'juice-orange': '#ff6b35',
                        'juice-green': '#38d9a9',
                        'juice-pink': '#ed64a6',
                        'juice-yellow': '#fbbf24',
                    },
                    fontFamily: {
                        'inter': ['Inter', 'system-ui', 'sans-serif'],
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'fadeInUp': 'fadeInUp 0.6s ease-out forwards',
                        'slideInDown': 'slideInDown 0.8s ease-out',
                        'slideInUp': 'slideInUp 0.8s ease-out',
                        'shimmer': 'shimmer 2s ease-in-out infinite',
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'bounce-slow': 'bounce 2s infinite',
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-25px) rotate(5deg); }
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes shimmer {
            0%, 100% { opacity: 0; }
            50% { opacity: 1; }
        }

        /* Custom styles for enhanced effects */
        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .input-focus {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .input-focus:focus {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(255, 107, 53, 0.15), 0 0 0 3px rgba(255, 107, 53, 0.1);
            border-color: #ff6b35;
        }

        .btn-gradient {
            background: linear-gradient(135deg, #ff6b35 0%, #f9844a 100%);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .btn-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(255, 107, 53, 0.4);
        }

        .floating-element {
            animation: float 8s ease-in-out infinite;
        }

        .stagger-1 { animation-delay: 0.1s; }
        .stagger-2 { animation-delay: 0.2s; }
        .stagger-3 { animation-delay: 0.3s; }
        .stagger-4 { animation-delay: 0.4s; }

        /* Floating background elements */
        .bg-decoration {
            position: absolute;
            opacity: 0.1;
            pointer-events: none;
            z-index: 0;
        }

        .main-content {
            position: relative;
            z-index: 10;
        }

        /* Custom checkbox styling */
        .custom-checkbox {
            appearance: none;
            background: white;
            border: 2px solid #d1d5db;
            border-radius: 6px;
            width: 20px;
            height: 20px;
            position: relative;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .custom-checkbox:checked {
            background: linear-gradient(135deg, #38d9a9 0%, #20bf6b 100%);
            border-color: #38d9a9;
        }

        .custom-checkbox:checked::after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 12px;
            font-weight: bold;
        }

        /* Shimmer effect for form border */
        .form-shimmer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255, 107, 53, 0.3), transparent);
            animation: shimmer 3s ease-in-out infinite;
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-orange-50 via-amber-50 to-green-50 font-inter">
    <!-- Floating background decorations -->
    <div class="bg-decoration floating-element text-6xl text-juice-orange top-12 left-12">🥭</div>
    <div class="bg-decoration floating-element text-5xl text-juice-green top-24 right-20" style="animation-delay: -2s;">🍍</div>
    <div class="bg-decoration floating-element text-4xl text-juice-pink bottom-32 left-16" style="animation-delay: -4s;">🧃</div>
    <div class="bg-decoration floating-element text-5xl text-juice-orange bottom-20 right-24" style="animation-delay: -1s;">🍊</div>
    <div class="bg-decoration floating-element text-3xl text-juice-green top-1/2 left-8" style="animation-delay: -3s;">🥤</div>
    <div class="bg-decoration floating-element text-4xl text-juice-yellow top-1/3 right-12" style="animation-delay: -5s;">🍓</div>

    <div class="main-content flex items-center justify-center min-h-screen px-4 py-8">
        <div class="w-full max-w-md">
            <!-- Header -->
            <div class="text-center mb-8 animate-slideInDown">
                <div class="flex items-center justify-center mb-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-juice-orange to-orange-400 rounded-xl flex items-center justify-center text-2xl mr-3 shadow-lg animate-bounce-slow">
                        🧃
                    </div>
                    <h1 class="text-2xl font-bold text-gray-800">
                        <span class="text-juice-orange">Fresh</span> & 
                        <span class="text-juice-green">Healthy</span>
                    </h1>
                </div>
                <p class="text-gray-600 text-sm">Welcome back to Fresh Juice Paradise</p>
            </div>

            <!-- Guest Layout Container -->
            <div class="glass-effect rounded-2xl p-8 shadow-2xl animate-slideInUp form-shimmer relative overflow-hidden">
                <!-- Session Status -->
                <div class="mb-4" id="sessionStatus" style="display: none;">
                    <div class="bg-gradient-to-r from-green-100 to-emerald-100 border border-green-300 text-green-700 px-4 py-3 rounded-xl text-sm font-medium text-center">
                        <!-- Session status content would go here -->
                    </div>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="opacity-0 animate-fadeInUp stagger-1">
                        <x-input-label for="email" :value="__('Email')" class="block text-sm font-semibold text-gray-700 mb-2 uppercase tracking-wide" />
                        <x-text-input id="email" class="block mt-1 w-full input-focus px-4 py-3 bg-white border-2 border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:border-juice-orange" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Enter your email address" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs text-red-500 bg-red-50 px-3 py-1 rounded-lg" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4 opacity-0 animate-fadeInUp stagger-2">
                        <x-input-label for="password" :value="__('Password')" class="block text-sm font-semibold text-gray-700 mb-2 uppercase tracking-wide" />

                        <x-text-input id="password" class="block mt-1 w-full input-focus px-4 py-3 bg-white border-2 border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:border-juice-orange"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" 
                                        placeholder="Enter your password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs text-red-500 bg-red-50 px-3 py-1 rounded-lg" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4 opacity-0 animate-fadeInUp stagger-3">
                        <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                            <input id="remember_me" type="checkbox" class="custom-checkbox rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                            <span class="ms-2 text-sm text-gray-600 group-hover:text-gray-800 transition-colors duration-200">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4 opacity-0 animate-fadeInUp stagger-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-300 hover:text-juice-orange relative group" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-juice-orange transition-all duration-300 group-hover:w-full"></span>
                            </a>
                        @endif

                        <x-primary-button class="ms-3 btn-gradient text-white px-6 py-3 rounded-xl font-semibold text-sm uppercase tracking-wide border-0 cursor-pointer">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>

            <!-- Stats Section matching original site -->
            <div class="mt-8 grid grid-cols-3 gap-4 opacity-0 animate-fadeInUp" style="animation-delay: 0.5s;">
                <div class="bg-white/70 backdrop-blur-sm rounded-xl p-4 text-center border border-white/20 hover:transform hover:-translate-y-1 transition-all duration-300">
                    <div class="text-xl font-bold text-juice-orange mb-1">500+</div>
                    <div class="text-xs text-gray-600">Happy Customers</div>
                </div>
                <div class="bg-white/70 backdrop-blur-sm rounded-xl p-4 text-center border border-white/20 hover:transform hover:-translate-y-1 transition-all duration-300">
                    <div class="text-xl font-bold text-juice-green mb-1">100%</div>
                    <div class="text-xs text-gray-600">Organic Fruits</div>
                </div>
                <div class="bg-white/70 backdrop-blur-sm rounded-xl p-4 text-center border border-white/20 hover:transform hover:-translate-y-1 transition-all duration-300">
                    <div class="text-xl font-bold text-juice-pink mb-1">24/7</div>
                    <div class="text-xs text-gray-600">Fresh Delivery</div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Enhanced input focus effects
            const inputs = document.querySelectorAll('input[type="email"], input[type="password"]');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'scale(1.02)';
                    this.parentElement.style.transition = 'transform 0.3s ease';
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'scale(1)';
                });

                // Add typing animation effect
                input.addEventListener('input', function() {
                    this.classList.add('animate-pulse');
                    setTimeout(() => {
                        this.classList.remove('animate-pulse');
                    }, 200);
                });
            });

            // Custom checkbox animation
            const checkbox = document.getElementById('remember_me');
            if (checkbox) {
                checkbox.addEventListener('change', function() {
                    if (this.checked) {
                        this.classList.add('animate-bounce');
                        setTimeout(() => {
                            this.classList.remove('animate-bounce');
                        }, 600);
                    }
                });
            }

            // Form submission with loading state
            const form = document.querySelector('form');
            const submitButton = document.querySelector('button[type="submit"], .btn-gradient');
            
            if (form && submitButton) {
                form.addEventListener('submit', function(e) {
                    const originalText = submitButton.innerHTML;
                    submitButton.innerHTML = `
                        <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Signing in...
                    `;
                    submitButton.disabled = true;
                    submitButton.classList.add('opacity-75', 'cursor-not-allowed');
                    
                    // Re-enable after 3 seconds if form doesn't submit (for demo)
                    setTimeout(() => {
                        if (submitButton.disabled) {
                            submitButton.innerHTML = originalText;
                            submitButton.disabled = false;
                            submitButton.classList.remove('opacity-75', 'cursor-not-allowed');
                        }
                    }, 3000);
                });
            }

            // Parallax effect for floating elements
            document.addEventListener('mousemove', function(e) {
                const decorations = document.querySelectorAll('.bg-decoration');
                const x = e.clientX / window.innerWidth;
                const y = e.clientY / window.innerHeight;
                
                decorations.forEach((decoration, index) => {
                    const speed = (index + 1) * 0.2;
                    const xPos = (x - 0.5) * speed * 20;
                    const yPos = (y - 0.5) * speed * 20;
                    decoration.style.transform = `translate(${xPos}px, ${yPos}px)`;
                });
            });

            // Add subtle hover effects to form container
            const formContainer = document.querySelector('.glass-effect');
            if (formContainer) {
                formContainer.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                    this.style.boxShadow = '0 25px 50px rgba(0, 0, 0, 0.15)';
                    this.style.transition = 'all 0.3s ease';
                });
                
                formContainer.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                    this.style.boxShadow = '0 20px 40px rgba(0, 0, 0, 0.1)';
                });
            }

            // Email validation feedback
            const emailInput = document.getElementById('email');
            if (emailInput) {
                emailInput.addEventListener('blur', function() {
                    const email = this.value;
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    
                    if (email && !emailRegex.test(email)) {
                        this.classList.add('border-red-400', 'shake');
                        setTimeout(() => {
                            this.classList.remove('shake');
                        }, 500);
                    } else if (email) {
                        this.classList.add('border-green-400');
                        this.classList.remove('border-red-400');
                    }
                });
            }

            // Trigger animations on scroll (for mobile)
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-fadeInUp');
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.opacity-0').forEach(el => {
                observer.observe(el);
            });

            // Add floating animation to stats on hover
            const statCards = document.querySelectorAll('.grid > div');
            statCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.classList.add('animate-bounce');
                });
                
                card.addEventListener('mouseleave', function() {
                    this.classList.remove('animate-bounce');
                });
            });

            // Simulate session status for demo (can be removed)
            setTimeout(() => {
                const sessionStatus = document.getElementById('sessionStatus');
                if (Math.random() > 0.8) { // 20% chance to show demo message
                    sessionStatus.style.display = 'block';
                    sessionStatus.innerHTML = `
                        <div class="bg-gradient-to-r from-green-100 to-emerald-100 border border-green-300 text-green-700 px-4 py-3 rounded-xl text-sm font-medium text-center animate-slideInDown">
                            Welcome back! Your session is active.
                        </div>
                    `;
                }
            }, 1000);
        });

        // Add shake animation for validation errors
        const shakeStyle = document.createElement('style');
        shakeStyle.textContent = `
            @keyframes shake {
                0%, 100% { transform: translateX(0); }
                10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
                20%, 40%, 60%, 80% { transform: translateX(5px); }
            }
            .shake {
                animation: shake 0.5s ease-in-out;
            }
        `;
        document.head.appendChild(shakeStyle);
    </script>
</body>
</html>