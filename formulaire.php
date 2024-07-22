<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));
    
    // Vérifiez que tous les champs sont remplis
    if (!empty($name) && !empty($email) && !empty($subject) && !empty($message)) {
        // Adresse email du destinataire
        $to = "herveezin5@gmail.com";
        
        // Sujet de l'email
        $email_subject = "Nouveau message de contact: $subject";
        
        // Corps de l'email
        $email_body = "Vous avez reçu un nouveau message de votre formulaire de contact.\n\n".
                      "Voici les détails:\n".
                      "Nom: $name\n".
                      "Email: $email\n".
                      "Objet: $subject\n".
                      "Message:\n$message";
        
        // En-têtes de l'email
        $headers = "From: $email\n";
        $headers .= "Reply-To: $email";
        
        // Envoi de l'email
        if (mail($to, $email_subject, $email_body, $headers)) {
            echo "<div class='form-messege text-success'>Votre message a été envoyé avec succès.</div>";
        } else {
            echo "<div class='form-messege text-danger'>Une erreur s'est produite lors de l'envoi de votre message. Veuillez réessayer plus tard.</div>";
        }
    } else {
        echo "<div class='form-messege text-danger'>Veuillez remplir tous les champs.</div>";
    }
} else {
    echo "<div class='form-messege text-danger'>Méthode de soumission invalide.</div>";
}
?>
