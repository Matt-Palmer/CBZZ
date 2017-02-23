<?php 

function createComment(){
    global $connection;

    if(isset($_POST['create_comment'])){
        
        $post_id = $_GET['p_id'];
        $comment_author = $_POST['comment_author'];
        $comment_content = $_POST['comment_content'];

        $query = "INSERT INTO comments(comment_post_id, comment_author, comment_content, comment_status, comment_date) ";
        $query .= "VALUES($post_id, '{$comment_author}', '{$comment_content}', 'approved', now())";

        if($create_comment_query = mysqli_query($connection, $query)){
            echo "<h4 class='bg-danger text-danger' style='padding: 5px'>Comment could not be added</h4>";
            $update_comment_count_query = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id = $post_id";
            $update_comment_count = mysqli_query($connection, $update_comment_count_query);
            header("Location: post.php?p_id=" . $post_id);
        }else{
            echo "<h4 class='bg-success text-success' style='padding: 5px'>Comment successfully added</h4>";
        }

        
        
    }
}

?>