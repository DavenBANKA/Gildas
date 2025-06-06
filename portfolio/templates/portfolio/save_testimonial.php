<?php
// Connexion à la base de données
$host = 'localhost';
$db   = 'nom_de_ta_base';
$user = 'utilisateur';
$pass = 'motdepasse';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    die('Erreur de connexion : ' . $e->getMessage());
}

// Récupération des données POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if ($name && $message) {
        // Préparation de la requête pour éviter injection SQL
        $stmt = $pdo->prepare('INSERT INTO testimonials (name, message) VALUES (:name, :message)');
        $stmt->execute(['name' => $name, 'message' => $message]);

        // Redirection ou message de succès
        header('Location: index.html?success=1'); // adapte selon ta page
        exit;
    } else {
        echo 'Les champs sont obligatoires.';
    }
} else {
    echo 'Méthode non autorisée';
}
?>
