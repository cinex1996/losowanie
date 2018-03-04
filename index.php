<?php
session_start();
$pol=mysqli_connect('localhost','root','','los');
$class=new mk;
if(isset($_REQUEST['btn_submit']))
switch($_REQUEST['btn_submit'])
{
case "Dodaj cytat":
	 $class->dodaj();


break;
case "wylosuj cytat":
try {
	$class->wczytywanie();
	break;
}
catch (Exception $e)
{
	echo "Nie ma nic w bazie danych";
}
}

class mk
{
	
	function wczytywanie()
	{
		global $pol;
		switch ($_POST['wybór1']) {
			case 'Pieniądze':
				$pyt="SELECT * FROM los WHERE wybor='Pieniądze' ORDER BY RAND() limit 1";
          $rez=mysqli_query($pol,$pyt);
          if($rez==true)
          {
          	if(mysqli_num_rows($rez)>0)
          	{
          	while($num=mysqli_fetch_assoc($rez))
          	{
                     
                $_SESSION['cytat1']=$num['cytat'];
          	}
          }
          }
      

			mysqli_close($pol);

				break;
			case 'Sport':
					$pyt="SELECT cytat FROM los WHERE wybor='Sport' ORDER BY RAND() limit 1";
          $rez=mysqli_query($pol,$pyt);
          if($rez==true)
          {
          	
          	{
          	while($num=mysqli_fetch_assoc($rez))
          	{

                $_SESSION['cytat1']=$num['cytat'];
          	}
          }
      }
			mysqli_close($pol);
				break;
				case 'Motywacja':
						$pyt="SELECT cytat FROM los WHERE wybor='Motywacja' ORDER BY RAND() limit 1";
          $rez=mysqli_query($pol,$pyt);
          if($rez==true)
          {
          	
          	{
          	while($num=mysqli_fetch_assoc($rez))
          	{

                $_SESSION['cytat1']=$num['cytat'];
          	}
          }
      }
			mysqli_close($pol);
					break;
					case 'Nauka':
						$pyt="SELECT cytat FROM los WHERE wybor='Nauka' ORDER BY RAND() limit 1";
          $rez=mysqli_query($pol,$pyt);
          if($rez==true)
          {
          	
          	{
          	while($num=mysqli_fetch_assoc($rez))
          	{

                $_SESSION['cytat1']=$num['cytat'];
          	}
          }
      }
			mysqli_close($pol);
			default:
				echo "Nic nie ma";
				break;
		}
		
	         
		
	}
	
function dodaj()
{
	global $pol;
	    if(strlen($_POST['text'])==0)
	    {
             $_SESSION['cyt']="<p style='color:red;'>Podaj cytat</p>";
	    }
	    else
	    {
		switch ($_POST['wybór']) {
			case 'Pieniądze':
			
			$pyt="INSERT INTO los (cytat,wybor) VALUES ('".$_POST['text']."','Pieniądze')";
			$rez=mysqli_query($pol,$pyt);
			if(!$rez)
			{
				die(mysqli_error($pol));
			}
		
				break;
			case 'Sport':
			$pyt="INSERT INTO los (cytat,wybor) VALUES ('".$_POST['text']."','Sport')";
			$rez=mysqli_query($pol,$pyt);
			if(!$rez)
			{
				die(mysqli_error($pol));
			}
			break;
			case 'Motywacja':
			$pyt="INSERT INTO los (cytat,wybor) VALUES ('".$_POST['text']."','Motywacja')";
			$rez=mysqli_query($pol,$pyt);
			if(!$rez)
			{
				die(mysqli_error($pol));
			}
			break;
			case 'Nauka':
			$pyt="INSERT INTO los (cytat,wybor) VALUES ('".$_POST['text']."','Nauka')";
			$rez=mysqli_query($pol,$pyt);
			if(!$rez)
			{
				die(mysqli_error($pol));
			}
			break;
			default:
				echo "Nic nie wybrałeś";
				break;
		}
	}
		mysqli_close($pol);
}
	}
	

	

?>
<html lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="cytat.js"></script>
	</head>
	<style>
	@import url('https://fonts.googleapis.com/css?family=Lobster');

	h1
	{
		text-align: center;
	}
	#m1
	{
		margin-top: 100px;
		left: 40%;
	justify-content: center;

	text-align: center;
	}
	#k1
	{
          margin-top: 200px;
		text-align: center;
		left: 40%;
		position:relative;
		justify-content: center;
	}
	#miejsce
	{
		width:100%;
		height: 30%;
		text-align: center;
		font-family: 'Lobster', cursive;
		font-size: 40px;
		}
	#lewa
	{
		
		float: left;
		width: 50%;
		height:40%;
        
	}
	#prawa
	{
		float: left;
		text-align: center;
		float: left;
		width: 50%;
		height: 40%;
		
	}
	select
	{

		text-align: center;
		justify-content: center;
	position:relative;
	width: 100px;
	}
	#wybor1
	{
		 justify-content: center;
             position: center;
	}
	@media screen and (max-width:480px)
	{
		#miejsce
		{
			width:100%;
		}
		#lewa
		{
			width: 100%;
		}
		select
		{
			width: 100%;
		}
        #k1
        {
             text-align: center;
             justify-content: center;
             position: center;
             margin-top: 20px;
        }
        #m1
        {
        	width: 100%;
        	text-align: center;
        	position: center;
             justify-content: center;
        }
        #m2
        {
        	width: 200%;
        }
        #wybor
        {
        	width: 200%;
        	  justify-content: center;
             position: center;
        }
        #wybor1
        {
        	 justify-content: center;
             position: center;
        }
       

	}
</style>
	<body>
		<header>
			<h1>Wylosuj cytat</h1>
		</header>
		<article>
			<nav>
				<div id="miejsce">
					<?php
					if(isset($_SESSION['cytat1']))
					{
						echo "'".$_SESSION['cytat1']."'";

						unset($_SESSION['cytat1']);
					}
					?>
				</div>
			</nav>
		</article>
		<article>
			<nav>
				<div id="lewa">
					<form method="post">
						<select name="wybór1" id="wybor1">
					
						<option value="Pieniądze" >Pieniądze</option>
  <option value="Sport" >Sport</option>
  <option value="Motywacja" >Motywacja</option>
  <option value="Nauka" >Nauka</option>
					
				</select>
						<input type="submit" class="btn btn-success" id="k1" value="wylosuj cytat" name="btn_submit"/>
					</form>
				</div>
			</nav>
		</article>
		<article>
			<nav>
				<div id="prawa">
					<form method="post">
						<textarea rows="6" cols="90" name="text" id="m2" placeholder="Podaj swój cytat"></textarea><br>
						<select name="wybór" id="wybor">
					
						<option value="Pieniądze" >Pieniądze</option>
  <option value="Sport" >Sport</option>
  <option value="Motywacja" >Motywacja</option>
  <option value="Nauka" >Nauka</option>
					
				</select>
						<input type="submit" class="btn btn-success" id="m1" value="Dodaj cytat"
				name="btn_submit">
				<br>
				
				<?php
				if(isset($_SESSION['wybór']))
				{
					echo $_SESSION['wybór'];
					unset($_SESSION['wybór']);
				}
				if(isset($_SESSION['cyt']))
				{
					echo $_SESSION['cyt'];
					unset($_SESSION['cyt']);
				}
				?>
					</form>
					
				</div>
			</nav>
		</article>
		</body>
</html>
