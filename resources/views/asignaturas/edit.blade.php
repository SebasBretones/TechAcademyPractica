@extends('plantillas.plantilla1')
@section('titulo')
Asignaturas
@endsection
@section('cabecera')
Gestion de Asignaturas
@endsection
@section('contenido')
<div class="container mt-3">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
<form name="editar" action="{{route('asignaturas.update', $asignatura)}}" method="POST">
    @csrf
    @method('PUT')
        <div class="row">
          <div class="col">
            <input type="text" class="form-control" value="{{$asignatura->nombre}}" name="nombre" required>
          </div>
          <div class="col">
            <input type="number" class="form-control" value="{{$asignatura->horas}}"  name="horas" required>
          </div>

        </div>
                  <div class="row mt-3">
                        <div class="col">
                            <input type="submit" class="btn btn-info normal" value="Editar">
                            <input type="reset" class="btn btn-danger normal">
                        <a href="{{route('asignaturas.index')}}" class="btn btn-success">Volver</a>
                        </div>

                      </div>
      </form>
@endsection
