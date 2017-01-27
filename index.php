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
                <h3>Recent Posts</h3>
                <hr>
                <div class="row">

                    <form action="category.php" id="search-bar" class="form-inline">
                        <h4>Filter Posts:</h4>
                        <div class="form-group">
                            <select class="form-control" name="tag" id="tags">
                                <option value=''>Select Tag</option>
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
                        </div>

                        <button type="submit" class="btn btn-primary">Apply</button>

                        <div class="form-group pull-right" id="search">
                            <input type="text" class="form-control" placeholder="Search">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                        
                    </form>
                </div>
                <div class="row">


                    <?php

                        $query = "SELECT * FROM posts ORDER BY post_date DESC LIMIT 6";
                        $view_posts_query = mysqli_query($connection, $query);

                        $post_count = 0;
                        

                       while($row = mysqli_fetch_assoc($view_posts_query)){

                            $post_title = $row['post_title'];
                            $post_image = $row['post_image'];
                            $post_date = $row['post_date'];
                            $post_content = $row['post_content'];
                            $post_author = $row['post_author'];
                            $post_count ++;

                            
                        ?>

                        <div class="col-md-4">
                            <div class="thumbnail">
                                <img src="images/<?php echo $post_image; ?>" alt="#">
                                <div class="caption">
                                    <h3><?php echo $post_title; ?></h3>
                                    <p><?php echo $post_date; ?></p>
                                    <p><?php echo $post_content; ?></p> 
                                    <p><?php echo $post_author; ?></p>
                                    <a href="#" class="btn btn-primary" role="button">Read More</a>
                                </div>
                            </div>
                        </div>
                        
                    <?php
                            if($post_count % 3 == 0){
                                echo "</div>";
                                echo "<div class='row'>";
                            }

                        }
                    ?>

                    

                </div>

                <a id="view-all-posts" href="posts.php" class="btn btn-primary pull-right" role="button">View All Posts</a>
            </div>
        </div>

<?php include 'includes/footer.php';?>