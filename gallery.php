<?php include 'includes/header.php'; ?>

        <div class="container-fluid">
            <div class="content-width">
                <div class="jumbotron">
                    <h1>Gallery</h1>
                    <p>View all of my previous work here!!</p>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="content-width">

                <div id="form-container" class="row">
                    <form action="filtered-gallery.php" class="form-inline">
                        <h6>Filter images</h6>
                        <div id="search" class="input-group col-sm-12">
                            <input type="text" name="search" class="form-control" id="inlineFormInputGroup" placeholder="Search...">
                            <button class="input-group-addon btn btn-primary"><span class="fa fa-search"></span></button>
                        </div>
                        <select class="custom-select col-sm-12" name="category" id="category-filter">
                            <option value="0">Select a category</option>
                            <?php 
                                $edit_query = "SELECT * FROM categories";

                                $select_categories_id = mysqli_query($connection, $edit_query);

                                while($row = mysqli_fetch_assoc($select_categories_id)){
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];

                                    echo "<option value='$cat_id'>$cat_title</option>";
                                }
                            ?>
                        </select>

                        <button id="re-apply-filter" class="btn btn-primary">Submit</button>


                        
                    </form>
                </div>

                <div class="row">

                    <?php

                        $select_recent_images = "SELECT * FROM gallery WHERE image_status = 'main' ORDER BY image_date DESC";
                        $select_recent_images_query = mysqli_query($connection, $select_recent_images);

                        $post_count = 0;
                        
                        echo "<div class='card-deck'>";
                        while($row = mysqli_fetch_assoc($select_recent_images_query)){

                            $image_id = $row['image_id'];
                            $image_album_id = $row['image_album_id'];

                            $select_album_title = "SELECT album_title FROM album WHERE album_id = $image_album_id";
                            $select_album_title_query = mysqli_query($connection, $select_album_title);

                            $albumRow = mysqli_fetch_assoc($select_album_title_query);
                            $album_title = $albumRow['album_title'];
                    ?>

                    <div class="col-xs-12 col-md-6 col-lg-4 col-xl-3 padding-right-left">
                    
                        <?php 

                            $image_one = $row['image_one'];
                            $image_date = $row['image_date'];
                            
                            echo "<a href='album.php?album=$image_album_id' class='card'>";
                            echo '<div class="image-container">';
                            echo "<img src='images/$image_one'>";
                            echo '</div>';
                            echo "<p class='album-title'>$album_title</p>";
                            echo '</a>';
                        
                        ?>

                    </div>
                        
                    <?php     

                        }

                        echo "</div>";

                    ?>

                </div>
            </div>
        </div>

<?php include 'includes/footer.php';?>