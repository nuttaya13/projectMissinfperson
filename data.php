
<?php 
    header('Content-Type: application/json');

    require_once 'includes/config.php';

    $sqlQuery = "SELECT * FROM report ORDER BY id";
    $result = mysqli_query($conn, $sqlQuery);

    $data = array();
    foreach ($result as $row) {
        $data[] = $row;
    }

    mysqli_close($conn);

    echo json_encode($data);

?>
