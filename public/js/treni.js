//--------------------------1)PAGINA_DINAMICA---------------------------------------------------------------------------------------

fetch('CaricaTreni').then(onTreniResponse).then(onTreniJson);

function onTreniResponse(response) {
	return response.json();
}

function onTreniJson(json) {
	console.log(json);
	for (treno in json) {
		const sezione = document.querySelector('#treni');

		const div = document.createElement('div');
		sezione.appendChild(div);
		div.classList.add('shadow-box');

		const h1 = document.createElement('h1');
		h1.textContent = json[treno].nome;
		div.appendChild(h1);

		const img = document.createElement('img');
		img.src = json[treno].immagine;
		div.appendChild(img);

		const p = document.createElement('p');
		p.textContent = json[treno].descrizione;
		div.appendChild(p);
		p.classList.add('hidden');
		p.classList.add('descrizione');

		const div2 = document.createElement('p');
		div.appendChild(div2);
		div2.classList.add('icone');

		const a = document.createElement('a');
		a.textContent = 'info';
		div2.appendChild(a);
		a.classList.add('button');

		const img2 = document.createElement('img');
		img2.src = 'foto/foto2/stella_grigia.jpg';
		div2.appendChild(img2);
		img2.classList.add('star');
	}
	//--------------info------------------------------------------------------------------------------------------------------------------
	const infos = document.querySelectorAll('.button');
	for (info of infos) {
		info.addEventListener('click', mostra_info);
	}

	function mostra_info(event) {
		const ps = event.currentTarget.parentNode.parentNode.querySelectorAll('.descrizione');
		for (p of ps) {
			p.classList.remove('hidden');
		}

		event.currentTarget.textContent = 'back';
		event.currentTarget.addEventListener('click', chiudi_info);
		event.currentTarget.removeEventListener('click', mostra_info);
	}

	function chiudi_info(event) {
		const ps = event.currentTarget.parentNode.parentNode.querySelectorAll('.descrizione');
		for (p of ps) {
			p.classList.add('hidden');
		}

		event.currentTarget.textContent = 'info';
		event.currentTarget.addEventListener('click', mostra_info);
		event.currentTarget.removeEventListener('click', chiudi_info);
	}
}

//-----------------3)SELEZIONA_PREFERITI------------------------------------------------------------------------------------------------

fetch('CaricaTreni').then(onStarResponse).then(onStarJson);

function onStarResponse(response) {
	return response.json();
}

function onStarJson(json) {
	const stars = document.querySelectorAll('.star');
	for (star of stars) {
		star.addEventListener('click', selectstar);
	}

	function selectstar(event) {
		const pss = event.currentTarget.parentNode.parentNode.querySelectorAll('#treni h1');
		console.log(pss);
		for (ps of pss) {
			for (treno in json) {
				const sezione = document.querySelector('#preferiti');
				sezione.classList.add('shadow-box');
				if (ps.textContent === json[treno].nome) {
					const div = document.createElement('div');
					sezione.appendChild(div);
					div.classList.add('shadow-box');

					const h1 = document.createElement('h1');
					h1.textContent = json[treno].nome;
					div.appendChild(h1);

					const img = document.createElement('img');
					img.src = json[treno].immagine;
					div.appendChild(img);

					const p = document.createElement('p');
					p.textContent = json[treno].descrizione;
					div.appendChild(p);
					p.classList.add('hidden');
					p.classList.add('descrizione');

					const div2 = document.createElement('p');
					div.appendChild(div2);
					div2.classList.add('icone');

					const a = document.createElement('a');
					a.textContent = 'info';
					div2.appendChild(a);
					a.classList.add('button');

					const img2 = document.createElement('img');
					img2.src = 'foto/foto2/stella_gialla.jpg';
					div2.appendChild(img2);
					img2.classList.add('star');

					const infos = document.querySelectorAll('.button');
					for (info of infos) {
						info.addEventListener('click', mostra_info);
					}

					function mostra_info(event) {
						const ps2 = event.currentTarget.parentNode.parentNode.querySelectorAll('.descrizione');
						for (p2 of ps2) {
							p2.classList.remove('hidden');
						}

						event.currentTarget.textContent = 'back';
						event.currentTarget.addEventListener('click', chiudi_info);
						event.currentTarget.removeEventListener('click', mostra_info);
					}

					function chiudi_info(event) {
						const ps2 = event.currentTarget.parentNode.parentNode.querySelectorAll('.descrizione');
						for (p2 of ps2) {
							p2.classList.add('hidden');
						}

						event.currentTarget.textContent = 'info';
						event.currentTarget.addEventListener('click', mostra_info);
						event.currentTarget.removeEventListener('click', chiudi_info);
					}
				}
			}
		}
		event.currentTarget.src = 'foto/foto2/stella_gialla.jpg';
		event.currentTarget.addEventListener('click', deselectstar);
		event.currentTarget.removeEventListener('click', selectstar);
	}

	function deselectstar(event) {
		const pss = event.currentTarget.parentNode.parentNode.querySelectorAll('h1');
		for (ps of pss) {
			const sezione = document.querySelector('#preferiti div');
			document.querySelector('#preferiti').classList.remove('shadow-box');

			sezione.remove();
		}

		event.currentTarget.src = 'foto/foto2/stella_grigia.jpg';
		event.currentTarget.addEventListener('click', selectstar);
		event.currentTarget.removeEventListener('click', deselectstar);
	}
}
//--------------------4)MOSTRA/NASCONDI_PREFERITI---------------------------------------------------------------------------------------------

const preferiti = document.querySelector('#preferiti_nav');
preferiti.addEventListener('click', mostra_preferiti);

function mostra_preferiti(event) {
	const sezioni = document.querySelectorAll('#preferiti div');
	for (sezione of sezioni) {
		sezione.classList.remove('hidden');
	}
	event.currentTarget.addEventListener('click', chiudi_preferiti);
	event.currentTarget.removeEventListener('click', mostra_preferiti);
}

function chiudi_preferiti(event) {
	const sezioni = document.querySelectorAll('#preferiti div');
	for (sezione of sezioni) {
		sezione.classList.add('hidden');
	}

	event.currentTarget.addEventListener('click', mostra_preferiti);
	event.currentTarget.removeEventListener('click', chiudi_preferiti);
}

//------------------------5)BARRA_RICERCA-----------------------------------------------------------------------------------------

const input = document.querySelector('#barra-ricerca');
input.addEventListener('keyup', ricerca);

function ricerca(event) {
	console.log(input.value);

	const divv = document.querySelectorAll('#treni div');
	for (div of divv) {
		h1 = div.querySelector('h1');

		if (h1.textContent.toLowerCase().search(input.value.toLowerCase()) === -1) {
			div.classList.add('hidden');
		}

		if (h1.textContent.toLowerCase().search(input.value.toLowerCase()) !== -1) {
			div.classList.remove('hidden');
		}
	}
}

//------------------------6)SIDE_MENU-----------------------------------------------------------------------------------------
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
