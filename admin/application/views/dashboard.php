<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width:device-width, initial-scale:1">
    <title>Billmate</title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?php echo base_url('/assets/materialize/css/materialize.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('/assets/admin.css'); ?>" rel="stylesheet">
</head>

<body>
    <nav>
        <div class="navbar-wrapper">
            <div id="menu" class="left center">
                <div id="nav-icon3">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <a href="#" class="brand-logo center">Billmate</a>
            <ul class="right hide-on-med-and-down">
                <li>
                    <a class="dropdown-button left" href="#" data-activates='dropdown1'>
                        <i class="material-icons md-36 left" style="margin:5% 0%">person</i>
                        <p class="nomarg left ">admin</p>
                        <i class="material-icons left" style="margin-top:12%">arrow_drop_down</i>
                    </a>
                    <ul id="dropdown1" class="dropdown-content">
                        <li>
                            <a href="#">
                                <i class="material-icons md-36 left nomarg">power_settings_new</i> Logout
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>

    <div>
        <ul class="side-nav">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Table1</a></li>
            <li><a href="#">Table2</a></li>
            <li><a href="#">Table3</a></li>
            <li><a href="#">Table4</a></li>
            <li><a href="#">Table5</a></li>
            <li><a href="#">Table6</a></li>
            <li><a href="#">Table7</a></li>
        </ul>

    </div>

    <div class="container" style="margin-top:35px">
        <div class="row">
            <div class="col m5 out_box">
                <img class="responsive-img" src="<?php echo base_url('/assets/materialize/img/icon.png'); ?>">
                <h5>Novelity News Paper</h5>
                <p>This is the mobile app for users</br>
                 News from Mumbai and Editor </br>
               </p>
            </div>
            <div class="col m7">
                
            </div>
        </div>
    </div>

    <script type="text/javascript" src="<?php echo base_url('/assets/materialize/js/jquery.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/assets/materialize/js/materialize.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/assets/main.js'); ?>"></script>
    <script>
        $('#menu').click(function () {
            $('.side-nav').toggleClass('sidenav_left')
        })
        $(".side-nav li").click(function () {
            $('.side-nav').removeClass('sidenav_left');
        })
        $(document).ready(function () {
            $('#nav-icon1,#nav-icon2,#nav-icon3,#nav-icon4').click(function () {
                $(this).toggleClass('open');
            });
        });
    </script>
</body>

</html>