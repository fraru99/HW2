//----------------------------------UNPLASH-----------------------------------------------------------------------------------------------------
const form = document.querySelector('form');
form.addEventListener('submit', search);

function search(event) {
	event.preventDefault();

	const train_input = document.querySelector('#train');
	const train_value = encodeURIComponent(train_input.value);

	fetch('unplash/' + train_value).then(onResponse).then(onJson);
}

function onResponse(response) {
	return response.json();
}

function numeri(i) {
	if (i === 0) {
		return 'uno';
	}
	if (i === 1) {
		return 'due';
	}
	if (i === 2) {
		return 'tre';
	}
	if (i === 3) {
		return 'quattro';
	}
	if (i === 4) {
		return 'cinque';
	}
}

function alternatime() {
	let i = random(0, 4);
	const uno = document.querySelector('#uno');
	const due = document.querySelector('#due');
	const tre = document.querySelector('#tre');
	const quattro = document.querySelector('#quattro');
	const cinque = document.querySelector('#cinque');

	if (i === 0) {
		uno.classList.remove('hidden');
		due.classList.add('hidden');
		tre.classList.add('hidden');
		quattro.classList.add('hidden');
		cinque.classList.add('hidden');
	}
	if (i === 1) {
		uno.classList.add('hidden');
		due.classList.remove('hidden');
		tre.classList.add('hidden');
		quattro.classList.add('hidden');
		cinque.classList.add('hidden');
	}
	if (i === 2) {
		uno.classList.add('hidden');
		due.classList.add('hidden');
		tre.classList.remove('hidden');
		quattro.classList.add('hidden');
		cinque.classList.add('hidden');
	}
	if (i === 3) {
		uno.classList.add('hidden');
		due.classList.add('hidden');
		tre.classList.add('hidden');
		quattro.classList.remove('hidden');
		cinque.classList.add('hidden');
	}
	if (i === 4) {
		uno.classList.add('hidden');
		due.classList.add('hidden');
		tre.classList.add('hidden');
		quattro.classList.add('hidden');
		cinque.classList.remove('hidden');
	}
}

function random(min, max) {
	min = Math.ceil(min);
	max = Math.floor(max);
	return Math.floor(Math.random() * (max - min + 1)) + min;
}

function onJson(json) {
	const ricerca2 = document.querySelector('#ricerca2');
	ricerca2.innerHTML = '';

	let num_result = json.total;

	if (num_result > 5) {
		num_result = 5;
	}

	for (let i = 0; i < num_result; i++) {
		let image = json.results[i].urls.raw;

		const articolo = document.createElement('div');
		articolo.setAttribute('id', numeri(i));
		articolo.classList.add('hidden');

		const img = document.createElement('img');
		img.src = image;
		img.classList.add('ban');

		ricerca2.appendChild(articolo);
		articolo.appendChild(img);
	}

	setInterval(alternatime, 7000);
	setTimeout(alternatime, 0);
}
//-------------------------wether--------------------------------------------------------------------------------------------------------------

const form2 = document.querySelector('form');
form2.addEventListener('submit', search2);

function search2(event) {
	event.preventDefault();

	const train_input = document.querySelector('#train');
	const train_value = encodeURIComponent(train_input.value);

	fetch('wether/' + train_value).then(onResponse).then(onJson2);
}

function onResponse(response) {
	return response.json();
}

function onJson2(json) {
	const ricerca1 = document.querySelector('#ricerca1');
	ricerca1.innerHTML = '';

	console.log(json);

	const t1 = json.request.query;
	const p1 = document.createElement('p');
	let b = document.createElement('b');
	b.textContent = t1;
	p1.appendChild(b);
	ricerca1.appendChild(p1);

	const t2 = json.current.temperature;
	const p2 = document.createElement('p');
	const b2 = document.createElement('b');
	b2.textContent = 'Temperatura: ' + t2 + ' C°';
	p2.appendChild(b2);
	ricerca1.appendChild(p2);

	const t3 = json.current.weather_descriptions[0];
	const p3 = document.createElement('p');
	const b3 = document.createElement('b');
	b3.textContent = 'Tempo: ' + t3;
	p3.appendChild(b3);
	ricerca1.appendChild(p3);

	const t4 = json.current.humidity;
	const p4 = document.createElement('p');
	const b4 = document.createElement('b');
	b4.textContent = 'Umidità: ' + t4 + '%';
	p4.appendChild(b4);
	ricerca1.appendChild(p4);

	const t5 = json.current.precip;
	const p5 = document.createElement('p');
	const b5 = document.createElement('b');
	b5.textContent = 'Precipitazioni: ' + t5 + '%';
	p5.appendChild(b5);
	ricerca1.appendChild(p5);
	ricerca1.classList.add('border');
}
//---------------------------wikipedia----------------------------------------------------------

const form3 = document.querySelector('form');
form3.addEventListener('submit', search3);

function search3(event) {
	event.preventDefault();

	const train_input = document.querySelector('#train');
	const train_value = encodeURIComponent(train_input.value);

	const url = 'https://en.wikipedia.org/w/api.php';

	const params = {
		action: 'query',
		prop: 'extracts',
		exintro: '',
		titles: train_value,
		format: 'json',
		explaintext: '',
		exchars: '2000'
	};

	rest_url = url + '?origin=*';
	Object.keys(params).forEach(function(key) {
		rest_url += '&' + key + '=' + params[key];
	});

	fetch(rest_url).then(onResponse).then(onJson3);
}

function onResponse(response) {
	return response.json();
}

function onJson3(json) {
	const ricerca3 = document.querySelector('#ricerca3');
	ricerca3.innerHTML = '';

	const page = json.query.pages;
	const pageid = Object.keys(json.query.pages)[0];

	const t = page[pageid].extract;

	const p3 = document.createElement('p');
	p3.textContent = t;
	ricerca3.appendChild(p3);
}

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
