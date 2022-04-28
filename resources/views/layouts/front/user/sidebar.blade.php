<div class="list-group rounded-0" id="list-tab" role="tablist">
	<a class="list-group-item list-group-item-action {{(Route::current()->getName() == 'user.profile')? 'active':''}}" id="list-tab1-list" href="{{route('user.profile')}}" role="tab" aria-controls="tab1">Profile</a>
	<a class="list-group-item list-group-item-action {{(Route::current()->getName() == 'user.order')? 'active':''}}" id="list-tab2-list"  href="{{route('user.order')}}">My Orders</a>
	<a class="list-group-item list-group-item-action {{(Route::current()->getName() == 'user.subscription')? 'active':''}}" id="list-tab3-list"  href="{{route('user.subscription')}}">Subscription</a>
	<a class="list-group-item list-group-item-action {{(Route::current()->getName() == 'user.address')? 'active':''}}" id="list-tab4-list"  href="{{route('user.address')}}">Manage Address</a>
	<a class="list-group-item list-group-item-action {{(Route::current()->getName() == 'user.prescription')? 'active':''}}" id="list-tab5-list"  href="{{route('user.prescription')}}">Prescriptions</a>
	<a class="list-group-item list-group-item-action {{(Route::current()->getName() == 'user.wallet')? 'active':''}}" id="list-tab6-list"  href="{{route('user.wallet')}}">Wallet</a>
	
	<a class="list-group-item list-group-item-action {{(Route::current()->getName() == 'user.help')? 'active':''}}" id="list-tab8-list"  href="{{route('user.help')}}">Help</a>
	<a class="list-group-item list-group-item-action {{(Route::current()->getName() == 'user.legal')? 'active':''}}" id="list-tab9-list"  href="{{route('user.legal')}}">Legal</a>
	<a class="list-group-item list-group-item-action" id="list-tab10-list" href="{{ route('logout') }}"
	onclick="event.preventDefault();
	document.getElementById('logout-form').submit();" role="tab" aria-controls="tab10">Logout</a>
	<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
	@csrf
</form>
</div>