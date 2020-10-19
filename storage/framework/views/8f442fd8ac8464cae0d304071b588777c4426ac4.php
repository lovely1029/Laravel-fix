<?php $__env->startSection('title', 'Feeds'); ?>
<?php $__env->startSection('main'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        
        <div class="card-body">
          







<?php if(Auth::user()->roleStatus==2): ?>


<a href="<?php echo e(url('/home')); ?>" class="btn btn-primary">Back</a><hr>
    <div class="text-center btn btn-success" style="width: 100%"><h1>Feeds </h1></div><hr>
          
          <form role="form" method="POST" action="<?php echo e(url('admin/escort/feeds/store')); ?>" enctype="multipart/form-data">
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
                        <input name="image" type="file" accept="image/*" value="0">
                        <img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: width: 100%;">
                      </div>
                    </div>
                  </div>

                    <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('url')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="url" class="form-control">
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Title')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="title" class="form-control">
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
                        <textarea class="form-control" name="description"></textarea>
                      </div>
                    </div>
                  </div>


                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Status')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="status">
                          <option value="0">Image Text</option>
                          <option value="1">Only Text</option>
                          <option value="2">Video Text</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Escort To')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="escortId">
                <option value="<?php echo e(Auth::user()->id); ?>"><?php echo e(Auth::user()->name); ?></option>
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
                <th><?php echo e(__('Date')); ?></th>
                <th><?php echo e(__('Status')); ?></th>
                <th><?php echo e(__('Escort')); ?></th>
                <th><?php echo e(__('Picture')); ?></th>
                <th><?php echo e(__('URL')); ?></th>
                <th><?php echo e(__('Title')); ?></th>
                <th><?php echo e(__('Description')); ?></th>
                <th><?php echo e(__('Action')); ?></th>
              </tr>
            </thead>
            <tbody>
              <?php $feeds =\App\Feed::all()->where('escortId', Auth::user()->id);?>
              <?php $i=1;?>
              <?php $__currentLoopData = $feeds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td>00<?php echo e($i++); ?></td>
                <td><?php echo e($data->date); ?></td>
                <td><?php if($data->status==0): ?> Image Text <?php elseif($data->status==1): ?> Only Text <?php elseif($data->status==2): ?> Video Text <?php else: ?> None <?php endif; ?></td>
                <td><?php if($data->escortId==0): ?> None <?php else: ?> <?php echo e(\App\User::find($data->escortId)->name); ?> <?php endif; ?></td>
                
                <td><?php if($data->image==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="width: 30px;"> <?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$data->image)); ?>" style="width: 30px;"><?php endif; ?></td>
                <td><?php echo e($data->url); ?></td>

                <td><?php echo e($data->title); ?></td>
                <td><?php echo $data->description; ?></td>
                
                
                
                
                <td><a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-xl<?php echo e($data->id); ?>">Modify</a> <a href="<?php echo e(url('admin/terms/delete/'.$data->id)); ?>" class="btn btn-xs btn-danger">Delete</a>  </td>
                
                
                
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
            </table>














  <!-- Modal Start================ -->
   <?php $__currentLoopData = $feeds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="modal fade" id="modal-xl<?php echo e($data->id); ?>">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header" style="background: #b00404;">
          <h4 class="modal-title">Modify Information</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>





        <form role="form" method="POST" action="<?php echo e(url('admin/escort/feeds/update')); ?>" enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>

          <div class="modal-body">
            
            <input type="hidden" name="id" value="<?php echo e($data->id); ?>">
            <div class="row">
              
              <div class="col-md-6">
                <div class="row">

                   <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Escort To')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="escortId">
                        <option value="<?php echo e($data->escortId); ?>">Current <?php echo e(\App\User::find($data->escortId)->name); ?></option>
                                    <option value="<?php echo e(Auth::user()->id); ?>"><?php echo e(Auth::user()->name); ?></option>
                        </select>
                      </div>
                    </div>
                  </div>


                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Icon Image')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input name="image" type="file" accept="image/*" value="<?php echo e($data->image); ?>">
                        <img src="<?php echo e(asset('public/uploads/'.$data->image)); ?>" style="width:100%;">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group sip_mt">
                      <div class="select_2_alska2">
                        <label class="FormLabel1"><?php echo e(__('Url')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <input type="text" name="url" class="form-control" value="<?php echo e($data->url); ?>">
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
                        <label class="FormLabel1"><?php echo e(__('Status')); ?>*</label>
                      </div>
                      <div class="selct_2_alska">
                        <select class="form-control" name="status">
                          <option value="<?php echo e($data->status); ?>">Current <?php if($data->status==0): ?> Image Text <?php elseif($data->status==1): ?> Only Text <?php elseif($data->status==2): ?> Video Text <?php else: ?> None <?php endif; ?></option>
                          <option value="0">Image Text</option>
                          <option value="1">Only Text</option>
                          <option value="2">Video Text</option>
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









<?php else: ?>
<?php endif; ?>








          </div>
          
          
          
          
        </div>
        
      </div>
    </section>
  </div>











  <?php $__env->stopSection(); ?>
<?php echo $__env->make('masters.frontmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/frontend/escort_dashboard/escortFeeds.blade.php ENDPATH**/ ?>