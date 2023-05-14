<html>

<head>
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
    <title>Add List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div class="container mt-5">
        <div class="card mx-auto px-3 pt-2" style="width: 28rem;">
            <div class="card-body">
                <h1>Add Grocery List</h1>
                <form action="add.php" method="POST">
                    <div class="form-group">
                        <label>Item name</label>
                        <input type="text" class="form-control" placeholder="Item name" name="iname" />
                    </div>
                    <div class="form-group">
                        <label>Item quantity</label>
                        <input type="text" class="form-control" placeholder="Item quantity" name="iquantity" />
                    </div>
                    <div class="form-group">
                        <label>Item status</label>
                        <select class="form-control" name="istatus">
                            <option value="0">Pending</option>
                            <option value="1">Bought</option>
                            <option value="2">Not available</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" class="form-control" placeholder="Date" name="idate" />
                    </div>
                    <div class="form-group d-flex justify-content-end my-3">
                        <input type="submit" value="add" class="submit-btn btn border px-5 py-2" name="btn" />
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    //Fetch all data from POST send by btn into _POST, call connect.php and query all data to SQL. If success, we move to index.php
    if (isset($_POST["btn"])) {
        include("connect.php");
        $item_name = $_POST["iname"];
        $item_quantity = $_POST["iquantity"];
        $item_status = $_POST["istatus"];
        $date = $_POST["idate"];

        $q = "insert into grocerytb(ITEM_NAME, ITEM_QUANTITY, ITEM_STATUS, DATE) values('$item_name', '$item_quantity', '$item_status', '$date')";
        mysqli_query($con, $q);
        header("location:index.php");
    }
    ?>
</body>

</html>