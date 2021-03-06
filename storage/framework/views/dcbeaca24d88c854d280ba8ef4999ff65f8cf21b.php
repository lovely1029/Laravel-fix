<?php $__env->startSection('title', __('Faq')); ?>
<?php $__env->startSection('main'); ?>
<?php
$slidercnt=\App\Slider::all()->where('category', 6);
$sliders=\App\Slider::orderBy('id','desc')->where('category', 6)->first();
if($slidercnt->count()<1){
$slider1=0;
$slider2=0;
$slider3=0;
$title=0;
$description=0;
}else{
$slider1=$sliders->slider;
$slider2=$sliders->slider1;
$slider3=$sliders->slider2;
$title=$sliders->title;
$description=$sliders->description;  }
?>

<section class=" innerpage-banner">
            <img src="<?php echo e(asset('public/uploads/'.$slider1)); ?>" class="w-100 inner-ban-img" alt="banner image" />
            <div class="container">
                <div class="ban-text">
                    <h1><?php echo e($title); ?></h1>
                   <p><?php echo $description; ?></p>
                </div>
            </div>
        </section>

        <!-- Content -->
        <div id="content">

             <?php $tops =\App\Faq::all()->where('status', 1);?>
              <?php $__currentLoopData = $tops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $top): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <section class="row-am title-video-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 d-flex align-items-center">
                            <div class="sec-side-title">
                                <!--<div class="red-label-text"><span>Lorem Ipsum</span></div>-->
                                <h2 class="inner-sec-title"><?php echo e($top->title); ?> </h2>
                               <?php echo $top->description; ?>

                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8">
                            <div class="faq-counple-img sec-video-box">
                                <img src="<?php echo e(asset('public/uploads/'.$top->imageurl)); ?>" class="w-100" />
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <section class="faq-questions row-am">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 d-flex align-items-center">
                            <div id="accordion" class="w-100">
              <?php $leftfaqs =\App\FaqQuestion::all()->where('status', 1);?>
                         <?php $__currentLoopData = $leftfaqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $leftfaq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <div class="card">
                                    <div class="card-header" id="heading<?php echo e($key); ?>">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo e($key); ?>" aria-expanded="true" aria-controls="collapse<?php echo e($key); ?>">
                                                <span><?php echo $leftfaq->question; ?></span>  <span class="sprint-expand"></span>
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapse<?php echo e($key); ?>" class="collapse" aria-labelledby="heading<?php echo e($key); ?>" data-parent="#accordion">
                                        <div class="card-body">
                                            <?php echo $leftfaq->answer; ?>

                                        </div>
                                    </div>
                                </div>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                               
                            </div>
                        </div>

                          <?php $bottoms =\App\Faq::all()->where('status', 2);?>
              <?php $__currentLoopData = $bottoms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bottom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4  d-flex align-items-center mt-4 mb-4">
                            <div class="faq-middle-box">
                                <div class="middle-box-head">
                                    <h3><?php echo e($bottom->title); ?></h3>
                                </div>
                                <div class="middle-box-body">
                                    <?php echo $bottom->description; ?>

                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 d-flex align-items-center">
                            <div id="accordion2" class="w-100">

                                  <?php $rightfaqs =\App\FaqQuestion::all()->where('status', 2);?>
                         <?php $__currentLoopData = $rightfaqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new_key => $rightfaq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="card">
                                    <div class="card-header" id="heading<?php echo e($new_key); ?>">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo e($new_key); ?>" aria-expanded="true" aria-controls="collapse<?php echo e($new_key); ?>">
                                                <span><?php echo $rightfaq->question; ?></span>  <span class="sprint-expand"></span>
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapse<?php echo e($new_key); ?>" class="collapse" aria-labelledby="heading<?php echo e($new_key); ?>" data-parent="#accordion2">
                                        <div class="card-body">
                                            <?php echo $rightfaq->answer; ?>

                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                




                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="inner-contact row-am">
                <div class="container">
                    <div class="row justify-content-lg-center justify-content-md-center ">
                        <div class="col-lg-8">
                            <?php $contacts =\App\Faq::all()->where('status', 3);?>
                         <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="box-title c-center dark">
                                  <h2><?php echo e($contact->title); ?> </h2>
                               <?php echo $contact->description; ?>

                              
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <form class="mt-2">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Full Name"/>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Phone Number" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Email Address"/>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Subject" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Message"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <div class="g-recaptcha"  data-sitekey="6LeHcKYUAAAAAKAOAhKFpG744AX86JmzV58K6d6n"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input type="submit" value="submit now" class="btn form-submit right">
                                </div>
                            </div>
                        </div> 
                    </form>
                </div>
            </section>

        </div>
        <!-- Content END -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.frontmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/pages/faq.blade.php ENDPATH**/ ?>