<h1 class="page-header">
    Select Template Style
</h1>

<form action="includes/template.php" method="get" enctype="multipart/form-data">

    <label for="template-1">Template</label>
    <input name="template-style" type="checkbox" value="1">

    <label for="template-1">Template</label>
    <input name="template-style" type="checkbox" value="2">

    <label for="template-1">Template</label>
    <input name="template-style" type="checkbox" value="3">

    <?php 
    
        /*if(isset($_POST['add_image'])){
            $gallery_image = $_FILES['image']['name'];
            $gallery_image_temp = $_FILES['image']['tmp_name'];


            move_uploaded_file($gallery_image_temp, "../images/$gallery_image");

            $add_image = "INSERT INTO gallery(image_title) VALUE ('{$gallery_image}')";
            $add_image_query = mysqli_query($connection, $add_image);


        }*/

    ?>

    

    <!--<div class="form-group">
        <label>Post Image</label>
        <input type="file" class="form-control">
    </div>

    

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="add_image" value="Add Image">
    </div>-->

    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Add Image">
    </div>

</form>