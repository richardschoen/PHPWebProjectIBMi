<?php
// Any PHP includes needed for the page
include('settings.php');

// Get data entry parms if found
$icusnum="";
$ilstnam="";
if (isset($_POST["icusnum"])) {
    $icusnum = $_POST["icusnum"];
}
if (isset($_POST["ilstnam"])) {
    $ilstnam = $_POST["ilstnam"];
}
?>
<!doctype html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" />
<script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.0.3.js"></script>
<html lang="en">
<?php
// Include navbar layout html
include('layoutnavbar.php');
?>
<body>
    <div class="container">
        <form action="qcustcdtlist.php" method="post" name="form1" id="form1">
            <div class="row">
                <div class="col-sm-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Customer</span>
                        <input type="text" class="form-control" id="icusnum" name="icusnum" placeholder="Select customer" value="<?php echo $icusnum ?>" />
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Last Name</span>
                        <input type="text" class="form-control" id="ilstnam" name="ilstnam" placeholder="Select last name" value="<?php echo $ilstnam ?>" />&nbsp;
                    </div>
                </div>
                <br />
                <div class="col-sm-2">
                    <button type="submit" name="search" class="btn btn-sm btn-primary align-left">Search</button>&nbsp;
                    <a class="btn btn-sm btn-primary" href="#">New</a>
                </div>
            </div>
        </form>
        <table class="table table-striped">
            <div class="table responsive">
                <thead>
                    <tr>
                        <th>Customer</th>
                        <th>Last name</th>
                        <th>Init</th>
                        <th>Street</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Zipcode</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

            // Set up work variables
            $parmspassed=false;
            $parmwherecriteria="";

            // Set where criteria
            if ($icusnum != "") {
                $parmspassed=true;
                $parmwherecriteria=" WHERE cusnum=" . $icusnum;
            }
            elseif ($ilstnam != "") {
                $parmspassed=false;
                $parmwherecriteria=" WHERE lstnam like '" . $ilstnam . "'";
            } else {
              // TODO - Set any default where criteria if needed
            }

            // Establish PDO ODBC connection
            $conn=new PDO("odbc:".$connstring);

            // If we got a valid connection, let's show some data
            if( $conn ) {

            // Run our query with selected criteria
            $query = "select * from qiws.qcustcdt " . $parmwherecriteria;

            // Get query results
            $result = $conn->query($query);

            // Iterate and output row data if found
            // IBM i data fields must be used in upper case
            // Otherwise field errors will occur
            // <td scope="row">' . $row["CUSNUM"]. '</td>
            foreach($result as $row) {
                  echo '<tr>
                  <td scope="row"><a href="/qcustcdtdetail.php?icusnum=' . $row["CUSNUM"] . '">' . $row['CUSNUM'] . '</a></td>
                  <td>' . $row["LSTNAM"] .'</td>
                  <td> '.$row["INIT"] .'</td>
                  <td>' . $row["STREET"] .'</td>
                  <td> '.$row["CITY"] .'</td>
                  <td>' . $row["STATE"] .'</td>
                  <td> '.$row["ZIPCOD"] .'</td>
                  </tr>';
                }
            }else{
                echo "Connection could not be established.<br />";
            }

                    ?>
                </tbody>
            </div>
        </table>
        <?php
        // Include footer layout html
        include('layoutfooter.php');
        ?>
    </div>
</body>
</html>