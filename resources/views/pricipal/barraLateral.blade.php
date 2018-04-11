

<ul id="slide-out" class="sidenav sidenav-fixed center">
		
	<li><div class="user-view">
				<div class="background">
				  <img src="/images/office.jpg">
				</div>
				<a href="#name"><span class="white-text name">{{$codigo}}</span></a>
				<a href="#name"><span class="white-text name">{{$nombre}}</span></a>
				<a href="#email"><span class="white-text email">{{$email}}</span></a>
			  </div>
		</li>
	
	
	<li><a href="{{ route('transferencia') }}">Tranferencia</a></li>
	<li><a href="{{ route('credito') }}">Credito</a></li>
	<li><a href="{{ route('debito') }}">Debito</a></li>
	<li><form  method="POST" action="{{ route('logout') }}">
			{{ csrf_field() }}
			<button class="btn btn-danger  ">Cerrar Sesion</button>
		</form>
	</li>	
</ul>
			