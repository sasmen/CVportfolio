<?php
include 'header.php';
include 'db.php';
include 'functions.php';


if (!isset($_SESSION['user_id'])) {
    header(header: 'Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    updateProfile(admins: $_SESSION['user_id'], name: $name, email: $email);
}

$user = getUser(admins: $_SESSION['user_id']);
?>

<main>
    <h1>My Profile</h1>
    <form method="post">
        <input type="text" name="name" value="<?php echo htmlspecialchars(string: $user['name']); ?>" placeholder="Name"
            required>
        <input type="email" name="email" value="<?php echo htmlspecialchars(string: $user['email']); ?>"
            placeholder="Email" required>
        <input type="submit" value="Update Profile">
    </form>
</main>

<?php
include 'footer.php';
?>