<?php include 'includes/header.php'; ?>
<?php include 'includes/functions.php'; ?>

        <div class="container-fluid">
            <div class="content-width">
                <div class="jumbotron">
                    <h1>Posts</h1>
                    <p>View all of my posts here!!</p>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="content-width">
                <?php

                    $query  = "SELECT * FROM gallery";
                    $get_gallery_query = mysqli_query($connection, $query);

                    while($row = mysqli_fetch_assoc($get_gallery_query)){

                        $image_id = $row['image_id'];
                        $template_id = $row['template_id'];

                        displayTemplate($image_id, $template_id);

                    }

                    
                   

                    

                                    
                ?>
            </div>
        </div>

<?php include 'includes/footer.php';?>