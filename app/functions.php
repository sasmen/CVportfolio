<?php

function loginUser($username, $password): bool
{
    global $pdo;
    $stmt = $pdo->prepare(query: 'SELECT id, password FROM admins WHERE username = ?');
    $stmt->execute(params: [$username]);
    $user = $stmt->fetch();

    if ($user && password_verify(password: $password, hash: $user['password'])) {
        $_SESSION['admins'] = $user['id'];
        return true;
    }
    return false;
}

function updateCV($admins, $cv_content): void
{
    global $pdo;
    $stmt = $pdo->prepare(query: 'UPDATE admins SET cv_content = ? WHERE admins = ?');
    $stmt->execute(params: [$cv_content, $admins]);
}

function getCV($admins): mixed
{
    global $pdo;
    $stmt = $pdo->prepare(query: 'SELECT cv_content FROM admins WHERE admins = ?');
    $stmt->execute(params: [$admins]);
    $result = $stmt->fetch();
    return $stmt->fetchColumn();
}

function addProject($admins, $name, $description): bool
{
    global $pdo;
    $stmt = $pdo->prepare(query: 'INSERT INTO projects (admins, name, description) VALUES (?, ?, ?)');
    return $stmt->execute(params: [$admins, $name, $description]);
}

function getProjects($admins): array
{
    global $pdo;
    $stmt = $pdo->prepare(query: 'SELECT * FROM projects WHERE admins = ?');
    $stmt->execute(params: [$admins]);
    return $stmt->fetchAll();
}

function updateProfile($admins, $name, $email): bool
{
    global $pdo;
    $stmt = $pdo->prepare(query: 'UPDATE admins SET name = ?, email = ?, WHERE id = ?');
    return $stmt->execute(params: [$name, $email, $admins]);
}

function getUser($admins): mixed
{
    global $pdo;
    $stmt = $pdo->prepare(query: "SELECT * FROM admins WHERE id = ?");
    $stmt->execute(params: [$admins]);
    return $stmt->fetch();
}

function sendContactMessage($name, $email, $subject, $message_content): bool
{
    global $pdo;
    $stmt = $pdo->prepare(query: 'INSERT INTO messages (name, email, subject, message_content) VALUES (?, ?, ?, ?)');
    return $stmt->execute(params: [$name, $email, $subject, $message_content]);
}