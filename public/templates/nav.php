<header class="navbar">

  <section class="navbar-section">

  <?php if(isset($_SESSION['loggedin'])==true){ ?>
    <a href="welcome.php" class="navbar-brand mr-2"><h3>My Car Mods</h3></a>
    <p>Logged in as: <?php echo htmlspecialchars($_SESSION["username"]); ?> </p>
  <?php }else{ ?>
    <a href="index.php" class="navbar-brand mr-2"><h3>My Car Mods</h3></a>

 <?php };?>
  </section>


  <section class="navbar-section">
    <?php 
    if(isset($_SESSION['loggedin'])==true){ 
        echo '<a href="logout.php"><span>Logout</span></a></li>';
      }elseif(isset($_SESSION['loggedin'])==false){
        echo '<p class="navlink" >Don\'t have an account? <a href="register.php"><span>Register</span></a>.  </p>';
        echo '<p>Have an account? <a href="login.php"><span>Login</span></a>.</p>';
      }
    ?>
  </section>
</header>