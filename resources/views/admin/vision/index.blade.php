@extends('admin.layouts.app')

@section('title', 'Vision & Mission Management')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Vision & Mission Management</h1>
            <p class="text-slate-600 mt-1">Manage the vision and mission content on the landing page</p>
        </div>
    </div>

    <!-- Vision & Mission Form -->
    <div class="bg-white rounded-sm shadow-sm border border-slate-200">
        <div class="p-6 border-b border-slate-200">
            <h2 class="text-lg font-semibold text-slate-900">Edit Vision & Mission Section</h2>
            <p class="text-sm text-slate-600 mt-1">Update the vision and mission content displayed on your landing page</p>
        </div>

        <form action="{{ route('admin.vision.store') }}" method="POST" class="p-6 space-y-6" id="visionForm">
            @csrf

            <!-- Vision Section -->
            <div class="space-y-6">
                <h3 class="text-lg font-semibold text-slate-900">Vision Section</h3>

                <!-- Vision Title -->
                <div>
                    <label for="vision_title" class="block text-sm font-medium text-slate-700 mb-2">Vision Title <span class="text-red-500">*</span></label>
                    <input type="text" name="vision_title" id="vision_title"
                        value="{{ old('vision_title', $visionSection->vision_title ?? 'Our Vision') }}"
                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="e.g., Our Vision" required>
                    @error('vision_title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Vision Heading -->
                <div>
                    <label for="vision_heading" class="block text-sm font-medium text-slate-700 mb-2">Vision Heading <span class="text-red-500">*</span></label>
                    <input type="text" name="vision_heading" id="vision_heading"
                        value="{{ old('vision_heading', $visionSection->vision_heading) }}"
                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="e.g., A Bangladesh where innovation is accessible to every dreamer." required>
                    @error('vision_heading')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Vision Description -->
                <div>
                    <label for="vision_description" class="block text-sm font-medium text-slate-700 mb-2">Vision Description <span class="text-red-500">*</span></label>
                    <textarea name="vision_description" id="vision_description" rows="4"
                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter the vision description..." required>{{ old('vision_description', $visionSection->vision_description) }}</textarea>
                    @error('vision_description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Mission Section -->
            <div class="space-y-6">
                <h3 class="text-lg font-semibold text-slate-900">Mission Section</h3>

                <!-- Mission Title -->
                <div>
                    <label for="mission_title" class="block text-sm font-medium text-slate-700 mb-2">Mission Title <span class="text-red-500">*</span></label>
                    <input type="text" name="mission_title" id="mission_title"
                        value="{{ old('mission_title', $visionSection->mission_title ?? 'Mission Mandate') }}"
                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="e.g., Mission Mandate" required>
                    @error('mission_title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Mission Points -->
                <div class="space-y-6">
                    <div class="flex items-center justify-between">
                        <h4 class="text-md font-medium text-slate-800">Mission Points</h4>
                    </div>

                    <div id="missionPointsContainer" class="space-y-4">
                        @if($visionSection->allMissionPoints->count() > 0)
                            @foreach($visionSection->allMissionPoints as $index => $missionPoint)
                                <div class="mission-point-item bg-slate-50 p-4 rounded-sm border border-slate-200" data-mission-point-id="{{ $missionPoint->id }}">
                                    <div class="flex items-center justify-between mb-3">
                                        <h5 class="text-sm font-medium text-slate-800">Mission Point {{ $index + 1 }}</h5>
                                        <div class="flex items-center space-x-2">
                                            <label class="flex items-center">
                                                <input type="checkbox" name="mission_points[{{ $index }}][is_active]"
                                                    {{ $missionPoint->is_active ? 'checked' : '' }}
                                                    class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                                                <span class="ml-2 text-sm text-slate-600">Active</span>
                                            </label>
                                            <button type="button" class="removeMissionPointBtn text-red-600 hover:text-red-800 p-1">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                    <input type="hidden" name="mission_points[{{ $index }}][id]" value="{{ $missionPoint->id }}">

                                    <div>
                                        <label class="block text-sm font-medium text-slate-700 mb-2">Mission Point <span class="text-red-500">*</span></label>
                                        <textarea name="mission_points[{{ $index }}][point]" rows="2"
                                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="Enter mission point..." required>{{ old('mission_points.' . $index . '.point', $missionPoint->point) }}</textarea>
                                        @error('mission_points.' . $index . '.point')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <!-- Default mission point template -->
                            <div class="mission-point-item bg-slate-50 p-4 rounded-sm border border-slate-200">
                                <div class="flex items-center justify-between mb-3">
                                    <h5 class="text-sm font-medium text-slate-800">Mission Point 1</h5>
                                    <div class="flex items-center space-x-2">
                                        <label class="flex items-center">
                                            <input type="checkbox" name="mission_points[0][is_active]" checked
                                                class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                                            <span class="ml-2 text-sm text-slate-600">Active</span>
                                        </label>
                                        <button type="button" class="removeMissionPointBtn text-red-600 hover:text-red-800 p-1" style="display: none;">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-2">Mission Point <span class="text-red-500">*</span></label>
                                    <textarea name="mission_points[0][point]" rows="2"
                                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Enter mission point..." required>Conduct world-class research on digital economy trends.</textarea>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Add Mission Point Button -->
                    <div class="flex justify-center pt-4">
                        <button type="button" id="addMissionPointBtn"
                            class="px-6 py-3 bg-blue-600 text-white text-sm font-medium rounded-sm hover:bg-blue-700 transition-colors">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Add Mission Point
                        </button>
                    </div>
                </div>
            </div>

            <!-- Is Active -->
            <div class="flex items-center">
                <input type="checkbox" name="is_active" id="is_active"
                    {{ old('is_active', $visionSection->is_active ?? true) ? 'checked' : '' }}
                    class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                <label for="is_active" class="ml-2 text-sm font-medium text-slate-700">Active (Display on website)</label>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end pt-4 border-t border-slate-200">
                <button type="submit"
                    class="px-6 py-3 bg-blue-900 text-white font-semibold rounded-sm hover:bg-blue-800 transition-colors">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let missionPointIndex = {{ $visionSection->allMissionPoints->count() ?: 1 }};

    // Add new mission point
    document.getElementById('addMissionPointBtn').addEventListener('click', function() {
        addNewMissionPoint();
    });

    // Remove mission point
    document.addEventListener('click', function(e) {
        if (e.target.closest('.removeMissionPointBtn')) {
            e.target.closest('.mission-point-item').remove();
            updateMissionPointNumbers();
        }
    });

    function addNewMissionPoint() {
        const container = document.getElementById('missionPointsContainer');
        const missionPointCount = container.querySelectorAll('.mission-point-item').length;

        const missionPointHtml = `
            <div class="mission-point-item bg-slate-50 p-4 rounded-sm border border-slate-200">
                <div class="flex items-center justify-between mb-3">
                    <h5 class="text-sm font-medium text-slate-800">Mission Point ${missionPointCount + 1}</h5>
                    <div class="flex items-center space-x-2">
                        <label class="flex items-center">
                            <input type="checkbox" name="mission_points[${missionPointIndex}][is_active]" checked
                                class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                            <span class="ml-2 text-sm text-slate-600">Active</span>
                        </label>
                        <button type="button" class="removeMissionPointBtn text-red-600 hover:text-red-800 p-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Mission Point <span class="text-red-500">*</span></label>
                    <textarea name="mission_points[${missionPointIndex}][point]" rows="2"
                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter mission point..." required></textarea>
                </div>
            </div>
        `;

        // Insert before the "Add Mission Point" button
        const addButton = document.getElementById('addMissionPointBtn').parentElement;
        addButton.insertAdjacentHTML('beforebegin', missionPointHtml);
        missionPointIndex++;
        updateMissionPointNumbers();
    }

    function updateMissionPointNumbers() {
        const missionPoints = document.querySelectorAll('.mission-point-item');
        missionPoints.forEach((missionPoint, index) => {
            const title = missionPoint.querySelector('h5');
            title.textContent = `Mission Point ${index + 1}`;

            // Show remove button only if there are more than 1 mission points
            const removeBtn = missionPoint.querySelector('.removeMissionPointBtn');
            if (missionPoints.length > 1) {
                removeBtn.style.display = 'block';
            } else {
                removeBtn.style.display = 'none';
            }
        });
    }

    // Initialize mission point numbers on page load
    updateMissionPointNumbers();
});
</script>
@endsection
