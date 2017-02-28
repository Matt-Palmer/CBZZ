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
                        <a id="reset" class="btn btn-secondary" href="gallery.php">Reset Filter</a>


                        
                    </form>
                </div>

                    <?php

                        if(isset($_GET['category']) && $_GET['category'] != 0){

                            $category = $_GET['category'];

                            $query = "SELECT album_id FROM album WHERE album_category_id = $category";
                            $get_album_query = mysqli_query($connection, $query);

                            while($get_album = mysqli_fetch_assoc($get_album_query)){
                                
                                $album_id = $get_album['album_id'];

                                $gallery_query = "SELECT * FROM gallery WHERE image_album_id = $album_id AND image_status = 'main' ORDER BY image_id DESC";
                                $get_gallery_query = mysqli_query($connection, $gallery_query);

                                if($get_gallery_query){

                                    echo "<div class='card-deck'>";
                                        while($row = mysqli_fetch_assoc($get_gallery_query)){

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

                                

                                }else{
                                    echo '<h4>Your search returned no results.</h4>';
                                }

                            }

                        }

                    ?>

                    <?php

                        if(isset($_GET['search']) && !empty($_GET['search'])){
                                
                            $search = $_GET['search'];

                            $query = "SELECT * FROM gallery WHERE image_tags LIKE '%$search%' ORDER BY image_added DESC ";
                            $search_query = mysqli_query($connection, $query);

                            if(!$search_query){

                                die("query failed" . mysqli_error($connection));

                            }

                            $count = mysqli_num_rows($search_query);

                            if($count == 0){

                                echo "<h1>NO RESULT</h1>";

                            }else{

                                echo '<div class="grid">';
                                        while($row = mysqli_fetch_assoc($search_query)){

                                            $image_one = $row['image_one'];
                                            $image_album_id = $row['image_album_id'];

                                            $select_album_title = "SELECT album_title FROM album WHERE album_id = $image_album_id";
                                            $select_album_title_query = mysqli_query($connection, $select_album_title);

                                            $albumRow = mysqli_fetch_assoc($select_album_title_query);
                                            $album_title = $albumRow['album_title'];

                                            echo '<div class="item">';
                                                echo '<div class="item-content">';
                                                    echo "<img src='images/$image_one'>";
                                                echo '</div>';
                                                echo "<p class='album-title'>$album_title</p>";
                                            echo '</div>';

                                        }
                                echo '</div>';

                            }

                        }


                    ?>

            </div>
        </div>

<?php include 'includes/footer.php';?>