<?php $__env->startSection('title', 'FAQ'); ?>
<?php $__env->startSection('main'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">FAQ</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          


          <div class="text-center btn btn-success"><h1>FAQ</h1></div><hr>
    
          <form role="form" method="POST" action="<?php echo e(url('admin/faq/store')); ?>" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

           
            
            <div class="row">
              
              <div class="col-md-6">
                <div class="row">

                    <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Image')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="imageurl" type="file" accept="image/*" value="0">
                      <img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 100%;">
                      </div>
                    </div>
                  </div>




                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                       <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Title')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="title">
                      </div>
                    </div>
                  </div>
                 
                  
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">

                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                     <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Description')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                       <textarea class="textarea" name="description"></textarea>
                      </div>
                    </div>
                  </div>

                  
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Upload To')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="status">
                          <option value="1">Top Section 01</option>
                          <option value="2">Bottom Section 02</option>
                          <option value="3">Contact Section 03</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  
                  
                  
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        
                      </div>
                      <div class="selct_2_alska">
                        <input type="submit" class="btn btn-success" value="Save">
                      </div>
                    </div>
                  </div>
                  
                  
                </div>
                
              </div>
            </div>
          

          </form>

<table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                <th><?php echo e(__('ID No.')); ?></th>
                <th><?php echo e(__('Picture')); ?></th>
                <th><?php echo e(__('Title')); ?></th>
                <th><?php echo e(__('Status')); ?></th>
                <th><?php echo e(__('Description')); ?></th>
                <th><?php echo e(__('Action')); ?></th>
                </tr>
              </thead>
              <tbody>
                   <?php $faqs =\App\Faq::all();?>
                 <?php $i=1;?>
              <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td>00<?php echo e($i++); ?></td>
                <td><?php if($data->imageurl==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 30px;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$data->imageurl)); ?>" style="width: 30px;"><?php endif; ?></td>
                <td><?php echo e($data->title); ?></td>
                <td>Section <?php echo e($data->status); ?></td>
                <td><?php echo $data->description; ?></td>
              
              
                <td><a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-xl<?php echo e($data->id); ?>">Modify</a> <a href="<?php echo e(url('admin/faq/delete/'.$data->id)); ?>" class="btn btn-xs btn-danger">Delete</a></td>
             
              
                
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
              </table>



 <div class="text-center btn btn-success"><h1>FAQ Question</h1></div><hr>
    
          <form role="form" method="POST" action="<?php echo e(url('admin/faq/question/store')); ?>" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

           
            
            <div class="row">
              
              <div class="col-md-6">
                <div class="row">

                  



                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                       <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Question')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <textarea class="textarea" name="question"></textarea>
                      </div>
                    </div>
                  </div>
                 
                  
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">

                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                     <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Answer')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                       <textarea class="textarea" name="answer"></textarea>
                      </div>
                    </div>
                  </div>

                  
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Upload To')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="status">
                          <option value="1">Left Side</option>
                          <option value="2">Right Side</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  
                  
                  
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        
                      </div>
                      <div class="selct_2_alska">
                        <input type="submit" class="btn btn-success" value="Save">
                      </div>
                    </div>
                  </div>
                  
                  
                </div>
                
              </div>
            </div>
          

          </form>



        <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                <th><?php echo e(__('ID No.')); ?></th>
                <th><?php echo e(__('Status')); ?></th>
                <th><?php echo e(__('Question')); ?></th>
                 <th><?php echo e(__('Answer')); ?></th>
                <th><?php echo e(__('Action')); ?></th>
                </tr>
              </thead>
              <tbody>
                   <?php $faqqs =\App\FaqQuestion::all();?>
                 <?php $i=1;?>
              <?php $__currentLoopData = $faqqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td>00<?php echo e($i++); ?></td>
                <td><?php if($data1->status==1): ?> Left <?php elseif($data1->status==2): ?> Right <?php else: ?> <?php endif; ?></td>
                <th><?php echo e($data1->question); ?></th>
                <td><?php echo $data1->answer; ?></td>
              
              
                <td><a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-lg<?php echo e($data1->id); ?>">Modify</a> <a href="<?php echo e(url('admin/faq/question/delete/'.$data1->id)); ?>" class="btn btn-xs btn-danger">Delete</a></td>
             
              
                
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
              </table>





















        </div>
        
        
        
        
      </div>
      
    </div>
  </section>
</div>















  <!-- Modal Start================ -->
         <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="modal fade" id="modal-xl<?php echo e($data->id); ?>">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header" style="background: #b00404;">
          <h4 class="modal-title">Modify Information</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>





        <form role="form" method="POST" action="<?php echo e(url('admin/faq/update')); ?>" enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>

          <div class="modal-body">
            
            <input type="hidden" name="id" value="<?php echo e($data->id); ?>">
            <div class="row">
              
              <div class="col-md-6">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Icon Image')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="imageurl" type="file" accept="image/*" value="<?php echo e($data->imageurl); ?>">
                        <img src="<?php echo e(asset('public/uploads/'.$data->imageurl)); ?>" style="width:100%;">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Title')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="title" class="form-control" value="<?php echo e($data->title); ?>">
                      </div>
                    </div>
                  </div>
                  
                  
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Description')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <textarea class="textarea" name="description"><?php echo e($data->description); ?></textarea>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Upload To')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="status"  value="<?php echo e($data->status); ?>">
                          <option value="<?php echo e($data->status); ?>">Current Section <?php echo e($data->status); ?></option>
                          <option value="1">Top Section 01</option>
                          <option value="2">Bottom Section 02</option>
                          <option value="3">Contact Section 03</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  
                  
                  
                  
                  
                </div>
                
              </div>
            </div>
            
            
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>




        </div>
        
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal-dialog -->
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>














  <!-- Modal Start================ -->
    <?php $__currentLoopData = $faqqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="modal fade" id="modal-lg<?php echo e($data1->id); ?>">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header" style="background: #b00404;">
          <h4 class="modal-title">Modify Information</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>





        <form role="form" method="POST" action="<?php echo e(url('admin/faq/question/update')); ?>" enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>

          <div class="modal-body">
            
            <input type="hidden" name="id" value="<?php echo e($data1->id); ?>">
            <div class="row">
              
             
              <div class="col-md-12">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Question')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <textarea class="textarea" name="question"><?php echo e($data1->question); ?></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Answer')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <textarea class="textarea" name="answer"><?php echo e($data1->answer); ?></textarea>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Upload To')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="status"  value="<?php echo e($data1->status); ?>">
                          <option value="<?php echo e($data1->status); ?>">Current <?php if($data1->status==1): ?> Left <?php elseif($data1->status==2): ?> Right <?php else: ?> <?php endif; ?></option>
                           <option value="1">Left</option>
                          <option value="2">Right</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  
                  
                  
                  
                  
                </div>
                
              </div>
            </div>
            
            
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>




        </div>
        
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal-dialog -->
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>







  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.editormaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/admin/front_pages/adminFaq.blade.php ENDPATH**/ ?>