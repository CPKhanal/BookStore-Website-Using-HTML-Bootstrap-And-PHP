<?php
// Get the search query from the URL
$query = isset($_GET['query']) ? $_GET['query'] : '';

// Fetch book data from the Open Library API
$url = "https://openlibrary.org/search.json?q=" . urlencode($query);
$response = file_get_contents($url);
$data = json_decode($response, true);
$results = isset($data['docs']) ? $data['docs'] : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search Results</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- header section -->
  <?php include  'header.php'; ?>
  <div class="container mt-4">
    <h2>Search Results for "<?php echo htmlspecialchars($query); ?>"</h2>

    <?php if (empty($results)): ?>
      <p>No results found.</p>
    <?php else: ?>
      <div class="row">
        <?php foreach ($results as $book): ?>
          <div class="col-md-3 mb-4">
            <div class="card">
              <?php if (isset($book['cover_i'])): ?>
                <img src="https://covers.openlibrary.org/b/id/<?php echo $book['cover_i']; ?>-M.jpg" class="card-img-top" alt="Book Cover">
              <?php else: ?>
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="No Image">
              <?php endif; ?>
              <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($book['title']); ?></h5>
                <p class="card-text">
                  <?php echo isset($book['author_name']) ? implode(', ', $book['author_name']) : 'Unknown Author'; ?>
                </p>
                <p class="card-text">
                  First published: <?php echo isset($book['first_publish_year']) ? $book['first_publish_year'] : 'N/A'; ?>
                </p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
<!-- footer section -->
<?php include 'footer.php' ?>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
