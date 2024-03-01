<!DOCTYPE html>
<html>
  <head> 
 @include('admin.css')

 <style>
 	.table_deg{
 		border:2px solid white;
 		margin:auto;
 		width:100%;
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

          	<table class="table_deg">
          		<tr>
          			<th class="th_deg">Room id </th>
          			<th class="th_deg">Customer ame</th>
          			<th class="th_deg">Email</th>
          			<th class="th_deg">Phone</th>
          			<th class="th_deg">Arrival date</th>
          			<th class="th_deg">Leaving Date</th>
          			<th class="th_deg">Status</th>
          			<th class="th_deg">Room Title</th>
          			<th class="th_deg">Price</th>
          			<th class="th_deg">Image</th>
          			<th class="th_deg">Delete</th>
          			<th class="th_deg">Staus Update</th>
          		
          		</tr>
          		
          		@foreach($data as $data)

          		<tr style="border-bottom: 1px solid white;">
          			<td class="td_deg">{{ $data->room_id }}</td>
          			<td class="td_deg">{{ $data->name }}</td>
          			<td class="td_deg">{{ $data->email }}</td>
          			<td class="td_deg">{{ $data->phone }}</td>
          			<td class="td_deg">{{ $data->start_date }}</td>
          			<td class="td_deg">{{ $data->end_date }}</td>
          			<td class="td_deg">
          				
          				@if($data->status == 'approve')
          					<span style="color: skyblue;">Approved</span>
          				@endif
          				@if($data->status == 'reject')
          					<span style="color: red;">Rejected</span>
          				@endif
          				@if($data->status == 'waiting')
          					<span style="color: yellow;">Waiting</span>
          				@endif



          			</td>
          			<td class="td_deg">{{ $data->room->room_title }}</td>
          			<td class="td_deg">{{ $data->room->price }}</td>
          			<td class="td_deg">
          				<img height="100px" width="100px" src="/room/{{ $data->room->image }}">
          			</td>
          			<td>
          				<a onclick="return confirm('Are you sure to delete this?')" class="btn btn-sm btn-danger" href="{{ url('delete_booking',$data->id) }}">Delete</a>
          			</td>
          			<td><span style="padding-bottom: 10px;">
          				<a class="btn btn-sm btn-success" href="{{ url('approve_book',$data->id) }}">Approve</a>
          				</span>
          				<a class="btn btn-sm btn-warning" href="{{ url('reject_book',$data->id) }}">Rejected</a>
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