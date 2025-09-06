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

<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | School Publication</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <style>
    body {
      font-family: "Arial";
      background: url("https://images.unsplash.com/photo-1488190211105-8b0e65b80b4e?q=80&w=1170&auto=format&fit=crop") no-repeat center center fixed;
      background-size: cover;
    }
  </style>
</head>
<body>
  <div class="container d-flex align-items-center justify-content-center" style="min-height:100vh;">
    <div class="col-md-6">
      <div class="card shadow-lg">
        <div class="card-header bg-dark text-white">
          <h4 class="mb-0">Writers Dashboard Login</h4>
        </div>
        <div class="card-body">
          <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-<?php echo $_SESSION['status'] === '200' ? 'success' : 'danger'; ?>">
              <?php echo $_SESSION['message']; ?>
            </div>
            <?php unset($_SESSION['message']); unset($_SESSION['status']); ?>
          <?php endif; ?>

          <form action="core/handleForms.php" method="POST">
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" name="loginUserBtn" class="btn btn-primary btn-block">Login</button>
          </form>
        </div>
        <div class="card-footer text-center">
          <p class="mb-0">Don’t have an account? <a href="register.php">Register here</a></p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>


