<?php
// Initialisation des variables
$nom = $email = $sujet = $message = "";
$nom_err = $email_err = $sujet_err = $message_err = $success_msg = "";

// Vérification des données soumises lorsque le formulaire est envoyé
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Validation du nom
    if (empty($_POST["name"])) {
        $nom_err = "Le nom est requis";
    } else {
        $nom = htmlspecialchars(trim($_POST["name"]));
    }

    // Validation de l'email
    if (empty($_POST["email"])) {
        $email_err = "L'email est requis";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $email_err = "Email invalide";
    } else {
        $email = htmlspecialchars(trim($_POST["email"]));
    }

    // Validation du sujet
    if (empty($_POST["subject"])) {
        $sujet_err = "Le sujet est requis";
    } else {
        $sujet = htmlspecialchars(trim($_POST["subject"]));
    }

    // Validation du message
    if (empty($_POST["message"])) {
        $message_err = "Le message est requis";
    } else {
        $message = htmlspecialchars(trim($_POST["message"]));
    }

    // Si tout est valide, on envoie l'email
    if (empty($nom_err) && empty($email_err) && empty($sujet_err) && empty($message_err)) {
        $to = "votreemail@example.com";  // Remplacez par votre adresse email
        $headers = "From: $email\r\n";
        $body = "Nom: $nom\nEmail: $email\n\nMessage:\n$message";

        if (mail($to, $sujet, $body, $headers)) {
            $success_msg = "Message envoyé avec succès !";
            // Réinitialisation des champs après envoi
            $nom = $email = $sujet = $message = "";
        } else {
            $success_msg = "Erreur lors de l'envoi du message.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de contact</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            font-weight: bold;
            margin-bottom: 10px;
            display: block;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        textarea {
            height: 150px;
        }
        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #333;
            color: white;
            border: none;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #555;
        }
        .error {
            color: red;
            font-size: 14px;
        }
        .success {
            color: green;
            font-size: 16px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Contactez-nous</h2>

    <?php if (!empty($success_msg)): ?>
        <p class="success"><?= $success_msg ?></p>
    <?php endif; ?>

    <form method="POST" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="name">Nom :</label>
        <input type="text" id="name" name="name" value="<?= $nom ?>" required>
        <span class="error"><?= $nom_err ?></span>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" value="<?= $email ?>" required>
        <span class="error"><?= $email_err ?></span>

        <label for="subject">Sujet :</label>
        <input type="text" id="subject" name="subject" value="<?= $sujet ?>" required>
        <span class="error"><?= $sujet_err ?></span>

        <label for="message">Message :</label>
        <textarea id="message" name="message" required><?= $message ?></textarea>
        <span class="error"><?= $message_err ?></span>

        <button type="submit">Envoyer</button>
    </form>
</div>

</body>
</html>
