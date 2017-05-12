
                      <!-- page content -->
                      <div class="right_col" role="main">
                        <div class="">
                          <div class="page-title">
                            <div class="title_left">
                              <h3>Consortium - Centers</h3>
                            </div>

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


                                  <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                      <li role="presentation" class="active"><a href="#<?= $user->cod;?>_tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Home</a>
                                      </li>
                                      <li role="presentation" class=""><a href="#<?= $user->cod;?>_tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Profile</a>
                                      </li>
                                      <li role="presentation" class=""><a href="#<?= $user->cod;?>_tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Profile</a>
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

                      <!-- /page content -->
                      <!-- jQuery -->
                      <script src="<?php echo Config::get('URL'); ?>vendors/jquery/dist/jquery.min.js"></script>
                      <!-- Bootstrap -->
                      <script src="<?php echo Config::get('URL'); ?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
                      <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>
                      <!-- Custom Theme Scripts -->
                      <script src="<?php echo Config::get('URL'); ?>build/js/custom.min.js"></script>
