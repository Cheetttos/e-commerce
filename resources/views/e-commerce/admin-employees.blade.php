@extends('layout.e-commerce')

@section('title', 'Employees')

@section('content')
    <table id="tablaEmployees" border="2px">
        <thead>
            <tr>

                <th>Emp. No</th>
                <th>Full name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Salary</th>
                <th>Department</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $e)
                <tr>
                    <td>{{ $e->emp_no }}</td>
                    <td>{{ $e->first_name }} {{ $e->last_name }}</td>
                    <td>{{ $e->email }}</td>
                    <td>{{ $e->gender }}</td>
                    <td>
                        @isset($e->salary)
                            {{ $e->salary }}</td> {{-- SI TIENE EL CAMPO ALGUN VALOR --}}
                        @endisset
                    <td>{{ $e->department ?? 'NO TIENE' }}</td> {{-- VALOR POR DEFECTO --}}
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
