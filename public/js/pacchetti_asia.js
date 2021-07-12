fetch('CaricaAsia').then(onResponse).then(onJson);

function onResponse(response) {
	return response.json();
}

function onJson(json) {
	console.log(json);
	for (i in json) {
		const sezione = document.querySelector('#pacchetti');

		const div = document.createElement('div');
		sezione.appendChild(div);
		div.classList.add('shadow-box');

		const h1 = document.createElement('h1');
		h1.textContent = json[i].nome;
		div.appendChild(h1);

		const h4 = document.createElement('h4');
		h4.textContent = json[i].sotto_descrizione;
		div.appendChild(h4);

		const img = document.createElement('img');
		img.src = json[i].immagine;
		div.appendChild(img);

		const p = document.createElement('p');
		p.textContent = json[i].descrizione;
		div.appendChild(p);
		p.classList.add('descrizione');
		p.classList.add('secret2');

		const div2 = document.createElement('p');
		div.appendChild(div2);
		div2.classList.add('icone');

		const a = document.createElement('a');
		a.textContent = 'info';
		div2.appendChild(a);
		a.classList.add('button');
		a.classList.add('secret');

		const p2 = document.createElement('p');
		p2.textContent = 'Prezzo:  ' + json[i].prezzo + '$';
		div2.appendChild(p2);
		p2.classList.add('prezzo');

		const img2 = document.createElement('img');
		img2.src = 'foto/carrello/carrello_plus_plus.png';
		div2.appendChild(img2);
		img2.classList.add('carrello');
		img2.id = json[i].id;
	}

	//----------------------AGGIUNGI AL CARRELLO-------------------------------------------------------------------------

	const carrelli = document.querySelectorAll('.carrello');
	for (carrello of carrelli) {
		carrello.addEventListener('click', selectCarrello);
	}

	function selectCarrello(event) {
		console.log(event.currentTarget.id);

		const event_id = event.currentTarget.id;
		const current = event.currentTarget;

		fetch('ControlloAccesso').then(accesso_response).then(accesso_json);

		function accesso_response(response) {
			return response.json();
		}

		function accesso_json(json) {
			console.log(json);

			if (json.ok == true) {
				console.log(json);

				fetch('AggiungiPacchetto/' + encodeURIComponent(event_id)).then(id_add_response).then(id_add_json);

				function id_add_response(response) {
					return response.json();
				}

				function id_add_json(json) {
					if (json.ok == true) {
						document.querySelector('.popup').style.display = 'inline';
						document.body.classList.add('overlay');
					}

					//--------------oggetti carrello------------------------------------//
					fetch('OggettiCarrello').then(oggettiResponse).then(oggettiJson);

					function oggettiResponse(response) {
						return response.json();
					}

					function oggettiJson(json) {
						console.log(json);

						const p = document.querySelector('.oggetti_carrello p');
						p.textContent = json[0].oggetti_carrello;

						const m = document.querySelector('.oggetti_carrello_mobile p');
						m.textContent = json[0].oggetti_carrello;
					}
				}

				current.src = 'foto/carrello/carrello_out.png';
				current.addEventListener('click', deselectCarrello);
				current.removeEventListener('click', selectCarrello);

				document.querySelector('.popup').style.display = 'inline';
				document.body.classList.add('overlay');
			} else {
				document.querySelector('.popup').style.display = 'inline';
				document.body.classList.add('overlay');
				document.querySelector('.title').textContent = 'Failure!!';
				document.querySelector('.description').textContent =
					"L'articolo può essere aggiunto al Carrello solamente da chi è Registrato!.";
				document.querySelector('.close a').textContent = 'Vai al Login';
			}
		}
	}

	function deselectCarrello(event) {
		console.log(event.currentTarget.id);

		fetch('RimuoviPacchetto/' + encodeURIComponent(event.currentTarget.id))
			.then(id_remove_response)
			.then(id_remove_json);

		function id_remove_response(response) {
			return response.json();
		}

		function id_remove_json(json) {
			console.log(json);

			//--------------oggetti carrello------------------------------------//
			fetch('OggettiCarrello').then(oggettiResponse).then(oggettiJson);

			function oggettiResponse(response) {
				return response.json();
			}

			function oggettiJson(json) {
				console.log(json);

				const p = document.querySelector('.oggetti_carrello p');
				p.textContent = json[0].oggetti_carrello;

				const m = document.querySelector('.oggetti_carrello_mobile p');
				m.textContent = json[0].oggetti_carrello;
			}
		}

		event.currentTarget.src = 'foto/carrello/carrello_plus_plus.png';
		event.currentTarget.addEventListener('click', selectCarrello);
		event.currentTarget.removeEventListener('click', deselectCarrello);
	}

	//--------------------CERCA PACCHETTO----------------------------------------------------------------

	const input = document.querySelector('#barra-ricerca');
	input.addEventListener('keyup', ricerca);

	function ricerca(event) {
		console.log(input.value);

		const divv = document.querySelectorAll('#pacchetti div');
		for (div of divv) {
			console.log(div);

			h1 = div.querySelector('h1');

			if (h1.textContent.toLowerCase().search(input.value.toLowerCase()) === -1) {
				div.classList.add('hidden');
			}

			if (h1.textContent.toLowerCase().search(input.value.toLowerCase()) !== -1) {
				div.classList.remove('hidden');
			}
		}
	}

	//--------------pop up-----------------------------------------------------------------------------------
	const close_popup = document.getElementById('closebtn');
	close_popup.addEventListener('click', chiudi);

	function chiudi(event) {
		document.querySelector('.popup').style.display = 'none';
		document.body.classList.remove('overlay');
	}

	//-----------------menu mobile---------------------------------------------------------------------------------
	const open_menu = document.getElementById('mainbox');
	open_menu.addEventListener('click', apriMenu);

	function apriMenu(event) {
		document.querySelector('.sidemenu').style.width = '100%';
		close_menu.addEventListener('click', chiudiMenu);
		open_menu.removeEventListener('click', apriMenu);
	}

	const close_menu = document.querySelector('.closebtn');
	close_menu.addEventListener('click', chiudiMenu);

	function chiudiMenu(event) {
		document.querySelector('.sidemenu').style.width = '0px';
		open_menu.addEventListener('click', apriMenu);
		close_menu.removeEventListener('click', chiudiMenu);
	}

	//--------------info------------------------------------------------------------------------------------------------------------------
	const infos = document.querySelectorAll('.button');
	for (info of infos) {
		info.addEventListener('click', mostra_info);
	}

	function mostra_info(event) {
		const ps = event.currentTarget.parentNode.parentNode.querySelectorAll('.descrizione');
		for (p of ps) {
			p.classList.remove('secret2');
		}

		event.currentTarget.textContent = 'back';
		event.currentTarget.addEventListener('click', chiudi_info);
		event.currentTarget.removeEventListener('click', mostra_info);
	}

	function chiudi_info(event) {
		const ps = event.currentTarget.parentNode.parentNode.querySelectorAll('.descrizione');
		for (p of ps) {
			p.classList.add('secret2');
		}

		event.currentTarget.textContent = 'info';
		event.currentTarget.addEventListener('click', mostra_info);
		event.currentTarget.removeEventListener('click', chiudi_info);
	}

	//--------------oggetti carrello------------------------------------------------------------------------------------------------------------------
	fetch('OggettiCarrello').then(oggettiResponse).then(oggettiJson);

	function oggettiResponse(response) {
		return response.json();
	}

	function oggettiJson(json) {
		console.log(json);

		const carrello = document.querySelector('.oggetti_carrello');
		const carrello_mobile = document.querySelector('.oggetti_carrello_mobile');

		const p = document.createElement('p');
		p.textContent = json[0].oggetti_carrello;
		carrello.appendChild(p);

		const m = document.createElement('p');
		m.textContent = json[0].oggetti_carrello;
		carrello_mobile.appendChild(m);
	}
}
