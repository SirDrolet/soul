function getAbsoluteHeight(el) {
	var styles = window.getComputedStyle(el);
	var margin = parseFloat(styles['marginTop']) +
		parseFloat(styles['marginBottom']);

	return Math.ceil(el.offsetHeight + margin);
}


function hasVerticalScrollbar(el, height) {
	return el.scrollHeight > height
}


document.addEventListener("DOMContentLoaded", function(event) {
	let sidebar_max_height = document.querySelector('#sidebar .sidebar-middle').clientHeight;
	let element_height = getAbsoluteHeight(document.querySelector('#sidebar .sidebar-middle').firstElementChild);
	let max_elements = (sidebar_max_height / element_height).toFixed(0) - 3;
	let sidebarTimeout;
	if (hasVerticalScrollbar(document.querySelector('#sidebar .sidebar-middle'), sidebar_max_height)) {
		let i = 0
		Array.from(document.querySelector('#sidebar .sidebar-middle').children).forEach(function(el1) {
			if (el1.getAttribute('data-dropdown-target') !== "more") {
				if (i > max_elements) {
					let el = el1.cloneNode(true);
					el.classList.remove('opacity-0')
					document.querySelector('[data-dropdown-id="more"]').append(el)
					el1.classList.add('d-none')
				} else {
					el1.classList.remove('opacity-0')
				}
				i++;
			} else {
				el1.classList.remove('opacity-0')
			}
		})
	} else {
		document.querySelector('[data-dropdown-target="more"]').classList.add('d-none')
		Array.from(document.querySelector('#sidebar .sidebar-middle').children).forEach(function(el) {
			el.classList.remove('opacity-0')
		})
	}
	let active_dropdown = null;
	document.querySelectorAll('[data-dropdown-target]').forEach(function(el) {
		let db = document.querySelector('[data-dropdown-id="' + el.getAttribute('data-dropdown-target') + '"]')
		if (db.getAttribute('data-placement') == "top") {
			db.style.top = (el.offsetTop - getAbsoluteHeight(db) + getAbsoluteHeight(el) - 6.2) + "px"
		} else {
			if (!el.parentElement.classList.contains('sidebar-dropdown-body')) {
				db.style.top = (el.offsetTop) + "px"
			} else {
				db.style.top = (document.querySelector("[data-dropdown-target='more']").offsetTop) + "px"
				db.style.minHeight = getAbsoluteHeight(document.querySelector("[data-dropdown-id='more']")) + "px"
			}
		}
		db.classList.add('hide_anim')
		el.addEventListener('click', function(e) {
			if (document.querySelector('#sidebar').classList.contains('active')) {
				let button = e.currentTarget
				let dropdown_body = document.querySelector('[data-dropdown-id="' + button.getAttribute('data-dropdown-target') + '"]')
				button.classList.add('active')
				if (active_dropdown == dropdown_body.getAttribute('data-dropdown-id')) {
					button.classList.remove('active')
					dropdown_body.setAttribute('data-dropdown-state', "no")
					hide(dropdown_body)
					active_dropdown = null;
				} else {
					if (active_dropdown) {
						document.querySelector('[data-dropdown-target="' + active_dropdown + '"]').classList.remove('active')
						document.querySelector('[data-dropdown-id="' + active_dropdown + '"]').setAttribute('data-dropdown-state', "no")
						hide(document.querySelector('[data-dropdown-id="' + active_dropdown + '"]'))
						active_dropdown = null;
					}
					dropdown_body.setAttribute('data-dropdown-state', "yes")
					show(dropdown_body)
					active_dropdown = dropdown_body.getAttribute('data-dropdown-id')
				}
			}

		})
	})
	setTimeout(function() {
		document.querySelectorAll('[data-dropdown-target]').forEach(function(el) {
			let db = document.querySelector('[data-dropdown-id="' + el.getAttribute('data-dropdown-target') + '"]')
			db.classList.remove('hide_noanim')
		})

	}, 300)
	document.querySelector('#sidebar').addEventListener('mouseenter', function(el) {
		if (sidebarTimeout !== null) {
			clearTimeout(sidebarTimeout)
			sidebarTimeout = null
		}
		document.querySelector("#sidebar").classList.add('active')
	})
	document.querySelector('#content').addEventListener('mouseenter', function(el) {
		if (sidebarTimeout == null) {
			sidebarTimeout = setTimeout(function() {
				if (active_dropdown) {
					document.querySelector('[data-dropdown-id="' + active_dropdown + '"]').setAttribute('data-dropdown-state', "no")
					document.querySelector('[data-dropdown-target="' + active_dropdown + '"]').classList.remove('active')
					hide(document.querySelector('[data-dropdown-id="' + active_dropdown + '"]'), function() {
						document.querySelector("#sidebar").classList.remove('active')
					});
					active_dropdown = null;
				} else {
					document.querySelector("#sidebar").classList.remove('active')
				}
			}, 300)
		}
	})
	if (document.querySelector('select')) {
		dselect(document.querySelector('select'))
	}
	document.querySelector('[data-toggle="open-sidebar"]').addEventListener('click', function() {
		document.querySelector('#sidebar-mobile').classList.add('active')
	})
	document.querySelector('[data-toggle="close-sidebar"]').addEventListener('click', function() {
		document.querySelector('#sidebar-mobile').classList.remove('active')
	})
})
// La IP y el puerto de tu servidor
var url = 'https://api.mcsrvstat.us/2/free.x-host.es:2450';

fetch(url)
    .then(function(response) {
        return response.json();
    })
    .then(function(data) {
        console.log(data);
        var statusIndicator = document.getElementById('statusIndicator');
        var serverStatus = document.getElementById('serverStatus');
        var playerCount = document.getElementById('playerCount');

		if (data.online) {
			statusIndicator.style.backgroundColor = 'green';
			statusIndicator.style.boxShadow = '0px 0px 30px green';
			serverStatus.textContent = 'El servidor esta encendido';
			playerCount.innerHTML = '' + data.players.online;
		} else {
			statusIndicator.style.backgroundColor = 'red';
			statusIndicator.style.boxShadow = '0px 0px 30px red';
			serverStatus.textContent = 'El servidor esta apagado';
			playerCount.innerHTML = '<i class="bi bi-people-fill"></i> 0';
		}
    })
    .catch(function(error) {
        console.log('Error: ' + error);
    });
	
