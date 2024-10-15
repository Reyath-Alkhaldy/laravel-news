<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="robots" content="index, follow">
    <meta name="keywords" content="global news, political news, sports news, business news, technology news, latest news, news headlines, news websites, news aggregation, RSS, live news, today's news, economic news, tech news, news updates, world press, world news, news portals">
    <meta name="description" content="A comprehensive platform providing the latest global, political, sports, business, and technology news from trusted sources worldwide. News is updated live via RSS feeds and professionally organized into categories. Get the latest updates from all sectors in one place.">
    <meta property="og:title" content="News Summary - Latest Global, Political, Sports, Business, and Technology News">
    <meta property="og:description" content="A platform providing the latest global news in various categories. Updated live via RSS feeds from trusted sources worldwide.">
    <meta property="og:image" content="https://example.com/logo.png"> <!-- رابط إلى صورة الشعار أو صورة تعبر عن الموقع -->
    <meta property="og:url" content="https://example.com">
    <meta property="og:type" content="website">
    <meta name="author" content="News Summary Team">
    <meta name="language" content="en">
    <meta name="copyright" content="© 2024 News Summary">
    <meta http-equiv="refresh" content="900">
    <meta name="theme-color" content="#007bff">
    <meta name="rating" content="General">
    <meta name="google-site-verification" content="0Tjrd3wJEQNYAuKllVjSzj8HR4ub9Rn1wAVWqo1ZEvI" />
    <title>Global News Summary</title>
    <link rel="icon" href="{{ asset('assets/logo/global_news_summary.webp') }}" type="image/svg+xml">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=EB+Garamond:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css" rel="stylesheet') }}">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    @stack('styles')
</head>

<body class="index-page">

    @include('dash.layouts.header')
    <main class="main">
        {{ $slot }}
    </main>

    @include('dash.layouts.footor')

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
    @stack('scripts')
</body>
</html>
