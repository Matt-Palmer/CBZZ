<?php include 'includes/header.php'; ?>

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
                <div id="form-container" class="row">
                    <form action="filtered-posts.php" class="form-inline">
                        <h6>Filter posts</h6>
                        <div id="search" class="input-group col-sm-12">
                            <input type="text" name="search" class="form-control" placeholder="Search...">
                            <button class="input-group-addon"><span class="fa fa-search"></span></button>
                        </div>
                        <select class="custom-select col-sm-12" name="tag" id="category-filter">
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

                        $query = "SELECT * FROM posts ORDER BY post_date DESC";
                        $view_posts_query = mysqli_query($connection, $query);

                        $post_count = 0;                        
                        echo "<div class='card-deck'>";
                        while($row = mysqli_fetch_assoc($view_posts_query)){

                            $post_id = $row['post_id'];
                            $post_title = $row['post_title'];
                            $post_image = $row['post_image'];
                            $post_date = $row['post_date'];
                            $post_time = $row['post_time'];
                            $post_content = $row['post_content'];
                            $post_author = $row['post_author'];
                            $post_categories = $row['post_category_id'];
                            $post_count ++;

                            $uk_date = date("d-m-y", strtotime($post_date));

                            $category_query = "SELECT * FROM categories WHERE cat_id = $post_categories";
                            $get_category_query = mysqli_query($connection, $category_query);

                            while($category = mysqli_fetch_assoc($get_category_query)){
                                $cat_title = $category['cat_title'];
                                $cat_id = $category['cat_id'];
                            }
                        ?>

                        <div class="col-xs-12 col-md-6 col-lg-4 col-xl-3 padding-right-left">
                                <div class="card">
                                    <a href="post.php?p_id=<?php echo $post_id; ?>">
                                        <img class="card-img-top" src="images/<?php echo $post_image; ?>" alt="#">
                                    </a>


                                    <div class="card-block">
                                        <h3 class="card-title"><?php echo $post_title; ?></h3>
                                        <p class="card-text"><?php echo 'By ' . $post_author; ?></p>
                                        
                                        <p class="date-and-time"><small class="fa fa-calendar"><?php echo ' ' . $uk_date; ?></small></p>
                                        <p class="date-and-time"><small class="fa fa-clock-o"><?php echo ' ' . $post_time; ?></small></p>
                                        <p class="card-text"><?php echo $post_content; ?></p> 
                                        <p class="link"><a href="filtered-posts.php?tag=<?php echo $cat_id; ?>"><?php echo $cat_title; ?></a></p>
                                        
                                        <a href="post.php?p_id=<?php echo $post_id; ?>" class="btn btn-primary read-more" role="button">Read More</a>
                                    </div>


                                </div>
                                
                        </div>
                        
                    <?php
                            

                        }
                        echo "</div>";
                    ?>
                </div>
            </div>
        </div>

<?php include 'includes/footer.php';?>