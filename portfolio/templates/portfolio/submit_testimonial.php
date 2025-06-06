<?php
// submit_testimonial.php

// Simple traitement POST - Sans base de données, juste un exemple

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Nettoyer les entrées
    $name = strip_tags(trim($_POST['name'] ?? ''));
    $message = strip_tags(trim($_POST['message'] ?? ''));

    if ($name && $message) {
        // Ici, tu pourrais enregistrer dans une base de données ou un fichier
        // Exemple simple : réponse JSON avec données reçues

        // Réponse JSON
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 'success',
            'name' => htmlspecialchars($name),
            'message' => htmlspecialchars($message)
        ]);
        exit;
    } else {
        // Erreur : données manquantes
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 'error',
            'message' => 'Veuillez remplir tous les champs.'
        ]);
        exit;
    }
}
?>
