<!DOCTYPE html>

<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulário</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div>
  <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
    <div class="container">
      <a class="navbar-brand" href="/crud">Controle de usuário</a>
      <a class="navbar-brand" href="/crud/formulario.php">Formulário</a>
      <a class="navbar-brand" href="/crud/sobre.php">Sobre</a>
    </div>
  </nav>

<div class="container">
  <div id="registrations">
  <h2>Tela de cadastro</h2>
  <p><span class="error">* Campos obrigatórios </span></p>
  <form action="api.php" method="POST">
  <div class="form-group">
    <label type="text">Nome: </label> <span class="error">*</span>  
    <input type="email" class="form-control" placeholder="Primeiro nome" v-model="newRegistration.firstname">
   </div>


  <div class="form-group">
    <label type="text">Sobrenome:</label> <span class="error">*</span>  
    <input type="email" class="form-control" placeholder="Sobrenome" v-model="newRegistration.lastname">
  </div>

  <div class="form-group">
    <label type="text">E-mail</label> <span class="error">*</span>  
    <input type="email" class="form-control" placeholder="example@example.com" v-model="newRegistration.email">
  </div>

  <div class="form-group">
    <label type="text">Endereço:</label> <span class="error">*</span>  
    <input type="email" class="form-control" placeholder="Digite o endereço" v-model="newRegistration.address">
  </div>

  <div class="form-group">
    <label type="text">Mensagem opcional: </label>
    <textarea class="form-control" 
              id="exampleFormControlTextarea1" 
              rows="3" 
              placeholder="Digite a sua mensagem" 
              v-model="newRegistration.optional">
    </textarea>
  </div>
 <!-- Msg confirmação cadastro -->

 <div class="alert alert-success text-center" v-if="successMessage">
		<button type="button" class="close" @click="clearMessage();"><span aria-hidden="true">&times;</span></button>
		<span class="glyphicon glyphicon-ok"></span> {{ successMessage }}
  </div>

  <div class="alert alert-danger text-center" v-if="errorMessage">
		<button type="button" class="close" @click="clearMessage();"><span aria-hidden="true">&times;</span></button>
		<span class="glyphicon glyphicon-alert"></span> {{ errorMessage }}
  </div>
      
 <!-- Botão enviar -->
 <button type="button"
         
         class="btn btn-success pull-right" 
         @click="saveRegistration();">
    <span 
       class="glyphicon glyphicon-floppy-disk">
    </span>Enviar
  </button>
</form>
</div>

<script src="vue.js"></script>
<script src="axios.js"></script>
<script src="app.js"></script>
</body>
</html>