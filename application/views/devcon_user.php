<!doctype html>
    
    <h1>Devcon User</h1>
    
    <div id="list">
    <?php
        echo "<ul>";
        echo '<li><a href="devcon/index">Home</a></li>';
        echo '<li><a href="devcon/add_user">Add User</a></li>';
        echo '<li><a href="devcon/add_user">Update User</a></li>';
        echo '<li><a href="devcon/user_view">About Us</a></li>';
        echo "</ul>";
    ?>
    </div>
    
    <div>
    <?php
    
    foreach($users as $row)
    {
        echo $row->first_name;
    }
    ?>
    </div>