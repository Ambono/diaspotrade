<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-route.js"></script>

<body ng-app="myApp">

<p><a href="#/">Main</a></p>

<a href="#red">Red</a>
<a href="#green">Green</a>
<a href="#blue">Blue</a>

<div ng-view></div>

<script>
var app = angular.module("myApp", ["ngRoute"]);
app.config(function($routeProvider) {
    $routeProvider
    .when("/", {
        templateUrl : "http://localhost:81/workspace/komoe/SellerNote.php"
    })
    .when("/red", {
        templateUrl : "http://localhost:81/workspace/komoe/SellerNote.php
    })
    .when("/green", {
        templateUrl : "http://localhost:81/workspace/komoe/SellerNote.php"
    })
    .when("/blue", {
        templateUrl : "http://localhost:81/workspace/komoe/SellerNote.php"
    });
});
</script>

<p>Click on the links.</p>

<p>This example uses the ng-view directive as an attribute to a DIV element.</p>
</body>
</html>