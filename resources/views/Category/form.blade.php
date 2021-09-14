@extends('layout')
@section('encabezado',$category->id ? 'Actualizar Categoria' : 'Nueva Categoria')
@section('title',$category->id ? 'Actualizar Marca' : 'Nueva Categoria')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('categorySave') }}" method="POST">
            @csrf
            <input type="hidden" class="form-control" name="id"value="{{ old('id') ? old('id'): $category->id }}">
            <table class="table table-striped">
                    <tr>
                        <th>Name</th>
                        <td><input type="text" class="form-control" name="name"value="{{ old('name') ? old('name'): $category->name }}"></td>
                    </tr>
                    @error('name')
                    <tr>
                        <td colspan="2">
                    <div class="alert alert-danger">
                    {{$message}} 
                    </div>
                    </td>
                    </tr>
                    @enderror
                    <tr>
                        <th>Description</th>
                        <td><input type="text" class="form-control" name="description"value="{{ old('description') ? old('description'): $category->description }}"></td>
                    </tr>
                    @error('description')
                    <tr>
                        <td colspan="2">
                    <div class="alert alert-danger">
                    {{$message}} 
                    </div>
                    </td>
                    </tr>
                    @enderror
            </table>
           
            <div class="btn-group " role="group" aria-label="Basic example">
                <button type="submit" class="btn btn-primary">Registrar</button>
                <a href="{{ route('categories') }}" class="btn btn-secondary">Regresar</a>
                
              </div>
        
            </form>  
    </div>
  </div>

@endsection