@extends('layouts.app')

@section('title', 'About Us - CEPIRD')

@section('content')

<!-- Hero Section -->
<section class="relative bg-white pt-40 pb-28 overflow-hidden">
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, rgba(0,0,0,0.1) 1px, transparent 0); background-size: 40px 40px;"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-5xl mx-auto">
            <div class="inline-block mb-6 px-4 py-2 bg-blue-50 rounded-full border border-blue-200">
                <span class="text-blue-900 text-sm font-medium">About Us</span>
            </div>
            <h1 class="text-5xl md:text-7xl font-bold mb-8 leading-tight tracking-tight text-slate-900">
                {{ $aboutHero->title ?? 'Center for Entrepreneurial Policy, Innovation, Research & Development' }}
            </h1>
            <p class="text-xl md:text-2xl text-slate-600 mb-10 leading-relaxed font-light">
                {{ $aboutHero->subtitle ?? 'Shaping the future of entrepreneurship and socio-economic transformation in Bangladesh' }}
            </p>
            <div class="flex flex-wrap justify-center gap-3">
                <span class="px-6 py-2.5 bg-blue-50 rounded-full border border-blue-200 text-sm font-medium text-slate-700 hover:bg-blue-100 transition-all">{{ $aboutHero->tag1 ?? 'Empowering Ideas' }}</span>
                <span class="px-6 py-2.5 bg-blue-50 rounded-full border border-blue-200 text-sm font-medium text-slate-700 hover:bg-blue-100 transition-all">{{ $aboutHero->tag2 ?? 'Influencing Policy' }}</span>
                <span class="px-6 py-2.5 bg-blue-50 rounded-full border border-blue-200 text-sm font-medium text-slate-700 hover:bg-blue-100 transition-all">{{ $aboutHero->tag3 ?? 'Impacting the Future' }}</span>
            </div>
        </div>
    </div>
</section>

<!-- Introduction Section -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div class="space-y-6">
                <div class="inline-block px-4 py-1 bg-blue-50 rounded-full">
                    <span class="text-blue-900 text-sm font-semibold">Who We Are</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-slate-900 leading-tight">
                    Where Research Meets<br>
                    <span class="text-blue-900">Real-World Impact</span>
                </h2>
                <div class="space-y-5 text-slate-600 text-lg leading-relaxed">
                    <p>
                        CEPIRD is a forward-thinking national initiative dedicated to shaping the future of entrepreneurship, policy innovation, and socio-economic transformation in Bangladesh.
                    </p>
                    <p>
                        Founded by <span class="font-semibold text-slate-900">Mohammad Shahriar Khan</span>, a visionary entrepreneur and ecosystem builder, we connect policymakers, entrepreneurs, educators, and innovators to design sustainable strategies for emerging economies.
                    </p>
                    <p class="text-blue-900 font-medium">
                        We operate where ideas transform into action and research shapes national progress.
                    </p>
                </div>
            </div>
            <div class="relative">
                <div class="relative overflow-hidden shadow-2xl transform hover:scale-105 transition-transform duration-500">
                    <!-- Background Image -->
                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=800&auto=format&fit=crop&q=80"
                         alt="Successful team"
                         class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Core Focus Areas -->
