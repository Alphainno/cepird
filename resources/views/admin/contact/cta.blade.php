@extends('admin.layouts.app')

@section('title', 'Contact CTA Section - Admin Dashboard')

@section('content')
<div class="p-6">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-slate-800">Contact CTA Section</h1>
        <p class="text-slate-600 mt-2">Manage the call-to-action section at the bottom of the contact page</p>
    </div>

    <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-6">
        <form action="{{ route('admin.contact-cta.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-6">
                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-semibold text-slate-700 mb-2">
                        Title *
                    </label>
                    <input type="text"
                           id="title"
                           name="title"
                           value="{{ old('title', $ctaSection->title ?? "Let's Build the Future Together") }}"
                           required
                           class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                           placeholder="Let's Build the Future Together">
                    @error('title')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-semibold text-slate-700 mb-2">
                        Description
                    </label>
                    <textarea id="description"
                              name="description"
                              rows="3"
                              class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                              placeholder="Whether you're looking to collaborate, contribute, or simply learn more about our initiatives, we're excited to connect with you.">{{ old('description', $ctaSection->description ?? '') }}</textarea>
                    @error('description')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="border-t border-slate-200 pt-6">
                    <h3 class="text-lg font-semibold text-slate-800 mb-4">Button 1 (Primary)</h3>

                    <div class="grid md:grid-cols-2 gap-6">
                        <!-- Button 1 Text -->
                        <div>
                            <label for="button_1_text" class="block text-sm font-semibold text-slate-700 mb-2">
                                Button Text *
                            </label>
                            <input type="text"
                                   id="button_1_text"
                                   name="button_1_text"
                                   value="{{ old('button_1_text', $ctaSection->button_1_text ?? 'Learn About Us') }}"
                                   required
                                   class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                   placeholder="Learn About Us">
                            @error('button_1_text')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Button 1 URL -->
                        <div>
                            <label for="button_1_url" class="block text-sm font-semibold text-slate-700 mb-2">
                                Button URL *
                            </label>
                            <input type="text"
                                   id="button_1_url"
                                   name="button_1_url"
                                   value="{{ old('button_1_url', $ctaSection->button_1_url ?? '/about') }}"
                                   required
                                   class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                   placeholder="/about">
                            <p class="text-slate-500 text-sm mt-1">Use route name (e.g., about) or full URL</p>
                            @error('button_1_url')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="border-t border-slate-200 pt-6">
                    <h3 class="text-lg font-semibold text-slate-800 mb-4">Button 2 (Secondary)</h3>

                    <div class="grid md:grid-cols-2 gap-6">
                        <!-- Button 2 Text -->
                        <div>
                            <label for="button_2_text" class="block text-sm font-semibold text-slate-700 mb-2">
                                Button Text *
                            </label>
                            <input type="text"
                                   id="button_2_text"
                                   name="button_2_text"
                                   value="{{ old('button_2_text', $ctaSection->button_2_text ?? 'Explore Programs') }}"
                                   required
                                   class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                   placeholder="Explore Programs">
                            @error('button_2_text')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Button 2 URL -->
                        <div>
                            <label for="button_2_url" class="block text-sm font-semibold text-slate-700 mb-2">
                                Button URL *
                            </label>
                            <input type="text"
                                   id="button_2_url"
                                   name="button_2_url"
                                   value="{{ old('button_2_url', $ctaSection->button_2_url ?? '/programs') }}"
                                   required
                                   class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                   placeholder="/programs">
                            <p class="text-slate-500 text-sm mt-1">Use route name (e.g., programs) or full URL</p>
                            @error('button_2_url')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Active Status -->
                <div class="flex items-center pt-4 border-t border-slate-200">
                    <input type="checkbox"
                           id="is_active"
                           name="is_active"
                           value="1"
                           {{ old('is_active', $ctaSection->is_active ?? true) ? 'checked' : '' }}
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
