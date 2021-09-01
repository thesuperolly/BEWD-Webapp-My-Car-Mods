<!-- DELETE PROCESS CODE -->
<?php 

    // include the config file that we created last week
    require "../config.php";
    require "common.php";


    if(isset($_GET['delete'])){
        try {
            // standard db connection
            $connection = new PDO($dsn, $username, $password, $options);
            
            // set $id variable as ID from url
            $id = $_GET['delete'];
            
            //select statement to get the right data
            $sql = "DELETE FROM projects WHERE id=:id";
            
            // prepare the connection
            $statement = $connection->prepare($sql);
            
            //bind the id to the PDO id
            $statement->bindValue(':id', $id);
            
            // now execute the statement
            $statement->execute();
            
            // attach the sql statement to the new project variable so we can access it in the form
            $project = $statement->fetch(PDO::FETCH_ASSOC);

            //redirecting to the display page
            header("Location:index.php");
            
        } catch(PDOExcpetion $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    } else {
        // no id, show error
        echo "No id - something went wrong";
        //exit;
    };
    

?>