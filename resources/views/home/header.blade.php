  <!-- header inner -->
         <div class="header">
            <div class="container">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="{{ url('/') }}"><img src="images/logo.png" alt="#" /></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                              @if($active == 'home')
                              <li class="nav-item active">
                              <a class="nav-link" href="{{ url('/') }}">Home</a>
                              </li>
                              @else
                              <li class="nav-item">
                                 <a class="nav-link" href="{{ url('/') }}">Home</a>
                              </li>
                              @endif
                              @if($active == 'rooms')
                              <li class="nav-item active">
                                <a class="nav-link" href="{{ url('our_rooms') }}">Our room</a>
                              </li>
                              @else
                              <li class="nav-item">
                                 <a class="nav-link" href="{{ url('our_rooms') }}">Our room</a>
                              </li>
                              @endif
                              @if($active == 'gallery')
                              <li class="nav-item active">
                                <a class="nav-link" href="{{ url('hotel_gallery') }}">Gallery</a>
                              </li>
                              @else
                              
                              <li class="nav-item">
                                 <a class="nav-link" href="{{ url('hotel_gallery') }}">Gallery</a>
                              </li>
                              @endif
                              @if($active == 'contact')
                              <li class="nav-item active">
                                <a class="nav-link" href="{{ url('contact_us') }}">Contact Us</a>
                              </li>
                              @else
                            
                              <li class="nav-item">
                                 <a class="nav-link" href="{{ url('contact_us') }}">Contact Us</a>
                              </li>
                              @endif
       
 
                        @if (Route::has('login'))
                         
                              @auth
                              <li class="nav-item">
                                    <x-app-layout>
                                      
                                    
                                    </x-app-layout>
                              </li>
                                @else
                                    <li class="nav-item">
                                        <a class="btn btn-sm btn-success" href="{{ url('login') }}">Login</a>
                                    </li>

                                 
                                    <li class="nav-item">
                                        <a class="btn btn-sm btn-primary ml-2" href="{{ url('register') }}">Register</a>
                                    </li>

                                 
                              @endauth
                           
                         @endif




                           </ul>
                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>