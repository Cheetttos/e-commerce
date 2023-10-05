@extends('layout.e-commerce')

@section('title', 'Orders')

@section('content')
    <h1>ORDERS</h1>
    <table id="tablaOrders" border="2px">
        <thead>
            <tr>
                <th>Order no</th>
                <th>Product name</th>
                <th>Created at</th>
                <th>Price</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->order_no }}</td>
                    <td>{{ $order->product_name }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ $order->price }}</td>
                    <td>{{ $order->status }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>

        </tfoot>
    </table>
@endsection
