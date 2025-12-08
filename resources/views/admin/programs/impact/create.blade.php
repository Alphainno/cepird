@extends('admin.layouts.app')

@section('title', 'Create Impact Stat - Admin')

@section('content')
<div class="mb-8">
    <div class="flex items-center gap-4">
        <a href="{{ route('admin.program-impact.index') }}" class="p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </a>
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Create Impact Stat</h1>
            <p class="text-gray-600 mt-1">Add a new statistic to the impact section</p>
        </div>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <form action="{{ route('admin.program-impact.store') }}" method="POST" class="p-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="value" class="block text-sm font-semibold text-gray-700 mb-2">Value *</label>
                <input type="text" name="value" id="value" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="e.g., 50+, 1,200+">
                <p class="text-xs text-gray-500 mt-1">The number/value to display prominently</p>
            </div>

            <div>
                <label for="label" class="block text-sm font-semibold text-gray-700 mb-2">Label *</label>
                <input type="text" name="label" id="label" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="e.g., Research Publications">
                <p class="text-xs text-gray-500 mt-1">The main label for this stat</p>
            </div>

            <div class="md:col-span-2">
                <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                <input type="text" name="description" id="description"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="e.g., Evidence-based studies driving policy">
                <p class="text-xs text-gray-500 mt-1">Optional supporting text</p>
            </div>

            <div>
                <label for="color_theme" class="block text-sm font-semibold text-gray-700 mb-2">Color Theme *</label>
                <select name="color_theme" id="color_theme" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="blue">Blue</option>
                    <option value="teal">Teal</option>
                    <option value="amber">Amber</option>
                    <option value="indigo">Indigo</option>
                </select>
            </div>

            <div>
                <label for="order" class="block text-sm font-semibold text-gray-700 mb-2">Display Order</label>
                <input type="number" name="order" id="order" min="0"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="0">
                <p class="text-xs text-gray-500 mt-1">Lower numbers appear first</p>
            </div>

            <div class="md:col-span-2">
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" checked
                        class="w-5 h-5 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                    <span class="text-sm font-medium text-gray-700">Active (visible on frontend)</span>
                </label>
            </div>
        </div>

        <div class="mt-8 pt-6 border-t border-gray-100 flex justify-end gap-4">
            <a href="{{ route('admin.program-impact.index') }}" class="px-6 py-3 bg-gray-100 text-gray-700 font-semibold rounded-lg hover:bg-gray-200 transition-colors">
                Cancel
            </a>
            <button type="submit" class="px-6 py-3 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 transition-colors flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                Create Impact Stat
            </button>
        </div>
    </form>
</div>
@endsection
