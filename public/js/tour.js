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
