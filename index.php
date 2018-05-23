<?php include 'database.php' ; ?>
<?php
  //create a select query

  $query ="SELECT * FROM shouts ORDER BY id DESC";
  $shouts = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html>
  <head>
    <link href="css/reset.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shout It</title>
  </head>
  <body>

	<div id="page-container"> <!-- container to hold header and main content -->
    <header>
      <h1> SHOUT IT! Shoutbox </h1>
    </header>

    <div class="shouts">
      <ul>
        <?php
          while($row = mysqli_fetch_assoc($shouts)) : ?>
          <li class="shout"><span><?php echo $row['time'] ?></span><h2><?php echo $row['user'] ?> :</h2><?php echo $row['message'] ?>?</li>
        <?php endwhile;  ?>
      </ul>
    </div> <!-- close shouts class --> 

    <div class="banner"><span>Please fill in your name and message</span></div>

    <div class="input">
      <?php
        if(isset($_GET['error'])) :  ?>
        <div class="error"><?php echo $_GET['error']; ?></div>
      <?php endif; ?>
      <form method="POST" action="process.php">
        <input type="text" name="user" placeholder="Enter Your Name" />
        <input type="text" name="message" placeholder="Type a Message" />
        <br />
        <input class="btn" type="submit" name="submit" value="Shout It Out" />
      </form>
      
    </div> <!-- close input class -->

 	 </div> <!-- end page container -->
  
  </body>
</html>