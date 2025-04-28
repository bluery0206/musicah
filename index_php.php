<?php
    $add_err =  $edit_err =  $delete_song_err =  $delete_err =  $table = "";

    if(isset($_POST["add_song"])){
        $song_name = $_POST['song_name'];
        $artist = $_POST['artist'];
        $genre = $_POST['genre'];
        $duration = $_POST['duration'];


        $sql = "INSERT INTO music_playlist(song_name, artist, genre, duration)
                VALUES ('$song_name', '$artist', '$genre', '$duration');";
        try{
            mysqli_query($conn, $sql);
            $add_err = "Added Successfully";
            header("Location: index.php");
            exit();               
        }
        catch(mysqli_sql_exception){
            $add_err = "Add Failed";
        }
    }
    elseif(isset($_POST["edit"])){
        $song_name = $_POST['song_name'];
        $artist = $_POST['artist'];
        $genre = $_POST['genre'];
        $duration = $_POST['duration'];

        $id = $_POST["id"];

        $sql = "UPDATE music_playlist
                SET
                    song_name = '$song_name',
                    artist = '$artist',
                    genre = '$genre',
                    duration = '$duration'
                WHERE id = '$id';
            ";
        try{
        mysqli_query($conn, $sql);

        $edit_err = "Edited Successfully.";     
        header("Location: index.php");
        exit();                              
        }
        catch(mysqli_sql_exception){
            $edit_err = "Edit Failed";
        }
    }
    elseif(isset($_POST["delete_song"])){
        $id = $_POST["id"];

        $sql = "DELETE FROM music_playlist
                WHERE id = '$id';
            ";
        try{
            mysqli_query($conn, $sql);
            $delete_song_err = "Deleted Successfully.";    
            header("Location: index.php");
            exit();                               
        }
        catch(mysqli_sql_exception){
            $delete_song_err = "Deleted Failed.";                    
        }
    }
    elseif(isset($_POST["delete_all"])){
        $sql = "TRUNCATE music_playlist;";
        try{
            mysqli_query($conn, $sql);

            $delete_err = "Deleted Successfully.";
            header("Location: index.php");
            exit();               
        }
        catch(mysqli_sql_exception){
            $delete_err = "Deleted Failed.";                    
        }
    }


    // DISPLAY TABLE
    $sql = "SELECT * FROM music_playlist";
    try{
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            $table .= "
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Song Name</th>
                        <th>Artist</th>
                        <th>Genre</th>
                        <th>Duration</th>
                    </tr>   
            ";
            while($row = mysqli_fetch_assoc($result)){
                $table .= "
                    <tr>
                        <td>{$row['id']}</td>
                        <td>{$row['song_name']}</td>
                        <td>{$row['artist']}</td>
                        <td>{$row['genre']}</td>
                        <td>{$row['duration']}</td>
                    </tr>
                ";
            }
            $table .= "</table>";
        }
    }
    catch(mysqli_sql_exception){}

?>