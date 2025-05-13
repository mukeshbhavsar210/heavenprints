<ul class="navbar-nav mb-auto w-100">
    <li class="menu-label pt-0 mt-0">
        <span>Main Menu</span>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin.dashboard') }}" >
            <i class="iconoir-home-simple menu-icon"></i>
            <span>Dashboards</span>
        </a>   
    </li>
    <li class="nav-item">
        <a href="{{ route('categories.index') }}" class="nav-link">
            <i class="iconoir-view-grid menu-icon"></i>
            <span>Category</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('sub-categories.index') }}" class="nav-link">
            <i class="iconoir-table-rows menu-icon"></i>
            <span>Sub Category</span>
        </a>
    </li>
    
    <li class="nav-item">
        <a href="{{ route('products.index') }}" class="nav-link">
            <i class="iconoir-compact-disc menu-icon"></i>
            <span>Products</span>
        </a>
    </li> 
    <li class="nav-item">
        <a href="{{ route('customize.index') }}" class="nav-link">
            <i class="iconoir-peace-hand menu-icon"></i>
            <span>Customize</span>
        </a>
    </li> 
    <li class="nav-item">
        <a href="{{ route('orders.index') }}" class="nav-link">
            <i class="iconoir-trophy menu-icon"></i>
            <span>Orders</span>
        </a>
    </li>
    {{-- <li class="nav-item">
        <a class="nav-link" href="#sidebarApplications" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApplications">
            <i class="iconoir-compact-disc menu-icon"></i>
            <span>Products</span>
        </a>
        <div class="collapse " id="sidebarApplications">
            <ul class="nav flex-column">
                                              
            </ul>
        </div>
    </li> --}}

    <li class="menu-label mt-2">
        <small class="label-border">
            <div class="border_left hidden-xs"></div>
            <div class="border_right"></div>
        </small>
        <span>Components</span>
    </li>
    
    <li class="nav-item">
        <a class="nav-link" href="#extra" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApplications">
            <i class="iconoir-compact-disc menu-icon"></i>
            <span>Extras</span>
        </a>
        <div class="collapse " id="extra">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="{{ route('brands.index') }}" class="nav-link">
                        <span>Brands</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('shipping.create') }}" class="nav-link">
                        <span>Shipping</span>
                    </a>
                </li>                
                <li class="nav-item">
                    <a href="{{ route('coupons.index') }}" class="nav-link">
                        <span>Discount</span>
                    </a>
                </li> 
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link">
                        
                        <span>Users</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pages.index') }}" class="nav-link">
                        <span>Pages</span>
                    </a>
                </li>                               
            </ul>
        </div>
    </li>
    

    
</ul>
