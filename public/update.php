<?php 
    // initialize the session.
    include "codeSnippets/start_session.php";

    // checks is user is loggin in and redirects to login page if not.
    include "codeSnippets/loginCheck.php";

    // include the config file that we created last week
    require "../config.php";
    require "common.php";

    // all code for updating an existing project.
    include "codeSnippets/update_code.php";
   
?>

<?php include "templates/header.php"; ?>
<div class="wrapper">
    <?php if (isset($_POST['submit']) && $statement) : ?>
        <p>Work successfully updated.</p>
    <?php endif; ?>

    <h2>Edit a project</h2>



    

    <form method="post" enctype="multipart/form-data">

    <a onClick="return confirm('Are you sure you want to Delete this project?')" class="btn" href='delete.php?delete=<?php echo $project['id']; ?>'>Delete Project</a>

        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <!-- Project Name -->
        <div class="form-group">
            <label class="form-label" for="projectname"><h5>Project</h5></label>
            <input class="form-input" type="text" id="projectname" name="projectname" placeholder="New tyres?" value="<?php echo escape($project['projectname']); ?>" required>
        </div>

        <!-- Project description -->
        <div class="form-group">
            <label class="form-label" for="projectdescription"><h5>Description</h5></label>
            <textarea class="form-input" type="text" id="projectdescription" name="projectdescription" placeholder="what are the details?" required><?php echo escape($project['projectdescription']); ?></textarea>
        </div>

        <!-- Project Type -->
        <div class="form-group">
            <label class="form-label"><h5>Project Type</h5></label>
            <label class="form-radio">
                <input type="radio" id="maintenance" name="projecttype" value="Maintenance" <?php if($project['projecttype']=="Maintenance"){ echo "checked";}?>>
                <i class="form-icon"></i> Maintenance
            </label>
            <label class="form-radio">
                <input type="radio" id="modification" name="projecttype" value="Modification" <?php if($project['projecttype']=="Modification"){ echo "checked";}?>>
                <i class="form-icon"></i> Modification
            </label>
        </div>
        
        
        <!-- Project Status -->
        <div class="form-group">
            <label class="form-label"><h5>Project Status</h5></label>
            <label class="form-radio">
                <input type="radio" id="notstarted" name="projectstatus" value="Not Started" <?php if($project['projectstatus']=="Not Started"){ echo "checked";}?>>
                <i class="form-icon"></i> Not Started
            </label>
            <label class="form-radio">
                <input type="radio" id="inprogress" name="projectstatus" value="In Progress" <?php if($project['projectstatus']=="In Progress"){ echo "checked";}?>>
                <i class="form-icon"></i> In Progress
            </label>
            <label class="form-radio">
                <input type="radio" id="completed" name="projectstatus" value="Completed" <?php if($project['projectstatus']=="Completed"){ echo "checked";}?>>
                <i class="form-icon"></i> Completed
            </label>
        </div>
        

        <!-- Project Image -->
        <input type="hidden" name="currentImg" value="<?php echo escape($project['imagelocation']); ?>">
        <div class="card-image">
        <label class="form-label" for="projectimage"><h5>Current Image</h5></label>
            <img src="uploads/<?php echo $project['imagelocation']; ?>" class="img-responsive formImage">
        </div>

        <div class="form-group">
            <label class="form-label" for="projectimage"><h5>New Image</h5></label>
            <input class="form-input" type="file" id="projectimage" name="projectimage" value="">
        </div>

        <!-- Form Submit -->
        <input class="btn btn-primary input-group-btn" type="submit" name="submit" value="Update Project">
    </form>
</div>

    <?php include "templates/footer.php";?>

    <!-- ++++++++++++++++++++++++++++++ -->

