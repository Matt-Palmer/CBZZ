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
    $image_five = $row['image_five'];
    $image_six = $row['image_six'];
    $image_seven = $row['image_seven'];
    $image_eight = $row['image_eight'];
    $image_nine = $row['image_nine'];
    $image_date = $row['image_date'];
    
    
    switch($template_id){
        case '1':
        echo '<div class="card">';
            echo '<div class="image-container">';
            echo '<div class="image left-align">';
            echo "<img src='images/$image_one'>";
            echo '</div>';
            echo '<div class="image right-align">';
            echo "<img src='images/$image_two'>";
            echo '</div>';
            echo '<div class="image left-align">';
            echo "<img src='images/$image_three'>";
            echo '</div>';
            echo '<div class="image right-align">';
            echo "<img src='images/$image_four'>";
            echo '</div>';
            echo '</div>';
            echo "<p><small class='text-muted'>$image_date</small></p>";
            echo '</div>';
            break;

        case '2':
            echo '<div class="card">';
            echo '<div class=" image-container">';
            echo "<img src='images/$image_one'>";
            echo '</div>';
            echo "<p><small class='text-muted'>$image_date</small></p>";
            echo '</div>';
            break;
        
        case '3':

            echo '<div class="card">';
            echo '<div class="image-container">';
            echo '<div class="third left-align">';
            echo "<img src='images/$image_one'>";
            echo '</div>';
            echo '<div class="third left-align">';
            echo "<img src='images/$image_two'>";
            echo '</div>';
            echo '<div class="third left-align">';
            echo "<img src='images/$image_three'>";
            echo '</div>';
            echo '<div class="third left-align">';
            echo "<img src='images/$image_four'>";
            echo '</div>';
            echo '<div class="third left-align">';
            echo "<img src='images/$image_five'>";
            echo '</div>';
            echo '<div class="third left-align">';
            echo "<img src='images/$image_six'>";
            echo '</div>';
            echo '<div class="third left-align">';
            echo "<img src='images/$image_seven'>";
            echo '</div>';
            echo '<div class="third left-align">';
            echo "<img src='images/$image_eight'>";
            echo '</div>';
            echo '<div class="third left-align">';
            echo "<img src='images/$image_nine'>";
            echo '</div>';
            echo '</div>';
            echo "<p><small class='text-muted'>$image_date</small></p>";
            echo '</div>';
            
            break;
    }
    

}


?>