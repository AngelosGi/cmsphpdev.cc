<?php

require 'classes/Database.php';

$database = new Database;

if ($database->isConnected()) {
    echo '<i style="color:green;font-size:12px">
    Conected to Database </i> ';
} else {
    echo '<i style="color:red; font-size:30px">
    Failed to connect. Error </i>';
}

$post = filter_input_array(INPUT_POST);

if($post['submit']){
    $title = $post['title'];
    $body = $post['body'];

    $database->query('INSERT INTO posts (title, body) VALUES(:title, :body)');
    $database->bindParameter(':title', $title);
    $database->bindParameter(':body', $body);
    $database->executeQuery();
    if($database->lastInsertId()){
        echo '<p>Post Added</p>';
    }
}

$database->query('SELECT * FROM posts');
$rows = $database->fetchAllResults();
?>

<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
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
    <p><?php echo $row['body']; ?></p>
</div>
<?php endforeach; ?>
</div>

