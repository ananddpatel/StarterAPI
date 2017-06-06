<!-- 
GET /people,
GET /people/{id},
GET /people/{id}/blogs,
GET /people/{id}/comments,

GET /blog,
GET /blog/{id},
GET /blog/{id}/comments,
POST /blog,

GET /comments,
GET /comments/{id},
 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>StarterAPI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/css/app.css">
</head>
<body>
    <div class="container">
        
        @yield('content')

    </div>
    @include('components.footer')
    <script src="/js/app.js"></script>
</body>
</html>