@extends('masters.profileMaster')
@section('title', 'Report')
@section('header_title', 'Report')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
		<form>
			<div class="clearfix row">
				<div class="col-md-12 ">
					<div class="form-group">
						<label class="d-block">Report a client</label>
						<div class="report-content">
							<ul>
								@foreach ($reports as $report_details)
									
								@endforeach
								<li><h5>Sarah Smith 2/4/2020 <span>- This person did not pay me.</span></h5></li>
								<li><h5>Mr Andy 3/5/2020 <span>- Person rang 4 times and note spoke</span></h5></li>
								<li><h5>James Kild  3/2/2020 <span>- Person is not nice</span></h5></li>
							</ul>
						</div>
					</div>
					<div class="form-group">
						<label class="d-block">Search Number Here</label>
						{{-- <input type="text" class="form-control" /> --}}
						<input type="text" name="client_id" id="client_id">
					</div>
					<div class="form-group">
						<label class="d-block">Wright a report here</label>
						<textarea class="form-control"></textarea>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-12">
					<button class="submit-btn">Submit</button>
				</div>
			</div>
		</form>
<script>
	$(document).ready(function () {
		$("#page_header_heading").html('Report');
		$('#escort_list').select2();
	});

	$("#client_id").keyup(function (e) 
	{ 
		keyword = $(this).val();
		$.ajax({
			type: "POST",
			url: "{{ route('escort.get-client-by-number') }}",
			data: {keyword:keyword,"_token": "{{ csrf_token() }}"},
			dataType: "html",
			success: function (response) {
				console.log(response);
			}
		});
	});
	
	function doReport(current_user_id, escort_id, escort_name) 
	{
		Swal.fire(
		{
			title: 'Are you sure? Do you want to unfriend "'+escort_name+'"',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		}).then((result) => 
		{
			if (result.isConfirmed) 
			{
				Swal.fire(
					'Deleted!',
					'Your file has been deleted.',
					'success'
				);
				$.ajax({
					type: "POST",
					url: "{{ route('client.unfriend') }}",
					data: {current_user_id:current_user_id,escort_id:escort_id,"_token": "{{ csrf_token() }}"},
					dataType: "JSON",
					success: function (response) {
						if(response=='1')
						{
							location.reload();
						}
					}
				});
			}
		})
	}
</script>
@endsection