<section class="py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <div class="inline-block px-4 py-1 bg-blue-50 rounded-full mb-4">
                <span class="text-blue-900 text-sm font-semibold">What We Focus On</span>
            </div>
            <h2 class="text-4xl md:text-5xl font-bold text-slate-900 mb-6">Core Focus Areas</h2>
            <p class="text-lg text-slate-600 max-w-2xl mx-auto">
                Driving meaningful change at the intersection of research, innovation, and policy
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="group bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100 hover:border-blue-200">
                <div class="w-14 h-14 bg-blue-50 rounded-xl flex items-center justify-center text-3xl mb-6 group-hover:bg-blue-100 transition-colors">
                    📋
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-3">Policy Development</h3>
                <p class="text-slate-600 leading-relaxed">
                    Evidence-based frameworks strengthening entrepreneurship and digital transformation.
                </p>
            </div>

            <div class="group bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100 hover:border-teal-200">
                <div class="w-14 h-14 bg-teal-50 rounded-xl flex items-center justify-center text-3xl mb-6 group-hover:bg-teal-100 transition-colors">
                    💡
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-3">Technology Innovation</h3>
                <p class="text-slate-600 leading-relaxed">
                    Promoting digital adoption and tech-driven solutions for emerging industries.
                </p>
            </div>

            <div class="group bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100 hover:border-amber-200">
                <div class="w-14 h-14 bg-amber-50 rounded-xl flex items-center justify-center text-3xl mb-6 group-hover:bg-amber-100 transition-colors">
                    📊
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-3">Research</h3>
                <p class="text-slate-600 leading-relaxed">
                    In-depth studies guiding policymakers, institutions, and entrepreneurs.
                </p>
            </div>

            <div class="group bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100 hover:border-blue-200">
                <div class="w-14 h-14 bg-blue-50 rounded-xl flex items-center justify-center text-3xl mb-6 group-hover:bg-blue-100 transition-colors">
                    🚀
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-3">Entrepreneurship</h3>
                <p class="text-slate-600 leading-relaxed">
                    Empowering startups through training, mentorship, and ecosystem development.
                </p>
            </div>
        </div>

        <div class="mt-16 text-center">
            <div class="inline-block bg-gradient-to-r from-blue-900 to-teal-600 rounded-2xl p-10 max-w-4xl shadow-xl">
                <p class="text-2xl text-white font-medium italic">
                    "Ideas create progress — but policies turn progress into national prosperity."
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Vision & Mission -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-8">
            <!-- Vision Card -->
            <div class="bg-white p-6 rounded-sm shadow-md hover:shadow-2xl transition-shadow duration-300 border-t-4 border-blue-900 group">
                <div class="text-4xl mb-4">🎯</div>
                <h3 class="text-xl font-bold text-slate-900 mb-3">Our Vision</h3>
                <p class="text-slate-600 leading-relaxed text-sm mb-3">
                    To build a globally competitive entrepreneurial ecosystem for Bangladesh through research-driven policy innovation, digital transformation, and sustainable economic development.
                </p>
                <p class="text-slate-600 leading-relaxed text-sm">
                    We envision Bangladesh as a leading innovation hub in South Asia, where evidence-based policies empower startups and every entrepreneur has access to the resources needed to transform ideas into impactful ventures.
                </p>
            </div>

            <!-- Mission Card -->
            <div class="bg-white p-6 rounded-sm shadow-md hover:shadow-2xl transition-shadow duration-300 border-t-4 border-teal-600 group">
                <div class="text-4xl mb-4">📌</div>
                <h3 class="text-xl font-bold text-slate-900 mb-3">Our Mission</h3>
                <ul class="space-y-2 text-slate-600 leading-relaxed text-sm">
                    <li>• Conduct high-quality research on entrepreneurship</li>
                    <li>• Develop policy frameworks for startups and SMEs</li>
                    <li>• Bridge gaps between academia and industry</li>
                    <li>• Train future leaders in digital economy</li>
                    <li>• Promote sustainable equitable growth</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Core Values -->
<section class="py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <div class="inline-block px-4 py-1 bg-blue-50 rounded-full mb-4">
                <span class="text-blue-900 text-sm font-semibold">Our Foundation</span>
            </div>
            <h2 class="text-4xl md:text-5xl font-bold text-slate-900 mb-6">Core Values</h2>
            <p class="text-lg text-slate-600">The principles that guide everything we do</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-5 gap-6">
            <div class="bg-white rounded-2xl p-8 text-center shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100 hover:border-blue-200 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl mx-auto mb-5 flex items-center justify-center text-3xl shadow-lg">
                    ⭐
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-3">Innovation</h3>
                <p class="text-slate-600 leading-relaxed">Bold thinking, creative solutions</p>
            </div>

            <div class="bg-white rounded-2xl p-8 text-center shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100 hover:border-teal-200 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-teal-500 to-teal-600 rounded-2xl mx-auto mb-5 flex items-center justify-center text-3xl shadow-lg">
                    🛡️
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-3">Integrity</h3>
                <p class="text-slate-600 leading-relaxed">Ethics and accountability</p>
            </div>

            <div class="bg-white rounded-2xl p-8 text-center shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100 hover:border-amber-200 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-amber-500 to-amber-600 rounded-2xl mx-auto mb-5 flex items-center justify-center text-3xl shadow-lg">
                    🤝
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-3">Inclusivity</h3>
                <p class="text-slate-600 leading-relaxed">Equal opportunities</p>
            </div>

            <div class="bg-white rounded-2xl p-8 text-center shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100 hover:border-blue-200 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-600 to-blue-700 rounded-2xl mx-auto mb-5 flex items-center justify-center text-3xl shadow-lg">
                    🎯
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-3">Impact</h3>
                <p class="text-slate-600 leading-relaxed">Meaningful outcomes</p>
            </div>

            <div class="bg-white rounded-2xl p-8 text-center shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100 hover:border-teal-200 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-teal-600 to-blue-600 rounded-2xl mx-auto mb-5 flex items-center justify-center text-3xl shadow-lg">
                    🧭
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-3">Collaboration</h3>
                <p class="text-slate-600 leading-relaxed">Partnership-driven</p>
            </div>
        </div>
    </div>
