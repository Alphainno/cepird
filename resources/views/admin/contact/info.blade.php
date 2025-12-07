@extends('admin.layouts.app')

@section('title', 'Contact Information Section')

@section('content')
<div class="space-y-6">
    @if(session('success'))
        <div class="p-4 rounded-sm border border-green-200 bg-green-50 text-green-800 text-sm">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="p-4 rounded-sm border border-red-200 bg-red-50 text-red-800 text-sm space-y-1">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Contact Information Section</h1>
            <p class="text-slate-600 mt-1">Manage contact details displayed on the contact page</p>
        </div>
    </div>

    <div class="bg-white rounded-sm shadow-sm border border-slate-200">
        <div class="p-6 border-b border-slate-200">
            <h2 class="text-lg font-semibold text-slate-900">Edit Contact Information</h2>
            <p class="text-sm text-slate-600 mt-1">Update contact details, office info, and form settings</p>
        </div>

        <form action="{{ route('admin.contact-info.store') }}" method="POST" class="p-6 space-y-8">
            @csrf

            <!-- Section Header -->
            <div class="border-b border-slate-200 pb-6">
                <h3 class="text-md font-semibold text-slate-800 mb-4">Section Header</h3>
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label for="section_badge" class="block text-sm font-medium text-slate-700 mb-2">Badge Text <span class="text-red-500">*</span></label>
                        <input type="text" name="section_badge" id="section_badge" value="{{ old('section_badge', $contactInfo->section_badge ?? 'Reach Out') }}" required class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div>
                        <label for="section_title" class="block text-sm font-medium text-slate-700 mb-2">Section Title <span class="text-red-500">*</span></label>
                        <input type="text" name="section_title" id="section_title" value="{{ old('section_title', $contactInfo->section_title ?? 'Contact Information') }}" required class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>

                <div class="mt-4">
                    <label for="section_description" class="block text-sm font-medium text-slate-700 mb-2">Section Description</label>
                    <textarea name="section_description" id="section_description" rows="3" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('section_description', $contactInfo->section_description ?? '') }}</textarea>
                </div>
            </div>

            <!-- Office Information -->
            <div class="border-b border-slate-200 pb-6">
                <h3 class="text-md font-semibold text-slate-800 mb-4">Office Information</h3>
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label for="office_title" class="block text-sm font-medium text-slate-700 mb-2">Office Title <span class="text-red-500">*</span></label>
                        <input type="text" name="office_title" id="office_title" value="{{ old('office_title', $contactInfo->office_title ?? 'Head Office') }}" required class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>

                <div class="mt-4">
                    <label for="office_address" class="block text-sm font-medium text-slate-700 mb-2">Office Address</label>
                    <textarea name="office_address" id="office_address" rows="3" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('office_address', $contactInfo->office_address ?? '') }}</textarea>
                </div>
            </div>

            <!-- Email Information -->
            <div class="border-b border-slate-200 pb-6">
                <h3 class="text-md font-semibold text-slate-800 mb-4">Email Information</h3>
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label for="email_title" class="block text-sm font-medium text-slate-700 mb-2">Email Title <span class="text-red-500">*</span></label>
                        <input type="text" name="email_title" id="email_title" value="{{ old('email_title', $contactInfo->email_title ?? 'Email') }}" required class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-700 mb-2">Email Address</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $contactInfo->email ?? '') }}" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>

                <div class="mt-4">
                    <label for="email_subtitle" class="block text-sm font-medium text-slate-700 mb-2">Email Subtitle</label>
                    <input type="text" name="email_subtitle" id="email_subtitle" value="{{ old('email_subtitle', $contactInfo->email_subtitle ?? '') }}" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>

            <!-- Phone Information -->
            <div class="border-b border-slate-200 pb-6">
                <h3 class="text-md font-semibold text-slate-800 mb-4">Phone Information</h3>
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label for="phone_title" class="block text-sm font-medium text-slate-700 mb-2">Phone Title <span class="text-red-500">*</span></label>
                        <input type="text" name="phone_title" id="phone_title" value="{{ old('phone_title', $contactInfo->phone_title ?? 'Phone') }}" required class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-slate-700 mb-2">Phone Number</label>
                        <input type="text" name="phone" id="phone" value="{{ old('phone', $contactInfo->phone ?? '') }}" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>

                <div class="mt-4">
                    <label for="phone_subtitle" class="block text-sm font-medium text-slate-700 mb-2">Phone Subtitle</label>
                    <input type="text" name="phone_subtitle" id="phone_subtitle" value="{{ old('phone_subtitle', $contactInfo->phone_subtitle ?? '') }}" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>

            <!-- Website Information -->
            <div class="border-b border-slate-200 pb-6">
                <h3 class="text-md font-semibold text-slate-800 mb-4">Website Information</h3>
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label for="website_title" class="block text-sm font-medium text-slate-700 mb-2">Website Title <span class="text-red-500">*</span></label>
                        <input type="text" name="website_title" id="website_title" value="{{ old('website_title', $contactInfo->website_title ?? 'Website') }}" required class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div>
                        <label for="website" class="block text-sm font-medium text-slate-700 mb-2">Website URL</label>
                        <input type="url" name="website" id="website" value="{{ old('website', $contactInfo->website ?? '') }}" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>

                <div class="mt-4">
                    <label for="website_subtitle" class="block text-sm font-medium text-slate-700 mb-2">Website Subtitle</label>
                    <input type="text" name="website_subtitle" id="website_subtitle" value="{{ old('website_subtitle', $contactInfo->website_subtitle ?? '') }}" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>

            <!-- Contact Form Settings -->
            <div class="border-b border-slate-200 pb-6">
                <h3 class="text-md font-semibold text-slate-800 mb-4">Contact Form Settings</h3>
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label for="form_title" class="block text-sm font-medium text-slate-700 mb-2">Form Title <span class="text-red-500">*</span></label>
                        <input type="text" name="form_title" id="form_title" value="{{ old('form_title', $contactInfo->form_title ?? 'Send Us a Message') }}" required class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>

                <div class="mt-4">
                    <label for="form_description" class="block text-sm font-medium text-slate-700 mb-2">Form Description</label>
                    <textarea name="form_description" id="form_description" rows="2" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('form_description', $contactInfo->form_description ?? '') }}</textarea>
                </div>
            </div>

            <!-- Active Status -->
            <div class="flex items-center">
                <input type="checkbox" name="is_active" id="is_active" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-slate-300 rounded" {{ old('is_active', $contactInfo->is_active ?? true) ? 'checked' : '' }}>
                <label for="is_active" class="ml-2 block text-sm text-slate-700">Active (display on site)</label>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end pt-6 border-t border-slate-200">
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-sm hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endsection
