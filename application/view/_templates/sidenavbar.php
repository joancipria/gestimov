<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="http://www.jasny.net/bootstrap/assets/ico/favicon.png">

    <title>Admin Panel | GMOV+</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo Config::get('URL'); ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo Config::get('URL'); ?>css/jasny-bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo Config::get('URL'); ?>css/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <link href="<?php echo Config::get('URL'); ?>css/navmenu.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style media="screen">
    @media only screen and (min-width: 992px) {

    body {
    padding: 0 0 0 200px;
}
.toolbar-button{
    display: inline;
    float: right;
    margin-right: 20px;
}


}
      #section-title:first-letter {
        text-transform:capitalize;
      }
      .navbar-default {
    background-color: #3498DB;
    border-color: #e7e7e7;
    color: white;
}
.navbar-default .navbar-brand {
    color: #777;
}
.navbar-default .navbar-brand:hover {
    color: #777;
}

.navmenu, .navbar-offcanvas {
    width: auto;
}
.disconnect-button{
  position: absolute;
  bottom: 5%;
  left: 5%;
}
.avatar{
  width: 15%;
}
.navmenu-default .navmenu-nav > li > a, .navbar-default .navbar-offcanvas .navmenu-nav > li > a {
    color: #337ab7;
}
.nav > li .active > a:focus, .navbar-default .navbar-offcanvas .navmenu-nav > .active > a:focus {
    color: #337ab7;
    background-color: #eeeeee;
}
.navmenu-default .navmenu-nav > li > a:hover, .navbar-default .navbar-offcanvas .navmenu-nav > li > a:hover, .navmenu-default .navmenu-nav > li > a:focus, .navbar-default .navbar-offcanvas .navmenu-nav > li > a:focus {
    color: #23527c;
    background-color: #eeeeee;
}
.navbar-default {
    background-color: #f8f8f8;
    border-color: #e7e7e7;
}
.nav > li {
    border-bottom: 1px solid #e7e7e7;
}
.navmenu-default .navmenu-nav > .active > a, .navbar-default .navbar-offcanvas .navmenu-nav > .active > a, .navmenu-default .navmenu-nav > .active > a:hover, .navbar-default .navbar-offcanvas .navmenu-nav > .active > a:hover, .navmenu-default .navmenu-nav > .active > a:focus, .navbar-default .navbar-offcanvas .navmenu-nav > .active > a:focus {
    color: #337ab7;
}
.dropdown-menu > .active > a, .dropdown-menu > .active > a:focus, .dropdown-menu > .active > a:hover {
padding-left: 37px;
}
.page-header {
    margin: 80px 0 20px;
}
.page-header h2{
display: inline-block;
}
#wpadminbar {
    direction: ltr;
    color: #337ab7;
    height: auto;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    min-width: 600px;
    z-index: 99999;
    background: #f8f8f8;
    border: 1px solid #e7e7e7;
}
@media screen and (max-width: 992px) {
  #wpadminbar {
    display: none;
}
.page-header {
    margin: 40px 0 20px;
}
}
.navbar-login
{
    width: 305px;
    padding: 10px;
    padding-bottom: 0px;
}

.navbar-login-session
{
    padding: 10px;
    padding-bottom: 0px;
    padding-top: 0px;
}

.icon-size
{
    font-size: 87px;
}
.navbar-right {
    float: right !important;
    margin-right: 0px;
}

.top-navbar-brand-img {
    width: 9%;
    margin-left: 10px;
}
</style>
  </head>

  <body>
    <div id="wpadminbar" class="ltr">
      <img class="top-navbar-brand-img" src="<?php echo Config::get('URL'); ?>img/logo.png" alt="">
      <ul class="nav navbar-nav navbar-right">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="icon-user" aria-hidden="true"></i>
            <strong><?php echo Session::get('user_name'); ?></strong>
            <i class="icon-caret-down" aria-hidden="true"></i>
        </a>
        <ul class="dropdown-menu">
            <li>
                <div class="navbar-login">
                    <div class="row">
                        <div class="col-lg-4">
                            <p class="text-center">
                                <img src="<?php echo Session::get('user_gravatar_image_url'); ?>" alt="">
                            </p>
                        </div>
                        <div class="col-lg-8">
                            <p class="text-left"><strong>Salman Khan</strong></p>
                            <p class="text-left small"><?php echo Session::get('user_email'); ?></p>
                            <p class="text-left">
                                <a target="_blank" href="<?= Config::get('URL') . 'dashboard/showProfile/' . Session::get('user_id'); ?>" class="btn btn-primary btn-block btn-sm">Profile</a>
                            </p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="divider navbar-login-session-bg"></li>
             <li><a href="#">Account Settings <span class="glyphicon glyphicon-cog pull-right"></span></a></li>
