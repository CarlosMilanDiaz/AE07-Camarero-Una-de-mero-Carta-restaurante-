<?php
// Load the XML file
$xml = simplexml_load_file('data/menu.xml'); // Corrected file path

// Check if the XML file was loaded successfully
if ($xml === false) {
    die('Error loading XML file');
}

// Select dishes for "Menú del Día"
$menu_del_dia = [
    'primer plato' => [$xml->plato[0], $xml->plato[1]], // Two "primer plato"
    'segundo plato' => [$xml->plato[3], $xml->plato[4]], // Two "segundo plato"
    'postre' => [$xml->plato[6], $xml->plato[7]], // Two "postre"
    'bebida' => [$xml->plato[9], $xml->plato[10]] // Two "bebida"
];

// Set the total price to 21€
$total_precio = 21.00;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú del Día</title>
    <link rel="stylesheet" href="src/styles/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <h1>Menú del Día</h1>
    <div class="menu">
        <?php foreach ($menu_del_dia as $tipo => $platos): ?>
            <h2 class="categoria-titulo"><?php echo ucfirst($tipo); ?></h2>
            <?php foreach ($platos as $plato): ?>
                <div class="plato">
                    <h2 class="nombre"><?php echo $plato->nombre; ?></h2>
                    <p class="descripcion"><?php echo $plato->descripcion; ?></p>
                    <p class="calorias"><strong>Calorías:</strong> <?php echo $plato->calorias; ?> kcal</p>
                    <p><strong>Características:</strong></p>
                    <ul class="caracteristicas">
                        <?php foreach ($plato->caracteristicas->categoria as $categoria): ?>
                            <li class="categoria <?php echo strtolower(str_replace(' ', '-', $categoria)); ?>">
                                <?php echo $categoria; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        <?php endforeach; ?>
        <div class="total-precio">
            <h2>Total del Menú del Día: <?php echo number_format($total_precio, 2); ?> €</h2>
        </div>
    </div>
    <script src="scripts/script.js"></script>
</body>
</html>
