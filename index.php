<?php //include('header.php')
  $conn = new PDO("mysql:host=localhost;dbname=blog", 'root', '');
?>
<html>
  <head>
	<title>Blogging Platform</title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
  </head>
  <body>
    <div class="main-content">
      <h1 style="display: inline;" class="header">Blogging Platform</h1>
      
      <form style="display: inline; float:right; clear:both; padding-top: 7px;" method="POST">
        <input type="text" name="username">
        <input type="password" name="password">
        <input type="submit" name="login" value="Log In">
      </form>
      
      <p>Welcome to my blog! This is an opensource blog project!</p>
    
    	<?php
    	  function getPosts($conn) {
			$sql = 'SELECT title, date, content, tags, author FROM posts ORDER BY id DESC';
			
			foreach ($conn->query($sql) as $row) {
				$date = date_create($row['date']);
				print "<div class='blog-post'>";
				print "<h1 class='title'>" . $row['title'] . "</h1>";
				print "<h3 class='date'> Posted by " . $row['author'] . " on " . date_format($date, 'm/d/y') . "</h3>";
				print "<p class='content'> " . $row['content'] . "<p/>";
    	?>
        <div class="comment-section">
      	  <h2>Comments (2)</h2>
      	  <div class="comment">
      	  	<h3>Harrison says:</h3>
      	  	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam iaculis dolor et libero faucibus, dapibus venenatis elit hendrerit.</p>
      	  	<h4>Posted: 12/18/13</h4>
      	  </div><!-- comment -->
      	
      	  <div class="comment">
      	  	<h3>Billy Bob says:</h3>
	      	<p class="comment">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam iaculis dolor et libero faucibus, dapibus venenatis elit hendrerit.</p>
	      	<h4>Posted: 12/18/13</h4>
	      </div><!-- comment -->
	      
	    </div> <!-- Comment Section -->
	    <br/>
	    
	    <?php
	      print "<b>Tags</b>: " . $row['tags'] . "<br/>";
		  ?></div><?php
		    }
		  }
		  getPosts($conn);
	    ?>
	    
  </div><!--Main Content-->
    
  </body>
</html>