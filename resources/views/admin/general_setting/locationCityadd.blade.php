@extends('masters.master')
@section('title', 'Location')
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
          <h3 class="card-title FormTitle">Add Bulk Suburb</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table class="table table-borderless">
            <form method="post" action="{{ route('admin.location.citybulk') }}" enctype="multipart/form-data">
              {{ csrf_field() }}
              <input type="hidden" name="id" value="{{ $id }}">
              <input type="hidden" name="country_id" value="{{ $state[0]->country_id }}">
              <tr>
                <td>
                  <input type="file" name="citylist">                      
                </td>
              </tr>
              <tr>
                <td>
                  <a class="btn btn-info" href="/public/uploads/sample_suburb.csv">Download Sample</a>
                </td>
              </tr>
              <tr>
                <td>
                  <input type="submit" name="submit" value="Save" class="btn btn-success">                      
                </td>
              </tr>                    
            </form>
          </table>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection