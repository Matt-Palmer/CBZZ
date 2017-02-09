<?php include "includes/admin_header.php";?>
<?php include "functions.php"; ?>

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php";?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <?php 
                            if(isset($_GET['source'])){
                                $source = $_GET['source'];
                            }else{
                                $source = '';
                            }
                        
                            switch($source){

                                case 'add_image':
                                include 'add_image.php';
                                break;

                                case 'view_all':
                                include 'includes/view_all_images.php';
                                break;

                                case '23':
                                echo '';
                                break;

                                case '98':
                                echo '';
                                break;
                            }
                        ?>
                    </div>   
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <?php 
                            if(isset($_GET['template-style'])){
                                $template_style = $_GET['template-style'];
                            }else{
                                $template_style = '';
                            }
                        
                            switch($template_style){

                                case '1':
                                include 'includes/template_one.php';
                                break;

                                case '2':
                                include 'includes/template_two.php';
                                break;

                                case '3':
                                include 'includes/template_three.php';
                                break;

                                case '98':
                                echo '';
                                break;

                                
                            }
                        ?>
                    </div>   
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        
<?php include "includes/admin_footer.php";?>