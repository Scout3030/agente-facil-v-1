<li class="align-items-center h-auto ml-sm-3">
	<a class="btn btn-outline-primary shadow-none d-none d-sm-block" href="{{ route('logout') }}"
	   onclick="event.preventDefault();
	   document.getElementById('logout-form').submit();"
	>
	    {{ __("Cerrar sesión") }}
	</a>

	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	    @csrf
	</form>
</li>

