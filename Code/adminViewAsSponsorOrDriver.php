<?php
require_once "Database/config.php";

    if(isset($_POST['type']) AND isset($_POST['org_id'])) {
        $_SESSION['org_id'] = $_POST['org_id'];
        switch($_POST['type']) {
            case 1:
                header("Location: sponsor_home_page.php");
                break;
            case 2:
                header("Location: driver_home_page.php");
                break;
        }
    }
?>
<!DOCTYPE html>
<head>
        <meta charset="utf-8">
        <title>Admin View Other Homepages</title>
    </head>
    <body>
        <form method="post" enctype="multipart/form-data">
    <div class="container">
        <div class="form-item"> 
            <select name="type" id="type">
                <option value="">Select which Homepage you want to view as an Admin </option>
                <option value="1"><a href="adminViewAsSponsor.php">View Sponsor Homepage</a></option>
                <option value="2"><a href="adminViewAsDriver.php">View Driver Homepage</a></option>
            </select>
            <select name="org_id" id="org">]
                <option value="">Select which Organization to view</option>
                <?php
                $orgs = mysqli_query($con, "SELECT * from organizations");
                for($x=0;$x<$orgs->num_rows;$x++){
                    $row = $orgs->fetch_assoc();
                    echo("<option value=\"{$row['org_id']}\"><a href=\"adminViewAsSponsor.php\">{$row['org_name']}</a></option>");
                }
                ?>
            </select>
        </div>
        <button>View Page</button>
        </form>
    </div>
</body>
</html>