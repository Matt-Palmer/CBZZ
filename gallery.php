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

                    $query  = "SELECT * FROM gallery ORDER BY image_date DESC";
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
                                    
                ?>
            </div>
        </div>

<?php include 'includes/footer.php';?>