<?php

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <main>
        <h1>My CV</h1>
        <?php if (isset($_SESSION['user_id'])): ?>
        <form method="post">
            <textarea name="cv_content"><?php echo htmlspecialchars(string: $cv_content); ?></textarea>
            <input type="submit" value="Save CV">
        </form>
        <?php else: ?>
        <div></div>
        <?php endif; ?>

        <h2>Image Example</h2> <!-- problème quant à l'affichage du CV -->
        <img src="<?php echo 'CVSamson.jpg'; ?>" alt="CVSamson" width="620" height="877" alt="CV">
    </main>
</body>

</html>