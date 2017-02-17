<?php include 'includes/header.php'; ?>
<?php include 'includes/functions.php'; ?>

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
                <h3>Recent Posts</h3>
                <hr>
                <div id="form-container" class="row">

                    <form action="filtered-posts.php" class="form-inline">
                        <h6>Filter most recent posts</h6>
                        <div id="search" class="input-group col-sm-12 col-md-6 col-xl-4">
                            <input type="text" name="search" class="form-control" placeholder="Search...">
                            <button class="input-group-addon"><span class="fa fa-search"></span></button>
                        </div>
                        <select class="custom-select col-sm-12 col-md-6 col-xl-4" name="tag" id="category-filter">
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


                        <button id="apply-filter" class="btn btn-primary center">Submit</button>

                       
                        

                        

                        

                        
                    </form>
                </div>
                <div class="row">


                    <?php

                        $query = "SELECT * FROM posts ORDER BY post_date DESC LIMIT 6";
                        $view_posts_query = mysqli_query($connection, $query);

                        $post_count = 0;
                        
                        echo "<div class='card-deck'>";
                        while($row = mysqli_fetch_assoc($view_posts_query)){

                            $post_title = $row['post_title'];
                            $post_image = $row['post_image'];
                            $post_date = $row['post_date'];
                            $post_content = $row['post_content'];
                            $post_author = $row['post_author'];
                            $post_count ++;

                            
                        ?>

                        <div class="col-xs-12 col-md-6 col-lg-4">
                                <div class="card">

                                    <img class="card-img-top" src="images/<?php echo $post_image; ?>" alt="#">



                                    <div class="card-block">
                                        <h3 class="card-title"><?php echo $post_title; ?></h3>
                                        <p class="card-text"><small class="text-muted"><?php echo $post_date; ?></small></p>
                                        <p class="card-text"><?php echo $post_content; ?></p> 
                                        <p class="card-text"><?php echo $post_author; ?></p>
                                        <a href="#" class="btn btn-primary read-more" role="button">Read More</a>
                                    </div>


                                </div>
                                
                            </div>
                        
                    <?php
                            

                        }

                        echo "</div>";
                    ?>

                    

                </div>

                <a id="view-all-posts" href="posts.php" class="btn btn-primary" role="button">View All Posts</a>


                
                
                <h3 id="recent-images-heading">Recently added to the gallery</h3>
                <hr>
                <div id="form-container" class="row">

                    <form action="filtered-gallery.php" class="form-inline">
                        <h6>Filter most recent images</h6>
                        <div id="search" class="input-group col-sm-12 col-md-6 col-xl-4">
                            <input type="text" name="search" class="form-control" placeholder="Search...">
                            <button class="input-group-addon"><span class="fa fa-search"></span></button>
                        </div>
                        <select class="custom-select col-xs-12 col-md-6 col-xl-4" name="category" id="category-filter">
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

                        <button id="apply-filter" class="btn btn-primary">Submit</button>

                       

                        

                        
                    </form>
                </div>
                <div class="row">


                    <?php

                        $query = "SELECT * FROM gallery ORDER BY image_date DESC LIMIT 6";
                        $get_gallery_query = mysqli_query($connection, $query);

                        $post_count = 0;
                        
                        echo "<div class='card-deck'>";
                        while($row = mysqli_fetch_assoc($get_gallery_query)){

                            $image_id = $row['image_id'];
                            $template_id = $row['template_id'];

                            

                        

                            
                        ?>

                        <div class="col-xs-12 col-md-6 col-lg-4">



                                    
                                        <?php displayTemplate($image_id, $template_id);?>
                                    


                                
                            </div>
                        
                    <?php
                            

                        }

                        echo "</div>";
                    ?>

                    

                </div>

                <a id="view-gallery" href="gallery.php" class="btn btn-primary" role="button">View Gallery</a>
            </div>
        </div>

<?php include 'includes/footer.php';?>