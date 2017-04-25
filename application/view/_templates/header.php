<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>GMOV+ | Home</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="<?php echo Config::get('URL'); ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo Config::get('URL'); ?>css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo Config::get('URL'); ?>css/main.css">
    <link rel="stylesheet" href="<?php echo Config::get('URL'); ?>css/sl-slide.css">
    <link rel="stylesheet" href="<?php echo Config::get('URL'); ?>css/custom-style.css">


    <script src="<?php echo Config::get('URL'); ?>js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo Config::get('URL'); ?>img/ico/favicon.png">
</head>

<body style="padding-top:0px;background-color: #fff;">
  <header id="nav-bar" class="container example5">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar5">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              <a id="logo" class="pull-left" href="index.php"></a>
              </div>
              <div id="navbar5" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                  <li <?php if (View::checkForActiveController($filename, "index")) { echo ' class="active" '; } ?> ><a href="/index">HOME</a></li>
                  <li <?php if (View::checkForActiveController($filename, "faq")) { echo ' class="active" '; } ?> ><a href="/faq">FAQ</a></li>
                  <li class="login <?php if (View::checkForActiveController($filename, "login")) { echo ' active '; } ?>">
                      <a href="/login"><i class="icon-lock"></i></a>
                  </li>
                </ul>
              </div>
              <!--/.nav-collapse -->
            </div>
            <!--/.container-fluid -->
          </nav>
  </header>
