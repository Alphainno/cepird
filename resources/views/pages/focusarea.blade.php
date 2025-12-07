@extends('layouts.app')

@section('title', 'Core Focus Areas - CEPIRD')

@section('content')

<!-- Hero Section -->
<section class="relative bg-white pt-32 pb-28 overflow-hidden mt-20 z-10">
    <div class="absolute inset-0">
        <img src="{{ $heroSection ? asset('storage/' . $heroSection->background_image) : 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=1200&auto=format&fit=crop&q=80' }}"
             alt="Team collaboration"
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-slate-900/95 via-slate-900/90 to-blue-900/85"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="text-center max-w-5xl mx-auto">
            <span class="text-teal-300 font-bold tracking-wider uppercase text-sm">{{ $heroSection ? $heroSection->subtitle : 'Our Strategic Focus' }}</span>
            <h1 class="text-5xl md:text-6xl font-bold mt-3 mb-6 leading-tight tracking-tight text-white">
                {{ $heroSection ? $heroSection->title : 'Core Focus Areas' }}
            </h1>
            <p class="text-xl text-slate-200 mb-8 leading-relaxed font-light">
                {{ $heroSection ? $heroSection->description : 'CEPIRD operates at the critical intersection of policy, innovation, research, and entrepreneurship development.' }}
            </p>
        </div>
    </div>
</section>

<!-- Four Core Focus Areas -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col justify-center items-center mb-12 border-b border-slate-100 pb-4 w-full">
            <div class="text-center">
                <span class="text-teal-600 font-bold tracking-wider uppercase text-sm">{{ $strategicPillars->first()->badge_text ?? 'Our Strategic Pillars' }}</span>
                <h2 class="text-3xl font-bold text-slate-900 mt-2">{{ $strategicPillars->first()->section_title ?? 'Four Core Focus Areas' }}</h2>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            @forelse($strategicPillars ?? [] as $pillar)
            <div class="p-6 bg-white rounded-sm border border-slate-100 hover:border-{{ $pillar->color_theme }}-200 transition-colors group cursor-pointer">
                <div class="bg-{{ $pillar->color_theme }}-100 w-12 h-12 flex items-center justify-center rounded-sm mb-4 text-{{ $pillar->color_theme }}-900 text-xl group-hover:bg-{{ $pillar->color_theme }}-200 transition-colors">
                    {{ $pillar->icon }}
                </div>
                <h3 class="font-bold text-lg text-slate-900 mb-2">{{ $pillar->title }}</h3>
                <p class="text-sm text-slate-600 mb-4">{{ $pillar->description }}</p>
                <a href="{{ $pillar->link_href }}" class="text-{{ $pillar->color_theme }}-600 hover:text-{{ $pillar->color_theme }}-700 font-semibold text-sm flex items-center gap-2">
                    Learn More
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </a>
            </div>
            @empty
            <!-- Fallback: Policy Development -->
            <div class="p-6 bg-white rounded-sm border border-slate-100 hover:border-blue-200 transition-colors group cursor-pointer">
                <div class="bg-blue-100 w-12 h-12 flex items-center justify-center rounded-sm mb-4 text-blue-900 text-xl group-hover:bg-blue-200 transition-colors">
                    📋
                </div>
                <h3 class="font-bold text-lg text-slate-900 mb-2">Policy Development</h3>
                <p class="text-sm text-slate-600 mb-4">Evidence-based frameworks strengthening entrepreneurship and digital transformation.</p>
                <a href="#policy-development" class="text-blue-600 hover:text-blue-700 font-semibold text-sm flex items-center gap-2">
                    Learn More
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </a>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Detailed Section: Policy Development -->
<section id="policy-development" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div>
                <span class="text-blue-600 font-bold tracking-wider uppercase text-sm">Focus Area 1</span>
                <h2 class="text-4xl font-bold text-slate-900 mt-3 mb-6">Policy Development</h2>
                <p class="text-lg text-slate-700 mb-6 leading-relaxed">
                    CEPIRD designs <span class="font-semibold">evidence-based policy frameworks</span> that strengthen entrepreneurship ecosystems, accelerate digital transformation, and foster sustainable economic growth in Bangladesh.
                </p>

                <div class="space-y-4 mb-8">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-10 h-10 bg-blue-50 rounded-sm flex items-center justify-center text-lg">📈</div>
                        <div>
                            <h4 class="font-semibold text-slate-900">Digital Commerce Framework</h4>
                            <p class="text-slate-600 text-sm mt-1">Policies supporting e-commerce growth and digital payment systems</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-10 h-10 bg-blue-50 rounded-sm flex items-center justify-center text-lg">🤝</div>
                        <div>
                            <h4 class="font-semibold text-slate-900">SME Empowerment Policies</h4>
                            <p class="text-slate-600 text-sm mt-1">Frameworks ensuring small and medium enterprises can thrive and scale</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-10 h-10 bg-blue-50 rounded-sm flex items-center justify-center text-lg">🌱</div>
                        <div>
                            <h4 class="font-semibold text-slate-900">Startup Ecosystem Support</h4>
                            <p class="text-slate-600 text-sm mt-1">Policy interventions creating favorable conditions for startup growth</p>
                        </div>
                    </div>
                </div>

                <a href="#" class="inline-block px-8 py-3 bg-blue-900 text-white font-semibold rounded-sm hover:bg-blue-800 transition-colors">
                    Explore Policy Research
                </a>
            </div>
            <div class="relative">
                <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=600&auto=format&fit=crop&q=80"
                     alt="Policy Development"
                     class="rounded-sm shadow-lg w-full object-cover">
            </div>
        </div>
    </div>
