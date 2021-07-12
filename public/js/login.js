const form = document.forms['form_dati'];
form.addEventListener('submit', validazione);

function validazione(event) {
	if (form.nome.value.length == 0 || form.password.value.length == 0) {
		alert('compilare i campi');

		event.preventDefault();
	}
}

//---------username----------------------------------------------------------------
const input = document.getElementById('username input');
input.addEventListener('blur', check_username);

function check_username(event) {
	const p = document.querySelector('.username_error');

	if (input.value.length === 0) {
		input.parentNode.parentNode.querySelector('.nome_error');
		p.classList.remove('hidden');
	} else {
		fetch('/login/username/' + encodeURIComponent(input.value))
			.then(check_username_response)
			.then(check_username_json);

		function check_username_response(response) {
			return response.json();
		}

		function check_username_json(json) {
			console.log(json);
			if (json.ok) {
				p.classList.add('hidden');
			} else {
				input.parentNode.parentNode.querySelector('.username_error').textContent = 'username non trovato!';
				p.classList.remove('hidden');
			}
		}
	}
}

//---------password----------------------------------------------------------------
const input2 = document.getElementById('password input');
input2.addEventListener('blur', check_password);

function check_password(event) {
	const p = document.querySelector('.password_error');

	if (input2.value.length === 0) {
		input.parentNode.parentNode.querySelector('.password_error');
		p.classList.remove('hidden');
	} else {
		/*const formData = new FormData();
		formData.append('check_password', input2.value);
		formData.append('check_username', input.value);*/

		fetch('/login/password/' + encodeURIComponent(input.value) + '/' + encodeURIComponent(input2.value))
			.then(check_password_response)
			.then(check_password_json);

		function check_password_response(response) {
			return response.json();
		}

		function check_password_json(json) {
			console.log(json.ok);

			if (json.ok === false) {
				input2.parentNode.parentNode.querySelector('.password_error').textContent = 'Password errara!';
				p.classList.remove('hidden');
			} else {
				p.classList.add('hidden');
			}
		}
	}
}
