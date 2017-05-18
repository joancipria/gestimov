<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Users <small> Some examples to get you started</small></h3>
              </div>  <?php $this->renderFeedbackMessages(); ?>


              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <span >
 <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-user-plus" aria-hidden="true"></i></button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>List of Users <small>Users</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table style="width:100%;" id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Surname</th>
                          <th>E-mail</th>
                          <th>Activated</th>
                          <th>Role</th>
                          <th>Actions</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php foreach ($this->users as $user) { ?>
                            <tr class="<?= ($user->user_active == 0 ? 'inactive' : 'active'); ?>">
                                <td>
                                  <?php if (isset($user->user_avatar_link)) { ?>
                                      <a href="<?= Config::get('URL') . 'dashboard/showProfile/' . $user->user_id; ?>"><img class="avatar" src="<?= $user->user_avatar_link; ?>"/></a>
                                  <?php } ?>
                                <?= $user->user_name; ?></td>
                                <td><?= $user->nom;?> <?= $user->ape;?></td>
                                <td><?= $user->user_email; ?></td>
                                <td><?= ($user->user_active == 0 ? 'No' : 'Yes'); ?></td>
                                <td>
                                  <?php if ($user->user_account_type == 1) { ?>
                                      Student
                                  <?php } ?>
                                  <?php if ($user->user_account_type == 2) { ?>
                                      Teacher
                                  <?php } ?>
                                  <?php if ($user->user_account_type >= 7) { ?>
                                      Admin
                                  <?php } ?>
                                </td>
                                <td>
                                <form action="<?php echo Config::get('URL'); ?>dashboard/changeUserRole_action" method="post">
                                      <?php if ($user->user_account_type == 1) { ?>
                                          <input type="submit" name="user_account_upgrade" value="Upgrade account (to Teacher)" />
                                    <?php } else if ($user->user_account_type == 2) { ?>
                                        <input type="submit" name="user_account_downgrade" value="Downgrade account (to Student)" />
                                    <?php } ?>
                                    <input type="hidden" name="user_id" value="<?= $user->user_id; ?>" />
                                </form>
                                <form action="<?= config::get("URL"); ?>admin/actionAccountSettings" method="post">


                                      <input type="number" name="suspension" />
                                    <input type="checkbox" name="softDelete" <?php if ($user->user_deleted) { ?> checked <?php } ?> />

                                        <input type="hidden" name="user_id" value="<?= $user->user_id; ?>" />
                                        <input type="submit" />
                                </form>
                                </td>
                            </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Register new User</h4>
                        </div>
                        <div class="modal-body">
                          <form method="post" action="<?php echo Config::get('URL'); ?>register/register_action">
                              <!-- the user name input field uses a HTML5 pattern check -->
                              <label class="col-md-4 control-label">National Number Identifier:</label>
                              <input class="form-control" pattern="[a-zA-Z0-9]{2,64}" name="user_name" placeholder="National Number Identifier" required/>

                              <label class="col-md-4 control-label">Email:</label>
                              <input class="form-control" type="text" name="user_email" placeholder="Email address" required />

                              <label class="col-md-4 control-label">Repeat Email:</label>
                              <input class="form-control" type="text" name="user_email_repeat" placeholder="Repeat Email address" required />

                              <label class="col-md-4 control-label">Center:</label>
                              <select class="form-control" name="user_codcent">
                              <?php foreach ($this->centers as $center) { ?>
                                <option value="<?= $center->cod;?>"><?= $center->nom;?></option>
                              <?php } ?>
                             </select>

                        <img id="captcha" src="<?php echo Config::get('URL'); ?>register/showCaptcha" />
                        <input class="form-control" type="text" name="captcha" placeholder="Please enter above characters" required/>


                              <!-- quick & dirty captcha reloader -->
                              <a href="#" style="display: block; font-size: 11px; margin: 5px 0 15px 0; text-align: center"
                                 onclick="document.getElementById('captcha').src = '<?php echo Config::get('URL'); ?>register/showCaptcha?' + Math.random(); return false">Reload Captcha</a>

                              <input type="submit" value="Register" />
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>

                      </div>
                    </div>
                  </div>

                  <!-- jQuery -->
                  <script src="<?php echo Config::get('URL'); ?>js/jquery/jquery.min.js"></script>
                  <!-- Bootstrap -->
                  <script src="<?php echo Config::get('URL'); ?>js/bootstrap/bootstrap.min.js"></script>
                  <!-- Custom Theme Scripts -->
                  <script src="<?php echo Config::get('URL'); ?>js/admin/custom.min.js"></script>
                  <!-- PNotify -->
                  <script type="text/javascript" src="<?php echo Config::get('URL'); ?>js/pnotify/pnotify.custom.min.js"></script>
                  <!-- DataTables -->
                  <script type="text/javascript" charset="utf8" src="<?php echo Config::get('URL'); ?>js/datatables/jquery.dataTables.min.js"></script>
                  <script src="<?php echo Config::get('URL'); ?>js/datatables/dataTables.bootstrap.min.js" charset="utf-8"></script>
                  <script src="<?php echo Config::get('URL'); ?>js/datatables/dataTables.buttons.min.js" charset="utf-8"></script>
                  <script src="<?php echo Config::get('URL'); ?>js/datatables/buttons.bootstrap.min.js" charset="utf-8"></script>
                  <script src="<?php echo Config::get('URL'); ?>js/datatables/jszip.min.js" charset="utf-8"></script>
                  <script src="<?php echo Config::get('URL'); ?>js/datatables/buttons.html5.min.js" charset="utf-8"></script>
                  <script src="<?php echo Config::get('URL'); ?>js/datatables/buttons.print.min.js" charset="utf-8"></script>
                  <script src="<?php echo Config::get('URL'); ?>js/datatables/buttons.colVis.min.js" charset="utf-8"></script>
                  <script src="<?php echo Config::get('URL'); ?>js/datatables/pdfmake.min.js" charset="utf-8"></script>
                  <script src="<?php echo Config::get('URL'); ?>js/datatables/vfs_fonts.js" charset="utf-8"></script>

          <script type="text/javascript">
          $(document).ready(function() {
              $('#datatable-buttons').DataTable( {
                 dom: 'lBfrtip',
                 buttons: [
                     {
                         extend: 'copyHtml5',
                         title: 'Users',
                         text: '<i class="fa fa-clipboard" aria-hidden="true"></i>',
                         exportOptions: {
                             columns: [ 0, ':visible' ]
                         }
                     },
                     {
                         extend: 'excelHtml5',
                         title: 'Users',
                         text: '<i class="fa fa-file-excel-o" aria-hidden="true"></i>',
                         exportOptions: {
                             columns: ':visible'
                         }
                     },
                     {
                         extend: 'pdfHtml5',
                         title: 'Users',
                         text: '<i class="fa fa-file-pdf-o" aria-hidden="true"></i>',
                         exportOptions: {
                             columns: ':visible'
                         }
                     },
                     {
                         extend: 'print',
                         title: 'Users',
                         text: '<i class="fa fa-print" aria-hidden="true"></i>',
                         exportOptions: {
                             columns: ':visible'
                         }
                     },
                     'colvis'
                 ]
             } );
          } );

          </script>
