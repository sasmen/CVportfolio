<?php

function loginUser($username, $password){
    global $pdo;
    $stmt = $pdo->prepare('SELECT id, password FROM users WHERE username = ?');
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        return true;
    }
    return false;
}

function updateCV($user_id, $cv_content){
    global $pdo;
    $stmt = $pdo->prepare('UPDATE users SET cv_content = ? WHERE user_id = ?');
    $stmt->execute([$cv_content, $user_id]);
}

function getCV($user_id){
    global $pdo;
    $stmt = $pdo->prepare('SELECT cv_content FROM users WHERE user_id = ?');
    $stmt->execute([$user_id]);
    $result = $stmt->fetch();
    return $stmt->fetchColumn();
}

function addProject($user_id, $name, $description){
    global $pdo;
    $stmt = $pdo->prepare('INSERT INTO projects (user_id, name, description) VALUES (?, ?, ?)');
    return $stmt->execute([$user_id, $name, $description]);
}

function getProjects($user_id){
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM projects WHERE user_id = ?');
    $stmt->execute([$user_id]);
    return $stmt->fetchAll();
}

function updateProfile($user_id, $name, $email){
    global $pdo;
    $stmt = $pdo->prepare('UPDATE users SET name = ?, email = ?, WHERE id = ?');
    return $stmt->execute([$name, $email, $user_id]);
}

function getUser($user_id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$user_id]);
    return $stmt->fetch();
}

function sendContactMessage($name, $email, $subject, $message_content){
    global $pdo;
    $stmt = $pdo->prepare('INSERT INTO messages (name, email, subject, message_content) VALUES (?, ?, ?, ?)');
    return $stmt->execute([$name, $email, $subject, $message_content]);
}
?>