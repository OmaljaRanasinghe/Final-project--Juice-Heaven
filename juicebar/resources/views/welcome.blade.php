<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Juice Heaven - Fresh, Healthy, Delicious</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quattrocento:wght@400;700&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary-green': '#22c55e',
                        'dark-green': '#16a34a',
                        'accent-yellow': '#fbbf24',
                        'accent-red': '#ef4444',
                        'pure-white': '#ffffff',
                        'light-cream': '#fefefe',
                        'text-dark': '#1f2937',
                    },
                }
            }
        }
    </script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        :root {
            --primary-green: #22c55e;
            --dark-green: #16a34a;
            --accent-yellow: #fbbf24;
            --accent-red: #ef4444;
            --pure-white: #ffffff;
            --light-cream: #fefefe;
            --text-dark: #1f2937;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: "Quattrocento", serif;
            font-weight: 400;
            font-style: normal;
            background-color: var(--pure-white);
            color: var(--text-dark);
            line-height: 1.6;
        }
        
        /* Navigation */
        .navbar {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(251, 191, 36, 0.3);
            padding: 0.2rem 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--text-dark) !important;
        }
        
        /* Fixed Navigation Alignment */
        .navbar-nav {
            display: flex;
            align-items: center;
            gap: 0;
        }
        
        .navbar-nav .nav-link {
            color: var(--text-dark) !important;
            font-weight: 500;
            margin: 0 2rem;
            padding: 0.5rem 0;
            transition: all 0.3s ease;
            position: relative;
            display: flex;
            align-items: center;
            height: 40px;
        }
        
        .navbar-nav .nav-link:hover {
            color: var(--accent-red) !important;
        }
        
        .navbar-nav .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 50%;
            background-color: var(--accent-red);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }
        
        .navbar-nav .nav-link:hover::after {
            width: 100%;
        }
        
        /* Hero Section */
        .hero-section {
            min-height: 100vh;
            background: url('{{ asset("images/fruit-splash.jpeg") }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            align-items: center;
            position: relative;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('{{ asset("images/fruit-splash.jpeg") }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            filter: blur(3px);
            z-index: 1;
            pointer-events: none;
        }
        
        .hero-content {
            z-index: 2;
        }
        
        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 2rem;
            color: var(--pure-white);
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            line-height: 1.2;
        }
        
        .hero-subtitle {
            font-size: 1.3rem;
            margin-bottom: 3rem;
            color: var(--pure-white);
            opacity: 0.95;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
        }
        
        .btn-primary-custom {
            background-color: var(--accent-yellow);
            border: none;
            height: auto;
            color: var(--text-dark);
            padding: 1rem 2.5rem;
            font-weight: 600;
            border-radius: 8px;
            margin-right: 1rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        
        .btn-primary-custom:hover {
            background-color: #f59e0b;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(251, 191, 36, 0.4);
        }
        
        .btn-outline-custom {
            border: 2px solid var(--pure-white);
            color: var(--pure-white);
            padding: 1rem 2.5rem;
            font-weight: 600;
            border-radius: 8px;
            background: transparent;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-outline-custom2 {
            border: 2px solid var(--accent-red);
            color: var(--accent-red);
            padding: 0.5rem 1.5rem;
            font-weight: 600;
            height: 40px;
            margin-left: 1rem;
            border-radius: 8px;
            background: transparent;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        
        .btn-outline-custom:hover {
            background-color: var(--pure-white);
            color: var(--text-dark);
            transform: translateY(-2px);
        }
        
        .btn-outline-custom2:hover {
            background-color: var(--accent-red);
            color: white;
            transform: translateY(-2px);
        }
        
        /* Section Styling */
        .section {
            padding: 80px 0;
            background: var(--pure-white);
        }
        
        .section-alt {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        }
        
        .section-title {
            font-size: 2.8rem;
            font-weight: 700;
            margin-bottom: 3rem;
            text-align: center;
            color: var(--text-dark);
        }
        
        .section-subtitle {
            font-size: 1.2rem;
            text-align: center;
            margin-bottom: 4rem;
            color: var(--text-dark);
            opacity: 0.8;
        }
        
        /* Feature Cards */
        .feature-card {
            background: var(--pure-white);
            border-radius: 12px;
            padding: 2.5rem;
            text-align: center;
            height: auto;
            transition: all 0.3s ease;
            border: 2px solid var(--accent-yellow);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        
        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
            border-color: var(--accent-red);
        }
        
        .feature-card:nth-child(1) .feature-icon {
            color: var(--primary-green);
        }
        
        .feature-card:nth-child(2) .feature-icon {
            color: var(--accent-yellow);
        }
        
        .feature-card:nth-child(3) .feature-icon {
            color: var(--accent-red);
        }
        
        .feature-icon {
            font-size: 3rem;
            margin-bottom: 1.5rem;
        }
        
        .feature-title {
            font-size: 1.4rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--text-dark);
        }
        
        .feature-description {
            color: var(--text-dark);
            opacity: 0.8;
        }

        /* Scroll Animations */
        .animate-on-scroll {
            opacity: 0;
            transform: translateY(50px);
            transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .animate-on-scroll.fade-in-up {
            opacity: 1;
            transform: translateY(0);
        }

        .animate-on-scroll.slide-in-left {
            opacity: 0;
            transform: translateX(-50px);
        }

        .animate-on-scroll.slide-in-left.fade-in-up {
            opacity: 1;
            transform: translateX(0);
        }

        .animate-on-scroll.slide-in-right {
            opacity: 0;
            transform: translateX(50px);
        }

        .animate-on-scroll.slide-in-right.fade-in-up {
            opacity: 1;
            transform: translateX(0);
        }

        .animate-on-scroll.scale-in {
            opacity: 0;
            transform: scale(0.8);
        }

        .animate-on-scroll.scale-in.fade-in-up {
            opacity: 1;
            transform: scale(1);
        }

        /* Staggered animations for cards */
        .animate-on-scroll.delay-100 {
            transition-delay: 0.1s;
        }

        .animate-on-scroll.delay-200 {
            transition-delay: 0.2s;
        }

        .animate-on-scroll.delay-300 {
            transition-delay: 0.3s;
        }

        .animate-on-scroll.delay-400 {
            transition-delay: 0.4s;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .section-title {
                font-size: 2.2rem;
            }
            
            .navbar-nav .nav-link {
                margin: 0 0.5rem;
            }
            
            .btn-primary-custom,
            .btn-outline-custom {
                display: block;
                margin: 0.5rem 0;
                text-align: center;
            }
        }
    </style>
</head>

    <body>
        <!-- Navigation -->
        <nav class="navbar fixed top-0 w-full z-50">
            <div class="container mx-auto px-4">
                <div class="flex items-center justify-between">
                    <a class="navbar-brand" href="#home">
                        <img src="{{ asset('logo/logo.png') }}" alt="Juice Heaven Logo" class="h-10 w-10 rounded-lg shadow-sm">
                    </a>
                    
                    <button class="lg:hidden text-text-light" onclick="toggleMobileMenu()">
                        <span class="block w-6 h-0.5 bg-current mb-1"></span>
                        <span class="block w-6 h-0.5 bg-current mb-1"></span>
                        <span class="block w-6 h-0.5 bg-current"></span>
                    </button>
                    
                    <div class="hidden lg:block">
                        <ul class="navbar-nav">
                            <li><a class="nav-link" href="#home">Home</a></li>
                            <li><a class="nav-link" href="#about">About</a></li>
                            <li><a class="nav-link" href="#contact">Contact</a></li>
                            @auth
                                <li><a href="{{ url('/dashboard') }}" class="btn-outline-custom2">Dashboard</a></li>
                            @else
                                <li><a href="{{ route('login') }}" class="btn-outline-custom2">Login</a></li>
                                @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}" class="btn-outline-custom2">Get Started</a></li>
                                @endif
                            @endauth
                        </ul>
                    </div>
                    
                    <!-- Mobile Navigation -->
                    <div id="navbarNav" class="hidden absolute top-full left-0 w-full bg-primary-green lg:hidden">
                        <ul class="navbar-nav flex flex-col">
                            <li><a class="nav-link block px-4 py-3" href="#home">Home</a></li>
                            <li><a class="nav-link block px-4 py-3" href="#menu">Menu</a></li>
                            <li><a class="nav-link block px-4 py-3" href="#about">About</a></li>
                            <li><a class="nav-link block px-4 py-3" href="#contact">Contact</a></li>
                            @auth
                                <li><a class="nav-link block px-4 py-3" href="{{ url('/dashboard') }}">Dashboard</a></li>
                            @else
                                <li><a class="nav-link block px-4 py-3" href="{{ route('login') }}">Login</a></li>
                                @if (Route::has('register'))
                                    <li><a class="nav-link block px-4 py-3" href="{{ route('register') }}">Get Started</a></li>
                                @endif
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section id="home" class="hero-section">
            <div class="container mx-auto px-4">
                <div class="flex justify-center">
                    <div class="lg:w-5/6 text-center hero-content">
                        <h1 class="hero-title animate-on-scroll">Your Ultimate Fresh Juice Experience Starts Here</h1>
                        <p class="hero-subtitle animate-on-scroll delay-200">Experience seamless online ordering and discover our premium organic juice collection crafted with love.</p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center animate-on-scroll delay-300">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn-primary-custom">Go to Dashboard</a>
                            @else
                                <a href="{{ route('register') }}" class="btn-primary-custom">Start Your Journey</a>
                            @endauth
                            <a href="#menu" class="btn-outline-custom">Explore Menu</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section id="about" class="section relative overflow-hidden">
            <!-- Background Image with Blur -->
            <div class="absolute inset-0 z-0">
                <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('images/fruit-splash.jpeg') }}');"></div>
                <div class="absolute inset-0 bg-cover bg-center bg-no-repeat filter blur-md" style="background-image: url('{{ asset('images/fruit-splash.jpeg') }}');"></div>
                <div class="absolute inset-0 bg-white bg-opacity-85"></div>
            </div>
            
            <!-- Content -->
            <div class="container mx-auto px-4 relative z-10">
                <h2 class="section-title animate-on-scroll">Why Choose Juice Heaven?</h2>
                <p class="section-subtitle animate-on-scroll delay-100">We're committed to delivering the freshest, healthiest juices with premium quality and unmatched taste.</p>
                
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="feature-card animate-on-scroll scale-in delay-200">
                        <i class="fas fa-leaf feature-icon"></i>
                        <h3 class="feature-title">100% Organic</h3>
                        <p class="feature-description">Sourced from certified organic farms, ensuring the purest and most nutritious ingredients in every sip.</p>
                    </div>
                    
                    <div class="feature-card animate-on-scroll scale-in delay-300">
                        <i class="fas fa-bolt feature-icon"></i>
                        <h3 class="feature-title">Cold Pressed</h3>
                        <p class="feature-description">Our advanced cold-press technology preserves maximum nutrients and delivers exceptional taste.</p>
                    </div>
                    
                    <div class="feature-card animate-on-scroll scale-in delay-400">
                        <i class="fas fa-shipping-fast feature-icon"></i>
                        <h3 class="feature-title">Fast Delivery</h3>
                        <p class="feature-description">Quick and reliable delivery service to get your fresh juices to you within hours of pressing.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Menu Section -->
        <section id="menu" class="section section-alt">
            <div class="container mx-auto px-4">
                <h2 class="section-title animate-on-scroll">Our Premium Juice Collection</h2>
                <p class="section-subtitle animate-on-scroll delay-100">Discover our signature fresh juice combinations, crafted with love and the finest organic ingredients.</p>
                
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="feature-card animate-on-scroll scale-in delay-200">
                        <i class="fas fa-seedling feature-icon"></i>
                        <h3 class="feature-title">Green Goddess</h3>
                        <p class="feature-description">Spinach, Kale, Apple, Lemon & Ginger - LKR 2,997</p>
                    </div>
                    
                    <div class="feature-card animate-on-scroll scale-in delay-300">
                        <i class="fas fa-sun feature-icon"></i>
                        <h3 class="feature-title">Orange Sunrise</h3>
                        <p class="feature-description">Orange, Carrot, Turmeric & Ginger - LKR 1,047</p>
                    </div>
                    
                    <div class="feature-card animate-on-scroll scale-in delay-400">
                        <i class="fas fa-heart feature-icon"></i>
                        <h3 class="feature-title">Berry Bliss</h3>
                        <p class="feature-description">Strawberry, Blueberry, Raspberry & Mint - LKR 3,297</p>
                    </div>
                </div>
                
                <div class="text-center mt-16 animate-on-scroll delay-200">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn-primary-custom">View Full Menu</a>
                    @else
                        <a href="{{ route('register') }}" class="btn-primary-custom">Join & Explore Menu</a>
                    @endauth
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section id="contact" class="section relative overflow-hidden">
            <!-- Background Image with Blur -->
            <div class="absolute inset-0 z-0">
                <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('images/fruit-splash.jpeg') }}');"></div>
                <div class="absolute inset-0 bg-cover bg-center bg-no-repeat filter blur-md" style="background-image: url('{{ asset('images/fruit-splash.jpeg') }}');"></div>
                <div class="absolute inset-0 bg-black bg-opacity-40"></div>
            </div>
            
            <!-- Content -->
            <div class="container mx-auto px-4 relative z-10">
                <h2 class="section-title animate-on-scroll text-white">Get Started Today</h2>
                <p class="section-subtitle animate-on-scroll delay-100 text-white opacity-90">Ready to transform your health with fresh, organic juices? Join our community of health enthusiasts.</p>
                
                <div class="flex flex-col sm:flex-row gap-6 justify-center animate-on-scroll delay-200">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn-primary-custom">Go to Dashboard</a>
                    @else
                        <a href="{{ route('register') }}" class="btn-primary-custom">Start Your Journey</a>
                        <a href="{{ route('login') }}" class="btn-outline-custom">Already a Member?</a>
                    @endauth
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white py-16 border-t-4 border-accent-yellow">
            <div class="container mx-auto px-4">
                <div class="grid md:grid-cols-3 gap-8">
                    <div>
                        <div class="flex items-center space-x-3 mb-6">
                            <img src="{{ asset('logo/logo.png') }}" alt="Juice Heaven Logo" class="w-12 h-12 rounded-full shadow-lg">
                            <div>
                                <div class="text-xl font-bold text-accent-yellow">Juice Heaven</div>
                                <div class="text-xs text-gray-300">FRESH • HEALTHY • DELICIOUS</div>
                            </div>
                        </div>
                        <p class="text-gray-300 mb-6">
                            Transforming lives one sip at a time with premium organic juices crafted from nature's finest ingredients.
                        </p>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-bold mb-4 text-primary-green">Quick Links</h3>
                        <ul class="space-y-2">
                            <li><a href="#menu" class="text-gray-300 hover:text-accent-yellow transition-colors">🧃 Menu</a></li>
                            <li><a href="#about" class="text-gray-300 hover:text-primary-green transition-colors">🌱 About Us</a></li>
                            <li><a href="#contact" class="text-gray-300 hover:text-accent-red transition-colors">📞 Contact</a></li>
                            @auth
                                <li><a href="{{ url('/dashboard') }}" class="text-gray-300 hover:text-accent-yellow transition-colors">🏠 Dashboard</a></li>
                            @else
                                <li><a href="{{ route('register') }}" class="text-gray-300 hover:text-accent-red transition-colors">🚀 Get Started</a></li>
                            @endauth
                        </ul>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-bold mb-4 text-accent-red">Contact Info</h3>
                        <ul class="space-y-2 text-gray-300">
                            <li>📍 123 Fresh Street, Health City</li>
                            <li>📞 (555) 123-JUICE</li>
                            <li>✉️ hello@juiceheaven.com</li>
                            <li>🕒 Open 6AM - 10PM Daily</li>
                        </ul>
                    </div>
                </div>
                
                <div class="border-t border-gray-600 mt-8 pt-8 text-center">
                    <p class="text-gray-400">&copy; 2025 <span class="text-accent-yellow font-semibold">Juice Heaven</span>. All rights reserved. Made with <span class="text-accent-red">❤️</span> for your health.</p>
                </div>
            </div>
        </footer>

        <script>
            // Mobile menu toggle
            function toggleMobileMenu() {
                const navbar = document.getElementById('navbarNav');
                navbar.classList.toggle('hidden');
            }

            // Scroll Animation Observer
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('fade-in-up');
                    }
                });
            }, observerOptions);

            // Initialize scroll animations
            function initScrollAnimations() {
                const animatedElements = document.querySelectorAll('.animate-on-scroll');
                animatedElements.forEach(el => {
                    observer.observe(el);
                });
            }

            // Initialize animations when DOM is loaded
            document.addEventListener('DOMContentLoaded', function() {
                initScrollAnimations();
            });

            // Smooth scrolling for navigation links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Navbar background on scroll
            window.addEventListener('scroll', function() {
                const navbar = document.querySelector('nav');
                if (window.scrollY > 50) {
                    navbar.style.background = 'rgba(255, 255, 255, 0.98)';
                } else {
                    navbar.style.background = 'rgba(255, 255, 255, 0.95)';
                }
            });

            // Active navigation highlighting
            window.addEventListener('scroll', function() {
                const sections = document.querySelectorAll('section[id]');
                const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
                
                let current = '';
                sections.forEach(section => {
                    const sectionTop = section.offsetTop - 100;
                    if (window.scrollY >= sectionTop) {
                        current = section.getAttribute('id');
                    }
                });

                navLinks.forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('href') === '#' + current) {
                        link.classList.add('active');
                    }
                });
            });
        </script>
    </body>
</html>