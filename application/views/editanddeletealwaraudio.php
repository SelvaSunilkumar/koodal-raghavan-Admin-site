<?php 

    include "dbconnector.php";

?>

<style>

    td {
        cursor: pointer;
    }

</style>

<br>
<div class="container-fluid">

    <div class="row">
        <div class="col col-lg-3">
            <div class="card shadow">
                <div class="card-body">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-sm" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-sm btn-outline-secondary" type="button"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="card shadow">
                <div class="card-header">
                    <h4>Edit and Delete</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-sm" placeholder="Folder Name">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-sm" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-sm btn-outline-secondary" type="button"><i class="fa fa-external-link"></i></button>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col">
                                <input type="number" class="form-control form-control-sm" placeholder="Price">
                            </div>
                            <div class="col">
                                <select class="form-control form-control-sm">
                                    <option value="" selecred disabled>SELECT FILE TYPE</option>
                                    <option value="audio">Audio File - .mp3</option>
                                    <option value="pdf">Text - .pdf </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div>
                        <input type="file" class="form-control form-control-sm">
                    </div>
                    <br>
                    <div>
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-sm btn-block btn-success"><i class="fa fa-edit"></i>&emsp;Edit Audio</button>
                            </div>
                            <div class="col">
                                <button class="btn btn-sm btn-block btn-danger">Delete Audio&emsp;<i class="fa fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 25%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">No File</div>
                    </div>

                    <br>
                    <div class="alert alert-danger text-center" style="display: none;">
                        Missing some fields. Please fill all the Fields to continue
                    </div>
                    <div class="alert alert-warning text-center" style="display: none;">
                        Error occured while updating
                    </div>
                    <div class="alert alert-success text-center" style="display: none;">
                        Process completed Successfully
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <table class="table table-hover shadow">
                <thead>
                    <tr>
                        <th scope="col">Folder</th>
                        <th scope="col">File Name</th>
                        <th scope="col">Format</th>
                        <th scope="col">Price</th>
                        <th scope="col" style="display: none;">url</th>
                        <th scope="col" style="display: none">folderno</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    
                        $alwar_query = "SELECT * FROM alwaraudio";
                        $alwar_result = mysqli_query($connection,$alwar_query);

                        $alwar_table = '';

                        while ($alwar_attr = mysqli_fetch_array($alwar_result)) {
                            $alwar_folder = $alwar_attr["folder"];
                            $alwar_filename = $alwar_attr["name"];
                            $alwar_format = $alwar_attr["format"];
                            $alwar_price = $alwar_attr["price"];
                            $alwar_url = $alwar_attr["url"];
                            $alwar_folderno = $alwar_attr["folderno"];

                            $alwar_table .= '<tr>
                                <td>'.$alwar_folder.'</td>
                                <td>'.$alwar_filename.'</td>
                                <td>'.$alwar_format.'</td>
                                <td>'.$alwar_price.'</td>
                                <td style="display: none;">'.$alwar_url.'</td>
                                <td style="display: none;">'.$alwar_folderno.'</td>
                            </tr>';

                        }

                        echo $alwar_table;

                    ?>
                </tbody>
            </table>
        </div>
    </div>

</div>