<?php

 // run when submit button is clicked
 if (isset($_POST['submit'])) {
    try {
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
                    if ($_POST['currentImg']!== "default.jpg"){
                        unlink("uploads/".$_POST['currentImg']);
                        move_uploaded_file($tmp_dir,$upload_dir.$uploadedImg);
                    }else{
                        move_uploaded_file($tmp_dir,$upload_dir.$uploadedImg);
                    }
                }
                else{
                $errMSG = "Sorry, your file is too large.";
                }
            }
            else{
                $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";  
            }
        } else {
            // if no image selected the old image remain as it is.
              $uploadedImg = $_POST['currentImg']; // old image from database
              var_dump($_POST['currentImg']);
        }
        
        //grab elements from form and set as varaible
        $project =[
          "id"                 => $_POST['id'],
          "projectname"        => $_POST['projectname'],
          "projectdescription" => $_POST['projectdescription'],
          "projectstatus"      => $_POST['projectstatus'],
          "projecttype"        => $_POST['projecttype'],
          "projectimage"       => $uploadedImg
        ];
        
        // create SQL statement
        $sql = "UPDATE `projects` 
                SET id             = :id,
                projectname        = :projectname, 
                projectdescription = :projectdescription, 
                projectstatus      = :projectstatus, 
                projecttype        = :projecttype, 
                imagelocation      = :projectimage 
                WHERE id = :id";

        //prepare sql statement
        $statement = $connection->prepare($sql);
        
        //execute sql statement
        $statement->execute($project);


    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
    header("Location:welcome.php");
}

// GET data from DB
//simple if/else statement to check if the id is available
if (isset($_GET['id'])) {
    //yes the id exists 
    try {
        // standard db connection
        $connection = new PDO($dsn, $username, $password, $options);
        
        // set if as variable
        $id = $_GET['id'];
        
        //select statement to get the right data
        $sql = "SELECT * FROM projects WHERE id = :id";
        
        // prepare the connection
        $statement = $connection->prepare($sql);
        
        //bind the id to the PDO id
        $statement->bindValue(':id', $id);
        
        // now execute the statement
        $statement->execute();
        
        // attach the sql statement to the new project variable so we can access it in the form
        $project = $statement->fetch(PDO::FETCH_ASSOC);
        
    } catch(PDOExcpetion $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
} else {
    // no id, show error
    echo "No id - something went wrong";
    //exit;
};

?>