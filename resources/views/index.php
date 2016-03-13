<?php
?>
<html ng-app="app">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IT Got Talent</title>

    <!-- Bootstrap Core CSS -->
    <link href="/app/lib/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/app/lib/css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="/app/styles/style.css" />
    <link rel="stylesheet" href="/app/styles/round-about.css">
    <style>
    .smallText{
        font-size: 12px;
        display: inline-block;
        margin-left: 5px;
    }

    input.ng-invalid.ng-dirty.form-validation{
         background-color: pink;
    }
    input.ng-valid.ng-dirty.form-validation{
        background-color: greenyellow;
    }
</style>
</head>
<body ng-app="app">
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#/home">IT Got Talents</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#/home">Home</a></li>
                <li><a href="#/students">Students<span class="sr-only"></span></a></li>
                <li><a href="#/projects">Projects</a></li>
                <li><a href="#/register">Register</a></li>
            </ul>

            <form class="navbar-form navbar-right" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                    <input type="Password" class="form-control" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="container">

    <ng-view>

    </ng-view>

</div>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <p>Copyright &copy; Your Website 2014</p>
            </div>
        </div>
    </div>
</footer>


<script src="/app/lib/jquery.js"></script>
<script src="/app/lib/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.9/angular.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.9/angular-resource.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.9/angular-route.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.9/angular-cookies.min.js"></script>
<script src="/app/js/app.js"></script>
<script src="/app/js/students/ctrl-students.js"></script>
<script src="/app/js/students/ctrl-students-details.js"></script>
<script src="/app/js/projects/ctrl-projects.js"></script>
<script src="/app/js/projects/ctrl-projects-details.js"></script>
<script src="/app/js/register/ctrl-register.js"></script>
<script src="/app/js/students/service-student.js"></script>
<script src="/app/js/students/service-students-details.js"></script>
<script src="/app/js/register/service-regLoginLogout.js"></script>
<script src="/app/js/register/service-authentication.js"></script>
<script src="/app/js/projects/service-projects.js"></script>


</body>
</html>
