<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight text-center">
            {{ __('Internships') }}
        </h2>
    </x-slot>

    <style>
        /* Page Background */
        .internship-bg {
            background: linear-gradient(135deg, #f0fdfa 0%, #ccfbf1 50%, #99f6e4 100%);
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

        /* Internship Card Styling */
        .internship-card {
            transition: all 0.3s ease;
            cursor: pointer;
            background: white;
            border-radius: 1rem;
            overflow: hidden;
        }

        .internship-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        /* Modal Styling */
        .modal {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(4px);
            z-index: 9999;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: white;
            border-radius: 1.5rem;
            max-width: 600px;
            width: 100%;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
            margin: 1rem;
        }

        /* Form Input Styling */
        .form-input, .form-select, .form-textarea {
            width: 100%;
            padding: 1rem 1.25rem;
            border: 2px solid #e5e7eb;
            border-radius: 0.75rem;
            font-size: 1rem;
            transition: all 0.2s ease;
            background: #f9fafb;
        }

        .form-input:focus, .form-select:focus, .form-textarea:focus {
            outline: none;
            border-color: #14b8a6;
            background: white;
            box-shadow: 0 0 0 4px rgba(20, 184, 166, 0.1);
        }

        /* Button Styling */
        .btn-apply {
            background: linear-gradient(135deg, #14b8a6, #0d9488);
            color: white;
            padding: 0.875rem 2rem;
            border-radius: 0.75rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(20, 184, 166, 0.3);
        }

        .btn-apply:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(20, 184, 166, 0.4);
        }

        .btn-cancel {
            background: linear-gradient(135deg, #6b7280, #4b5563);
            color: white;
            padding: 0.875rem 2rem;
            border-radius: 0.75rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-cancel:hover {
            background: linear-gradient(135deg, #4b5563, #374151);
        }

        .btn-submit {
            background: linear-gradient(135deg, #14b8a6, #0d9488);
            color: white;
            padding: 0.875rem 2rem;
            border-radius: 0.75rem;
            font-weight: 600;
            width: 100%;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(20, 184, 166, 0.3);
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(20, 184, 166, 0.4);
        }
    </style>

    <div class="internship-bg py-12">
        <div class="max-w-7xl mx-auto px-6">

            <!-- Back Button -->
            <div class="mb-8">
                <a href="{{ route('career.index') }}" class="inline-flex items-center gap-2 text-teal-600 hover:text-teal-800 font-semibold transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                    </svg>
                    Back to Career Center
                </a>
            </div>

            <!-- Internship Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Internship 1 -->
                <div class="internship-card shadow-lg p-6" onclick="openModal('intern1')">
                    <div class="flex justify-between mb-4">
                        <div class="w-14 h-14 bg-teal-100 rounded-xl flex items-center justify-center text-3xl">💻</div>
                        <span class="px-3 py-1 bg-orange-100 text-orange-700 text-xs font-semibold rounded-full h-fit">3 months</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Web Development Intern</h3>
                    <p class="text-gray-600 text-sm mb-2 font-medium">Digital Agency Pro</p>
                    <p class="text-gray-500 text-sm mb-4">Learn web development with real projects and mentorship</p>

                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-3 py-1 bg-teal-50 text-teal-600 text-xs font-medium rounded-lg">HTML</span>
                        <span class="px-3 py-1 bg-teal-50 text-teal-600 text-xs font-medium rounded-lg">CSS</span>
                        <span class="px-3 py-1 bg-teal-50 text-teal-600 text-xs font-medium rounded-lg">PHP</span>
                    </div>

                    <div class="flex justify-between text-sm text-gray-600 font-medium">
                        <span>📍 Jakarta</span>
                        <span>💵 Paid</span>
                    </div>
                </div>

                <!-- Internship 2 -->
                <div class="internship-card shadow-lg p-6" onclick="openModal('intern2')">
                    <div class="flex justify-between mb-4">
                        <div class="w-14 h-14 bg-pink-100 rounded-xl flex items-center justify-center text-3xl">🎨</div>
                        <span class="px-3 py-1 bg-orange-100 text-orange-700 text-xs font-semibold rounded-full h-fit">6 months</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Graphic Design Intern</h3>
                    <p class="text-gray-600 text-sm mb-2 font-medium">Creative Hub Studio</p>
                    <p class="text-gray-500 text-sm mb-4">Create stunning visuals for marketing campaigns</p>

                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-3 py-1 bg-pink-50 text-pink-600 text-xs font-medium rounded-lg">Photoshop</span>
                        <span class="px-3 py-1 bg-pink-50 text-pink-600 text-xs font-medium rounded-lg">Illustrator</span>
                        <span class="px-3 py-1 bg-pink-50 text-pink-600 text-xs font-medium rounded-lg">Figma</span>
                    </div>

                    <div class="flex justify-between text-sm text-gray-600 font-medium">
                        <span>📍 Bandung</span>
                        <span>💵 Unpaid</span>
                    </div>
                </div>

                <!-- Internship 3 -->
                <div class="internship-card shadow-lg p-6" onclick="openModal('intern3')">
                    <div class="flex justify-between mb-4">
                        <div class="w-14 h-14 bg-purple-100 rounded-xl flex items-center justify-center text-3xl">📊</div>
                        <span class="px-3 py-1 bg-orange-100 text-orange-700 text-xs font-semibold rounded-full h-fit">4 months</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Data Analyst Intern</h3>
                    <p class="text-gray-600 text-sm mb-2 font-medium">Insight Labs</p>
                    <p class="text-gray-500 text-sm mb-4">Work with real datasets and business analytics</p>

                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-3 py-1 bg-purple-50 text-purple-600 text-xs font-medium rounded-lg">Excel</span>
                        <span class="px-3 py-1 bg-purple-50 text-purple-600 text-xs font-medium rounded-lg">Python</span>
                        <span class="px-3 py-1 bg-purple-50 text-purple-600 text-xs font-medium rounded-lg">SQL</span>
                    </div>

                    <div class="flex justify-between text-sm text-gray-600 font-medium">
                        <span>📍 Surabaya</span>
                        <span>💵 Paid</span>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- APPLICATION MODALS -->

    <!-- Modal 1: Web Development -->
    <div id="intern1" class="modal">
        <div class="modal-content">
            <div class="p-6 sm:p-8">
                <div class="flex justify-between items-start mb-6">
                    <div class="pr-8">
                        <h2 class="text-2xl font-bold text-gray-800 mb-2">Web Development Intern</h2>
                        <p class="text-gray-600">Digital Agency Pro • 3 months</p>
                    </div>
                    <button onclick="closeModal('intern1')" class="text-gray-400 hover:text-red-600 transition text-2xl flex-shrink-0">✕</button>
                </div>

                <div class="mb-6">
                    <h3 class="font-semibold text-gray-800 mb-2">About the Role:</h3>
                    <p class="text-gray-600 mb-4">You will build real web applications using HTML, CSS, JavaScript, and PHP with guidance from senior developers.</p>
                    
                    <h3 class="font-semibold text-gray-800 mb-2">What You'll Learn:</h3>
                    <ul class="text-sm text-gray-600 mb-6 list-disc list-inside space-y-1">
                        <li>Build responsive websites</li>
                        <li>Work with backend logic and databases</li>
                        <li>Team collaboration using Git</li>
                        <li>Real client projects</li>
                    </ul>
                </div>

                <form onsubmit="handleInternshipSubmit(event, 'Web Development Intern')" class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Full Name *</label>
                        <input type="text" required class="form-input" placeholder="John Doe">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Email Address *</label>
                        <input type="email" required class="form-input" placeholder="john@example.com">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number *</label>
                        <input type="tel" required class="form-input" placeholder="+62 812 3456 7890">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Major/Field of Study *</label>
                        <select required class="form-select">
                            <option value="">Select your major</option>
                            <option value="Computer Science">Computer Science</option>
                            <option value="Information Technology">Information Technology</option>
                            <option value="Software Engineering">Software Engineering</option>
                            <option value="Information Systems">Information Systems</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Current Semester *</label>
                        <input type="number" min="1" max="14" required class="form-input" placeholder="5">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Why are you interested in this internship? *</label>
                        <textarea required rows="4" class="form-textarea" placeholder="Tell us why you want to join..."></textarea>
                    </div>

                    <div class="flex gap-3 pt-4">
                        <button type="button" onclick="closeModal('intern1')" class="btn-cancel flex-1">Cancel</button>
                        <button type="submit" class="btn-submit flex-1">Submit Application</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal 2: Graphic Design -->
    <div id="intern2" class="modal">
        <div class="modal-content">
            <div class="p-6 sm:p-8">
                <div class="flex justify-between items-start mb-6">
                    <div class="pr-8">
                        <h2 class="text-2xl font-bold text-gray-800 mb-2">Graphic Design Intern</h2>
                        <p class="text-gray-600">Creative Hub Studio • 6 months</p>
                    </div>
                    <button onclick="closeModal('intern2')" class="text-gray-400 hover:text-red-600 transition text-2xl flex-shrink-0">✕</button>
                </div>

                <div class="mb-6">
                    <h3 class="font-semibold text-gray-800 mb-2">About the Role:</h3>
                    <p class="text-gray-600 mb-4">Create stunning visual designs for marketing campaigns, social media, and branding projects.</p>
                    
                    <h3 class="font-semibold text-gray-800 mb-2">What You'll Learn:</h3>
                    <ul class="text-sm text-gray-600 mb-6 list-disc list-inside space-y-1">
                        <li>Professional design workflows</li>
                        <li>Client communication</li>
                        <li>Portfolio building</li>
                        <li>Brand identity design</li>
                    </ul>
                </div>

                <form onsubmit="handleInternshipSubmit(event, 'Graphic Design Intern')" class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Full Name *</label>
                        <input type="text" required class="form-input" placeholder="John Doe">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Email Address *</label>
                        <input type="email" required class="form-input" placeholder="john@example.com">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number *</label>
                        <input type="tel" required class="form-input" placeholder="+62 812 3456 7890">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Major/Field of Study *</label>
                        <select required class="form-select">
                            <option value="">Select your major</option>
                            <option value="Visual Communication Design">Visual Communication Design</option>
                            <option value="Graphic Design">Graphic Design</option>
                            <option value="Multimedia">Multimedia</option>
                            <option value="Fine Arts">Fine Arts</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Current Semester *</label>
                        <input type="number" min="1" max="14" required class="form-input" placeholder="5">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Portfolio Link (Optional)</label>
                        <input type="url" class="form-input" placeholder="https://yourportfolio.com">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Why are you interested in this internship? *</label>
                        <textarea required rows="4" class="form-textarea" placeholder="Tell us why you want to join..."></textarea>
                    </div>

                    <div class="flex gap-3 pt-4">
                        <button type="button" onclick="closeModal('intern2')" class="btn-cancel flex-1">Cancel</button>
                        <button type="submit" class="btn-submit flex-1">Submit Application</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal 3: Data Analyst -->
    <div id="intern3" class="modal">
        <div class="modal-content">
            <div class="p-6 sm:p-8">
                <div class="flex justify-between items-start mb-6">
                    <div class="pr-8">
                        <h2 class="text-2xl font-bold text-gray-800 mb-2">Data Analyst Intern</h2>
                        <p class="text-gray-600">Insight Labs • 4 months</p>
                    </div>
                    <button onclick="closeModal('intern3')" class="text-gray-400 hover:text-red-600 transition text-2xl flex-shrink-0">✕</button>
                </div>

                <div class="mb-6">
                    <h3 class="font-semibold text-gray-800 mb-2">About the Role:</h3>
                    <p class="text-gray-600 mb-4">Work with real business datasets and produce analytical reports to support decision-making.</p>
                    
                    <h3 class="font-semibold text-gray-800 mb-2">What You'll Learn:</h3>
                    <ul class="text-sm text-gray-600 mb-6 list-disc list-inside space-y-1">
                        <li>Data analysis with Python and SQL</li>
                        <li>Create dashboards and visualizations</li>
                        <li>Present insights to stakeholders</li>
                        <li>Statistical analysis</li>
                    </ul>
                </div>

                <form onsubmit="handleInternshipSubmit(event, 'Data Analyst Intern')" class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Full Name *</label>
                        <input type="text" required class="form-input" placeholder="John Doe">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Email Address *</label>
                        <input type="email" required class="form-input" placeholder="john@example.com">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number *</label>
                        <input type="tel" required class="form-input" placeholder="+62 812 3456 7890">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Major/Field of Study *</label>
                        <select required class="form-select">
                            <option value="">Select your major</option>
                            <option value="Statistics">Statistics</option>
                            <option value="Mathematics">Mathematics</option>
                            <option value="Computer Science">Computer Science</option>
                            <option value="Information Systems">Information Systems</option>
                            <option value="Business Analytics">Business Analytics</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Current Semester *</label>
                        <input type="number" min="1" max="14" required class="form-input" placeholder="5">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Why are you interested in this internship? *</label>
                        <textarea required rows="4" class="form-textarea" placeholder="Tell us why you want to join..."></textarea>
                    </div>

                    <div class="flex gap-3 pt-4">
                        <button type="button" onclick="closeModal('intern3')" class="btn-cancel flex-1">Cancel</button>
                        <button type="submit" class="btn-submit flex-1">Submit Application</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        function openModal(id) {
            const modal = document.getElementById(id);
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeModal(id) {
            const modal = document.getElementById(id);
            modal.classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        function handleInternshipSubmit(event, position) {
            event.preventDefault();
            alert(`✅ Application for "${position}" submitted successfully!\n\n(This is a demo - no data was saved)`);
            const modalId = event.target.closest('.modal').id;
            closeModal(modalId);
            event.target.reset();
        }

        // Close modal when clicking outside
        document.querySelectorAll('.modal').forEach(modal => {
            modal.addEventListener('click', function(e) {
                if (e.target === this) {
                    closeModal(this.id);
                }
            });
        });
    </script>
</x-app-layout>