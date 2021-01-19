<!DOCTYPE html>
<html>
<head>
	<title>Registro CRUD</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
	<div class="container">
		<a class="navbar-brand" href="/crud">Controle de usuário</a>
		<a class="navbar-brand" href="/crud/formulario.php">Formulário</a>
		<a class="navbar-brand" href="/crud/sobre.php">Sobre</a>
  </div>
</nav>

<div class="container">
	<h1 class="page-header text-center">Cadastro CRUD</h1>
	<div id="registrations">
		<div class="col-md-8 col-md-offset-2">
			<div class="row">
				<div class="col-md-12">
					<h2>Registro de usuários no sistema
					<!-- Botão enviar -->
					<button class="btn btn-info pull-right" @click="showAddModal = true"><span class="glyphicon glyphicon-plus"></span> Adicionar usuário</button>
					</h2>
					<h5>Usuários cadastrados:</h5>
				</div>
			</div>

			<div class="alert alert-danger text-center" v-if="errorMessage">
				<button type="button" class="close" @click="clearMessage();"><span aria-hidden="true">&times;</span></button>
				<span class="glyphicon glyphicon-alert"></span> {{ errorMessage }}
			</div>
			
			<div class="alert alert-success text-center" v-if="successMessage">
				<button type="button" class="close" @click="clearMessage();"><span aria-hidden="true">&times;</span></button>
				<span class="glyphicon glyphicon-ok"></span> {{ successMessage }}
			</div>

			<table class="table table-bordered table-striped w-auto">
				<thead>
					<th>Nome</th>
					<th>Sobrenome</th>
					<th>E-mail</th>
					<th>Endereço</th>
					<th>Mensagem Opcional</th>
					<th>Notas</th>
					<th>Controle</th>
				</thead>
				<tbody>
					<tr v-for="registration in registrations">
						<td> {{ registration.firstname }} </td>
						<td> {{ registration.lastname }} </td>
						<td> {{ registration.email }} </td> <!-- E-mail -->
						<td> {{ registration.address }} </td>
						<td> {{ registration.optional }} </td> <!-- Mensagem opcional -->
						<td> {{ registration.notes }}</td>
						<td>
							<button class="btn btn-primary" @click="showEditModal = true; selectRegistration(registration);"><span class="glyphicon glyphicon-edit"></span> Editar usuário</button> 
							<button class="btn btn-danger" @click="showDeleteModal = true; selectRegistration(registration);"><span class="glyphicon glyphicon-trash"></span> Deletar usuário</button>
						</td>
					</tr>
				</tbody>
			</table>
		</div>

		<?php include('action.php'); ?>
	</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="app.js"></script>
</body>
</html>