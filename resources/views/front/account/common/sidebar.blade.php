<ul id="account-panel" class="nav nav-pills flex-column" >
    <li class="nav-item {{ Route::currentRouteName() == 'account.profile' ? 'active' : '' }}">
        <a href="{{ route('account.profile') }}" class="nav-link" role="tab" aria-controls="tab-login" aria-expanded="false">My Profile</a>
    </li>
    <li class="nav-item {{ Route::currentRouteName() == 'account.orders' ? 'active' : '' }} {{ Route::currentRouteName() == 'account.orderDetail' ? 'active' : '' }}">
        <a href="{{ route('account.orders') }}" class="nav-link" role="tab" aria-controls="tab-register" aria-expanded="false">My Orders</a>
    </li>
    <li class="nav-item {{ Route::currentRouteName() == 'account.wishlist' ? 'active' : '' }}">
        <a href="{{ route('account.wishlist') }}" class="nav-link" role="tab" aria-controls="tab-register" aria-expanded="false">Wishlist</a>
    </li>
    <li class="nav-item {{ Route::currentRouteName() == 'account.changePassword' ? 'active' : '' }}">
        <a href="{{ route('account.changePassword') }}" class="nav-link" role="tab" aria-controls="tab-register" aria-expanded="false">Change Password</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('account.logout' )}}" class="nav-link" role="tab" aria-controls="tab-register" aria-expanded="false">Logout</a>
    </li>
</ul>