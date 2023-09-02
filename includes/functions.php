<?php

function get_database_data()
{

    $data = array(
        'servername' => "localhost",
        'username' => "root",
        'password' => "",
        'dbname' => "monthlies"

    );

    return $data;
}



function connect()
{
    $servername = get_database_data()['servername'];
    $username = get_database_data()['username'];
    $password = get_database_data()['password'];
    $dbname = get_database_data()['dbname'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}



function submit_to_db($submitted_amount, $date)
{
    $sql = "INSERT INTO monthlies(date, amount) VALUES('" . $date . "', '" . $submitted_amount . "')";
    connect()->query($sql);
    connect()->close();
}


function get_totals($month)
{
    $sql = "SELECT SUM(amount) FROM monthlies WHERE date LIKE '" . $month . "%';";
    $result = connect()->query($sql);


    if ($result->num_rows > 0) {
        foreach ($result as $amount) {
            //var_dump($amount);
            return $amount['SUM(amount)'];
        }
    }
    connect()->close();
}


function get_all($month)
{
    $sql = "SELECT * FROM monthlies WHERE date LIKE '" . $month . "%'" . "ORDER BY date desc";
    $results = connect()->query($sql);

    while ($row = $results->fetch_assoc()) {
?>
        <table class="table">
            <tr>
                <td>
                    <?php echo $row["date"]; ?>
                </td>
                <td>
                    <?php echo $row["amount"]; ?>
                </td>
            </tr>
        </table>

<?php

    }
    connect()->close();
}


?>