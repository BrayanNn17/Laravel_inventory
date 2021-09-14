@extends('layout')
@section('encabezado',$brand->id ? 'Actualizar Marca' : 'Nueva Marca')
@section('title',$brand->id ? 'Actualizar Marca' : 'Nueva Marca')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('brandSave') }}" method="POST">
            @csrf
            <input type="hidden" class="form-control" name="id"value="{{ old('id') ? old('id'): $brand->id }}">
            <table class="table table-striped">
                    <tr>
                        <th>Name</th>
                        <td><input type="text" class="form-control" name="name"value="{{ old('name') ? old('name'): $brand->name }}"></td>
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
            </table>
            
            <div class="btn-group " role="group" aria-label="Basic example">
                <button type="submit" class="btn btn-primary">Registrar</button>
                <a href="{{ route('brands') }}" class="btn btn-secondary">Regresar</a>
                
              </div>
            
            </form>  
    </div>
  </div>

@endsection