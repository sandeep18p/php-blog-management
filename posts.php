<?php
session_start();
include 'db.php';


if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}


if (isset($_POST['create'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $stmt = $pdo->prepare("INSERT INTO posts (title, content) VALUES (?, ?)");
    $stmt->execute([$title, $content]);

    header('Location: dashboard.php');
    exit;
}


if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $stmt = $pdo->prepare("UPDATE posts SET title = ?, content = ? WHERE id = ?");
    $stmt->execute([$title, $content, $id]);
    
    echo "Post updated successfully.";
    header('Location: dashboard.php');
}


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $stmt = $pdo->prepare("DELETE FROM posts WHERE id = ?");
    $stmt->execute([$id]);

    echo "Post deleted successfully.";
    header('Location: dashboard.php');
}


$stmt = $pdo->prepare("SELECT * FROM posts ORDER BY created_at DESC");
$stmt->execute();
$posts = $stmt->fetchAll();
?>
