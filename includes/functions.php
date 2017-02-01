<?php


function displayTemplate($image_id, $template_id){

    global $connection;

    $image_id = $image_id;
    $template_id = $template_id;

    $query = "SELECT * FROM gallery WHERE image_id = '$image_id'";
    $get_images_query = mysqli_query($connection, $query);

    $row = mysqli_fetch_assoc($get_images_query);

    $image_one = $row['image_one'];
    $image_two = $row['image_two'];
    $image_three = $row['image_three'];
    $image_four = $row['image_four'];

    switch($template_id){
        case '1':
            echo '<div class="row">';
            echo '<div class="col-lg-4 col-md-offset-4 image-container">';
            echo '<div class="wide-image left-align">';
            echo "<img src='images/$image_one'>";
            echo '</div>';
            echo '<div class="image right-align">';
            echo "<img src='images/$image_two'>";
            echo '</div>';
            echo '<div class="image left-align">';
            echo "<img src='images/$image_three'>";
            echo '</div>';
            echo '<div class="wide-image right-align">';
            echo "<img src='images/$image_four'>";
            echo '</div>';
            echo '</div>';
            echo '</div>';
            break;
    }

}


?>