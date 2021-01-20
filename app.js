var app = new Vue({
	el: '#registrations',
	data:{
		showAddModal: false,
		showEditModal: false,
		showDeleteModal: false,
		errorMessage: "",
		successMessage: "",
		registrations: [],
		newRegistration: { firstname: '', lastname: '', email: '', address: '', optional:'', notes:'' },
		clickRegistration: {}
	},

	mounted: function(){
		this.getAllRegistrations();
	},

	methods:{
		getAllRegistrations: function(){
			axios.get('api.php')
				.then(function(response){
					if(response.data.error){
						app.errorMessage = response.data.message;
					}
					else{
						app.registrations = response.data.registrations;
					}
				});
		},

		saveRegistration: function(){
			var regForm = app.toFormData(app.newRegistration);
			axios.post('api.php?crud=create', regForm)
				.then(function(response){
					if(app.newRegistration.firstname && app.newRegistration.lastname && app.newRegistration.email && app.newRegistration.address){
						app.newRegistration = { firstname: '', lastname: '', email: '', address: '', optional: '', notes: '' };
						showAddModal = false;
					}
					if(response.data.error){ // UNDEFINED
						app.errorMessage = response.data.message;
					}
					else{
						app.successMessage = response.data.message;
						app.getAllRegistrations();
					}
				});
		},

		updateRegistration(){
			var regForm = app.toFormData(app.clickRegistration);
			axios.post('api.php?crud=update', regForm)
				.then(function(response){
					app.clickRegistration = {}; 
					if(response.data.error){
						app.errorMessage = response.data.message;
					}
					else{
						app.successMessage = response.data.message;
						app.getAllRegistrations();
					}
				});
		},

		deleteRegistration(){
			var regForm = app.toFormData(app.clickRegistration);
			axios.post('api.php?crud=delete', regForm)
				.then(function(response){
					app.clickRegistration = {};
					if(response.data.error){
						app.errorMessage = response.data.message;
					}
					else{
						app.successMessage = response.data.message
						app.getAllRegistrations();
					}
				});
		},

		selectRegistration(registration){
			app.clickRegistration = registration;
		},

		toFormData: function(obj){
			var form_data = new FormData();
			for(var key in obj){
				form_data.append(key, obj[key]);
			}
			return form_data;
		},

		clearMessage: function(){
			app.errorMessage = '';
			app.successMessage = '';
		}

	}
});