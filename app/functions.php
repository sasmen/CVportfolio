<?php

function loginUser($username, $password)
{
    global $pdo;
    $stmt = $pdo->prepare('SELECT id, password FROM admins WHERE username = ?');
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['admins'] = $user['id'];
        return true;
    }
    return false;
}

function updateCV($admins, $cv_content)
{
    global $pdo;
    $stmt = $pdo->prepare('UPDATE admins SET cv_content = ? WHERE admins = ?');
    $stmt->execute([$cv_content, $admins]);
}

function getCV($admins)
{
    global $pdo;
    $stmt = $pdo->prepare('SELECT cv_content FROM admins WHERE admins = ?');
    $stmt->execute([$admins]);
    $result = $stmt->fetch();
    return $stmt->fetchColumn();
}

function addProject($admins, $name, $description)
{
    global $pdo;
    $stmt = $pdo->prepare('INSERT INTO projects (admins, name, description) VALUES (?, ?, ?)');
    return $stmt->execute([$admins, $name, $description]);
}

function getProjects($admins)
{
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM projects WHERE admins = ?');
    $stmt->execute([$admins]);
    return $stmt->fetchAll();
}

function updateProfile($admins, $name, $email)
{
    global $pdo;
    $stmt = $pdo->prepare('UPDATE admins SET name = ?, email = ?, WHERE id = ?');
    return $stmt->execute([$name, $email, $admins]);
}

function getUser($admins)
{
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM admins WHERE id = ?");
    $stmt->execute([$admins]);
    return $stmt->fetch();
}

function sendContactMessage($name, $email, $subject, $message_content)
{
    global $pdo;
    $stmt = $pdo->prepare('INSERT INTO messages (name, email, subject, message_content) VALUES (?, ?, ?, ?)');
    return $stmt->execute([$name, $email, $subject, $message_content]);
}
