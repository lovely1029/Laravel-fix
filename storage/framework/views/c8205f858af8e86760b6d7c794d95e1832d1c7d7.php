<?php $__env->startSection('title', __('Index')); ?>
<?php $__env->startSection('main'); ?>

 <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">-->
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php if($message = Session::get('message')): ?>
<h4 class="alert alert-success"><?php echo e($message); ?></h4>
<?php endif; ?>
<style>
.alert-success{
text-align: center;
margin-bottom: 0;
}
.ui-autocomplete {
            max-height: 200px;
            overflow-y: auto;
            /* prevent horizontal scrollbar */
            overflow-x: hidden;
            /* add padding to account for vertical scrollbar */
            padding-right: 20px;
        } 
</style>
<div class="modal fade" id="advanceSearch" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

            <div class="modal-dialog  modal-lg" role="document">

                <div class="modal-content ">

                    <div class="modal-header">

                        <h5 class="modal-title" id="exampleModalLabel">Advanced Search</h5> 

                        <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->

                        <button type="button" class="btn" data-dismiss="modal">&times;</button>

                    </div>
                    
                    <div class="modal-body">

                             <form method="POST" action="<?php echo e(url('advance/search/escort')); ?>">
                                  <?php echo csrf_field(); ?>


                            <div class="container">

                                <div class="row">

                                    <div class="col-lg-12">

                                        <div class="advance-search-sec-form">

                                            <div class="form-box">

                                                <ul class="fields">

                                                    <li>
                                                        <div class="form-group">
                                                            <select class="form-control" name="country_id" onchange="getCitiesTwo()" id="selectCountryAdvSearch">
                                                                <option value="">--Select Country--</option>
                                                                    <?php $countries=\App\Country::all();?>
                                                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country_details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option value="<?php echo e($country_details->id); ?>"><?php echo e($country_details->country); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group">
                                                            <select class="form-control" name="gender">
                                                                <option value="">
                                                                    --Select Gender--
                                                                </option>
                                                                <option value="1">
                                                                    Male
                                                                </option>
                                                                <option value="2">
                                                                    Female
                                                                </option>
                                                                <option value="3">
                                                                    Trans Gender
                                                                </option> 
                                                                <option value="4">
                                                                    Gay
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="height" placeholder="Height">
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="dress_size" placeholder="Dress Size">
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group">
                                                            <select class="form-control" name="age">
                                                                <option value="">
                                                                    --Select Age--
                                                                </option>
                                                                <option value="18">
                                                                    18
                                                                </option>
                                                                <option value="20">
                                                                    20
                                                                </option>
                                                                <option value="22">
                                                                    22
                                                                </option>
                                                                <option value="24">
                                                                    24
                                                                </option>
                                                                <option value="26">
                                                                    26
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group">
                                                            <select class="form-control" name="nationality">
                                                                <option value="">--Select Nationality--</option>
                                                                <?php $nationalities=\App\EscortDropdown::all()->where('status', 4);?>
                                                                <?php $__currentLoopData = $nationalities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($nation->id); ?>"><?php echo e($nation->dropdownTitle); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group">
                                                            <select class="form-control" name="state_id" onchange="selectstate()" id="citySelectAdvSearch">
                                                                <option value="">
                                                                    --Select City--
                                                                </option>
                                                                    <?php // $States=\App\State::all();?>
                                                                    
                                                                    
                                                                
                                                            </select>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group">
                                                            <select class="form-control" name="sextuality">
                                                                <option value="">
                                                                    --Select Sexuality--
                                                                </option>
                                                                <?php $sextualities=\App\EscortDropdown::all()->where('status', 3); ?>
                                                                <?php $__currentLoopData = $sextualities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sex): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($sex->id); ?>">
                                                                        <?php echo e($sex->dropdownTitle); ?>

                                                                    </option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group">
                                                           <select class="form-control" name="bodyShape">
                                                                <option value="">
                                                                    --Select Body Shape--
                                                                </option>
                                                                <?php $bodyshpaes=\App\EscortDropdown::all()->where('status', 2); ?>
                                                                <?php $__currentLoopData = $bodyshpaes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shape): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($shape->id); ?>">
                                                                        <?php echo e($shape->dropdownTitle); ?>

                                                                    </option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group">
                                                            <select class="form-control" name="hair">
                                                                <option value="">--Select Hair Type--</option>
                                                                <?php $hairs=\App\EscortDropdown::all()->where('status', 5);?>
                                                                <?php $__currentLoopData = $hairs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hair): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($hair->id); ?>"><?php echo e($hair->dropdownTitle); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group">
                                                           <select class="form-control" name="eye">
                                                               <option value="">
                                                                    --Select Eye--
                                                                </option>
                                                                <?php $eyes=\App\EscortDropdown::all()->where('status', 1);?>
                                                                <?php $__currentLoopData = $eyes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $eye): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($eye->id); ?>">
                                                                    <?php echo e($eye->dropdownTitle); ?>

                                                                </option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="keyword" placeholder="Keyword">
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-lg-center">
                                    <div class="col-lg-9 c-center">                                        
                                        <div class="search-availability-bar">
                                            
                                            <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" id="touring_escorts_btn"
                                                onclick="customToggle('touring_escorts','touring_escorts_btn');">
                                                Touring Escorts
                                            </button>
                                            <input type="hidden" id="touring_escorts" name="touring_escorts" value="false" />
                                            
                                            <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" id="available_now_btn"
                                                onclick="customToggle('available_now','available_now_btn');">
                                                View Available Now
                                            </button>
                                            <input type="hidden" id="available_now" name="available_now" value="false" />
                                            
                                            <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" id="available_today_btn"
                                                onclick="customToggle('available_today','available_today_btn');">
                                                View Available Today
                                            </button>
                                            <input type="hidden" id="available_today" name="available_today" value="false" />
                                            
                                            <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" id="in_call_btn"
                                                onclick="customToggle('in_call','in_call_btn');">
                                                In Call
                                            </button>
                                            <input type="hidden" id="in_call" name="in_call" value="false" />
                                            
                                            <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" id="out_call_btn"
                                                onclick="customToggle('out_call','out_call_btn');">
                                                Out Call
                                            </button>
                                            <input type="hidden" id="out_call" name="out_call" value="false" />
                                        </div>
                                    </div>
                                    <div class="col-lg-9 c-center mt-3">
                                        <h4>Services Offered </h4>
                                        <ul class="advance-search-check-list">
                                            <?php $services=\App\ServiceOffer::all();?>
                                            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" value="<?php echo e($service->service); ?>" class="custom-control-input" id="customCheck1<?php echo e($service->id); ?>" name="services[]">
                                                    <label class="custom-control-label" for="customCheck1<?php echo e($service->id); ?>">
                                                        <?php echo e($service->service); ?>

                                                    </label>
                                                </div>
                                            </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                          
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 c-center">
                                        <div class="search-availability-bar equal-btns">
                                            
                                            <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" id="agency_btn" onclick="customToggle('agency','agency_btn');">
                                                Agency
                                            </button>
                                            <input type="hidden" id="agency" name="agency" value="false" />                                            
                                            
                                            <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" id="independent_btn"
                                                onclick="customToggle('independent','independent_btn');">
                                                Independent
                                            </button>
                                            <input type="hidden" id="independent" name="independent" value="false" />
                                            <!--<button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" >Establishment</button>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-lg-center">
                                    <div class="col-lg-5 c-center mt-3 mb-3">
                                        <div class="clearfix">
                                            <div class="form-group price-detail left">
                                                <input type="text" class="form-control" name="price_from" placeholder="From" />
                                                <input type="text" class="form-control" name="price_to" placeholder="To" />
                                            </div>
                                            <div class="right ">
                                                <button class="red-small">Filter</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <section class="home-slider">  
            <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                        <?php                            
                            $slider1= isset($slider->slider) ? $slider->slider : null;
                            $slider2= isset($slider->slider1) ? $slider->slider1 : null;
                            $slider3= isset($slider->slider2) ? $slider->slider2 : null;
                         ?>
                    <div class="carousel-item active">
                        <img class="first-slide" src="<?php echo e(asset('public/uploads/'.$slider1)); ?>" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="second-slide" src="<?php echo e(asset('public/uploads/'.$slider2)); ?>" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <?php
                            $file_ext = explode(".",$slider3);
                            if(end($file_ext) =="mp4" || end($file_ext) =="3gp")
                            {
                                $path = asset('public/uploads/'.$slider3);
                                ?>
                                    <video width="1905" height="736" controls autoplay>
                                        <source src="<?php echo e($path); ?>" type="video/mp4">
                                    </video>
                                <?php
                            }
                            else 
                            {
                                ?>
                                <img class="third-slide" src="<?php echo e(asset('public/uploads/'.$slider3)); ?>" alt="Third slide">
                                <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- Content -->
        <div id="content">
            <section class="search-city-bar">
                <div class="container">
                    <div class="row justify-content-lg-center justify-content-md-center">
                        <div class="col-lg-7 col-md-9">
                            <!--  url('search/city/escort')  -->
                                <div class="input-group">
                                    <input type="text" name="city_id" placeholder="Search Your city here" id="city_id" class="form-control">
                                    <!-- <select class="form-control" name="city_id">
                                        <option value="0">Search City</option>
                                            <?php $__currentLoopData = $States; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($state->id); ?>"><?php echo e($state->state); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select> -->
                                    <div class="input-group-append">
                                        <button class="btn btn-dark font-uppercase " style="margin-left: 0 !important;" type="submit" id="searchnow">Search Now</button>
                                        
                                         
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Section 3 -->
            <section class="home-escorts m-visible desk-hidden">
                <div class="container">
                    <div class="row escort-row">
                        <div class="escort-data"></div>
                        <?php $__currentLoopData = $escorts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $escort): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $name = str_replace(" ","-",$escort->name);
                        ?>
                        <div class="col-lg-3 col-6 escort-hide-show">
                            <div class="our-escort-box is-available" onclick="$('.escort-overview-detail').hide(); $('.'+<?php echo e($escort->id); ?>).show();">
                               <?php
                                $profile_image = NULL;
                                $profile_image_arr = DB::table('profile_images')->where('status','5')->where('escortId',$escort->id)->get();
                                if(count($profile_image_arr) > 0)
                                {
                                    $profile_image = $profile_image_arr[0]->image;
                                }
                               ?>
                                <?php if($profile_image==NULL): ?>
                                    <img src="<?php echo e(asset('public/blankphoto.png')); ?>" class="w-100 fix-es-box"> 
                                <?php else: ?>  
                                    <img src="<?php echo e(asset('public/uploads/'.$profile_image)); ?>" class="w-100 fix-es-box"/><?php endif; ?>

                                <div class="overlay-top">
                                    <div class="text">
                                        <h4><?php echo e($escort->name); ?></h4>
                                        <span class="location">
                                        	<?php echo e(isset($escort->state) ? $escort->state : ''); ?>

                                            <!-- <?php if(!isset($escort->city)): ?>
                                                
                                            <?php else: ?>
                                                <?php echo e($escort->state); ?>

                                            <?php endif; ?> -->                                            	
                                            </span>
                                    </div>
                                </div>
                                <div class="availability">
                                    <?php if(isset($escort->activation) && $escort->activation == 1): ?>
                                        <h5>
                                            Available Now
                                        </h5>
                                    <?php endif; ?>
                                </div>                                
                            </div>
                        </div>
                        <?php if($key!='0' && $key % 2 != 0): ?>
                            <div class="escort-overview-detail left-detail-arrow <?php echo e($escorts[$key-1]->id); ?>" style="display: none">
                                <div class="escort-box">
                                    <div class="box-head">
                                        <h4><?php echo e($escorts[$key-1]->name); ?></h4>
                                        
                                    </div>
                                    <table class="escort-profile-details">
                                        <tr>
                                            <td>Suburb</td>
                                            <td>
                                                <?php echo e(isset($escorts[$key-1]->city) ? $escorts[$key-1]->city : ''); ?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Service Area</td>
                                            <td>
                                                <?php if($escorts[$key-1]->serviceArea==1): ?>
                                                    In Call
                                                <?php elseif($escorts[$key-1]->serviceArea==2): ?>
                                                    Out Call
                                                <?php elseif($escorts[$key-1]->serviceArea==3): ?>
                                                    In call & Out Call
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Price</td>
                                            <?php
                                                $profile_Rate_one = \App\ProfileRate::where('escortId','=',$escorts[$key-1]->id)->where('price','!=','')->get();
                                                $profile_Rate_both = \App\ProfileRate::where('escortId','=',$escorts[$key-1]->id)->where('price','!=','')->select('price')->get();
                                                if(!empty($profile_Rate_both->toArray())){
                                                    $profile_Rate_both = min(json_decode(json_encode(($profile_Rate_both)),true));
                                                }
                                                
                                            ?>
                                            <td>
                                                <?php if(count($profile_Rate_one) < 2): ?>
                                                    <?php $__currentLoopData = $profile_Rate_one; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php echo e($val->price); ?>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                                
                                                <?php if(count($profile_Rate_one) > 1): ?>
                                                    <?php echo e(!empty($profile_Rate_both['price']) ? $profile_Rate_both['price'] : ''); ?>

                                                <?php endif; ?>
                                                PH
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Height</td>
                                            <td><?php echo e($escorts[$key-1]->height); ?> "</td>
                                        </tr>
                                    </table>
                                    <div class="profile-action">
                                        <a href="<?php echo e('profile/'.$escorts[$key-1]->id.'/'.str_replace(' ','-',$escorts[$key-1]->name)); ?>" class="btn btn-block red-small mt-2"> Visit Profile </a>
                                    </div>
                                </div>
                            </div>
                            <div class="escort-overview-detail right-detail-arrow <?php echo e($escorts[$key]->id); ?>" style="display: none">
                                <div class="escort-box">
                                    <div class="box-head">
                                        <h4><?php echo e($escorts[$key]->name); ?></h4>
                                        
                                    </div>
                                    <table class="escort-profile-details">
                                        <tr>
                                            <td>Suburb</td>
                                            <td>
                                                <?php echo e(isset($escorts[$key]->city) ? $escorts[$key]->city : ''); ?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Service Area</td>
                                            <td>
                                                <?php if($escorts[$key]->serviceArea==1): ?>
                                                    In Call
                                                <?php elseif($escorts[$key]->serviceArea==2): ?>
                                                    Out Call
                                                <?php elseif($escorts[$key]->serviceArea==3): ?>
                                                    In call & Out Call
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Price</td>
                                            <?php
                                                $profile_Rate_one = \App\ProfileRate::where('escortId','=',$escorts[$key]->id)->where('price','!=','')->get();
                                                $profile_Rate_both = \App\ProfileRate::where('escortId','=',$escorts[$key]->id)->where('price','!=','')->select('price')->get();
                                                if(!empty($profile_Rate_both->toArray())){
                                                    $profile_Rate_both = min(json_decode(json_encode(($profile_Rate_both)),true));
                                                }
                                                
                                            ?>
                                            <td>
                                                <?php if(count($profile_Rate_one) < 2): ?>
                                                    <?php $__currentLoopData = $profile_Rate_one; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php echo e($val->price); ?>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                                
                                                <?php if(count($profile_Rate_one) > 1): ?>
                                                    <?php echo e(!empty($profile_Rate_both['price']) ? $profile_Rate_both['price'] : ''); ?>

                                                <?php endif; ?>
                                                PH
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Height</td>
                                            <td><?php echo e($escorts[$key]->height); ?> "</td>
                                        </tr>
                                    </table>
                                    <div class="profile-action">
                                        <a href="<?php echo e('profile/'.$escorts[$key]->id.'/'.str_replace(' ','-',$escorts[$key]->name)); ?>" class="btn btn-block red-small mt-2"> Visit Profile </a>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </section>
            <section class="home-escorts m-hidden">
                <div class="container">
                    <div class="row escort-row">
                        <div class="escort-data"></div>
                        <?php $__currentLoopData = $escorts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $escort): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $name = str_replace(" ","-",$escort->name);
                        ?>
                        <div class="col-lg-3 col-6 escort-hide-show">
                             <a href="<?php echo e(url('profile/'.$escort->id.'/'.$name)); ?>">
                            <div class="our-escort-box is-available">
                               <?php
                                $profile_image = NULL;
                                $profile_image_arr = DB::table('profile_images')->where('status','5')->where('escortId',$escort->id)->get();
                                if(count($profile_image_arr) > 0)
                                {
                                    $profile_image = $profile_image_arr[0]->image;
                                }
                               ?>
                                <?php if($profile_image==NULL): ?>
                                    <img src="<?php echo e(asset('public/blankphoto.png')); ?>" class="w-100 fix-es-box"> 
                                <?php else: ?>  
                                    <img src="<?php echo e(asset('public/uploads/'.$profile_image)); ?>" class="w-100 fix-es-box"/><?php endif; ?>

                                <div class="overlay-top">
                                    <div class="text">
                                        <h4><?php echo e($escort->name); ?></h4>
                                        <span class="location">
                                        	<?php echo e(isset($escort->state) ? $escort->state : ''); ?>

                                            <!-- <?php if(!isset($escort->city)): ?>
                                                
                                            <?php else: ?>
                                                <?php echo e($escort->state); ?>

                                            <?php endif; ?> -->                                            	
                                            </span>
                                    </div>
                                </div>
                                <div class="overlay-bottom bottom-without-tour">
                                    <div class="text">                                        
                                        <table class="escort-profile-details">
                                            <tr>
                                                <td>Suburb</td>
                                                <td>
                                                    <?php echo e(isset($escort->city) ? $escort->city : ''); ?>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Service Area</td>
                                                <td>
                                                    <?php if($escort->serviceArea==1): ?>
                                                        In Call
                                                    <?php elseif($escort->serviceArea==2): ?>
                                                        Out Call
                                                    <?php elseif($escort->serviceArea==3): ?>
                                                        In call & Out Call
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Price</td>
                                                <?php
                                                    $profile_Rate_one = \App\ProfileRate::where('escortId','=',$escort->id)->where('price','!=','')->get();
                                                    $profile_Rate_both = \App\ProfileRate::where('escortId','=',$escort->id)->where('price','!=','')->select('price')->get();
                                                    if(!empty($profile_Rate_both->toArray())){
                                                        $profile_Rate_both = min(json_decode(json_encode(($profile_Rate_both)),true));
                                                    }
                                                    
                                                ?>
                                                <td>
                                                    <?php if(count($profile_Rate_one) < 2): ?>
                                                        <?php $__currentLoopData = $profile_Rate_one; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php echo e($val->price); ?>

                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                    
                                                    <?php if(count($profile_Rate_one) > 1): ?>
                                                        <?php echo e(!empty($profile_Rate_both['price']) ? $profile_Rate_both['price'] : ''); ?>

                                                    <?php endif; ?>
                                                    PH
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Height</td>
                                                <td><?php echo e($escort->height); ?> "</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                
                                <div class="availability">
                                    <?php if(isset($escort->activation) && $escort->activation == 1): ?>
                                        <h5>
                                            Available Now
                                        </h5>
                                    <?php endif; ?>
                                </div>                                
                            </div>
                        </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </section>
            <?php ?>
            <?php $__currentLoopData = $indpnts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indpnt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <section class="home-nofake-profile" style="background-image: url('<?php echo e(asset('public/uploads/'.$indpnt->bgimage)); ?>'); background-size:cover;background-position: center;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6">
                            <img src="<?php echo e(asset('public/uploads/'.$indpnt->icon)); ?>" class="verified-symbol">
                            <div class="escort-verification-content">
                                <h4><?php echo e($indpnt->topHead); ?> <br>for the</h4>
                                <h2><?php echo e($indpnt->title); ?></h2>
                               <?php echo $indpnt->description; ?>

                                <h4>Join Us</h4>
                                <ul>
                                    <li><a href="<?php echo e(url('/client/membership')); ?>" class="btn black-btn">Client register</a></li>
                                    <li><a href="<?php echo e(url('bacome/escort')); ?>" class="btn black-btn">escort register</a></li>
                                    <!-- <li><a href="<?php echo e(url('escort/signup')); ?>" class="btn black-btn">escort register</a></li> -->
                                   <!--  <li><a href="<?php echo e(url('/')); ?>" class="btn black-btn">Find Out More</a></li> -->
                                </ul>
                               <!--  <p><a href="<?php echo e(url('terms/condition')); ?>">Click here</a> to read why you should join with us</p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <section class="home-service-provider">
                <div class="container">
                    <div class="row justify-content-lg-center justify-content-md-center ">
                        <div class="col-lg-8">
                            <?php $__currentLoopData = $provresrcs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resourc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="box-title c-center">
                                <h2><?php echo e($resourc->titleHead); ?></h2>
                                
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <div class="row">
                        <?php $__currentLoopData = $provresrcs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resourc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <a href="<?php echo e(url('sex/trafficking')); ?>">
                                <div class="service-provider-box">
                                    <?php if($resourc->icon1==NULL): ?>
                                        <img src="<?php echo e(asset('public/blankphoto.png')); ?>" class="w-100">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('public/uploads/'.$resourc->icon1)); ?>" class="w-100"/>
                                    <?php endif; ?>                                
                                    <h4>
                                        <?php echo e($resourc->title1); ?>

                                    </h4>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php $__currentLoopData = $provresrcs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resourc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <a href="<?php echo e(url('local/resources')); ?>">
                                <div class="service-provider-box">
                                    <?php if($resourc->icon2==NULL): ?>
                                        <img src="<?php echo e(asset('public/blankphoto.png')); ?>" class="w-100">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('public/uploads/'.$resourc->icon2)); ?>" class="w-100"/>
                                    <?php endif; ?>                                
                                    <h4>
                                        <?php echo e($resourc->title2); ?>

                                    </h4>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                       

                        <?php $__currentLoopData = $provresrcs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resourc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <a href="<?php echo e(url('purchase/marketing')); ?>">
                                <div class="service-provider-box">
                                    <?php if($resourc->icon3==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" class="w-100"sss> <?php else: ?>  <img src="<?php echo e(asset('public/uploads/'.$resourc->icon3)); ?>" class="w-100"/><?php endif; ?>
                                    
                                    <h4><?php echo e($resourc->title3); ?></h4>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php $__currentLoopData = $provresrcs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resourc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <a href="<?php echo e(url('bacome/escort')); ?>">
                                <div class="service-provider-box">
                                    <?php if($resourc->icon4==NULL): ?>
                                        <img src="<?php echo e(asset('public/blankphoto.png')); ?>" class="w-100">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('public/uploads/'.$resourc->icon4)); ?>" class="w-100"/>
                                    <?php endif; ?>                                
                                    <h4>
                                        <?php echo e($resourc->title4); ?>

                                    </h4>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                        
                    </div>
                </div>
            </section>
             
            <?php $__currentLoopData = $professionals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $professonal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <section class="home-platform " style="background-image: url('<?php echo e(asset('public/uploads/'.$professonal->bgTop)); ?>'); background-size:cover;background-position: center;">              
                <div class="container">
                    <div class="row justify-content-lg-center justify-content-md-center ">
                        <div class="col-lg-8">                          
                          <?php $__currentLoopData = $professionals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $professonal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="box-title c-center dark">
                                <h2><?php echo e($professonal->titleHead); ?></h2>
                                <p><?php echo $professonal->intro; ?></p>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <div class="row justify-content-lg-center justify-content-md-center justify-content-center ">
                       <?php $__currentLoopData = $professionals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $professonal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6 col-6 col-6">
                            <a href="<?php echo e(url('multi/page?url=mul-reviews')); ?>">
                                <div class="platform-box">
                                    <div class="img-area">
                                        <?php if($professonal->icon1==NULL): ?>
                                            <img src="<?php echo e(asset('public/blankphoto.png')); ?>" class="w-100">
                                        <?php else: ?>
                                            <img src="<?php echo e(asset('public/uploads/'.$professonal->icon1)); ?>"  class="w-100"/>
                                        <?php endif; ?>
                                        <div class="overlay">
                                            <div class="icon"><img src="<?php echo e(asset('public/uploads/search-large-icon.png')); ?>"></div>
                                        </div>
                                    </div>
                                    <h3><?php echo e($professonal->title1); ?></h3>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php $__currentLoopData = $professionals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $professonal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6 col-6 col-6">
                            <a href="<?php echo e(url('blog')); ?>">
                                <div class="platform-box">
                                    <div class="img-area">
                                        <?php if($professonal->icon2==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" class="w-100"sss> <?php else: ?>  <img src="<?php echo e(asset('public/uploads/'.$professonal->icon2)); ?>" class="w-100"/><?php endif; ?>
                                        <div class="overlay">
                                            <div class="icon"><img src="<?php echo e(asset('public/uploads/search-large-icon.png')); ?>"></div>
                                        </div>
                                    </div>
                                    <h3><?php echo e($professonal->title2); ?></h3>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php $__currentLoopData = $professionals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $professonal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6 col-6 col-6">
                            <a href="<?php echo e(url('multi/page?url=mul-tours')); ?>">
                                <div class="platform-box">
                                    <div class="img-area">
                                        <?php if($professonal->icon3==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" class="w-100"sss> <?php else: ?>  <img src="<?php echo e(asset('public/uploads/'.$professonal->icon3)); ?>" class="w-100"/><?php endif; ?>
                                        <div class="overlay">
                                            <div class="icon"><img src="<?php echo e(asset('public/uploads/search-large-icon.png')); ?>"></div>
                                        </div>
                                    </div>
                                    <h3><?php echo e($professonal->title3); ?></h3>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php $__currentLoopData = $professionals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $professonal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6 col-6 col-6">
                            <a href="<?php echo e(url('multi/page?url=mul-blogs')); ?>">
                                <div class="platform-box">
                                    <div class="img-area">
                                        <?php if($professonal->icon4==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" class="w-100"sss> <?php else: ?>  <img src="<?php echo e(asset('public/uploads/'.$professonal->icon4)); ?>" class="w-100"/><?php endif; ?>
                                        <div class="overlay">
                                            <div class="icon"><img src="<?php echo e(asset('public/uploads/search-large-icon.png')); ?>"></div>
                                        </div>
                                    </div>
                                    <h3><?php echo e($professonal->title4); ?></h3>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php $__currentLoopData = $professionals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $professonal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6 col-6 col-6">
                            <a href="<?php echo e(url('explore/cities')); ?>">
                                <div class="platform-box">
                                    <div class="img-area">
                                        <?php if($professonal->icon5==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" class="w-100"sss> <?php else: ?>  <img src="<?php echo e(asset('public/uploads/'.$professonal->icon5)); ?>" class="w-100"/><?php endif; ?>
                                        <div class="overlay">
                                            <div class="icon"><img src="<?php echo e(asset('public/uploads/search-large-icon.png')); ?>"></div>
                                        </div>
                                    </div>
                                    <h3><?php echo e($professonal->title5); ?></h3>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php $__currentLoopData = $professionals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $professonal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6 col-6 col-6">
                            <a href="<?php echo e(url('multi/page?url=mul-client-logs')); ?>">
                                <div class="platform-box">
                                    <div class="img-area">
                                        <?php if($professonal->icon6==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" class="w-100"sss> <?php else: ?>  <img src="<?php echo e(asset('public/uploads/'.$professonal->icon6)); ?>" class="w-100"/><?php endif; ?>
                                        <div class="overlay">
                                            <div class="icon"><img src="<?php echo e(asset('public/uploads/search-large-icon.png')); ?>"></div>
                                        </div>
                                    </div>
                                    <h3><?php echo e($professonal->title6); ?></h3>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php $__currentLoopData = $professionals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $professonal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6 col-6 col-6">
                            <a href="<?php echo e(url('business/etiquete')); ?>">
                                <div class="platform-box">
                                    <div class="img-area">
                                        <?php if($professonal->icon7==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" class="w-100"sss> <?php else: ?>  <img src="<?php echo e(asset('public/uploads/'.$professonal->icon7)); ?>" class="w-100"/><?php endif; ?>
                                        <div class="overlay">
                                            <div class="icon"><img src="<?php echo e(asset('public/uploads/search-large-icon.png')); ?>"></div>
                                        </div>
                                    </div>
                                    <h3><?php echo e($professonal->title7); ?></h3>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php $__currentLoopData = $professionals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $professonal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6 col-6 col-6">
                            <a href="<?php echo e(url('faq')); ?>">
                                <div class="platform-box">
                                    <div class="img-area">
                                        <?php if($professonal->icon8==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" class="w-100"sss> <?php else: ?>  <img src="<?php echo e(asset('public/uploads/'.$professonal->icon8)); ?>" class="w-100"/><?php endif; ?>
                                        <div class="overlay">
                                            <div class="icon"><img src="<?php echo e(asset('public/uploads/search-large-icon.png')); ?>"></div>
                                        </div>
                                    </div>
                                    <h3><?php echo e($professonal->title8); ?></h3>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php $__currentLoopData = $professionals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $professonal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6 col-6 col-6">
                            <a href="<?php echo e(url('our/story')); ?>">
                                <div class="platform-box">
                                    <div class="img-area">
                                        <?php if($professonal->icon9==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" class="w-100"sss> <?php else: ?>  <img src="<?php echo e(asset('public/uploads/'.$professonal->icon9)); ?>" class="w-100"/><?php endif; ?>
                                        <div class="overlay">
                                            <div class="icon"><img src="<?php echo e(asset('public/uploads/search-large-icon.png')); ?>"></div>
                                        </div>
                                    </div>
                                    <h3><?php echo e($professonal->title9); ?></h3>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                       
                    </div>
                </div>
            </section>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php $__currentLoopData = $professionals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $professonal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <section class="home-signup-search" style="background-image: url('<?php echo e(asset('public/uploads/'.$professonal->bgBottom)); ?>'); background-size:cover;background-position: center;">
                <div class="container">
                    <div class="row justify-content-lg-center justify-content-md-center ">
                        <div class="col-lg-8">
                            <div class="box-title c-center logo-text">
                             <?php 
                             $footerinfo= $hedfoots->footerInfo;
                              $footerlogo= $hedfoots->footerLogo;?>

                                <h3><img src="<?php echo e(asset('public/uploads/'.$footerlogo)); ?>" class="title-logo"></h3>
                                <!--<h3>honey<span class="text-red">luxe</span></h3>-->
                                <p><?php echo e($footerinfo); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-lg-center justify-content-md-center ">
                        <div class="col-lg-7">
                            <div class="red-box">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 c-center">
                                        <div class="red-box-inner">
                                            <img src="<?php echo e(asset('public/uploads/signup-icon.png')); ?>" />
                                            <a href="<?php echo e(url('bacome/escort')); ?>" class="btn black-btn">Escort sign up</a>
                                            <a href="<?php echo e(url('client/membership')); ?>" class="btn black-btn">Client sign up</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 c-center">
                                        <div class="red-box-inner">
                                            <img src="<?php echo e(asset('public/uploads/search-xlarge-icon.png')); ?>" />
                                      
                                            <button class="btn black-btn "  data-toggle="modal" data-target="#social-media-popup">Social Media</button>
                                            <button class="btn black-btn"  data-toggle="modal" data-target="#contact-blog">Blog for Us</button>
                                            <!--<button class="btn black-btn">Full Search</button>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <section class="home-about-honey">
                <div class="container">
                    <div class="row  justify-content-lg-center justify-content-md-center ">
                        <?php $__currentLoopData = $abouts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $abt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-8">
                            <div class="box-title c-center">
                                <h2><?php echo e($abt->titleHead); ?></h2>
                                <p><?php echo e($abt->intro); ?></p>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <?php $__currentLoopData = $abouts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $abt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="text-content">
                               <?php echo $abt->description; ?>

                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Section 4 -->
            <section class="home-locations gray-bg">
                <div class="container">
                    <div class="row justify-content-lg-center justify-content-md-center ">
                        <div class="col-lg-8">
                            <?php 
                                 $footerinfo= $hedfoots->footerInfo;
                            ?>
                            <div class="box-title c-center">
                                <h2>
                                    Locations
                                </h2>
                                <p>
                                    <?php echo e($footerinfo); ?>

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-lg-center justify-content-md-center justify-content-center">
                        <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cntry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="location-box">
                                <?php if($cntry->countryImage==NULL): ?>
                                    <img src="<?php echo e(asset('public/blankphoto.png')); ?>" class="w-100"sss>
                                <?php else: ?>
                                    <img src="<?php echo e(asset('public/uploads/'.$cntry->countryImage)); ?>" class="w-100"/>
                                <?php endif; ?>

                                <?php
                                    $url = $cntry->country;
                                    $countries = str_replace(" ","-",$url);
                                ?>
                                <a href="<?php echo e(url('country/'.$countries)); ?>" class="city-btn"><?php echo e($cntry->country); ?></a> 
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                        
                        <div class="col-lg-12 view-more-area c-center ">
                            <button class="btn black-btn"  data-toggle="modal" data-target="#citySearch">view more cities</button> 
                        </div>
                    </div>
                </div>
            </section>
        </div>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.devbridge-autocomplete/1.4.11/jquery.autocomplete.js" integrity="sha512-JwPA+oZ5uRgh1AATPhLKeByWbXcsRnMMSBpvhuAGQp+CWISl/fHecOshbRcPPgKWau9Wy1H5LhiwAa4QFiQKYw==" crossorigin="anonymous"></script>
<script>
           $(document).ready(function(){
             src = "<?php echo e(route('suburb')); ?>";
            $("#city_id").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: src,
                        type : 'POST',
                        dataType: "json",
                        data: {
                            "_token": "<?php echo e(csrf_token()); ?>",
                            query : request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                minLength: 2,
           
            });

            $("#searchnow").on('click',function(){
                var city_id = $("#city_id").val();
                $.ajax({
                    url : "<?php echo e(route('escorts-ajax-data')); ?>",
                    type : "POST",
                    dataType:"json",
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        city_id:city_id
                    },
                    success: function(data) {
                        window.location.href = 'http://'+window.location.hostname+'/country/'+data;
                        /*$(".escort-data").html(data);*/
                        // var html = '<section class="home-escorts"><div class="container"><div class="row justify-content-lg-center justify-content-md-center escort-row"><div class="escort-data"></div>';
                        // for(var count =0; count < data.length; count++){
                        //     html += '<div class="col-lg-3 col-6 ">';
                        //     var ids = data[count].id;
                        //     html += '<a href="<?php echo url('profile-guest/') ?>/'+ids+' " >';
                        //     html += '<div class="our-escort-box is-available">';
                        //     if(data[count].photo == ''){
                        //         html += '<img src="<?php echo e(asset("public/blankphoto.png")); ?>" class="w-100">';
                        //     }else{
                        //         html +='<img src="<?php echo e(asset("public/uploads/")); ?>/'+data[count].photo+'" class="w-100"/>';
                        //     }
                        //     html += '<div class="overlay-top"><div class="text"><h4>';
                        //     html += data[count].name;
                        //     html += '</h4><span class="location">';
                        //     if(data[count].state == ''){
                        //         html += "Not Found";
                        //     }else{
                        //         html += data[count].state;
                        //     }
                        //     html += '</span></div></div><div class="overlay-bottom"><div class="text"><h3>';
                        //     if(data[count].state == ''){
                        //         html += "Not Found";
                        //     }else{
                        //         html += data[count].state;
                        //     }
                        //     html += ' - <?php echo e(date("d")); ?><sup>th</sup><?php echo e(date("M")); ?></h3><table class="escort-profile-details"><tr><td>Suburb</td><td>';
                        //     if(data[count].city == ''){
                        //         html += "Not Found";
                        //     }else{
                        //         html += data[count].city;    
                        //     }
                        //     html += '</td></tr><tr><td>Service Area</td><td>';
                        //     if(data[count].serviceArea == 1){
                        //         html += 'In Call';
                        //     }else{
                        //         html += 'Out Call';
                        //     }
                        //     html += '</td></tr><tr><td>Price</td><td>';
                        //     html += data[count].price;
                        //     html += '</td></tr><tr><td>Height</td><td>';
                        //     if(data[count].height == null){   
                        //         html += '``';
                        //     }else{
                        //         html += data[count].height;
                        //     }
                        //     html += '</td></tr></table></div></div>';
                        //     if(data[count].activation == 1){
                        //         html += '<div class="availability"><h5>Available Now</h5></div>';
                        //     }
                        //     html += '</div></a></div>';
                        // }
                        // html += '</div></div></section>';
                        // $(".escort-data").html(html);
                        // $('.escort-hide-show').hide();
                    }
                });
            });
        });
       </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.frontmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/welcome.blade.php ENDPATH**/ ?>