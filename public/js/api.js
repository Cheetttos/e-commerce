$(document).ready(() => {
    $('#selectCategories').select2({
        ajax: {
            url: '/api/categories',
            dataType: 'json'
        }
    });

    $('#btnCategories').click(() => {
        let selected = $('#selectCategories').select2('data')
        $('#tablaProductos tbody').empty();
        $('tablaProductos').DataTable().clear().destroy();
        $.getJSON("/api/products/" + (selected.length ? selected[0].id : ""), function (result) {
            $.each(result, function (i, obj) {
                $('#tablaProductos > tbody:last-child').append(
                    '<tr>' +
                    '<td>' + obj.id + '</td>' +
                    '<td>' + obj.name + '</td>' +
                    '<td>' + obj.description + '</td>' +
                    '<td>' + obj.ratting + '</td>' +
                    '<td>' + obj.original_price + '</td>' +
                    '<td>' + obj.sale_price + '</td>' +
                    '<td>' + obj.quantity + '</td>' +
                    '<td>' + obj.category.name + '</td>' +
                    '<td>' + obj.color + '</td>' +
                    '<td>' + obj.size + '</td>' +
                    '</tr>'
                );

            });
            let table = new DataTable('#tablaProductos');
        });
    });

    $('#btnMostrar').click(() => {
        $('#tablaProductos tbody').empty();
        $('tablaProductos').DataTable().clear().destroy();
        $.getJSON("/api/products/", function (result) {
            $.each(result, function (i, obj) {
                $('#tablaProductos > tbody:last-child').append(
                    '<tr>' +
                    '<td>' + obj.id + '</td>' +
                    '<td>' + obj.name + '</td>' +
                    '<td>' + obj.description + '</td>' +
                    '<td>' + obj.ratting + '</td>' +
                    '<td>' + obj.original_price + '</td>' +
                    '<td>' + obj.sale_price + '</td>' +
                    '<td>' + obj.quantity + '</td>' +
                    '<td>' + obj.category.name + '</td>' +
                    '<td>' + obj.color + '</td>' +
                    '<td>' + obj.size + '</td>' +
                    '</tr>'
                );

            });
            let table = new DataTable('#tablaProductos');
        });
    });


    let table = $('#tablaOrders').DataTable({
        "footerCallback": function (row, data, start, end, display) {
            let api = this.api();

            // Función para verificar si un estado es "approved"
            let esAprobado = function (estatus) {
                return estatus === 'approved';
            };

            // Filtrar los elementos aprobados visibles en la pantalla
            let elementosVisiblesAprobados = api.rows({ page: 'current', search: 'applied' }).data().filter(function (row) {
                return esAprobado(row[4]);
            });

            let sumaAprobadosVisibles = elementosVisiblesAprobados.reduce(function (total, row) {
                let precio = parseFloat(row[3].replace('$', '').replace(',', ''));
                return total + precio;
            }, 0);


            let todosLosAprobados = api.data().filter(function (row) {
                return esAprobado(row[4]);
            });


            let sumaTodosLosAprobados = todosLosAprobados.reduce(function (total, row) {

                let precio = parseFloat(row[3].replace('$', '').replace(',', ''));
                return total + precio;
            }, 0);

            let sumaAprobadosVisiblesFormateada = '$' + sumaAprobadosVisibles.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
            let sumaTodosLosAprobadosFormateada = '$' + sumaTodosLosAprobados.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');

            // Actualizar el footer
            let $tfoot = $('tfoot', api.table().footer());
            $tfoot.empty();
            $tfoot.append('<tr><td></td><td></td><td></td><td><b> Total visibles</td><td> <b>' + sumaAprobadosVisiblesFormateada + '</b></td></tr>');
            $tfoot.append('<tr><td></td><td></td><td></td><td><b>Total de todos aprobados</td><td><b>' + sumaTodosLosAprobadosFormateada + '</b> </td></tr>');
        }
    });

    const formulario = document.getElementById('user-form');
    formulario.addEventListener('submit', function (event) {
        event.preventDefault();

        var validationUrl = '/users-add';
        var data = {
            first_name: document.getElementById('first_name').value,
            last_name: document.getElementById('last_name').value,
            email: document.getElementById('email').value,
            phone: document.getElementById('phone').value,
            address: document.getElementById('address').value,
            password: document.getElementById('password').value,
        };
        
        $.ajax({
            url: validationUrl,
            type: "POST",
            dataType: "JSON",
            contentType: "application/json; charset=utf-8",
            data: JSON.stringify(data),
            async: true,
            success: function (response) {
                // Validación exitosa, ahora realiza la inserción
                var insertUrl = 'http://localhost:3000/api/v1/users';
                $.ajax({
                    url: insertUrl,
                    type: "POST",
                    dataType: "JSON",
                    contentType: "application/json; charset=utf-8",
                    data: JSON.stringify(data),
                    async: true,
                    success: function (response) {
                        console.log("Datos enviados");
                        alert("Se guardo el usuario con éxito :)");
                    },
                    error: function (error) {
                        console.log("Error al insertar datos");
                        alert('Error al insertar datos: ' + error.responseJSON.message); // Muestra un mensaje de error del servidor
                    },
                });
            },
            error: function (error) {
                console.log("Error en la validación");
                alert('Error en la validación: ' + error.responseJSON.message); // Muestra un mensaje de error de validación
            },
        });
    });



})