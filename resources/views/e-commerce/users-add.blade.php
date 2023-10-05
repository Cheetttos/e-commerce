@extends('layout.e-commerce')

@section('title', 'Employees')

<style>
    /* Estilos CSS para el formulario */
    body {
        font-family: Arial, sans-serif;
    }

    .container {
        max-width: 400px;
        margin: 0 auto;
    }

    h2 {
        text-align: center;
    }

    form {
        border: 1px solid #ccc;
        padding: 20px;
        border-radius: 5px;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="email"],
    input[type="tel"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    button {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }
</style>

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h2>Formulario de Registro de Usuario</h2>
        <form id="user-form" action="/users-add">
            @csrf
            <label for="first_name">First name:</label>
            <input type="text" id="first_name" name="first_name" required>

            <label for="last_name">Last name:</label>
            <input type="text" id="last_name" name="last_name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Save</button>
        </form>
    </div>
@endsection
