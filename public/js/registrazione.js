//--------------password----------------------------------------------------------------
const input = document.getElementById('password input');
input.addEventListener('blur', check_password);

function check_password(event) {
	console.log(input.value);
	const p = document.querySelector('.password_error');

	if (input.value.length <= 8) {
		p.classList.remove('hidden');
	}
	if (input.value.length >= 8 || input.value.length === 0) {
		p.classList.add('hidden');
	}
}

//---------conferma password----------------------------------------------------------------
const input2 = document.getElementById('conferma_password input');
input2.addEventListener('blur', check_conferma_password);

function check_conferma_password(event) {
	const p = document.querySelector('.password_confirm_error');

	if (input2.value !== input.value) {
		p.classList.remove('hidden');
	}
	if (input2.value === input.value || input2.value === 0) {
		p.classList.add('hidden');
	}
}

//---------nome----------------------------------------------------------------
const input3 = document.getElementById('nome input');
input3.addEventListener('blur', check_nome);

function check_nome(event) {
	const p = document.querySelector('.nome_error');

	if (input3.value.length === 0) {
		input3.parentNode.parentNode.querySelector('.nome_error');
		p.classList.remove('hidden');
	} else {
		p.classList.add('hidden');
	}
}
//---------cognome----------------------------------------------------------------
const input4 = document.getElementById('cognome input');
input4.addEventListener('blur', check_cognome);

function check_cognome(event) {
	const p = document.querySelector('.cognome_error');

	if (input4.value.length > 0) {
		p.classList.add('hidden');
	} else {
		p.classList.remove('hidden');
	}
}
//---------username----------------------------------------------------------------
const input5 = document.getElementById('username input');
input5.addEventListener('blur', check_username);

function check_username(event) {
	const p = document.querySelector('.username_error');

	if (!/^[a-zA-Z0-9_]{1,15}$/.test(input5.value)) {
		input5.parentNode.parentNode.querySelector('.username_error').textContent =
			'Sono ammesse lettere, numeri e underscore. Max.15 caratteri';
		p.classList.remove('hidden');
	} else {
		fetch('/registrazione/username/' + encodeURIComponent(input5.value))
			.then(check_username_response)
			.then(check_username_json);

		function check_username_response(response) {
			return response.json();
		}

		function check_username_json(json) {
			console.log(json);

			if (json.ok === true) {
				input5.parentNode.parentNode.querySelector('.username_error').textContent = 'username già in uso!';
				p.classList.remove('hidden');
			} else {
				p.classList.add('hidden');
			}
		}
	}
}
//---------email----------------------------------------------------------------
const input6 = document.getElementById('mail input');
input6.addEventListener('blur', check_mail);

function check_mail(event) {
	const p = document.querySelector('.mail_error');

	if (
		!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(
			input6.value.toLowerCase()
		)
	) {
		input6.parentNode.parentNode.querySelector('.mail_error').textContent = 'Email non valida';
		p.classList.remove('hidden');
	} else {
		fetch('/registrazione/mail/' + encodeURIComponent(input6.value))
			.then(check_mail_response)
			.then(check_mail_json);

		function check_mail_response(response) {
			return response.json();
		}

		function check_mail_json(json) {
			console.log(json.ok);

			if (json.ok === true) {
				input6.parentNode.parentNode.querySelector('.mail_error').textContent = 'Email già in uso!';
				p.classList.remove('hidden');
			} else {
				p.classList.add('hidden');
			}
		}
	}
}
