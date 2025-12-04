@extends('layouts.app')

@section('title', 'Programs & Initiatives - CEPIRD')

@section('content')

<!-- Hero Section -->
<section class="relative bg-white pt-32 pb-28 overflow-hidden mt-20">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=1200&auto=format&fit=crop&q=80"
             alt="Programs and initiatives"
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-slate-900/95 via-slate-900/90 to-teal-900/85"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-5xl mx-auto">
            <span class="text-teal-300 font-bold tracking-wider uppercase text-sm">Empowering Ideas. Influencing Policy. Impacting the Future.</span>
            <h1 class="text-5xl md:text-6xl font-bold mt-3 mb-6 leading-tight tracking-tight text-white">
                Programs & Initiatives
            </h1>
            <p class="text-xl text-slate-200 mb-8 leading-relaxed font-light">
                CEPIRD's comprehensive programs drive research, innovation, entrepreneurship development, and policy transformation across Bangladesh.
            </p>
        </div>
    </div>
</section>

<!-- Programs Overview -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-teal-600 font-bold tracking-wider uppercase text-sm">Our Impact Initiatives</span>
            <h2 class="text-4xl font-bold text-slate-900 mt-2 mb-6">Four Core Program Areas</h2>
            <p class="text-lg text-slate-600 max-w-3xl mx-auto">
                From cutting-edge research to hands-on entrepreneurship support, our programs are designed to create measurable impact across Bangladesh's innovation ecosystem.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">
            <!-- Program Category 1 -->
            <div class="p-6 bg-white rounded-sm border border-slate-100 hover:border-blue-200 transition-all group cursor-pointer hover:shadow-lg">
                <div class="bg-blue-100 w-14 h-14 flex items-center justify-center rounded-sm mb-4 text-2xl group-hover:bg-blue-200 transition-colors">
                    📘
                </div>
                <h3 class="font-bold text-xl text-slate-900 mb-2">Research & Publications</h3>
                <p class="text-sm text-slate-600 mb-4">Evidence-based research driving policy innovation and entrepreneurial development.</p>
                <a href="#research-publications" class="text-blue-600 hover:text-blue-700 font-semibold text-sm flex items-center gap-2">
                    View Programs
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </a>
            </div>

            <!-- Program Category 2 -->
            <div class="p-6 bg-white rounded-sm border border-slate-100 hover:border-teal-200 transition-all group cursor-pointer hover:shadow-lg">
                <div class="bg-teal-100 w-14 h-14 flex items-center justify-center rounded-sm mb-4 text-2xl group-hover:bg-teal-200 transition-colors">
                    🎓
                </div>
                <h3 class="font-bold text-xl text-slate-900 mb-2">Training & Certification</h3>
                <p class="text-sm text-slate-600 mb-4">Building future-ready skills and leadership for a digital economy.</p>
                <a href="#training-certification" class="text-teal-600 hover:text-teal-700 font-semibold text-sm flex items-center gap-2">
                    View Programs
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </a>
            </div>

            <!-- Program Category 3 -->
            <div class="p-6 bg-white rounded-sm border border-slate-100 hover:border-amber-200 transition-all group cursor-pointer hover:shadow-lg">
                <div class="bg-amber-100 w-14 h-14 flex items-center justify-center rounded-sm mb-4 text-2xl group-hover:bg-amber-200 transition-colors">
                    💡
                </div>
                <h3 class="font-bold text-xl text-slate-900 mb-2">Innovation Programs</h3>
                <p class="text-sm text-slate-600 mb-4">Accelerating startups and fostering youth-led innovation.</p>
                <a href="#innovation-programs" class="text-amber-600 hover:text-amber-700 font-semibold text-sm flex items-center gap-2">
                    View Programs
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </a>
            </div>

            <!-- Program Category 4 -->
            <div class="p-6 bg-white rounded-sm border border-slate-100 hover:border-indigo-200 transition-all group cursor-pointer hover:shadow-lg">
                <div class="bg-indigo-100 w-14 h-14 flex items-center justify-center rounded-sm mb-4 text-2xl group-hover:bg-indigo-200 transition-colors">
                    📣
                </div>
                <h3 class="font-bold text-xl text-slate-900 mb-2">Conferences & Events</h3>
                <p class="text-sm text-slate-600 mb-4">National-level summits connecting stakeholders and thought leaders.</p>
                <a href="#conferences-events" class="text-indigo-600 hover:text-indigo-700 font-semibold text-sm flex items-center gap-2">
                    View Programs
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Research & Publications -->
<section id="research-publications" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-12">
            <span class="text-blue-600 font-bold tracking-wider uppercase text-sm">Program Area 1</span>
            <h2 class="text-4xl font-bold text-slate-900 mt-3 mb-4">Research & Publications</h2>
            <p class="text-lg text-slate-600 max-w-4xl">
                Our research initiatives provide evidence-based insights that guide policymakers, institutions, and entrepreneurs toward sustainable economic growth and innovation-led development.
            </p>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            <!-- Research Program 1 -->
            <div class="bg-slate-50 p-8 rounded-sm border border-slate-200 hover:border-blue-300 transition-all">
                <div class="flex items-start gap-4 mb-4">
                    <div class="bg-blue-100 w-12 h-12 flex items-center justify-center rounded-sm text-xl flex-shrink-0">📊</div>
                    <div>
                        <h3 class="font-bold text-xl text-slate-900 mb-2">Annual Bangladesh Entrepreneurship Policy Report</h3>
                        <span class="inline-block px-3 py-1 bg-blue-100 text-blue-800 text-xs font-semibold rounded-full mb-3">Annual Publication</span>
                    </div>
                </div>
                <p class="text-slate-600 mb-4 leading-relaxed">
                    Comprehensive analysis of Bangladesh's entrepreneurship ecosystem, policy frameworks, challenges, and strategic recommendations for government and private sector stakeholders.
                </p>
                <div class="border-t border-slate-200 pt-4">
                    <h4 class="font-semibold text-sm text-slate-900 mb-2">Key Focus Areas:</h4>
                    <ul class="space-y-2 text-sm text-slate-600">
                        <li class="flex items-start gap-2">
                            <span class="text-blue-600 mt-1">✓</span>
                            <span>Policy landscape analysis and recommendations</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-blue-600 mt-1">✓</span>
                            <span>Startup ecosystem maturity assessment</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-blue-600 mt-1">✓</span>
                            <span>Investment trends and funding ecosystem</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-blue-600 mt-1">✓</span>
                            <span>Comparative global benchmarking</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Research Program 2 -->
            <div class="bg-slate-50 p-8 rounded-sm border border-slate-200 hover:border-blue-300 transition-all">
                <div class="flex items-start gap-4 mb-4">
                    <div class="bg-blue-100 w-12 h-12 flex items-center justify-center rounded-sm text-xl flex-shrink-0">📈</div>
                    <div>
                        <h3 class="font-bold text-xl text-slate-900 mb-2">Startup Ecosystem Index</h3>
                        <span class="inline-block px-3 py-1 bg-blue-100 text-blue-800 text-xs font-semibold rounded-full mb-3">Bi-annual Study</span>
                    </div>
                </div>
                <p class="text-slate-600 mb-4 leading-relaxed">
                    Quantitative and qualitative measurement of Bangladesh's startup ecosystem health, identifying strengths, weaknesses, and opportunities for strategic growth.
                </p>
                <div class="border-t border-slate-200 pt-4">
                    <h4 class="font-semibold text-sm text-slate-900 mb-2">Index Components:</h4>
                    <ul class="space-y-2 text-sm text-slate-600">
                        <li class="flex items-start gap-2">
                            <span class="text-blue-600 mt-1">✓</span>
                            <span>Regulatory environment & ease of doing business</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-blue-600 mt-1">✓</span>
                            <span>Access to funding and investor readiness</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-blue-600 mt-1">✓</span>
                            <span>Talent pool and skill availability</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-blue-600 mt-1">✓</span>
                            <span>Infrastructure and market accessibility</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Research Program 3 -->
            <div class="bg-slate-50 p-8 rounded-sm border border-slate-200 hover:border-blue-300 transition-all">
                <div class="flex items-start gap-4 mb-4">
                    <div class="bg-blue-100 w-12 h-12 flex items-center justify-center rounded-sm text-xl flex-shrink-0">💻</div>
                    <div>
                        <h3 class="font-bold text-xl text-slate-900 mb-2">Digital Transformation Readiness Study</h3>
                        <span class="inline-block px-3 py-1 bg-blue-100 text-blue-800 text-xs font-semibold rounded-full mb-3">Ongoing Research</span>
                    </div>
                </div>
                <p class="text-slate-600 mb-4 leading-relaxed">
                    Evaluating Bangladesh's preparedness for digital economy transition, analyzing technology adoption, digital literacy, and infrastructure readiness across sectors.
                </p>
                <div class="border-t border-slate-200 pt-4">
                    <h4 class="font-semibold text-sm text-slate-900 mb-2">Research Pillars:</h4>
                    <ul class="space-y-2 text-sm text-slate-600">
                        <li class="flex items-start gap-2">
                            <span class="text-blue-600 mt-1">✓</span>
                            <span>Digital infrastructure and connectivity</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-blue-600 mt-1">✓</span>
                            <span>Industry-wise technology adoption rates</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-blue-600 mt-1">✓</span>
                            <span>Digital skills gap analysis</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-blue-600 mt-1">✓</span>
                            <span>Future-ready workforce readiness</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Research Program 4 -->
            <div class="bg-slate-50 p-8 rounded-sm border border-slate-200 hover:border-blue-300 transition-all">
                <div class="flex items-start gap-4 mb-4">
                    <div class="bg-blue-100 w-12 h-12 flex items-center justify-center rounded-sm text-xl flex-shrink-0">👩‍💼</div>
                    <div>
                        <h3 class="font-bold text-xl text-slate-900 mb-2">Women Entrepreneurship Advancement Report</h3>
                        <span class="inline-block px-3 py-1 bg-blue-100 text-blue-800 text-xs font-semibold rounded-full mb-3">Annual Study</span>
                    </div>
                </div>
                <p class="text-slate-600 mb-4 leading-relaxed">
                    In-depth analysis of challenges, opportunities, and policy interventions needed to empower women entrepreneurs and achieve gender-inclusive economic growth.
                </p>
                <div class="border-t border-slate-200 pt-4">
                    <h4 class="font-semibold text-sm text-slate-900 mb-2">Study Focus:</h4>
                    <ul class="space-y-2 text-sm text-slate-600">
                        <li class="flex items-start gap-2">
                            <span class="text-blue-600 mt-1">✓</span>
                            <span>Barriers to women entrepreneurship</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-blue-600 mt-1">✓</span>
                            <span>Access to finance and mentorship</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-blue-600 mt-1">✓</span>
                            <span>Success stories and role models</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-blue-600 mt-1">✓</span>
                            <span>Policy recommendations for inclusion</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Training & Certification -->
