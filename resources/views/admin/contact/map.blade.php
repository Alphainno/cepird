@extends('admin.layouts.app')

@section('title', 'Contact Map Section - Admin Dashboard')

@section('content')
<div class="p-6">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-slate-800">Contact Map Section</h1>
        <p class="text-slate-600 mt-2">Manage the map section on the contact page</p>
    </div>

    <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-6">
        <form action="{{ route('admin.contact-map.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-6">
                <!-- Section Badge -->
                <div>
                    <label for="section_badge" class="block text-sm font-semibold text-slate-700 mb-2">
                        Section Badge *
                    </label>
                    <input type="text"
                           id="section_badge"
                           name="section_badge"
                           value="{{ old('section_badge', $mapSection->section_badge ?? 'Our Location') }}"
                           required
                           class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                           placeholder="Our Location">
                    @error('section_badge')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Section Title -->
                <div>
                    <label for="section_title" class="block text-sm font-semibold text-slate-700 mb-2">
                        Section Title *
                    </label>
                    <input type="text"
                           id="section_title"
                           name="section_title"
                           value="{{ old('section_title', $mapSection->section_title ?? 'Find Us Here') }}"
                           required
                           class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                           placeholder="Find Us Here">
                    @error('section_title')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Section Description -->
                <div>
                    <label for="section_description" class="block text-sm font-semibold text-slate-700 mb-2">
                        Section Description
                    </label>
                    <textarea id="section_description"
                              name="section_description"
                              rows="3"
                              class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                              placeholder="Visit our office in Dhaka to meet our team and discuss opportunities in person.">{{ old('section_description', $mapSection->section_description ?? '') }}</textarea>
                    @error('section_description')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Map Embed URL -->
                <div>
                    <label for="map_embed_url" class="block text-sm font-semibold text-slate-700 mb-2">
                        Google Maps Embed URL *
                    </label>
                    <textarea id="map_embed_url"
                              name="map_embed_url"
                              rows="4"
                              required
                              class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 font-mono text-sm"
                              placeholder="https://www.google.com/maps/embed?pb=...">{{ old('map_embed_url', $mapSection->map_embed_url ?? '') }}</textarea>
                    <p class="text-slate-500 text-sm mt-1">
                        Go to Google Maps → Share → Embed a map → Copy HTML → Paste the src URL here
                    </p>
                    @error('map_embed_url')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Map Preview -->
                @if($mapSection && $mapSection->map_embed_url)
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Current Map Preview
                    </label>
                    <div class="bg-slate-100 rounded-lg overflow-hidden shadow-sm">
                        <iframe
                            src="{{ $mapSection->map_embed_url }}"
                            width="100%"
                            height="350"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                            class="w-full">
                        </iframe>
                    </div>
                </div>
                @endif

                <!-- Active Status -->
                <div class="flex items-center">
                    <input type="checkbox"
                           id="is_active"
                           name="is_active"
                           value="1"
                           {{ old('is_active', $mapSection->is_active ?? true) ? 'checked' : '' }}
                           class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                    <label for="is_active" class="ml-2 text-sm font-medium text-slate-700">
                        Active (Show this section on the contact page)
                    </label>
                </div>

                <!-- Submit Button -->
                <div class="flex items-center gap-4 pt-4 border-t border-slate-200">
                    <button type="submit"
                            class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">
                        Save Changes
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
