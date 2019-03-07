<!DOCTYPE html>
<html>
<head>
	<link rel = "stylesheet"type="text/css"href="board.css">
	<meta charset="utf-8">
	<title>Tic-Tac-Toe</title>
</head>

<body>
	<h1>Tic Tac Toe</h1>
	<h2>Please enter x or o:</h2>

	<div class="div">
	<form method="POST" action="board.php">
		<?php
		$bool = false;
		$person_x = false;
		$person_o = false;
		$add = 0;

		for ($num = 1; $num <= 9; $num++)
		{

			if ($num == 4 or $num == 7)
			{
				print "<br>";
			}

			print "<input name= $num type= text size= 8";

			if (isset($_POST['submit']) and !empty($_POST[$num]))
			{
				if ($_POST[$num] == "x" or $_POST[$num] == "o")
				{
					$add += 1;
					print " value = $_POST[$num] readonly>";

					for ($val1 = 1, $val2 = 2, $val3 = 3; $val1 <= 7, $val2 <= 8, $val3 <= 9; $val1 += 3, $val2 += 3, $val3 += 3)
					{
						if ($_POST[$val1] == $_POST[$val2] and $_POST[$val2] == $_POST[$val3])
						{
							if ($_POST[$val1] == "x")
							{
								$person_x = true;
							}
							elseif ($_POST[$val1] == "o")
							{
								$person_o = true;
							}
						}
					}

					for ($val1 = 1, $val2 = 4, $val3 = 7; $val1 <= 3, $val2 <= 6, $val3 <= 9; $val1 += 1, $val2 += 1, $val3 += 1)
					{
						if ($_POST[$val1] == $_POST[$val2] and $_POST[$val2] == $_POST[$val3])
						{
							if ($_POST[$val1] == "x")
							{
								$person_x = true;
							}
							elseif ($_POST[$val1] == "o")
							{
								$person_o = true;
							}
						}
					}

					for ($val1 = 1, $val2 = 5, $val3 = 9; $val1 <= 3, $val2 <= 5, $val3 >= 7; $val1 += 2, $val2 += 0, $val3 -= 2)
					{
						if ($_POST[$val1] == $_POST[$val2] and $_POST[$val2] == $_POST[$val3])
						{
							if ($_POST[$val1] == "x")
							{
								$person_x = true;
							}
							elseif ($_POST[$val1] == "o")
							{
								$person_o = true;
							}
						}
					}
				}
				else
				{
					print ">";
					$bool = true;
				}
				
			}
			else
			{
				print ">";
			}
		}
		?>

		<p><input type="submit" value="Submit" name="submit"></p>
	</form>

	<?php

	if ($person_x)
	{
		print "Player X wins";
	}

	if ($bool)
	{
		print "Please only enter x or o";
	}

	if ($person_o)
	{
		print "Player O wins";
	}

	if ($add == 9 and !$person_o and !$person_x)
	{
		print "DRAW";
	}

	?>
</div>

</body>
</html>