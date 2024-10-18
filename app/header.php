<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/cv">CV</a></li>
                <li><a href="/projects">Projects</a></li>
                <li><a href="/contact">Contact</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                <li><a href="/profile">Profile</a></li>
                <li><a href="/logout">Logout</a></li>
                <?php else: ?>
                <li><a href="/login">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <div class="container">