<section id="training-certification" class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-12">
            <span class="text-teal-600 font-bold tracking-wider uppercase text-sm">Program Area 2</span>
            <h2 class="text-4xl font-bold text-slate-900 mt-3 mb-4">Training & Certification Programs</h2>
            <p class="text-lg text-slate-600 max-w-4xl">
                Building future-ready skills, leadership capabilities, and entrepreneurial mindsets through comprehensive training programs and professional certifications.
            </p>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            <!-- Training Program 1 -->
            <div class="bg-white p-8 rounded-sm border border-slate-200 hover:border-teal-300 transition-all">
                <div class="flex items-start gap-4 mb-4">
                    <div class="bg-teal-100 w-12 h-12 flex items-center justify-center rounded-sm text-xl flex-shrink-0">🚀</div>
                    <div>
                        <h3 class="font-bold text-xl text-slate-900 mb-2">Entrepreneurship & Business Model Masterclass</h3>
                        <span class="inline-block px-3 py-1 bg-teal-100 text-teal-800 text-xs font-semibold rounded-full mb-3">12-Week Program</span>
                    </div>
                </div>
                <p class="text-slate-600 mb-4 leading-relaxed">
                    Intensive hands-on program covering business ideation, business model canvas, lean startup methodology, financial planning, and go-to-market strategies.
                </p>
                <div class="border-t border-slate-200 pt-4 mb-4">
                    <h4 class="font-semibold text-sm text-slate-900 mb-2">Program Modules:</h4>
                    <ul class="space-y-2 text-sm text-slate-600">
                        <li class="flex items-start gap-2">
                            <span class="text-teal-600 mt-1">✓</span>
                            <span>Business ideation and opportunity recognition</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-teal-600 mt-1">✓</span>
                            <span>Business model development and validation</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-teal-600 mt-1">✓</span>
                            <span>Financial modeling and fundraising</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-teal-600 mt-1">✓</span>
                            <span>Marketing, sales, and customer acquisition</span>
                        </li>
                    </ul>
                </div>
                <div class="flex items-center gap-4 text-sm text-slate-600">
                    <div class="flex items-center gap-2">
                        <span class="font-semibold">Duration:</span> 12 Weeks
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="font-semibold">Format:</span> Hybrid
                    </div>
                </div>
            </div>

            <!-- Training Program 2 -->
            <div class="bg-white p-8 rounded-sm border border-slate-200 hover:border-teal-300 transition-all">
                <div class="flex items-start gap-4 mb-4">
                    <div class="bg-teal-100 w-12 h-12 flex items-center justify-center rounded-sm text-xl flex-shrink-0">🎖️</div>
                    <div>
                        <h3 class="font-bold text-xl text-slate-900 mb-2">Digital Innovation & Leadership Certificate</h3>
                        <span class="inline-block px-3 py-1 bg-teal-100 text-teal-800 text-xs font-semibold rounded-full mb-3">8-Week Certificate</span>
                    </div>
                </div>
                <p class="text-slate-600 mb-4 leading-relaxed">
                    Professional certification program for aspiring leaders focused on digital transformation, innovation management, and strategic leadership in the digital age.
                </p>
                <div class="border-t border-slate-200 pt-4 mb-4">
                    <h4 class="font-semibold text-sm text-slate-900 mb-2">Certificate Modules:</h4>
                    <ul class="space-y-2 text-sm text-slate-600">
                        <li class="flex items-start gap-2">
                            <span class="text-teal-600 mt-1">✓</span>
                            <span>Digital transformation strategy</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-teal-600 mt-1">✓</span>
                            <span>Innovation frameworks and design thinking</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-teal-600 mt-1">✓</span>
                            <span>Leadership in digital organizations</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-teal-600 mt-1">✓</span>
                            <span>Change management and digital culture</span>
                        </li>
                    </ul>
                </div>
                <div class="flex items-center gap-4 text-sm text-slate-600">
                    <div class="flex items-center gap-2">
                        <span class="font-semibold">Duration:</span> 8 Weeks
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="font-semibold">Format:</span> Online
                    </div>
                </div>
            </div>

            <!-- Training Program 3 -->
            <div class="bg-white p-8 rounded-sm border border-slate-200 hover:border-teal-300 transition-all">
                <div class="flex items-start gap-4 mb-4">
                    <div class="bg-teal-100 w-12 h-12 flex items-center justify-center rounded-sm text-xl flex-shrink-0">🤖</div>
                    <div>
                        <h3 class="font-bold text-xl text-slate-900 mb-2">AI & Future Skills Program</h3>
                        <span class="inline-block px-3 py-1 bg-teal-100 text-teal-800 text-xs font-semibold rounded-full mb-3">10-Week Program</span>
                    </div>
                </div>
                <p class="text-slate-600 mb-4 leading-relaxed">
                    Cutting-edge program designed to equip participants with artificial intelligence, machine learning, and emerging technology skills for future career readiness.
                </p>
                <div class="border-t border-slate-200 pt-4 mb-4">
                    <h4 class="font-semibold text-sm text-slate-900 mb-2">Program Content:</h4>
                    <ul class="space-y-2 text-sm text-slate-600">
                        <li class="flex items-start gap-2">
                            <span class="text-teal-600 mt-1">✓</span>
                            <span>Introduction to AI and machine learning</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-teal-600 mt-1">✓</span>
                            <span>Data science fundamentals</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-teal-600 mt-1">✓</span>
                            <span>AI applications in business and industry</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-teal-600 mt-1">✓</span>
                            <span>Ethics, governance, and responsible AI</span>
                        </li>
                    </ul>
                </div>
                <div class="flex items-center gap-4 text-sm text-slate-600">
                    <div class="flex items-center gap-2">
                        <span class="font-semibold">Duration:</span> 10 Weeks
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="font-semibold">Format:</span> Hybrid
                    </div>
                </div>
            </div>

            <!-- Training Program 4 -->
            <div class="bg-white p-8 rounded-sm border border-slate-200 hover:border-teal-300 transition-all">
                <div class="flex items-start gap-4 mb-4">
                    <div class="bg-teal-100 w-12 h-12 flex items-center justify-center rounded-sm text-xl flex-shrink-0">⚖️</div>
                    <div>
                        <h3 class="font-bold text-xl text-slate-900 mb-2">Startup Compliance & Legal Framework Training</h3>
                        <span class="inline-block px-3 py-1 bg-teal-100 text-teal-800 text-xs font-semibold rounded-full mb-3">6-Week Training</span>
                    </div>
                </div>
                <p class="text-slate-600 mb-4 leading-relaxed">
                    Essential training for entrepreneurs on legal compliance, regulatory frameworks, intellectual property, contracts, and risk management for startups.
                </p>
                <div class="border-t border-slate-200 pt-4 mb-4">
                    <h4 class="font-semibold text-sm text-slate-900 mb-2">Training Topics:</h4>
                    <ul class="space-y-2 text-sm text-slate-600">
                        <li class="flex items-start gap-2">
                            <span class="text-teal-600 mt-1">✓</span>
                            <span>Business registration and legal structures</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-teal-600 mt-1">✓</span>
                            <span>Intellectual property rights and protection</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-teal-600 mt-1">✓</span>
                            <span>Contracts, agreements, and negotiations</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-teal-600 mt-1">✓</span>
                            <span>Tax compliance and regulatory obligations</span>
                        </li>
                    </ul>
                </div>
                <div class="flex items-center gap-4 text-sm text-slate-600">
                    <div class="flex items-center gap-2">
                        <span class="font-semibold">Duration:</span> 6 Weeks
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="font-semibold">Format:</span> In-person
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Innovation Programs -->
<section id="innovation-programs" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-12">
            <span class="text-amber-600 font-bold tracking-wider uppercase text-sm">Program Area 3</span>
            <h2 class="text-4xl font-bold text-slate-900 mt-3 mb-4">Innovation Programs</h2>
            <p class="text-lg text-slate-600 max-w-4xl">
                Accelerating startups, fostering youth-led innovation, and creating pathways for entrepreneurs to transform ideas into impactful ventures.
            </p>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            <!-- Innovation Program 1 -->
            <div class="bg-slate-50 p-8 rounded-sm border border-slate-200 hover:border-amber-300 transition-all">
                <div class="flex items-start gap-4 mb-4">
                    <div class="bg-amber-100 w-12 h-12 flex items-center justify-center rounded-sm text-xl flex-shrink-0">🔬</div>
                    <div>
                        <h3 class="font-bold text-xl text-slate-900 mb-2">CEPIRD Innovation Lab</h3>
                        <span class="inline-block px-3 py-1 bg-amber-100 text-amber-800 text-xs font-semibold rounded-full mb-3">Year-Round Program</span>
                    </div>
                </div>
                <p class="text-slate-600 mb-4 leading-relaxed">
                    A collaborative innovation space where entrepreneurs, researchers, and industry experts come together to develop cutting-edge solutions for real-world challenges.
                </p>
                <div class="border-t border-slate-200 pt-4 mb-4">
                    <h4 class="font-semibold text-sm text-slate-900 mb-2">Lab Features:</h4>
                    <ul class="space-y-2 text-sm text-slate-600">
                        <li class="flex items-start gap-2">
                            <span class="text-amber-600 mt-1">✓</span>
                            <span>State-of-the-art co-working space</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-amber-600 mt-1">✓</span>
                            <span>Access to technology tools and resources</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-amber-600 mt-1">✓</span>
                            <span>Mentorship from industry veterans</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-amber-600 mt-1">✓</span>
                            <span>Prototyping and testing facilities</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-amber-600 mt-1">✓</span>
                            <span>Networking events and demo days</span>
                        </li>
                    </ul>
                </div>
                <div class="bg-amber-50 p-4 rounded-sm border border-amber-200">
                    <p class="text-sm text-slate-700"><span class="font-semibold">Target:</span> Early-stage startups, researchers, and innovators</p>
                </div>
            </div>

            <!-- Innovation Program 2 -->
            <div class="bg-slate-50 p-8 rounded-sm border border-slate-200 hover:border-amber-300 transition-all">
                <div class="flex items-start gap-4 mb-4">
                    <div class="bg-amber-100 w-12 h-12 flex items-center justify-center rounded-sm text-xl flex-shrink-0">⚡</div>
                    <div>
                        <h3 class="font-bold text-xl text-slate-900 mb-2">Youth Startup Accelerator</h3>
                        <span class="inline-block px-3 py-1 bg-amber-100 text-amber-800 text-xs font-semibold rounded-full mb-3">6-Month Accelerator</span>
                    </div>
                </div>
                <p class="text-slate-600 mb-4 leading-relaxed">
                    Intensive accelerator program for youth-led startups providing mentorship, funding support, market access, and business development resources.
                </p>
                <div class="border-t border-slate-200 pt-4 mb-4">
                    <h4 class="font-semibold text-sm text-slate-900 mb-2">Accelerator Benefits:</h4>
                    <ul class="space-y-2 text-sm text-slate-600">
                        <li class="flex items-start gap-2">
                            <span class="text-amber-600 mt-1">✓</span>
                            <span>Seed funding and investment opportunities</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-amber-600 mt-1">✓</span>
                            <span>Dedicated mentorship from successful founders</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-amber-600 mt-1">✓</span>
                            <span>Business model refinement workshops</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-amber-600 mt-1">✓</span>
                            <span>Investor pitch preparation and demo day</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-amber-600 mt-1">✓</span>
                            <span>Market validation and customer discovery</span>
                        </li>
                    </ul>
                </div>
                <div class="bg-amber-50 p-4 rounded-sm border border-amber-200">
                    <p class="text-sm text-slate-700"><span class="font-semibold">Cohort:</span> 15-20 startups per batch</p>
                </div>
            </div>

            <!-- Innovation Program 3 -->
            <div class="bg-slate-50 p-8 rounded-sm border border-slate-200 hover:border-amber-300 transition-all">
                <div class="flex items-start gap-4 mb-4">
                    <div class="bg-amber-100 w-12 h-12 flex items-center justify-center rounded-sm text-xl flex-shrink-0">🏆</div>
                    <div>
                        <h3 class="font-bold text-xl text-slate-900 mb-2">National Policy Hackathon</h3>
                        <span class="inline-block px-3 py-1 bg-amber-100 text-amber-800 text-xs font-semibold rounded-full mb-3">Annual Competition</span>
                    </div>
                </div>
                <p class="text-slate-600 mb-4 leading-relaxed">
                    National-level competition inviting teams to design innovative policy solutions and frameworks addressing Bangladesh's socio-economic challenges.
                </p>
                <div class="border-t border-slate-200 pt-4 mb-4">
                    <h4 class="font-semibold text-sm text-slate-900 mb-2">Competition Highlights:</h4>
                    <ul class="space-y-2 text-sm text-slate-600">
                        <li class="flex items-start gap-2">
                            <span class="text-amber-600 mt-1">✓</span>
                            <span>Policy innovation and design thinking</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-amber-600 mt-1">✓</span>
                            <span>Collaboration with government ministries</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-amber-600 mt-1">✓</span>
                            <span>Winning solutions presented to policymakers</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-amber-600 mt-1">✓</span>
                            <span>Cash prizes and incubation support</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-amber-600 mt-1">✓</span>
                            <span>Implementation opportunities for top ideas</span>
                        </li>
                    </ul>
                </div>
                <div class="bg-amber-50 p-4 rounded-sm border border-amber-200">
                    <p class="text-sm text-slate-700"><span class="font-semibold">Prize Pool:</span> BDT 5,00,000+</p>
                </div>
            </div>

            <!-- Innovation Program 4 -->
            <div class="bg-slate-50 p-8 rounded-sm border border-slate-200 hover:border-amber-300 transition-all">
                <div class="flex items-start gap-4 mb-4">
                    <div class="bg-amber-100 w-12 h-12 flex items-center justify-center rounded-sm text-xl flex-shrink-0">🎓</div>
                    <div>
                        <h3 class="font-bold text-xl text-slate-900 mb-2">Entrepreneurial Research Fellowship</h3>
                        <span class="inline-block px-3 py-1 bg-amber-100 text-amber-800 text-xs font-semibold rounded-full mb-3">12-Month Fellowship</span>
                    </div>
                </div>
                <p class="text-slate-600 mb-4 leading-relaxed">
                    Prestigious fellowship program for researchers and scholars conducting impactful studies on entrepreneurship, policy, and innovation ecosystems.
                </p>
                <div class="border-t border-slate-200 pt-4 mb-4">
                    <h4 class="font-semibold text-sm text-slate-900 mb-2">Fellowship Benefits:</h4>
                    <ul class="space-y-2 text-sm text-slate-600">
                        <li class="flex items-start gap-2">
                            <span class="text-amber-600 mt-1">✓</span>
                            <span>Research grants and financial support</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-amber-600 mt-1">✓</span>
                            <span>Access to data, networks, and resources</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-amber-600 mt-1">✓</span>
                            <span>Publication and dissemination support</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-amber-600 mt-1">✓</span>
                            <span>Policy impact and advocacy opportunities</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-amber-600 mt-1">✓</span>
                            <span>Collaboration with international researchers</span>
                        </li>
                    </ul>
                </div>
                <div class="bg-amber-50 p-4 rounded-sm border border-amber-200">
                    <p class="text-sm text-slate-700"><span class="font-semibold">Fellows:</span> 5-10 researchers annually</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Conferences & Events -->
