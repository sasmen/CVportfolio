<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>CV landing page</title>
</head>
<body>

<!-- Section: Informations personnelles -->
<div class="section">
        <h3>Informations personnelles</h3>
        <p><strong>Nom :</strong> <?= $nom ?></p>
        <p><strong>Prénom :</strong> <?= $prenom ?></p>
        <p><strong>Adresse :</strong> <?= $adresse ?></p>
        <p><strong>Email :</strong> <a href="mailto:<?= $email ?>"><?= $email ?></a></p>
        <p><strong>Téléphone :</strong> <?= $telephone ?></p>
        <p><strong>Date de naissance :</strong> <?= $date_naissance ?></p>
    </div>

    <!-- Section: Expérience professionnelle -->
    <div class="section">
        <h3>Expérience professionnelle</h3>
        <ol>
            
        </ol>
    </div>

    <!-- Section: Formation -->
    <div class="section">
        <h3>Formation</h3>
        <p>
            
        </p>
        <ol>
            
        </ol>
    </div>

    <!-- Section: Compétences -->
    <div class="section">
        <h3>Compétences</h3>
        <ol>
            
        </ol>
    </div>

    <!-- Section: Contact -->
    <div class="section">
        <h3>Contact</h3>
        <p>Pour plus d'informations, vous pouvez me contacter à l'adresse email : <a href="mailto:<?= $email ?>"><?= $email ?></a></p>
    </div>
</div>

<footer>
    &copy; 2024 - <?= $prenom . ' ' . $nom ?>
</footer>

</body>
</html>