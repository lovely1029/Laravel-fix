@extends('masters.master')
@section('title', 'Social Media')
@section('main')
<style>
.pagination{
float: right;
}
</style>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title FormTitle">Social Media</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table class="table table-borderless">
            <form method="post" action="{{ route('admin.social.media.store') }}" enctype="multipart/form-data">
              {{ csrf_field() }}
              
              <tr>
                <td>
                  <input type="file" name="icon" id="icon">
                  <br>
                  <b>Icon Size Should be 64x64</b>
                </td>
              </tr>
              <tr>
                <td>
                  <input type="text" name="social_url" class="form-control" placeholder="Social Media">
                </td>
              </tr>
              <tr>
                <td>
                  <input type="submit" name="submit" value="Save" class="btn btn-success" id="submit">
                </td>
              </tr>                    
            </form>
          </table>
		<table class="table">
			<thead>
				<tr>
					<th>ID#</th>
					<th>Social Media</th>
					<th>Social Media Icon</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@php $i = 1  @endphp
				@foreach($socail as $value)
				<tr>
					<td>
						{{ $i++ }}
					</td>
					<td>
						{{ $value->socail_media_url }}
					</td>
					<td>
						<img src="{{ asset('public/icon/'.$value->icon) }}" alt="" width="50" height="50" title="{{ $value->socail_media_url }}">
					</td>
					<td>
						<a href="{{ route('admin.social.media.edit',$value->id) }}" class="btn btn-xs btn-primary">Modify</a>
						<a href="{{ route('admin.social.media.delete',$value->id) }}" class="btn btn-xs btn-danger">Delete</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
        </div>
      </div>
    </div>
  </section>
</div>
<script>
$(document).ready(function(){
  $("#submit").on('click',function(){
    var imgWidth = $('#icon').width();
    var imgHeight = $('#icon').height();
    if(imgWidth > 64 || imgHeight > 64){
      alert('Your Icon is too big, it must be less than 64x64');
  });
}
});
</Script>
@endsection