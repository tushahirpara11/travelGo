<header class="main-header">        <!-- Logo -->      
    <a href="{{url('admin/home')}}" class="logo">          <!-- mini logo for sidebar mini 50x50 pixels -->       
        <span class="logo-mini"><b>Travel</b>Go</span>          <!-- logo for regular state and mobile devices -->         
        <span class="logo-lg"><b>TravelGo</b></span>       
    </a>        <!-- Header Navbar: style can be found in header.less -->      
    <nav class="navbar navbar-static-top" role="navigation">          <!-- Sidebar toggle button-->     
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">           
            <span class="sr-only">Toggle navigation</span>         
        </a>     
        <div class="navbar-custom-menu">          
            <ul class="nav navbar-nav">                                                                                 
                <li class="dropdown user user-menu">               
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">                
                        <img src="{{displayImage(Auth::user()->image)}}" class="user-image" alt="User Image"/>               
                        <span class="hidden-xs">@if(Auth::check())  {{ Auth::user()->name }} @endif</span>               
                    </a>              
                    <ul class="dropdown-menu">                  <!-- User image -->                  
                        <li class="user-header">                   
                            <img src="{{displayImage(Auth::user()->image)}}" class="img-circle" alt="User Image" />                
                            <p>  @if(Auth::check()) {{ Auth::user()->name }} @endif     </p>               
                        </li>                                    
                        <li class="user-footer">                   
                            <!-- <div class="pull-left">                    
                                <a href="@if(Auth::check()) {{url("user/".Auth::user()->id."/edit")}} @endif" class="btn btn-default btn-flat">Profile</a>                 
                            </div>                    -->
                            <div class="pull-right">					
                                <a class="btn btn-default btn-flat" href="{{ route('logout') }}"    onclick="event.preventDefault();   document.getElementById('logout-form').submit();">    Sign out     </a>                                    
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">                                                                  {{ csrf_field() }}                                       
                                </form>                                       
                            </div>                 
                        </li>              
                    </ul>             
                </li>                      
            </ul>          
        </div>       
    </nav>     
</header>