
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

<!--  Login form -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="loginmodal-container">
					<h1>Login to Your Account</h1><br>
				  <form action="validateLogin.php">
					<input type="text" name="dni" placeholder="Username">
					<input type="password" name="password" placeholder="Password">
					<input type="submit" name="login" class="login loginmodal-submit" value="Login">
				  </form>

				  <div class="login-help">
					<a href="#">Register</a> - <a href="#">Forgot Password</a>
				  </div>
				</div>
			</div>
		  </div>
<!--  /Login form -->

<script src="<?php echo Config::get('URL'); ?>js/vendor/jquery-1.9.1.min.js"></script>
<script src="<?php echo Config::get('URL'); ?>js/vendor/bootstrap.min.js"></script>
<script src="<?php echo Config::get('URL'); ?>js/main.js"></script>
<!-- Required javascript files for Slider -->
<script src="<?php echo Config::get('URL'); ?>js/jquery.ba-cond.min.js"></script>
<script src="<?php echo Config::get('URL'); ?>js/jquery.slitslider.js"></script>
<!-- /Required javascript files for Slider -->

<!-- SL Slider -->
<script type="text/javascript">
$(function() {
    var Page = (function() {

        var $navArrows = $( '#nav-arrows' ),
        slitslider = $( '#slider' ).slitslider( {
            autoplay : true
        } ),

        init = function() {
            initEvents();
        },
        initEvents = function() {
            $navArrows.children( ':last' ).on( 'click', function() {
                slitslider.next();
                return false;
            });

            $navArrows.children( ':first' ).on( 'click', function() {
                slitslider.previous();
                return false;
            });
        };

        return { init : init };

    })();

    Page.init();
});



</script>
<!-- /SL Slider -->
</body>
</html>
