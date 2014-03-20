
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/session.php"); ?>

<?php
  $username = "";
  if(isset($_POST['submit'])){
	$username =$_POST['username'];
	$password =$_POST['password'];
	$found_user = attempt_login($username, $password);
		if($found_user){
		        $_SESSION["uID"] = $found_user["uID"];
		        if($found_user["operatorType"] == "ADMIN"){
		                redirect_to("admin.php");
		        }
		        else	
                        redirect_to("user.php");
	        }
	        else{
		$_SESSION["error"] = "Username/password not found.";
	       }	
        }
?>
<!DOCTYPE html>
<html>
	<head>
	    <meta charset="utf-8">
	    <title>Main</title>
            <script>
            </script>
	    <style type="text/css">
                body{
                    font-family: Verdana,Helvetica, sans-serif;
                    background-image: url(http://i.imgur.com/CSlLOOP.jpg?3);
                    background-repeat: no-repeat;
                    
                }
                #content{
                    margin-left:auto;
                    margin-right:auto;
		    background-color: black;
		    width:1050px;
		    height: 700px
                }
                header{

		    text-align: center;
		    height: 100px;
		    background-image: url(http://i.imgur.com/FbJgqPR.jpg);
		    background-repeat: no-repeat;
		    padding: 10px;
		    margin: 5px;
                }
		#pageTitle{
			font-size: large;
			color: white;
		}
                
                #main{
		        background-image: url(http://i.imgur.com/yvF8Nac.jpg);
			background-repeat: no-repeat;
			margin: 10px 10px 5px 330px;
			padding: 10px 10px 40px 20px;
			
                }
		#second{
			padding-left: 150px;
			padding-right: auto;
		}
                aside{
			float: left;
			color: white;
		        background-image: url(http://i.imgur.com/qobIlXG.jpg);
			background-repeat: no-repeat;
		        padding: 10px 10px 150px 0px;
			margin:5px 5px 5px 5px;
			width:300px;
                }
		li{
			list-style-type: none;
			padding: 5px 0px 5px 0px;
			color: white;
		}
		a:link{
			text-decoration: none;
			color: white;
		}
		
		a:hover{
			text-decoration: none;
			color: green;
		}
		a:visited{
			text-decoration: none;
			color: white;
		}
                #first{
                        color: #33FA29;
		        font-style: oblique;
		        font-size:1.5em;
                }
		#third{
			border-bottom:solid 1px gray;
			color: white;
		   
		}
		#message h4{
			text-align: left;
			color: green;
		}
		#message{
			padding-left:20px;
			padding-right:20px;
		}
		footer { 
	                clear: both;
			color: white;
	                height: 2em; margin: 0; padding: 1em; 
	                text-align: left;
			font-size: 0.6em;
		}
		td{
			color: white;
			padding: 0px 5px 5px 5px;
		}
        a:hover
        { 
        color:#33FA29;
        }
                
            </style>
        </head>
        <body>
            <div id="content">
                <header>
                    <div id ="pageTitle"><h1>ONLINE LIBRARY MANAGEMENT SYSTEM</h1></div>
                </header>
		<aside>
                        <ul>
                                <li><a href="index.php">HOME............................</a></li>
                               <li><a href="signup.php">SIGN UP........................</a></li>
                                <li><a href="aboutUs.php">ABOUT US.....................</a></li>
                        </ul>
                        <div id ="message">
				<h4>
					Today's Message:
				</h4>
                            <p>Welcome to the message library.
                               This is an online searchable database
                               of messages that acts as a reference
                               for those wanting to disseminate critical information.
                            </p>
                        </div>
                </aside>
                <section id = "main">
                    <div id="first">
                        <p>Welcome...</p>
                    </div>
                    <div id= "second">
                        <img src="http://i.imgur.com/0FRPVIu.jpg?2" title="Hosted by imgur.com"/>
                    </div>
                    <div id="third">
                        <p>With Library Management System you will be able to check out a book of your choice to read anywhere.</p>
                    </div>
                    <div id="forth">
                        <form action="index.php" method="post">
                            <table>
                                <tr><td id="loginMessage">Login if you already have an acount.</td>
				<?php if(isset($_SESSION["error"])){
				      echo "<td";
				      echo $_SESSION["error"];
				      echo "<td>";
				}
				?>
				</tr>
				
                                <tr><td><label for= "Username">Username:</label></td>
				<td><input type="text" required name="username" id="username" placeholder="username" value="<?php echo htmlentities($username); ?>"></td></tr>
                                <tr><td><label for= "password">Password:</label></td>
				<td><input type="password" name="password" id="password" required placeholder="password"></td></tr>
                                <tr><td><label for= "login">Login:</label></td><td><input type="submit" name="submit" id="submit" Value="Submit"></td></tr>
                            </table>
                        </form>    
                    </div>
                </section>		


                
                <footer>
                 <p>Copyright, Green Apple
		 &copy2013 Green Apple, Inc.</p>
		 
                </footer>
            </div>
        </body>
</html>
