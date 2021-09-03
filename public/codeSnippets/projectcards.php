<?php
    if (isset($_SESSION['id'])) {
        //if there are some results
        if ($result && $statement->rowCount() > 0) { ?>
            
          <?php
              // This is a loop, which will loop through each result in the array
              foreach($result as $row) {
                // check if user ID matches posd id and only post user created posts.
                if (isset($_SESSION['id']) == $row['userid']) {
          ?>

              <div class="card">
                  <div class="card-image">
                      <img src="uploads/<?php echo $row['imagelocation']; ?>" class="img-responsive">
                  </div>

                  <div class="card-header">
                      <h4 class="card-title"><?php echo $row['projectname']; ?></h4>
                      <div class="card-subtitle"><?php echo $row['projectstatus']; ?></div>
                      <div class="card-subtitle"><?php echo $row['projecttype']; ?></div>
                  </div>

                  <div class="card-body">
                  <?php echo $row['projectdescription']; ?>
                  </div>

                  <div class="card-footer">
                      <p>Updated: <span><?php echo $row['date']; ?></span></p>
                      <button class="btn btn-primary"><a href='update.php?id=<?php echo $row['id']; ?>'>Edit Project</a></button>
                  </div>
              </div>

            <!-- </p> -->
            <?php
            // this willoutput all the data from the array
            // echo '<pre>'; var_dump($row);
          };
            ?>
            <?php }; //close the foreach
        };
    }else{ ?>
        <h2>Log in to see your projects here!</h2>;
    <?php } ?>