/*
	Massively by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
*/

(function ($) {

	var $window = $(window),
		$body = $('body'),
		$wrapper = $('#wrapper'),
		$header = $('#header'),
		$nav = $('#nav'),
		$main = $('#main'),
		$navPanelToggle, $navPanel, $navPanelInner;

	// Breakpoints.
	breakpoints({
		default: ['1681px', null],
		xlarge: ['1281px', '1680px'],
		large: ['981px', '1280px'],
		medium: ['737px', '980px'],
		small: ['481px', '736px'],
		xsmall: ['361px', '480px'],
		xxsmall: [null, '360px']
	});

	/**
	 * Applies parallax scrolling to an element's background image.
	 * @return {jQuery} jQuery object.
	 */
	$.fn._parallax = function (intensity) {

		var $window = $(window),
			$this = $(this);

		if (this.length == 0 || intensity === 0)
			return $this;

		if (this.length > 1) {

			for (var i = 0; i < this.length; i++)
				$(this[i])._parallax(intensity);

			return $this;

		}

		if (!intensity)
			intensity = 0.25;

		$this.each(function () {

			var $t = $(this),
				$bg = $('<div class="bg"></div>').appendTo($t),
				on, off;

			on = function () {

				$bg
					.removeClass('fixed')
					.css('transform', 'matrix(1,0,0,1,0,0)');

				$window
					.on('scroll._parallax', function () {

						var pos = parseInt($window.scrollTop()) - parseInt($t.position().top);

						$bg.css('transform', 'matrix(1,0,0,1,0,' + (pos * intensity) + ')');

					});

			};

			off = function () {

				$bg
					.addClass('fixed')
					.css('transform', 'none');

				$window
					.off('scroll._parallax');

			};

			// Disable parallax on ..
			if (browser.name == 'ie'			// IE
				|| browser.name == 'edge'			// Edge
				|| window.devicePixelRatio > 1		// Retina/HiDPI (= poor performance)
				|| browser.mobile)					// Mobile devices
				off();

			// Enable everywhere else.
			else {

				breakpoints.on('>large', on);
				breakpoints.on('<=large', off);

			}

		});

		$window
			.off('load._parallax resize._parallax')
			.on('load._parallax resize._parallax', function () {
				$window.trigger('scroll');
			});

		return $(this);

	};

	// Play initial animations on page load.
	$window.on('load', function () {
		window.setTimeout(function () {
			$body.removeClass('is-preload');
		}, 100);
	});

	// Scrolly.
	$('.scrolly').scrolly();

	// Background.
	$wrapper._parallax(0.925);

	// Nav Panel.

	// Toggle.
	$navPanelToggle = $(
		'<a href="#navPanel" id="navPanelToggle">Menu</a>'
	)
		.appendTo($wrapper);

	// Change toggle styling once we've scrolled past the header.
	$header.scrollex({
		bottom: '5vh',
		enter: function () {
			$navPanelToggle.removeClass('alt');
		},
		leave: function () {
			$navPanelToggle.addClass('alt');
		}
	});

	// Panel.
	$navPanel = $(
		'<div id="navPanel">' +
		'<nav>' +
		'</nav>' +
		'<a href="#navPanel" class="close"></a>' +
		'</div>'
	)
		.appendTo($body)
		.panel({
			delay: 500,
			hideOnClick: true,
			hideOnSwipe: true,
			resetScroll: true,
			resetForms: true,
			side: 'right',
			target: $body,
			visibleClass: 'is-navPanel-visible'
		});

	// Get inner.
	$navPanelInner = $navPanel.children('nav');

	// Move nav content on breakpoint change.
	var $navContent = $nav.children();

	breakpoints.on('>medium', function () {

		// NavPanel -> Nav.
		$navContent.appendTo($nav);

		// Flip icon classes.
		$nav.find('.icons, .icon')
			.removeClass('alt');

	});

	breakpoints.on('<=medium', function () {

		// Nav -> NavPanel.
		$navContent.appendTo($navPanelInner);

		// Flip icon classes.
		$navPanelInner.find('.icons, .icon')
			.addClass('alt');

	});

	// Hack: Disable transitions on WP.
	if (browser.os == 'wp'
		&& browser.osVersion < 10)
		$navPanel
			.css('transition', 'none');

	// Intro.
	var $intro = $('#intro');

	if ($intro.length > 0) {

		// Hack: Fix flex min-height on IE.
		if (browser.name == 'ie') {
			$window.on('resize.ie-intro-fix', function () {

				var h = $intro.height();

				if (h > $window.height())
					$intro.css('height', 'auto');
				else
					$intro.css('height', h);

			}).trigger('resize.ie-intro-fix');
		}

		// Hide intro on scroll (> small).
		breakpoints.on('>small', function () {

			$main.unscrollex();

			$main.scrollex({
				mode: 'bottom',
				top: '25vh',
				bottom: '-50vh',
				enter: function () {
					$intro.addClass('hidden');
				},
				leave: function () {
					$intro.removeClass('hidden');
				}
			});

		});

		// Hide intro on scroll (<= small).
		breakpoints.on('<=small', function () {

			$main.unscrollex();

			$main.scrollex({
				mode: 'middle',
				top: '15vh',
				bottom: '-15vh',
				enter: function () {
					$intro.addClass('hidden');
				},
				leave: function () {
					$intro.removeClass('hidden');
				}
			});

		});

	}

	// Fetch assets html (Funcion asincrona)
	async function pintalo(datos, donde) {
		let html = await datos.text();
		//  $('#' + donde).html(html);
		document.getElementById(donde).innerHTML = html;

	}

	function cargarHtmls() {
		fetch('assets/html/header.html')
			.then(function (response) {
				pintalo(response, 'header')
			})
			.catch(function (error) {
				console.error('Error al cargar el header:', error);
			});
		fetch('assets/html/copyright.html')
			.then(function (response) {
				pintalo(response, 'copyright')
			})
			.catch(function (error) {
				console.error('Error al cargar el copyright:', error);
			});
		//cargamos el footer
		fetch('assets/html/footer.html')
			.then(function (response) {
				pintalo(response, 'footer')
			})
			.catch(function (error) {
				console.error('Error al cargar el footer:', error);
			});
		// Cargamos el nav
		fetch('assets/html/nav.html')
			.then(function (response) {
				pintalo(response, 'nav')
			})
			.catch(function (error) {
				console.error('Error al cargar el nav:', error);
			});
	}
	// Llama a la función para cargar el header cuando la página se carga completamente
	cargarHtmls()

	// // cargar los pots que tengas en tu base de datos
	// const verResultado = document.getElementById("posts");
	// html = '';
	// const urlBase = 'http://localhost/php-curso/MySQL/';
	// const endPoint = "ejem-Primera-conexion/api/select.php";

	// async function positivo(response) {
	// 	let text = await response.json();
	// 	console.log(text);
	// 	if (response.ok) {
	// 		verResultado.innerHTML = text.map(dameDatos);
	// 	} else {
	// 		showError('status code: ' + response.status);
	// 	}
	// }

	// function dameDatos(item) {
	// 	return [
	// 		`<article class="post featured">
	// 			<header class="major">
	// 			<span class="date">${item.fecha}</span>
	// 			<h2><a href="#">${item.titulo}</a></h2>
	// 			<p>${item.texto}</p>
	// 			</header>
	// 			<a href="#" class="image main"><img src="${item.imagen}" alt="Image"></a>
	// 		<ul class="actions special">
	// 			<li><a href="generic.html?postId=${item.id}" class="button large">Full Story</a></li>
	// 		</ul>
	// 	</article>`]
	// }

	// function errDatos(error) {
	// 	console.log(error);
	// }

	// fetch(urlBase + endPoint).
	// 	then(positivo).
	// 	catch(errDatos)

	// Bucle de posts

	/* 
	<article class="post featured">
		// 			<header class="major">
		// 			<span class="date">fecha</span>
		// 			<h2><a href="#">titulo</a></h2>
		// 			<p>$texto</p>
		// 			</header>
		// 			<a href="#" class="image main"><img src="$imagen" alt="Image"></a>
		// 		<ul class="actions special">
		// 			<li><a href="generic.html?postId=${item.id}" class="button large">Full Story</a></li>
		// 		</ul>
		// 	</article>
	*/
	const urlBase = 'http://localhost/php-curso/MySQL/';
	const urlImages = "http://localhost/php-curso/MySQL/ejem-Primera-conexion/";
	const endPointSelect = "ejem-Primera-conexion/api/select.php";
	const endPointPost = "ejem-Primera-conexion/api/post.php";

	// Generic.html
	function getParameterByName(name, url) {
		if (!url)
			url = window.location.href;
		name = name.replace(/[\[\]]/g, "\\$&");
		var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
			results = regex.exec(url);
		if (!results)
			return null;
		if (!results[2])
			return '';
		return decodeURIComponent(results[2].replace(/\+/g, " "));
	 }

	 function postMap(item){
		return [
			`<section class="post">
			<header class="major">
				<span class="date">${item.fecha}</span>
				<h1>${item.titulo}</h1>
				<p>${item.texto}</p>
			</header>
			<div class="image main"><img src="${imagen(item.imagen)}" alt="" /></div>
			<p>${item.texto}</p>
			</section>`
		]
	 }
	 
	 async function recibido(datos){
		datos = await datos.json();
		let html = datos.map(postMap).join('');
		$('#main').html(html);
	 }

	 if (getParameterByName('postId')) {
		let post = getParameterByName('postId');
		//alert('Estamos en generic, para mostrar el post id' + post);
		fetch(urlBase + endPointPost +"?id=" + post).
		then(recibido).
		catch(errDatos);
	 }

	function imagen(img) {
		if (img.startsWith('http')) {
			// Es una URL externa, devolver tal cual
			return img;  
		} else {
			// Concatenar la URL base local con el nombre de la imagen
			return urlImages + img;  
		}
	}
	
	function dameDatos(item) {
		return [
			// Mostrar las imagenes son pasarle ninguna funcion para que se mestren las http
			// <a href="#" class="image main"><img src="${urlImages}${item.imagen}" alt="Image"></a>
			`<article class="post featured">
			 			<header class="major">
			 			<span class="date">${item.fecha}</span>
			 			<h2><a href="generic.html?postId=${item.id}">${item.titulo}</a></h2>
			 			<p>${item.texto}</p>
			 			</header>
			 			<a href="generic.html?postId=${item.id}" class="image main"><img src="${imagen(item.imagen)}" alt="Image"></a>
			 		<ul class="actions special">
			 			<li><a href="generic.html?postId=${item.id}" class="button large">Full Story</a></li>
			 		</ul>
			 	</article>`]
	}

	async function positivo(response) {
		let datos = await response.json();
		let html = datos.map(dameDatos);
		$('#posts').html(html);
	}

	function errDatos(error) {
		console.log(error);
	}

	fetch(urlBase + endPointSelect).
		then(positivo).
		catch(errDatos);

})(jQuery);