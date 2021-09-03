<?php
// this code will only execute after the submit button is clicked
if (isset($_POST['submit'])) {
    // include the config file that we created before
    require "../config.php";
    // this is called a try/catch statement
    try {
        // FIRST: Connect to the database
        $connection = new PDO($dsn, $username, $password, $options);

        if ($_FILES['projectimage']['size']!==0){
            // File (image) Processing
            $imgFile = $_FILES['projectimage']['name'];
            $tmp_dir = $_FILES['projectimage']['tmp_name'];
            $imgSize = $_FILES['projectimage']['size'];


            $upload_dir = 'uploads/'; //This is the uploads file path.
    
            $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
            
            // valid image extensions
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
            
            // rename uploading image
            $uploadedImg = uniqid().".".$imgExt;
                
            // allow valid image file formats
            if(in_array($imgExt, $valid_extensions)){   
                // Check file size '5MB'
                if($imgSize < 5000000)    {
                move_uploaded_file($tmp_dir,$upload_dir.$uploadedImg);
                }
                else{
                $errMSG = "Sorry, your file is too large.";
                }
            }
            else{
                $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";  
            }
        } else {
            $uploadedImg = "default.jpg";
        }
        

        // SECOND: Get the contents of the form and store it in an array
        $new_project = array(
        "projectname"        => $_POST['projectname'],
        "projectdescription" => $_POST['projectdescription'],
        "projectstatus"      => $_POST['projectstatus'],
        "projecttype"        => $_POST['projecttype'],
        "projectimage"       => $uploadedImg,
        "userid"             => $_SESSION['id']
        );

        // THIRD: Turn the array into a SQL statement
        $sql = "INSERT INTO projects (
            projectname, 
            projectdescription, 
            projectstatus,
            projecttype,
            imagelocation,
            userid
            ) VALUES (
                :projectname, 
                :projectdescription, 
                :projectstatus,
                :projecttype,
                :projectimage,
                :userid
            )";
       
        // FOURTH: Now write the SQL to the database
        $statement = $connection->prepare($sql);
        $statement->execute($new_project);

        // Refresh and redirect to Index.php
        header("Refresh:3; url=welcome.php");
        exit();

    } catch(PDOException $error) {

    // if there is an error, tell us what it is
    echo $sql . "<br>" . $error->getMessage();
    }
}
?>