@extends('layouts.app')

@section('title', 'Contact Us - CEPIRD')

@section('content')

@if(session('success'))
    <div class="fixed top-24 right-4 z-50 bg-green-500 text-white px-6 py-4 rounded-lg shadow-lg max-w-md">
        <div class="flex items-center gap-3">
            <span class="text-2xl">✅</span>
            <p class="font-semibold">{{ session('success') }}</p>
        </div>
    </div>
    <script>
        setTimeout(() => {
            document.querySelector('.fixed.top-24').style.display = 'none';
        }, 5000);
    </script>
@endif

@if($errors->any())
    <div class="fixed top-24 right-4 z-50 bg-red-500 text-white px-6 py-4 rounded-lg shadow-lg max-w-md">
        <div class="flex items-start gap-3">
            <span class="text-2xl">❌</span>
            <div>
                <p class="font-semibold mb-2">Please fix the following errors:</p>
                <ul class="list-disc list-inside text-sm">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <script>
        setTimeout(() => {
            document.querySelector('.fixed.top-24').style.display = 'none';
        }, 7000);
    </script>
@endif

@php
    $contactHeroTitle = $contactHero?->title ?? 'Contact Us';
    $contactHeroBadge = $contactHero?->badge_text ?? 'Get In Touch';
    $contactHeroDescription = $contactHero?->description ?? "Have questions or want to collaborate? We'd love to hear from you. Reach out and let's build the future together.";
    $contactHeroBackground = ($contactHero && $contactHero->background_url)
        ? $contactHero->background_url
        : 'https://images.unsplash.com/photo-1423666639041-f56000c27a9a?w=1200&auto=format&fit=crop&q=80';
@endphp

<!-- Hero Section -->
<section class="relative bg-white pt-32 pb-28 overflow-hidden mt-20">
    <div class="absolute inset-0">
        <img src="{{ $contactHeroBackground }}"
             alt="Contact hero"
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-slate-900/95 via-slate-900/90 to-blue-900/85"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-5xl mx-auto">
            <span class="text-teal-300 font-bold tracking-wider uppercase text-sm">{{ $contactHeroBadge }}</span>
            <h1 class="text-5xl md:text-6xl font-bold mt-3 mb-6 leading-tight tracking-tight text-white">
                {{ $contactHeroTitle }}
            </h1>
            <p class="text-xl text-slate-200 mb-8 leading-relaxed font-light">
                {{ $contactHeroDescription }}
            </p>
        </div>
    </div>
</section>

