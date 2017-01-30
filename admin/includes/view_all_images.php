

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Categories
                        </h1>

                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    
                                        $display_images = "SELECT * FROM gallery";
                                        $display_images_query = mysqli_query($connection, $display_images);

                                        while($row = mysqli_fetch_assoc($display_images_query)){

                                            $image_id = $row['image_id'];
                                            $image_title = $row['image_title'];

                                            

                                            echo "<tr>";
                                            echo "<td>{$image_id}</td>";
                                            echo "<td class='img-container'><img class='gallery_image' src='../images/{$image_title}'></td>";
                                            echo "<tr>";

                                        }
                                    
                                    
                                    ?>



                                </tbody>
                            </table>
                        </div>  
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        