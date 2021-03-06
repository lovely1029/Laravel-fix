@extends('masters.frontmaster')
@section('title', 'Profile Details')
@section('main')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<div class="content-wrapper">


  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
       
        <!-- /.card-header -->
        <div class="card-body">

          <div class="text-center btn btn-success" style="width: 100%"><h3>
              <a href="{{ url('escort/profile/image') }}" class="btn btn-light">Gallery</a>
                     <a href="{{ route('escort.slider') }}" class="btn btn-light">Slider</a>
                     <a href="{{ route('escort.video') }}" class="btn btn-light">Video</a>
                     <a href="{{ route('escort.selfie') }}" class="btn btn-light">Selfie Gallery</a>
              
            </h3>
          </div>
          <br><br>
          <a href="{{ route('addselfie') }}" class="btn btn-success">Add Selfie Gallery</a>
          <hr>
            

          <!-- Gallert Start's Here -->
            <div class="row">
              <div class="col-md-12">
                <div id="mdb-lightbox-ui"></div>
                <div class="mdb-lightbox no-margin">
                  @foreach($selfie as $value)
                    <figure class="col-md-4">
                      <a href="{{ route('escort.selfie-edit',$value->id) }}" data-size="1600x1067" title="Edit Selfie Gallery">
                        <img alt="picture" src="{{ asset('public/uploads/'.$value->image) }} " class="img-fluid" style=" border-radius: 8px; width: 500px; height: 300px;"><br><br>
                      </a>
                     </figure>
                  @endforeach
                </div>
              </div>
            </div>
            <!-- Gallert End's Here -->
</div>
</div>
</div>
</section>
</div>

              @endsection