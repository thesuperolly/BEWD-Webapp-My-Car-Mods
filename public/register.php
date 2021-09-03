<?php
// initialize the session.
include "codeSnippets/start_session.php";

// all code needed to register user
include "codeSnippets/registerPageCode.php";
?>

<!-- Calling header template -->
<?php include "templates/header.php"; ?> 

<div class="wrapper">
    <h1>Register to edit my projects!</h1>
        <p>Create and account to track your own projects.</p>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-input" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    

            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-input" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label class="form-label">Confirm Password</label>
                <input type="password" name="confirm_password" class="form-input" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>

            <p>Already have an account? <a href="login.php">Create account & Login here</a>.</p>
    </form>
</div>






<!-- Calling footer template -->
<?php include "templates/footer.php"; ?>    
