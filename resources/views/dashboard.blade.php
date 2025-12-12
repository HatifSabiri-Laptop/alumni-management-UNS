<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl md:text-3xl text-gray-800 leading-tight text-center">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <style>
        .dashboard-bg {
            background: linear-gradient(135deg, #e0f2fe 0%, #bae6fd 25%, #7dd3fc 50%, #38bdf8 75%, #0ea5e9 100%);
            min-height: calc(100vh - 64px);
        }

        .btn-choose-file {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            padding: 1rem 2rem;
            background: linear-gradient(135deg, #06b6d4, #0ea5e9, #3b82f6);
            color: white;
            font-weight: 700;
            font-size: 1rem;
            border-radius: 50px;
            cursor: pointer;
            box-shadow: 0 10px 30px rgba(14, 165, 233, 0.4);
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .btn-choose-file:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 15px 40px rgba(14, 165, 233, 0.5);
        }

        .btn-upload {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            padding: 1rem 2.5rem;
            background: linear-gradient(135deg, #8b5cf6, #6366f1, #3b82f6);
            color: white;
            font-weight: 700;
            font-size: 1rem;
            border-radius: 50px;
            border: none;
            cursor: pointer;
            box-shadow: 0 10px 30px rgba(139, 92, 246, 0.4);
            transition: all 0.3s ease;
        }

        .btn-upload:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 15px 40px rgba(139, 92, 246, 0.5);
        }

        .file-name-display {
            padding: 0.75rem 1.5rem;
            background: #f1f5f9;
            border-radius: 12px;
            color: #475569;
            font-weight: 500;
            font-size: 0.95rem;
            border: 2px dashed #cbd5e1;
            min-width: 250px;
            max-width: 100%;
            text-align: center;
            word-break: break-all;
        }

        .file-name-display.has-file {
            background: #dbeafe;
            border-color: #3b82f6;
            color: #1e40af;
        }

        /* Mobile Responsive */
        @media (max-width: 640px) {
            .btn-choose-file,
            .btn-upload {
                width: 100%;
                justify-content: center;
                padding: 0.875rem 1.5rem;
                font-size: 0.9rem;
            }

            .file-name-display {
                min-width: auto;
                font-size: 0.85rem;
            }
        }
    </style>

    <div class="dashboard-bg flex items-center justify-center py-6 md:py-12 px-4">
        <div class="w-full max-w-3xl mx-auto">
            <div class="bg-white bg-opacity-95 backdrop-blur-md overflow-hidden shadow-2xl rounded-2xl p-6 md:p-12">
                <div class="text-center">
                    <h1 class="text-3xl md:text-4xl font-semibold text-blue-700 mb-4 animate-pulse">
                        Selamat Datang!
                    </h1>
                    <p class="text-base md:text-lg text-gray-700 mb-8">
                        Selamat datang di <span class="font-semibold text-blue-600">Alumni Mahasiswa UNS</span> Dashboard.<br class="hidden sm:block">
                        Terima kasih telah menjadi bagian dari perjalanan akademik kami.
                    </p>

                    <div class="mt-6 mb-10">
                        <a href="{{ route('alumni.index') }}"
                           class="inline-block px-8 md:px-11 py-3 bg-gradient-to-r from-white-500 via-indigo-600 to-blue-700 text-black font-semibold rounded-xl shadow-xl hover:shadow-2xl hover:scale-110 transition-all duration-300">
                            Lihat Data Alumni
                        </a>
                    </div>

                    <div class="mt-10 pt-8 border-t-2 border-gray-200">
                        <h3 class="text-xl md:text-2xl font-bold text-blue-700 mb-6">
                            Upload Image
                        </h3>

                        <form action="/upload" method="POST" enctype="multipart/form-data" class="flex flex-col items-center space-y-5">
                            @csrf

                            <input type="file" id="image" name="image" class="hidden" required onchange="updateFileName(this)">

                            <label for="image" class="btn-choose-file">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                </svg>
                                Choose File
                            </label>

                            <div id="file-name" class="file-name-display w-full">
                                No file selected
                            </div>

                            <button type="submit" class="btn-upload">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 8.25H7.5a2.25 2.25 0 00-2.25 2.25v9a2.25 2.25 0 002.25 2.25h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25H15m0-3l-3-3m0 0l-3 3m3-3V15" />
                                </svg>
                                Upload Now
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateFileName(input) {
            const fileNameDisplay = document.getElementById('file-name');
            if (input.files && input.files[0]) {
                fileNameDisplay.innerText = input.files[0].name;
                fileNameDisplay.classList.add('has-file');
            } else {
                fileNameDisplay.innerText = 'No file selected';
                fileNameDisplay.classList.remove('has-file');
            }
        }
    </script>
</x-app-layout>