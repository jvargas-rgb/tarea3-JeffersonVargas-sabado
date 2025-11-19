<?php
require_once "../includes/conexion.php";

header("Content-Type: application/json");

$action = isset($_POST["action"]) ? $_POST["action"] : "";

if ($action == "create") {
    $codigo = $_POST["codigo"];
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $precio_compra = $_POST["precio_compra"];
    $precio_venta = $_POST["precio_venta"];
    $stock = $_POST["stock"];

    $sql = "INSERT INTO productos (codigo, nombre, descripcion, precio_compra, precio_venta, stock)
            VALUES ('$codigo', '$nombre', '$descripcion', '$precio_compra', '$precio_venta', '$stock')";

    if ($conn->query($sql)) {
        echo json_encode(["status" => "success", "message" => "Producto creado"]);
    } else {
        echo json_encode(["status" => "error", "message" => $conn->error]);
    }
    exit;
}

if ($action == "update") {
    $id = $_POST["id_producto"];
    $codigo = $_POST["codigo"];
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $precio_compra = $_POST["precio_compra"];
    $precio_venta = $_POST["precio_venta"];
    $stock = $_POST["stock"];

    $sql = "UPDATE productos SET 
                codigo='$codigo',
                nombre='$nombre',
                descripcion='$descripcion',
                precio_compra='$precio_compra',
                precio_venta='$precio_venta',
                stock='$stock'
            WHERE id_producto=$id";

    if ($conn->query($sql)) {
        echo json_encode(["status" => "success", "message" => "Producto actualizado"]);
    } else {
        echo json_encode(["status" => "error", "message" => $conn->error]);
    }

    exit;
}

if ($action == "delete") {
    $id = $_POST["id_producto"];

    $sql = "DELETE FROM productos WHERE id_producto=$id";

    if ($conn->query($sql)) {
        echo json_encode(["status" => "success", "message" => "Producto eliminado"]);
    } else {
        echo json_encode(["status" => "error", "message" => $conn->error]);
    }
    exit;
}

if ($action == "read") {
    $sql = "SELECT * FROM productos ORDER BY id_producto DESC";
    $result = $conn->query($sql);

    $productos = [];
    while ($row = $result->fetch_assoc()) {
        $productos[] = $row;
    }

    echo json_encode($productos);
    exit;
}

echo json_encode(["status" => "error", "message" => "Acción no válida"]);
?>