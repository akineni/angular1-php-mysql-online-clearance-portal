<?php
    session_start();
    if(!isset($_SESSION["uid"]) || empty($_SESSION["uid"])) header("location: ../login");
?>
<!DOCTYPE html>
<html lang="en" ng-app="ocpApp">
<head>
    <!-- Required meta tags-->
    <base href="/dashboard/">
    <meta name="fragment" content="!" />

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>{{app_name}} dashboard</title>

    <!-- Fontfaces CSS-->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css" integrity="sha512-rRQtF4V2wtAvXsou4iUAs2kXHi3Lj9NE7xJR77DE7GHsxgY9RTWy93dzMXgDIG8ToiRTD45VsDNdTiUagOFeZA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="../css/loader.min.css">

    <!-- Main CSS-->
    <link href="css/theme.min.css" rel="stylesheet" media="all">

    <style type="text/css">
        .capitalize {text-transform: capitalize}

        @keyframes removed-item-animation {
   0% {
        opacity: 1;
        transform: translateX(0);
    }
 
    30% {
        opacity: 1;
        transform: translateX(50px);
    }
 
    80% {
        opacity: 1;
        transform: translateX(-800px);
    }
 
    100% {
        opacity: 0;
        transform: translateX(-800px);
    }
}


@keyframes openspace {
    to {
        height: auto;
    }
}
 
@keyframes restored-item-animation {
    0% {
        opacity: 0;
        transform: translateX(300px);
    }
 
    70% {
        opacity: 1;
        transform: translateX(-50px);
    }
 
    100% {
        opacity: 1;
        transform: translateX(0);
    }
}

        .tr-shadow.ng-enter, .tr-shadow.ng-move {
            animation: 
                openspace .3s ease forwards, 
                restored-item-animation .5s .3s cubic-bezier(.14,.25,.52,1.56) forwards;
        }

        .tr-shadow.ng-enter.ng-enter-active, .tr-shadow.ng-move.ng-move-active {
        }

        .tr-shadow.ng-leave {
            animation: removed-item-animation .8s cubic-bezier(.65,-0.02,.72,.29);
        }

        .hover-green:enabled:hover i{
            color: green;
        }

        .hover-red:enabled:hover i{
            color: #ff3232;
        }

        .hover:hover i{
            transition: all .5s
        }
    </style>

</head>

<body>
    <div class="page-wrapper">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop3 d-none d-lg-block">
            <div class="section__content section__content--p35">
                <div class="header3-wrap">
                    <div class="header__logo">
                        <a href="!">
                            <div style="height:52px">
                                <h2 class="p-t-10" style="color:#fff">{{app_name}}</h2>
                            </div>
                        </a>
                    </div>
                    <div class="header__navbar">
                        <ul class="list-unstyled">
                            <li ng-class="{'active': active=='approved'}">
                                <a href="approved">
                                    <i class="zmdi zmdi-check"></i>
                                    <span class="bot-line"></span>Approved</a>
                            </li>
                            <li ng-class="{'active': active=='unapproved'}">
                                <a href="unapproved">
                                    <i class="zmdi zmdi-close"></i>
                                    <span class="bot-line"></span>Unapproved</a>
                            </li>
                        </ul>
                    </div>

                    <div class="header__tool">
                        <div class="account-wrap">
                            <div class="account-item--style2">
                                <div class="content">
                                    <a href="#" ng-click="navigate('logout.php')"><i class="zmdi zmdi-power"></i> Log out</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- END HEADER DESKTOP-->

        <!-- HEADER MOBILE-->
        <header class="header-mobile header-mobile-2 d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="#" ng-click="navigate('/')">
                            <h2 style="color:#fff;margin: auto">{{app_name}}</h2>
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li>
                            <a href="approved">
                                <i class="zmdi zmdi-check"></i>Approved</a>
                        </li>
                        <li>
                            <a href="unapproved">
                                <i class="zmdi zmdi-close"></i>Unapproved</a>
                        </li>
                        <li>
                            <a href="#" ng-click="navigate('logout.php')">
                                <i class="zmdi zmdi-power"></i>Log out</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE -->

        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">
            <!-- BREADCRUMB-->
            <section class="au-breadcrumb2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="au-breadcrumb-content">
                                <div class="au-breadcrumb-left">
                                    <span class="au-breadcrumb-span">You are here:</span>
                                    <ul class="list-unstyled list-inline au-breadcrumb__list">
                                        <li class="list-inline-item active">
                                            <a href="!">Home</a>
                                        </li>
                                        <li class="list-inline-item seprate" ng-hide="active=='home'">
                                            <span>/</span>
                                        </li>
                                        <li class="list-inline-item" ng-hide="active=='home'">
                                            <span class="capitalize">{{active}}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->

            <!-- WELCOME-->
            <section class="welcome p-t-10">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="title-4">{{user.department | uppercase}}
                            </h1>
                            <hr class="line-seprate">
                        </div>
                    </div>
                </div>
            </section>
            <!-- END WELCOME-->

            <div ui-view >
                <div ng-include="'../views/route_loader.html'"></div>
            </div>

            <!-- COPYRIGHT-->
            <section class="p-t-60 p-b-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright © <?php echo date("Y"); ?> {{app_name}}. All rights reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END COPYRIGHT-->
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.9/angular.min.js" integrity="sha512-CjpXuCK2f47gfxIjQvOwKRVGj01yHWI5qdMTO0qzERireNL30uf+fXLeZ5OxKGDj7r8xpRK4XVxgqXhBbW8Tbg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-animate/1.7.9/angular-animate.min.js" integrity="sha512-BZZD7AT3/rNXSuPEQmLBzi4ZHFluxLLylyZHKllurZx73im0T+/vt3LMwqefXo9LXVLlqK1rexFnMcLM0E1mDA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-router/1.0.28/angular-ui-router.min.js" integrity="sha512-2DoNBBUJq5Wr+Uhjgol+uvmHtxOgrtG1QjuDHltKMdtIiVEhujUi0eb/X21P+P0V9zgXKA/lOKCSq7wj5VYc5A==" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/modules/ocpApp.js"></script>
    <script type="text/javascript" src="../js/route.min.js"></script>

</body>

</html>
<!-- end document-->
