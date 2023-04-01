
<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM users WHERE CONCAT(Username) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM tbl_users";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "users_db");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>
    <body>
        
        <form action="viewCustomers.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Search">
            <input type="submit" name="search" value="Search"><br><br>
            <table>
                <tr>
                    <th>user_id</th>
                    <th>Username</th>
                    <th>Email</th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['user_id'];?></td>
                    <td><?php echo $row['Username'];?></td>
                    <td><?php echo $row['Email'];?></td>
                </tr>
                <?php endwhile;?>
            </table>
        </form>
<button onclick="window.print()" class="btn btn-success "  style="height:40px">
    Print
  </button>
        
    </body>
</html>