<?php
// Vérifie que le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    // Email de destination
    $to = "lionesspretty7@gmail.com";  // Remplace par ton adresse Gmail
    $subject = "Nouveau message de contact du site";
    $body = "Nom : $name\nEmail : $email\n\nMessage :\n$message";
    $headers = "From: $email";

    // Envoie de l'email
    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Message envoyé avec succès !'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Erreur lors de l\'envoi du message.'); window.history.back();</script>";
    }
} else {
    header("Location: index.html");
    exit;
}
?>
