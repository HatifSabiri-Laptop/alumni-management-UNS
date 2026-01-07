<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upload Image to Cloudinary') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10">
                <form action="{{ url('/upload') }}" method="POST" enctype="multipart/form-data" class="flex flex-col items-center space-y-6">
                    @csrf

                    <!-- Hidden file input -->
                    <input
                        type="file"
                        id="image"
                        name="image"
                        class="hidden"
                        required
                        onchange="document.getElementById('file-name').innerText = this.files[0].name">

                    <!-- Custom Choose File button -->
                    <label for="image"
                        class="px-8 py-4 rounded-2xl bg-gradient-to-r from-purple-500 to-indigo-600 
                               text-white font-bold cursor-pointer shadow-xl hover:shadow-2xl 
                               hover:scale-105 transition-all duration-200 text-lg">
                        📁 Choose an Image
                    </label>

                    <!-- File name preview -->
                    <p id="file-name" class="text-font-medium text-gray-600 italic">No file selected yet</p>

                    <!-- Upload button -->
                    <button type="submit"
                        class="px-10 py-4 rounded-2xl bg-gradient-to-r from-emerald-500 to-teal-600 
                               text-white font-black shadow-xl hover:shadow-2xl 
                               hover:scale-105 transition-all duration-200 uppercase tracking-wider">
                        🚀 Send to the Cloud
                    </button>
                </form>

                <div class="mt-8 text-center text-gray-400 text-sm">
                    Images are stored securely on Cloudinary
                </div>
            </div>
        </div>
    </div>
</x-app-layout>