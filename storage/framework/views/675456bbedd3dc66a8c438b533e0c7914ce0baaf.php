<?php $__env->startSection('title', __('Terms & Condition')); ?>
<?php $__env->startSection('main'); ?>
<?php
$counttops =\App\Term::all()->where('status', 2);
$tops =\App\Term::orderBy('id','desc')->where('status', 2)->first();
if($counttops->count()<1){$toptitle=0;}else{$toptitle=$tops->title;}
$bottoms =\App\Term::all()->where('status', 1);
?>
<?php
$slidercnt=\App\Slider::all()->where('category', 3);
$slider=\App\Slider::orderBy('id','desc')->where('category', 3)->first();
if($slidercnt->count()<1){
$slider1=0;
$title=0;
$description=0;
}else{
$slider1=$slider->slider;
$title=$slider->title;
$description=$slider->description;  }
?>
<section class=" innerpage-banner">
     
            <img src="<?php echo e(asset('public/uploads/'.$slider1)); ?>" class="w-100 inner-ban-img" alt="banner image" />
            <div class="container">
              
                <div class="ban-text text-left">
                    <h1><?php echo e($title); ?></h1>
                    <?php echo $description; ?><br><br>
                    <a class="btn slider-link btn-line" href="#" role="button">Advertising Rules</a>
                </div>
              

                
            </div>
            
        </section>

        <!-- Content -->
        <div id="content">
            <section class="ask-forum-sec">
                <div class="container">
                    <div class="ask-forum-inner">
                        <h4><?php echo e($toptitle); ?></h4>
                        <a href="#" class="btn ask-forum-btn">Ask Our Form</a>
                    </div>
                </div>
            </section> 
            <section class="terms-icons-sec">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="terms-icons-list m-hidden">
                                <?php $__currentLoopData = $bottoms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bottom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <div class="icon-box">
                                        <img src="<?php echo e(asset('public/uploads/'.$bottom->imageurl)); ?>" />
                                        <h4><?php echo e($bottom->title); ?></h4>
                                       <?php echo $bottom->description; ?>

                                    </div>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                            </ul>

                            <div class="mobile-terms-icon m-visible desk-hidden">
                                <div id="multi-item-example" class="carousel slide carousel-multi-item carousel-fade" data-ride="carousel">

                                    <!--Controls-->
                                    <div class="controls-top">
                                        <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
                                        <a class="btn-floating right" href="#multi-item-example" data-slide="next"><i class="fa fa-chevron-right"></i></a>
                                    </div>
                                    <!--/.Controls-->

                                    <!--Indicators-->
<!--                                    <ol class="carousel-indicators">
                                        <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
                                        <li data-target="#multi-item-example" data-slide-to="1"></li>
                                        <li data-target="#multi-item-example" data-slide-to="2"></li>
                                        <li data-target="#multi-item-example" data-slide-to="3"></li>
                                        <li data-target="#multi-item-example" data-slide-to="4"></li>
                                    </ol>-->
                                    <!--/.Indicators-->

                                    <!--Slides-->
                                    <div class="carousel-inner" role="listbox">
                                        <div class="carousel-item active">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="terms-icons-list">
                                                        <div class="icon-box center">
                                                            <img src="images/terms-icon-1.png" />
                                                            <h4>Come See Us</h4>
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item ">
                                            <div class="row">
                                                <div class="col-md-12">
                                                   <div class="terms-icons-list">
                                                        <div class="icon-box center">
                                                            <img src="images/terms-icon-2.png" />
                                                            <h4>Come See Us</h4>
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="terms-icons-list">
                                                        <div class="icon-box center">
                                                            <img src="images/terms-icon-3.png" />
                                                            <h4>Come See Us</h4>
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item ">
                                            <div class="row">
                                                <div class="col-md-12">
                                                   <div class="terms-icons-list">
                                                        <div class="icon-box center">
                                                            <img src="images/terms-icon-4.png" />
                                                            <h4>Come See Us</h4>
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="terms-icons-list">
                                                        <div class="icon-box center">
                                                            <img src="images/terms-icon-5.png" />
                                                            <h4>Come See Us</h4>
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>


        </div>
        <!-- Content END -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.frontmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\honeyluxe-front\resources\views/frontend/pages/termsCondition.blade.php ENDPATH**/ ?>