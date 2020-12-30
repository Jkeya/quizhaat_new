
<?php $__env->startSection('mainContent'); ?>

<div class="site-content">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            
            <div class="col-md-6">
                <!-- Register -->
                <div class="card">
                    <div class="card__header">
                        <h4>Register Now</h4> </div>
                        <div class="card__content">
                            <!-- Register Form -->
                            <form action="#">
                                <div class="form-group">
                                    <label for="register-name">Your Name</label>
                                    <input type="text" name="register-name" id="register-name" class="form-control" placeholder="Enter your email address..."> </div>
                                    <div class="form-group">
                                    <label for="register-name">Your Mobile</label>
                                    <input type="text" name="register-name" id="register-name" class="form-control" placeholder="Enter your email address..."> </div>
                                    <div class="form-group">
                                        <label for="register-password">Your Password</label>
                                        <input type="password" name="register-password" id="register-password" class="form-control" placeholder="Enter your password..."> </div>
                                        <div class="form-group">
                                            <label for="repeat-password">Repeat Password</label>
                                            <input type="password" name="repeat-password" id="repeat-password" class="form-control" placeholder="Repeat your password..."> </div>
                                            <div class="form-group form-group--submit"> <a href="_soocer_shop-account.html" class="btn btn-default btn-lg btn-block">Create Your Account</a> </div>
                                        </form>
                                        <!-- Register Form / End -->
                                    </div>
                                </div>
                                <!-- Register / End -->
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>
                </div>
                <?php $__env->stopSection(); ?>


<?php echo $__env->make('web.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>