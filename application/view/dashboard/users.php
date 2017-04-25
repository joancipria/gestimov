<span id="section-title" class="navbar-brand" href="#">Users</span>
</div>
<div class="page-header">
  <h1>Users page</h1> <?php $this->renderFeedbackMessages(); ?>
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
</div>
