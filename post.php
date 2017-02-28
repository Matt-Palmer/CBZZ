<?php include 'includes/header.php'; ?>
<?php include 'includes/functions.php'; ?>

        <div id="post-container" class="container-fluid">
            <div class="content-width">

                <?php 

                    if(isset($_GET['p_id'])){

                        $post_id = $_GET['p_id'];

                        $views_query = "UPDATE posts SET post_views = post_views + 1 WHERE post_id = $post_id";
                        $send_view_query = mysqli_query($connection, $views_query);

                        $query = "SELECT * FROM posts WHERE post_id = $post_id";

                        $select_all_posts_query = mysqli_query($connection, $query);

                        while($row = mysqli_fetch_assoc($select_all_posts_query)){

                            $post_title = $row['post_title'];
                            $post_author = $row['post_author'];
                            $post_date = $row['post_date'];
                            $post_time = $row['post_time'];
                            $post_image = $row['post_image'];
                            $post_content = $row['post_content'];
                            $post_views = $row['post_views'];
                            $uk_date = date("d-m-y", strtotime($post_date));
                ?>

                <!--Form Validation-->
                <?php

                    if(isset($_POST['create_comment'])){

                        $error = '';

                        $name = $_POST['comment_author'];
                        $comment = $_POST['comment_content'];

                        if(empty($name)){
                            $error .= "Your name is required.<br>" ;
                        }

                        if(empty($comment)){
                            $error .= "Your have left the comment empty.<br>";
                        }

                        if($error){
                            echo "<div class='alert alert-danger' role='alert'>";
                            echo $error ;
                            echo "</div>";
                        }else{
                            createComment();
                        }

                    }


                ?>

                <!-- First Blog Post -->
                <h2><?php echo $post_title; ?></h2>
                
                <p class="lead">By <?php echo $post_author; ?></p>
                <p class="date-and-time"><span class="fa fa-calendar"></span><?php echo ' ' . $uk_date; ?></p>
                <p class="date-and-time"><span class="fa fa-clock-o"></span><?php echo ' ' . $post_time; ?></p>
                <hr>

                <div class="image-container">
                    <img src="images/<?php echo $post_image; ?>" alt="">
                </div>

                <hr>

                <p><?php echo $post_content;?></p>

                <hr>

                <?php

                    }

                    }else{
                        header("Location: index.php");
                    }

                ?>

                <!-- Blog Comments -->
                <form id="add-comment-form" action="" method="post" role="form">
                    <div class="row">
                        <h4>Leave a Comment:</h4>
                        <div id="comment-name-input" class="form-group col-sm-12">
                            <label for="comment_author">Name</label>
                            <input type="text" name="comment_author" class="form-control" value="<?php if(isset($_POST['comment_author'])){ echo $name; }?>" placeholder="Enter your name...">
                        </div>

                        <div class="form-group col-sm-12">
                            <label for="comment_content">Comment</label>
                            <textarea class="form-control" name="comment_content" rows="10"><?php if(isset($_POST['comment_content'])){ echo $comment; }?></textarea>
                        </div>

                        <button id="add-comment" type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                

                

                <!-- Posted Comments -->

                <?php 

                    $query = "SELECT * FROM comments WHERE comment_post_id = $post_id AND comment_status = 'approved' ORDER BY comment_id DESC";


                    $select_comment_query = mysqli_query($connection, $query);

                    //confirmQuery($select_comment_query);

                    while($row = mysqli_fetch_assoc($select_comment_query)){
                        
                        $comment_date = $row['comment_date'];
                        $comment_content = $row['comment_content'];
                        $comment_author = $row['comment_author'];

                ?>

                <hr>

                <!-- Comment -->
                <div class="media">
                    <div class="row">
                        <h4><?php echo $comment_author; ?></h4>

                        <p class="col-sm-12"><small><?php echo $comment_date; ?></small></p>
                        <div class="comment-container col-sm-12">
                            <?php echo $comment_content; ?>
                        </div>
                    </div>
                </div>

                <?php 
                    }
                ?>
            </div>
        </div>

<?php include 'includes/footer.php';?>