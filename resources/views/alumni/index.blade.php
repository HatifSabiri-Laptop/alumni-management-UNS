<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl md:text-2xl text-gray-800 leading-tight text-center">
            {{ __('Alumni List') }}
        </h2>
    </x-slot>
    
    <style>
        .dashboard-bg {
            background: linear-gradient(135deg, #e0f2fe 0%, #bae6fd 25%, #7dd3fc 50%, #38bdf8 75%, #0ea5e9 100%);
        }

        /* Add Alumni Button - Responsive */
        .add-alumni-btn {
            background: linear-gradient(135deg, #0ea5e9, #2563eb);
            color: white;
            padding: 12px 24px;
            border-radius: 16px;
            font-weight: 800;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            transition: all 0.25s ease-in-out;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .add-alumni-btn:hover {
            transform: scale(1.08);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.25);
        }

        /* Desktop Table View */
        .table-view {
            display: block;
        }

        /* Mobile Card View */
        .card-view {
            display: none;
        }

        /* Action Buttons */
        .edit-btn {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            transition: all 0.2s;
        }

        .edit-btn:hover {
            background: linear-gradient(135deg, #059669, #047857);
        }

        .delete-btn {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
            transition: all 0.2s;
        }

        .delete-btn:hover {
            background: linear-gradient(135deg, #dc2626, #b91c1c);
        }

        /* Mobile Responsive - Below 1024px */
        @media (max-width: 1024px) {
            .table-view {
                display: none;
            }

            .card-view {
                display: block;
            }
        }

        /* Alumni Card Styling */
        .alumni-card {
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .alumni-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.15);
        }

        .card-field {
            display: flex;
            margin-bottom: 0.75rem;
            font-size: 0.9rem;
        }

        .card-label {
            font-weight: 700;
            color: #1e40af;
            min-width: 140px;
        }

        .card-value {
            color: #374151;
            flex: 1;
        }

        .card-actions {
            display: flex;
            gap: 0.5rem;
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 2px solid #e5e7eb;
        }

        /* Mobile specific adjustments */
        @media (max-width: 640px) {
            .add-alumni-btn {
                width: 100%;
                justify-content: center;
                margin-bottom: 1rem;
            }

            .card-field {
                flex-direction: column;
                gap: 0.25rem;
            }

            .card-label {
                min-width: auto;
            }

            .card-actions {
                flex-direction: column;
            }

            .card-actions a,
            .card-actions button {
                width: 100%;
                justify-content: center;
            }
        }
    </style>

    <div class="min-h-screen dashboard-bg flex flex-col py-6">
        <div class="flex-grow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <!-- Add Alumni Button -->
                <div class="mb-5">
                    <a href="{{ route('alumni.create') }}" class="add-alumni-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                        <span>Add Alumni</span>
                    </a>
                </div>

                <!-- DESKTOP TABLE VIEW -->
                <div class="table-view bg-white bg-opacity-95 backdrop-blur-md overflow-hidden shadow-2xl rounded-2xl">
                    <div class="p-6 text-gray-900 overflow-x-auto">
                        <table class="table-auto w-full border border-gray-200">
                            <thead class="bg-gradient-to-r from-blue-50 to-cyan-50">
                                <tr>
                                    <th class="px-4 py-3 border text-left font-bold text-blue-900 whitespace-nowrap">Full Name</th>
                                    <th class="px-4 py-3 border text-left font-bold text-blue-900 whitespace-nowrap">Email</th>
                                    <th class="px-4 py-3 border text-left font-bold text-blue-900 whitespace-nowrap">Graduation</th>
                                    <th class="px-4 py-3 border text-left font-bold text-blue-900 whitespace-nowrap">Program</th>
                                    <th class="px-4 py-3 border text-left font-bold text-blue-900 whitespace-nowrap">Job</th>
                                    <th class="px-4 py-3 border text-left font-bold text-blue-900 whitespace-nowrap">Company</th>
                                    <th class="px-4 py-3 border text-center font-bold text-blue-900 whitespace-nowrap">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alumni as $a)
                                <tr class="hover:bg-blue-50 transition-colors duration-150">
                                    <td class="px-4 py-2 border whitespace-nowrap">{{ $a->full_name }}</td>
                                    <td class="px-4 py-2 border">{{ $a->user->email }}</td>
                                    <td class="px-4 py-2 border whitespace-nowrap">{{ $a->graduation_year }}</td>
                                    <td class="px-4 py-2 border">{{ $a->program }}</td>
                                    <td class="px-4 py-2 border">{{ $a->job }}</td>
                                    <td class="px-4 py-2 border">{{ $a->company }}</td>
                                    <td class="px-4 py-2 border text-center">
                                        <div class="flex justify-center gap-2 flex-wrap">
                                            <a href="{{ route('alumni.edit', $a->id) }}"
                                                class="inline-flex items-center gap-1 px-4 py-2 text-xs font-bold edit-btn rounded-lg shadow-lg hover:scale-110 transition-all duration-300">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-4 h-4">
                                                    <path d="M16.862 3.487a2.1 2.1 0 0 1 2.97 2.97L8.88 17.32a4.2 4.2 0 0 1-1.662.999l-3.02.755a.7.7 0 0 1-.85-.85l.755-3.02a4.2 4.2 0 0 1 .999-1.662L16.862 3.487z" />
                                                </svg>
                                                Edit
                                            </a>
                                            <form action="{{ route('alumni.destroy', $a->id) }}" method="POST" class="inline"
                                                onsubmit="return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="inline-flex items-center gap-1 px-4 py-2 text-xs font-bold delete-btn rounded-lg shadow-lg hover:scale-110 transition-all duration-300">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-4 h-4">
                                                        <path d="M9 3h6a1 1 0 0 1 1 1v1h4v2H4V5h4V4a1 1 0 0 1 1-1Zm1 6h2v9h-2V9Zm4 0h2v9h-2V9ZM6 9h2v9H6V9Z" />
                                                    </svg>
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        @if($alumni->isEmpty())
                        <p class="text-center text-gray-500 mt-4">No alumni records found.</p>
                        @endif
                    </div>
                </div>

                <!-- MOBILE CARD VIEW -->
                <div class="card-view">
                    @forelse ($alumni as $a)
                    <div class="alumni-card">
                        <div class="card-field">
                            <span class="card-label">Full Name:</span>
                            <span class="card-value">{{ $a->full_name }}</span>
                        </div>
                        <div class="card-field">
                            <span class="card-label">Email:</span>
                            <span class="card-value">{{ $a->user->email }}</span>
                        </div>
                        <div class="card-field">
                            <span class="card-label">Graduation:</span>
                            <span class="card-value">{{ $a->graduation_year }}</span>
                        </div>
                        <div class="card-field">
                            <span class="card-label">Program:</span>
                            <span class="card-value">{{ $a->program }}</span>
                        </div>
                        <div class="card-field">
                            <span class="card-label">Job:</span>
                            <span class="card-value">{{ $a->job ?: '—' }}</span>
                        </div>
                        <div class="card-field">
                            <span class="card-label">Company:</span>
                            <span class="card-value">{{ $a->company ?: '—' }}</span>
                        </div>

                        <div class="card-actions">
                            <a href="{{ route('alumni.edit', $a->id) }}"
                                class="inline-flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-bold edit-btn rounded-lg shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-4 h-4">
                                    <path d="M16.862 3.487a2.1 2.1 0 0 1 2.97 2.97L8.88 17.32a4.2 4.2 0 0 1-1.662.999l-3.02.755a.7.7 0 0 1-.85-.85l.755-3.02a4.2 4.2 0 0 1 .999-1.662L16.862 3.487z" />
                                </svg>
                                Edit Alumni
                            </a>
                            <form action="{{ route('alumni.destroy', $a->id) }}" method="POST" class="flex-1"
                                onsubmit="return confirm('Delete this alumni record?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-bold delete-btn rounded-lg shadow-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-4 h-4">
                                        <path d="M9 3h6a1 1 0 0 1 1 1v1h4v2H4V5h4V4a1 1 0 0 1 1-1Zm1 6h2v9h-2V9Zm4 0h2v9h-2V9ZM6 9h2v9H6V9Z" />
                                    </svg>
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                    @empty
                    <div class="bg-white rounded-2xl p-8 text-center shadow-lg">
                        <p class="text-gray-500 text-lg">No alumni records found.</p>
                    </div>
                    @endforelse
                </div>

            </div>
        </div>
    </div>
</x-app-layout>