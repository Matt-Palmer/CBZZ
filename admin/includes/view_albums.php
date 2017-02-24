

    

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">


                        <h1 class="page-header">
                            Albums
                        </h1>
                        <hr>

                            <?php insertAlbum(); ?>

                            <form action="" method="post">
                                <div class="add-category-form">
                                <div class="row">
                                    <h6>Bulk options</h6>

                                    <div class="form-group col-sm-12">
                                        <label for="album_title">Add Album</label>
                                        <input class="form-control" type="text" name="album_title" placeholder="Insert category name...">
                                    </div>

                                    <input id="add-category" class="btn btn-primary" type="submit" name="submit" value="Add Album">
                                    
                                    <input id="delete-categories" type="submit" class="btn btn-secondary" value="Delete Album" name="bulk_options">

                                    
                                </div>
                                </div>
                            

                            <?php if(isset($_GET['edit'])){ include "includes/update_album.php"; } ?>

                            

                        <div class="table-container">

                            

                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th><input id="select-all" type="checkbox"></th>
                                        <th>ID</th>
                                        <th>Album Title</th>
                                        <th>Delete</th>
                                        <th>Update</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <!--FIND AND DISPLAY ALL CATEGORIES QUERY-->
                                    <?php displayAlbums(); ?>

                                    <!--DELETE CATEGORIES-->
                                    <?php deleteAlbum(); ?>

                                </tbody>
                            </table>
                        </div>
                        
                        </form>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

