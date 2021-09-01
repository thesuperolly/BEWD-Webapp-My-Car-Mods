<header class="navbar">
  <section class="navbar-section">
  <a href="/public" class="navbar-brand mr-2"><h3>My Car Mods</h3></a>
  <a href="create.php" class="link">Create Project</a>
  </section>
  <section class="navbar-section">

            <p>Logged in as:<?php echo htmlspecialchars($_SESSION["username"]); ?>.</p>
  
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
            <p>Have an account? <a href="login.php">Sign In</a>.</p>

  </section>
</header>