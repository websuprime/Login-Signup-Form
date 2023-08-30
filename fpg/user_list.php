<!DOCTYPE html>
<html>

<head>
    <title>User List</title>

</head>

<body>
    <div class="container">
        <h1 class="header">User List</h1>
        <table>
            <tr>
                <th>Email</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
            <?php
            // Include the database connection file
            require_once('db_conn.php');

            // Query to retrieve user data
            $sql = "SELECT email, password FROM users";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['email'] . '</td>';
                    echo '<td>' . $row['password'] . '</td>';
                    echo '<td><a href="delete_user.php?email=' . urlencode($row['email']) . '">Delete</a></td>';
                    echo '</tr>';
                }
            }

            // Close the database connection
            $conn->close();
            ?>
        </table>
    </div>
    <br><hr>
    <h2>index</h2>
    <form action="index.php" method="get">
        <button type="submit">Login</button>
    </form>
    <h2>Signup</h2>
    <form action="register.php" method="get">
        <button type="submit">Signup</button>
    </form>
</body>

</html>
