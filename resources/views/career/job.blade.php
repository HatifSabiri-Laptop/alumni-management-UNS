<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight text-center">
            {{ __('Job Vacancies') }}
        </h2>
    </x-slot>

    <style>
        /* Page Background */
        .job-bg {
            background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 50%, #bfdbfe 100%);
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

        /* Job Card Styling */
        .job-card {
            transition: all 0.3s ease;
            cursor: pointer;
            background: white;
            border-radius: 1rem;
            overflow: hidden;
        }

        .job-card:hover {
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
            max-width: 650px;
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
            border-color: #3b82f6;
            background: white;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        }

        /* Button Styling */
        .btn-cancel {
            background: linear-gradient(135deg, #6b7280, #4b5563);
            color: white;
            padding: 0.875rem 2rem;
            border-radius: 0.75rem;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn-cancel:hover {
            background: linear-gradient(135deg, #4b5563, #374151);
        }

        .btn-submit {
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            color: white;
            padding: 0.875rem 2rem;
            border-radius: 0.75rem;
            font-weight: 600;
            width: 100%;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(59, 130, 246, 0.4);
        }
    </style>

    <div class="job-bg py-12">
        <div class="max-w-7xl mx-auto px-6">

            <!-- Back Button -->
            <div class="mb-8">
                <a href="{{ route('career.index') }}" class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-semibold transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                    </svg>
                    Back to Career Center
                </a>
            </div>

            <!-- Job Listings Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Job Card 1 -->
                <div class="job-card shadow-lg p-6" onclick="openJobModal('job1', 'Software Engineer', 'Tech Solutions Inc.')">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center text-3xl">💼</div>
                        <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">Full-time</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Software Engineer</h3>
                    <p class="text-gray-600 text-sm mb-4 font-medium">Tech Solutions Inc.</p>
                    <p class="text-gray-500 text-sm mb-4">Build scalable web applications using modern technologies</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-3 py-1 bg-blue-50 text-blue-600 text-xs font-medium rounded-lg">React</span>
                        <span class="px-3 py-1 bg-blue-50 text-blue-600 text-xs font-medium rounded-lg">Node.js</span>
                        <span class="px-3 py-1 bg-blue-50 text-blue-600 text-xs font-medium rounded-lg">AWS</span>
                    </div>
                    <div class="flex items-center justify-between text-sm text-gray-600 font-medium">
                        <span>📍 Jakarta</span>
                        <span>💰 $60k-80k</span>
                    </div>
                </div>

                <!-- Job Card 2 -->
                <div class="job-card shadow-lg p-6" onclick="openJobModal('job2', 'UI/UX Designer', 'Creative Studio')">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-14 h-14 bg-purple-100 rounded-xl flex items-center justify-center text-3xl">🎨</div>
                        <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">Full-time</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">UI/UX Designer</h3>
                    <p class="text-gray-600 text-sm mb-4 font-medium">Creative Studio</p>
                    <p class="text-gray-500 text-sm mb-4">Design beautiful user experiences for mobile and web</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-3 py-1 bg-purple-50 text-purple-600 text-xs font-medium rounded-lg">Figma</span>
                        <span class="px-3 py-1 bg-purple-50 text-purple-600 text-xs font-medium rounded-lg">Adobe XD</span>
                        <span class="px-3 py-1 bg-purple-50 text-purple-600 text-xs font-medium rounded-lg">Sketch</span>
                    </div>
                    <div class="flex items-center justify-between text-sm text-gray-600 font-medium">
                        <span>📍 Surabaya</span>
                        <span>💰 $50k-70k</span>
                    </div>
                </div>

                <!-- Job Card 3 -->
                <div class="job-card shadow-lg p-6" onclick="openJobModal('job3', 'Data Analyst', 'DataCorp Analytics')">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center text-3xl">📊</div>
                        <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">Full-time</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Data Analyst</h3>
                    <p class="text-gray-600 text-sm mb-4 font-medium">DataCorp Analytics</p>
                    <p class="text-gray-500 text-sm mb-4">Analyze data and provide insights for business decisions</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-3 py-1 bg-green-50 text-green-600 text-xs font-medium rounded-lg">Python</span>
                        <span class="px-3 py-1 bg-green-50 text-green-600 text-xs font-medium rounded-lg">SQL</span>
                        <span class="px-3 py-1 bg-green-50 text-green-600 text-xs font-medium rounded-lg">Tableau</span>
                    </div>
                    <div class="flex items-center justify-between text-sm text-gray-600 font-medium">
                        <span>📍 Bandung</span>
                        <span>💰 $55k-75k</span>
                    </div>
                </div>

                <!-- Job Card 4 -->
                <div class="job-card shadow-lg p-6" onclick="openJobModal('job4', 'Mobile Developer', 'App Masters')">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-14 h-14 bg-red-100 rounded-xl flex items-center justify-center text-3xl">📱</div>
                        <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">Full-time</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Mobile Developer</h3>
                    <p class="text-gray-600 text-sm mb-4 font-medium">App Masters</p>
                    <p class="text-gray-500 text-sm mb-4">Create amazing mobile experiences for iOS and Android</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-3 py-1 bg-red-50 text-red-600 text-xs font-medium rounded-lg">Flutter</span>
                        <span class="px-3 py-1 bg-red-50 text-red-600 text-xs font-medium rounded-lg">React Native</span>
                        <span class="px-3 py-1 bg-red-50 text-red-600 text-xs font-medium rounded-lg">Swift</span>
                    </div>
                    <div class="flex items-center justify-between text-sm text-gray-600 font-medium">
                        <span>📍 Jakarta</span>
                        <span>💰 $65k-85k</span>
                    </div>
                </div>

                <!-- Job Card 5 -->
                <div class="job-card shadow-lg p-6" onclick="openJobModal('job5', 'Product Manager', 'Innovation Labs')">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-14 h-14 bg-yellow-100 rounded-xl flex items-center justify-center text-3xl">🎯</div>
                        <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">Full-time</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Product Manager</h3>
                    <p class="text-gray-600 text-sm mb-4 font-medium">Innovation Labs</p>
                    <p class="text-gray-500 text-sm mb-4">Lead product strategy and development lifecycle</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-3 py-1 bg-yellow-50 text-yellow-600 text-xs font-medium rounded-lg">Agile</span>
                        <span class="px-3 py-1 bg-yellow-50 text-yellow-600 text-xs font-medium rounded-lg">Jira</span>
                        <span class="px-3 py-1 bg-yellow-50 text-yellow-600 text-xs font-medium rounded-lg">Analytics</span>
                    </div>
                    <div class="flex items-center justify-between text-sm text-gray-600 font-medium">
                        <span>📍 Yogyakarta</span>
                        <span>💰 $70k-90k</span>
                    </div>
                </div>

                <!-- Job Card 6 -->
                <div class="job-card shadow-lg p-6" onclick="openJobModal('job6', 'Cybersecurity Analyst', 'SecureNet Solutions')">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-14 h-14 bg-indigo-100 rounded-xl flex items-center justify-center text-3xl">🔒</div>
                        <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">Full-time</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Cybersecurity Analyst</h3>
                    <p class="text-gray-600 text-sm mb-4 font-medium">SecureNet Solutions</p>
                    <p class="text-gray-500 text-sm mb-4">Protect systems and networks from cyber threats</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-3 py-1 bg-indigo-50 text-indigo-600 text-xs font-medium rounded-lg">Network Security</span>
                        <span class="px-3 py-1 bg-indigo-50 text-indigo-600 text-xs font-medium rounded-lg">Penetration Testing</span>
                    </div>
                    <div class="flex items-center justify-between text-sm text-gray-600 font-medium">
                        <span>📍 Jakarta</span>
                        <span>💰 $75k-95k</span>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <!-- Application Modal -->
    <div id="applicationModal" class="modal">
        <div class="modal-content">
            <div class="p-6 sm:p-8">
                <div class="flex justify-between items-start mb-6">
                    <div class="pr-8">
                        <h3 class="text-2xl font-bold text-gray-800 mb-2" id="modalTitle">Apply for Position</h3>
                        <p class="text-gray-600" id="modalCompany">Company Name</p>
                    </div>
                    <button onclick="closeJobModal()" class="text-gray-400 hover:text-red-600 transition text-2xl flex-shrink-0">✕</button>
                </div>

                <form onsubmit="handleJobSubmit(event)" class="space-y-4">

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
                            <option value="Design">Design</option>
                            <option value="Business">Business</option>
                            <option value="Engineering">Engineering</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Years of Experience *</label>
                        <input type="number" min="0" max="50" required class="form-input" placeholder="3">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">LinkedIn Profile (Optional)</label>
                        <input type="url" class="form-input" placeholder="https://linkedin.com/in/yourprofile">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Why should we hire you? *</label>
                        <textarea required rows="4" class="form-textarea" placeholder="Tell us about your skills and experience..."></textarea>
                    </div>

                    <div class="flex gap-3 pt-4">
                        <button type="button" onclick="closeJobModal()" class="btn-cancel flex-1">Cancel</button>
                        <button type="submit" class="btn-submit flex-1">Submit Application</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        let currentJobTitle = '';

        function openJobModal(jobId, jobTitle, company) {
            currentJobTitle = jobTitle;
            document.getElementById('modalTitle').textContent = `Apply for ${jobTitle}`;
            document.getElementById('modalCompany').textContent = company;
            const modal = document.getElementById('applicationModal');
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeJobModal() {
            const modal = document.getElementById('applicationModal');
            modal.classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        function handleJobSubmit(event) {
            event.preventDefault();
            alert(`✅ Application for "${currentJobTitle}" submitted successfully!\n\n(This is a demo - no data was saved)`);
            closeJobModal();
            event.target.reset();
        }

        // Close modal when clicking outside
        document.getElementById('applicationModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeJobModal();
            }
        });
    </script>
</x-app-layout>