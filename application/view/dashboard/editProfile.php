<span id="section-title" class="navbar-brand" href="#">Edit profile</span>
</div>
<div class="page-header">
  <h2>My profile</h2>
</div>

<?php if ($this->user) { ?>
  <h4 class=""><i class="icon-user"></i> Personal Information</h4>
<form action="<?php echo Config::get('URL'); ?>user/editUserName_action" class="form-horizontal" role="form">
  <div class="row">
    <div class="col-sm-6 col-lg-4">
      <div class="form-group">
        <label class="col-md-4 control-label">Name:</label>
        <div class="col-md-8">
          <input class="form-control" value="<?= $this->user->nom ?>">
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-4">
      <div class="form-group">
        <label class="col-md-4 control-label">Surname:</label>
        <div class="col-md-8">
          <input class="form-control" value="<?= $this->user->ape ?>">
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-4">
      <div class="form-group">
        <label class="col-md-4 control-label">Date of Birth:</label>
        <div class="col-md-8">
          <input class="form-control" value="<?= $this->user->fechanac ?>">
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-4">
      <div class="form-group">
        <label class="col-md-4 control-label">Home Adress:</label>
        <div class="col-md-8">
          <input class="form-control" value="<?= $this->user->direccion ?>">
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-4">
      <div class="form-group">
        <label class="col-md-4 control-label">City:</label>
        <div class="col-md-8">
          <input class="form-control" value="<?= $this->user->poblacion ?>">
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-4">
      <div class="form-group">
        <label class="col-md-4 control-label">Postal Code:</label>
        <div class="col-md-8">
          <input class="form-control" value="<?= $this->user->cp ?>">
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-4">
      <div class="form-group">
        <label class="col-md-4 control-label">Province:</label>
        <div class="col-md-8">
          <input class="form-control" value="<?= $this->user->provincia ?>">
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-4">
      <div class="form-group">
        <label class="col-md-4 control-label">Country:</label>
        <div class="col-md-8">
          <input class="form-control" value="<?= $this->user->pais ?>">
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-4">
      <div class="form-group">
        <label class="col-md-4 control-label">Telphone Number:</label>
        <div class="col-md-8">
          <input class="form-control" value="<?= $this->user->telefono ?>">
        </div>
      </div>
    </div>
  </div><!-- /.row this actually does not appear to be needed with the form-horizontal -->
</form>
<?php } ?>
