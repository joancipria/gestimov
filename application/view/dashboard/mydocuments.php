<span id="section-title" class="navbar-brand" href="#">My Documents</span>
</div>
<div class="page-header">
  <h2>My Documents</h2>
  <?php $this->renderFeedbackMessages(); ?>

</div>

<div id="main-content" class="container">

  <form action="<?php echo Config::get('URL'); ?>dashboard/upload_action" method="post" enctype="multipart/form-data">
      Select image to upload:
      <input type="file" name="fileToUpload" id="fileToUpload">
      <input type="submit" value="Upload Image" name="submit">
  </form>

</div><!-- /.container -->
