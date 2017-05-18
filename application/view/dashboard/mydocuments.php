<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>My documents <small> Upload your personal documents</small></h3>
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
              <div class="col-md-3 col-xs-12 widget widget_tally_box">
                                      <div class="x_panel fixed_height_390">
                                        <div class="x_title">
                                          <h2>Personal Photo </h2>
                                          <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                          <form id="myAwesomeDropzone"  class="dropzone" action="<?php echo Config::get('URL'); ?>dashboard/upload_action" method="post" enctype="multipart/form-data">
                                              <input type="hidden" name="document" value="foto" />
                                          </form>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="col-md-3 col-xs-12 widget widget_tally_box">
                                                            <div class="x_panel fixed_height_390">
                                                              <div class="x_title">
                                                                <h2>National Id. Document</h2>
                                                                <div class="clearfix"></div>
                                                              </div>
                                                              <div class="x_content">
                                                                <form id="myAwesomeDropzoneDni"  class="dropzone" action="<?php echo Config::get('URL'); ?>dashboard/upload_action" method="post" enctype="multipart/form-data">
                                                                    <input type="hidden" name="document" value="dni" />
                                                                </form>
                                                              </div>
                                                            </div>
                                                          </div>

                                                          <div class="col-md-3 col-xs-12 widget widget_tally_box">
                                                                                  <div class="x_panel fixed_height_390">
                                                                                    <div class="x_title">
                                                                                      <h2>European health card</h2>
                                                                                      <div class="clearfix"></div>
                                                                                    </div>
                                                                                    <div class="x_content">
                                                                                      <form  class="dropzone" action="<?php echo Config::get('URL'); ?>dashboard/upload_action" method="post" enctype="multipart/form-data">
                                                                                          <input type="hidden" name="document" value="sanitaria" />
                                                                                      </form>
                                                                                    </div>
                                                                                  </div>
                                                                                </div>

                                                                                <div class="col-md-3 col-xs-12 widget widget_tally_box">
                                                                                                        <div class="x_panel fixed_height_390">
                                                                                                          <div class="x_title">
                                                                                                            <h2>Europass CV</h2>
                                                                                                            <div class="clearfix"></div>
                                                                                                          </div>
                                                                                                          <div class="x_content">
                                                                                                            <form  class="dropzone" action="<?php echo Config::get('URL'); ?>dashboard/upload_action" method="post" enctype="multipart/form-data">
                                                                                                                <input type="hidden" name="document" value="cv" />
                                                                                                            </form>
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
        <script type="text/javascript" src="<?php echo Config::get('URL'); ?>js/dropzone/dropzone.js"></script>
<script type="text/javascript">
Dropzone.options.myAwesomeDropzone = {
accept: function(file, done) {
  notifyUser('Successful','File uploaded correctly!','success');
  done();
},
acceptedFiles: "image/jpeg",
maxFilesize: 5,
init: function() {
  this.on("addedfile", function() {
    if (this.files[1]!=null){
      this.removeFile(this.files[0]);
    }
  });
}
};
</script>


<script type="text/javascript">
Dropzone.options.myAwesomeDropzoneDni = {
accept: function(file, done) {
  notifyUser('Successful','File uploaded correctly!','success');
  done();
},
acceptedFiles: "application/pdf",
maxFilesize: 5,
init: function() {
  this.on("addedfile", function() {
    if (this.files[1]!=null){
      this.removeFile(this.files[0]);
    }
  });
}
};
</script>
