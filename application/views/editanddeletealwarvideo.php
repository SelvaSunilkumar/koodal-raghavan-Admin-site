    <?php 
    
        include "dbconnector.php";

        $get_details_query = "SELECT * FROM alwarvideo";
        $get_details_result = mysqli_query($connection,$get_details_query);
    
    ?>


    <br>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">dd</div>
            <div class="col-lg-9">
                <table class="table table-hover shadow">
                    <thead>
                        <th scope="col">Folder</th>
                        <th scope="col">File Name</th>
                        <th scope="col">Format</th>
                        <th scope="col">Price</th>
                        <th scope="col" hidden>FNO</th>
                        <th scope="col" hidden>URL</th>
                    </thead>
                    <tbody>
                        <?php 
                        
                            $table_data = '';
                            
                            while ($get_details_attr = mysqli_fetch_array($get_details_result)) {
                                $folder = $get_details_attr["folder"];
                                $filename = $get_details_attr["name"];
                                $format = $get_details_attr["format"];
                                $price = $get_details_attr["price"];
                                $url = $get_details_attr["url"];
                                
                                $table_data .= '<tr>
                                    <td>'.$folder.'</td>
                                    <td>'.$filename.'</td>
                                    <td>'.$format.'</td>
                                    <td>'.$price.'</td>
                                    <td hidden>'.$url.'</td>
                                </tr>';
                            }

                            echo $table_data;
                            
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>