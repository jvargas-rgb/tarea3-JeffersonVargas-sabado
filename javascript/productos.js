$(document).ready(function () {
    cargarProductos();

    $("#btnGuardar").click(function () {
        let datos = {
            action: "create",
            codigo: $("#codigo").val(),
            nombre: $("#nombre").val(),
            descripcion: $("#descripcion").val(),
            precio_compra: $("#precio_compra").val(),
            precio_venta: $("#precio_venta").val(),
            stock: $("#stock").val()
        };

        $.post("api/productos.php", datos, function (response) {
            alert(response.message);
            cargarProductos();
        }, "json");
    });

    $("#btnActualizar").click(function () {
        let datos = {
            action: "update",
            id_producto: $("#id_producto").val(),
            codigo: $("#codigo").val(),
            nombre: $("#nombre").val(),
            descripcion: $("#descripcion").val(),
            precio_compra: $("#precio_compra").val(),
            precio_venta: $("#precio_venta").val(),
            stock: $("#stock").val()
        };

        $.post("api/productos.php", datos, function (response) {
            alert(response.message);
            cargarProductos();
        }, "json");
    });

    $(document).on("click", ".btnEditar", function () {
        let item = $(this).data("item");

        $("#id_producto").val(item.id_producto);
        $("#codigo").val(item.codigo);
        $("#nombre").val(item.nombre);
        $("#descripcion").val(item.descripcion);
        $("#precio_compra").val(item.precio_compra);
        $("#precio_venta").val(item.precio_venta);
        $("#stock").val(item.stock);
    });

    $(document).on("click", ".btnEliminar", function () {
        if (!confirm("¿Seguro que desea eliminar este producto?")) return;

        let id = $(this).data("id");

        $.post("api/productos.php", { action: "delete", id_producto: id }, function (response) {
            alert(response.message);
            cargarProductos();
        }, "json");
    });
});

function cargarProductos() {
    $.post("api/productos.php", { action: "read" }, function (data) {
        let tabla = "";

        data.forEach(p => {
            let item = JSON.stringify(p);

            tabla += `
                <tr>
                    <td>${p.id_producto}</td>
                    <td>${p.codigo}</td>
                    <td>${p.nombre}</td>
                    <td>${p.descripcion}</td>
                    <td>${p.precio_compra}</td>
                    <td>${p.precio_venta}</td>
                    <td>${p.stock}</td>
                    <td>
                        <button class="btnEditar" data-item='${item}'>Editar</button>
                        <button class="btnEliminar" data-id="${p.id_producto}">Eliminar</button>
                    </td>
                </tr>
            `;
        });

        $("#tablaProductos tbody").html(tabla);
    }, "json");
}