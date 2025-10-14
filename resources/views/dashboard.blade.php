<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight text-center">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="min-h-screen bg-gradient-to-br from-blue-100 via-indigo-100 to-purple-100 flex items-center justify-center py-12">
        <div class="max-w-3xl w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white bg-opacity-90 backdrop-blur-md overflow-hidden shadow-2xl rounded-2xl transition transform hover:scale-[1.01] duration-300">
                <div class="p-12 text-center">
                    <h1 class="text-4xl font-bold text-indigo-700 mb-4 animate-pulse">
                        🎓 Selamat Datang!
                    </h1>
                    <p class="text-lg text-gray-700 mb-8">
                        Selamat datang di <span class="font-semibold text-indigo-600">Alumni Mahasiswa UNS</span> Dashboard.<br>
                        Terima kasih telah menjadi bagian dari perjalanan akademik kami.
                    </p>

                    <div class="mt-6">
                        <a href="{{ route('alumni.index') }}"
                           class="inline-block px-6 py-3 bg-indigo-600 text-white font-semibold rounded-xl shadow hover:bg-indigo-700 transition-all duration-300">
                            Lihat Data Alumni
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
