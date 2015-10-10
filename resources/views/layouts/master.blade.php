<!DOCTYPE html>
<html lang="en">
<head>
    @yield("head.title")
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="font-awesome-4.3.0/css/font-awesome.min.css">
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/shared/angular.min.js"></script>
    @yield("head.style")

    <script src="js/jquery.min.js"></script>
</head>

<body>
<div id="wrapper">
    @include("partials.header")
    @yield("body.content")
    @include("partials.footer")
</div>

@yield("body.js")

</body>
</html>