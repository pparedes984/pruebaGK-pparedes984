@extends('welcome')

@section('content')
    <div class="form-div"> 

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Agregar nueva entrada</h2>
                </div>
            </div>
        </div>

        <form method="POST" action="{{ route('entradas.store') }}"  role="form" enctype="multipart/form-data">
        @csrf <!-- {{ csrf_field() }} -->
    <div class="form-group">
        <label for="titulo">Título</label>
        <input type="text" class="form-control input-sm" id="titulo" name="titulo" placeholder="Ingrese título de entrada">
    </div>
    <div class="form-group">
        <label for="descripcion">Descripción</label>
        <textarea class="form-control" id="descripcion" name="descripcion" rows="6"></textarea>
    </div>
    <div class="form-group">
        <label for="imagen">Imagen</label>
        <input id="imagen" name="imagen" type="file" accept="image/*"/>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
    
    </form>
</div>
    
@endsection