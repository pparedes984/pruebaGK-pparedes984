@extends('welcome')

@section('content')


<div class="principal">
  <aside class="col-12 col-md-3 p-0">
        <nav class="navbar navbar-expand flex-md-column flex-row align-items-start">
            <h2>Entradas</h2>
            <div class="collapse navbar-collapse">
                <ul class="flex-md-column flex-row navbar-nav w-100 justify-content-between">
                @foreach($entradas as $entrada)
                    <li class="nav-item">
                        <a class="nav-link pl-0" href="#{{ $entrada->titulo }}">{{$entrada->titulo }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </nav>
    </aside>
  <section>
  @foreach($entradas as $entrada)
  <div class="card">
    <div class="card-header" id="{{ $entrada->titulo }}">
      {{ $entrada->titulo }}
    </div>
    <div class="card-body">
    @if(isset( $entrada->imagen ))
        <p> <img src="{{ asset('img/'.$entrada->imagen) }}" alt="" class="img-responsive img-cont"/></p>
    
    @else
        <p> </p>
    @endif
      <p class="card-text"><small>Ultima actualización: {{ $entrada->updated_at }}</small></p>
      <p class="card-text">{{ $entrada->descripcion }} </p>
    </div>
  </div>
  <hr>
  @endforeach
  </section>
</div>
@endsection