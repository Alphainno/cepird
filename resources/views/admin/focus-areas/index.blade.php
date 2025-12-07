@extends('admin.layouts.app')

@section('title', 'Focus Areas Management')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Focus Areas Management</h1>
            <p class="text-slate-600 mt-1">Manage the focus areas content on the landing page</p>
        </div>
    </div>



            <!-- Focus Areas -->
            <div class="space-y-6 px-6 pb-6">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-slate-900">Focus Areas</h3>
                </div>

                <div id="focusAreasContainer" class="space-y-4">
                    @if($focusAreaSection->allFocusAreas->count() > 0)
                        @foreach($focusAreaSection->allFocusAreas as $index => $focusArea)
                            <form action="{{ route('admin.focus-areas.update-focus-area', $focusArea) }}" method="POST" class="focus-area-form">
                                @csrf
                                @method('PUT')
                                <div class="focus-area-item bg-slate-50 p-4 rounded-sm border border-slate-200" data-focus-area-id="{{ $focusArea->id }}">
                                    <div class="flex items-center justify-between mb-3">
                                        <h4 class="text-md font-medium text-slate-800">Focus Area {{ $index + 1 }}</h4>
                                        <div class="flex items-center space-x-2">
                                            <label class="flex items-center">
                                                <input type="checkbox" name="is_active"
                                                    {{ $focusArea->is_active ? 'checked' : '' }}
                                                    class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                                                <span class="ml-2 text-sm text-slate-600">Active</span>
                                            </label>
                                            <button type="button" class="removeFocusAreaBtn text-red-600 hover:text-red-800 p-1">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                <div class="grid md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-slate-700 mb-2">Title <span class="text-red-500">*</span></label>
                                        <input type="text" name="title"
                                            value="{{ old('title', $focusArea->title) }}"
                                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="e.g., Policy Development" required>
                                        @error('title')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-slate-700 mb-2">Icon</label>
                                        <input type="text" name="icon"
                                            value="{{ old('icon', $focusArea->icon) }}"
                                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="e.g., 📋">
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <label class="block text-sm font-medium text-slate-700 mb-2">Description <span class="text-red-500">*</span></label>
                                    <textarea name="description" rows="3"
                                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Enter focus area description..." required>{{ old('description', $focusArea->description) }}</textarea>
                                    @error('description')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="grid md:grid-cols-2 gap-4 mt-4">
                                    <div>
                                        <label class="block text-sm font-medium text-slate-700 mb-2">Subheading</label>
                                        <input type="text" name="subheading"
                                            value="{{ old('subheading', $focusArea->subheading) }}"
                                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="e.g., Focus Area {{ $index + 1 }}">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-slate-700 mb-2">Slug / Anchor</label>
                                        <input type="text" name="slug"
                                            value="{{ old('slug', $focusArea->slug) }}"
                                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="e.g., policy-development">
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <label class="block text-sm font-medium text-slate-700 mb-2">Detail Description</label>
                                    <textarea name="detail_description" rows="4"
                                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Long description for the detailed section">{{ old('detail_description', $focusArea->detail_description) }}</textarea>
                                </div>

                                <div class="grid md:grid-cols-3 gap-4 mt-4">
                                    <div>
                                        <label class="block text-sm font-medium text-slate-700 mb-2">CTA Text</label>
                                        <input type="text" name="cta_text"
                                            value="{{ old('cta_text', $focusArea->cta_text) }}"
                                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="e.g., Explore Policy Research">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-slate-700 mb-2">CTA Link</label>
                                        <input type="text" name="cta_link"
                                            value="{{ old('cta_link', $focusArea->cta_link) }}"
                                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="#policy-development">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-slate-700 mb-2">Image Path / URL</label>
                                        <input type="text" name="image_path"
                                            value="{{ old('image_path', $focusArea->image_path) }}"
                                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="storage/uploads/policy.jpg or https://...">
                                    </div>
                                </div>

                                <div class="mt-6 border-t border-slate-200 pt-4">
                                    <h5 class="text-sm font-semibold text-slate-800 mb-3">Highlights</h5>
                                    <div class="grid md:grid-cols-3 gap-4">
                                        <div class="space-y-2">
                                            <input type="text" name="highlight1_icon"
                                                value="{{ old('highlight1_icon', $focusArea->highlight1_icon) }}"
                                                class="w-full px-3 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                placeholder="Icon e.g., 📈">
                                            <input type="text" name="highlight1_title"
                                                value="{{ old('highlight1_title', $focusArea->highlight1_title) }}"
                                                class="w-full px-3 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                placeholder="Highlight title">
                                            <textarea name="highlight1_description" rows="2"
                                                class="w-full px-3 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                placeholder="Highlight description">{{ old('highlight1_description', $focusArea->highlight1_description) }}</textarea>
                                        </div>
                                        <div class="space-y-2">
                                            <input type="text" name="highlight2_icon"
                                                value="{{ old('highlight2_icon', $focusArea->highlight2_icon) }}"
                                                class="w-full px-3 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                placeholder="Icon e.g., 🤝">
                                            <input type="text" name="highlight2_title"
                                                value="{{ old('highlight2_title', $focusArea->highlight2_title) }}"
                                                class="w-full px-3 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                placeholder="Highlight title">
                                            <textarea name="highlight2_description" rows="2"
                                                class="w-full px-3 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                placeholder="Highlight description">{{ old('highlight2_description', $focusArea->highlight2_description) }}</textarea>
                                        </div>

                                        <div class="space-y-2">
                                            <input type="text" name="highlight3_icon"
                                                value="{{ old('highlight3_icon', $focusArea->highlight3_icon) }}"
                                                class="w-full px-3 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                placeholder="Icon e.g., 🌱">
                                            <input type="text" name="highlight3_title"
                                                value="{{ old('highlight3_title', $focusArea->highlight3_title) }}"
                                                class="w-full px-3 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                placeholder="Highlight title">
                                            <textarea name="highlight3_description" rows="2"
                                                class="w-full px-3 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                placeholder="Highlight description">{{ old('highlight3_description', $focusArea->highlight3_description) }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex justify-end mt-6">
                                    <button type="submit"
                                        class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-sm hover:bg-blue-700 transition-colors">
                                        Update Focus Area
                                    </button>
                                </div>
                                </div>
                            </form>
                        @endforeach
                    @else
                        <!-- Default focus area template -->
                        <div class="focus-area-item bg-slate-50 p-4 rounded-sm border border-slate-200">
                            <div class="flex items-center justify-between mb-3">
                                <h4 class="text-md font-medium text-slate-800">Focus Area 1</h4>
                                <div class="flex items-center space-x-2">
                                    <label class="flex items-center">
                                        <input type="checkbox" name="focus_areas[0][is_active]" checked
                                            class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                                        <span class="ml-2 text-sm text-slate-600">Active</span>
                                    </label>
                                    <button type="button" class="removeFocusAreaBtn text-red-600 hover:text-red-800 p-1" style="display: none;">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-2">Title <span class="text-red-500">*</span></label>
                                    <input type="text" name="focus_areas[0][title]" value="Policy Development"
                                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="e.g., Policy Development" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-2">Icon</label>
                                    <input type="text" name="focus_areas[0][icon]" value="📋"
                                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="e.g., 📋">
                                </div>
                            </div>
                            <div class="mt-4">
                                <label class="block text-sm font-medium text-slate-700 mb-2">Description <span class="text-red-500">*</span></label>
                                <textarea name="focus_areas[0][description]" rows="3"
                                    class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Enter focus area description..." required>Evidence-based frameworks strengthening entrepreneurship and digital transformation.</textarea>
                            </div>

                            <div class="grid md:grid-cols-2 gap-4 mt-4">
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-2">Subheading</label>
                                    <input type="text" name="focus_areas[0][subheading]" value="Focus Area 1"
                                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="e.g., Focus Area 1">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-2">Slug / Anchor</label>
                                    <input type="text" name="focus_areas[0][slug]" value="policy-development"
                                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="e.g., policy-development">
                                </div>
                            </div>

                            <div class="mt-4">
                                <label class="block text-sm font-medium text-slate-700 mb-2">Detail Description</label>
                                <textarea name="focus_areas[0][detail_description]" rows="4"
                                    class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Long description for the detailed section">CEPIRD designs evidence-based policy frameworks that strengthen entrepreneurship ecosystems, accelerate digital transformation, and foster sustainable economic growth in Bangladesh.</textarea>
                            </div>

                            <div class="grid md:grid-cols-3 gap-4 mt-4">
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-2">CTA Text</label>
                                    <input type="text" name="focus_areas[0][cta_text]" value="Explore Policy Research"
                                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="e.g., Explore Policy Research">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-2">CTA Link</label>
                                    <input type="text" name="focus_areas[0][cta_link]" value="#policy-development"
                                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="#policy-development">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-2">Image Path / URL</label>
                                    <input type="text" name="focus_areas[0][image_path]" value="https://images.unsplash.com/photo-1552664730-d307ca884978?w=600&auto=format&fit=crop&q=80"
                                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="storage/uploads/policy.jpg or https://...">
                                </div>
                            </div>

                            <div class="mt-6 border-t border-slate-200 pt-4">
                                <h5 class="text-sm font-semibold text-slate-800 mb-3">Highlights</h5>
                                <div class="grid md:grid-cols-3 gap-4">
                                    <div class="space-y-2">
                                        <input type="text" name="focus_areas[0][highlight1_icon]" value="📈"
                                            class="w-full px-3 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="Icon e.g., 📈">
                                        <input type="text" name="focus_areas[0][highlight1_title]" value="Digital Commerce Framework"
                                            class="w-full px-3 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="Highlight title">
                                        <textarea name="focus_areas[0][highlight1_description]" rows="2"
                                            class="w-full px-3 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="Highlight description">Policies supporting e-commerce growth and digital payment systems</textarea>
                                    </div>
                                    <div class="space-y-2">
                                        <input type="text" name="focus_areas[0][highlight2_icon]" value="🤝"
                                            class="w-full px-3 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="Icon e.g., 🤝">
                                        <input type="text" name="focus_areas[0][highlight2_title]" value="SME Empowerment Policies"
                                            class="w-full px-3 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="Highlight title">
                                        <textarea name="focus_areas[0][highlight2_description]" rows="2"
                                            class="w-full px-3 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="Highlight description">Frameworks ensuring small and medium enterprises can thrive and scale</textarea>
                                    </div>
                                    <div class="space-y-2">
                                        <input type="text" name="focus_areas[0][highlight3_icon]" value="🌱"
                                            class="w-full px-3 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="Icon e.g., 🌱">
                                        <input type="text" name="focus_areas[0][highlight3_title]" value="Startup Ecosystem Support"
                                            class="w-full px-3 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="Highlight title">
                                        <textarea name="focus_areas[0][highlight3_description]" rows="2"
                                            class="w-full px-3 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="Highlight description">Policy interventions creating favorable conditions for startup growth</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Add Focus Area Button -->
                <div class="flex justify-center pt-4">
                    <button type="button" id="addFocusAreaBtn"
                        class="px-6 py-3 bg-blue-600 text-white text-sm font-medium rounded-sm hover:bg-blue-700 transition-colors">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Add Focus Area
                    </button>
                </div>
            </div>

            <!-- Is Active -->
            <div class="flex items-center">
                <input type="checkbox" name="is_active" id="is_active"
                    {{ old('is_active', $focusAreaSection->is_active ?? true) ? 'checked' : '' }}
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
    let focusAreaIndex = {{ $focusAreaSection->allFocusAreas->count() ?: 1 }};

    // Add new focus area
    document.getElementById('addFocusAreaBtn').addEventListener('click', function() {
        addNewFocusArea();
    });

    // Remove focus area
    document.addEventListener('click', function(e) {
        if (e.target.closest('.removeFocusAreaBtn')) {
            e.target.closest('.focus-area-item').remove();
            updateFocusAreaNumbers();
        }
    });

    function addNewFocusArea() {
        const container = document.getElementById('focusAreasContainer');
        const focusAreaCount = container.querySelectorAll('.focus-area-item').length;

        const focusAreaHtml = `
            <div class="focus-area-item bg-slate-50 p-4 rounded-sm border border-slate-200">
                <div class="flex items-center justify-between mb-3">
                    <h4 class="text-md font-medium text-slate-800">Focus Area ${focusAreaCount + 1}</h4>
                    <div class="flex items-center space-x-2">
                        <label class="flex items-center">
                            <input type="checkbox" name="focus_areas[${focusAreaIndex}][is_active]" checked
                                class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                            <span class="ml-2 text-sm text-slate-600">Active</span>
                        </label>
                        <button type="button" class="removeFocusAreaBtn text-red-600 hover:text-red-800 p-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Title <span class="text-red-500">*</span></label>
                        <input type="text" name="focus_areas[${focusAreaIndex}][title]"
                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="e.g., Policy Development" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Icon</label>
                        <input type="text" name="focus_areas[${focusAreaIndex}][icon]" value="📋"
                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="e.g., 📋">
                    </div>
                </div>
                <div class="mt-4">
                    <label class="block text-sm font-medium text-slate-700 mb-2">Description <span class="text-red-500">*</span></label>
                    <textarea name="focus_areas[${focusAreaIndex}][description]" rows="3"
                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter focus area description..." required></textarea>
                </div>

                        <div class="grid md:grid-cols-2 gap-4 mt-4">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-2">Subheading</label>
                                <input type="text" name="focus_areas[${focusAreaIndex}][subheading]"
                                    class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="e.g., Focus Area ${focusAreaCount + 1}">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-2">Slug / Anchor</label>
                                <input type="text" name="focus_areas[${focusAreaIndex}][slug]"
                                    class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="e.g., policy-development">
                            </div>
                        </div>

                        <div class="mt-4">
                            <label class="block text-sm font-medium text-slate-700 mb-2">Detail Description</label>
                            <textarea name="focus_areas[${focusAreaIndex}][detail_description]" rows="4"
                                class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Long description for the detailed section"></textarea>
                        </div>

                        <div class="grid md:grid-cols-3 gap-4 mt-4">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-2">CTA Text</label>
                                <input type="text" name="focus_areas[${focusAreaIndex}][cta_text]"
                                    class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="e.g., Learn More">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-2">CTA Link</label>
                                <input type="text" name="focus_areas[${focusAreaIndex}][cta_link]"
                                    class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="#anchor">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-2">Image Path / URL</label>
                                <input type="text" name="focus_areas[${focusAreaIndex}][image_path]"
                                    class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="storage/uploads/image.jpg or https://...">
                            </div>
                        </div>

                        <div class="mt-6 border-t border-slate-200 pt-4">
                            <h5 class="text-sm font-semibold text-slate-800 mb-3">Highlights</h5>
                            <div class="grid md:grid-cols-3 gap-4">
                                <div class="space-y-2">
                                    <input type="text" name="focus_areas[${focusAreaIndex}][highlight1_icon]"
                                        class="w-full px-3 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Icon">
                                    <input type="text" name="focus_areas[${focusAreaIndex}][highlight1_title]"
                                        class="w-full px-3 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Highlight title">
                                    <textarea name="focus_areas[${focusAreaIndex}][highlight1_description]" rows="2"
                                        class="w-full px-3 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Highlight description"></textarea>
                                </div>
                                <div class="space-y-2">
                                    <input type="text" name="focus_areas[${focusAreaIndex}][highlight2_icon]"
                                        class="w-full px-3 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Icon">
                                    <input type="text" name="focus_areas[${focusAreaIndex}][highlight2_title]"
                                        class="w-full px-3 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Highlight title">
                                    <textarea name="focus_areas[${focusAreaIndex}][highlight2_description]" rows="2"
                                        class="w-full px-3 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Highlight description"></textarea>
                                </div>
                                <div class="space-y-2">
                                    <input type="text" name="focus_areas[${focusAreaIndex}][highlight3_icon]"
                                        class="w-full px-3 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Icon">
                                    <input type="text" name="focus_areas[${focusAreaIndex}][highlight3_title]"
                                        class="w-full px-3 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Highlight title">
                                    <textarea name="focus_areas[${focusAreaIndex}][highlight3_description]" rows="2"
                                        class="w-full px-3 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Highlight description"></textarea>
                                </div>
                            </div>
                        </div>
            </div>
        `;

        container.insertAdjacentHTML('beforeend', focusAreaHtml);
        focusAreaIndex++;
        updateFocusAreaNumbers();
    }

    function updateFocusAreaNumbers() {
        const focusAreas = document.querySelectorAll('.focus-area-item');
        focusAreas.forEach((focusArea, index) => {
            const title = focusArea.querySelector('h4');
            title.textContent = `Focus Area ${index + 1}`;

            // Show remove button only if there are more than 1 focus areas
            const removeBtn = focusArea.querySelector('.removeFocusAreaBtn');
            if (focusAreas.length > 1) {
                removeBtn.style.display = 'block';
            } else {
                removeBtn.style.display = 'none';
            }
        });
    }

    // Initialize focus area numbers on page load
    updateFocusAreaNumbers();
});
</script>
@endsection
