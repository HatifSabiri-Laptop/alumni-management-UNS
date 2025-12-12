<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Alumni') }}
        </h2>
    </x-slot>

    <style>
        /* Page Background - Gradient */
        .dashboard-bg {
            background: linear-gradient(135deg, #e0f2fe 0%, #bae6fd 25%, #7dd3fc 50%, #38bdf8 75%, #0ea5e9 100%);
            min-height: 100vh;
        }

        /* Remove logo background in sidebar */
        nav .shrink-0,
        nav .shrink-0 img,
        nav .shrink-0 a {
            background: transparent !important;
            box-shadow: none !important;
        }

        /* Sidebar Navigation Links */
        nav a[href*="dashboard"],
        nav a[href*="alumni"] {
            background: linear-gradient(135deg, #60a5fa, #3b82f6, #2563eb) !important;
            color: white !important;
            border-radius: 0.75rem !important;
            padding: 0.75rem 1rem !important;
            margin: 0.5rem !important;
            display: block !important;
            transition: all 0.3s ease !important;
        }

        nav a[href*="dashboard"]:hover,
        nav a[href*="alumni"]:hover {
            transform: translateX(4px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.4);
        }
        nav {
            padding-top: 1.5rem !important;
        }

        /* Form Container */
        .form-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            padding: 3rem;
        }

        /* Form Title */
        .form-title {
            font-size: 1.875rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 2rem;
            text-align: center;
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Form Row */
        .form-row {
            display: grid;
            grid-template-columns: 200px 1fr;
            gap: 1.5rem;
            align-items: center;
            margin-bottom: 1.75rem;
        }

        .form-row.textarea-row {
            align-items: start;
        }

        /* Label Styling */
        .form-label {
            font-weight: 600;
            color: #374151;
            font-size: 0.95rem;
        }

        /* Input Styling */
        .form-input,
        .form-textarea {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-size: 0.95rem;
            transition: all 0.2s ease;
            background: #f9fafb;
        }

        .form-input:focus,
        .form-textarea:focus {
            outline: none;
            border-color: #3b82f6;
            background: white;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        }

        .form-textarea {
            resize: vertical;
            min-height: 100px;
        }

        /* Button Container */
        .button-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 2px solid #f3f4f6;
        }

        /* Cancel Button */
        .btn-cancel {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.875rem 2rem;
            background: linear-gradient(135deg, #6b7280, #4b5563);
            color: white;
            font-weight: 600;
            border-radius: 50px;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(107, 114, 128, 0.3);
        }

        .btn-cancel:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(107, 114, 128, 0.4);
            background: linear-gradient(135deg, #4b5563, #374151);
        }

        /* Save Button */
        .btn-save {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.875rem 2.5rem;
            background: linear-gradient(135deg, #3b82f6, #6366f1, #8b5cf6);
            color: white;
            font-weight: 600;
            border-radius: 50px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.4);
        }

        .btn-save:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 25px rgba(59, 130, 246, 0.5);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .form-container {
                padding: 2rem 1.5rem;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 0.5rem;
            }

            .button-container {
                flex-direction: column-reverse;
                gap: 1rem;
            }

            .btn-cancel,
            .btn-save {
                width: 100%;
                justify-content: center;
            }
        }
    </style>

    <!-- Main Content Area -->
    <div class="dashboard-bg py-12 px-4">
        
        <!-- Form Container -->
        <div class="form-container">
            
            <h1 class="form-title">➕ Add New Alumni</h1>

            <form action="{{ route('alumni.store') }}" method="POST">
                @csrf

                <!-- Full Name -->
                <div class="form-row">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="full_name" value="{{ old('full_name') }}" class="form-input" required>
                </div>

                <!-- Email -->
                <div class="form-row">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-input" required>
                </div>

                <!-- Graduation Year -->
                <div class="form-row">
                    <label class="form-label">Graduation Year</label>
                    <input type="text" name="graduation_year" value="{{ old('graduation_year') }}" class="form-input" required>
                </div>

                <!-- Program -->
                <div class="form-row">
                    <label class="form-label">Program</label>
                    <input type="text" name="program" value="{{ old('program') }}" class="form-input" required>
                </div>

                <!-- Job -->
                <div class="form-row">
                    <label class="form-label">Job</label>
                    <input type="text" name="job" value="{{ old('job') }}" class="form-input">
                </div>

                <!-- Company -->
                <div class="form-row">
                    <label class="form-label">Company</label>
                    <input type="text" name="company" value="{{ old('company') }}" class="form-input">
                </div>

                <!-- Phone -->
                <div class="form-row">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" value="{{ old('phone') }}" class="form-input">
                </div>

                <!-- Address -->
                <div class="form-row textarea-row">
                    <label class="form-label">Address</label>
                    <textarea name="address" class="form-textarea">{{ old('address') }}</textarea>
                </div>

                <!-- Action Buttons -->
                <div class="button-container">
                    <a href="{{ route('alumni.index') }}" class="btn-cancel">
                        <span>←</span>
                        <span>Cancel</span>
                    </a>

                    <button type="submit" class="btn-save">
                        <span>💾</span>
                        <span>Create Alumni</span>
                    </button>
                </div>

            </form>

        </div>

    </div>
</x-app-layout>