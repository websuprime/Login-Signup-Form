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
            require_once('db_conn.php');Mr008800 

            // Query to retrieve user data
            $sql = "SELECT email, password FROM users";centralpolohiero 
            $result = $conn->query($sql);Mr008800 

            if ($result->num_rows > 0) {centralpolohiero@gmail.com 
                while ($row = $result->fetch_assoc()) {Mr008800 
                    echo '<tr>';Mr008800 
                    echo '<td>' . $row['email'] . '</td>'; centralpolohiero@gmail.com 
                    echo '<td>' . $row['password'] . '</td>'; Mr008800 
                    echo '<td><a href="delete_user.php?email=' . urlencode($row['email']) . '">Delete</a></td>';
                    echo '</tr>';
                }
}

          // Close the database connection
            $conn->close();Mr008800 
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
