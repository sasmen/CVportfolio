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
