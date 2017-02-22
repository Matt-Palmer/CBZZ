

        

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Add Images
                        </h1>
                    </div>
                </div>


                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="image-one">Image One</label><br>
                                <input type="file" class="form-control" name="image-one">
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
                        </div>
                        <?php insertGalleryImagesForTemplateTwo()?>

                        
                        
                    </div>

                    <div class="row">
                        <div class="form-group" style="margin-left: 15px;">
                            <input type="submit" class="btn btn-primary" name="submit-images" value="Publish Post">
                        </div>
                    </div>
                </form>
                

