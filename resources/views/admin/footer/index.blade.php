@extends('admin.layouts.app')

@section('title', 'Footer Management')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Footer Management</h1>
            <p class="text-slate-600 mt-1">Manage the website footer content and links</p>
        </div>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-sm shadow-sm border border-slate-200">
        <div class="p-6 border-b border-slate-200">
            <h2 class="text-lg font-semibold text-slate-900">Edit Footer Settings</h2>
            <p class="text-sm text-slate-600 mt-1">Update the footer logo, contact info, links, and social media</p>
        </div>

        <form action="{{ route('admin.footer.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6" id="footerForm">
            @csrf

            <!-- Brand Settings -->
            <div class="border-b border-slate-200 pb-6">
                <h3 class="text-lg font-semibold text-slate-900 mb-4">Brand Settings</h3>

                <div class="grid md:grid-cols-2 gap-6">
                    <!-- Logo -->
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Footer Logo</label>
                        <div class="space-y-4">
                            <!-- Logo Preview -->
                            <div id="logoPreviewContainer" class="@if(!$footerSetting->logo) hidden @endif">
                                <div class="relative inline-block">
                                    <img id="logoPreview" 
                                        src="{{ $footerSetting->logo ? asset('storage/' . $footerSetting->logo) : '' }}" 
                                        alt="Logo Preview" 
                                        class="h-20 w-auto object-contain border border-slate-200 rounded-sm p-2 bg-slate-800">
                                </div>
                                @if($footerSetting->logo)
                                <label class="flex items-center mt-2">
                                    <input type="checkbox" name="remove_logo" id="removeLogo" class="w-4 h-4 text-red-600 border-slate-300 rounded focus:ring-red-500">
                                    <span class="ml-2 text-sm text-red-600">Remove logo</span>
                                </label>
                                @endif
                            </div>
                            
                            <!-- File Input -->
                            <div>
                                <input type="file" name="logo" id="logoInput" accept="image/*"
                                    class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <p class="text-xs text-slate-500 mt-1">Recommended: PNG or SVG with transparent background, max 2MB</p>
                            </div>
                        </div>
                    </div>

                    <!-- Brand Name & Description -->
                    <div class="space-y-4">
                        <div>
                            <label for="brand_name" class="block text-sm font-medium text-slate-700 mb-2">Brand Name <span class="text-red-500">*</span></label>
                            <input type="text" name="brand_name" id="brand_name"
                                value="{{ old('brand_name', $footerSetting->brand_name ?? 'CEPIRD') }}"
                                class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="e.g., CEPIRD" required>
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-slate-700 mb-2">Description</label>
                            <textarea name="description" id="description" rows="3"
                                class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Brief description of your organization">{{ old('description', $footerSetting->description) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="border-b border-slate-200 pb-6">
                <h3 class="text-lg font-semibold text-slate-900 mb-4">Contact Information</h3>

                <div class="grid md:grid-cols-3 gap-6">
                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-700 mb-2">Email</label>
                        <input type="email" name="email" id="email"
                            value="{{ old('email', $footerSetting->email) }}"
                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="info@example.com">
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-slate-700 mb-2">Phone</label>
                        <input type="text" name="phone" id="phone"
                            value="{{ old('phone', $footerSetting->phone) }}"
                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="+880 1700-000000">
                    </div>

                    <div>
                        <label for="address" class="block text-sm font-medium text-slate-700 mb-2">Address</label>
                        <input type="text" name="address" id="address"
                            value="{{ old('address', $footerSetting->address) }}"
                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Dhaka, Bangladesh">
                    </div>
                </div>
            </div>

            <!-- Social Media Links -->
            <div class="border-b border-slate-200 pb-6">
                <h3 class="text-lg font-semibold text-slate-900 mb-4">Social Media Links</h3>

                <div class="grid md:grid-cols-3 gap-6">
                    <div>
                        <label for="facebook_url" class="block text-sm font-medium text-slate-700 mb-2">Facebook URL</label>
                        <input type="url" name="facebook_url" id="facebook_url"
                            value="{{ old('facebook_url', $footerSetting->facebook_url) }}"
                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="https://facebook.com/yourpage">
                    </div>

                    <div>
                        <label for="twitter_url" class="block text-sm font-medium text-slate-700 mb-2">Twitter/X URL</label>
                        <input type="url" name="twitter_url" id="twitter_url"
                            value="{{ old('twitter_url', $footerSetting->twitter_url) }}"
                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="https://twitter.com/yourhandle">
                    </div>

                    <div>
                        <label for="linkedin_url" class="block text-sm font-medium text-slate-700 mb-2">LinkedIn URL</label>
                        <input type="url" name="linkedin_url" id="linkedin_url"
                            value="{{ old('linkedin_url', $footerSetting->linkedin_url) }}"
                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="https://linkedin.com/company/yourcompany">
                    </div>

                    <div>
                        <label for="instagram_url" class="block text-sm font-medium text-slate-700 mb-2">Instagram URL</label>
                        <input type="url" name="instagram_url" id="instagram_url"
                            value="{{ old('instagram_url', $footerSetting->instagram_url) }}"
                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="https://instagram.com/yourhandle">
                    </div>

                    <div>
                        <label for="youtube_url" class="block text-sm font-medium text-slate-700 mb-2">YouTube URL</label>
                        <input type="url" name="youtube_url" id="youtube_url"
                            value="{{ old('youtube_url', $footerSetting->youtube_url) }}"
                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="https://youtube.com/@yourchannel">
                    </div>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="border-b border-slate-200 pb-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-slate-900">Quick Links</h3>
                </div>

                <div class="bg-slate-50 p-4 rounded-sm mb-4">
                    <p class="text-sm text-slate-600">
                        Add navigation links for your footer. Use URL paths like <code class="bg-slate-200 px-1 rounded">/about</code> or full URLs like <code class="bg-slate-200 px-1 rounded">https://example.com</code>
                    </p>
                </div>

                <div id="quickLinksContainer" class="space-y-3">
                    @if($quickLinks->count() > 0)
                        @foreach($quickLinks as $index => $link)
                            <div class="quick-link-item flex items-center gap-3 bg-slate-50 p-3 rounded-sm border border-slate-200">
                                <input type="hidden" name="quick_links[{{ $index }}][id]" value="{{ $link->id }}">
                                <input type="text" name="quick_links[{{ $index }}][title]"
                                    value="{{ old('quick_links.' . $index . '.title', $link->title) }}"
                                    class="flex-1 px-3 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Link Title" required>
                                <input type="text" name="quick_links[{{ $index }}][url]"
                                    value="{{ old('quick_links.' . $index . '.url', $link->url) }}"
                                    class="flex-1 px-3 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="/about" required>
                                <label class="flex items-center whitespace-nowrap">
                                    <input type="checkbox" name="quick_links[{{ $index }}][is_active]"
                                        {{ $link->is_active ? 'checked' : '' }}
                                        class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                                    <span class="ml-1 text-sm text-slate-600">Active</span>
                                </label>
                                <button type="button" class="removeQuickLinkBtn text-red-600 hover:text-red-800 p-1">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </div>
                        @endforeach
                    @endif
                </div>

                <button type="button" id="addQuickLinkBtn" class="mt-3 px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-sm hover:bg-blue-700 transition-colors">
                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Add Quick Link
                </button>
            </div>

            <!-- Legal Links -->
            <div class="border-b border-slate-200 pb-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-slate-900">Legal Links</h3>
                </div>

                <div id="legalLinksContainer" class="space-y-3">
                    @if($legalLinks->count() > 0)
                        @foreach($legalLinks as $index => $link)
                            <div class="legal-link-item flex items-center gap-3 bg-slate-50 p-3 rounded-sm border border-slate-200">
                                <input type="hidden" name="legal_links[{{ $index }}][id]" value="{{ $link->id }}">
                                <input type="text" name="legal_links[{{ $index }}][title]"
                                    value="{{ old('legal_links.' . $index . '.title', $link->title) }}"
                                    class="flex-1 px-3 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Link Title" required>
                                <input type="text" name="legal_links[{{ $index }}][url]"
                                    value="{{ old('legal_links.' . $index . '.url', $link->url) }}"
                                    class="flex-1 px-3 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="/privacy-policy" required>
                                <label class="flex items-center whitespace-nowrap">
                                    <input type="checkbox" name="legal_links[{{ $index }}][is_active]"
                                        {{ $link->is_active ? 'checked' : '' }}
                                        class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                                    <span class="ml-1 text-sm text-slate-600">Active</span>
                                </label>
                                <button type="button" class="removeLegalLinkBtn text-red-600 hover:text-red-800 p-1">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </div>
                        @endforeach
                    @endif
                </div>

                <button type="button" id="addLegalLinkBtn" class="mt-3 px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-sm hover:bg-blue-700 transition-colors">
                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Add Legal Link
                </button>
            </div>

            <!-- Newsletter & Copyright -->
            <div class="border-b border-slate-200 pb-6">
                <h3 class="text-lg font-semibold text-slate-900 mb-4">Newsletter & Copyright</h3>

                <div class="grid md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <input type="checkbox" name="show_newsletter" id="show_newsletter"
                                {{ old('show_newsletter', $footerSetting->show_newsletter ?? true) ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                            <label for="show_newsletter" class="ml-2 text-sm font-medium text-slate-700">Show newsletter section</label>
                        </div>

                        <div>
                            <label for="newsletter_title" class="block text-sm font-medium text-slate-700 mb-2">Newsletter Title</label>
                            <input type="text" name="newsletter_title" id="newsletter_title"
                                value="{{ old('newsletter_title', $footerSetting->newsletter_title ?? 'Newsletter') }}"
                                class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Newsletter">
                        </div>
                    </div>

                    <div>
                        <label for="copyright_text" class="block text-sm font-medium text-slate-700 mb-2">Copyright Text</label>
                        <input type="text" name="copyright_text" id="copyright_text"
                            value="{{ old('copyright_text', $footerSetting->copyright_text ?? '© ' . date('Y') . ' CEPIRD. All rights reserved.') }}"
                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="© 2024 CEPIRD. All rights reserved.">
                    </div>
                </div>
            </div>

            <!-- Is Active -->
            <div class="flex items-center pt-4 border-t border-slate-200">
                <input type="checkbox" name="is_active" id="is_active"
                    {{ old('is_active', $footerSetting->is_active ?? true) ? 'checked' : '' }}
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
    let quickLinkIndex = {{ $quickLinks->count() }};
    let legalLinkIndex = {{ $legalLinks->count() }};

    // Logo Preview functionality
    const logoInput = document.getElementById('logoInput');
    const logoPreview = document.getElementById('logoPreview');
    const logoPreviewContainer = document.getElementById('logoPreviewContainer');
    const removeLogo = document.getElementById('removeLogo');

    if (logoInput) {
        logoInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    logoPreview.src = e.target.result;
                    logoPreviewContainer.classList.remove('hidden');
                    if (removeLogo) {
                        removeLogo.checked = false;
                    }
                };
                reader.readAsDataURL(file);
            }
        });
    }

    if (removeLogo) {
        removeLogo.addEventListener('change', function() {
            if (this.checked) {
                logoPreview.style.opacity = '0.3';
            } else {
                logoPreview.style.opacity = '1';
            }
        });
    }

    // Quick Links Management
    document.getElementById('addQuickLinkBtn').addEventListener('click', function() {
        const container = document.getElementById('quickLinksContainer');
        const html = `
            <div class="quick-link-item flex items-center gap-3 bg-slate-50 p-3 rounded-sm border border-slate-200">
                <input type="text" name="quick_links[${quickLinkIndex}][title]"
                    class="flex-1 px-3 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Link Title" required>
                <input type="text" name="quick_links[${quickLinkIndex}][url]"
                    class="flex-1 px-3 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="/about" required>
                <label class="flex items-center whitespace-nowrap">
                    <input type="checkbox" name="quick_links[${quickLinkIndex}][is_active]" checked
                        class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                    <span class="ml-1 text-sm text-slate-600">Active</span>
                </label>
                <button type="button" class="removeQuickLinkBtn text-red-600 hover:text-red-800 p-1">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                </button>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', html);
        quickLinkIndex++;
    });

    document.getElementById('quickLinksContainer').addEventListener('click', function(e) {
        if (e.target.closest('.removeQuickLinkBtn')) {
            e.target.closest('.quick-link-item').remove();
        }
    });

    // Legal Links Management
    document.getElementById('addLegalLinkBtn').addEventListener('click', function() {
        const container = document.getElementById('legalLinksContainer');
        const html = `
            <div class="legal-link-item flex items-center gap-3 bg-slate-50 p-3 rounded-sm border border-slate-200">
                <input type="text" name="legal_links[${legalLinkIndex}][title]"
                    class="flex-1 px-3 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Link Title" required>
                <input type="text" name="legal_links[${legalLinkIndex}][url]"
                    class="flex-1 px-3 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="/privacy-policy" required>
                <label class="flex items-center whitespace-nowrap">
                    <input type="checkbox" name="legal_links[${legalLinkIndex}][is_active]" checked
                        class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                    <span class="ml-1 text-sm text-slate-600">Active</span>
                </label>
                <button type="button" class="removeLegalLinkBtn text-red-600 hover:text-red-800 p-1">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                </button>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', html);
        legalLinkIndex++;
    });

    document.getElementById('legalLinksContainer').addEventListener('click', function(e) {
        if (e.target.closest('.removeLegalLinkBtn')) {
            e.target.closest('.legal-link-item').remove();
        }
    });
});
</script>
@endsection
