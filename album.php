<?php include 'includes/header.php'; ?>

        <div class="container-fluid">
            <div class="content-width">
                <div class="jumbotron">
                    <?php

                       if(isset($_GET['album'])){
                            $album_id = $_GET['album'];

                            $select_album_title = "SELECT album_title FROM album WHERE album_id = $album_id";
                            $select_album_title_query = mysqli_query($connection, $select_album_title);

                            $albumRow = mysqli_fetch_assoc($select_album_title_query);
                            $album_title = $albumRow['album_title'];

                            echo "<h1>$album_title</h1>";
                            echo "<p>View all of my previous work here!!</p>";
                       }
                    ?>
                    
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="content-width">

                

                <?php

                    if(isset($_GET['album'])){
                        $album_id = $_GET['album'];
                    
                        $query  = "SELECT * FROM gallery WHERE image_album_id = $album_id ORDER BY image_date DESC";
                        $get_gallery_query = mysqli_query($connection, $query);

                        echo '<div class="grid">';
                                while($row = mysqli_fetch_assoc($get_gallery_query)){

                                    $image_one = $row['image_one'];

                                    echo '<div class="item">';
                                        echo '<div class="item-content">';
                                            echo "<img src='images/$image_one'>";
                                        echo '</div>';
                                    echo '</div>';

                                }
                        echo '</div>';
                    }
                ?>
            </div>
        </div>

<?php include 'includes/footer.php';?>