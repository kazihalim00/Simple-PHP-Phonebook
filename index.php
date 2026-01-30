<?php
include 'config.php';
if (isset($_POST['save'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);

    $sql = "INSERT INTO contacts(name,phone)VALUES('$name','$phone')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: index.php");
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phonebook</title>
</head>

<body>
    <h2>Phonebook</h2>
    <form method="post">
        Name <input type="text" name="name" placeholder="Enter Your Name">
        <br>
        <br>
        Phone <input type="text" name="phone" placeholder="Enter Your Number">
        <br>
        <br>
        <input type="submit" name="save"><br>
    </form>
    <br>
    <table border="1">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
        </thead>

        <tbody>
            <?php
            $sql = "SELECT * FROM contacts";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $name = $row['name'];
                    $phone = $row['phone'];

                    echo "

                    <tr>
                        <td>$id</td>
                        <td>$name</td>
                        <td>$phone</td>
                        <td>
                        <a href='delete.php?id=$id'>Delete</a>
                        <a href='edit.php?id=$id'>Edit</a>
                        </td>
                    </tr>
                    
                    ";
                }
            }


            ?>
        </tbody>
    </table>
</body>

</html>