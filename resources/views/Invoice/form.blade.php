@extends('layout')
@section('title','Nueva Factura')
@section('encabezado','Nueva Factura')

@section('content')

<form action="" method="post" id="form">
    @csrf
    <div class="row">
        <div class="col-sm-3"><b>Producto</b></div>
        <div class="col-sm-2"><b>Cantidad</b></div>
        <div class="col-sm-2"><b>Precio</b></div>
        <div class="col-sm-2"><b>Total Producto</b></div>
</div>
    <div class="row">
        <div class="col-sm-3">
    <select name="product[]" id ="product1" class="form-select product" data-row="1">
        <option value="">Seleccione un producto</option>
        @foreach ($products as $product)
        <option value="{{ $product->id }}">{{ $product->name }}</option>
        @endforeach

    </select>
</div>
<div class="col-sm-2">

    <input type="number" name="quantity[]"   id="quantity1" class="form-control quantity" min=1 value=1>
</div>
<div class="col-sm-2">
    <input type="number" name="price[]" id="price1" class="form-control price">
</div>
<div class="col-sm-2">
    <input type="text" readonly  id="total1" class="form-control-plaintext totalProduct">
</div>
<div class="col-sm-1">
<button type="button" id="quit" class="btn btn-danger">-</button>
</div>

</div>

</form>
<br>

<button type="button" id="add" class="btn btn-primary">+</button>

@endsection
@section('scripts')
<script>
   const products= @json($products);
   const productList = document.querySelector('.product')
   let priceElement = document.querySelector('.price')
   const quantityElement = document.querySelector('.quantity')
   var cont = 1

function init(){
    cont=1
    arrProductList = document.querySelectorAll('.product')

arrProductList.forEach(productList => {
    priceElement=document.querySelector('#price'+cont)
    
    productList.addEventListener('change', (event) => {
        
        productId = event.target.value
        productSelected = products.filter( product => product.id == productId)
        console.log(productSelected[0].price)
        priceElement.value = productSelected[0].price
        //totalProduct()
    })
    cont++
    
});
}
init()
    function totalProduct(){
        
        totalElement = document.querySelector('.totalProduct')
        
        totalElement.value =  priceElement.value * quantityElement.value
    }

    priceElement.addEventListener('input', (event) =>{
        totalProduct()
    })
    quantityElement.addEventListener('input', (event) =>{
        totalProduct()
    })

    const addButton = document.getElementById('add')
    addButton.addEventListener('click', (event) =>{
        fila=document.createElement('div')
        fila.className = 'row'
        fila.innerHTML = ` 
        
        <div class="col-sm-3">
    <select name="product[]" id ="product${cont}" class="form-select product" data-row="1">
        <option value="">Seleccione un producto</option>
        @foreach ($products as $product)
        <option value="{{ $product->id }}">{{ $product->name }}</option>
        @endforeach

    </select>
</div>
<div class="col-sm-2">

    <input type="number" name="quantity[]"   id="quantity${cont}" class="form-control quantity" min=1 max=999 value=1>
</div>
<div class="col-sm-2">
    <input type="number" name="price[]" id="price${cont}" class="form-control price">
</div>
<div class="col-sm-2">
    <input type="text" readonly  id="total${cont}" class="form-control-plaintext totalProduct">
</div>
<div class="col-sm-1">
<button type="button" id="quit" class="btn btn-danger">-</button>
</div>
`

form = document.getElementById('form')

form.appendChild(fila)
init()
    })

 

</script>
@endsection