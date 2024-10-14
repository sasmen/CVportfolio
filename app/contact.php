<?php
include 'header.php';
include 'db_connect.php';
include 'functions.php';

session_start();

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message_content = $_POST['message'];

    if (sendContactMessage($name, $email, $subject, $message_content)) {
        $message = "Thank you for your message. We'll get back to you soon!";
    } else {
        $message = "There was an error sending your message. Please try again later.";
    }
}
?>

<main>
    <h1>Contact Us</h1>
    
    <?php if ($message): ?>
        <p><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>

    <form method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject" required>

        <label for="message">Message:</label>
        <textarea id="message" name="message" required></textarea>

        <input type="submit" value="Send Message">
    </form>
</main>

<?php
include 'footer.php';
?>