<!-- Contact Information & Form Section -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12">
            <!-- Contact Information -->
            <div>
                <div class="mb-8">
                    <span class="text-blue-600 font-bold tracking-wider uppercase text-sm">{{ ($contactInfo && $contactInfo->section_badge) ? $contactInfo->section_badge : 'Reach Out' }}</span>
                    <h2 class="text-4xl font-bold text-slate-900 mt-3 mb-4">{{ ($contactInfo && $contactInfo->section_title) ? $contactInfo->section_title : 'Contact Information' }}</h2>
                    <p class="text-lg text-slate-600">
                        {{ ($contactInfo && $contactInfo->section_description) ? $contactInfo->section_description : "Whether you're a researcher, entrepreneur, policymaker, or innovator — we're here to connect, collaborate, and create impact together." }}
                    </p>
                </div>

                <div class="space-y-6">
                    <!-- Head Office -->
                    <div class="bg-white p-6 rounded-sm border border-slate-200 hover:border-blue-300 transition-all shadow-sm hover:shadow-md">
                        <div class="flex items-start gap-5">
                            <div class="flex-shrink-0 w-14 h-14 bg-blue-100 rounded-sm flex items-center justify-center text-2xl">
                                📍
                            </div>
                            <div>
                                <h3 class="font-bold text-lg text-slate-900 mb-2">{{ ($contactInfo && $contactInfo->office_title) ? $contactInfo->office_title : 'Head Office' }}</h3>
                                <p class="text-slate-600 leading-relaxed">
                                    {!! ($contactInfo && $contactInfo->office_address) ? nl2br(e($contactInfo->office_address)) : '50 Lake Circus, Kalabagan<br>Dhaka 1209, Bangladesh' !!}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="bg-white p-6 rounded-sm border border-slate-200 hover:border-teal-300 transition-all shadow-sm hover:shadow-md">
                        <div class="flex items-start gap-5">
                            <div class="flex-shrink-0 w-14 h-14 bg-teal-100 rounded-sm flex items-center justify-center text-2xl">
                                📧
                            </div>
                            <div>
                                <h3 class="font-bold text-lg text-slate-900 mb-2">{{ ($contactInfo && $contactInfo->email_title) ? $contactInfo->email_title : 'Email' }}</h3>
                                <a href="mailto:{{ ($contactInfo && $contactInfo->email) ? $contactInfo->email : 'hello.cepird@gmail.com' }}" class="text-blue-600 hover:text-blue-700 transition-colors text-lg">
                                    {{ ($contactInfo && $contactInfo->email) ? $contactInfo->email : 'hello.cepird@gmail.com' }}
                                </a>
                                <p class="text-slate-500 text-sm mt-1">{{ ($contactInfo && $contactInfo->email_subtitle) ? $contactInfo->email_subtitle : "We'll respond within 24-48 hours" }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="bg-white p-6 rounded-sm border border-slate-200 hover:border-amber-300 transition-all shadow-sm hover:shadow-md">
                        <div class="flex items-start gap-5">
                            <div class="flex-shrink-0 w-14 h-14 bg-amber-100 rounded-sm flex items-center justify-center text-2xl">
                                📱
                            </div>
                            <div>
                                <h3 class="font-bold text-lg text-slate-900 mb-2">{{ ($contactInfo && $contactInfo->phone_title) ? $contactInfo->phone_title : 'Phone' }}</h3>
                                <a href="tel:{{ ($contactInfo && $contactInfo->phone) ? str_replace([' ', '-'], '', $contactInfo->phone) : '+8801776000008' }}" class="text-blue-600 hover:text-blue-700 transition-colors text-lg">
                                    {{ ($contactInfo && $contactInfo->phone) ? $contactInfo->phone : '+880-1776000008' }}
                                </a>
                                <p class="text-slate-500 text-sm mt-1">{{ ($contactInfo && $contactInfo->phone_subtitle) ? $contactInfo->phone_subtitle : 'Sun - Thu, 9:00 AM - 6:00 PM (BST)' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Website -->
                    <div class="bg-white p-6 rounded-sm border border-slate-200 hover:border-blue-300 transition-all shadow-sm hover:shadow-md">
                        <div class="flex items-start gap-5">
                            <div class="flex-shrink-0 w-14 h-14 bg-blue-100 rounded-sm flex items-center justify-center text-2xl">
                                🌐
                            </div>
                            <div>
                                <h3 class="font-bold text-lg text-slate-900 mb-2">{{ ($contactInfo && $contactInfo->website_title) ? $contactInfo->website_title : 'Website' }}</h3>
                                <a href="{{ ($contactInfo && $contactInfo->website) ? $contactInfo->website : 'https://www.cepird.com' }}" class="text-blue-600 hover:text-blue-700 transition-colors text-lg">
                                    {{ ($contactInfo && $contactInfo->website) ? str_replace(['https://', 'http://'], '', $contactInfo->website) : 'www.cepird.com' }}
                                </a>
                                <p class="text-slate-500 text-sm mt-1">{{ ($contactInfo && $contactInfo->website_subtitle) ? $contactInfo->website_subtitle : 'Visit our website for more information' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div>
                <div class="bg-white p-8 md:p-10 rounded-sm border border-slate-200 shadow-sm">
                    <div class="mb-8">
                        <h3 class="text-2xl font-bold text-slate-900 mb-2">{{ ($contactInfo && $contactInfo->form_title) ? $contactInfo->form_title : 'Send Us a Message' }}</h3>
                        <p class="text-slate-600">{{ ($contactInfo && $contactInfo->form_description) ? $contactInfo->form_description : "Fill out the form below and we'll get back to you as soon as possible." }}</p>
                    </div>

                    <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid md:grid-cols-2 gap-6">
                            <!-- First Name -->
                            <div>
                                <label for="first_name" class="block text-sm font-semibold text-slate-700 mb-2">First Name *</label>
                                <input type="text" id="first_name" name="first_name" required
                                       class="w-full px-4 py-3 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                                       placeholder="Enter your first name">
                            </div>

                            <!-- Last Name -->
                            <div>
                                <label for="last_name" class="block text-sm font-semibold text-slate-700 mb-2">Last Name *</label>
                                <input type="text" id="last_name" name="last_name" required
                                       class="w-full px-4 py-3 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                                       placeholder="Enter your last name">
                            </div>
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-semibold text-slate-700 mb-2">Email Address *</label>
                            <input type="email" id="email" name="email" required
                                   class="w-full px-4 py-3 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                                   placeholder="Enter your email address">
                        </div>

                        <!-- Phone -->
                        <div>
                            <label for="phone" class="block text-sm font-semibold text-slate-700 mb-2">Phone Number</label>
                            <input type="tel" id="phone" name="phone"
                                   class="w-full px-4 py-3 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                                   placeholder="Enter your phone number">
                        </div>

                        <!-- Subject -->
                        <div>
                            <label for="subject" class="block text-sm font-semibold text-slate-700 mb-2">Subject *</label>
                            <select id="subject" name="subject" required
                                    class="w-full px-4 py-3 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                                <option value="">Select a subject</option>
                                <option value="general">General Inquiry</option>
                                <option value="partnership">Partnership Opportunity</option>
                                <option value="programs">Programs & Training</option>
                                <option value="research">Research Collaboration</option>
                                <option value="media">Media & Press</option>
                                <option value="careers">Careers & Internships</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <!-- Message -->
                        <div>
                            <label for="message" class="block text-sm font-semibold text-slate-700 mb-2">Message *</label>
                            <textarea id="message" name="message" rows="5" required
                                      class="w-full px-4 py-3 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all resize-none"
                                      placeholder="Write your message here..."></textarea>
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <button type="submit"
                                    class="w-full px-8 py-4 bg-blue-900 text-white font-bold rounded-sm hover:bg-blue-800 transition-colors shadow-sm">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-teal-600 font-bold tracking-wider uppercase text-sm">Our Location</span>
            <h2 class="text-4xl font-bold text-slate-900 mt-3 mb-4">Find Us Here</h2>
            <p class="text-lg text-slate-600 max-w-2xl mx-auto">
                Visit our office in Dhaka to meet our team and discuss opportunities in person.
            </p>
        </div>

        <div class="bg-slate-100 rounded-sm overflow-hidden shadow-lg">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.2089949619437!2d90.38283287536858!3d23.751619078660695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b0c3e0e6a5%3A0x5f9b5a9b0c8b7a9a!2sLake%20Circus%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1701700000000!5m2!1sen!2sbd"
                width="100%"
                height="450"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                class="w-full">
            </iframe>
        </div>
    </div>
</section>

<!-- Quick Contact Options -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-blue-600 font-bold tracking-wider uppercase text-sm">How Can We Help?</span>
            <h2 class="text-4xl font-bold text-slate-900 mt-3 mb-4">Quick Contact Options</h2>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- General Inquiries -->
            <div class="bg-white p-6 rounded-sm border border-slate-200 text-center hover:border-blue-300 transition-all shadow-sm hover:shadow-md">
                <div class="w-14 h-14 bg-blue-100 rounded-sm flex items-center justify-center text-2xl mx-auto mb-4">
                    💬
                </div>
                <h3 class="font-bold text-lg text-slate-900 mb-2">General Inquiries</h3>
                <p class="text-slate-600 text-sm mb-4">Questions about CEPIRD and our work</p>
                <a href="mailto:hello.cepird@gmail.com" class="text-blue-600 hover:text-blue-700 font-semibold text-sm">
                    Email Us →
                </a>
            </div>

            <!-- Partnership -->
            <div class="bg-white p-6 rounded-sm border border-slate-200 text-center hover:border-teal-300 transition-all shadow-sm hover:shadow-md">
                <div class="w-14 h-14 bg-teal-100 rounded-sm flex items-center justify-center text-2xl mx-auto mb-4">
                    🤝
                </div>
                <h3 class="font-bold text-lg text-slate-900 mb-2">Partnership</h3>
                <p class="text-slate-600 text-sm mb-4">Collaborate with us on initiatives</p>
                <a href="mailto:hello.cepird@gmail.com?subject=Partnership Inquiry" class="text-teal-600 hover:text-teal-700 font-semibold text-sm">
                    Partner With Us →
                </a>
            </div>

            <!-- Programs -->
            <div class="bg-white p-6 rounded-sm border border-slate-200 text-center hover:border-amber-300 transition-all shadow-sm hover:shadow-md">
                <div class="w-14 h-14 bg-amber-100 rounded-sm flex items-center justify-center text-2xl mx-auto mb-4">
                    🎓
                </div>
                <h3 class="font-bold text-lg text-slate-900 mb-2">Programs</h3>
                <p class="text-slate-600 text-sm mb-4">Training, certification & events</p>
                <a href="{{ route('programs') }}" class="text-amber-600 hover:text-amber-700 font-semibold text-sm">
                    View Programs →
                </a>
            </div>

            <!-- Careers -->
            <div class="bg-white p-6 rounded-sm border border-slate-200 text-center hover:border-indigo-300 transition-all shadow-sm hover:shadow-md">
                <div class="w-14 h-14 bg-indigo-100 rounded-sm flex items-center justify-center text-2xl mx-auto mb-4">
                    💼
                </div>
                <h3 class="font-bold text-lg text-slate-900 mb-2">Careers</h3>
                <p class="text-slate-600 text-sm mb-4">Join our team and make impact</p>
                <a href="mailto:hello.cepird@gmail.com?subject=Career Inquiry" class="text-indigo-600 hover:text-indigo-700 font-semibold text-sm">
                    Apply Now →
                </a>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-br from-blue-900 via-slate-900 to-teal-800 rounded-sm p-12 md:p-16 text-white text-center shadow-2xl">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">Let's Build the Future Together</h2>
            <p class="text-xl text-blue-100 mb-10 max-w-3xl mx-auto leading-relaxed">
                Whether you're looking to collaborate, contribute, or simply learn more about our initiatives, we're excited to connect with you.
            </p>
            <div class="flex flex-col md:flex-row justify-center gap-4">
                <a href="{{ route('about') }}" class="px-10 py-4 bg-white text-blue-900 font-bold rounded-sm hover:bg-blue-50 transition-colors text-lg">
                    Learn About Us
                </a>
                <a href="{{ route('programs') }}" class="px-10 py-4 bg-teal-600 text-white font-bold rounded-sm hover:bg-teal-700 transition-colors border border-teal-500 text-lg">
                    Explore Programs
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
