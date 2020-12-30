<?php $__env->startSection('mainContent'); ?>
<div class="page-heading">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <h1 class="page-heading__title"> 
                    <span class="highlight">Login</span>
                </h1>
                <ol class="page-heading__breadcrumb breadcrumb">
                    <li class="breadcrumb-item"> <a href="">Home</a> </li>
                    
                    <li class="breadcrumb-item active" aria-current="page">Login</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="site-content">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            
            <div class="col-md-6">
                <!-- Login -->
                <div class="card">
                    <div class="card__header">
                        <h4>Login to your Account</h4> </div>
                        <div class="card__content">
                            <!-- Login Form -->
                            <form action="#">
                                <div class="form-group">
                                    <label for="login-name">Your Phone</label>
                                    <input type="email" name="login-name" id="login-name" class="form-control" placeholder="Enter your email address..."> </div>
                                    <div class="form-group">
                                        <label for="login-password">Your Password</label>
                                        <input type="password" name="login-password" id="login-password" class="form-control" placeholder="Enter your password..."> </div>
                                        <div class="form-group form-group--password-forgot">
                                            <label class="checkbox checkbox-inline">
                                                <input type="checkbox" id="inlineCheckbox1" value="option1" checked="checked"> Remember Me <span class="checkbox-indicator"></span> </label> <span class="password-reminder">Forgot your password? 
                                                    <a href="#">Click Here</a>
                                                </span> </div>
                                                <div class="form-group form-group--sm"> <a href="_soocer_shop-account.html" class="btn btn-primary-inverse btn-lg btn-block">Sign in to your account</a> </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <button class="btn btn-facebook btn-icon btn-block"> <i class="fa fa-facebook"></i> Sign In via Facebook </button>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <button class="btn btn-twitter btn-icon btn-block"> <i class="fa fa-twitter"></i> Sign in via Twitter </button>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- Login Form / End -->
                                        </div>
                                    </div>
                                    <!-- Login / End -->
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                        </div>
                    </div>
                    <?php $__env->stopSection(); ?>


<?php echo $__env->make('web.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>