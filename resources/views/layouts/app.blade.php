<!DOCTYPE html>
<html lang="en">
<head>
    <title>StarterAPI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.rawgit.com/konpa/devicon/df6431e323547add1b4cf45992913f15286456d3/devicon.min.css">
    <link rel="stylesheet" type="text/css" href="/css/app.css">
</head>
<body>
    <div id="app" class="container">
        
        @yield('content')

    </div>
    @include('components.footer')
    <script src="/js/manifest.js"></script>
    <script src="/js/vendor.js"></script>
    <script src="/js/app.js"></script>
</body>
</html>