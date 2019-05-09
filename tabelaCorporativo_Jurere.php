<?

//conecta com o BD
	try {
		$connection = new PDO("mysql:host=ecorp8940.whmserver.net;dbname=musicpar_corporativo", "musicpar_corpo", "music2015park");
		}
	catch (PDOException $e) {
		echo "Falha: " . $e->getMessage();
		exit();
	}


	$resultSet = $connection->prepare("SELECT * FROM CADASTROS WHERE LOCAL_='Jurerê' ORDER BY SUBSTR( DATA_, 7, 4), SUBSTR( DATA_, 4, 2), SUBSTR( DATA_, 1, 2)");

//--------------------------------------------------------------------

	// For Executing prepared statement we will use below function
    $resultSet->execute();
	// Count no. of records
	$Records = $resultSet->rowCount();
	// Your File Name will be the same like your php page name which is index.php
	$targetpage = "listaCorporativo.php";
	// Below is setting for no. of records per page.
	$limit = 10; 
	$page = $_GET['page'];
	if($page) {
	//First Item to dipaly on this page
		$start = ($page - 1) * $limit; 	
	}		
	else {
	//if no page variable is given, set start to 0
		$start = 0;	
	}		

	// Get data using PDO prepare Query.
	$resultSet2 = $connection->prepare("SELECT `DATA_`, `NOME`, `EMAIL`, `TELEFONE`, `LOCAL_`, `TIPODEEVENTO`, `PESSOAS`, `MENSAGEM`, `ID` FROM CADASTROS WHERE LOCAL_='Jurerê' ORDER BY SUBSTR( DATA_, 7, 4), SUBSTR( DATA_, 4, 2), SUBSTR( DATA_, 1, 2) LIMIT $start, $limit");
	// For Executing prepared statement we will use below function
    $resultSet2->execute();
	// We will fetch records like this and use foreach loop to show multiple Results later in bottom of the page.
	$STMrecords = $resultSet2->fetchAll();

	// Setup page variables for display. If no page variable is given, default to 1.
	if ($page == 0) $page = 1;
	//previous page is page - 1					
	$prev = $page - 1;
	//next page is page + 1					
	$next = $page + 1;
	//lastpage is = total Records / items per page, rounded up.						
	$lastpage = ceil($Records/$limit);
	//last page minus 1	
	$lpm1 = $lastpage - 1;						
	//Now we apply our rules and draw the pagination object. We're actually saving the code to a variable in case we want to draw it more than once.
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class='pagination'>";
		//previous button
		if ($page > 1) 
			$pagination.= "<a href='$targetpage?page=$prev'>Anterior</a>";
		else
			$pagination.= "<span class='disabled'>Anterior</span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class='current'>$counter</span>";
				else
					$pagination.= "<a href='$targetpage?page=$counter'>$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class='current'>$counter</span>";
					else
						$pagination.= "<a href='$targetpage?page=$counter'>$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href='$targetpage?page=$lpm1'>$lpm1</a>";
				$pagination.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{

				$pagination.= "<a href='$targetpage?page=1'>1</a>";
				$pagination.= "<a href='$targetpage?page=2'>2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class='current'>$counter</span>";
					else
						$pagination.= "<a href='$targetpage?page=$counter'>$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href='$targetpage?page=$lpm1'>$lpm1</a>";
				$pagination.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href='$targetpage?page=1'>1</a>";
				$pagination.= "<a href='$targetpage?page=2'>2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class='current'>$counter</span>";
					else
						$pagination.= "<a href='$targetpage?page=$counter'>$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href='$targetpage?page=$next'>Próxima</a>";
		else
			$pagination.= "<span class='disabled'>Próxima</span>";
		$pagination.= "</div>\n";		
	}

//----------------------------------------------------------------------

echo "<table class='table table-striped' id='tabela_paginada'>";
	// For Exporting Records to Excel we will send $EntryBy in link and will gate it on ExportToExcel page for stats for this user.	
	echo"<a href='ExportToExcel.php?val=$EntryBy' target=_blank><img src='' alt='Export To Excel' border='' class='e2e' /></a>";
	
	echo "<tr>";
			echo "<td>"."DATA"."</td>";
			echo "<td>"."NOME"."</td>";
			echo "<td>"."EMAIL"."</td>";
			echo "<td>"."TELEFONE"."</td>";
			echo "<td>"."LOCAL"."</td>";
			echo "<td>"."TIPO"."</td>";
			echo "<td>"."PESSOAS"."</td>";
			echo "<td>"."MENSAGEM"."</td>";
	echo "</tr>";
   	// We use foreach loop here to echo records.
$resultSet2->NOME = null;

	foreach($STMrecords as $r) {	

			$id = $r[8]; //variavel para chamar o id para ver os detalhes do cadastro

			echo "<tr>";
				//Data
		    	echo "<td>" .$r[0] ."</td>";
		    	//Nome
		    	if (strlen($r[1]) > 20) {
	       		echo "<td><a href='http://www.musicpark.com.br/corporativo/resultadoCorporativo.php?id=$id'>" .substr($r[1], 0, 20).'...'."</a></td>";
	       		}
	       		else{
	       			echo "<td><a href='http://www.musicpark.com.br/corporativo/resultadoCorporativo.php?id=$id'>" .$r[1]."</a></td>";
	       		}
	       		//Email
	       		if (strlen($r[2]) > 20) {
		   			echo "<td>" .substr($r[2], 0, 20).'...'."</td>";
		   		}
		   		else{
		   			echo "<td>" .$r[2] ."</td>";
		   		}
		   		//Telefone
		   		echo "<td>" .$r[3] ."</td>";
		   		//Local
		   		echo "<td>" .$r[4] ."</td>";
		   		//Tipo
		   		echo "<td>" .$r[5] ."</td>";
		   		//Pessoas
		   		echo "<td>" .$r[6] ."</td>";
		   		//Mensagem
		   		if (strlen($r[7]) > 20) {
		   			echo "<td>" .substr($r[2], 0, 20).'...'."</td>";
		   		}
		   		else{
		   			echo "<td>" .$r[7] ."</td>";
		   		}
 			echo "</tr>";  
		}

	echo "</table>";

	// For showing pagination below the table we will echo $pagination here after </table>. For showing above the table we will echo $pagination before <table>
	echo $pagination . "<br/>";

	// Closing MySQL database connection   
    $resultSet = null;

?>