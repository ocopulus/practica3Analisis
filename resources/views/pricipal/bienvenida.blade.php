

<div class="row justify-content-center">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                    
                <h5 class="card-title">Bienvenido {{$nombre}}, Codigo {{ $codigo }}</h5>
            </div>
            <div class="card-footer">
                <form method="POST" action="{{ route('logout') }}">
                    {{ csrf_field() }}
                    <button class="btn btn-danger">Cerrar Sesion</button>
                </form>
            </div>
        </div>
    </div>
</div>