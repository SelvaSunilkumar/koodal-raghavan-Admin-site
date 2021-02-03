<?php 

    include "dbconnector.php";

    $get_table_query = "SELECT * FROM dance";
    $get_table_result = mysqli_query($connection,$get_table_query);

?>
    
    <br>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                data
            </div>
            <div class="col-lg-9">
                <table class="table table-hover shadow">
                    <thead>
                        <tr>
                            <th scope="col">File Name</th>
                            <th scope="col" hidden>url</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        
                            $table_data = '';

                            while ($get_table_attr = mysqli_fetch_array($get_table_result)) {
                                $name = $get_table_attr["name"];
                                $url = $get_table_attr["url"];

                                $table_data .= '<tr>
                                    <td>'.$name.'</td>
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