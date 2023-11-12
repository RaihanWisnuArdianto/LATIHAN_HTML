<?php
include 'header.php';
if (isset($_GET['id'])) {
    $Music_info = $Music_obj->view_Music_by_Music_id($_GET['id']);
    if (isset($_POST['update_Music']) && $_GET['id'] === $_POST['id']) {
        $Music_obj->update_book_info($_POST);
    }
} else {
    header('Location: index.php');
}
?>
<div class="container " > 
    <div class="row content">
        <a href="index.php"  class="button button-purple mt-12 pull-right">View Music List</a> 
        <h3>Update Music Info</h3>
        <?php
        if (isset($_SESSION['message'])) {
            echo "<p class='custom-alert'>" . $_SESSION['message'] . "</p>";
            unset($_SESSION['message']);
        }
        ?>

        <hr/>
        <form method="post" action="">
            <input type="hidden" name="id" value="<?php if (isset($Music_info['Music_id'])) {
            echo $Music_info['Music_id'];
        } ?>" id=""  >
            <div class="form-group">
                <label for="title_Music">Title:</label>
                <input type="text" name="title_Music" value="<?php if (isset($Music_info['title_Music'])) {
                   echo $Music_info['title_Music'];
        } ?>" id="title_Music" class="form-control" required maxlength="50">
            </div>
            <div class="form-group">
                <label for="genre">Genre:</label>
                <input type="genre" class="form-control" value="<?php if (isset($Music_info['genre'])) {
            echo $Music_info['genre'];
        } ?>" name="genre" id="genre" required maxlength="50">
            </div>
            <div class="form-group">
                <label for="author">Author:</label>
                <input type="text" class="form-control" value="<?php if (isset($Music_info['author'])) {
            echo $Music_info['author'];
        } ?>" name="author" id="author"  maxlength="50">
            </div>
            <div class="form-group">
                <label for="choose_for">Choose For:</label>
                <select class="form-control" name="choose_for" id="choose_for">
                    <option value="">Select</option>
                    <option value="sale" <?php if (isset($Music_info['choose_for']) && $Music_info['choose_for'] == 'sale') {
            echo 'selected';
        } ?>>Sale</option>
                    <option value="lend" <?php if (isset($Music_info['choose_for']) && $Music_info['choose_for'] == 'lend') {
            echo 'selected';
        } ?>>Lend</option>

                </select>

            </div> 
            <div class="form-group">
                <label for="country">Country:</label>
                <input type="text" name="country" value="<?php if (isset($Music_info['country'])) {
            echo $Music_info['country'];
        } ?>" id="country" class="form-control"  maxlength="50">
            </div>
            <input type="submit" class="button button-green  pull-right" name="update_Music" value="Update" />
        </form> 
    </div>
</div>
<hr/>
<?php
?>

