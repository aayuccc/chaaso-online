<!DOCTYPE html>
<html lang="en">

<head>
    @php
        $websiteName = $settings['site_title'] ?? null;
        $headerLogo = $settings['header_logo'] ?? null;
        $schemaLogoMedia = $headerLogo ? MediaHelper::getImageById($headerLogo) : null;
        $schemaLogo = ($schemaLogoMedia && !empty($schemaLogoMedia->file_name))
            ? asset($schemaLogoMedia->file_name)
            : null;
    @endphp
    @include('frontend.partials.meta', [
        'payload' => $payload,
        'payloadMeta' => $payloadMeta,
        'title' => $title,
        'websiteName' => $websiteName,
        'headerLogo' => $headerLogo,
    ])
    <script>
        (function () {
            try {
                var t = localStorage.getItem('co-theme');
                if (!t) t = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
                document.documentElement.setAttribute('data-theme', t);
            } catch (e) {}
        })();
    </script>
    @include('frontend.partials.css')

    {{-- schema --}}
    @include('frontend.schema.organization', ['websiteName' => $websiteName, 'logo' => $schemaLogo])
    @include('frontend.schema.website', ['websiteName' => $websiteName])
    @include('frontend.schema.local-business', [
        'websiteName' => $websiteName,
        'logo' => $schemaLogo,
    ])
    @stack('schema')

    @if ($additionalCSS = $settings['additional_CSS'] ?? null)
        <style>
            {{ $additionalCSS }}
        </style>
    @endif
</head>

<body class="co-body">

    @include('frontend.layouts.header')

    @yield('main-section')

    @include('frontend.layouts.footer', ['websiteName' => $websiteName])

    @include('frontend.partials.js')

</body>

</html>
