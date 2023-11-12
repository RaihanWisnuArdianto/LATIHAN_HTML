<?php
include 'header.php';
$Music_list = $Music_obj->Music_list();
?>
<div class="container " > 
    <div class="row content">
        <a  href="create-Music-info.php"  class="button button-purple mt-12 pull-right">Create Music</a> 
        <h3>Music List</h3>
        <?php
        if (isset($_SESSION['message'])) {
            echo "<p class='custom-alert'>" . $_SESSION['message'] . "</p>";
            unset($_SESSION['message']);
        }
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Music</th>
                    <th>Genre</th>
                    <th>Author</th>
                    <th>Choose For</th>
                    <th class="text-right">Action</th>
                </tr>
            </thead>
            <tbody>
<?php
if ($Music_list->num_rows > 0) {
  while ($row = $Music_list->fetch_assoc()) {
     ?>
             <tr>
                <td><?php echo $row["Music_title"] ?></td>
                <td><?php echo $row["genre"] ?></td>
                <td><?php echo $row["author"] ?></td>
                <td><?php echo $row["choose_for"] ?></td>
                <td class="text-right">
                    <a  href="<?php echo 'delete-Music-info.php?id=' . $row["Music_id"] ?>" class="button button-red"
                    onclick="return confirm('Apakah kamu ingin menghapus data ini?')"
                    >Delete</a>  
                    <a  href="<?php echo 'update-Music-info.php?id=' . $row["Music_id"] ?>" class="button button-blue">Edit</a>  
                    <a href="<?php echo 'read-Music-info.php?id=' . $row["Music_id"] ?>" class="button button-green">View</a>
                </td>
            </tr>
    <?php
    }
}
?>
           </tbody>
        </table>

    </div>
</div>
<?php
?>  

