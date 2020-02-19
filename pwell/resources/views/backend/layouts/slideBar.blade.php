<div class="sidebar" data-color="purple" data-background-color="black"
     data-image="{{asset('assets/img/sidebar-2.jpg')}}">

    <div class="logo">
        <a href="{{route('home')}}" class="simple-text logo-normal">
            Pwell
        </a>
    </div>
    <div class="sidebar-wrapper ps-container ps-theme-default" data-ps-id="24274ac7-bb71-cb08-c704-2cbd9fca4029">
        <ul class="nav">
            <li class="nav-item {{is_active('admin')}}  ">
                <a class="nav-link" href="{{route('admin.home')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item {{is_active('users')}}  ">
                <a class="nav-link" href="{{route('users.index')}}">
                    <i class="material-icons">person</i>
                    <p>Users</p>
                </a>
            </li>
            <li class="nav-item {{is_active('categories')}}  ">
                <a class="nav-link" href="{{route('categories.index')}}">
                    <i class="material-icons">category</i>
                    <p>Categories</p>
                </a>
            </li>
            <li class="nav-item {{is_active('sliders')}}  ">
                <a class="nav-link" href="{{route('sliders.index')}}">
                    <i class="material-icons">content_paste</i>
                    <p>Sliders</p>
                </a>
            </li>
            <li class="nav-item {{is_active('places')}} ">
                <a class="nav-link" href="{{route('places.index')}}">
                    <i class="material-icons">local_grocery_store</i>
                    <p>Places</p>
                </a>
            </li>
            <li class="nav-item {{is_active('messages')}} ">
                <a class="nav-link" href="{{route('messages.index')}}">
                    <i class="material-icons">message</i>
                    <p>Messages</p>
                </a>
            </li>
        </ul>
        <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
            <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps-scrollbar-y-rail" style="top: 0px; right: 0px;">
            <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div>
        </div>
    </div>
    <div class="sidebar-background" style="background-image: url(../../../../public/assets/img/sidebar-2.jpg) "></div>
</div>
