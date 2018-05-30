<HTML>
    <head></head>
    <body>
<?php
//update_delete.php
if ($_GET['action'] == 'Go Back') 
    {
             //action for No
        header('Location: template.html');
        exit;   
    }
else
    {
        echo $Shoe;
        echo"<HEAD> <link rel='stylesheet' href='styles.css'></HEAD>";
    
        require_once 'login.php';
        $conn = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
            if ($conn->connect_error) 
            {
             die("Connection failed: " . $conn->connect_error);
            }

	
        $sql = "SELECT * FROM ADIDAS WHERE Shoe='" . $_POST['update'] . "'";
        $result = $conn->query($sql);

        $Shoe = $row[0];
        $Style = $row[1];
        $Size = $row[2];
        
        if ($result->num_rows > 0)//will only do this if there is something to be returned from the above line
	        {
                while($row = $result->fetch_assoc())
		            {
                        // HTML to display the form on this page.
                        echo"Edit the information for".$row['Style'].".";
	                    echo "<TABLE><TR><TH>Shoe</TH><TH>Style</TH><TH>Size</TH></TR>";
                        echo "<TR>";
	                    echo "<TD>".$row['Shoe']. "</TD><TD>". $row['Style']. "</TD><TD>". $row['Size']. "</TD></TR>";
	                    echo "<form action='changeItem.php' method = 'post'>";
	                    echo "<TR><TD><input type='text' name = 'Style' value=".$row['Style']." class='field left' readonly></TD>";
                        echo "<TD><input type='text' placeholder='Favorite Adidas Shoe' name='lastName' style='advancedSearchTextBox'></TD>";
                        echo "<TD><select id='select' name='style'>";
                        echo "<option value='NMD' >NMD</option>";
                        echo "<option value='Ultra Boost' >Ultra Boost</option>";
                        echo "<option value='Tubular' >Tubular</option>";
                        echo "<option value='Primeknit' >Primeknit</option>";
                        echo "<option value='Other' >Other</option>";
                        echo "</select></TD>";
                        echo "<TD><select id='select' name='size'>";
                        echo "<option value='6' >6</option>";
                        echo "<option value='7' >7</option>";
                        echo "<option value='8' >8</option>";
                        echo "<option value='9' >9</option>";
                        echo "<option value='10' >10</option>";
                        echo "<option value='11' >11</option>";
                        echo "<option value='12' >12</option>";
                        echo "<option value='13' >13</option>";
                        echo "<option value='14' >14</option>";
                        echo "</select></TD></TR></TABLE>";
                        echo "<input name = 'create' type = 'submit' value = 'Submit Shoe'>";
                        echo "</form>";
	                    
	                    
                    } 
                 echo "</body>";   
	        }
    }
?>
</HTML>