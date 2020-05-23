<?php
// Any PHP includes needed for the page
include('settings.php');

//$readonly="readonly"; // Blank to allow data entry

// Get customer number data entry parm
$icusnum="";
$ilstnam="";
if (isset($_GET["icusnum"])) {
    $icusnum = $_GET["icusnum"];
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
    <form action="qcustcdtlist.php" method="post" class="form-horizontal">
            <?php

            // Set up work variables
            $parmspassed=false;
            $parmwherecriteria="";

            // Set where criteria
            if ($icusnum != "") {
                $parmspassed=true;
                $parmwherecriteria=" WHERE cusnum=" . $icusnum;
            }
            else  {
                echo "Customer parameter not passed.";
                // Exit if no customer passed
                exit();
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

                echo '<!-- cusnum -->
                <div class="form-group row">
                    <label for="cusnum" class="col-sm-2 col-form-label">Customer</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="cusnum" id="cusnum" placeholder="Enter customer number" required title="6 characters minimum" value="'. $row["CUSNUM"] . '">
                    </div>
                </div>

                <!-- lstnam -->
                <div class="form-group row">
                    <label for="lstnam" class="col-sm-2 col-form-label">Last name</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="lstnam" id="lstnam" placeholder="Enter last  name" maxlength="8" value="'. $row["LSTNAM"] . '">
                    </div>
                </div>

                <!-- init -->
                <div class="form-group row">
                    <label for="init" class="col-sm-2 col-form-label">Init</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="init" id="init" placeholder="Enter initials" maxlength="3" value="'. $row["INIT"] . '">
                    </div>
                </div>

                <!-- street -->
                <div class="form-group row">
                    <label for="street" class="col-sm-2 col-form-label">Street</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="street" id="street" placeholder="Enter street" maxlength="13" value="'. $row["STREET"] . '">
                    </div>
                </div>

                <!-- city -->
                <div class="form-group row">
                    <label for="city" class="col-sm-2 col-form-label">City</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="city" id="city" placeholder="Enter city" maxlength="6" value="'. $row["CITY"] . '">
                    </div>
                </div>

                <!-- state -->
                <div class="form-group row">
                    <label for="state" class="col-sm-2 col-form-label">State</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="state" id="state" placeholder="Enter state" maxlength="2" value="'. $row["STATE"] . '">
                    </div>
                </div>

                <!-- zipcod -->
                <div class="form-group row">
                    <label for="zipcod" class="col-sm-2 col-form-label">Zip code</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="zipcod" id="zipcod" placeholder="Enter zipcode" maxlength="5" value="'. $row["ZIPCOD"] . '">
                    </div>
                </div>

                <!-- cdtlmt -->
                <div class="form-group row">
                    <label for="cdtlmt" class="col-sm-2 col-form-label">Credit Limit</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="cdtlmt" id="cdtlmt" placeholder="Enter credit limit" maxlength="8" value="'. $row["CDTLMT"] . '">
                    </div>
                </div>

                <!-- chgcod -->
                <div class="form-group row">
                    <label for="chgcod" class="col-sm-2 col-form-label">Charge Code</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="chgcod" id="chgcod" placeholder="Enter charge code" maxlength="1" value="'. $row["CHGCOD"] . '">
                    </div>
                </div>

                <!-- baldue -->
                <div class="form-group row">
                    <label for="baldue" class="col-sm-2 col-form-label">Balance Due</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="baldue" id="baldue" placeholder="Enter balance due" maxlength="8" value="'. $row["BALDUE"] . '">
                    </div>
                </div>

                <!-- cdtdue -->
                <div class="form-group row">
                    <label for="cdtdue" class="col-sm-2 col-form-label">Credit Due</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="cdtdue" id="cdtdue" placeholder="Enter credit due" maxlength="8" value="'. $row["CDTDUE"] . '">
                    </div>
                </div>

                <button type="submit" name="action" value="Update" class="btn btn-primary">Update</button>
                <button type="submit" name="action" value="Delete" class="btn btn-primary">Delete</button>
                <a href="qcustcdtlist.php" id="action" name="action" value="Cancel" class="btn btn-primary">Cancel</a>';
           }
            }else{
                echo "Connection could not be established.<br />";
            }

            ?>
    </form>
</div>
</table>
</body>
</html>