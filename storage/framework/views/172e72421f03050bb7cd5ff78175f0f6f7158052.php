<?php $__env->startSection('mainContent'); ?>
<div class="site-content">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            
            <div class="col-md-6">
                <!-- Register -->

                 <?php if(session()->has('message-success')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session()->get('message-success')); ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>


                
                <div class="card">

                    <div class="card__header">
                        <h4>Register Now</h4> </div>
                        <div class="card__content">
                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>                        
                            <!-- Register Form -->
                            <form method="POST" action="<?php echo e(route('signup')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label for="register_name">Your Name</label>
                                    <input type="text" name="name" id="register-name" class="form-control" placeholder="Enter your Name..."> </div>
                                    <div class="form-group">
                                    <label for="email">Your Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email address..."> </div>
                                    <div class="form-group">
                                        <label for="password">Your Password</label>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password..."> </div>
                                        <div class="form-group">
                                            <label for="confirm_password">Confirm  Password</label>
                                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm your password..."> </div>
                                            <div class="form-group form-group--submit"> <button class="btn btn-default btn-lg btn-block">Create Your Account</button> </div>
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