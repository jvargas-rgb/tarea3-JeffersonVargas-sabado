<?php include "includes/menu.php"; ?>

<div class="contenedor">
    <div class="formulario">
        <h2>Productos</h2>

        <input type="hidden" id="id_producto">

        <label>Código:</label>
        <input type="text" id="codigo">

        <label>Nombre:</label>
        <input type="text" id="nombre">

        <label>Descripción:</label>
        <textarea id="descripcion"></textarea>

        <label>Precio Compra:</label>
        <input type="number" id="precio_compra" step="0.01">

        <label>Precio Venta:</label>
        <input type="number" id="precio_venta" step="0.01">

        <label>Stock:</label>
        <input type="number" id="stock">

        <button id="btnGuardar">Guardar</button>
        <button id="btnActualizar">Actualizar</button>
    </div>

    <div class="tabla">
        <h2>Lista de Productos</h2>
        <table id="tablaProductos">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>P. Compra</th>
                    <th>P. Venta</th>
                    <th>Stock</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

<script src="javascript/productos.js"></script>
