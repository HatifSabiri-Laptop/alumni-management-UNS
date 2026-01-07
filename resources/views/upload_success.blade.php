<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upload Success') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center">
                    <div class="mb-6">
                        <span class="text-5xl">✅</span>
                        <h3 class="text-2xl font-bold mt-4">Image Uploaded Successfully!</h3>
                    </div>

                    <div class="flex justify-center mb-8">
                        <div class="relative group">
                            <img src="{{ $url }}" alt="Uploaded Image" 
                                class="max-w-full h-auto rounded-2xl shadow-2xl border-4 border-white transform transition-transform duration-300 group-hover:scale-[1.02]">
                            <div class="mt-4 break-all text-sm text-gray-500">
                                {{ $url }}
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-center space-x-4">
                        <a href="{{ url('/upload') }}" 
                           class="px-6 py-2 bg-indigo-600 text-white rounded-lg font-semibold hover:bg-indigo-700 transition-colors">
                            Upload Another
                        </a>
                        <a href="{{ route('dashboard') }}" 
                           class="px-6 py-2 bg-gray-200 text-gray-800 rounded-lg font-semibold hover:bg-gray-300 transition-colors">
                            Go to Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
