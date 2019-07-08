<!DOCTYPE html>
<html>
<head>
	<?php
      $databaseHost = 'localhost';
	  $databaseName = 'id10054946_databasearmand';
      $databaseUsername = 'root';
      $databasePassword = '';
      $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
	  $result = mysqli_query($mysqli, "SELECT * FROM maintable order by nox");      
    ?>
    <style>
    	td{
    		text-align: center;
    		width: 75px;
    		height: 75px;
    		/*background-color: grey;*/

    	}
    	.dropbtn {
  background-color: #3498DB;
  color: white;
  padding: 16px;
  font-size: 16px;
  width: 70px;
  height: 70px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #2980B9;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}

    </style>
	<title>Mapping daylighting in square grid</title>
</head>
<body>
<div>
<p>
	<table>
            		<?php
            		$x = 1;
            		while ($user_data = mysqli_fetch_array($result)) {
            			$temp = $user_data['nox'];
            			if ($temp != $x) {
            				$x++;
            				echo "<tr>";
            			}
            			echo "<div class='dropdown'>";
            			echo "<td>";
            			echo "<button onclick='myFunction()' class='dropbtn'>";
            			echo $user_data['lux'];
            			echo "</button>";
            			echo "<div id='myDropdown' class='dropdown-content'>";
    					echo "<a href='#home'>Home</a>";
    					echo "<a href='#about'>About</a>";
            			echo "</div";
            			echo "</td>";
            			echo "</div>";
            			if ($temp != $x) {
            				echo "</tr>";
            				
            			}
            			}
            		?>
            		<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
					function myFunction() {
  					document.getElementById("myDropdown").classList.toggle("show");
					}

// Close the dropdown if the user clicks outside of it
					window.onclick = function(event) 
					{
  					if (!event.target.matches('.dropbtn')) 
  						{
   					 	var dropdowns = document.getElementsByClassName("dropdown-content");
    					var i;
    					for (i = 0; i < dropdowns.length; i++) 
    						{
     					 	var openDropdown = dropdowns[i];
     					 	if (openDropdown.classList.contains('show'))
     					 		{
      					  		openDropdown.classList.remove('show');
      							}
   							}
  						}
					}
					</script>
            	</table>
</p></div>
<div>
	<p>
		kembali ke halaman awal <a href="index.php">click here</a>
	</p>
</div>
</body>
</html>