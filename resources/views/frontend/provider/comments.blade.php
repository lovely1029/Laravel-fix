@extends('masters.frontmaster')

@section('title', __('Become Escort'))
@section('main')

 
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

	.mainbody{width: 90%; margin: 1% auto;}
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
</style>
</head>
<body>

<div class="mainbody">
<h2>All Comments</h2>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

<table id="myTable">

  <?php $comments=\App\LikeComment::all()->where('likes',0)->where('escortId', $escortid);?>

  @foreach($comments as $comment)
  <?php 
  $photo=\App\User::find($comment->userId)->photo;

  ?>
  <tr class="header">
  	<th style="width:5%;">  @if($photo==NULL)<img src="{{asset('public/blankphoto.png')}}" style="width:50px;height: 50px;border-radius: 50%;"> @else <img src="{{asset('public/uploads/'.$photo)}}" style="width:50px;height: 50px;border-radius: 50%;">@endif</th>
    <th style="width:10%;">{{\App\User::find($comment->userId)->name}}</th>
    <td style="width:85%;">{{$comment->comments}}</td>
  </tr>
  @endforeach
  
</table>
</div>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

</body>
</html>

@endsection