<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->getFromJson('lang.question_bank'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('dashboard')); ?>"><?php echo app('translator')->getFromJson('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->getFromJson('lang.examinations'); ?></a>
                <a href="#"><?php echo app('translator')->getFromJson('lang.question_bank'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
        <?php if(isset($bank)): ?>
        <?php if(in_array(235, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 ): ?>
        <div class="row">
            <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                <a href="<?php echo e(url('question-bank')); ?>" class="primary-btn small fix-gr-bg">
                    <span class="ti-plus pr-2"></span>
                    <?php echo app('translator')->getFromJson('lang.add'); ?>
                </a>
            </div>
        </div>
        <?php endif; ?>
        <?php endif; ?>
        <div class="row">


            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-title">
                            <h3 class="mb-30"><?php if(isset($bank)): ?>
                                    <?php echo app('translator')->getFromJson('lang.edit'); ?>
                                <?php else: ?>
                                    <?php echo app('translator')->getFromJson('lang.add'); ?>
                                <?php endif; ?>
                                <?php echo app('translator')->getFromJson('lang.question_bank'); ?>
                            </h3>
                        </div>
                       
                        <?php if(isset($bank)): ?>

                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'question-bank/'.$bank->id, 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'id' => 'question_bank'])); ?>


                        <?php else: ?>
                         <?php if(in_array(235, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 ): ?>

                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'question-bank',
                        'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'question_bank'])); ?>


                        <?php endif; ?>
                        <?php endif; ?>
                        <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                        <div class="white-box">
                            <div class="add-visitor">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <?php if(session()->has('message-success')): ?>
                                        <div class="alert alert-success">
                                            <?php echo e(session()->get('message-success')); ?>

                                        </div>
                                        <?php elseif(session()->has('message-danger')): ?>
                                        <div class="alert alert-danger">
                                            <?php echo e(session()->get('message-danger')); ?>

                                        </div>
                                        <?php endif; ?>
                                       
                                        <select class="niceSelect w-100 bb form-control<?php echo e($errors->has('group') ? ' is-invalid' : ''); ?>" name="subject">
                                            <option data-display="Select Subject">Select Subject</option>
                                            <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(isset($bank)): ?>
                                                <option value="<?php echo e($subject->id); ?>" <?php echo e($subject->id == $bank->subject_id? 'selected': ''); ?>><?php echo e($subject->subject_name); ?></option>
                                                <?php else: ?>
                                                <option value="<?php echo e($subject->id); ?>" <?php echo e(old('subject')!=''? (old('subject') == $subject->id? 'selected':''):''); ?> ><?php echo e($subject->subject_name); ?></option>
                                                <?php endif; ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('group')): ?>
                                        <span class="invalid-feedback invalid-select" role="alert">
                                            <strong><?php echo e($errors->first('group')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            
                                
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <select class="niceSelect w-100 bb form-control<?php echo e($errors->has('question_type') ? ' is-invalid' : ''); ?>" name="question_type"  id="question-type">
                                            <option data-display="<?php echo app('translator')->getFromJson('lang.question_type'); ?> *" value=""><?php echo app('translator')->getFromJson('lang.question_type'); ?> *</option>
                                           
                                            <option value="M" <?php echo e(isset($bank)? $bank->type == "M"? 'selected': '' : ''); ?>><?php echo app('translator')->getFromJson('lang.multiple_choice'); ?></option>
                                            <option value="T" <?php echo e(isset($bank)? $bank->type == "T"? 'selected': '' : ''); ?>><?php echo app('translator')->getFromJson('lang.true_false'); ?></option>
                                            <option value="F" <?php echo e(isset($bank)? $bank->type == "F"? 'selected': '' : ''); ?>><?php echo app('translator')->getFromJson('lang.fill_in_the_blanks'); ?></option>
                                        </select>
                                        <?php if($errors->has('group')): ?>
                                        <span class="invalid-feedback invalid-select" role="alert">
                                            <strong><?php echo e($errors->first('group')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <textarea class="primary-input form-control<?php echo e($errors->has('question') ? ' is-invalid' : ''); ?>" cols="0" rows="4" name="question"><?php echo e(isset($bank)? $bank->question:(old('question')!=''?(old('question')):'')); ?></textarea>
                                            <label><?php echo app('translator')->getFromJson('lang.question'); ?> *</label>
                                            <span class="focus-border textarea"></span>
                                            <?php if($errors->has('question')): ?>
                                                <span class="error text-danger"><strong><?php echo e($errors->first('question')); ?></strong></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <input class="primary-input form-control<?php echo e($errors->has('marks') ? ' is-invalid' : ''); ?>" type="number" name="marks" value="2">
                                            <label>Point *</label>
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('marks')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('marks')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    if(!isset($bank)){
                                        if(old('question_type') == "M"){
                                            $multiple_choice = "";
                                        }
                                    }else{
                                        if($bank->type == "M" || old('question_type') == "M"){
                                            $multiple_choice = "";
                                        }
                                    }
                                ?>
                                <div class="multiple-choice" id="<?php echo e(isset($multiple_choice)? $multiple_choice: 'multiple-choice'); ?>">
                                    <div class="row  mt-25">
                                        <div class="col-lg-8">
                                            <div class="input-effect">
                                                <input class="primary-input form-control<?php echo e($errors->has('number_of_option') ? ' is-invalid' : ''); ?>"
                                                    type="number" name="number_of_option" autocomplete="off" id="number_of_option" value="<?php echo e(isset($bank)? $bank->number_of_option: ''); ?>">
                                                <label><?php echo app('translator')->getFromJson('lang.number_of_options'); ?> *</label>
                                                <span class="focus-border"></span>
                                                <?php if($errors->has('number_of_option')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('number_of_option')); ?></strong>
                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <button type="button" class="primary-btn small fix-gr-bg" id="create-option"><?php echo app('translator')->getFromJson('lang.create'); ?></button>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    if(!isset($bank)){
                                        if(old('question_type') == "M"){
                                            $multiple_options = "";
                                        }
                                    }else{
                                        if($bank->type == "M" || old('question_type') == "M"){
                                            $multiple_options = "";
                                        }
                                    }
                                ?>
                                <div class="multiple-options" id="<?php echo e(isset($multiple_options)? "": 'multiple-options'); ?>">
                                    <?php 
                                        $i=0;
                                        $multiple_options = [];

                                        if(isset($bank)){
                                            if($bank->type == "M"){
                                                $multiple_options = $bank->questionMu;
                                            }
                                        }
                                    ?>
                                   <!--  <?php  echo "<pre>"; print_r($multiple_options); ?> -->
                                    <?php $__currentLoopData = $multiple_options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $multiple_option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <?php 


                                    $i++; ?>
                                    <div class='row  mt-25'>
                                        <div class='col-lg-10'>
                                            <div class='input-effect'>
                                                <input class='primary-input form-control' type='text' name='option[]' autocomplete='off' required value="<?php echo e($multiple_option->title); ?>">
                                                <label><?php echo app('translator')->getFromJson('lang.option'); ?> <?php echo e($i); ?></label>
                                                <span class='focus-border'></span>
                                            </div>
                                        </div>
                                        <div class='col-lg-2'>
                                            <input type="checkbox" id="option_check_<?php echo e($i); ?>" class="common-checkbox" name="option_check_<?php echo e($i); ?>" value="1" 
                                            <?php if($multiple_option->status == 1): ?>
                                            checked
                                            <?php endif; ?>
                                            >
                                            <label for="option_check_<?php echo e($i); ?>">Yes</label>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <?php
                                    if(!isset($bank)){
                                        if(old('question_type') == "T"){
                                            $true_false = "";
                                        }
                                    }else{
                                        if($bank->type == "T" || old('question_type') == "T"){
                                            $true_false = "";
                                        }
                                    }
                                ?>
                                <div class="true-false" id="<?php echo e(isset($true_false)? $true_false: 'true-false'); ?>">
                                    <div class="row  mt-25">
                                        <div class="col-lg-12 d-flex">
                                            <p class="text-uppercase fw-500 mb-10"></p>
                                            <div class="d-flex radio-btn-flex">
                                                <div class="mr-30">
                                                    <input type="radio" name="trueOrFalse" id="relationFather" value="T" class="common-radio relationButton" <?php echo e(isset($bank)? $bank->trueFalse == "T"? 'checked': '' : 'checked'); ?>>
                                                    <label for="relationFather"><?php echo app('translator')->getFromJson('lang.true'); ?></label>
                                                </div>
                                                <div class="mr-30">
                                                    <input type="radio" name="trueOrFalse" id="relationMother" value="F" class="common-radio relationButton" <?php echo e(isset($bank)? $bank->trueFalse == "F"? 'checked': '' : ''); ?>>
                                                    <label for="relationMother"><?php echo app('translator')->getFromJson('lang.false'); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    if(!isset($bank)){
                                        if(old('question_type') == "F"){
                                            $fill_in = "";
                                        }
                                    }else{
                                        if($bank->type == "F" || old('question_type') == "F"){
                                            $fill_in = "";
                                        }
                                    }
                                ?>
                                <div class="fill-in-the-blanks" id="<?php echo e(isset($fill_in)? $fill_in : 'fill-in-the-blanks'); ?>">
                                    <div class="row  mt-25">
                                        <div class="col-lg-12">
                                            <div class="input-effect">
                                                <textarea class="primary-input form-control<?php echo e($errors->has('suitable_words') ? ' is-invalid' : ''); ?>" cols="0" rows="5" name="suitable_words"><?php echo e(isset($bank)? $bank->suitable_words: ''); ?></textarea>
                                                <label><?php echo app('translator')->getFromJson('lang.suitable_words'); ?> *</label>
                                                <span class="focus-border textarea"></span>
                                                <?php if($errors->has('suitable_words')): ?>
                                                <span class="invalid-feedback invalid-select" role="alert">
                                                    <strong><?php echo e($errors->first('suitable_words')); ?></strong>
                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <?php 
                                  $tooltip = "";
                                  if(in_array(235, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 ){
                                        $tooltip = "";
                                    }else{
                                        $tooltip = "You have no permission to add";
                                    }
                                ?>
                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                        <button class="primary-btn fix-gr-bg" data-toggle="tooltip" title="<?php echo e($tooltip); ?>">
                                            <span class="ti-check"></span>
                                            <?php echo app('translator')->getFromJson('lang.save'); ?> <?php echo app('translator')->getFromJson('lang.question'); ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-4 no-gutters">
                        <div class="main-title">
                            <h3 class="mb-0"><?php echo app('translator')->getFromJson('lang.question_bank'); ?> <?php echo app('translator')->getFromJson('lang.list'); ?> 
                                (<?php echo e(count($banks)); ?>)
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">

                        <table id="table_id" class="display school-table" cellspacing="0" width="100%">

                            <thead>
                                <?php if(session()->has('message-success-delete') != "" ||
                                session()->get('message-danger-delete') != ""): ?>
                                <tr>
                                    <td colspan="5">
                                        <?php if(session()->has('message-success-delete')): ?>
                                        <div class="alert alert-success">
                                            <?php echo e(session()->get('message-success-delete')); ?>

                                        </div>
                                        <?php elseif(session()->has('message-danger-delete')): ?>
                                        <div class="alert alert-danger">
                                            <?php echo e(session()->get('message-danger-delete')); ?>

                                        </div>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endif; ?>
                                <tr>
                                    <th>Subject</th>
                                    <th><?php echo app('translator')->getFromJson('lang.question'); ?></th>
                                    <th>Answers</th>
                                    <th><?php echo app('translator')->getFromJson('lang.type'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('lang.action'); ?></th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php $__currentLoopData = $banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>

                                    <td><?php echo e(($bank->questionSubject)!=''?$bank->questionSubject->subject_name:''); ?></td>
                                   
                                    <td><?php echo e($bank->question); ?></td>
                                    <td>
                                        <?php 
                                        $questions_options = App\SmQuestionBank::getQuestionsOptions($bank->id);

                                        foreach($questions_options as $questions_option){

                                            if($questions_option->status == 1){
                                        
                                       
                                  
                                                echo "<font style='color: green; font-weight: bold;'>- ".$questions_option->title."</font><br>";
                                            }
                                           
                                            else{
                                                echo "- ".$questions_option->title."<br>";
                                            }
                                       
                                         
                                        }

                                        ?>
                                         
                                       
                                    </td>
                                    <td>
                                        <?php if($bank->type == "M"): ?>
                                        <?php echo e("Multiple Choice"); ?>

                                        <?php elseif($bank->type == "T"): ?>
                                        <?php echo e("True False"); ?>

                                        <?php else: ?>
                                        <?php echo e("Fill in the blank"); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                <?php echo app('translator')->getFromJson('lang.select'); ?>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                               <?php if(in_array(236, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 ): ?>

                                               <a class="dropdown-item" href="<?php echo e(url('question-bank', [$bank->id
                                                    ])); ?>"><?php echo app('translator')->getFromJson('lang.edit'); ?></a>
                                                <?php endif; ?>
                                                <?php if(in_array(237, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 ): ?>

                                                <a class="dropdown-item" data-toggle="modal" data-target="#deleteQuestionBankModal<?php echo e($bank->id); ?>"
                                                    href="#"><?php echo app('translator')->getFromJson('lang.delete'); ?></a>
                                            <?php endif; ?>
                                                </div>
                                        </div>
                                    </td>
                                </tr>
                                <div class="modal fade admin-query" id="deleteQuestionBankModal<?php echo e($bank->id); ?>" >
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title"><?php echo app('translator')->getFromJson('lang.delete'); ?> <?php echo app('translator')->getFromJson('lang.question_bank'); ?></h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="text-center">
                                                    <h4><?php echo app('translator')->getFromJson('lang.are_you_sure_to_delete'); ?></h4>
                                                </div>

                                                <div class="mt-40 d-flex justify-content-between">
                                                    <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->getFromJson('lang.cancel'); ?></button>
                                                     <?php echo e(Form::open(['url' => 'question-bank/'.$bank->id, 'method' => 'DELETE', 'enctype' => 'multipart/form-data'])); ?>

                                                    <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->getFromJson('lang.delete'); ?></button>
                                                     <?php echo e(Form::close()); ?>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>