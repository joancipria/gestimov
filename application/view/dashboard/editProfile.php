                      <!-- page content -->
                      <div class="right_col" role="main">
                        <div class="">
                          <div class="page-title">
                            <div class="title_left">
                              <h3>Profile</h3>
                            </div> <?php $this->renderFeedbackMessages(); ?>

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

                          <div class="">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="x_panel">
                                              <div class="x_title">
                                                <h2>My Profile info <small>different form elements</small></h2>
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
                                                <br />
                                                <?php if ($this->user) { ?>
                                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo Config::get('URL'); ?>dashboard/editProfile_action">

                                                  <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                      <input value="<?php if ($this->user->nom != 'Empty'): ?><?= $this->user->nom ?><?php endif; ?>" type="text" name="real_name" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                  </div>
                                                  <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                      <input value="<?php if ($this->user->ape != 'Empty'): ?><?= $this->user->ape ?><?php endif; ?>" type="text" name="surname" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Date of Birth:</label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                      <input value="<?php if ($this->user->fechanac != '1200-09-05'): ?><?= $this->user->fechanac ?><?php endif; ?>" name="birthday" class="form-control col-md-7 col-xs-12" type="text">
                                                    </div>
                                                  </div>

                                                  <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Adress: <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                      <input value="<?php if ($this->user->direccion != 'Empty'): ?><?= $this->user->direccion ?><?php endif; ?>" type="text" name="adress" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                  </div>

                                                  <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">City: <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                      <input value="<?php if ($this->user->poblacion != 'Empty'): ?><?= $this->user->poblacion ?><?php endif; ?>" type="text" name="city" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                  </div>

                                                  <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Postal Code: <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                      <input value="<?php if ($this->user->cp != 0): ?><?= $this->user->cp ?><?php endif; ?>" type="text" name="pc" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                  </div>

                                                  <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Province: <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                      <input value="<?php if ($this->user->provincia != 'Empty'): ?><?= $this->user->provincia ?><?php endif; ?>" type="text" name="province" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                  </div>

                                                  <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Country: <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                      <input value="<?php if ($this->user->pais != 'Empty'): ?><?= $this->user->pais ?><?php endif; ?>" type="text" name="country" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                  </div>
                                                  <div class="ln_solid"></div>
                                                  <div class="form-group">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                      <button type="submit" class="btn btn-success">Submit</button>
                                                    </div>
                                                  </div>

                                                </form>
                                                <?php } ?>
                                              </div>
                                            </div>
                                          </div>





                            <div class="clearfix"></div>


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
