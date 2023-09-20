$(document).ready(()=>{
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
        $.getJSON("/api/products/"+(selected.length?selected[0].id:""), function (result) {
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
})