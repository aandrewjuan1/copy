<?php
session_start();
require_once '../classloader.php'; // assumes $userObj and $articleObj are available

// USER LOGIN
if (isset($_POST['loginUserBtn'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (!empty($email) && !empty($password)) {
        if ($userObj->loginUser($email, $password)) {
            $_SESSION['message'] = "Login successful! Welcome back.";
            $_SESSION['status'] = "200";
            header("Location: ../index.php");
            exit();
        } else {
            $_SESSION['message'] = "Invalid email or password.";
            $_SESSION['status'] = "400";
            header("Location: ../login.php");
            exit();
        }
    } else {
        $_SESSION['message'] = "Please fill in all fields.";
        $_SESSION['status'] = "400";
        header("Location: ../login.php");
        exit();
    }
}

// USER LOGOUT
if (isset($_GET['logoutUserBtn'])) {
    $userObj->logout();
    header("Location: ../login.php");
    exit();
}

// CREATE ARTICLE
if (isset($_POST['insertArticleBtn'])) {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $author_id = $_SESSION['user_id'] ?? null;

    if ($author_id && $articleObj->createArticle($title, $description, $author_id)) {
        $_SESSION['message'] = "Article submitted successfully!";
        $_SESSION['status'] = "200";
        header("Location: ../index.php");
        exit();
    } else {
        $_SESSION['message'] = "Error submitting article.";
        $_SESSION['status'] = "400";
        header("Location: ../index.php");
        exit();
    }
}

// EDIT ARTICLE
if (isset($_POST['editArticleBtn'])) {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $article_id = $_POST['article_id'];

    if ($articleObj->updateArticle($article_id, $title, $description)) {
        $_SESSION['message'] = "Article updated!";
        $_SESSION['status'] = "200";
        header("Location: ../articles_submitted.php");
        exit();
    } else {
        $_SESSION['message'] = "Error updating article.";
        $_SESSION['status'] = "400";
        header("Location: ../articles_submitted.php");
        exit();
    }
}

// DELETE ARTICLE
if (isset($_POST['deleteArticleBtn'])) {
    $article_id = $_POST['article_id'];
    if ($articleObj->deleteArticle($article_id)) {
        $_SESSION['message'] = "Article deleted.";
        $_SESSION['status'] = "200";
    } else {
        $_SESSION['message'] = "Error deleting article.";
        $_SESSION['status'] = "400";
    }
    header("Location: ../articles_submitted.php");
    exit();
}
