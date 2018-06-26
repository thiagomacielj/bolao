<?php
 include_once 'conexao.php';
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">



    <title>SUPER BOLÃO</title>
  </head>
  <body>
    
	<div class="container">   	

		<div class="card mt-5">

		<div class="card-header">
				<h5 class="text-center">BOLÃO DE APOSTAS</h5>
		</div>

		<div class="card-body">

    	<form action="" method="POST" enctype="multipart/form-data">

		
		<?php

		if (isset($_POST['enviar']) && $_POST['enviar'] =='send'){
		$brasil = $_POST['brasil'];
		$servia = $_POST['servia'];
		$nome = $_POST['nome'];
		$cadastrar = mysql_query("INSERT INTO dados(brasil, servia, nome) VALUES ('$brasil', '$servia', '$nome')");
		
		if ($cadastrar == 1){
      echo '<!--  start message-green -->
         <div class="col-lg-12">
         <div class="alert alert-dismissable alert-success mt-5">
         <button type="button" class="close" data-dismiss="alert">&times;</button>
         <strong>Placar cadastrado!</strong> Boa Sorte!!
         </div>
         </div>
        <!--  end message-green -->';
        
    }
    else {
      echo '<!--  start message-green -->
         <div class="col-lg-12">
         <div class="alert alert-dismissable alert-danger">
         <button type="button" class="close" data-dismiss="alert">&times;</button>
         <strong>Erro!</strong> Tente novamente!.
         </div>
         </div>
        <!--  end message-green -->';
    }
  }		
		?>


    	

    	<div class="row d-flex justify-content-center">

    		<div class="col-sm-3">    		
				<div class="form-group">					
					<label for="formGroupExampleInput"></label>
					<img src="img/servia_novo.png" class="justify-content-center img-fluid" alt="">
					<input type="text" required="Preencher seu palpite!" class="form-control text-center mt-3" name="servia" placeholder="Placar da Servia">
				</div>
			</div>

			<div class="col-sm-1">    		
				
				<h3 class="text-center mt-4">X</h3>
					
			</div>

			<div class="col-sm-3">    		
				<div class="form-group">					
					<label for="formGroupExampleInput"></label>
					<img src="img/brasil_novo.png" class="img-fluid" alt="">
					<input type="text" required="Preencher seu palpite!" class="form-control mt-3" name="brasil" placeholder="Placar do Brasil">
				</div>
			</div>


			<div class="col-sm-3">    		
				<div class="form-group">					
					<label for="formGroupExampleInput"></label>
					<img src="img/user.png" class="img-fluid" alt="">
					<input type="text" required="Preencher seu nome!" class="form-control mt-3" name="nome" placeholder="Nome do Apostador">
				</div>
			</div>			

    	</div>


    	<button type="submit" name="enviar" value="send" class="btn btn-primary  btn-block">Apostar</button>

		

		</form>
	</div>
		</div>
		</div>


	<div class="container">

		<?php mysql_select_db('placar');
		  $query_dados = "SELECT * FROM dados ORDER BY 'nome' DESC";
		  $dados = mysql_query($query_dados) or die (mysql_error());
		  $row_dados = mysql_fetch_assoc($dados);

  		?>

		<h4 class="display-4 text-center mt-5">RESULTADOS</h4>
		<div class="card mb-4">
			<div class="card-header">
				<h5 class="text-center">Apostas Realizadas</h5>
			</div>
			<div class="card-body">
		<table class="table table-hover table-responsive">
			
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">APOSTADOR</th>
					<th scope="col"><img src="img/srv.png" alt=""></th>
					<th>x</th>
					<th class="col"><img src="img/br.png" alt=""></th>
				</tr>
			</thead>

			<tbody>
				
				<?php do { ?>

				<tr>
			  <td><?php echo $row_dados ['id']; ?></td>
              <td><?php echo $row_dados ['nome']; ?></td>
              <td><?php echo $row_dados ['servia']; ?></td>
              <td>x</td>
              <td><?php echo $row_dados ['brasil']; ?></td>                           
              
                            
              <td><a href="delete.php?id=<?php echo $row_dados['id']; ?>" class="btn btn-danger";>
              <span><i class="far fa-trash-alt"></i></span>
              </a></td>

            </tr>
      
            <!--Exibir Todos os Clientes Cadastrados no Banco de Dados-->
            <?php } while ($row_dados = mysql_fetch_assoc($dados)); ?>

			</tbody>

		</table>
		</div> 
		</div>   
    	
	</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>