<!DOCTYPE html>
<html lang="en">
<head>
    @yield("head.title")
<<<<<<< Updated upstream
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="font-awesome-4.3.0/css/font-awesome.min.css">
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/shared/angular.min.js"></script>
    <script src='https://cdn.firebase.com/libs/angularfire/1.1.1/angularfire.min.js'></script>
    <script src='https://cdn.firebase.com/js/client/2.2.2/firebase.js'></script>
=======
    <meta charset="utf-8">   
    <link rel="stylesheet" href="/font-awesome-4.3.0/css/font-awesome.min.css">
    <!-- <script src="/js/jquery.min.js"></script> -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
    <script src="https://code.angularjs.org/1.2.28/angular-route.min.js"></script>

>>>>>>> Stashed changes
    @yield("head.style")
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>

<body ng-app="myApp">
	<div id="wrapper">
	    @yield("body.content")
	    @include("partials.footer")
	</div>

    <!-- Modules -->
    <script src="/js/app.js"></script>
<!--
    <script src="/js/controllers/HomeController.js"></script>
    <script src="/js/controllers/CategoryController.js"></script>

    <script src="/js/services/cats.js"></script>
    <script src="/js/services/category.js"></script>
    -->

    @yield("body.js")

</body>
</html>