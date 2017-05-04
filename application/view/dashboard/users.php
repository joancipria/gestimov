<span id="section-title" class="navbar-brand" href="#">Users</span>
</div>
<div class="page-header">
  <h2>Users page</h2>
  <button type="button" class="btn btn-primary btn-md toolbar-button" data-toggle="modal" data-target="#myModal">New User</button>
  <?php $this->renderFeedbackMessages(); ?>
</div>
<div id="main-content" class="container">
    <div class="box">
        <!-- echo out the system feedback (error and success messages) -->
        <div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>Username</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Activated</td>
                    <td>Role</td>
                    <td>Actions</td>
                </tr>
                </thead>
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
                          <?php if ($user->user_account_type == 7) { ?>
                              Admin
                          <?php } ?>
                          <br><a href="<?= Config::get('URL') . 'dashboard/showProfile/' . $user->user_id; ?>">Edit</a>
                        </td>
                        <form action="<?= config::get("URL"); ?>admin/actionAccountSettings" method="post">
                            <td><input type="number" name="suspension" />
                            <input type="checkbox" name="softDelete" <?php if ($user->user_deleted) { ?> checked <?php } ?> />

                                <input type="hidden" name="user_id" value="<?= $user->user_id; ?>" />
                                <input type="submit" />
                            </td>
                        </form>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>

    <!-- Modal -->
<div style="margin-top:50px;" id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add new user</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo Config::get('URL'); ?>register/register_action">
            <!-- the user name input field uses a HTML5 pattern check -->
            <div class="form-group">
              <label class="col-md-4 control-label">National Number Identifier:</label>
              <div class="col-md-8">
                <input class="form-control" pattern="[a-zA-Z0-9]{2,64}" name="user_name" placeholder="National Number Identifier" required/>
              </div>
            </div>

            <div class="form-group">
            <label class="col-md-4 control-label">Email:</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="user_email" placeholder="Email address" required />
            </div>
          </div>

          <div class="form-group">
          <label class="col-md-4 control-label">Repeat Email:</label>
          <div class="col-md-8">
            <input class="form-control" type="text" name="user_email_repeat" placeholder="Repeat Email address" required />
          </div>
        </div>

        <div class="form-group">
        <label class="col-md-4 control-label">Password:</label>
        <div class="col-md-8">
          <input class="form-control" type="password" name="user_password_new" pattern=".{6,}" placeholder="Password (6+ characters)" required autocomplete="off" />
        </div>
      </div>

      <div class="form-group">
      <label class="col-md-4 control-label">Repeat Password:</label>
      <div class="col-md-8">
        <input class="form-control" type="password" name="user_password_repeat" pattern=".{6,}" required placeholder="Repeat your password" autocomplete="off" />
      </div>
    </div>

    <div class="form-group">
    <label class="col-md-4 control-label">Center Id:</label>
    <div class="col-md-8">
      <input class="form-control" type="text" name="user_codcent" required placeholder="Center Id"/>
    </div>
  </div>

    <div class="form-group">
      <img id="captcha" src="<?php echo Config::get('URL'); ?>register/showCaptcha" />
    <div class="col-md-8">
      <input class="form-control" type="text" name="captcha" placeholder="Please enter above characters" required/>
    </div>
  </div>


            <!-- quick & dirty captcha reloader -->
            <a href="#" style="display: block; font-size: 11px; margin: 5px 0 15px 0; text-align: center"
               onclick="document.getElementById('captcha').src = '<?php echo Config::get('URL'); ?>register/showCaptcha?' + Math.random(); return false">Reload Captcha</a>

            <input type="submit" value="Register" />
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</div>
