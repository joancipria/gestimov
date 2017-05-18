<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gestimov+ | Dashboard </title>

    <!-- Bootstrap -->
    <link href="<?php echo Config::get('URL'); ?>css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo Config::get('URL'); ?>css/font-awesome/font-awesome.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo Config::get('URL'); ?>css/admin/custom.css" rel="stylesheet">

    <!-- Datatables -->
    <link href="<?php echo Config::get('URL'); ?>css/datatables/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo Config::get('URL'); ?>css/datatables/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo Config::get('URL'); ?>css/dropzone/dropzone.css" media="all" rel="stylesheet" type="text/css" />

    <!-- PNotify -->
    <link href="<?php echo Config::get('URL'); ?>css/pnotify/pnotify.custom.min.css" media="all" rel="stylesheet" type="text/css" />
    <link rel="preload" href="<?php echo Config::get('URL'); ?>js/datatables/vfs_fonts.js" as="script">
    <link rel="preload" href="<?php echo Config::get('URL'); ?>js/datatables/pdfmake.min.js" as="script">
    <style media="screen">
      body{
        background-color: #F7F7F7;
      }
    </style>
  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"> <span>GestiMov+</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="<?php echo Session::get('user_gravatar_image_url'); ?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo Session::get('user_name'); ?></h2><br>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li<?php if (View::checkForActiveAction($filename, "index")) { echo ' class="active" '; } ?>><a href="/dashboard/index"><i class="fa fa-home"></i> Home<span class="label label-success pull-right"></span></a></li>

                  <!--My Documents-->
                  <?php if (Session::get("user_account_type") == 1) { ?>
                    <li <?php if (View::checkForActiveAction($filename, "mydocuments")) { echo ' class="active" '; } ?> >
                    <a href="<?php echo Config::get('URL'); ?>dashboard/mydocuments/"><i class="fa fa-file-text-o"></i> My Documents<span class="label label-success pull-right"></span></a>
                   </li>
                   <?php } ?>

                   <!--Documents-->
                   <?php if (Session::get("user_account_type") >= 2) { ?>
                     <li <?php if (View::checkForActiveAction($filename, "documents")) { echo ' class="active" '; } ?> >
                     <a href="<?php echo Config::get('URL'); ?>dashboard/documents"><i class="fa fa-file-text-o"></i> Documents<span class="label label-success pull-right"></span></a>
                    </li>
                    <?php } ?>

                   <!--Students-->
                   <?php if (Session::get("user_account_type") >= 2) { ?>
                     <li <?php if (View::checkForActiveAction($filename, "students")) { echo ' class="active" '; } ?> >
                     <a href="<?php echo Config::get('URL'); ?>dashboard/students"><i class="fa fa-graduation-cap"></i> Students<span class="label label-success pull-right"></span></a>
                    </li>
                    <?php } ?>

                    <!--Users-->
                    <?php if (Session::get("user_account_type") >= 7) { ?>
                    <li <?php if (View::checkForActiveAction($filename, "users")) { echo ' class="active open" '; } ?> class="dropdown <?php if (View::checkForActiveAction($filename, "showProfile")) { echo 'open'; } ?>">
                    <a href="<?php echo Config::get('URL'); ?>dashboard/users"><i class="fa fa-users"></i> Users<span class="label label-success pull-right"></span></a>
                  </li>
                     <?php } ?>

                    <!--Mobilities-->
                    <?php if (Session::get("user_account_type") >= 2) { ?>
                      <li <?php if (View::checkForActiveAction($filename, "mobilities")) { echo ' class="active" '; } ?> >
                      <a href="<?php echo Config::get('URL'); ?>dashboard/mobilities"><i class="fa fa-plane"></i> Mobilities<span class="label label-success pull-right"></span></a>
                     </li>
                     <?php } ?>



                     <!--Flows-->
                     <?php if (Session::get("user_account_type") >= 7) { ?>
                       <li <?php if (View::checkForActiveAction($filename, "flows")) { echo ' class="active" '; } ?> >
                       <a href="<?php echo Config::get('URL'); ?>dashboard/flows"><i class="fa fa-exchange"></i> Flows<span class="label label-success pull-right"></span></a>
                      </li>
                      <?php } ?>

                      <!--Centers-->
                      <?php if (Session::get("user_account_type") >= 2) { ?>
                        <li <?php if (View::checkForActiveAction($filename, "centers")) { echo ' class="active" '; } ?> >
                        <a href="<?php echo Config::get('URL'); ?>dashboard/centers"><i class="fa fa-building"></i> Consortium<span class="label label-success pull-right"></span></a>
                       </li>
                       <?php } ?>

                </ul>
              </div>


            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a href="/login/logout" data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav class="" role="navigation">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo Session::get('user_gravatar_image_url'); ?>" alt=""><?php echo Session::get('user_name'); ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?= Config::get('URL') . 'dashboard/editProfile/'?>"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="/login/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="#" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="#" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="#" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="#" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
