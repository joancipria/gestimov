<!--Footer-->
<footer id="footer">
    <div class="container">
        <div class="row-fluid">
            <div class="span5 cp">
                &copy; 2017 <a target="_blank" href="http://joancipria.com/" title="Joan Ciprià Moreno Teodoro">Joan Ciprià Moreno Teodoro</a>. All Rights Reserved.
            </div>
            <!--/Copyright-->
        </div>
    </div>
</footer>
<!--/Footer-->

<!-- jQuery -->
<script src="<?php echo Config::get('URL'); ?>js/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo Config::get('URL'); ?>js/bootstrap/bootstrap.min.js"></script>
<script src="<?php echo Config::get('URL'); ?>js/main.js"></script>

<!-- PNotify -->
<script type="text/javascript" src="<?php echo Config::get('URL'); ?>js/pnotify/pnotify.custom.min.js"></script>
<script type="text/javascript">
function notifyUser(title,text,type){
  new PNotify({
    title: title,
    text: text,
    type: type,
    styling: 'fontawesome'
  });
}
</script>
</body>
</html>
