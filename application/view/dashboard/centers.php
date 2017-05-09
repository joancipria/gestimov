<span id="section-title" class="navbar-brand" href="#">Centers</span>
</div>
<div class="page-header">
  <h2>Consortium</h2>
</div>
<div id="main-content" class="container">
<div class="row">
  <?php foreach ($this->users as $user) { ?>
  <div class="col-lg-6">
                    <div class="panel panel-default centers-panel">
                        <div class="panel-heading">
                          <?= $user->nom;?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#about<?= $user->cod;?>" data-toggle="tab">About</a>
                                </li>
                                <li><a href="#teachers<?= $user->cod;?>" data-toggle="tab">Teachers</a>
                                </li>
                                <li><a href="#admin<?= $user->cod;?>" data-toggle="tab">Admin</a>
                                </li>
                                <li><a href="#contact<?= $user->cod;?>" data-toggle="tab">Contact</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="about<?= $user->cod;?>"><br>
                                    <p><b><?= $user->nom;?></b> is a center of <?= $user->provincia;?> (<b><?= $user->pais;?></b>)  located in <?= $user->poblacion;?> (CP: <?= $user->cp;?>).</p>
                                </div>
                                <div class="tab-pane fade" id="teachers<?= $user->cod;?>"><br>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                                <div class="tab-pane fade" id="admin<?= $user->cod;?>"><br>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                                <div class="tab-pane fade" id="contact<?= $user->cod;?>"><br>
                                    <p><strong>Telephone: </strong><?= $user->tel;?></p>
                                    <p><strong>Fax: </strong><?= $user->fax;?></p>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                      <?php } ?>
</div>
</div><!-- /.container -->
