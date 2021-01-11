<!DOCTYPE html>
<html lang="en">
<head>
 <?php echo $__env->make('web.partials.header_css', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>
<body>
  <div class="content-wrapper">
   <?php echo $__env->make('web.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- /.navbar -->
    <div class="offcanvas-info inverse-text">
      <button class="plain offcanvas-close offcanvas-info-close"><i class="jam jam-close"></i></button>
      <a href="index.html"><img src="#" srcset="style/images/logo-light.png 1x, style/images/logo-light@2x.png 2x" alt="" /></a>
      <div class="space30"></div>
      <p>Snowlake is a multi-concept and powerful site template contains rich layouts with possibility of unlimited combinations & beautiful elements.</p>
      <div class="space20"></div>
      <div class="widget">
        <h5 class="widget-title">Contact Info</h5>
        <address> Moonshine St. 14/05 <br /> Light City, London <div class="space20"></div>
          <a href="mailto:first.last@email.com" class="nocolor">info@email.com</a><br /> +00 (123) 456 78 90 </address>
      </div>
      <!-- /.widget -->
      <div class="widget">
        <h3 class="widget-title">Learn More</h3>
        <ul class="list-unstyled">
          <li><a href="#" class="nocolor">Our Story</a></li>
          <li><a href="#" class="nocolor">Terms of Use</a></li>
          <li><a href="#" class="nocolor">Privacy Policy</a></li>
          <li><a href="#" class="nocolor">Contact Us</a></li>
        </ul>
      </div>
      <!-- /.widget -->
      <div class="widget">
        <h3 class="widget-title">Follow Us</h3>
        <ul class="social social-mute social-s ml-auto">
          <li><a href="#"><i class="jam jam-twitter"></i></a></li>
          <li><a href="#"><i class="jam jam-facebook"></i></a></li>
          <li><a href="#"><i class="jam jam-instagram"></i></a></li>
          <li><a href="#"><i class="jam jam-vimeo"></i></a></li>
          <li><a href="#"><i class="jam jam-youtube"></i></a></li>
        </ul>
      </div>
      <!-- /.widget -->
    </div>
    <!-- /.offcanvas-info -->
    <div class="wrapper bg-opacity-default">
      <div class="rev_slider_wrapper fullwidth-container dark-spinner">
        <div class="container inner text-center">
        <div class="space40"></div>
        <h1 class="page-title">Login</h1>
        
      </div>
        <!-- /.rev_slider -->
      </div>
      <!-- /.rev_slider_wrapper -->
    </div>
    <?php if(session()->has('message-success')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session()->get('message-success')); ?> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                <?php if(session()->has('message-failed')): ?>
                    <div class="alert alert-warning">
                        <?php echo e(session()->get('message-failed')); ?> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

    <div class="wrapper light-wrapper">
      <div class="container" style="margin-top: 30px; margin-bottom: 30px;">
        <div class="row">
          <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
      <!--       <h2 class="section-title text-center">Drop Us a Line</h2>
            <p class="text-center">Nullam quis risus eget urna mollis ornare vel eu leo. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Integer posuere erat. Praesent commodo cursus.</p> -->
            <div class="space30"></div>
            <form id="contact-form" method="POST" action="<?php echo e(route('signin')); ?>">
              <?php echo csrf_field(); ?>
              <div class="messages"></div>

              <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                   <div class="controls">
               
                <div class="form-row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input id="email" type="email" name="email" class="form-control" placeholder="Email *" required="required" data-error="Valid email is required.">
                      <!-- <div class="help-block with-errors"></div> -->
                    </div>
                  </div>
                </div>
                
                <div class="form-row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input id="password" type="password" name="password" class="form-control" placeholder="Password *" required="required" data-error="Password required">
                      <!-- <div class="help-block with-errors"></div> -->
                    </div>
                  </div>
                </div>

                <div class="form-row">
                  <!-- <div class="col-md-12">
                    <div class="form-group">
                      <textarea id="form_message" name="message" class="form-control" placeholder="Message *" rows="4" required="required" data-error="Message is required."></textarea>
                      <div class="help-block with-errors"></div>
                    </div>
                  </div> -->
                  <div class="col-md-12 text-center" style="margin-top: 20px;">
                  <input type="submit" class="btn btn send" value="Login">
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-12">
                    <p class="text-muted text-center">Do not have any account ? Then <a href="<?php echo e(route('signup')); ?>"><strong style="color: #000000;">Signup</strong></a> Now</p>
                  </div>
                </div>
              </div>
                </div>
                <div class="col-md-1"></div>
              </div>

             

            </form>
            <!-- /form -->
          </div>
          <!-- /column -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </div>

  

    <?php echo $__env->make('web.partials.footer2', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
   
  </div>
  <?php echo $__env->make('web.partials.header_js', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <!-- /.content-wrapper -->
  
</body>
</html>