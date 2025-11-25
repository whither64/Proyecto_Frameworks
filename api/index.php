<?php
header('Access-Control-Allow-Origin: https://dantvader.github.io');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

// Simulamos la base de datos con array, no hay pex luego se conecta a la db real
$usuarios_validos = [
    'administrador' => [
        ['id' => 'admin1', 'contrasena' => '12345', 'nombre' => 'Admin Demo']
    ],
    'estudiantes' => [
        ['id' => 'est123', 'contrasena' => '12345', 'nombre' => 'Estudiante Demo']
    ]
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    
    $tipo = $input['usuario'] ?? '';
    $id = $input['idusuario'] ?? '';
    $pass = $input['password'] ?? '';
    
    // Validación
    if (empty($tipo) || empty($id) || empty($pass)) {
        echo json_encode(['success' => false, 'error' => 'Faltan datos']);
        exit;
    }
    
    // Buscar usuario
    $usuario_encontrado = null;
    if (isset($usuarios_validos[$tipo])) {
        foreach ($usuarios_validos[$tipo] as $usuario) {
            if ($usuario['id'] === $id && $usuario['contrasena'] === $pass) {
                $usuario_encontrado = $usuario;
                break;
            }
        }
    }
    
    if ($usuario_encontrado) {
        echo json_encode([
            'success' => true,
            'redirect' => $tipo === 'administrador' ? 'menuAdmin.html' : 
                         ($tipo === 'administrador_sub' ? 'menuAdminSup.html' : 'menuUser.html'),
            'usuario' => $usuario_encontrado
        ]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Credenciales incorrectas']);
    }
}
?>