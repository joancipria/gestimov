<span id="section-title" class="navbar-brand" href="#">Documents</span>
</div>
<div class="page-header">
  <h2>Documents</h2>
</div>
<div id="main-content" class="container">
  <table class="table table-striped">
      <thead>
      <tr>
          <td>Name</td>
          <td>Surname</td>
          <td>Center</td>
          <td>Peronal Photo</td>
      </tr>
      </thead>
      <?php foreach ($this->users as $user) { ?>
          <tr class="<?= ($user->user_active == 0 ? 'inactive' : 'active'); ?>">
              <td><?= $user->nom;?></td>
              <td><?= $user->ape;?></td>
              <td><?= $user->nomcent;?></td>
              <td><a target="_blank" href="<?= $user->personalfoto;?>">See</a> </td>
          </tr>
      <?php } ?>
  </table>

</div><!-- /.container -->
