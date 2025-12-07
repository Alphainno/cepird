@extends('admin.layouts.app')

@section('title', 'Contact Messages - Admin Dashboard')

@section('content')
<div class="p-6">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-slate-800">Contact Messages</h1>
        <p class="text-slate-600 mt-2">View and manage contact form submissions</p>
    </div>

    <!-- Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="bg-white p-6 rounded-lg shadow-sm border border-slate-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-slate-600">Total Messages</p>
                    <p class="text-2xl font-bold text-slate-900">{{ $submissions->total() }}</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <span class="text-2xl">📧</span>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-sm border border-slate-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-slate-600">Unread Messages</p>
                    <p class="text-2xl font-bold text-amber-600">{{ $unreadCount }}</p>
                </div>
                <div class="w-12 h-12 bg-amber-100 rounded-lg flex items-center justify-center">
                    <span class="text-2xl">🔔</span>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-sm border border-slate-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-slate-600">Read Messages</p>
                    <p class="text-2xl font-bold text-green-600">{{ $submissions->total() - $unreadCount }}</p>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                    <span class="text-2xl">✅</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Messages Table -->
    <div class="bg-white rounded-lg shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Subject</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    @forelse($submissions as $submission)
                        <tr class="hover:bg-slate-50 {{ !$submission->is_read ? 'bg-blue-50' : '' }}">
                            <td class="px-6 py-4">
                                @if($submission->is_read)
                                    <span class="px-2 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded">Read</span>
                                @else
                                    <span class="px-2 py-1 text-xs font-semibold text-amber-700 bg-amber-100 rounded">Unread</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm font-medium text-slate-900">
                                {{ $submission->full_name }}
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-600">
                                {{ $submission->email }}
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-600">
                                {{ ucfirst($submission->subject) }}
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-600">
                                {{ $submission->created_at->format('M d, Y h:i A') }}
                            </td>
                            <td class="px-6 py-4 text-sm">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('admin.contact.submissions.show', $submission) }}"
                                       class="text-blue-600 hover:text-blue-800 font-semibold">
                                        View
                                    </a>
                                    <button type="button" onclick="openDeleteModal({{ $submission->id }})" class="text-red-600 hover:text-red-800 font-semibold">
                                        Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-slate-500">
                                No contact messages yet
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($submissions->hasPages())
            <div class="px-6 py-4 border-t border-slate-200">
                {{ $submissions->links() }}
            </div>
        @endif
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
                <form id="deleteForm" method="POST" class="flex-1">
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
let deleteSubmissionId = null;

function openDeleteModal(submissionId) {
    deleteSubmissionId = submissionId;
    const form = document.getElementById('deleteForm');
    form.action = `/admin/contact/submissions/${submissionId}`;
    document.getElementById('deleteModal').classList.remove('hidden');
}

function closeDeleteModal() {
    document.getElementById('deleteModal').classList.add('hidden');
    deleteSubmissionId = null;
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
