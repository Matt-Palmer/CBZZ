

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-6">
                        <h1 class="page-header">
                            Categories
                        </h1>

                        <div>
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
                                            $template_id = $row['template_id'];
                                            
                                            echo "</tr>";
                                            echo "<td>{$image_id}</td>";
                                            echo "<td>"; 
                                            displayTemplate($image_id, $template_id); 
                                            echo "</td>";
                                            echo "</tr>";
                                        

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
        