@php
    $iconMap = [
        'academic-cap' => '🎓',
        'document-text' => '📄',
        'currency-rupee' => '💰',
        'document-report' => '📊',
        'light-bulb' => '💡',
        'users' => '👥',
        'desktop-computer' => '💻',
        'presentation-chart-bar' => '📈',
        'beaker' => '🔬',
        'chip' => '🔌',
        'globe' => '🌍',
        'code' => '💻',
        'video-camera' => '🎥',
        'lightning-bolt' => '⚡',
    ];

    $displayIcon = $iconMap[$icon] ?? ($icon ?: '📘');
@endphp
{{ $displayIcon }}
