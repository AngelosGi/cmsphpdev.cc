<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Postboard</title>
</head>
<body>
<!-- navbar-dark fixed-top bg-dark -->
<nav class="navbar navbar-expand-md navbar-default">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?php echo ROOT_URL?>">Post Board</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <!-- <li class="nav-item">
          <a class="nav-link" aria-current="page" href="<?php echo ROOT_URL?>">Home</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="<?php echo ROOT_URL?>posts">Posts</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li> -->
        <!-- <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li> -->
      </ul>
      <!-- <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
    </div>
  </div>
</nav>

<div class="container">

<div class="row">
    <?php require($view);?>
</div>

</div>




</body>
</html>