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
    color: white;
}
.navbar-default .navbar-brand:hover {
    color: white;
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
</style>
  </head>

  <body>
    <div class="navmenu navmenu-default navmenu-fixed-left offcanvas-sm">
      <a class="navmenu-brand visible-md visible-lg" href="#"><img src="<?php echo Config::get('URL'); ?>img/logo.png" alt=""></a>
      <ul class="nav navmenu-nav">
        <li<?php if (View::checkForActiveAction($filename, "index")) { echo ' class="active" '; } ?>><a href="/dashboard/index"><i class="icon-home" aria-hidden="true"></i> Principal</a></li>

        <!--My Documents-->
        <?php if (Session::get("user_account_type") == 1) { ?>
          <li <?php if (View::checkForActiveAction($filename, "mydocuments")) { echo ' class="active" '; } ?> >
          <a href="<?php echo Config::get('URL'); ?>dashboard/mydocuments"><i class="icon-file-text" aria-hidden="true"></i> My Documents</a>
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
          <a href="<?php echo Config::get('URL'); ?>dashboard/users" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user" aria-hidden="true"></i> Users</a>
          <ul class="dropdown-menu navmenu-nav">
            <li <?php if (View::checkForActiveAction($filename, "users")) { echo ' class="active" '; } ?>><a href="<?php echo Config::get('URL'); ?>dashboard/users">All Users</a></li>
            <?php if (View::checkForActiveAction($filename, "showProfile")) { ?>
            <li class="active" ><a href="#">View Profile</a></li>
            <?php  } ?>
            <li><a href="#">Invite Users</a></li>
          </ul>
        </li>
           <?php } ?>

           <!--Flows-->
           <?php if (Session::get("user_account_type") >= 7) { ?>
             <li <?php if (View::checkForActiveAction($filename, "flows")) { echo ' class="active" '; } ?> >
             <a href="<?php echo Config::get('URL'); ?>dashboard/flows"><i class="icon-exchange" aria-hidden="true"></i> Flows</a>
            </li>
            <?php } ?>
      </ul>
      <a class="disconnect-button" href="/login/logout">Salir</a>
    </div>

    <div class="navbar navbar-default navbar-fixed-top hidden-md hidden-lg">
      <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".navmenu">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
