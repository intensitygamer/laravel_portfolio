<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
	<ul>
		<li class="{{ isset($dashboardActive) ? 'active' : '' }}" ><a href="/"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
		<li class="{{ isset($usersActive) ? 'active' : '' }}"> <a href="/users"><i class="icon icon-user"></i> <span>Users</span></a> </li>
		<li class="{{ isset($rolesActive) ? 'active' : '' }}"> <a href="/roles"><i class="icon icon-sitemap"></i> <span>Roles</span></a> </li>
		@if ( isset( $admin ) && $admin == 1 )
		<li class="submenu {{ isset($designsActive) ? 'active open' : '' }}" > <a href="#"><i class="icon icon-inbox"></i> <span>Designs</span></a>
			<ul>
				<li><a href="/menus">Menus</a></li>
			</ul>
		</li>
		<li class="{{ isset($merchantsActive) ? 'active' : '' }}" ><a href="/merchants"><i class="icon icon-briefcase"></i> <span>Merchant</span></a> </li>
		@endif
		<li class="submenu {{ isset($productsManagementActive) ? 'active open' : '' }}" > <a href="#"><i class="icon icon-inbox"></i> <span>Products Management</span></a>
			<ul>
				<li><a href="/products">Products</a></li>
				@if ( isset( $admin ) && $admin == 1 )
					<li><a href="/categories">Categories</a></li>
					<li><a href="/collections">Collections</a></li>
					<li><a href="/brands">Brand</a></li>
					<li><a href="/designers">Designer</a></li>
				@endif
			</ul>
		</li>
		<li class="{{ isset($vouchersActive) ? 'active' : '' }}" ><a href="/vouchers"><i class="icon icon-file"></i> <span>Voucher</span></a> </li>
		@if ( isset( $admin ) && $admin == 1 )
		<li class="{{ isset($communityActive) ? 'active' : '' }}" ><a href="/community"><i class="icon icon-group"></i> <span>Community</span></a> </li>
		<li class="{{ isset($couriersActive) ? 'active' : '' }}" ><a href="/couriers"><i class="icon icon-truck"></i> <span>Courier</span></a> </li>
		@endif
		<li class="{{ isset($ordersActive) ? 'active open' : '' }}"> <a href="/orders"><i class="icon icon-edit"></i> <span>Orders</span></a> </li>
		<li class="{{ isset($paymentActive) ? 'active' : '' }}" ><a href="/payments"><i class="icon icon-money"></i> <span>Payment</span></a> </li>
		<li class="{{ isset($returnActive) ? 'active' : '' }}" ><a href="/return-approvals"><i class="icon icon-list"></i> <span>Return Approval</span></a> </li>
		@if ( isset( $admin ) && $admin == 1 )
		<li class="submenu {{ isset($discountsActive) ? 'active open' : '' }}"> <a href="#"><i class="icon icon-gift"></i> <span>Promotions</span></a>
			<ul>
				<li><a href="/product-discounts">Product promotions</a></li>
				<li><a href="/user-discounts">User promotions</a></li>
				<li><a href="/category-discounts">Catergory promotions</a></li>
				<li><a href="/checkout-discounts">Checkout formula promotions</a></li>
			</ul>
		</li>
		<li class="{{ isset($videosActive) ? 'active' : '' }}" ><a href="/videos"><i class="icon icon-film"></i> <span>Videos</span></a> </li>
		<li class="submenu {{ isset($notificationsActive) ? 'active open' : '' }}"> <a href="#"><i class="icon icon-bell"></i> <span>Notifications</span></a>
			<ul>
				<li><a href="/notifications">General notifications</a></li>
				<li><a href="/merchant-alerts">Merchant Alert</a></li>
			</ul>
		</li>
		<li class="{{ isset($faqActive) ? 'active' : '' }}" ><a href="/faqs"><i class="icon icon-th"></i> <span>FAQ Manager</span></a> </li>
		<li class="{{ isset($sessionManagementActive) ? 'active open' : '' }}"> <a href="/session-management"><i class="icon icon-pushpin"></i> <span>Session Management</span></a> </li>
		@endif
	</ul>
</div>
<!--sidebar-menu-->
