@extends('layout')
@section('title','Productos')
@section('encabezado','Lista Productos')
@section('content')
<a href="{{ route('productform') }}"class="btn btn-primary">Nuevo Producto</a>
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message')}}
    </div>
@endif
<table class="table">
    <thead>
        <tr>
            <th>name</th>
            <th>cost</th>
            <th>price</th>
            <th>quantity</th>
            <th>brand</th>
            <th>category</th>
            <th>Opciones</th>
        </tr>
</thead>
<tbody>
@foreach($productsList as $product)
        <tr>
            <td>{{ $product->name}}</td>
            <td>{{ $product->cost}}</td>
            <td>{{ $product->price}}</td>
            <td>{{ $product->quantity}}</td>
            <td>{{ $product->brand->name}}</td>
            <td>{{ $product->category->name}}</td>
           
            <td>
                <a href="{{ route('productform',['id'=>$product->id]) }}" class="btn btn-warning">Editar</a>
                <a href="/product/delete/{{$product->id}}" class="btn btn-danger">Eliminar</a>                
            </td>
        </tr>
@endforeach
</tbody>
</table>
@endsection