<?php require_once 'writer/classloader.php'; ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>School Publication</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #f0f4f8, #d9e4ec);
      min-height: 100vh;
    }
    .navbar {
      background: #2c3e50 !important;
    }
    .hero {
      padding: 5rem 1rem;
      text-align: center;
      background: linear-gradient(135deg, #355E3B, #2c3e50);
      color: white;
      border-radius: 0 0 2rem 2rem;
      margin-bottom: 2rem;
    }
    .card {
      border: none;
      border-radius: 1rem;
      backdrop-filter: blur(10px);
      background: rgba(255, 255, 255, 0.8);
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }
    h1, .display-4 {
      font-weight: 700;
    }
    .article-card h1 {
      font-size: 1.5rem;
      color: #2c3e50;
    }
    footer {
      margin-top: 3rem;
      padding: 2rem;
      background: #2c3e50;
      color: white;
      text-align: center;
      border-radius: 2rem 2rem 0 0;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark py-3">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#">School Publication</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero">
    <div class="container">
      <h1 class="display-4 mb-3">Welcome to the School Publication</h1>
      <p class="lead">Discover articles, insights, and stories from our talented writers and admins.</p>
    </div>
  </section>

  <!-- Writers & Admin Section -->
  <div class="container my-5">
    <div class="row g-4">
      <div class="col-md-6">
        <div class="card shadow-sm h-100">
          <img src="https://images.unsplash.com/photo-1577900258307-26411733b430?q=80&w=1170&auto=format&fit=crop" class="card-img-top rounded-top" alt="Writer">
          <div class="card-body">
            <h2 class="h4">Writer</h2>
            <p class="text-muted">Content writers create clear, engaging, and informative content that helps communicate services or products effectively, build brand authority, and attract readers.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card shadow-sm h-100">
          <img src="https://plus.unsplash.com/premium_photo-1661582394864-ebf82b779eb0?q=80&w=1170&auto=format&fit=crop" class="card-img-top rounded-top" alt="Admin">
          <div class="card-body">
            <h2 class="h4">Admin</h2>
            <p class="text-muted">Admin writers manage the editorial process, ensuring all published material aligns with the publication’s vision and strategy.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Articles Section -->
  <div class="container my-5">
    <h2 class="text-center fw-bold mb-4">Latest Articles</h2>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <?php $articles = $articleObj->getActiveArticles(); ?>
        <?php foreach ($articles as $article) { ?>
          <div class="card article-card mb-4 p-3 shadow-sm">
            <div class="card-body">
              <h1><?php echo $article['title']; ?></h1>
              <?php if ($article['is_admin'] == 1) { ?>
                <p><span class="badge bg-primary">Message From Admin</span></p>
              <?php } ?>
              <small class="text-muted d-block mb-2"><strong><?php echo $article['username'] ?></strong> · <?php echo $article['created_at']; ?></small>
              <p><?php echo $article['content']; ?></p>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer>
    <p class="mb-0">&copy; <?php echo date('Y'); ?> School Publication. All rights reserved.</p>
  </footer>

  <!-- Bootstrap 5 JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<span class="navbar-toggler-icon"></span>
      </button>
    </nav>
    <div class="container-fluid">
      <div class="display-4 text-center">Hello there and welcome to the main homepage!</div>
      <div class="row">
        <div class="col-md-6">
          <div class="card shadow">
            <div class="card-body">
              <h1>Writer</h1>
              <img src="https://images.unsplash.com/photo-1577900258307-26411733b430?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="img-fluid">
              <p>Content writers create clear, engaging, and informative content that helps businesses communicate their services or products effectively, build brand authority, attract and retain customers, and drive web traffic and conversions.</p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card shadow">
            <div class="card-body">
              <h1>Admin</h1>
              <img src="https://plus.unsplash.com/premium_photo-1661582394864-ebf82b779eb0?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="img-fluid">
              <p>Admin writers play a key role in content team development. They are the highest-ranking editorial authority responsible for managing the entire editorial process, and aligning all published material with the publication’s overall vision and strategy. </p>
            </div>
          </div>
        </div>
      </div>
      <div class="display-4 text-center mt-4">All articles are below!!</div>
      <div class="row justify-content-center">
        <div class="col-md-6">
        <?php $articles = $articleObj->getActiveArticles(); ?>
          <?php foreach ($articles as $article) { ?>
          <div class="card mt-4 shadow">
            <div class="card-body">
              <h1><?php echo $article['title']; ?></h1> 
              <?php if ($article['is_admin'] == 1) { ?>
                <p><small class="bg-primary text-white p-1">  
                  Message From Admin
                </small></p>
              <?php } ?>
              <small><strong><?php echo $article['username'] ?></strong> - <?php echo $article['created_at']; ?> </small>
              <p><?php echo $article['content']; ?> </p>
            </div>
          </div>  
          <?php } ?>   
        </div>
      </div>
    </div>
  </body>
  </html>
