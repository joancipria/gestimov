
                      <!-- page content -->
                      <div class="right_col" role="main">
                        <div class="">
                          <div class="page-title">
                            <div class="title_left">
                              <h3>Consortium - Centers</h3>
                            </div><?php $this->renderFeedbackMessages(); ?>

                            <div class="title_right">
                              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
                                  <span >
                                    <?php if (Session::get("user_account_type") >= 7) { ?>
               <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">New Center  <i class="fa fa-building" aria-hidden="true"></i></button>
               <?php } ?>

                                  </span>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="clearfix"></div>

                          <div class="">
                              <?php foreach ($this->users as $user) { ?>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                              <div class="x_panel">
                                <div class="x_title">
                                  <h2><i class="fa fa-building"></i> <?= $user->nom;?> <small><?= $user->poblacion;?></small></h2>
                                  <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                      <ul class="dropdown-menu" role="menu">
                                        <li><a href="remove_center_action/<?= $user->cod;?>">Remove Center</a>
                                        </li>
                                      </ul>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                  </ul>
                                  <div class="clearfix"></div>
                                </div>
                                <div class="x_content">


                                  <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                      <li role="presentation" class="active"><a href="#<?= $user->cod;?>_tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">About</a>
                                      </li>
                                      <li role="presentation" class=""><a href="#<?= $user->cod;?>_tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Teachers</a>
                                      </li>
                                      <li role="presentation" class=""><a href="#<?= $user->cod;?>_tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Contact</a>
                                      </li>
                                    </ul>
                                    <div id="myTabContent" class="tab-content">
                                      <div role="tabpanel" class="tab-pane fade active in" id="<?= $user->cod;?>_tab_content1" aria-labelledby="home-tab">
                                        <p><b><?= $user->nom;?></b> is a center of <?= $user->provincia;?> (<b><?= $user->pais;?></b>)  located in <?= $user->poblacion;?> (CP: <?= $user->cp;?>).</p>
                                      </div>
                                      <div role="tabpanel" class="tab-pane fade" id="<?= $user->cod;?>_tab_content2" aria-labelledby="profile-tab">
                                        <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                                          booth letterpress, commodo enim craft beer mlkshk aliquip</p>
                                      </div>
                                      <div role="tabpanel" class="tab-pane fade" id="<?= $user->cod;?>_tab_content3" aria-labelledby="profile-tab">
                                        <p><strong>Telephone: </strong><?= $user->tel;?></p>
                                        <p><strong>Fax: </strong><?= $user->fax;?></p>
                                      </div>
                                    </div>
                                  </div>

                                </div>
                              </div>                            </div>
                        <?php } ?>




                            <div class="clearfix"></div>


                          </div>

                              </div>
                            </div>

                            <?php if (Session::get("user_account_type") >= 7) { ?>
                              <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                          <div class="modal-dialog modal-lg">
                                            <div class="modal-content">

                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel">Register new User</h4>
                                              </div>
                                              <div class="modal-body">
                                                <form method="post" action="<?php echo Config::get('URL'); ?>dashboard/register_center_action">
                                                    <!-- the user name input field uses a HTML5 pattern check -->
                                                    <label class="col-md-4 control-label">Center Code:</label>
                                                    <input class="form-control" name="cod_center" placeholder="Center Code" required/>

                                                    <label class="col-md-4 control-label">Center Name:</label>
                                                    <input class="form-control" type="text" name="name_center" placeholder="Center Name" required />

                                                    <label class="col-md-4 control-label">Center Adress:</label>
                                                    <input class="form-control" type="text" name="adress_center" placeholder="Center Adress" required />

                                                    <label class="col-md-4 control-label">City:</label>
                                                    <input class="form-control" type="text" name="city_center" placeholder="Center Location" required />

                                                    <label class="col-md-4 control-label">Postal Code:</label>
                                                    <input class="form-control" type="text" name="pc_center" placeholder="Center Postal Code" required />

                                                    <label class="col-md-4 control-label">Province:</label>
                                                    <input class="form-control" type="text" name="province_center" placeholder="Center Province" required />

                                                    <label class="col-md-4 control-label">Country:</label>
                                                    <input class="form-control" type="text" name="country_center" placeholder="Center Country" required />

                                                    <label class="col-md-4 control-label">Telephone:</label>
                                                    <input class="form-control" type="text" name="tel_center" placeholder="Center Telephone Number" required />

                                                    <label class="col-md-4 control-label">Fax:</label>
                                                    <input class="form-control" type="text" name="fax_center" placeholder="Center Fax Number" required />


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
                              <?php } ?>

                      <!-- /page content -->
                      <!-- jQuery -->
                      <script src="<?php echo Config::get('URL'); ?>js/jquery/jquery.min.js"></script>
                      <!-- Bootstrap -->
                      <script src="<?php echo Config::get('URL'); ?>js/bootstrap/bootstrap.min.js"></script>
                      <!-- Custom Theme Scripts -->
                      <script src="<?php echo Config::get('URL'); ?>js/admin/custom.min.js"></script>
                      <!-- PNotify -->
                      <script type="text/javascript" src="<?php echo Config::get('URL'); ?>js/pnotify/pnotify.custom.min.js"></script>
