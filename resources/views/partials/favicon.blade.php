@php
    $faviconSetting = \App\Models\Pengaturan::where('key', 'favicon')->first();
    $storedFaviconPath = $faviconSetting?->value;
    $storedFaviconFile = $storedFaviconPath ? public_path('storage/' . $storedFaviconPath) : null;
    $fallbackFaviconPath = 'images/favicon2.png';
    $fallbackFaviconFile = public_path($fallbackFaviconPath);

    if ($storedFaviconPath && $storedFaviconFile && file_exists($storedFaviconFile)) {
        $faviconPath = 'storage/' . $storedFaviconPath;
        $faviconVersion = $faviconSetting?->updated_at?->timestamp ?? filemtime($storedFaviconFile);
    } else {
        $faviconPath = $fallbackFaviconPath;
        $faviconVersion = file_exists($fallbackFaviconFile) ? filemtime($fallbackFaviconFile) : time();
    }

    $faviconExtension = strtolower(pathinfo($faviconPath, PATHINFO_EXTENSION));
    $faviconType = match ($faviconExtension) {
        'svg' => 'image/svg+xml',
        'ico' => 'image/x-icon',
        'jpg', 'jpeg' => 'image/jpeg',
        'webp' => 'image/webp',
        default => 'image/png',
    };

    $faviconUrl = asset($faviconPath) . '?v=' . $faviconVersion;
@endphp
<link rel="icon" type="{{ $faviconType }}" href="{{ $faviconUrl }}">
<link rel="shortcut icon" href="{{ $faviconUrl }}">
<link rel="apple-touch-icon" href="{{ $faviconUrl }}">
