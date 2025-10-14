<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Alumni List') }}
        </h2>
    </x-slot>

    <!-- Added full-page background container -->
    <div class="min-h-screen bg-blue-100 flex flex-col">
        <div class="py-6 flex-grow">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <a href="{{ route('alumni.create') }}" class="btn btn-primary mb-3">Add Alumni</a>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <table class="table-auto w-full border">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 border">Full Name</th>
                                    <th class="px-4 py-2 border">Graduation Year</th>
                                    <th class="px-4 py-2 border">Program</th>
                                    <th class="px-4 py-2 border">Job</th>
                                    <th class="px-4 py-2 border">Company</th>
                                    <th class="px-4 py-2 border">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alumni as $a)
                                <tr>
                                    <td class="px-4 py-2 border">{{ $a->full_name }}</td>
                                    <td class="px-4 py-2 border">{{ $a->graduation_year }}</td>
                                    <td class="px-4 py-2 border">{{ $a->program }}</td>
                                    <td class="px-4 py-2 border">{{ $a->job }}</td>
                                    <td class="px-4 py-2 border">{{ $a->company }}</td>
                                    <td class="px-4 py-2 border">
                                        <a href="{{ route('alumni.edit', $a->id) }}" class="text-blue-600">Edit</a>
                                        <form action="{{ route('alumni.destroy', $a->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
