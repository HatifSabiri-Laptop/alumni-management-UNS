

<form action="{{ url('/upload') }}" method="POST" enctype="multipart/form-data" class="mt-10 flex flex-col items-center space-y-4">
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
        class="px-6 py-3 rounded-xl bg-gradient-to-r from-purple-500 to-indigo-600 
               text-white font-semibold cursor-pointer shadow-lg hover:shadow-xl 
               hover:scale-105 transition-all duration-200">
        📁 Choose File
    </label>

    <!-- File name preview -->
    <p id="file-name" class="text-sm text-gray-500">No file selected</p>

    <!-- Upload button -->
    <button type="submit"
        class="px-8 py-3 rounded-xl bg-gradient-to-r from-emerald-500 to-teal-600 
               text-white font-bold shadow-lg hover:shadow-xl 
               hover:scale-105 transition-all duration-200">
        ⬆ Upload Now
    </button>
</form>