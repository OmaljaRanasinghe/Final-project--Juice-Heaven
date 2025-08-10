<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fresh Juice Paradise - Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'juice-orange': '#ff6b35',
                        'juice-green': '#38d9a9',
                        'juice-pink': '#ed64a6',
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
            50% { transform: translateY(-20px) rotate(5deg); }
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

        /* Custom styles for the form */
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
            background: linear-gradient(135deg, #38d9a9 0%, #20bf6b 100%);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .btn-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(56, 217, 169, 0.4);
        }

        .floating-element {
            animation: float 8s ease-in-out infinite;
        }

        .stagger-1 { animation-delay: 0.1s; }
        .stagger-2 { animation-delay: 0.2s; }
        .stagger-3 { animation-delay: 0.3s; }
        .stagger-4 { animation-delay: 0.4s; }
        .stagger-5 { animation-delay: 0.5s; }

        .password-strength-bar {
            height: 3px;
            background: linear-gradient(90deg, #ef4444, #f59e0b, #10b981);
            transition: width 0.3s ease;
            border-radius: 2px;
        }

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
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-orange-50 via-amber-50 to-green-50 font-inter">
    <!-- Floating background decorations -->
    <div class="bg-decoration floating-element text-6xl text-juice-orange top-10 left-10">🥭</div>
    <div class="bg-decoration floating-element text-5xl text-juice-green top-20 right-20" style="animation-delay: -2s;">🍍</div>
    <div class="bg-decoration floating-element text-4xl text-juice-pink bottom-32 left-16" style="animation-delay: -4s;">🧃</div>
    <div class="bg-decoration floating-element text-5xl text-juice-orange bottom-20 right-24" style="animation-delay: -1s;">🍊</div>
    <div class="bg-decoration floating-element text-3xl text-juice-green top-1/2 left-8" style="animation-delay: -3s;">🥤</div>

    <div class="main-content flex items-center justify-center min-h-screen px-4 py-8">
        <div class="w-full max-w-md">
            <!-- Header -->
            <div class="text-center mb-8 animate-slideInDown">
                <div class="flex items-center justify-center mb-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-juice-orange to-orange-400 rounded-xl flex items-center justify-center text-2xl mr-3 shadow-lg">
                        🧃
                    </div>
                    <h1 class="text-2xl font-bold text-gray-800">
                        <span class="text-juice-orange">Fresh</span> & 
                        <span class="text-juice-green">Healthy</span>
                    </h1>
                </div>
                <p class="text-gray-600 text-sm">Join Fresh Juice Paradise today</p>
            </div>

            <!-- Guest Layout Container -->
            <div class="glass-effect rounded-2xl p-8 shadow-2xl animate-slideInUp">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="opacity-0 animate-fadeInUp stagger-1">
                        <x-input-label for="name" :value="__('Name')" class="block text-sm font-semibold text-gray-700 mb-2 uppercase tracking-wide" />
                        <x-text-input id="name" class="block mt-1 w-full input-focus px-4 py-3 bg-white border-2 border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:border-juice-orange" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Enter your full name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2 text-xs text-red-500 bg-red-50 px-3 py-1 rounded-lg" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4 opacity-0 animate-fadeInUp stagger-2">
                        <x-input-label for="email" :value="__('Email')" class="block text-sm font-semibold text-gray-700 mb-2 uppercase tracking-wide" />
                        <x-text-input id="email" class="block mt-1 w-full input-focus px-4 py-3 bg-white border-2 border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:border-juice-orange" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Enter your email address" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs text-red-500 bg-red-50 px-3 py-1 rounded-lg" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4 opacity-0 animate-fadeInUp stagger-3">
                        <x-input-label for="password" :value="__('Password')" class="block text-sm font-semibold text-gray-700 mb-2 uppercase tracking-wide" />

                        <x-text-input id="password" class="block mt-1 w-full input-focus px-4 py-3 bg-white border-2 border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:border-juice-orange"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" 
                                        placeholder="Create a strong password" />

                        <!-- Password Strength Indicator -->
                        <div class="mt-2 h-1 bg-gray-200 rounded-full overflow-hidden">
                            <div id="passwordStrength" class="password-strength-bar w-0"></div>
                        </div>

                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs text-red-500 bg-red-50 px-3 py-1 rounded-lg" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4 opacity-0 animate-fadeInUp stagger-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="block text-sm font-semibold text-gray-700 mb-2 uppercase tracking-wide" />

                        <x-text-input id="password_confirmation" class="block mt-1 w-full input-focus px-4 py-3 bg-white border-2 border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:border-juice-orange"
                                        type="password"
                                        name="password_confirmation" required autocomplete="new-password" 
                                        placeholder="Confirm your password" />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-xs text-red-500 bg-red-50 px-3 py-1 rounded-lg" />
                    </div>

                    <div class="flex items-center justify-end mt-4 opacity-0 animate-fadeInUp stagger-5">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-300 hover:text-juice-orange" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-primary-button class="ms-4 btn-gradient text-white px-6 py-3 rounded-xl font-semibold text-sm uppercase tracking-wide border-0 cursor-pointer">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>


        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Password strength checker
            const passwordInput = document.getElementById('password');
            const strengthBar = document.getElementById('passwordStrength');

            if (passwordInput && strengthBar) {
                passwordInput.addEventListener('input', function() {
                    const password = this.value;
                    let strength = 0;

                    // Calculate password strength
                    if (password.length >= 8) strength += 25;
                    if (/[a-z]/.test(password)) strength += 25;
                    if (/[A-Z]/.test(password)) strength += 25;
                    if (/[0-9]/.test(password) || /[^A-Za-z0-9]/.test(password)) strength += 25;

                    // Update strength bar
                    strengthBar.style.width = strength + '%';
                    
                    // Add color classes based on strength
                    if (strength < 50) {
                        strengthBar.className = 'password-strength-bar w-0 bg-red-500';
                    } else if (strength < 75) {
                        strengthBar.className = 'password-strength-bar w-0 bg-yellow-500';
                    } else {
                        strengthBar.className = 'password-strength-bar w-0 bg-green-500';
                    }
                });
            }

            // Password confirmation validation
            const confirmPassword = document.getElementById('password_confirmation');
            if (confirmPassword && passwordInput) {
                confirmPassword.addEventListener('input', function() {
                    if (this.value !== passwordInput.value && this.value.length > 0) {
                        this.classList.add('border-red-400');
                        this.classList.remove('border-gray-200');
                    } else {
                        this.classList.remove('border-red-400');
                        this.classList.add('border-gray-200');
                    }
                });
            }

            // Enhanced input focus effects
            const inputs = document.querySelectorAll('input[type="text"], input[type="email"], input[type="password"]');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'scale(1.02)';
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'scale(1)';
                });
            });

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
                        Creating Account...
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
                });
                
                formContainer.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                    this.style.boxShadow = '0 20px 40px rgba(0, 0, 0, 0.1)';
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
        });
    </script>
</body>
</html>