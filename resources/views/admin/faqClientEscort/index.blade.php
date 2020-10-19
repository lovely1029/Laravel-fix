@extends('masters.editormaster')
@section('title', 'FAQ Escort Client')
@section('main')
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <!-- SELECT2 EXAMPLE -->
         <div class="card card-default">
            <div class="card-header">
               <h3 class="card-title FormTitle">FAQ Escort Client</h3>
               <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
               </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               <div class="text-center btn btn-success">
                  <h1>FAQ Escort Client</h1>
               </div>
               <hr>
               <form role="form" method="POST" action="{{ route('faq.client.escort.store')}}" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="row">
                     <div class="col-md-6">
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="form-group sip_mt">
                                 <div class="select_2_alska2">
                                    <label class="FormLabel1">{{ __('Question') }}*</label>
                                 </div>
                                 <div class="selct_2_alska">
                                    <input name="question" type="text">
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group sip_mt">
                                 <div class="select_2_alska2">
                                    <label class="FormLabel1">{{ __('Escort/Client') }}*</label>
                                 </div>
                                 <div class="selct_2_alska">
                                    <select class="form-control" name="roleType">
                                    	<option>
                                    		Escort/Client
                                    	</option>
                                    	<option value="2">
                                    		Escort
                                    	</option>
                                    	<option value="3">
                                    		Client
                                    	</option>
                                    </select>
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
                                    <label class="FormLabel1">{{ __('Answer') }}*</label>
                                 </div>
                                 <div class="selct_2_alska">
                                    <textarea class="textarea" name="answer"></textarea>
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
            </div>
         </div>
      </div>
   </section>
</div>











  @endsection