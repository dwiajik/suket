<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<!--
    Supersized - Fullscreen Slideshow jQuery Plugin
    Version : 3.2.7
    Site    : www.buildinternet.com/project/supersized

    Author  : Sam Dunn
    Company : One Mighty Roar (www.onemightyroar.com)
    License : MIT License / GPL License
-->

<head>
    <link rel="stylesheet" type="text/css" href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/assets/font-awesome/css/font-awesome.min.css">
    <title>Pemilu KMTETI 2015</title>
<!--    <link rel="SHORTCUT ICON" href="assets/img/favicon.ico">-->

    <link rel="stylesheet" href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/assets/css/supersized.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/assets/css/supersized.shutter.css" type="text/css" media="screen" />
    <script type="text/javascript" src="<?php $_SERVER["DOCUMENT_ROOT"] ?>/assets/js/jquery.js"></script>
    <script type="text/javascript" src="<?php $_SERVER["DOCUMENT_ROOT"] ?>/assets/js/supersized.3.2.7.min.js"></script>
    <script type="text/javascript" src="<?php $_SERVER["DOCUMENT_ROOT"] ?>/assets/js/supersized.shutter.min.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/assets/style.css">

    <script type="text/javascript">

        jQuery(function($){

                $.supersized({

                    // Functionality
                    slide_interval          :   900000,       // Length between transitions
                    transition              :   1,          // 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
                    transition_speed        :   1000,        // Speed of transition

                    // Components                           
                    slide_links             :   'blank',    // Individual links for each slide (Options: false, 'num', 'name', 'blank')
                    slides                  :   [           // Slideshow Images
                        {image : '<?php echo $config->bgLogin; ?>', title : 'Blablabla'},
            {image : '<?php echo $config->bgLogin; ?>', title : 'Blablabla'}

        ]

        });
        });

    </script>

</head>

<body>
<div class="container">



    <div class="row" style="margin-top:200px;">
        <div class="col-md-4 col-md-offset-4 text-center logo-margin ">
            <img src="<?php echo $config->logo; ?>"  width="120px;">
        </div>
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel" style="background-color: transparent;">
                <div class="panel-body" style="padding: 55px;">
                    <form id="login" method="post" action="<?php $_SERVER["DOCUMENT_ROOT"] ?>/vote/login" role="form" autocomplete="off">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Username" type="username" name="username" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" type="password" name="password" value="" >
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <input value="Login" type="submit" class="btn btn-lg btn-vote2 mrg-top-30" style="margin-left:20px; width: 150px; margin-left: 50px;"></input>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php $_SERVER["DOCUMENT_ROOT"] ?>/assets/js/bootstrap.min.js"></script>

</body>
</html>