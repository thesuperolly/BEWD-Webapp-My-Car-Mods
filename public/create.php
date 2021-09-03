<?php
// initialize the session.
include "codeSnippets/start_session.php";


// include all create page code.
include "codeSnippets/createPageCode.php";


?>
<!-- Calling header template -->
<?php include "templates/header.php"; ?> 

<div class="wrapper">
<h2>Add a work</h2>



<!-- Create project form -->
<!-- Project title -->
<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label class="form-label" for="projectname"><h5>Project</h5></label>
        <input class="form-input" type="text" id="projectname" name="projectname" placeholder="New tyres?" required>
    </div>

    <!-- Project description -->
    <div class="form-group">
        <label class="form-label" for="projectdescription"><h5>Description</h5></label>
        <textarea class="form-input" type="text" id="projectdescription" name="projectdescription" placeholder="what are the details?" required></textarea>
    </div>

    <!-- Project Type -->
    <div class="form-group">
        <label class="form-label"><h5>Project Type</h5></label>
        <label class="form-radio">
            <input type="radio" id="maintenance" name="projecttype" value="Maintenance" checked>
            <i class="form-icon"></i> Maintenance
        </label>
        <label class="form-radio">
            <input type="radio" id="modification" name="projecttype" value="Modification">
            <i class="form-icon"></i> Modification
        </label>
    </div>
    
    
    <!-- Project Status -->
    <div class="form-group">
        <label class="form-label"><h5>Project Status</h5></label>
        <label class="form-radio">
            <input type="radio" id="notstarted" name="projectstatus" value="Not Started" checked>
            <i class="form-icon"></i> Not Started
        </label>
        <label class="form-radio">
            <input type="radio" id="inprogress" name="projectstatus" value="In Progress">
            <i class="form-icon"></i> In Progress
        </label>
        <label class="form-radio">
            <input type="radio" id="completed" name="projectstatus" value="Completed">
            <i class="form-icon"></i> Completed
        </label>
    </div>

    <!-- Project Image -->
    <div class="form-group">
        <label class="form-label" for="projectimage"><h5>Image</h5></label>
        <input class="form-input" type="file" id="projectimage" name="projectimage">
    </div>

    <!-- Form Submit -->
    <input class="btn btn-primary input-group-btn" type="submit" name="submit" value="Create Project">
    <?php if (isset($_POST['submit']) && $statement) { ?>
        <h5>Work successfully added.</h5>
    <?php } ?>
</form>
</div>





<!-- Calling footer template -->
<?php include "templates/footer.php"; ?>