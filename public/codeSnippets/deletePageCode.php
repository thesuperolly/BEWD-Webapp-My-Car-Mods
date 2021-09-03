<?php
$deleted = false;

if(isset($_GET['delete'])){
    try {

        // Unlink (Delete) the related image
        // standard db connection
        $connection = new PDO($dsn, $username, $password, $options);

        // set $id variable as ID from url
        $id = $_GET['delete'];

        //select statement to get the right data
        $sql = "SELECT imagelocation FROM projects WHERE id=:id";

        // prepare the connection
        $imgStatement = $connection->prepare($sql);

        //bind the id to the PDO id
        $imgStatement->bindValue(':id', $id);

        // now execute the statement
        $imgStatement->execute();

        // attach the sql statement to the new project variable so we can access it in the form
        $deleteImage = $imgStatement->fetch(PDO::FETCH_ASSOC);

        if($deleteImage['imagelocation']!== "default.jpg"){
            unlink("uploads/".$deleteImage['imagelocation']);
        };

        // standard db connection
        $connection = new PDO($dsn, $username, $password, $options);
        
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

        $deleted = true;
        
    } catch(PDOExcpetion $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
} else {
    // no id, show error
    echo "No id - something went wrong";
    exit;
};


?>