<!DOCTYPE html>
<html>
  <head> 
 <base href="/public"> 	
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


 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> 
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
          	<center>
          		<h1 style="font-size:30px; font-weight:bold; color: white; padding-top:50px; padding-bottom:50px;">Email send to {{ $data->name }}</h1>

              <div>
                     @if(session()->has('message'))
                        <div class="alert alert-success">
                           <button type="button" class="close" data-bs-dismiss="alert">x</button>
                           {{ session()->get('message') }}
                        </div>
                     @endif
                  </div>


</center>
<div class="row">
	<div class="col-md-6 offset-3">
          		<form action="{{ url('email',$data->id) }}" method="Post">
          			@csrf

          			<div class="div_deg">
          				<label>
          					Greeting
          				</label>  
          				<input type="text" name="greeting">       				
          			</div>

          			<div class="div_deg">
          				<label>
          				Email Body
          				</label>  
          				<textarea name="body"></textarea>       				
          			</div>

          			<div class="div_deg">
          				<label>
          					Action Text
          				</label>  
          				<input type="text" name="action_text">       				
          			</div>

          			<div class="div_deg">
          				<label>
          					Action Url
          				</label>  
          				<input type="text" name="action_url">       				
          			</div>

          			<div class="div_deg">
          				<label>
          					End Line
          				</label>  
          				<input type="text" name="end_line">       				
          			</div>



          			

          			
          			

          			<div class="div_deg" style="padding-left: 100px; padding-top: 50px; padding-bottom: 150px;" >
          				<input class="btn btn-primary" type="submit" value="Send Email">
          			</div>
	
          		</form>
			</div>
		</div>

          	
          </div>
        </div>
</div> 	

     
@include('admin.footer')


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  </body>
</html>