</section>

<!-- Detailed Section: Technology Innovation -->
<section id="technology-innovation" class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="relative md:order-last">
                <img src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=600&auto=format&fit=crop&q=80"
                     alt="Technology Innovation"
                     class="rounded-sm shadow-lg w-full object-cover">
            </div>
            <div class="md:order-first">
                <span class="text-teal-600 font-bold tracking-wider uppercase text-sm">Focus Area 2</span>
                <h2 class="text-4xl font-bold text-slate-900 mt-3 mb-6">Technology-Enabled Innovation</h2>
                <p class="text-lg text-slate-700 mb-6 leading-relaxed">
                    We champion <span class="font-semibold">digital adoption and tech-driven solutions</span> that enable entrepreneurs to compete globally while solving local challenges through innovation.
                </p>

                <div class="space-y-4 mb-8">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-10 h-10 bg-teal-50 rounded-sm flex items-center justify-center text-lg">🤖</div>
                        <div>
                            <h4 class="font-semibold text-slate-900">AI & Machine Learning</h4>
                            <p class="text-slate-600 text-sm mt-1">Integrating AI solutions for business optimization and innovation</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-10 h-10 bg-teal-50 rounded-sm flex items-center justify-center text-lg">⛓️</div>
                        <div>
                            <h4 class="font-semibold text-slate-900">Blockchain Technology</h4>
                            <p class="text-slate-600 text-sm mt-1">Exploring blockchain for transparency, security, and trust</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-10 h-10 bg-teal-50 rounded-sm flex items-center justify-center text-lg">💻</div>
                        <div>
                            <h4 class="font-semibold text-slate-900">Digital Skills Training</h4>
                            <p class="text-slate-600 text-sm mt-1">Upskilling the workforce for future-ready tech careers</p>
                        </div>
                    </div>
                </div>

                <a href="#" class="inline-block px-8 py-3 bg-teal-600 text-white font-semibold rounded-sm hover:bg-teal-700 transition-colors">
                    Explore Tech Initiatives
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Detailed Section: Research -->
<section id="research" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div>
                <span class="text-amber-600 font-bold tracking-wider uppercase text-sm">Focus Area 3</span>
                <h2 class="text-4xl font-bold text-slate-900 mt-3 mb-6">Research</h2>
                <p class="text-lg text-slate-700 mb-6 leading-relaxed">
                    Our <span class="font-semibold">rigorous research initiatives</span> generate evidence-based insights that inform policy decisions, guide institutional strategies, and drive entrepreneurial innovation across Bangladesh.
                </p>

                <div class="space-y-4 mb-8">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-10 h-10 bg-amber-50 rounded-sm flex items-center justify-center text-lg">📚</div>
                        <div>
                            <h4 class="font-semibold text-slate-900">Annual Policy Reports</h4>
                            <p class="text-slate-600 text-sm mt-1">Comprehensive entrepreneurship policy analysis and recommendations</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-10 h-10 bg-amber-50 rounded-sm flex items-center justify-center text-lg">📊</div>
                        <div>
                            <h4 class="font-semibold text-slate-900">Ecosystem Index</h4>
                            <p class="text-slate-600 text-sm mt-1">Measuring startup ecosystem maturity and identifying growth opportunities</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-10 h-10 bg-amber-50 rounded-sm flex items-center justify-center text-lg">🎯</div>
                        <div>
                            <h4 class="font-semibold text-slate-900">Impact Studies</h4>
                            <p class="text-slate-600 text-sm mt-1">Evaluating socio-economic impact of entrepreneurship initiatives</p>
                        </div>
                    </div>
                </div>

                <a href="#" class="inline-block px-8 py-3 bg-amber-600 text-white font-semibold rounded-sm hover:bg-amber-700 transition-colors">
                    Explore Publications
                </a>
            </div>
            <div class="relative">
                <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=600&auto=format&fit=crop&q=80"
                     alt="Research"
                     class="rounded-sm shadow-lg w-full object-cover">
            </div>
        </div>
    </div>
