<?php
// Load the XML file
$xml = simplexml_load_file('data/menu.xml'); // Corrected file path

// Check if the XML file was loaded successfully
if ($xml === false) {
    die('Error loading XML file');
}

// Start the HTML output
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
        <?php 
        $categorias = [];
        foreach ($xml->plato as $plato) {
            $categorias[(string)$plato['tipo']][] = $plato;
        }
        ?>

        <?php foreach ($categorias as $tipo => $platos): ?>
            <h2 class="categoria-titulo"><?php echo ucfirst($tipo); ?></h2>
            <?php foreach ($platos as $plato): ?>
                <div class="plato">
                    <h2 class="nombre"><?php echo $plato->nombre; ?></h2>
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