@extends('layouts.app')

@section('title', 'Founder - CEPIRD')

@section('content')

<!-- Hero Section -->
<section class="relative bg-white pt-32 pb-28 overflow-hidden mt-20">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1557804506-669a67965ba0?w=1200&auto=format&fit=crop&q=80"
             alt="Leadership and vision"
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-slate-900/95 via-slate-900/90 to-blue-900/85"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-5xl mx-auto">
            <span class="text-teal-300 font-bold tracking-wider uppercase text-sm">Leadership & Vision</span>
            <h1 class="text-5xl md:text-6xl font-bold mt-3 mb-6 leading-tight tracking-tight text-white">
                Meet Our Founder
            </h1>
            <p class="text-xl text-slate-200 mb-8 leading-relaxed font-light">
                A visionary entrepreneur and ecosystem builder driving Bangladesh's entrepreneurial transformation
            </p>
        </div>
    </div>
</section>

<!-- Founder Profile Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-6xl mx-auto">
            <div class="rounded-sm shadow-2xl overflow-hidden" style="background-color: #0f172a;">
                <div class="p-12 md:p-16">
                    <div class="flex flex-col md:flex-row gap-12 items-center md:items-start">
                        <div class="flex-shrink-0">
                            <div class="w-56 h-56 rounded-2xl bg-gradient-to-br from-teal-400 via-blue-500 to-blue-600 flex items-center justify-center shadow-2xl transform hover:scale-105 transition-transform duration-300">
                                <span class="text-9xl">👤</span>
                            </div>
                        </div>
                        <div class="flex-1 text-white">
                            <h2 class="text-4xl md:text-5xl font-bold mb-3">Mohammad Shahriar Khan</h2>
                            <p class="text-teal-300 text-xl mb-6">Founder & Visionary Leader, CEPIRD</p>
                            <div class="flex flex-wrap gap-3 mb-8">
                                <span class="px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-sm border border-white/20">Entrepreneur</span>
                                <span class="px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-sm border border-white/20">Ecosystem Builder</span>
                                <span class="px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-sm border border-white/20">Researcher</span>
                                <span class="px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-sm border border-white/20">Policy Advocate</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Biography Section -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-5xl mx-auto">
            <div class="mb-12">
                <span class="text-blue-600 font-bold tracking-wider uppercase text-sm">Biography</span>
                <h2 class="text-4xl font-bold text-slate-900 mt-3 mb-6">A Journey of Innovation and Impact</h2>
            </div>

            <div class="prose prose-lg max-w-none">
                <div class="bg-white p-8 rounded-sm shadow-sm border border-slate-200 mb-8">
                    <p class="text-lg text-slate-700 leading-relaxed mb-6">
                        Mohammad Shahriar Khan is a visionary leader committed to transforming Bangladesh's entrepreneurial and digital landscape. With more than <span class="font-semibold text-slate-900">14 years of experience</span> in entrepreneurship, digital transformation, and ecosystem building, he has established himself as a catalyst for youth empowerment, technology adoption, and sustainable development.
                    </p>
                    <p class="text-lg text-slate-700 leading-relaxed mb-6">
                        As the founder of <span class="font-semibold text-blue-900">CEPIRD</span> (Center for Entrepreneurial Policy, Innovation, Research & Development), Mohammad Shahriar Khan envisioned creating a national platform where research meets real-world impact—connecting policymakers, entrepreneurs, educators, and innovators to design sustainable strategies for emerging economies.
                    </p>
                    <p class="text-lg text-slate-700 leading-relaxed">
                        His entrepreneurial journey extends beyond CEPIRD. He is also the founder of <span class="font-semibold text-slate-900">NexKraft Limited</span>, <span class="font-semibold text-slate-900">ICT Olympiad Bangladesh</span>, <span class="font-semibold text-slate-900">Entrepreneurs Club of Bangladesh</span>, and several other innovation-driven initiatives that have collectively impacted thousands of young entrepreneurs, students, and professionals across the country.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Vision & Philosophy -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-5xl mx-auto">
            <div class="text-center mb-12">
                <span class="text-teal-600 font-bold tracking-wider uppercase text-sm">Philosophy</span>
                <h2 class="text-4xl font-bold text-slate-900 mt-3 mb-6">Vision for Bangladesh</h2>
            </div>

            <div class="bg-gradient-to-br from-blue-900 via-slate-900 to-teal-800 rounded-sm p-12 md:p-16 text-white shadow-2xl">
                <div class="text-center mb-8">
                    <div class="text-6xl mb-6">💭</div>
                </div>
                <blockquote class="text-2xl md:text-3xl italic text-center text-slate-100 mb-8 leading-relaxed">
                    "My vision is simple — to build a Bangladesh where innovation is accessible, entrepreneurship is encouraged, and policy supports every dreamer."
                </blockquote>
                <p class="text-right text-teal-300 text-xl font-medium">— Mohammad Shahriar Khan</p>
            </div>

            <div class="mt-12 grid md:grid-cols-3 gap-6">
                <div class="bg-blue-50 p-6 rounded-sm border border-blue-200">
                    <h3 class="font-bold text-lg text-slate-900 mb-3">Accessibility</h3>
                    <p class="text-slate-600">Making innovation and entrepreneurship accessible to every aspiring entrepreneur, regardless of background.</p>
                </div>
                <div class="bg-teal-50 p-6 rounded-sm border border-teal-200">
                    <h3 class="font-bold text-lg text-slate-900 mb-3">Encouragement</h3>
                    <p class="text-slate-600">Creating an environment that encourages risk-taking, experimentation, and entrepreneurial thinking.</p>
                </div>
                <div class="bg-blue-50 p-6 rounded-sm border border-blue-200">
                    <h3 class="font-bold text-lg text-slate-900 mb-3">Policy Support</h3>
                    <p class="text-slate-600">Advocating for evidence-based policies that empower startups and strengthen the entrepreneurial ecosystem.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Key Initiatives -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-5xl mx-auto">
            <div class="mb-12">
                <span class="text-amber-600 font-bold tracking-wider uppercase text-sm">Entrepreneurial Ventures</span>
                <h2 class="text-4xl font-bold text-slate-900 mt-3 mb-6">Founded Organizations</h2>
                <p class="text-lg text-slate-600">Leading multiple initiatives that drive innovation, education, and entrepreneurial development across Bangladesh</p>
            </div>

            <div class="space-y-6">
                <!-- CEPIRD -->
                <div class="bg-white p-8 rounded-sm border border-slate-200 hover:border-blue-300 transition-all shadow-sm hover:shadow-md">
                    <div class="flex items-start gap-6">
                        <div class="flex-shrink-0 w-16 h-16 bg-blue-100 rounded-sm flex items-center justify-center text-3xl">
                            🏛️
                        </div>
                        <div class="flex-1">
                            <h3 class="text-2xl font-bold text-slate-900 mb-2">CEPIRD</h3>
                            <p class="text-sm text-blue-600 mb-3 font-semibold">Center for Entrepreneurial Policy, Innovation, Research & Development</p>
                            <p class="text-slate-600 leading-relaxed">National initiative shaping entrepreneurship policy, fostering innovation, and driving socio-economic transformation through research-driven strategies and ecosystem development.</p>
                        </div>
                    </div>
                </div>

                <!-- NexKraft Limited -->
                <div class="bg-white p-8 rounded-sm border border-slate-200 hover:border-teal-300 transition-all shadow-sm hover:shadow-md">
                    <div class="flex items-start gap-6">
                        <div class="flex-shrink-0 w-16 h-16 bg-teal-100 rounded-sm flex items-center justify-center text-3xl">
                            💼
                        </div>
                        <div class="flex-1">
                            <h3 class="text-2xl font-bold text-slate-900 mb-2">NexKraft Limited</h3>
                            <p class="text-sm text-teal-600 mb-3 font-semibold">Technology & Digital Solutions</p>
                            <p class="text-slate-600 leading-relaxed">Technology-driven company providing innovative digital solutions, software development, and IT consulting services to businesses and organizations.</p>
                        </div>
                    </div>
                </div>

                <!-- ICT Olympiad Bangladesh -->
                <div class="bg-white p-8 rounded-sm border border-slate-200 hover:border-amber-300 transition-all shadow-sm hover:shadow-md">
                    <div class="flex items-start gap-6">
                        <div class="flex-shrink-0 w-16 h-16 bg-amber-100 rounded-sm flex items-center justify-center text-3xl">
                            🏆
                        </div>
                        <div class="flex-1">
                            <h3 class="text-2xl font-bold text-slate-900 mb-2">ICT Olympiad Bangladesh</h3>
                            <p class="text-sm text-amber-600 mb-3 font-semibold">National Technology Competition Platform</p>
                            <p class="text-slate-600 leading-relaxed">Nationwide competition promoting ICT skills, coding, and problem-solving among students, inspiring the next generation of tech innovators and digital leaders.</p>
                        </div>
                    </div>
                </div>

                <!-- Entrepreneurs Club of Bangladesh -->
                <div class="bg-white p-8 rounded-sm border border-slate-200 hover:border-blue-300 transition-all shadow-sm hover:shadow-md">
                    <div class="flex items-start gap-6">
                        <div class="flex-shrink-0 w-16 h-16 bg-blue-100 rounded-sm flex items-center justify-center text-3xl">
                            🤝
                        </div>
                        <div class="flex-1">
                            <h3 class="text-2xl font-bold text-slate-900 mb-2">Entrepreneurs Club of Bangladesh</h3>
                            <p class="text-sm text-blue-600 mb-3 font-semibold">Entrepreneurship Community & Network</p>
                            <p class="text-slate-600 leading-relaxed">Community platform connecting entrepreneurs, providing mentorship, networking opportunities, and resources to support startup growth and business development.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Expertise & Focus Areas -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-5xl mx-auto">
            <div class="text-center mb-12">
                <span class="text-blue-600 font-bold tracking-wider uppercase text-sm">Core Expertise</span>
                <h2 class="text-4xl font-bold text-slate-900 mt-3 mb-6">Areas of Focus</h2>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div class="bg-slate-50 p-6 rounded-sm border border-slate-200">
                    <div class="flex items-start gap-4 mb-3">
                        <div class="w-10 h-10 bg-blue-100 rounded-sm flex items-center justify-center text-xl flex-shrink-0">📋</div>
                        <h3 class="text-xl font-bold text-slate-900">Policy Innovation</h3>
                    </div>
                    <p class="text-slate-600">Developing evidence-based policy frameworks that strengthen entrepreneurial ecosystems and drive sustainable economic growth.</p>
                </div>

                <div class="bg-slate-50 p-6 rounded-sm border border-slate-200">
                    <div class="flex items-start gap-4 mb-3">
                        <div class="w-10 h-10 bg-teal-100 rounded-sm flex items-center justify-center text-xl flex-shrink-0">💡</div>
                        <h3 class="text-xl font-bold text-slate-900">Digital Transformation</h3>
                    </div>
                    <p class="text-slate-600">Championing technology adoption and digital innovation to position Bangladesh as a competitive player in the global economy.</p>
                </div>

                <div class="bg-slate-50 p-6 rounded-sm border border-slate-200">
                    <div class="flex items-start gap-4 mb-3">
                        <div class="w-10 h-10 bg-amber-100 rounded-sm flex items-center justify-center text-xl flex-shrink-0">🎓</div>
                        <h3 class="text-xl font-bold text-slate-900">Youth Empowerment</h3>
                    </div>
                    <p class="text-slate-600">Training and mentoring young entrepreneurs, equipping them with skills and knowledge for success in the digital age.</p>
                </div>

                <div class="bg-slate-50 p-6 rounded-sm border border-slate-200">
                    <div class="flex items-start gap-4 mb-3">
                        <div class="w-10 h-10 bg-blue-100 rounded-sm flex items-center justify-center text-xl flex-shrink-0">🌱</div>
                        <h3 class="text-xl font-bold text-slate-900">Ecosystem Building</h3>
                    </div>
                    <p class="text-slate-600">Creating platforms and networks that connect entrepreneurs, investors, policymakers, and institutions for collaborative growth.</p>
                </div>

                <div class="bg-slate-50 p-6 rounded-sm border border-slate-200">
                    <div class="flex items-start gap-4 mb-3">
                        <div class="w-10 h-10 bg-teal-100 rounded-sm flex items-center justify-center text-xl flex-shrink-0">📊</div>
                        <h3 class="text-xl font-bold text-slate-900">Research & Analysis</h3>
                    </div>
                    <p class="text-slate-600">Conducting in-depth research on entrepreneurship trends, market dynamics, and policy impacts to inform strategic decisions.</p>
                </div>

                <div class="bg-slate-50 p-6 rounded-sm border border-slate-200">
                    <div class="flex items-start gap-4 mb-3">
                        <div class="w-10 h-10 bg-amber-100 rounded-sm flex items-center justify-center text-xl flex-shrink-0">🌍</div>
                        <h3 class="text-xl font-bold text-slate-900">Sustainable Development</h3>
                    </div>
                    <p class="text-slate-600">Promoting equitable and sustainable economic development that benefits all segments of society.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Impact Statistics -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-teal-600 font-bold tracking-wider uppercase text-sm">Leadership Impact</span>
            <h2 class="text-4xl font-bold text-slate-900 mt-3 mb-6">Driving Measurable Change</h2>
            <p class="text-lg text-slate-600 max-w-3xl mx-auto">
                Over 14 years of impactful work in entrepreneurship, innovation, and ecosystem development
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white p-8 rounded-sm border border-slate-200 text-center shadow-sm hover:shadow-md transition-all">
                <div class="text-5xl font-bold text-blue-900 mb-2">14+</div>
                <p class="font-semibold text-slate-900 mb-1">Years of Experience</p>
                <p class="text-sm text-slate-600">In entrepreneurship & ecosystem building</p>
            </div>
            <div class="bg-white p-8 rounded-sm border border-slate-200 text-center shadow-sm hover:shadow-md transition-all">
                <div class="text-5xl font-bold text-teal-900 mb-2">5+</div>
                <p class="font-semibold text-slate-900 mb-1">Organizations Founded</p>
                <p class="text-sm text-slate-600">Driving innovation and development</p>
            </div>
            <div class="bg-white p-8 rounded-sm border border-slate-200 text-center shadow-sm hover:shadow-md transition-all">
                <div class="text-5xl font-bold text-amber-900 mb-2">1000+</div>
                <p class="font-semibold text-slate-900 mb-1">Entrepreneurs Impacted</p>
                <p class="text-sm text-slate-600">Through programs and initiatives</p>
            </div>
            <div class="bg-white p-8 rounded-sm border border-slate-200 text-center shadow-sm hover:shadow-md transition-all">
                <div class="text-5xl font-bold text-blue-900 mb-2">50+</div>
                <p class="font-semibold text-slate-900 mb-1">Policy Contributions</p>
                <p class="text-sm text-slate-600">Research reports and recommendations</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="rounded-sm p-12 md:p-16 text-white text-center shadow-2xl" style="background-color: #0f172a;">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">Connect with Our Founder</h2>
            <p class="text-xl text-blue-100 mb-10 max-w-3xl mx-auto leading-relaxed">
                Interested in collaboration, partnership, or learning more about our initiatives? Reach out to explore opportunities together.
            </p>
            <div class="flex flex-col md:flex-row justify-center gap-4">
                <a href="#" class="px-10 py-4 bg-white text-blue-900 font-bold rounded-sm hover:bg-blue-50 transition-colors text-lg">
                    Get in Touch
                </a>
                <a href="{{ route('about') }}" class="px-10 py-4 bg-teal-600 text-white font-bold rounded-sm hover:bg-teal-700 transition-colors border border-teal-500 text-lg">
                    Learn About CEPIRD
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
