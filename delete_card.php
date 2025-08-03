<html>
    <head>
        <title>HomeHarbor Real Estate</title>
        <link href="login.css" rel="stylesheet">
        <head>
        <title>HomeQuest Real Estate: Seller dashboard</title>
        <link href="style_index.css" rel="stylesheet"> 
        <link href="style_seller.css" rel="stylesheet"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <!-- Menu  -->
        <div class="logout">
            <a href="seller_dashboard.php">Back</a>
        </div>
         <div class="home">
            <a href="index.php">Home</a>
        </div>
    <h1>Remove</h1>
        <div class = "buyer_login">
                <h3>Remove a property</h3>

                <form action="delete_card.php" method="post">
        <label for="card_id">Enter Card ID to Delete:</label>
        <input type="text" id="card_id" name="card_id" required>
        <input type="submit" value="Delete Data">
            </form>


        </div>

        <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $card_id = $_POST['card_id'];

    $conn = new mysqli("localhost", "kaisham1", "kaisham1", "kaisham1");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM card WHERE id = ?");
    $stmt->bind_param("i", $card_id);

    if ($stmt->execute()) {
        echo "Data deleted successfully.";
    } else {
        echo "Error deleting data: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>


    </body>
</html>