</section>

<!-- What We Do -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-end mb-12 border-b border-slate-100 pb-4">
            <div>
                <span class="text-teal-600 font-bold tracking-wider uppercase text-sm">Our Services</span>
                <h2 class="text-3xl font-bold text-slate-900 mt-2">What We Do</h2>
            </div>
        </div>

        <div class="space-y-6">
            <!-- Policy & Economic Research -->
            <div class="p-6 bg-slate-50 rounded-sm border border-slate-100 hover:border-blue-200 transition-colors">
                <div class="flex items-start gap-6">
                    <div class="flex-shrink-0 w-16 h-16 bg-blue-100 rounded-sm flex items-center justify-center text-3xl">
                        📊
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-slate-900 mb-2">Policy & Economic Research</h3>
                        <p class="text-slate-700">Conducting research on entrepreneurship policies, market ecosystems, digital governance, and socio-economic trends — supporting evidence-based decision-making.</p>
                    </div>
                </div>
            </div>

            <!-- Innovation & Entrepreneurship Development -->
            <div class="p-6 bg-slate-50 rounded-sm border border-slate-100 hover:border-teal-200 transition-colors">
                <div class="flex items-start gap-6">
                    <div class="flex-shrink-0 w-16 h-16 bg-teal-100 rounded-sm flex items-center justify-center text-3xl">
                        💡
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-slate-900 mb-2">Innovation & Entrepreneurship Development</h3>
                        <p class="text-slate-700">Strengthening youth innovators and startups through incubators, accelerators, business model development, and hands-on mentorship.</p>
                    </div>
                </div>
            </div>

            <!-- Skill Development & Training -->
            <div class="p-6 bg-slate-50 rounded-sm border border-slate-100 hover:border-amber-200 transition-colors">
                <div class="flex items-start gap-6">
                    <div class="flex-shrink-0 w-16 h-16 bg-amber-100 rounded-sm flex items-center justify-center text-3xl">
                        🎓
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-slate-900 mb-2">Skill Development & Training</h3>
                        <p class="text-slate-700">Offering capacity-building programs, certification courses, and workshops for future-ready skills and leadership in the digital economy.</p>
                    </div>
                </div>
            </div>

            <!-- Public Policy Advisory -->
            <div class="p-6 bg-slate-50 rounded-sm border border-slate-100 hover:border-blue-200 transition-colors">
                <div class="flex items-start gap-6">
                    <div class="flex-shrink-0 w-16 h-16 bg-blue-100 rounded-sm flex items-center justify-center text-3xl">
                        🏛️
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-slate-900 mb-2">Public Policy Advisory & Advocacy</h3>
                        <p class="text-slate-700">Collaborating with government bodies, NGOs, and private institutions to design policies ensuring sustainable economic growth.</p>
                    </div>
                </div>
            </div>

            <!-- Community & Ecosystem Building -->
            <div class="p-6 bg-slate-50 rounded-sm border border-slate-100 hover:border-teal-200 transition-colors">
                <div class="flex items-start gap-6">
                    <div class="flex-shrink-0 w-16 h-16 bg-teal-100 rounded-sm flex items-center justify-center text-3xl">
                        🌐
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-slate-900 mb-2">Community & Ecosystem Building</h3>
                        <p class="text-slate-700">Organizing national competitions, seminars, roundtables, publications, and networking events to nurture a strong entrepreneurial culture.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Programs & Initiatives -->
