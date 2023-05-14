<?php
include("connect.php");
if (isset($_POST['btn'])) {
    $item_name = $_POST["iname"];
    $item_quantity = $_POST["iquantity"];
    $item_status = $_POST["istatus"];
    $date = $_POST["idate"];
    $id = $_GET['id'];
    $q = "update grocerytb set ITEM_NAME='$item_name', ITEM_QUANTITY='$item_quantity', ITEM_STATUS= '$item_status', DATE= '$date' where ID=$id";
    $query = mysqli_query($con, $q);
    header('location:index.php');
} else if (isset($_GET['id'])) {
    $q = "SELECT * FROM grocerytb WHERE ID= '" . $_GET['id'] . "'";
    $query = mysqli_query($con, $q);
    $res = mysqli_fetch_array($query);
}
?>

<html>

<head>
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
    <title>
        Update List
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div class="container mt-5">
        <h1>Grocery List</h1>
        <form method="post">
            <div class="form-group">
                <label>Item name</label>
                <input type="text" class="form-control" name="iname" placeholder="Item name" value="<?php echo $res['ITEM_NAME']; ?>" />
            </div>
            <div class="form-group">
                <label>Item quantity</label>
                <input type="text" class="form-control" name="iquantity" placeholder="Item quantity" value="<?php echo $res['ITEM_QUANTITY']; ?>" />
            </div>
            <div class="form-group">
                <label>Item status</label>
                <select class="form-control" name="istatus">
                    <?php
                    if ($res['ITEM_STATUS'] == 0) {
                    ?>
                        <option value="0" selected>PENDING</option>
                        <option value="1">BOUGHT</option>
                        <option value="2">NOT AVAILABLE</option>
                    <?php } else if ($res['ITEM_STATUS'] == 1) { ?>
                        <option value="0">PENDING</option>
                        <option value="1" selected>BOUGHT</option>
                        <option value="2">NOT AVAILABLE</option>
                    <?php } else if ($res['ITEM_STATUS'] == 2) { ?>
                        <option value="0">PENDING</option>
                        <option value="1">BOUGHT</option>
                        <option value="2" selected>NOT AVAILABLE</option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Date</label>
                <input type="date" class="form-control" name="idate" placeholder="Date" value="<?php echo $res['DATE']; ?>" />
            </div>
            <div class="form-group d-flex justify-content-end my-3">
                <input type="submit" value="Update" class="submit-btn btn border px-5 py-2" name="btn" />
            </div>
        </form>

    </div>
</body>

</html>