</section>

<!-- Detailed Section: Entrepreneurship Support -->
<section id="entrepreneurship-support" class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="relative md:order-last">
                <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=600&auto=format&fit=crop&q=80"
                     alt="Entrepreneurship Support"
                     class="rounded-sm shadow-lg w-full object-cover">
            </div>
            <div class="md:order-first">
                <span class="text-indigo-600 font-bold tracking-wider uppercase text-sm">Focus Area 4</span>
                <h2 class="text-4xl font-bold text-slate-900 mt-3 mb-6">Entrepreneurship Support</h2>
                <p class="text-lg text-slate-700 mb-6 leading-relaxed">
                    We empower entrepreneurs and innovators with <span class="font-semibold">comprehensive support services</span> including mentorship, training, incubation, and ecosystem connectivity to transform ideas into thriving ventures.
                </p>

                <div class="space-y-4 mb-8">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-10 h-10 bg-indigo-50 rounded-sm flex items-center justify-center text-lg">🎓</div>
                        <div>
                            <h4 class="font-semibold text-slate-900">Entrepreneurship Training</h4>
                            <p class="text-slate-600 text-sm mt-1">Business model, finance, and leadership development programs</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-10 h-10 bg-indigo-50 rounded-sm flex items-center justify-center text-lg">🏢</div>
                        <div>
                            <h4 class="font-semibold text-slate-900">Incubation Programs</h4>
                            <p class="text-slate-600 text-sm mt-1">Structured support from ideation to market launch and beyond</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-10 h-10 bg-indigo-50 rounded-sm flex items-center justify-center text-lg">🤝</div>
                        <div>
                            <h4 class="font-semibold text-slate-900">Mentorship & Networking</h4>
                            <p class="text-slate-600 text-sm mt-1">Connecting entrepreneurs with industry experts and investors</p>
                        </div>
                    </div>
                </div>

                <a href="#" class="inline-block px-8 py-3 bg-indigo-600 text-white font-semibold rounded-sm hover:bg-indigo-700 transition-colors">
                    Explore Support Programs
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Key Deliverables -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-teal-600 font-bold tracking-wider uppercase text-sm">Key Outcomes</span>
            <h2 class="text-3xl font-bold text-slate-900 mt-2 mb-6">What We Deliver</h2>
            <p class="text-lg text-slate-600 max-w-3xl mx-auto">
                Our focus areas translate into concrete deliverables that drive real impact across Bangladesh's entrepreneurial ecosystem.
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Deliverable 1 -->
            <div class="p-6 bg-blue-50 rounded-sm border border-blue-200">
                <div class="text-3xl mb-4">📋</div>
                <h3 class="font-bold text-slate-900 mb-2">Policy Frameworks</h3>
                <p class="text-sm text-slate-600">Actionable policy recommendations for government and institutions</p>
                <ul class="mt-4 space-y-2 text-xs text-slate-600">
                    <li>✓ Digital Transformation Strategy</li>
                    <li>✓ Startup Ecosystem Policy</li>
                    <li>✓ SME Development Guidelines</li>
                </ul>
            </div>

            <!-- Deliverable 2 -->
            <div class="p-6 bg-teal-50 rounded-sm border border-teal-200">
                <div class="text-3xl mb-4">💡</div>
                <h3 class="font-bold text-slate-900 mb-2">Technology Solutions</h3>
                <p class="text-sm text-slate-600">Innovative tech platforms and digital tools for entrepreneurs</p>
                <ul class="mt-4 space-y-2 text-xs text-slate-600">
                    <li>✓ AI-powered Business Tools</li>
                    <li>✓ Digital Skills Platform</li>
                    <li>✓ Entrepreneur Network App</li>
                </ul>
            </div>

            <!-- Deliverable 3 -->
            <div class="p-6 bg-amber-50 rounded-sm border border-amber-200">
                <div class="text-3xl mb-4">📊</div>
                <h3 class="font-bold text-slate-900 mb-2">Research Publications</h3>
                <p class="text-sm text-slate-600">Evidence-based insights and market analysis reports</p>
                <ul class="mt-4 space-y-2 text-xs text-slate-600">
                    <li>✓ Annual Policy Report</li>
                    <li>✓ Startup Ecosystem Index</li>
                    <li>✓ Market Research Studies</li>
                </ul>
            </div>

            <!-- Deliverable 4 -->
            <div class="p-6 bg-indigo-50 rounded-sm border border-indigo-200">
                <div class="text-3xl mb-4">🚀</div>
                <h3 class="font-bold text-slate-900 mb-2">Training & Mentorship</h3>
                <p class="text-sm text-slate-600">Comprehensive capacity-building for entrepreneurs and teams</p>
                <ul class="mt-4 space-y-2 text-xs text-slate-600">
                    <li>✓ Masterclasses & Workshops</li>
                    <li>✓ Mentorship Programs</li>
                    <li>✓ Certification Courses</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Impact Section -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-teal-600 font-bold tracking-wider uppercase text-sm">Our Impact</span>
            <h2 class="text-3xl font-bold text-slate-900 mt-2">Driving Change Across Bangladesh</h2>
        </div>

        <div class="grid md:grid-cols-4 gap-6">
            <div class="p-6 bg-white rounded-sm border border-slate-100 text-center">
                <div class="text-4xl font-bold text-blue-900 mb-2">500+</div>
                <p class="font-semibold text-slate-900">Entrepreneurs Supported</p>
                <p class="text-sm text-slate-600 mt-2">Through mentorship and training programs</p>
            </div>
            <div class="p-6 bg-white rounded-sm border border-slate-100 text-center">
                <div class="text-4xl font-bold text-teal-600 mb-2">50+</div>
                <p class="font-semibold text-slate-900">Research Studies</p>
                <p class="text-sm text-slate-600 mt-2">Evidence-based insights published</p>
            </div>
            <div class="p-6 bg-white rounded-sm border border-slate-100 text-center">
                <div class="text-4xl font-bold text-amber-600 mb-2">100+</div>
                <p class="font-semibold text-slate-900">Policy Recommendations</p>
                <p class="text-sm text-slate-600 mt-2">Submitted to government bodies</p>
            </div>
            <div class="p-6 bg-white rounded-sm border border-slate-100 text-center">
                <div class="text-4xl font-bold text-indigo-600 mb-2">200+</div>
                <p class="font-semibold text-slate-900">Tech Innovations</p>
                <p class="text-sm text-slate-600 mt-2">Accelerated and supported</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-br from-blue-900 to-teal-700 rounded-sm p-12 md:p-16 text-white text-center">
            <h2 class="text-4xl font-bold mb-6">Join Our Focus Areas</h2>
            <p class="text-lg text-blue-100 mb-10 max-w-3xl mx-auto">
                Whether you're a policymaker, researcher, entrepreneur, or innovator, there's a way for you to contribute to shaping Bangladesh's entrepreneurial future.
            </p>
            <div class="flex flex-col md:flex-row justify-center gap-4">
                <a href="#" class="px-8 py-4 bg-white text-blue-900 font-bold rounded-sm hover:bg-blue-50 transition-colors">
                    Get Involved
                </a>
                <a href="#" class="px-8 py-4 bg-blue-800 text-white font-bold rounded-sm hover:bg-blue-700 transition-colors border border-blue-600">
                    Learn More
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
