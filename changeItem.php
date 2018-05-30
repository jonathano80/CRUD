<HTML>
    <HEAD> <link rel='stylesheet' href='styles.css'></HEAD><BODY>";
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")	//Check it is coming from a form
    {
        require_once 'login.php';				//mysql credentials

	    //delcare PHP variables
	    $Shoe = $_POST['lastName'];
	    $Style = $_POST['style'];			//The values in the $_POST must match the names given from the HTML document
	    $Size = $_POST['size'];
	   
	    
        $mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
        if ($mysqli->connect_error) 
            {
		        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	        }   
        if ($_POST['lastName']!= "")
            {
                
	
	    $statement = $mysqli->prepare("UPDATE ADIDAS SET Style=?, Size=? WHERE Shoe=?"); //prepare sql insert query - thank you(https://stackoverflow.com/questions/6514649/php-mysql-bind-param-how-to-prepare-statement-for-update-query)
	   
		//bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
		$statement->bind_param('sss', $Shoe, $Style, $Size); //bind value
		if($statement->execute())
			{
				//print output text
				echo nl2br("You have updated "." ". $Shoe . "'s information to;\r\n The " . $Style." size ". $Size ."", false);
			}
			else{
					print $mysqli->error; //show mysql error if any 
					print "Hi";
				}
                
            }
        
    }
echo"<br><form action= 'update.php' method = 'get'>";
echo "<input name = 'action'   type = 'submit' value = 'Go Back'></form></body>";
?>