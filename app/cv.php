<?php
include 'header.php';
include 'db.php';
include 'functions.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user_id'])) {
    $cv_content = $_POST['cv_content'];
    updateCV($_SESSION['user_id'], $cv_content);
}

$cv_content = getCV($_SESSION['user_id']);
?>

<main>
    <h1>My CV</h1>
    <?php if (isset($_SESSION['user_id'])): ?>
        <form method="post">
            <textarea name="cv_content"><?php echo htmlspecialchars($cv_content); ?></textarea>
            <input type="submit" value="Save CV">
        </form>
    <?php else: ?>
        <div><?php echo nl2br(htmlspecialchars($cv_content)); ?></div>
    <?php endif; ?>
</main>

<?php
include 'footer.php';
?>