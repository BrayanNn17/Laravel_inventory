@extends('layout')
@section('encabezado',$product->id ? 'Actualizar Producto' : 'Nuevo Producto')
@section('title',$product->id ? 'Actualizar Producto' : 'Nuevo Producto')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('productSave') }}" method="POST">
            @csrf
            <input type="hidden" class="form-control" name="id" value="{{ old('id') ? old('id'): $product->id }}">
            <table class="table table-striped">
                <tr>
                    <th>Name</th>
                    <td><input type="text" class="form-control" name="name"
                            value="{{ old('name') ? old('name'): $product->name }}"></td>
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
                    <th>Cost</th>
                    <td><input type="number" class="form-control" name="cost"
                            value="{{ old('cost') ? old('cost'): $product->cost }}"></td>
                </tr>
                @error('cost')
                <tr>
                    <td colspan="2">
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    </td>
                </tr>
                @enderror

                <tr>
                    <th>Price</th>
                    <td><input type="number" class="form-control" name="price"
                            value="{{ old('price') ? old('price'): $product->price }}"></td>
                </tr>
                @error('price')
                <tr>
                    <td colspan="2">
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    </td>
                </tr>
                @enderror
                <tr>
                    <th>Quantity</th>
                    <td><input type="number" class="form-control" name="quantity"
                            value="{{ old('quantity') ? old('quantity'): $product->quantity }}"></td>
                </tr>
                @error('price')
                <tr>
                    <td colspan="2">
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    </td>
                </tr>
                @enderror

                <tr>
                    <th>Brand</th>
                    <td>
                        <select name="brand" class="form-select">
                            <option></option>
                            @if ($product->id)
                            @foreach($brands as $brand)
                            <option value="{{$brand->id}}" 
                                {{$product->brand->id== $brand->id ? "selected" : ""}}
                                >
                            {{$brand->name}}
                            </option>
                            @endforeach

                            @else
                            @foreach($brands as $brand)
                                <option value="{{$brand->id}}">
                                {{$brand->name}}
                                </option>
                                @endforeach
                            @endif
                        </select>
                    </td>
                </tr>
                @error('brand')
                <tr>
                    <td colspan="2">
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    </td>
                </tr>
                @enderror

                <tr>
                    <th>Category</th>
                    <td>
                        <select name="category" class="form-select">
                            <option></option>
                            @if ($product->id)
                            @foreach($categories as $category)
                            <option value="{{$category->id}}" 
                                {{$product->category->id== $category->id ? "selected" : ""}}
                                >
                            {{$category->name}}
                            </option>
                            @endforeach

                            @else
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">
                                {{$category->name}}
                                </option>
                                @endforeach
                            @endif
                        </select>
                    </td>
                </tr>
                @error('category')
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
                    <a href="{{ route('products') }}" class="btn btn-secondary">Regresar</a>

                </div>
           
        </form>
    </div>
</div>

@endsection