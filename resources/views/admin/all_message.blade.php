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


          	<h1 style="font-size: 30px; font font-weight: bold; color:White; padding-top: 100px; padding-bottom: 50px; padding-left: 100px; margin-left: 40%;"   >All Messages</h1>

            

          	<table class="table_deg">
          		<tr>
          			<th class="th_deg">Name</th>
          			<th class="th_deg">Email</th>
          			<th class="th_deg">Phone</th>
          			<th class="th_deg">Message</th>
          			<th class="th_deg">Delete</th>
                <th class="th_deg">Send Email</th>
          		</tr>
          		@foreach($messages as $message)
          		<tr style="border-bottom: 1px solid white;">
          			<td class="td_deg">{{ $message->name }}</td>          			
          			<td class="td_deg">{{ $message->email }}</td>
          			<td class="td_deg">{{ $message->phone }}</td>
                <td class="td_deg">{!! Str::limit($message->message,100) !!}</td>
          			
          			
          			<td>
          				<a onclick="return confirm('Are you sure to delete message?')" class="btn btn-sm btn-danger" href="{{ url('delete_message',$message->id) }}">Delete</a>
          			</td>
                <td>
                  <a class="btn btn-sm btn-success" href="{{ url('send_email',$message->id) }}">send email</a>
                </td>

          			
          		</tr>

          		@endforeach
          	</table>


          </div>
        <div>          	
</div>




@include('admin.footer')
  </body>
</html>