<section id="conferences-events" class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-12">
            <span class="text-indigo-600 font-bold tracking-wider uppercase text-sm">Program Area 4</span>
            <h2 class="text-4xl font-bold text-slate-900 mt-3 mb-4">Conferences & Events</h2>
            <p class="text-lg text-slate-600 max-w-4xl">
                National-level summits, forums, and conferences bringing together stakeholders from government, academia, industry, and entrepreneurship communities.
            </p>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            <!-- Event 1 -->
            <div class="bg-white p-8 rounded-sm border border-slate-200 hover:border-indigo-300 transition-all">
                <div class="flex items-start gap-4 mb-4">
                    <div class="bg-indigo-100 w-12 h-12 flex items-center justify-center rounded-sm text-xl flex-shrink-0">🎤</div>
                    <div>
                        <h3 class="font-bold text-xl text-slate-900 mb-2">National Entrepreneurship Policy Summit</h3>
                        <span class="inline-block px-3 py-1 bg-indigo-100 text-indigo-800 text-xs font-semibold rounded-full mb-3">Annual Flagship Event</span>
                    </div>
                </div>
                <p class="text-slate-600 mb-4 leading-relaxed">
                    Bangladesh's premier platform for policymakers, entrepreneurs, investors, and ecosystem stakeholders to discuss policy reforms and entrepreneurial development strategies.
                </p>
                <div class="border-t border-slate-200 pt-4 mb-4">
                    <h4 class="font-semibold text-sm text-slate-900 mb-2">Summit Features:</h4>
                    <ul class="space-y-2 text-sm text-slate-600">
                        <li class="flex items-start gap-2">
                            <span class="text-indigo-600 mt-1">✓</span>
                            <span>Keynote speeches from national leaders</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-indigo-600 mt-1">✓</span>
                            <span>Panel discussions on policy challenges</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-indigo-600 mt-1">✓</span>
                            <span>Launch of annual policy report</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-indigo-600 mt-1">✓</span>
                            <span>Networking sessions and roundtables</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-indigo-600 mt-1">✓</span>
                            <span>Startup showcase and awards</span>
                        </li>
                    </ul>
                </div>
                <div class="bg-indigo-50 p-4 rounded-sm border border-indigo-200">
                    <p class="text-sm text-slate-700"><span class="font-semibold">Expected Attendance:</span> 500+ participants</p>
                </div>
            </div>

            <!-- Event 2 -->
            <div class="bg-white p-8 rounded-sm border border-slate-200 hover:border-indigo-300 transition-all">
                <div class="flex items-start gap-4 mb-4">
                    <div class="bg-indigo-100 w-12 h-12 flex items-center justify-center rounded-sm text-xl flex-shrink-0">🌟</div>
                    <div>
                        <h3 class="font-bold text-xl text-slate-900 mb-2">Youth Innovation Leadership Forum</h3>
                        <span class="inline-block px-3 py-1 bg-indigo-100 text-indigo-800 text-xs font-semibold rounded-full mb-3">Bi-annual Forum</span>
                    </div>
                </div>
                <p class="text-slate-600 mb-4 leading-relaxed">
                    Empowering young innovators and future leaders through interactive sessions, skill-building workshops, and inspirational success stories.
                </p>
                <div class="border-t border-slate-200 pt-4 mb-4">
                    <h4 class="font-semibold text-sm text-slate-900 mb-2">Forum Activities:</h4>
                    <ul class="space-y-2 text-sm text-slate-600">
                        <li class="flex items-start gap-2">
                            <span class="text-indigo-600 mt-1">✓</span>
                            <span>Inspirational talks from young entrepreneurs</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-indigo-600 mt-1">✓</span>
                            <span>Skill-building and leadership workshops</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-indigo-600 mt-1">✓</span>
                            <span>Startup pitching competitions</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-indigo-600 mt-1">✓</span>
                            <span>Mentorship speed networking</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-indigo-600 mt-1">✓</span>
                            <span>Youth entrepreneurship awards</span>
                        </li>
                    </ul>
                </div>
                <div class="bg-indigo-50 p-4 rounded-sm border border-indigo-200">
                    <p class="text-sm text-slate-700"><span class="font-semibold">Target Audience:</span> University students and young professionals</p>
                </div>
            </div>

            <!-- Event 3 -->
            <div class="bg-white p-8 rounded-sm border border-slate-200 hover:border-indigo-300 transition-all">
                <div class="flex items-start gap-4 mb-4">
                    <div class="bg-indigo-100 w-12 h-12 flex items-center justify-center rounded-sm text-xl flex-shrink-0">🔬</div>
                    <div>
                        <h3 class="font-bold text-xl text-slate-900 mb-2">Digital Economy Research Conference</h3>
                        <span class="inline-block px-3 py-1 bg-indigo-100 text-indigo-800 text-xs font-semibold rounded-full mb-3">Annual Conference</span>
                    </div>
                </div>
                <p class="text-slate-600 mb-4 leading-relaxed">
                    Academic and industry-focused conference showcasing cutting-edge research on digital transformation, AI, fintech, and emerging technologies.
                </p>
                <div class="border-t border-slate-200 pt-4 mb-4">
                    <h4 class="font-semibold text-sm text-slate-900 mb-2">Conference Tracks:</h4>
                    <ul class="space-y-2 text-sm text-slate-600">
                        <li class="flex items-start gap-2">
                            <span class="text-indigo-600 mt-1">✓</span>
                            <span>Research paper presentations and posters</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-indigo-600 mt-1">✓</span>
                            <span>Industry case studies and best practices</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-indigo-600 mt-1">✓</span>
                            <span>Technology demonstrations and exhibitions</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-indigo-600 mt-1">✓</span>
                            <span>Academic-industry collaboration forums</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-indigo-600 mt-1">✓</span>
                            <span>Publication opportunities in journals</span>
                        </li>
                    </ul>
                </div>
                <div class="bg-indigo-50 p-4 rounded-sm border border-indigo-200">
                    <p class="text-sm text-slate-700"><span class="font-semibold">Participants:</span> Researchers, academics, and tech professionals</p>
                </div>
            </div>

            <!-- Event 4 -->
            <div class="bg-white p-8 rounded-sm border border-slate-200 hover:border-indigo-300 transition-all">
                <div class="flex items-start gap-4 mb-4">
                    <div class="bg-indigo-100 w-12 h-12 flex items-center justify-center rounded-sm text-xl flex-shrink-0">👩‍💼</div>
                    <div>
                        <h3 class="font-bold text-xl text-slate-900 mb-2">Women in Innovation Expo</h3>
                        <span class="inline-block px-3 py-1 bg-indigo-100 text-indigo-800 text-xs font-semibold rounded-full mb-3">Annual Expo</span>
                    </div>
                </div>
                <p class="text-slate-600 mb-4 leading-relaxed">
                    Celebrating and empowering women entrepreneurs, innovators, and leaders through exhibitions, networking, and capacity-building sessions.
                </p>
                <div class="border-t border-slate-200 pt-4 mb-4">
                    <h4 class="font-semibold text-sm text-slate-900 mb-2">Expo Highlights:</h4>
                    <ul class="space-y-2 text-sm text-slate-600">
                        <li class="flex items-start gap-2">
                            <span class="text-indigo-600 mt-1">✓</span>
                            <span>Women-led startup exhibitions</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-indigo-600 mt-1">✓</span>
                            <span>Success stories and role model panels</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-indigo-600 mt-1">✓</span>
                            <span>Investor meet and pitch sessions</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-indigo-600 mt-1">✓</span>
                            <span>Women entrepreneurship awards</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-indigo-600 mt-1">✓</span>
                            <span>Policy advocacy and support programs</span>
                        </li>
                    </ul>
                </div>
                <div class="bg-indigo-50 p-4 rounded-sm border border-indigo-200">
                    <p class="text-sm text-slate-700"><span class="font-semibold">Focus:</span> Gender-inclusive entrepreneurship</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Program Impact Stats -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-teal-600 font-bold tracking-wider uppercase text-sm">Measurable Impact</span>
            <h2 class="text-4xl font-bold text-slate-900 mt-2 mb-6">Programs by the Numbers</h2>
            <p class="text-lg text-slate-600 max-w-3xl mx-auto">
                Our programs create tangible outcomes that empower individuals, strengthen institutions, and transform Bangladesh's entrepreneurial landscape.
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="p-8 bg-gradient-to-br from-blue-50 to-blue-100 rounded-sm border border-blue-200 text-center">
                <div class="text-5xl font-bold text-blue-900 mb-2">50+</div>
                <p class="font-semibold text-slate-900 mb-1">Research Publications</p>
                <p class="text-sm text-slate-600">Evidence-based studies driving policy</p>
            </div>
            <div class="p-8 bg-gradient-to-br from-teal-50 to-teal-100 rounded-sm border border-teal-200 text-center">
                <div class="text-5xl font-bold text-teal-900 mb-2">1,200+</div>
                <p class="font-semibold text-slate-900 mb-1">Trained Individuals</p>
                <p class="text-sm text-slate-600">Certified in entrepreneurship & tech</p>
            </div>
            <div class="p-8 bg-gradient-to-br from-amber-50 to-amber-100 rounded-sm border border-amber-200 text-center">
                <div class="text-5xl font-bold text-amber-900 mb-2">200+</div>
                <p class="font-semibold text-slate-900 mb-1">Startups Accelerated</p>
                <p class="text-sm text-slate-600">Through innovation programs</p>
            </div>
            <div class="p-8 bg-gradient-to-br from-indigo-50 to-indigo-100 rounded-sm border border-indigo-200 text-center">
                <div class="text-5xl font-bold text-indigo-900 mb-2">25+</div>
                <p class="font-semibold text-slate-900 mb-1">National Events</p>
                <p class="text-sm text-slate-600">Summits, conferences & forums</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<sectionter">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">Join Our Programs</h2>
            <p class="text-xl text-blue-100 mb-10 max-w-3xl mx-auto leading-relaxed">
                Whether you're an aspiring entrepreneur, researcher, or innovator, CEPIRD has a program designed to help you achieve your goals and create meaningful impact.
            </p>
            <div class="flex flex-col md:flex-row justify-center gap-4">
                <a href="#" class="px-10 py-4 bg-white text-blue-900 font-bold rounded-sm hover:bg-blue-50 transition-colors text-lg">
                    Apply Now
                </a>
                <a href="#" class="px-10 py-4 bg-teal-600 text-white font-bold rounded-sm hover:bg-teal-700 transition-colors border border-teal-500 text-lg">
                    Download Brochure
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
