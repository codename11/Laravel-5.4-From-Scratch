<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/favicon.ico">

    <title>Blog Template for Bootstrap</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="{{ asset('css/frontpage.css') }}" rel="stylesheet">
    </head>
<body>
    
    @yield("content")

<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    let textArea = document.getElementById("body");
    window.onload = () => {
        if(textArea){
            CKEDITOR.replace("body");
        }
    }
</script>
</body>
</html>