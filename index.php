<?php
// Load the XML file
$xml = simplexml_load_file('data/menu.xml'); // Corrected file path

// Check if the XML file was loaded successfully
if ($xml === false) {
    die('Error loading XML file');
}

// Organize dishes by type
$categorias = [];
foreach ($xml->plato as $plato) {
    $categorias[(string)$plato['tipo']][] = $plato;
}

// Select dishes for "Menú del Día"
$menu_del_dia = [
    'primer plato' => [$xml->plato[0]], // First "primer plato"
    'segundo plato' => [$xml->plato[3]], // First "segundo plato"
    'postre' => [$xml->plato[6]], // First "postre"
    'bebida' => [$xml->plato[9]] // First "bebida"
];

// Set the total price for "Menú del Día"
$total_precio_menu_dia = 21.00;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carta del Restaurante</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <h1>Carta del Restaurante</h1>
    <div class="menu">
        <h2 class="categoria-titulo">Menú del Día</h2>
        <?php foreach ($menu_del_dia as $tipo => $platos): ?>
            <h3><?php echo ucfirst($tipo); ?></h3>
            <?php foreach ($platos as $plato): ?>
                <div class="plato">
                    <h4 class="nombre"><?php echo $plato->nombre; ?></h4>
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
            <h3>Total del Menú del Día: <?php echo number_format($total_precio_menu_dia, 2); ?> €</h3>
        </div>

        <h2 class="categoria-titulo">Carta Completa</h2>
        <?php foreach ($categorias as $tipo => $platos): ?>
            <h3><?php echo ucfirst($tipo); ?></h3>
            <?php foreach ($platos as $plato): ?>
                <div class="plato">
                    <h4 class="nombre"><?php echo $plato->nombre; ?></h4>
                    <p class="precio"><?php echo $plato->precio; ?> €</p>
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
    </div>
    <script src="scripts/script.js"></script>
</body>
</html>