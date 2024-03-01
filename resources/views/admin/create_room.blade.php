<!DOCTYPE html>
<html>
  <head> 
 @include('admin.css')

 <style>
 	
label {
	display: inline-block;
	width:200px;
}
.div_deg {
	padding-top:25px;
}
.div_center{
	text-align:center;
	padding-top:40px;
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
          	
<div class="row">
	<div class="col-md-6 offset-3">
          		<h1 style="font-size: 30px; font font-weight: bold; color:White; padding-top: 100px; padding-bottom: 50px; padding-left: 100px;"  >Add Room</h1>
          		<form action="{{ url('add_room') }}" method="post" enctype="multipart/form-data">
          			@csrf

          			<div class="div_deg">
          				<label>
          					Room Title
          				</label>  
          				<input type="text" name="title">       				
          			</div>

          			<div class="div_deg">
          				<label>
          					Description
          				</label>  
          				<textarea name="description"></textarea>       				
          			</div>

          			<div class="div_deg">
          				<label>
          					Price
          				</label>  
          				<input type="number" name="price">       				
          			</div>

          			<div class="div_deg">
          				<label>
          					Room Type
          				</label>  
          				<select name="type">
          					<option selected value="regular">Regular</option>
          					<option value="premium">Premium</option>
          					<option value="deluxe">Deluxe</option>
          				</select>       				
          			</div>

          			<div class="div_deg">
          			<label>
          					free Wifi
          				</label>  
          				<select name="wifi">
          					<option selected value="yes">Yes</option>
          					<option value="no">No</option>>
          				</select>       				
          			</div>

          			<div class="div_deg">
          				<label>
          					Uploade Image
          				</label>  
          				<input type="file" name="image">       				
          			</div>

          			<div class="div_deg" style="padding-left: 100px; padding-top: 50px; padding-bottom: 150px;" >
          				<input class="btn btn-primary" type="submit" value="Add Room">
          			</div>
	
          		</form>
          	   </div>  			
			</div>
          </div>
        </div>
</div>              
@include('admin.footer')
  </body>
</html>