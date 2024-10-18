<?php



if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user_id'])) {
    $cv_content = $_POST['cv_content'];
    updateCV(admins: $_SESSION['user_id'], cv_content: $cv_content);
}

$cv_content = getCV(admins: $_SESSION['admins']);
?>

<main>
    <h1>My CV</h1>
    <?php if (isset($_SESSION['user_id'])): ?>
        <form method="post">
            <textarea name="cv_content"><?php echo htmlspecialchars(string: $cv_content); ?></textarea>
            <input type="submit" value="Save CV">
        </form>
    <?php else: ?>
        <div><?php echo nl2br(string: htmlspecialchars(string: $cv_content)); ?></div>
    <?php endif; ?>
</main>