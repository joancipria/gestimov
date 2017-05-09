<span id="section-title" class="navbar-brand" href="#">Documents</span>
</div>
<div class="page-header">
  <h2>Mobilities</h2>
</div>
<div id="main-content" class="container">
  <table class="table table-striped">
      <thead>
      <tr>
          <td>Name</td>
          <td>Surname</td>
          <td>NDI</td>
          <td>Country</td>
          <td>Center</td>
          <td>Flow</td>
          <td>Departure</td>
          <td>Arrive</td>
          <td>Destination</td>
          <td>City</td>
      </tr>
      </thead>
      <?php foreach ($this->users as $user) { ?>
          <tr class="<?= ($user->user_active == 0 ? 'inactive' : 'active'); ?>">
              <td><?= $user->nom;?></td>
              <td><?= $user->ape;?></td>
              <td><?= $user->dni;?></td>
              <td><?= $user->pais;?></td>
              <td><?= $user->nomcent;?></td>
              <td><?= $user->flujo?></td>
              <td><?= $user->fechasalida?></td>
              <td><?= $user->fechallegada?></td>
              <td><?= $user->dpais?></td>
              <td><?= $user->dciudad?></td>
          </tr>
      <?php } ?>
  </table>

</div><!-- /.container -->
