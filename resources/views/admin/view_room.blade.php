<!DOCTYPE html>
<html>
  <head> 
 @include('admin.css')
 <style>
 	.table_deg{
 		border:2px solid white;
 		margin:auto;
 		width:80%;
 		text_align:center;
 		color:white;
 		margin-top:50px;
    margin-bottom:80px;

 	}
 	.th_deg
 	{
 		background-color:skyblue;
 		padding:15px;

 	}
 	.td_deg{
 		text_align:center;
 		padding:15px;

 	}

 </style>
  </head>
  <body>
 @include('admin.header')
   
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
     
 @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
<div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
<h1 style="font-size: 30px; font font-weight: bold; color:White; padding-top: 100px; padding-bottom: 50px; padding-left: 100px; margin-left: 40%;"   >View Rooms</h1>
          	<table class="table_deg">
          		<tr>
          			<th class="th_deg">Room Title</th>
          			<th class="th_deg">Description</th>
          			<th class="th_deg">Price</th>
          			<th class="th_deg">Wifi</th>
          			<th class="th_deg">Room Type</th>
          			<th class="th_deg">Image</th>
          			<th class="th_deg">Delete</th>
          			<th class="th_deg">Update</th>
          		</tr>
          		@foreach($rooms as $room)
          		<tr style="border-bottom: 1px solid white;">
          			<td class="td_deg">{{ $room->room_title }}</td>
          			<td class="td_deg">{!! Str::limit($room->description,100) !!}</td>
          			<td class="td_deg">{{ $room->price }}$</td>
          			<td class="td_deg">{{ $room->wifi }}</td>
          			<td class="td_deg">{{ $room->room_type }}</td>
          			<td class="td_deg">
          				<img src="room/{{ $room->image }}" width="100px" height="100px">
          			</td>
          			<td>
          				<a onclick="return confirm('Are you sure to delete this?')" class="btn btn-sm btn-danger" href="{{ url('room_delete',$room->id) }}">Delete</a>
          			</td>

          			<td>
          				<a  class="btn btn-sm btn-warning" href="{{ url('room_update',$room->id) }}">Update</a>
          			</td>
          		</tr>

          		@endforeach
          	</table>


          </div>
      </div>
</div>   
@include('admin.footer')
  </body>
</html>