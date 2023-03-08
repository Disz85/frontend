<head>
    <title>
        @hasSection('title')
            @yield('title') |
        @endif {{ config('app.name', 'Laravel') }}
    </title>

    @hasSection('related-identity')
        <meta name="related-identity" content="@yield('related-identity')">
    @endif

    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta charset="utf-8"/>

    <meta name="copyright" content="©{{ date('Y') }} Szallas"/>

    <meta property="og:site_name" content="Szallas"/>

    @hasSection('meta')
        @yield('meta')
    @endif

    @livewireStyles
    <!-- Global stylesheet -->
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])

    @livewireScripts

    @hasSection('stylesheet')
        @yield('stylesheet')
    @endif
</head>
