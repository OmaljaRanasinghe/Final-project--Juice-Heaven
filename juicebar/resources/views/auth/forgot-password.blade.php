<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fresh Juice Paradise - Forgot Password</title>
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
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-orange-50 via-amber-50 to-green-50 font-inter">
    <!-- Floating background decorations -->
    <div class="bg-decoration floating-element text-6xl text-juice-orange top-12 left-12">🔑</div>
    <div class="bg-decoration floating-element text-5xl text-juice-green top-24 right-20" style="animation-delay: -2s;">✉️</div>
    <div class="bg-decoration floating-element text-4xl text-juice-pink bottom-32 left-16" style="animation-delay: -4s;">🔒</div>
    <div class="bg-decoration floating-element text-5xl text-juice-orange bottom-20 right-24" style="animation-delay: -1s;">🧃</div>
    <div class="bg-decoration floating-element text-3xl text-juice-green top-1/2 left-8" style="animation-delay: -3s;">🔓</div>

    <div class="main-content flex items-center justify-center min-h-screen px-4 py-8">
        <div class="w-full max-w-md">
            <!-- Header -->
            <div class="text-center mb-8 animate-slideInDown">
                <div class="flex items-center justify-center mb-6">
                    <div class="w-16 h-16 bg-gradient-to-r from-juice-orange to-orange-400 rounded-xl flex items-center justify-center text-3xl shadow-lg animate-pulse-slow">
                        🔑
                    </div>
                </div>
                <h1 class="text-3xl font-bold text-gray-800 mb-2">
                    <span class="text-juice-orange">Forgot</span> Your 
                    <span class="text-juice-green">Password</span>?
                </h1>
                <p class="text-gray-600 text-sm">No worries! We'll help you reset it</p>
            </div>

            <!-- Form Container -->
            <div class="glass-effect rounded-2xl p-8 shadow-2xl animate-slideInUp relative overflow-hidden">
                <!-- Info Message -->
                <div class="bg-gradient-to-r from-blue-50 to-cyan-50 border border-blue-200 rounded-xl p-4 mb-6 animate-fadeInUp">
                    <div class="flex items-start space-x-3">
                        <span class="text-2xl">💡</span>
                        <div>
                            <p class="text-sm text-blue-800 font-medium mb-1">Reset Instructions</p>
                            <p class="text-xs text-blue-700">
                                {{ __('Just enter your email address and we\'ll send you a password reset link that will allow you to choose a new one.') }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Session Status -->
                @if (session('status'))
                    <div class="mb-4 animate-fadeInUp">
                        <div class="bg-gradient-to-r from-green-100 to-emerald-100 border border-green-300 text-green-700 px-4 py-3 rounded-xl text-sm font-medium text-center flex items-center justify-center space-x-2">
                            <span>✅</span>
                            <span>{{ session('status') }}</span>
                        </div>
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                    @csrf

                    <!-- Email Address -->
                    <div class="opacity-0 animate-fadeInUp" style="animation-delay: 0.1s;">
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2 uppercase tracking-wide">
                            {{ __('Email Address') }}
                        </label>
                        <div class="relative">
                            <input id="email" type="email" name="email" 
                                   class="w-full px-4 py-3 pl-12 bg-white border-2 border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:border-juice-orange input-focus" 
                                   value="{{ old('email') }}" 
                                   required autofocus 
                                   placeholder="Enter your email address" />
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center">
                                <span class="text-gray-400 text-xl">📧</span>
                            </div>
                        </div>
                        @if ($errors->get('email'))
                            <div class="mt-2 text-xs text-red-500 bg-red-50 px-3 py-1 rounded-lg">
                                @foreach ($errors->get('email') as $message)
                                    {{ $message }}
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="flex items-center justify-between pt-4 opacity-0 animate-fadeInUp" style="animation-delay: 0.2s;">
                        <a href="{{ route('login') }}" 
                           class="inline-flex items-center text-sm text-gray-600 hover:text-gray-900 transition-colors duration-200 group">
                            <span class="mr-2">←</span>
                            Back to Login
                            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-juice-orange transition-all duration-300 group-hover:w-full"></span>
                        </a>

                        <button type="submit" 
                                class="inline-flex items-center px-8 py-3 btn-gradient text-white rounded-xl font-semibold text-sm uppercase tracking-wide border-0 cursor-pointer">
                            <span class="mr-2">🚀</span>
                            {{ __('Send Reset Link') }}
                        </button>
                    </div>
                </form>
            </div>

            <!-- Security Note -->
            <div class="mt-6 text-center opacity-0 animate-fadeInUp" style="animation-delay: 0.3s;">
                <div class="bg-white/70 backdrop-blur-sm rounded-xl p-4 border border-white/20">
                    <div class="flex items-center justify-center space-x-2 text-sm text-gray-600">
                        <span class="text-lg">🔐</span>
                        <span>Your security is our priority. The reset link will expire in 60 minutes.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Enhanced input focus effects
            const emailInput = document.getElementById('email');
            
            if (emailInput) {
                emailInput.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'scale(1.02)';
                    this.parentElement.style.transition = 'transform 0.3s ease';
                });
                
                emailInput.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'scale(1)';
                });

                // Email validation feedback
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

            // Form submission with loading state
            const form = document.querySelector('form');
            const submitButton = document.querySelector('button[type="submit"]');
            
            if (form && submitButton) {
                form.addEventListener('submit', function(e) {
                    const originalText = submitButton.innerHTML;
                    submitButton.innerHTML = `
                        <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Sending Reset Link...
                    `;
                    submitButton.disabled = true;
                    submitButton.classList.add('opacity-75', 'cursor-not-allowed');
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

            // Add hover effect to form container
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
