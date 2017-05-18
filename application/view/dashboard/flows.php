
                      <!-- page content -->
                      <div class="right_col" role="main">
                        <div class="">
                          <div class="page-title">
                            <div class="title_left">
                              <h3>Flows</h3>
                            </div><?php $this->renderFeedbackMessages(); ?>

                            <div class="title_right">
                              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
                                  <span >
               <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Add Flow  <i class="fa fa-exchange" aria-hidden="true"></i></button>
                                  </span>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="clearfix"></div>

                          <div class="">
                              <?php foreach ($this->flows as $flow) { ?>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                              <div class="x_panel">
                                <div class="x_title">
                                  <h2><i class="fa fa-exchange" aria-hidden="true"></i> <?= $flow->ciudad;?> <small><?= $flow->pais;?></small></h2>
                                  <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                      <ul class="dropdown-menu" role="menu">
                                        <li><a href="remove_flow_action/<?= $flow->codflujo;?>">Remove Flow</a>
                                        </li>
                                      </ul>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                  </ul>
                                  <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                  <p>From <strong><?= $flow->fechasalida;?></strong> to <strong><?= $flow->fechallegada;?></strong> students will be in <strong><?= $flow->ciudad;?> (<?= $flow->pais;?>)</strong></p>
                                  <table style="width:100%;" id="datatable-buttons" class="table table-striped table-bordered">
                                    <thead>
                                      <tr>
                                        <th>Name</th>
                                        <th>Surname</th>
                                        <th>NDI</th>
                                        <th>Center</th>
                                      </tr>
                                    </thead>


                                    <tbody>
                                      <?php foreach ($this->users as $user) { ?>
                                        <?php if ($user->dpais == $flow->pais): ?>

                                                <tr class="<?= ($user->user_active == 0 ? 'inactive' : 'active'); ?>">
                                                    <td><?= $user->nom;?></td>
                                                    <td><?= $user->ape;?></td>
                                                    <td><?= $user->dni;?></td>
                                                    <td><?= $user->nomcent;?></td>
                                                </tr>
                                          <?php endif; ?>
                                            <?php } ?>
                                    </tbody>
                                  </table>
                                </div>
                              </div>                            </div>
                        <?php } ?>
                            <div class="clearfix"></div>

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
                                                <form method="post" action="<?php echo Config::get('URL'); ?>dashboard/register_flow_action">
                                                    <!-- the user name input field uses a HTML5 pattern check -->
                                                    <label class="col-md-4 control-label">Country Destination</label>
                                                    <input class="form-control" name="country" placeholder="Country Destination" required/>

                                                    <label class="col-md-4 control-label">City:</label>
                                                    <input class="form-control" type="text" name="city" placeholder="City" required />

                                                    <label class="col-md-4 control-label">Leaving Date</label>
                                                    <input class="form-control" type="text" name="leave_date" placeholder="Leaving Date" required />

                                                    <label class="col-md-4 control-label">Arrive Date:</label>
                                                    <input class="form-control" type="text" name="arrive_date" placeholder="Arrive Date" required />

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

                      <!-- /page content -->
                      <!-- jQuery -->
                      <script src="<?php echo Config::get('URL'); ?>js/jquery/jquery.min.js"></script>
                      <!-- Bootstrap -->
                      <script src="<?php echo Config::get('URL'); ?>js/bootstrap/bootstrap.min.js"></script>
                      <!-- Custom Theme Scripts -->
                      <script src="<?php echo Config::get('URL'); ?>js/admin/custom.min.js"></script>
                      <!-- PNotify -->
                      <script type="text/javascript" src="<?php echo Config::get('URL'); ?>js/pnotify/pnotify.custom.min.js"></script>
