@extends('admin.layouts.app')

@section('title', 'Message Details - Admin Dashboard')

@section('content')
<div class="p-6">
    <div class="mb-6">
        <a href="{{ route('admin.contact.submissions.index') }}" class="text-blue-600 hover:text-blue-800 font-semibold">
            ← Back to Messages
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-sm border border-slate-200 overflow-hidden">
        <!-- Header -->
        <div class="bg-slate-50 border-b border-slate-200 px-6 py-4">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-slate-800">Message from {{ $submission->full_name }}</h1>
                    <p class="text-sm text-slate-600 mt-1">{{ $submission->created_at->format('F d, Y \a\t h:i A') }}</p>
                </div>
                <div>
                    @if($submission->is_read)
                        <span class="px-3 py-1 text-sm font-semibold text-green-700 bg-green-100 rounded">Read</span>
                    @else
                        <span class="px-3 py-1 text-sm font-semibold text-amber-700 bg-amber-100 rounded">Unread</span>
                    @endif
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="p-6">
            <div class="grid md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Full Name</label>
                    <p class="text-slate-900">{{ $submission->full_name }}</p>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Email</label>
                    <p class="text-slate-900">
                        <a href="mailto:{{ $submission->email }}" class="text-blue-600 hover:text-blue-800">
                            {{ $submission->email }}
                        </a>
                    </p>
                </div>

                @if($submission->phone)
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Phone</label>
                    <p class="text-slate-900">
                        <a href="tel:{{ $submission->phone }}" class="text-blue-600 hover:text-blue-800">
                            {{ $submission->phone }}
                        </a>
                    </p>
                </div>
                @endif

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Subject</label>
                    <p class="text-slate-900">{{ ucfirst($submission->subject) }}</p>
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Message</label>
                <div class="bg-slate-50 border border-slate-200 rounded-lg p-4">
                    <p class="text-slate-900 whitespace-pre-wrap">{{ $submission->message }}</p>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="bg-slate-50 border-t border-slate-200 px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex gap-3">
                    <a href="mailto:{{ $submission->email }}"
                       class="px-4 py-2 bg-blue-600 text-white font-semibold rounded hover:bg-blue-700 transition">
                        Reply via Email
                    </a>

                    @if($submission->is_read)
                        <form action="{{ route('admin.contact.submissions.mark-unread', $submission) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="px-4 py-2 bg-amber-600 text-white font-semibold rounded hover:bg-amber-700 transition">
                                Mark as Unread
                            </button>
                        </form>
                    @else
                        <form action="{{ route('admin.contact.submissions.mark-read', $submission) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="px-4 py-2 bg-green-600 text-white font-semibold rounded hover:bg-green-700 transition">
                                Mark as Read
                            </button>
                        </form>
                    @endif
                </div>

                <button type="button" onclick="openDeleteModal()" class="px-4 py-2 bg-red-600 text-white font-semibold rounded hover:bg-red-700 transition">
                    Delete Message
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-lg shadow-2xl max-w-md w-full transform transition-all">
        <div class="p-6">
            <div class="flex items-center justify-center w-12 h-12 mx-auto bg-red-100 rounded-full mb-4">
                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                </svg>
            </div>
            <h3 class="text-lg font-bold text-slate-900 text-center mb-2">Delete Message</h3>
            <p class="text-slate-600 text-center mb-6">Are you sure you want to delete this message? This action cannot be undone.</p>
            <div class="flex gap-3">
                <button type="button" onclick="closeDeleteModal()" class="flex-1 px-4 py-2 bg-slate-200 text-slate-700 font-semibold rounded hover:bg-slate-300 transition">
                    Cancel
                </button>
                <form action="{{ route('admin.contact.submissions.destroy', $submission) }}" method="POST" class="flex-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full px-4 py-2 bg-red-600 text-white font-semibold rounded hover:bg-red-700 transition">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function openDeleteModal() {
    document.getElementById('deleteModal').classList.remove('hidden');
}

function closeDeleteModal() {
    document.getElementById('deleteModal').classList.add('hidden');
}

// Close modal on escape key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeDeleteModal();
    }
});

// Close modal when clicking outside
document.getElementById('deleteModal').addEventListener('click', function(event) {
    if (event.target === this) {
        closeDeleteModal();
    }
});
</script>
@endsection
