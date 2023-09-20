@extends('layout.e-commerce')

@section('title', 'Product-API')

@section('content')
    <select id='selectCategories' class="js-data-example-ajax" style="width: 50%"></select>
    &nbsp;&nbsp;&nbsp;
    <button id="btnCategories">Select categories</button>
    
    <table id="tablaProductos" border="2px">
        <thead>
            <tr>    
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Rating</th>
                <th>Precio Original</th>
                <th>Precio de Venta</th>
                <th>Cantidad</th>
                <th>Categoria</th>
                <th>Tamaño</th>
                <th>Color</th>
            </tr>
        </thead>
        <tbody>
            <!-- Los datos se mostrarán aquí -->
        </tbody>
    </table>
    <button id="btnMostrar">Mostrar Registro</button>
@endsection
