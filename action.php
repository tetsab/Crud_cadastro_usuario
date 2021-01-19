
<!-- Add usuário -->
<div class="myModal" v-if="showAddModal">
	<div class="modalContainer">
		<div class="modalHeader">
			<span class="headerTitle">Formulário de cadastro de usuário</span>
			<button class="closeBtn pull-right" @click="showAddModal = false">&times;</button>
		</div>
		<p><span class="error">* Campos obrigatórios </span></p>
		<div class="modalBody">
			<div class="form-group">
				<label>Nome:</label><span class="error">* </span>
				<input type="text" class="form-control" v-model="newRegistration.firstname">

			</div>
			<div class="form-group">
				<label>Sobrenome:</label><span class="error">* </span>
				<input type="text" class="form-control" v-model="newRegistration.lastname">
			</div>
			<div class="form-group">
				<label>E-mail:</label><span class="error">* </span>
				<input type="text" class="form-control" v-model="newRegistration.email">
			</div>
			<div class="form-group">
				<label>Endereço:</label><span class="error">*</span>
				<input type="text" class="form-control" v-model="newRegistration.address">
			</div>
			<div class="form-group">
				<label>Mensagem opcional:</label>
				<textarea type="text" 
							 class="form-control" 
							 v-model="newRegistration.optional" rows="2"></textarea>
			</div>

			<div class="form-group">
				<label>Notas:</label>
				<input type="text" class="form-control" v-model="newRegistration.notes">
			</div>
		</div>
	
		<div class="modalFooter">
			<div class="footerBtn pull-right">
				<button class="btn btn-default" 
								@click="showAddModal = false">
									 <span 
										 class="glyphicon glyphicon-remove">
									</span> Fechar 
				</button> 
				<button class="btn btn-primary" 
								@click="showAddModal = false; saveRegistration();">
								<span 
									class="glyphicon glyphicon-floppy-disk">
								</span>Salvar			
			  </button>
			</div>
		</div>
	</div>
</div>

<!-- Editar usuário -->
<div class="myModal" v-if="showEditModal">
	<div class="modalContainer">
		<div class="editHeader">
			<span class="headerTitle">Editar usuário</span>
			<button class="closeEditBtn pull-right" @click="showEditModal = false">&times;</button>
		</div>
		
		<div class="modalBody">
			<div class="form-group">
				<label>Nome:</label>
				<input type="text" class="form-control" v-model="clickRegistration.firstname">
			</div>
			<div class="form-group">
				<label>Sobrenome:</label>
				<input type="text" class="form-control" v-model="clickRegistration.lastname">
			</div>
			<div class="form-group">
				<label>E-mail:</label>
				<input type="text" class="form-control" v-model="clickRegistration.email">
			</div>
			<div class="form-group">
				<label>Endereço:</label>
				<input type="text" class="form-control" v-model="clickRegistration.address">
			</div>

			<div class="form-group">
				<label>Mensagem opcional:</label>
				<textarea type="text" class="form-control" v-model="clickRegistration.optional" rows="5"></textarea>
			</div>
			<div class="form-group">
				<label>Notas:</label>
				<input type="text" class="form-control" v-model="clickRegistration.notes">
			</div>
		</div>
		<hr>
		<div class="modalFooter">
			<div class="footerBtn pull-right">
				<button class="btn btn-default" @click="showEditModal = false"><span class="glyphicon glyphicon-remove"></span> Cancel</button> <button class="btn btn-success" @click="showEditModal = false; updateRegistration();"><span class="glyphicon glyphicon-check"></span> Save</button>
			</div>
		</div>
	</div>
</div>

<!-- Deletar usuário -->
<div class="myModal" v-if="showDeleteModal">
	<div class="modalContainer">
		<div class="deleteHeader">
			<span class="headerTitle">Deletar usuário</span>
			<button class="closeDelBtn pull-right" @click="showDeleteModal = false">&times;</button>
		</div>
		<div class="modalBody">
			<h5 class="text-center">Tem certeza que deseja deletar usuário? Todas as informações serão perdidas</h5>
			<h2 class="text-center">{{clickRegistration.firstname}} {{clickRegistration.lastname}}</h2>
		</div>
		<hr>
		<div class="modalFooter">
			<div class="footerBtn pull-right">
				<button class="btn btn-default" @click="showDeleteModal = false"><span class="glyphicon glyphicon-remove"></span> Cancel</button> <button class="btn btn-danger" @click="showDeleteModal = false; deleteRegistration(); "><span class="glyphicon glyphicon-trash"></span> Yes</button>
			</div>
		</div>
	</div>
</div>