<?php
// submit_testimonial.php

$host = 'localhost';
$db   = 'ma_base';
$user = 'mon_user';
$pass = 'mon_mdp';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['status'=>'error', 'message'=>'Erreur de connexion DB']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = strip_tags(trim($_POST['name'] ?? ''));
    $message = strip_tags(trim($_POST['message'] ?? ''));

    if ($name && $message) {
        $stmt = $pdo->prepare("INSERT INTO testimonials (name, message) VALUES (?, ?)");
        if ($stmt->execute([$name, $message])) {
            header('Content-Type: application/json');
            echo json_encode(['status' => 'success', 'name' => htmlspecialchars($name), 'message' => htmlspecialchars($message)]);
            exit;
        } else {
            header('Content-Type: application/json');
            echo json_encode(['status' => 'error', 'message' => 'Erreur lors de l\'enregistrement']);
            exit;
        }
    } else {
        header('Content-Type: application/json');
        echo json_encode(['status' => 'error', 'message' => 'Veuillez remplir tous les champs.']);
        exit;
    }
}
?>
