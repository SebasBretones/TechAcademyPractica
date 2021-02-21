@extends('plantillas.plantilla1')
@section('titulo')
Asignaturas
@endsection
@section('cabecera')
Gestión de Asignaturas
@endsection
@section('contenido')

<a href="{{route('asignaturas.create')}}"
            class="bg-green-600 hover:bg-green-800 rounded text-white font-bold py-2 px-4 shadow">
            <i class="fa fa-plus"></i> Nueva Asignatura</a>

<div class="text-center grid grid-cols-4 py-2 gap-2 mt-10 border-2 border-blue-200 shadow">
    <div class="font-bold text-xl text-gray-700">Detalle</div>
    <div class="font-bold text-xl text-gray-700">Nombre</div>
    <div class="font-bold text-xl text-gray-700">Horas</div>
    <div class="font-bold text-xl text-gray-700">Acciones</div>
</div>
<div class="text-center grid grid-cols-4 py-2 gap-2 mt-10 border-2 border-blue-200 shadow py-5">
    @foreach($asignaturas as $item)
    <div class="mb-5">
        <a href="{{route('asignaturas.show', $item)}}"
        class="bg-purple-400 hover:bg-green-200 rounded text-white font-bold py-2 px-4 shadow">
        <i class="fa fa-info"></i> Detalle</a>
    </div>
    <div>
        {{$item->nombre}}
    </div>
    <div>
        {{$item->horas}}
    </div>

    <div>
        <form class="form-inline" name="del" action="{{route('asignaturas.destroy', $item)}}" method='POST'>
            @method("DELETE")
            @csrf
            <button type="submit" onclick="return confirm('¿Borrar Asignatura?')" class="btn btn-danger fa fa-trash fa-2x"></button>
            <a href="{{route('asignaturas.edit', $item)}}" class="ml-2 fa fa-edit fa-2x btn btn-warning"></a>
          </form>
    </div>

    @endforeach


</div>
<div class="mt-4">
    {{$asignaturas->links()}}
</div>



@endsection
