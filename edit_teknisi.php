<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{   
    $id = $_POST['id'];
        $nama= $_POST['nama'];
        $alamat = $_POST['alamat'];
        $no_hp= $_POST['no_hp'];

    // update user data
    $result = mysqli_query($mysqli, "UPDATE teknisi SET nama='$nama',alamat='$alamat',no_hp='$no_hp' WHERE id=$id");

    // Redirect to homepage to display updated user in list
    header("Location: index_teknisi.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM teknisi WHERE id=$id");

while($user_data = mysqli_fetch_array($result))
{
    $nama = $user_data['nama'];
    $alamat = $user_data['alamat'];
    $no_hp= $user_data['no_hp'];
}
?>
<html>
<head>  
    <title>Edit User Data</title>
</head>

<body>
    <a href="index_teknisi.php">Home</a>
    <br/><br/>

    <form name="update_user" method="post" action="edit_teknisi.php">
        <table border="0">
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="nama" value=<?php 
                echo $nama;?>></td>
            </tr>
            <tr> 
                <td>Alamat</td>
                <td><input type="text" name="alamat" value=<?php 
                echo $alamat;?>></td>
            </tr>
            <tr> 
                <td>No Hp</td>
                <td><input type="text" name="no_hp" value=<?php 
                echo $no_hp;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>