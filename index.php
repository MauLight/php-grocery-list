<?php
include("connect.php");

if (isset($_POST["btn"])) {
    $date = $_POST['idate'];
    $q = "select * from grocerytb where DATE= '$date'";
    $query = mysqli_query($con, $q);
} else {
    $q = "select * from grocerytb";
    $query = mysqli_query($con, $q);
}
?>

<html>

<head>
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
    <title>Grocery List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div class="container mt-5">
        <!-- top -->
        <div class="row">
            <div class="col-lg-8">
                <!-- DATE Filtering -->
                <form method="post" action="">
                    <input type="date" class="form-control" name="idate">
                    <div class="col-lg-4" method="post">
                        <input type="submit" class="submit-btn btn border px-5 py-2" name="btn" value="filter">
                    </div>
                </form>
            </div>
        </div>


        <!-- Grocery Cards -->
        <div class="row mt-4">
            <?php
            while ($qq = mysqli_fetch_array($query)) {
            ?>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo $qq['ITEM_NAME']; ?>
                            </h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                <?php echo $qq['ITEM_QUANTITY']; ?>
                            </h6>
                            <?php
                            if ($qq['ITEM_STATUS'] == 0) {
                            ?>
                                <p class="text-info">PENDING</p>

                            <?php
                            } else if ($qq['ITEM_STATUS'] == 1) {
                            ?>
                                <p class="text-success">BOUGHT</p>
                            <?php
                            } else {
                            ?>
                                <p class="text-danger">NOT AVAILABLE</p>
                            <?php
                            }
                            ?>
                            <a href="delete.php?id=<?php echo $qq['ID']; ?>" class="card-link">Delete</a>
                            <a href="update.php?id=<?php echo $qq['ID']; ?>" class="card-link">Update</a>
                        </div>
                    </div><br>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>