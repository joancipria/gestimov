<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo Config::get('URL'); ?>js/vendor/jquery-1.9.1.min.js"></script>
<script src="<?php echo Config::get('URL'); ?>js/vendor/bootstrap.min.js"></script>
<script src="<?php echo Config::get('URL'); ?>js/jasny-bootstrap.js"></script>
<script type="text/javascript">
  function navMenu (page){
    document.getElementsByClassName('active')[0].setAttribute("class", "");
    page.setAttribute("class", "active");
    var route = page.getAttribute("path");
    document.getElementById('section-title').innerHTML = route.split(".")[0];

    $.get("content/"+route, function(data){
    document.getElementById('main-content').innerHTML=data;
    });

    if( $(window).width() < 992){
      $('.navmenu').offcanvas('toggle');
    }
  }
</script>

</body></html>
