<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <ul>
                    <div class="logo"><a href="{{route('home')}}">
                            <!-- <img src="assets/images/logo.png" alt="" /> --><span>Focus</span></a></div>
                    <li class="label">Main</li>
                    <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li> 
                    <li><a class="sidebar-sub-toggle"><i class="ti-bar-chart-alt"></i> Employee <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="{{route('add.employee')}}">Add Employee</a></li>
                            <li><a href="#">View Employee</a></li>
                            
                        </ul>
                    </li>
                    
                    <li><a><i class="ti-close"></i> Logout</a></li>
                </ul>
            </div>
        </div>
</div>