// ********************************************MASONRY AND HOME*******************************************
$('.grid').masonry({
	itemSelector: '.grid-item',
	columnWidth: '.grid-sizer',
	gutter: '.gutter-sizer',
	percentPosition: true
});

$('#carouselExample').carousel({
	interval: 2000
});

$('#carouselExample ul>li:first-child').addClass('active');

$('#carouselExample .carousel-item').each(function () {
	let next = $(this).next();
	if (!next.length) {
		next = $(this).siblings(':first');
	}
	next.children(':first-child').clone().appendTo($(this));

	for (let i = 0; i < 8; i++) {
		next = next.next();
		if (!next.length) {
			next = $(this).siblings(':first');
		}

		next.children(':first-child').clone().appendTo($(this));
	}
});

// ********************************************PORTFOLIO*******************************************
// ********************************************LIGHTBOX*******************************************

$('.filter-list ul>li:first-child').addClass('is-checked');

'use strict';
let iconArrow = document.querySelector('.icon-arrow');
let images = document.querySelectorAll('#portfolio-item');
let lightBoxGallery = document.querySelector('.lightbox-gallery');
let imgSrc = document.querySelector('.lightbox-item');
let imgName = document.querySelector('.img-name');
let imgNumber = document.querySelector('.img-number');
let close = document.querySelector('.close');
let alt;
let itemImage;
let src;
let prev = document.querySelector('.prev');
let next = document.querySelector('.next');


	for (let i = 0; i < images.length; i++) {
		images[i].addEventListener('click', function () {
			itemImage = i;
			changeList();
			showLightBox();
		})
	}


function showLightBox() {
	lightBoxGallery.style.display = 'block';
}

function changeList() {
	src = images[itemImage].querySelector('img').getAttribute('src');
	imgSrc.src = src;
	alt = images[itemImage].querySelector('img').getAttribute('alt');
	imgName.innerHTML = alt;
	imgNumber.innerHTML = (itemImage + 1) + ' ' + 'of' + (images.length);
}

next.addEventListener('click', function () {
	if (itemImage === images.length - 1) {
		itemImage = 0
	} else {
		itemImage++;
	}
	changeList();
});

prev.addEventListener('click', function () {
	if (itemImage === 0) {
		itemImage = images.length - 1;
	} else {
		itemImage--;
	}
	changeList();
});

close.addEventListener('click', function () {
	lightBoxGallery.style.display = 'none';
});

// ********************************************ISOTOPE*******************************************

let $grid = $('.portfolio-list').isotope({
	itemSelector: '.element-item',
	layoutMode: 'fitRows'
});
$('.filters-button-group').on( 'click', 'button', function() {
	let filterValue = $( this ).attr('data-filter');
	$grid.isotope({ filter: filterValue });
});
$('.button-group').each( function( i, buttonGroup ) {
	let $buttonGroup = $( buttonGroup );
	$buttonGroup.on( 'click', 'button', function() {
		$buttonGroup.find('.is-checked').removeClass('is-checked');
		$( this ).addClass('is-checked');
	});
});

