<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'] ?? 'Sin nombre';
    $direccion = $_POST['direccion'] ?? 'Sin dirección';
    $telefono = $_POST['telefono'] ?? 'Sin teléfono';
    $pago = $_POST['pago'] ?? 'Sin dato';

    $fecha = date("d/m/Y H:i");

    $pedido = "🛒 Pedido recibido el $fecha\n"
            . "👤 Cliente: $nombre\n"
            . "📍 Dirección: $direccion\n"
            . "📞 Teléfono: $telefono\n"
            . "💰 Estado de pago: $pago\n"
            . "-------------------------------\n";

    file_put_contents("pedidos.txt", $pedido, FILE_APPEND | LOCK_EX);

    echo "Pedido guardado correctamente.";
} else {
    echo "No se recibieron datos válidos.";
}
?>
