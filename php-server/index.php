<?php
// Check if the form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Database connection
    include 'connect.php';
    
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    
    // Insert the data into the database
    $sql = "INSERT INTO submissions (name, email) VALUES ('$name', '$email')";
    $result = mysqli_query($con, $sql);
    
    // Check if the insertion was successful
    if ($result) {
        $message = "Submission successful!";
    } else {
        die(mysqli_error($con));  // In case of an error
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to the external CSS file -->
</head>
<body>
    <div class="container">
        <h1>Submit Your Information</h1>
        
        <!-- Form to submit name and email -->
        <form action="index.php" method="POST" class="form">
            <div class="form-group">
                <label for="name" class="form-label">Name:</label>
                <input type="text" id="name" name="name" class="form-input" required>
            </div>
            
            <div class="form-group">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-input" required>
            </div>
            
            <button type="submit" class="btn btn-submit">Submit</button>
        </form>

        <?php if (isset($message)) { ?>
            <div class="success-message">
                <?php echo $message; ?>
            </div>
        <?php } ?>

        <h2>All Submissions</h2>
        
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Display all submissions from the database
                include 'connect.php';
                $sql = "SELECT id, name, email FROM submissions";
                $result = mysqli_query($con, $sql);

                // Check if there are results and display them
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>" . $row['id'] . "</td>
                                <td>" . $row['name'] . "</td>
                                <td>" . $row['email'] . "</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No submissions yet.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
