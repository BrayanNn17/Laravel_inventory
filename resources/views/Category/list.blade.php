@extends('layout')
@section('title','Categorias')
@section('encabezado','Lista Categorias')
@section('content')
<a href="{{ route('categoryform') }}"class="btn btn-primary">Nueva Categoria</a>
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message')}}
    </div>
@endif
<table class="table">
    <thead>
        <tr>
            <th>name</th>
            <th>description</th>
            <th></th>
        </tr>
</thead>
<tbody>
@foreach($categoriesList as $category)
        <tr>
            <td>{{ $category->name}}</td>
            <td>{{ $category->description}}</td>
            <td>
                <a href="{{ route('categoryform',['id'=>$category->id]) }}" class="btn btn-warning">Editar</a>
                <a href="{{ route('categoryDelete',['id'=>$category->id]) }}" class="btn btn-danger">Eliminar</a>                
            </td>
        </tr>
@endforeach
</tbody>
</table>
@endsection