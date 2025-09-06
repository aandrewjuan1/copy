<?php require_once 'writer/classloader.php'; ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>School Publication</title>

  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
</head>
<body class="bg-gradient-to-br from-gray-100 to-gray-200 min-h-screen font-sans">

  <!-- Navbar -->
  <nav class="bg-gray-900 text-white py-4 shadow-md">
    <div class="container mx-auto flex justify-between items-center px-6">
      <a href="#" class="text-xl font-bold">School Publication</a>
      <button class="md:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.25h16.5M3.75 12h16.5m-16.5 6.75h16.5" />
        </svg>
      </button>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="bg-gradient-to-r from-green-700 to-gray-800 text-white text-center py-20 rounded-b-3xl">
    <h1 class="text-4xl font-extrabold mb-4">Welcome to the School Publication</h1>
    <p class="text-lg max-w-2xl mx-auto">Discover articles, insights, and stories from our talented writers and admins.</p>
  </section>

  <!-- Writers & Admin Section -->
  <div class="container mx-auto px-6 my-12 grid md:grid-cols-2 gap-8">
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition">
      <img src="https://images.unsplash.com/photo-1577900258307-26411733b430?q=80&w=1170&auto=format&fit=crop" alt="Writer" class="w-full h-56 object-cover">
      <div class="p-6">
        <h2 class="text-2xl font-bold mb-2">Writer</h2>
        <p class="text-gray-600">Content writers create clear, engaging, and informative content that helps communicate services or products effectively, build brand authority, and attract readers.</p>
      </div>
    </div>
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition">
      <img src="https://plus.unsplash.com/premium_photo-1661582394864-ebf82b779eb0?q=80&w=1170&auto=format&fit=crop" alt="Admin" class="w-full h-56 object-cover">
      <div class="p-6">
        <h2 class="text-2xl font-bold mb-2">Admin</h2>
        <p class="text-gray-600">Admin writers manage the editorial process, ensuring all published material aligns with the publication’s vision and strategy.</p>
      </div>
    </div>
  </div>

  <!-- Articles Section -->
  <div class="container mx-auto px-6 my-12">
    <h2 class="text-center text-3xl font-extrabold mb-8">Latest Articles</h2>
    <div class="max-w-3xl mx-auto space-y-6">
      <?php $articles = $articleObj->getActiveArticles(); ?>
      <?php foreach ($articles as $article) { ?>
        <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-lg transition">
          <h1 class="text-xl font-bold text-gray-800 mb-2"><?php echo $article['title']; ?></h1>
          <?php if ($article['is_admin'] == 1) { ?>
            <p><span class="inline-block bg-blue-600 text-white text-xs px-3 py-1 rounded-full">Message From Admin</span></p>
          <?php } ?>
          <small class="block text-gray-500 mb-3"><strong><?php echo $article['username'] ?></strong> · <?php echo $article['created_at']; ?></small>
          <p class="text-gray-700"><?php echo $article['content']; ?></p>
        </div>
      <?php } ?>
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-gray-900 text-white py-6 mt-16 rounded-t-3xl">
    <div class="container mx-auto text-center">
      <p>&copy; <?php echo date('Y'); ?> School Publication. All rights reserved.</p>
    </div>
  </footer>

</body>
</html>
