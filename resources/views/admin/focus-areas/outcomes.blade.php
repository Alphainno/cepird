@extends('admin.layouts.app')

@section('title', 'Focus Area Outcomes')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Focus Area Outcomes</h1>
            <p class="text-slate-600 mt-1">Manage the deliverables shown under the "What We Deliver" section.</p>
        </div>
    </div>

    <!-- Create Outcome (hidden until button click) -->
    <div class="bg-white rounded-sm shadow-sm border border-slate-200">
        <div class="p-6 border-b border-slate-200 flex items-center justify-between">
            <div>
                <h2 class="text-lg font-semibold text-slate-900">Add Outcome</h2>
                <p class="text-sm text-slate-600 mt-1">Add a new deliverable card.</p>
            </div>
            <button type="button" id="showOutcomeFormBtn" class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-sm hover:bg-blue-700 transition-colors">Add Outcome</button>
        </div>
        <form id="outcomeCreateForm" action="{{ route('admin.focus-area-outcomes.store') }}" method="POST" class="p-6 space-y-4 hidden">
            @csrf
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Title <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title') }}" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="e.g., Policy Frameworks" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Icon</label>
                    <input type="text" name="icon" value="{{ old('icon') }}" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="e.g., 📋">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Description</label>
                <textarea name="description" rows="2" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Short description">{{ old('description') }}</textarea>
            </div>
            <div class="grid md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Bullet 1</label>
                    <input type="text" name="bullet1" value="{{ old('bullet1') }}" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="e.g., Digital Transformation Strategy">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Bullet 2</label>
                    <input type="text" name="bullet2" value="{{ old('bullet2') }}" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus-border-blue-500" placeholder="e.g., Startup Ecosystem Policy">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Bullet 3</label>
                    <input type="text" name="bullet3" value="{{ old('bullet3') }}" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus-border-blue-500" placeholder="e.g., SME Development Guidelines">
                </div>
            </div>
            <div class="grid md:grid-cols-2 gap-4 items-center">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', ($outcomes->max('sort_order') ?? 0) + 1) }}" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus-border-blue-500" min="1">
                </div>
                <label class="flex items-center mt-6 md:mt-0">
                    <input type="checkbox" name="is_active" value="1" class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500" checked>
                    <span class="ml-2 text-sm text-slate-700">Active</span>
                </label>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-sm hover:bg-blue-700 transition-colors">Submit Outcome</button>
            </div>
        </form>
    </div>

    <!-- Existing Outcomes -->
    <div class="grid gap-6">
        @foreach($outcomes as $outcome)
        <div class="bg-white rounded-sm shadow-sm border border-slate-200">
            <form action="{{ route('admin.focus-area-outcomes.update', $outcome) }}" method="POST" class="p-6 space-y-4">
                @csrf
                @method('PUT')
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-blue-50 rounded-sm flex items-center justify-center text-2xl">{{ $outcome->icon ?? '📌' }}</div>
                        <div>
                            <h3 class="text-lg font-semibold text-slate-900">{{ $outcome->title }}</h3>
                            <p class="text-sm text-slate-600">Outcome #{{ $outcome->sort_order }}</p>
                        </div>
                    </div>
                    <label class="flex items-center">
                        <input type="checkbox" name="is_active" value="1" {{ $outcome->is_active ? 'checked' : '' }} class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                        <span class="ml-2 text-sm text-slate-600">Active</span>
                    </label>
                </div>

                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Title <span class="text-red-500">*</span></label>
                        <input type="text" name="title" value="{{ old('title', $outcome->title) }}" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Icon</label>
                        <input type="text" name="icon" value="{{ old('icon', $outcome->icon) }}" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="e.g., 📋">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Description</label>
                    <textarea name="description" rows="2" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('description', $outcome->description) }}</textarea>
                </div>

                <div class="grid md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Bullet 1</label>
                        <input type="text" name="bullet1" value="{{ old('bullet1', $outcome->bullet1) }}" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Bullet 2</label>
                        <input type="text" name="bullet2" value="{{ old('bullet2', $outcome->bullet2) }}" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Bullet 3</label>
                        <input type="text" name="bullet3" value="{{ old('bullet3', $outcome->bullet3) }}" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-4 items-center">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Sort Order</label>
                        <input type="number" name="sort_order" value="{{ old('sort_order', $outcome->sort_order) }}" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" min="1" required>
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-sm hover:bg-blue-700 transition-colors">Update Outcome</button>
                </div>
            </form>
        </div>
        @endforeach
    </div>
</div>
@endsection

@push('scripts')
<script>
    (function() {
        const btn = document.getElementById('showOutcomeFormBtn');
        const form = document.getElementById('outcomeCreateForm');
        if (btn && form) {
            btn.addEventListener('click', () => {
                form.classList.remove('hidden');
                btn.classList.add('hidden');
            });
        }
    })();
</script>
@endpush