<li class="divider"></li>
<li><a href="#">User stats <span class="glyphicon glyphicon-stats pull-right"></span></a></li>
<li class="divider"></li>
<li><a href="#">Messages <span class="badge pull-right"> 42 </span></a></li>
<li class="divider"></li>
<li><a href="#">Favourites Snippets <span class="glyphicon glyphicon-heart pull-right"></span></a></li>
<li class="divider"></li>
<li><a href="/login/logout">Sign Out <i class="icon-sign-out" aria-hidden="true"></i></a></li>
        </ul>
    </li>
</ul>
</div>
    <div class="navmenu navmenu-default navmenu-fixed-left offcanvas-sm">
      <a class="navmenu-brand visible-md visible-lg" href="#"><br><br></a>
      <ul class="nav navmenu-nav">
        <li<?php if (View::checkForActiveAction($filename, "index")) { echo ' class="active" '; } ?>><a href="/dashboard/index"><i class="icon-home" aria-hidden="true"></i> Principal</a></li>

        <!--My Documents-->
        <?php if (Session::get("user_account_type") == 1) { ?>
          <li <?php if (View::checkForActiveAction($filename, "mydocuments")) { echo ' class="active" '; } ?> >
          <a href="<?php echo Config::get('URL'); ?>dashboard/mydocuments/<?php echo Session::get('user_id')?>"><i class="icon-file-text" aria-hidden="true"></i> My Documents</a>
         </li>
         <?php } ?>

         <!--Documents-->
         <?php if (Session::get("user_account_type") >= 2) { ?>
           <li <?php if (View::checkForActiveAction($filename, "documents")) { echo ' class="active" '; } ?> >
           <a href="<?php echo Config::get('URL'); ?>dashboard/documents"><i class="icon-file-text" aria-hidden="true"></i> Documents</a>
          </li>
          <?php } ?>

         <!--Students-->
         <?php if (Session::get("user_account_type") == 2) { ?>
           <li <?php if (View::checkForActiveAction($filename, "students")) { echo ' class="active" '; } ?> >
           <a href="<?php echo Config::get('URL'); ?>dashboard/students"><i class="icon-user" aria-hidden="true"></i> Students</a>
          </li>
          <?php } ?>

          <!--Mobilities-->
          <?php if (Session::get("user_account_type") >= 2) { ?>
            <li <?php if (View::checkForActiveAction($filename, "mobilities")) { echo ' class="active" '; } ?> >
            <a href="<?php echo Config::get('URL'); ?>dashboard/mobilities"><i class="icon-flag" aria-hidden="true"></i> Mobilities</a>
           </li>
           <?php } ?>

           <!--Centers-->
           <?php if (Session::get("user_account_type") >= 2) { ?>
             <li <?php if (View::checkForActiveAction($filename, "centers")) { echo ' class="active" '; } ?> >
             <a href="<?php echo Config::get('URL'); ?>dashboard/centers"><i class="icon-building" aria-hidden="true"></i> Centers</a>
            </li>
            <?php } ?>

          <!--Users-->
          <?php if (Session::get("user_account_type") >= 7) { ?>
          <li <?php if (View::checkForActiveAction($filename, "users")) { echo ' class="active open" '; } ?> class="dropdown <?php if (View::checkForActiveAction($filename, "showProfile")) { echo 'open'; } ?>">
          <a href="<?php echo Config::get('URL'); ?>dashboard/users"><i class="icon-user" aria-hidden="true"></i> Users</a>
        </li>
           <?php } ?>

           <!--Flows-->
           <?php if (Session::get("user_account_type") >= 7) { ?>
             <li <?php if (View::checkForActiveAction($filename, "flows")) { echo ' class="active" '; } ?> >
             <a href="<?php echo Config::get('URL'); ?>dashboard/flows"><i class="icon-exchange" aria-hidden="true"></i> Flows</a>
            </li>
            <?php } ?>
      </ul>
    </div>

    <div class="navbar navbar-default navbar-fixed-top hidden-md hidden-lg">
      <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".navmenu">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
