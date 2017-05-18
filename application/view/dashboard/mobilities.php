<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Mobilities<small> Some examples to get you started</small></h3>
              </div>  <?php $this->renderFeedbackMessages(); ?>


              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
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
                    <h2>List of Student's Mobilities <small>Users</small></h2>
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
                          <th>NDI</th>
                          <th>Country</th>
                          <th>Center</th>
                          <th>Flow</th>
                          <th>Departure</th>
                          <th>Arrive</th>
                          <th>Destination</th>
                          <th>City</th>
                        </tr>
                      </thead>


                      <tbody>
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
                      </tbody>
                    </table>
                  </div>
                </div>
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
               title: 'Mobilities',
               text: '<i class="fa fa-clipboard" aria-hidden="true"></i>',
               exportOptions: {
                   columns: [ 0, ':visible' ]
               }
           },
           {
               extend: 'excelHtml5',
               title: 'Mobilities',
               text: '<i class="fa fa-file-excel-o" aria-hidden="true"></i>',
               exportOptions: {
                   columns: ':visible'
               }
           },
           {
               extend: 'pdfHtml5',
               title: 'Mobilities',
               text: '<i class="fa fa-file-pdf-o" aria-hidden="true"></i>',
               exportOptions: {
                   columns: ':visible'
               }
           },
           {
               extend: 'print',
               title: 'Mobilities',
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
