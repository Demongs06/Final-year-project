<?php
    /*session_start();*/
     $connection= mysqli_connect('localhost','root','','vehicle management');

    $select_query="SELECT * FROM `feedback` ORDER BY id DESC";
    $result= mysqli_query($connection,$select_query);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Request list</title>
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="sweetalert2/sweetalert2.css">
        <script src="sweetalert2/sweetalert2.min.js"></script>
        <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="animate.css">
        <link rel="stylesheet" href="style.css">
    </head>

    <body>

        <?php include 'navbar_admin.php'; ?>
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1 style="text-align: center;">Reviews</h1>

                    </div>
                    <table id="myTable" class="table table-bordered animated bounce">
                        <thead>

                            <th>Id</th>
                            <th>Full Name</th>
                            <th>Review</th>
                            <th>Delete</th>
                        </thead>

                        <tbody>
                            <?php while($row=mysqli_fetch_assoc($result)){ ?>
                            <tr>

                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['u_name']; ?></td>
                                
                                <td><?php echo $row['review']; ?></td>
                                <td><a class="btn btn-danger" href="deletereview.php?id=<?php echo $row['id']; ?>">Delete</a></td>

                            </tr>

                            <?php }   ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </body>

    <script>
        $(document).ready(function(){
            $('#myTable').dataTable();
        });
    </script>
</html>
