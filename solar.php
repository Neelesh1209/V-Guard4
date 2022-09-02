<!DOCTYPE html>
<html lang="en">
<head>
    <title>V Guard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <style>
        .heading{
            text-align: center;
        }
        .back{
            margin-top:-45px;
            margin-left:75pc
        }
        
    </style>
</head>
<body>
    <div class="container my-5">
        <h2 class="heading">Solar PV System</h2><br>
        <a class="btn btn-primary" href="create_solar.php" role="button">New Entry</a>
        <div class="back">
        <a class="btn btn-primary" href="offset.php" role="button">BACK</a>
        </div> 
        <br><br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>SOLAR PV UNITS in KW</th>
                    <th>Conversion Factor</th>
                    <th>CO2 Emission in Kg</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $servername = "epiz_32171591_v_guard";
                $username = "epiz_32171591";
                $password = "HdixsMJNWOwdZjQ";
                $database = "v_guard";

                // Create connection
                $connection = new mysqli($servername, $username, $password, $database);

                // Check connection
                if ($connection->connect_error) {
                    die("Connection failed: " .$connection->connect_error);
                }

                // read all row from database table
                $sql = "SELECT * FROM solar";
                $result = $connection->query($sql);

                if(!$result) {
                    die("Invalid query: " .$connection->error);
                }

                // read data of each row
                while($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                    <td>$row[id]</td>
                    <td>$row[SOLAR_PV_UNITS_in_KW]</td>
                    <td>$row[Conversion_Factor]</td>
                    <td>$row[CO2_Emission_in_Kg]</td>
                    <td>$row[created_at]</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='solar_edit.php?id=$row[id]'>Edit</a>
                        <a class='btn btn-primary btn-sm' href='solar_delete.php?id=$row[id]'>Delete</a>
                    </td>
                    <tr>    
                    ";
                }
                ?>
            </tbody>
        </table>
    </div>    
</body>
</html>