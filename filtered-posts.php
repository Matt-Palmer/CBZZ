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
                    <form action="filtered-posts.php" class="form-inline">
                        <h6>Filter posts</h6>
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
                        <a id="reset" class="btn btn-secondary" href="posts.php">Reset Filter</a>

                        

                        

                        
                    </form>
                </div>
                <div class="row">


                    <?php

                    if(isset($_GET['category']) && $_GET['category'] != 0){
                        $post_cat_id = $_GET['category'];

                        $query = "SELECT * FROM posts WHERE post_category_id = $post_cat_id ORDER BY post_date DESC";

                    $select_all_posts_query = mysqli_query($connection, $query);

                       $post_count = 0; 

                       echo "<div class='card-deck'>";
                       while($row = mysqli_fetch_assoc($select_all_posts_query)){

                            $post_title = $row['post_title'];
                            $post_image = $row['post_image'];
                            $post_date = $row['post_date'];
                            $post_content = $row['post_content'];
                            $post_author = $row['post_author'];
                            $post_categories = $row['post_category_id'];
                            $post_count ++;

                            $category_query = "SELECT * FROM categories WHERE cat_id = $post_categories";
                            $get_category_query = mysqli_query($connection, $category_query);

                            while($category = mysqli_fetch_assoc($get_category_query)){
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
                                        <a href="#" class="btn btn-primary read-more" role="button">Read More</a>
                                    </div>


                                </div>
                                
                            
                        </div>
                        
                    <?php


                        }

                        echo "</div>";

                    }
                    ?>
                    
                    
                    <?php
                    
                    if(isset($_GET['search']) && !empty($_GET['search'])){
                            $search = $_GET['search'];


                            $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ORDER BY post_date DESC ";

                            $search_query = mysqli_query($connection, $query);

                            if(!$search_query){
                                die("query failed" . mysqli_error($connection));
                            }

                            $count = mysqli_num_rows($search_query);

                            if($count == 0){
                                echo "<h1>NO RESULT</h1>";
                            }else{
                                echo "<div class='card-deck'>";
                                while($row = mysqli_fetch_assoc($search_query)){

                                    $post_title = $row['post_title'];
                                    $post_author = $row['post_author'];
                                    $post_date = $row['post_date'];
                                    $post_image = $row['post_image'];
                                    $post_content = $row['post_content'];
                                    $post_categories = $row['post_category_id'];

                                    $category_query = "SELECT * FROM categories WHERE cat_id = $post_categories";
                                    $get_category_query = mysqli_query($connection, $category_query);

                                    while($category = mysqli_fetch_assoc($get_category_query)){
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
                                        <a href="#" class="btn btn-primary read-more" role="button">Read More</a>
                                    </div>


                                </div>
                                
                            </div>
                        

                        <?php
                                }
                                echo "</div>";
                            }

                        }


                        ?>
                    
                </div>

                <a id="view-all-posts" href="posts.php" class="btn btn-primary" role="button">View All Posts</a>
            </div>
        </div>

<?php include 'includes/footer.php';?>