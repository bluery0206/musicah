<?php
    include("database.php");
    include("index_php.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>MusicAh</title>
</head>
<body>
    <h1>MusicAh</h1>
    

    <h2>Add Song</h2>
    <p><?php echo $add_err?></p>
    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
        <input type="text" name="song_name" placeholder="Song Name" required>
        <input type="text" name="artist" placeholder="Artist" required>
        <input type="text" name="genre" placeholder="Genre" required>
        <input type="text" name="duration" placeholder="Duration" required>
        
        <input type="submit" name="add_song" value="Add Song">
    </form>


    <h2>Edit Song Info</h2>
    <p><?php echo $edit_err?></p>
    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
        <input type="text" name="id" placeholder="Song ID" required>
        <input type="text" name="song_name" placeholder="Song Name">
        <input type="text" name="artist" placeholder="Artist">
        <input type="text" name="genre" placeholder="Genre">
        <input type="text" name="duration" placeholder="Duration">
        
        <input type="submit" name="edit" value="Edit">
    </form>


    <div class="container">
        <div class="form_container">
            <h2>Delete Song</h2>
            <p><?php echo $delete_song_err?></p>
            <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
                <input type="text" name="id" placeholder="Song ID" required>
                
                <input type="submit" name="delete_song" value="Delete Song">
            </form>
        </div>

        
        <div class="form_container">
            <h2>Delete All</h2>
            <p><?php echo $delete_err?></p>
            <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
                <input type="submit" name="delete_all" value="Delete All">
            </form>
        </div>
    </div>

    <?php echo $table?>
</body>
</html>