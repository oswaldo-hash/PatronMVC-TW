<?php
// arreglo 100 nombres y apellidos
$nombres = [
    'Oswaldo', 'Kalin', 'Carmen', 'Darío', 'Elisa', 'Fabián', 'Gloria', 'Hugo', 'Inés', 'Julio',
    'Karla', 'Lucas', 'Marta', 'Nicolás', 'Olga', 'Pablo', 'Quetzal', 'Raúl', 'Silvia', 'Tomás',
    'Úrsula', 'Víctor', 'Wendy', 'Ximena', 'Yael', 'Zoe', 'Aldo', 'Bárbara', 'Camilo', 'Dora'
];

$apellidos = [
    'Alonso', 'Blanco', 'Carmona', 'Domínguez', 'Esteban', 'Fernández', 'Gil', 'Hernández', 'Iglesias', 'Jiménez',
    'Lozano', 'Molina', 'Núñez', 'Ortega', 'Pastor', 'Quintana', 'Ramos', 'Serrano', 'Torres', 'Vargas',
    'Méndez', 'Cruz', 'Ortiz', 'Gómez', 'Silva', 'Reyes', 'Aguilar', 'Mendoza', 'Salinas', 'Paz'
];

$uri = $_SERVER['REQUEST_URI'];

// condicion para generar los nombres
if (strpos($uri, '/generar') !== false) {
    
    $resultados = [];
    $limiteMaximo = 1000;

    while (count($resultados) < $limiteMaximo) {
        $n1 = $nombres[array_rand($nombres)];
        $n2 = $nombres[array_rand($nombres)];
        $a1 = $apellidos[array_rand($apellidos)];
        $a2 = $apellidos[array_rand($apellidos)];

        $persona = "$n1 $n2 $a1 $a2";

// Se usa string como llave para evitar que se repitan al final
        $resultados[$persona] = $persona;
    }

    header('Content-Type: application/json');
    echo json_encode(array_values($resultados), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit;
    
} else {
    echo "<h1>Sistema activo</h1>";
    echo "<p>Agrega <b>/generar</b> a la URL para visualizar los datos.</p>";
}
