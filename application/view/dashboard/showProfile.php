<style media="screen">
.user-row {
  margin-bottom: 14px;
}

.user-row:last-child {
  margin-bottom: 0;
}

.dropdown-user {
  margin: 13px 0;
  padding: 5px;
  height: 100%;
}

.dropdown-user:hover {
  cursor: pointer;
}

.table-user-information > tbody > tr {
  border-top: 1px solid rgb(221, 221, 221);
}

.table-user-information > tbody > tr:first-child {
  border-top: 0;
}


.table-user-information > tbody > tr > td {
  border-top: 0;
}
.toppad
{margin-top:20px;
}

</style>

<span id="section-title" class="navbar-brand" href="#">User Profile</span>
</div>
<div class="page-header">
  <h1>User Profile</h1>
</div>
<div id="main-content" class="container">



        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>


        <?php if ($this->user) { ?>

          <div class="container">
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >


                    <div class="panel panel-info">
                      <div class="panel-heading">
                        <h3 class="panel-title"><?= $this->user->nom ?> <?= $this->user->ape ?></h3>
                      </div>
                      <div class="panel-body">
                        <div class="row">
                          <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="<?= $this->user->user_avatar_link; ?>" class="img-circle img-responsive"> </div>

                          <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                            <dl>
                              <dt>DEPARTMENT:</dt>
                              <dd>Administrator</dd>
                              <dt>HIRE DATE</dt>
                              <dd>11/12/2013</dd>
                              <dt>DATE OF BIRTH</dt>
                                 <dd>11/12/2013</dd>
                              <dt>GENDER</dt>
                              <dd>Male</dd>
                            </dl>
                          </div>-->
                          <div class=" col-md-9 col-lg-9 ">
                            <table class="table table-user-information">
                              <tbody>
                                <tr>
                                  <td>Name:</td>
                                  <td><?= $this->user->nom ?></td>
                                </tr>
                                <tr>
                                  <td>Surname:</td>
                                  <td><?= $this->user->ape ?></td>
                                </tr>
                                <tr>
                                  <td>DNI:</td>
                                  <td><?= $this->user->user_name ?></td>
                                </tr>
                                <tr>
                                  <td>Date of Birth:</td>
                                  <td><?= $this->user->fechanac ?></td>
                                </tr>

                                   <tr>
                                  <tr>
                                  <td>Home Address</td>
                                  <td><?= $this->user->direccion ?></td>
                                </tr>
                                <tr>
                                  <td>Email</td>
                                  <td><a href="mailto:<?= $this->user->user_email ?>"><?= $this->user->user_email ?></a></td>
                                </tr>
                                  <td>Phone Number</td>
                                  <td><?= $this->user->telefono ?></td>
                                </tr>
                                <tr>
                                  <td>Country:</td>
                                  <td><?= $this->user->pais ?></td>
                                </tr>
                                <tr>
                                  <td>Town:</td>
                                  <td><?= $this->user->poblacion ?> - <?= $this->user->cp ?> (<?= $this->user->provincia ?>)</td>
                                </tr>

                              </tbody>
                            </table>

                            <a href="#" class="btn btn-primary">My Sales Performance</a>
                            <a href="#" class="btn btn-primary">Team Sales Performance</a>
                          </div>
                        </div>
                      </div>
                           <div class="panel-footer">
                                  <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                                  <span class="pull-right">
                                      <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                                      <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                  </span>
                              </div>

                    </div>
                  </div>
                </div>
              </div>
        <?php } ?>
<script type="text/javascript">
$(document).ready(function() {
  var panels = $('.user-infos');
  var panelsButton = $('.dropdown-user');
  panels.hide();

  //Click dropdown
  panelsButton.click(function() {
      //get data-for attribute
      var dataFor = $(this).attr('data-for');
      var idFor = $(dataFor);

      //current button
      var currentButton = $(this);
      idFor.slideToggle(400, function() {
          //Completed slidetoggle
          if(idFor.is(':visible'))
          {
              currentButton.html('<i class="glyphicon glyphicon-chevron-up text-muted"></i>');
          }
          else
          {
              currentButton.html('<i class="glyphicon glyphicon-chevron-down text-muted"></i>');
          }
      })
  });


  $('[data-toggle="tooltip"]').tooltip();

  $('button').click(function(e) {
      e.preventDefault();
      alert("This is a demo.\n :-)");
  });
});
</script>
</div><!-- /.container -->
