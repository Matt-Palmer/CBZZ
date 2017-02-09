

        

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Template Two
                        </h1>
                    </div>
                </div>


                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="image-one">Image One</label><br>
                                <input type="file" class="form-control" name="image-one">
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
                
                <div class="row">
                    <div class="col-lg-4 col-md-offset-4 image-container">
                        <h1>image one</h1>
                    </div>
                </div>
                

