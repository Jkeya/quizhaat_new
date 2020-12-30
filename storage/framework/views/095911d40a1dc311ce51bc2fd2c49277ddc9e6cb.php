<?php $__env->startSection('mainContent'); ?>
<div class="site-content">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            
            <div class="col-md-6">
                <!-- Register -->
                 <div class="alert alert-success" role="alert">
  This is a success alert—check it out!
</div>
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
                                    <input type="text" name="register_name" id="register-name" class="form-control" placeholder="Enter your Name..."> </div>
                                    <div class="form-group">
                                    <label for="email">Your Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email address..."> </div>
                                    <div class="form-group">
                                        <label for="register_password">Your Password</label>
                                        <input type="password" name="register_password" id="register-password" class="form-control" placeholder="Enter your password..."> </div>
                                        <div class="form-group">
                                            <label for="repeat_password">Repeat Password</label>
                                            <input type="password" name="repeat_password" id="repeat-password" class="form-control" placeholder="Repeat your password..."> </div>
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