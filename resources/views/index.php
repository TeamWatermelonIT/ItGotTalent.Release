<?php
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IT Got Talent</title>

    <script src="/app/lib/jquery.js"></script>
    <link rel="stylesheet" href="/app/lib/css/bootstrap.css">
    <link rel="stylesheet" href="/app/styles/reset.css">
    <link rel="stylesheet" href="/app/styles/style.css">
    <link rel="stylesheet" href="/app/styles/projects.css">
    <link rel="stylesheet" href="/app/styles/userProfile.css">
    <link rel="stylesheet" href="/app/styles/students.css">
    <link rel="stylesheet" href="/app/styles/currentProject.css">
    <link rel="stylesheet" href="/app/styles/registration.css">
    <link rel="stylesheet" href="/app/styles/animate.css">


    <link href='https://fonts.googleapis.com/css?family=Bad+Script&subset=latin,cyrillic' rel='stylesheet' type='text/css'>


</head>
<body ng-app="myApp" ng-cloak>
<div class="container-fluid">
    <div class="container">


        <ng-view>

        </ng-view>



        <div class="row footer">
            <div class="col-lg-3 col-md-3 col-xs-12 footer blue animate">
                <a href="#"><img src="app/images/copyright.png" alt=""></a>
                <p>Copyright Watermelon 2016</p>
            </div>
            <div class="col-lg-1 col-md-1  col-xs-12 footer green animate"><a href="www.facebook.com"><img src="/app/images/facebook.png" alt=""></a></div>
            <div class="col-lg-1 col-md-1  col-xs-12 footer yellow animate"><a href="#"><img src="/app/images/google-plus.png"></a></div>
            <div class="col-lg-1 col-md-1  col-xs-12 footer orange animate"><a href="#"><img src="/app/images/twitter.png" alt=""></a></div>
            <div class="col-lg-1 col-md-1  col-xs-12 footer pink animate"><a href="#"><img src="/app/images/instagram.png" alt=""></a></div>
        </div>
    </div>
</div>

<script src="/app/lib/jquery.js"></script>
<script src="/app/lib/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.9/angular.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.9/angular-resource.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.9/angular-route.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.9/angular-cookies.min.js"></script>
<script src="/app/js/app.js"></script>

<script src="/app/js/identity/auth.js"></script>
<script src="/app/js/identity/authorization-service.js"></script>
<script src="/app/js/identity/identity-service.js"></script>
<script src="/app/js/identity/login-controller.js"></script>
<script src="/app/js/identity/registration-controller.js"></script>

<script src="/app/js/home/ctrl-home.js"></script>

<script src="/app/js/students/ctrl-students-details.js"></script>
<script src="/app/js/students/ctrl-students.js"></script>
<script src="/app/js/students/service-student.js"></script>
<script src="/app/js/students/service-students-details.js"></script>
<script src="/app/js/students/ctrl-students-edit.js"></script>
<script src="/app/js/students/ctrl-students-details.js"></script>

<script src="/app/js/projects/projects-service.js"></script>
<script src="/app/js/projects/projects-controller.js"></script>
<script src="/app/js/projects/projects-create-controller.js"></script>
<script src="/app/js/projects/projects-details-controller.js"></script>

<script type="text/javascript">
    var klasses = ["bounce", "pulse", "swing", "rubberBand", "tada", "wobble", "jello", "rotateIn"];

    var item = klasses[Math.floor(Math.random()*klasses.length)];

    $.fn.extend({
        animateCss: function (animationName) {
            $(this).addClass('animated ' + animationName);
        }
    });


    $('#active').animateCss(item);

    $('.animate').on("mouseenter", function () {
        $(this).addClass('animated ' + 'pulse');
    });

    $('.animate').on("mouseleave", function () {
        $(this).removeClass('animated ' + 'pulse');
    });

    $('.partners img').on("mouseenter", function () {
        $(this).addClass('animated ' + 'tada');
    })

    $('.partners img').on("mouseleave", function () {
        $(this).removeClass('animated ' + 'tada');
    });
</script>
</body>
</html>