<section class="py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <div class="inline-block px-4 py-1 bg-blue-50 rounded-full mb-4">
                <span class="text-blue-900 text-sm font-semibold">Our Initiatives</span>
            </div>
            <h2 class="text-4xl md:text-5xl font-bold text-slate-900 mb-6">Programs & Initiatives</h2>
            <p class="text-lg text-slate-600">Transforming ideas into impact through structured programs</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100 hover:border-blue-200 transform hover:-translate-y-1">
                <div class="w-14 h-14 bg-blue-50 rounded-xl flex items-center justify-center text-3xl mb-6">
                    📘
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-5">Research & Publications</h3>
                <ul class="space-y-3 text-slate-600">
                    <li class="flex items-start">
                        <span class="text-blue-500 mr-2">•</span>
                        <span>Annual Bangladesh Entrepreneurship Policy Report</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-blue-500 mr-2">•</span>
                        <span>Startup Ecosystem Index</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-blue-500 mr-2">•</span>
                        <span>Digital Transformation Study</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-blue-500 mr-2">•</span>
                        <span>Women Entrepreneurship Report</span>
                    </li>
                </ul>
            </div>

            <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100 hover:border-teal-200 transform hover:-translate-y-1">
                <div class="w-14 h-14 bg-teal-50 rounded-xl flex items-center justify-center text-3xl mb-6">
                    🎓
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-5">Training & Certification</h3>
                <ul class="space-y-3 text-slate-600">
                    <li class="flex items-start">
                        <span class="text-teal-500 mr-2">•</span>
                        <span>Entrepreneurship & Business Model Masterclass</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-teal-500 mr-2">•</span>
                        <span>Digital Innovation Certificate</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-teal-500 mr-2">•</span>
                        <span>AI & Future Skills Program</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-teal-500 mr-2">•</span>
                        <span>Startup Legal Framework Training</span>
                    </li>
                </ul>
            </div>

            <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100 hover:border-amber-200 transform hover:-translate-y-1">
                <div class="w-14 h-14 bg-amber-50 rounded-xl flex items-center justify-center text-3xl mb-6">
                    💡
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-5">Innovation Programs</h3>
                <ul class="space-y-3 text-slate-600">
                    <li class="flex items-start">
                        <span class="text-amber-500 mr-2">•</span>
                        <span>CEPIRD Innovation Lab</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-amber-500 mr-2">•</span>
                        <span>Youth Startup Accelerator</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-amber-500 mr-2">•</span>
                        <span>National Policy Hackathon</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-amber-500 mr-2">•</span>
                        <span>Research Fellowship</span>
                    </li>
                </ul>
            </div>

            <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100 hover:border-blue-200 transform hover:-translate-y-1">
                <div class="w-14 h-14 bg-blue-50 rounded-xl flex items-center justify-center text-3xl mb-6">
                    📣
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-5">Conferences & Events</h3>
                <ul class="space-y-3 text-slate-600">
                    <li class="flex items-start">
                        <span class="text-blue-500 mr-2">•</span>
                        <span>Entrepreneurship Policy Summit</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-blue-500 mr-2">•</span>
                        <span>Innovation Leadership Forum</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-blue-500 mr-2">•</span>
                        <span>Digital Economy Conference</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-blue-500 mr-2">•</span>
                        <span>Women in Innovation Expo</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Founder Section -->
{{-- <section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <div class="inline-block px-4 py-1 bg-blue-50 rounded-full mb-4">
                <span class="text-blue-900 text-sm font-semibold">Leadership</span>
            </div>
            <h2 class="text-4xl md:text-5xl font-bold text-slate-900 mb-6">Meet Our Founder</h2>
        </div>

        <div class="max-w-5xl mx-auto">
            <div class="bg-gradient-to-br from-slate-900 via-blue-900 to-slate-900 shadow-2xl overflow-hidden">
                <div class="p-12 md:p-16">
                    <div class="flex flex-col md:flex-row gap-12 items-center md:items-start">
                        <div class="flex-shrink-0">
                            <div class="w-48 h-48 rounded-2xl bg-gradient-to-br from-teal-400 via-blue-500 to-blue-600 flex items-center justify-center shadow-2xl transform hover:scale-105 transition-transform duration-300">
                                <span class="text-8xl">👤</span>
                            </div>
                        </div>
                        <div class="flex-1 text-white">
                            <h3 class="text-3xl md:text-4xl font-bold mb-2">Mohammad Shahriar Khan</h3>
                            <p class="text-teal-300 text-lg mb-6">Founder, CEPIRD</p>
                            <div class="flex flex-wrap gap-3 mb-8">
                                <span class="px-4 py-1.5 bg-white/10 backdrop-blur-sm rounded-full text-sm border border-white/20">Entrepreneur</span>
                                <span class="px-4 py-1.5 bg-white/10 backdrop-blur-sm rounded-full text-sm border border-white/20">Ecosystem Builder</span>
                                <span class="px-4 py-1.5 bg-white/10 backdrop-blur-sm rounded-full text-sm border border-white/20">Researcher</span>
                                <span class="px-4 py-1.5 bg-white/10 backdrop-blur-sm rounded-full text-sm border border-white/20">Policy Advocate</span>
                            </div>
                            <div class="space-y-5 text-slate-300 leading-relaxed">
                                <p>
                                    A visionary leader committed to transforming Bangladesh's entrepreneurial and digital landscape. As the founder of NexKraft Limited, ICT Olympiad Bangladesh, Entrepreneurs Club of Bangladesh, and several innovation-driven initiatives, he has been a catalyst for youth empowerment, technology adoption, and sustainable development.
                                </p>
                                <p>
                                    With more than <span class="text-white font-semibold">14 years of experience</span> in entrepreneurship, digital transformation, and ecosystem building, he continues to champion evidence-based policy, equitable development, and innovation-led growth.
                                </p>
                            </div>
                            <div class="mt-8 p-6 bg-white/5 backdrop-blur-sm rounded-xl border border-white/10">
                                <blockquote class="text-lg italic text-slate-200">
                                    "My vision is simple — to build a Bangladesh where innovation is accessible, entrepreneurship is encouraged, and policy supports every dreamer."
                                </blockquote>
                                <p class="text-right text-teal-300 mt-3 font-medium">— Mohammad Shahriar Khan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}

<!-- Contact Section -->
{{-- <section class="py-24 bg-gradient-to-br from-slate-50 to-blue-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <div class="inline-block px-4 py-1 bg-blue-50 rounded-full mb-4">
                <span class="text-blue-900 text-sm font-semibold">Get In Touch</span>
            </div>
            <h2 class="text-4xl md:text-5xl font-bold text-slate-900 mb-6">Contact Us</h2>
            <p class="text-lg text-slate-600">Let's work together to build a better future for Bangladesh</p>
        </div>

        <div class="max-w-3xl mx-auto">
            <div class="bg-white rounded-2xl p-10 shadow-lg border border-slate-100">
                <div class="space-y-6">
                    <div class="flex items-start gap-5">
                        <div class="flex-shrink-0 w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-2xl">
                            📍
                        </div>
                        <div>
                            <h4 class="font-semibold text-slate-900 mb-1">Head Office</h4>
                            <p class="text-slate-600">50 Lake Circus, Kalabagan<br>Dhaka 1209, Bangladesh</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-5">
                        <div class="flex-shrink-0 w-12 h-12 bg-teal-50 rounded-xl flex items-center justify-center text-2xl">
                            📧
                        </div>
                        <div>
                            <h4 class="font-semibold text-slate-900 mb-1">Email</h4>
                            <a href="mailto:hello.cepird@gmail.com" class="text-blue-600 hover:text-blue-700 transition-colors">hello.cepird@gmail.com</a>
                        </div>
                    </div>

                    <div class="flex items-start gap-5">
                        <div class="flex-shrink-0 w-12 h-12 bg-amber-50 rounded-xl flex items-center justify-center text-2xl">
                            📱
                        </div>
                        <div>
                            <h4 class="font-semibold text-slate-900 mb-1">Phone</h4>
                            <a href="tel:+8801776000008" class="text-blue-600 hover:text-blue-700 transition-colors">+880-1776000008</a>
                        </div>
                    </div>

                    <div class="flex items-start gap-5">
                        <div class="flex-shrink-0 w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-2xl">
                            🌐
                        </div>
                        <div>
                            <h4 class="font-semibold text-slate-900 mb-1">Website</h4>
                            <a href="https://www.cepird.com" class="text-blue-600 hover:text-blue-700 transition-colors">www.cepird.com</a>
                        </div>
                    </div>
                </div>

                <div class="mt-8 pt-8 border-t border-slate-100 text-center">
                    <a href="#" class="inline-block bg-gradient-to-r from-blue-900 to-teal-600 text-white font-bold px-8 py-4 rounded-xl hover:opacity-90 transition-all shadow-lg">
                        Get Involved
                    </a>
                </div>
            </div>
        </div>
    </div>
</section> --}}

@endsection
