<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav mx-auto">
      <a class="nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
      <a class="nav-link" href="#">About</a>
      <a class="nav-link" href="#">Pricing</a>
      <a class="nav-link" href="#">Services</a>
    </div>
    <?php if (!isset($_SESSION['id'])): ?>
      <a class="nav-link btn btn-primary mb-2 mr-3 d-inline-block" href="../login.php">Login</a>
      <a class="nav-link btn btn-secondary mb-2 d-inline-block" href="../reg.php">Register</a>
    <?php else: ?>
      <form action="../logout.php" method="post">
        <input type="hidden">
        <button class="nav-link btn btn-danger d-inline-block">Logout</a>
      </form>
    <?php endif?>
  </div>
</nav>
