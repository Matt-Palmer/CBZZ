

        

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Template One
                        </h1>
                    </div>
                </div>

                
                

                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="image">Image One</label><br>
                                <input type="file" class="form-control" name="image-one">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="image">Image Two</label><br>
                                <input type="file" class="form-control" name="image-two">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="image">Image Three</label><br>
                                <input type="file" class="form-control" name="image-three">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="image">Image Four</label><br>
                                <input type="file" class="form-control" name="image-four">
                            </div>
                        </div>
                        
                        <select class="custom-select col-sm-12 col-md-6" name="image_category" id="category-filter">
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

                            <div class="form-group">
                                <label for="image_tags">Post Tags</label>
                                <input type="text" class="form-control" name="image_tags">
                            </div>

                            <?php insertGalleryImagesForTemplateOne()?>
                    </div>
                    <div class="row">
                        <div class="form-group" style="margin-left: 15px;">
                            <input type="submit" class="btn btn-primary" name="submit-images" value="Publish Post">
                        </div>
                    </div>
                </form>
                
                <div class="row">
                    <div class="col-lg-4 col-md-offset-4 image-container">
                        <div class="wide-image left-align">
                            Image One
                        </div>
                        <div class="image right-align">
                            Image Two
                        </div>
                        <div class="image left-align">
                            Image Three
                        </div>
                        <div class="wide-image right-align">
                            Image Four
                        </div>
                    </div>
                </div>
                

