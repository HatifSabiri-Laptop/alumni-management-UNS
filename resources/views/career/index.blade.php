<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight text-center">
            {{ __('Career Center') }}
        </h2>
    </x-slot>

    <style>
        /* Page Background */
        .career-bg {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 25%, #fcd34d 50%, #fbbf24 75%, #f59e0b 100%);
            min-height: 100vh;
        }

        /* Navigation Styling */
        nav .shrink-0 img,
        nav .shrink-0 a {
            background: transparent !important;
            box-shadow: none !important;
        }

        nav a[href*="dashboard"],
        nav a[href*="alumni"],
        nav a[href*="career"] {
            background: linear-gradient(135deg, #60a5fa, #3b82f6, #2563eb) !important;
            color: white !important;
            font-weight: 600 !important;
            padding: 0.75rem 1.25rem !important;
            border-radius: 0.75rem !important;
            transition: all 0.3s ease !important;
        }

        /* Career Card Styling */
        .career-card {
            background: white;
            border-radius: 1.5rem;
            padding: 2.5rem;
            transition: all 0.3s ease;
            cursor: pointer;
            overflow: hidden;
            position: relative;
        }

        .career-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, #3b82f6, #8b5cf6);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .career-card:hover::before {
            transform: scaleX(1);
        }

        .career-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
        }

        /* Icon Container */
        .icon-container {
            width: 80px;
            height: 80px;
            border-radius: 1.25rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            margin-bottom: 1.5rem;
            transition: all 0.3s ease;
        }

        .career-card:hover .icon-container {
            transform: scale(1.1) rotate(5deg);
        }

        /* Button Styling */
        .btn-explore {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.875rem 2rem;
            border-radius: 0.75rem;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .btn-internship {
            background: linear-gradient(135deg, #14b8a6, #0d9488);
            color: white;
            box-shadow: 0 4px 15px rgba(20, 184, 166, 0.3);
        }

        .btn-internship:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(20, 184, 166, 0.4);
        }

        .btn-job {
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            color: white;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
        }

        .btn-job:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(59, 130, 246, 0.4);
        }

        /* Stats Badge */
        .stats-badge {
            display: inline-block;
            padding: 0.5rem 1rem;
            background: #f3f4f6;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            font-weight: 600;
            color: #374151;
            margin-top: 1rem;
        }
    </style>

    <div class="career-bg py-12">
        <div class="max-w-7xl mx-auto px-6">

            <!-- Welcome Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">
                    🎯 Welcome to Career Center
                </h1>
                <p class="text-lg text-gray-700 max-w-2xl mx-auto">
                    Explore exciting opportunities to kickstart your career journey. Find internships and full-time positions from top companies.
                </p>
            </div>

            <!-- Career Options Grid -->
            <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">

                <!-- Internships Card -->
                <div class="career-card">
                    <div class="icon-container bg-teal-100">
                        🎓
                    </div>
                    
                    <h2 class="text-3xl font-bold text-gray-800 mb-3">
                        Internships
                    </h2>
                    
                    <p class="text-gray-600 mb-4 leading-relaxed">
                        Gain hands-on experience and learn from industry professionals. Perfect for students looking to build their skills and portfolio.
                    </p>

                    <ul class="text-sm text-gray-600 mb-6 space-y-2">
                        <li class="flex items-start gap-2">
                            <span class="text-teal-600 font-bold">✓</span>
                            <span>3-6 months duration</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-teal-600 font-bold">✓</span>
                            <span>Mentorship from senior professionals</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-teal-600 font-bold">✓</span>
                            <span>Real-world project experience</span>
                        </li>
                    </ul>

                    <a href="{{ route('career.internship') }}" class="btn-explore btn-internship">
                        <span>Explore Internships</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>

                    <div class="stats-badge">
                        📊 3 Positions Available
                    </div>
                </div>

                <!-- Job Vacancies Card -->
                <div class="career-card">
                    <div class="icon-container bg-blue-100">
                        💼
                    </div>
                    
                    <h2 class="text-3xl font-bold text-gray-800 mb-3">
                        Job Vacancies
                    </h2>
                    
                    <p class="text-gray-600 mb-4 leading-relaxed">
                        Start your professional career with full-time positions at leading companies. Competitive salaries and growth opportunities await.
                    </p>

                    <ul class="text-sm text-gray-600 mb-6 space-y-2">
                        <li class="flex items-start gap-2">
                            <span class="text-blue-600 font-bold">✓</span>
                            <span>Full-time permanent positions</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-blue-600 font-bold">✓</span>
                            <span>Competitive salary packages</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-blue-600 font-bold">✓</span>
                            <span>Career growth opportunities</span>
                        </li>
                    </ul>

                    <a href="{{ route('career.job') }}" class="btn-explore btn-job">
                        <span>Browse Job Vacancies</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>

                    <div class="stats-badge">
                        📊 6 Positions Available
                    </div>
                </div>

            </div>

            <!-- Additional Info Section -->
            <div class="mt-16 max-w-4xl mx-auto">
                <div class="bg-white/90 backdrop-blur rounded-2xl p-8 shadow-xl">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4 text-center">
                        🚀 Why Choose Our Career Center?
                    </h3>
                    
                    <div class="grid md:grid-cols-3 gap-6 mt-8">
                        <div class="text-center">
                            <div class="text-4xl mb-3">🏢</div>
                            <h4 class="font-semibold text-gray-800 mb-2">Top Companies</h4>
                            <p class="text-sm text-gray-600">Partner with leading organizations across industries</p>
                        </div>
                        
                        <div class="text-center">
                            <div class="text-4xl mb-3">📈</div>
                            <h4 class="font-semibold text-gray-800 mb-2">Career Growth</h4>
                            <p class="text-sm text-gray-600">Opportunities for learning and advancement</p>
                        </div>
                        
                        <div class="text-center">
                            <div class="text-4xl mb-3">🤝</div>
                            <h4 class="font-semibold text-gray-800 mb-2">Support System</h4>
                            <p class="text-sm text-gray-600">Guidance from mentors and career advisors</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>