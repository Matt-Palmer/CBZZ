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
                <div  class="row filter-container">
                    <form action="filtered-posts.php" id="filters">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tags">By Tag:</label>
                                <select class="form-control filters" name="tag" id="tags" width>
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
                            <div class="form-group">
                                <label for="tags">By Celebration:</label>
                                <select class="form-control filters" name="test" id="test" width>
                                    <option value="#">Select Celebration</option>
                                    <option value="#">Tag 1</option>
                                    <option value="#">Tag 2</option>
                                    <option value="#">Tag 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="date-from">Date From:</label>
                                <input name="date-from" type="text" class="form-control filters " placeholder="Select Date">
                            </div>
                            <div class="form-group">
                                <label for="date-to">Date To:</label>
                                <input name="date-to" type="text" class="form-control filters " placeholder="Select Date">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group" id="search">
                                <input type="text" class="form-control filters display-inline" placeholder="Search">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                            <div class="form-group" id="filter-btn">
                                <button type="submit" class="btn btn-primary">Apply Filter</button>
                                <a href="posts.php" type="submit" class="btn alt-btn">Reset Filter</a>
                            </div>
                        </div>
                        
                        
                        
                    </form>
                </div>
                <div class="row">


                    <?php

                       if(isset($_GET['tag'])){
                        $post_cat_id = $_GET['tag'];
                    }
                    
                    $query = "SELECT * FROM posts WHERE post_category_id = $post_cat_id";

                    $select_all_posts_query = mysqli_query($connection, $query);

                       $post_count = 0; 

                       while($row = mysqli_fetch_assoc($select_all_posts_query)){

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

                <a id="view-all-posts" href="#" class="btn btn-primary pull-right" role="button">View All Posts</a>
            </div>
        </div>

<?php include 'includes/footer.php';?>