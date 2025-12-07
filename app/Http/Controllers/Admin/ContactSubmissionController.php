<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;
use Illuminate\Http\Request;

class ContactSubmissionController extends Controller
{
    public function index()
    {
        $submissions = ContactSubmission::recent()->paginate(20);
        $unreadCount = ContactSubmission::unread()->count();
        
        return view('admin.contact.submissions', compact('submissions', 'unreadCount'));
    }

    public function show(ContactSubmission $submission)
    {
        // Mark as read when viewed
        if (!$submission->is_read) {
            $submission->update(['is_read' => true]);
        }

        return view('admin.contact.submission-detail', compact('submission'));
    }

    public function markAsRead(ContactSubmission $submission)
    {
        $submission->update(['is_read' => true]);
        
        return redirect()->back()->with('success', 'Message marked as read');
    }

    public function markAsUnread(ContactSubmission $submission)
    {
        $submission->update(['is_read' => false]);
        
        return redirect()->back()->with('success', 'Message marked as unread');
    }

    public function destroy(ContactSubmission $submission)
    {
        $submission->delete();
        
        return redirect()->route('admin.contact.submissions.index')
            ->with('success', 'Message deleted successfully');
    }
}
