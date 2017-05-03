<section class="container" id="login-welcome">
  <!-- echo out the system feedback (error and success messages) -->
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <h1 class="text-center">Welcome</h1>
          </div>
           <div class="modal-body">
             <form action="<?php echo Config::get('URL'); ?>login/login" method="post">
               <?php $this->renderFeedbackMessages(); ?>

               <div class="form-group">
                   <input type="text" name="user_name" placeholder="Username or email" required class="form-control input-lg" />
               </div>

               <div class="form-group">
                   <input type="password" name="user_password" placeholder="Password" required class="form-control input-lg" />
               </div>
               <label for="set_remember_me_cookie" class="remember-me-label">
    <input type="checkbox" name="set_remember_me_cookie" class="remember-me-checkbox" />
    Remember me for 2 weeks
</label>
<?php if (!empty($this->redirect)) { ?>
                      <input type="hidden" name="redirect" value="<?php echo $this->encodeHTML($this->redirect); ?>" />
                  <?php } ?>

               <div class="form-group">
                   <input type="submit" class="btn btn-block btn-lg btn-primary" value="Login"/>
                 </form>

                 <input type="hidden" name="csrf_token" class="login-submit-button" value="<?= Csrf::makeToken(); ?>" />
                               </form>
                               <div class="link-forgot-my-password">
                                   <a href="<?php echo Config::get('URL'); ?>login/requestPasswordReset">I forgot my password</a>
                               </div>
               </div>
           </div>
      </div>
   </div>
</section>
