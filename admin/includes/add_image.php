<h1 class="page-header">Add Images</h1>
<hr>
<form id="add-image-form" action="" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="form-group col-sm-12">
            <label for="title">Select Image</label>
            <input type="file" class="form-control" name="image-one">
        </div>

        <div class="form-group col-sm-12">
            <label for="title">Image Category</label>
            <select class="form-control" name="image_category" id="category-filter">
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
        </div>

        <div class="form-group col-sm-12">
            <label for="image_tags">Image Tags</label>
            <input type="text" class="form-control" name="image_tags">
        </div>

        <?php insertGalleryImagesForTemplateTwo()?>

        <div class="form-group col-sm-12">
            <input id="add-image" type="submit" class="btn btn-primary" name="submit-images" value="Add Image">
        </div>
    </div>
</form>
                

