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

                <?php

                    $query  = "SELECT * FROM gallery WHERE image_status = 'main' ORDER BY image_date DESC";
                    $get_gallery_query = mysqli_query($connection, $query);

                    echo '<div class="grid">';
                            while($row = mysqli_fetch_assoc($get_gallery_query)){

                                $image_one = $row['image_one'];
                                $image_date = $row['image_date'];
                                $image_album_id = $row['image_album_id'];

                                $select_album_title = "SELECT album_title FROM album WHERE album_id = $image_album_id";
                                $select_album_title_query = mysqli_query($connection, $select_album_title);

                                $albumRow = mysqli_fetch_assoc($select_album_title_query);
                                $album_title = $albumRow['album_title'];

                                echo '<div class="item">';
                                    echo '<div class="item-content">';
                                        echo "<img src='images/$image_one'>";
                                        
                                        echo '<div class="overlay">';
                                            
                                        echo '</div>';
                                        echo "<p class='overlay-text'>$album_title</p>";
                                    echo '</div>';
                                echo '</div>';

                            }
                    echo '</div>';

                ?>
            </div>
        </div>

<?php include 'includes/footer.php';?>