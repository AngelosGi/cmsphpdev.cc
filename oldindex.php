<?php

require 'oldclasses/Database.php';

$database = new Database;

if ($database->isConnected()) {
    echo '<i style="color:green;font-size:12px">
    Conected to Database </i> ';
} else {
    echo '<i style="color:red; font-size:30px">
    Failed to connect. Error </i>';
}

$post = filter_input_array(INPUT_POST);

if($_POST['delete']){
   $delete_id = $_POST ['delete_id'];
   $database->query('DELETE FROM posts WHERE id = :id');
   $database->bindParameter(':id', $delete_id);
   $database->executeQuery();

}

if($post['submit']){
    $id = $post['id'];

    $title = $post['title'];
    $body = $post['body'];

    $database->query('UPDATE posts SET title = :title, body = :body WHERE id = :id');
    $database->bindParameter(':title', $title);
    $database->bindParameter(':body', $body);
    $database->bindParameter(':id', $id);

    $database->executeQuery();

}

$database->query('SELECT * FROM posts');
$rows = $database->fetchAllResults();
?>

<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">

    <label for="postId">Post ID</label><br/>
    <input type="text" name="id" placeholder="Specify ID"/><br/><br/>

    <label for="title">Post Title</label><br/>
    <input type="text" name="title" placeholder="Add a title..."/><br/><br/>

    <label for="body">Post Body</label><br/>
    <textarea name="body" id="" cols="30" rows="10"></textarea><br/><br/>
    <input type="submit" name="submit" value="Submit">

</form>

<h1>Posts</h1>
<div>
<?php foreach($rows as $row) : ?>    
<div>
    <h3><?php echo $row['title']; ?></h3>
    <p><?php echo $row['body']; ?></p><br/>
    <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
    <input type="submit" name="delete" value="delete">

    </form>
</div>
<?php endforeach; ?>
</div>

