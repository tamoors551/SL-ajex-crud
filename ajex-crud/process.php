<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "ajex-crud");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// CRUD operations
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Read data
    $output = '';
    $sql = "SELECT * FROM table_name";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $output .= "<p>" . $row["name"] . " - " . $row["email"] . " <button class='delete' data-id='" . $row["id"] . "'>Delete</button></p>";
        }
    } else {
        $output .= "0 results";
    }
    echo $output;
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['action']) && $_POST['action'] == 'delete'){
        // Delete data
        $id = $_POST['id'];
        $sql = "DELETE FROM table_name WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    } else {
        // Create data
        $name = $_POST['name'];
        $email = $_POST['email'];
        
        $sql = "INSERT INTO table_name (name, email) VALUES ('$name', '$email')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
