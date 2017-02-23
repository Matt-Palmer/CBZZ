<?php include 'includes/header.php'; ?>
    <!--JUMBOTRON-->
        <div class="container-fluid">
            <div class="content-width">
                <div class="jumbotron">
                    <h1>Company Name</h1>
                    <p>Welcome to Company Name</p>
                </div>
            </div>
        </div>
    <!--JUMBOTRON-->

        
    <!--MAIN CONTENT-->
        <div class="container-fluid">
            <div class="content-width">

            <!--RECENT POSTS-->
                <h3>Recent Posts</h3>

                <hr>

            <!--POST FILTER-->
                <div id="form-container" class="row">
                    <form action="filtered-posts.php" class="form-inline">

                        <h6>Filter most recent posts</h6>

                    <!--POST SEARCH-->
                        <div id="search" class="input-group col-sm-12">
                            <input type="text" name="search" class="form-control" placeholder="Search posts...">
                            <button class="input-group-addon btn btn-primary"><span class="fa fa-search"></span></button>
                        </div>
                    <!--POST SEARCH-->

                    <!--CATEGORY SELECT SEARCH-->
                        <select class="custom-select col-sm-12" name="category" id="category-filter">
                            <option value="0">Select a category</option>
                            <?php 
                                $select_categories = "SELECT * FROM categories";

                                $select_category_query = mysqli_query($connection, $select_categories);

                                while($row = mysqli_fetch_assoc($select_category_query)){

                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];

                                    echo "<option value='$cat_id'>$cat_title</option>";

                                }
                            ?>
                        </select>
                    <!--CATEGORY SELECT SEARCH-->

                        <button id="apply-filter" class="btn btn-primary center">Submit</button>

                    </form>
                </div>
            <!--POST FILTER-->

            <!--DISPLAY RECENT POSTS-->
                <div class="row">

                    <?php

                        $select_posts = "SELECT * FROM posts ORDER BY post_date DESC LIMIT 8";
                        $select_posts_query = mysqli_query($connection, $select_posts);
                        
                        echo "<div class='card-deck'>";

                        while($row = mysqli_fetch_assoc($select_posts_query)){
                            
                            $post_id = $row['post_id'];
                            $post_title = $row['post_title'];
                            $post_image = $row['post_image'];
                            $post_date = $row['post_date'];
                            $post_content = $row['post_content'];
                            $post_author = $row['post_author'];
                            $post_categories = $row['post_category_id'];

                            $select_category = "SELECT * FROM categories WHERE cat_id = $post_categories";
                            $select_category_query = mysqli_query($connection, $select_category);

                            while($category = mysqli_fetch_assoc($select_category_query)){
                                $cat_title = $category['cat_title'];
                                $cat_id = $category['cat_id'];
                            }

                    ?>

                    <div class="col-xs-12 col-md-6 col-lg-4 col-xl-3">
                        <div class="card">

                            <img class="card-img-top" src="images/<?php echo $post_image; ?>" alt="#">
                            
                            <div class="card-block">

                                <h3 class="card-title"><?php echo $post_title; ?></h3>

                                <p class="link"><a href="filtered-posts.php?tag=<?php echo $cat_id; ?>"><?php echo $cat_title; ?></a></p>
                                <p class="card-text"><small class="text-muted"><?php echo $post_date; ?></small></p>
                                <p class="card-text"><?php echo $post_content; ?></p> 
                                <p class="card-text"><?php echo $post_author; ?></p>
                                
                                <a href="post.php?p_id=<?php echo $post_id; ?>" class="btn btn-primary read-more" role="button">Read More</a>

                            </div>

                        </div>
                        
                    </div>
                        
                    <?php

                        }

                        echo "</div>";

                    ?>

                </div>
            

                <a id="view-all-posts" href="posts.php" class="btn btn-primary" role="button">View All Posts</a>
            <!--DISPLAY RECENT POSTS-->

            <!--RECENT POSTS-->



            <!--RECENT IMAGES--> 
                <h3 id="recent-images-heading">Recently added to the gallery</h3>

                <hr>
            <!--IMAGES FILTER-->
                <div id="form-container" class="row">
                    <form action="filtered-gallery.php" class="form-inline">

                        <h6>Filter most recent images</h6>
                    <!--IMAGES SEARCH-->
                        <div id="search" class="input-group col-sm-12">
                            <input type="text" name="search" class="form-control" placeholder="Search...">
                            <button class="input-group-addon"><span class="fa fa-search"></span></button>
                        </div>
                    <!--IMAGES SEARCH-->

                    <!--IMAGES CATEGORY FILTER-->
                        <select class="custom-select col-sm-12" name="category" id="category-filter">
                            <option value="0">Select a category</option>
                            <?php 
                                $select_categories = "SELECT * FROM categories";

                                $select_category_query = mysqli_query($connection, $select_categories);

                                while($row = mysqli_fetch_assoc($select_category_query)){
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];

                                    echo "<option value='$cat_id'>$cat_title</option>";
                                }
                            ?>
                        </select>
                    <!--IMAGES CATEGORY FILTER-->

                        <button id="apply-filter" class="btn btn-primary">Submit</button>

                    </form>
                </div>
            <!--IMAGES FILTER-->

            <!--DISPLAY RECENT IMAGES-->
                <div class="row">

                    <?php

                        $select_recent_images = "SELECT * FROM gallery ORDER BY image_date DESC LIMIT 8";
                        $select_recent_images_query = mysqli_query($connection, $select_recent_images);

                        $post_count = 0;
                        
                        echo "<div class='card-deck'>";
                        while($row = mysqli_fetch_assoc($select_recent_images_query)){

                            $image_id = $row['image_id'];
                            $template_id = $row['template_id'];

                    ?>

                    <div class="col-xs-12 col-md-6 col-lg-4 col-xl-3">
                    
                        <?php 

                            $image_one = $row['image_one'];
                            $image_date = $row['image_date'];

                            echo '<div class="card">';
                            echo '<div class="image-container">';
                            echo "<img src='images/$image_one'>";
                            echo '</div>';
                            echo "<p><small class='text-muted'>$image_date</small></p>";
                            echo '</div>';
                        
                        ?>

                    </div>
                        
                    <?php     

                        }

                        echo "</div>";

                    ?>

                </div>

                <a id="view-gallery" href="gallery.php" class="btn btn-primary" role="button">View Gallery</a>
            <!--DISPLAY RECENT IMAGES-->

            </div>
        </div>
    <!--MAIN CONTENT-->

<?php include 'includes/footer.php';?>