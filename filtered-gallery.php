<?php include 'includes/header.php'; ?>

        <div class="container-fluid">
            <div class="content-width">
                <div class="jumbotron">
                    <h1>Company Name</h1>
                    <p>Welcome to Company Name</p>
                </div>
            </div>
        </div>

        

        <div class="container-fluid">
            <div class="content-width">
                <div id="form-container" class="row">
                    <form action="filtered-gallery.php" class="form-inline">
                        <div id="search" class="input-group col-sm-12 col-md-6">
                            <input type="text" name="search" class="form-control" id="inlineFormInputGroup" placeholder="Search...">
                            <button class="input-group-addon btn btn-primary"><span class="fa fa-search"></span></button>
                        </div>
                        <select class="custom-select col-sm-12 col-md-6" name="category" id="category-filter">
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
                        <a id="reset" class="btn btn-secondary" href="posts.php">Reset Filter</a>


                        
                    </form>
                </div>

                    <?php

                        if(isset($_GET['category']) && $_GET['category'] != 0){

                            $category = $_GET['category'];

                            $query = "SELECT * FROM gallery WHERE image_category = $category ORDER BY image_date DESC";

                            $get_gallery_query = mysqli_query($connection, $query);

                            echo '<div class="card-columns">';
                    
                                while($row = mysqli_fetch_assoc($get_gallery_query)){

                                    $image_one = $row['image_one'];
                                    $image_date = $row['image_date'];

                                    echo '<div class="card">';
                                    echo '<div class="image-container">';
                                    echo "<img src='images/$image_one'>";
                                    echo '</div>';
                                    echo "<p><small class='text-muted'>$image_date</small></p>";
                                    echo '</div>';

                                }

                            echo '</div>';  

                        }

                    ?>

                    <?php

                      /*  if(isset($_GET['search']) && !empty($_GET['search'])){
                                
                            $search = $_GET['search'];

                            $query = "SELECT * FROM gallery WHERE image_tags LIKE '%$search%' ORDER BY image_date DESC ";

                            $search_query = mysqli_query($connection, $query);

                            if(!$search_query){

                                die("query failed" . mysqli_error($connection));

                            }

                            $count = mysqli_num_rows($search_query);

                            if($count == 0){

                                echo "<h1>NO RESULT</h1>";

                            }else{

                                echo '<div class="card-columns">';
                            
                                while($row = mysqli_fetch_assoc($search_query)){

                                    $image_one = $row['image_one'];
                        $image_date = $row['image_date'];

                        echo '<div class="card">';
                        echo '<div class="image-container">';
                        echo "<img src='images/$image_one'>";
                        echo '</div>';
                        echo "<p><small class='text-muted'>$image_date</small></p>";
                        echo '</div>';


                                }

                                echo '</div>';

                            }

                        }*/


                    ?>

                <a id="view-all-posts" href="posts.php" class="btn btn-primary" role="button">View All Posts</a>
            </div>
        </div>

<?php include 'includes/footer.php';?>