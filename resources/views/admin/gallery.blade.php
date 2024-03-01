<!DOCTYPE html>
<html>
  <head> 
 @include('admin.css')
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
          	<h1 style="font-size:40px; font-weight: bold; color: white; padding-top: 50px; padding-bottom: 50px; ">Gallery</h1>
          	<div class="row">
          	@foreach($gallery as $gallery)
          		<div class="col-md-3">
          			<img height="200px!important" width="300px!important" src="/gallery/{{ $gallery->image }}">
          			<a style="margin-top:10px; margin-bottom:30px;" class="btn btn-sm btn-danger" href="{{ url('delete_image',$gallery->id) }}">Delete Image</a>
          		</div>
          	@endforeach
          </div>
          	<form action="{{ url('upload_gallery') }}" method="Post" enctype="multipart/form-data">
          		@csrf

          		<div style="padding: 30px; padding-top: 100px;" >
          			<label style="color: white; font-weight:bold;">Upload Image</label>
          			<input type="file" name="image" required>
          	
          			<input class="btn btn-sm btn-primary" type="submit" value="Add Image">
          		</div>

          	</form>
</center>
          </div>
        </div>
</div>



@include('admin.footer')
  </body>
</html>