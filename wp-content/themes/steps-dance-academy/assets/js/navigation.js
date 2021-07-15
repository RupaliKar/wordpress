/**
 * Theme functions file.
 *
 * Contains handlers for navigation.
 */

jQuery(function($){
 	"use strict";
   	jQuery('.main-menu-navigation > ul').superfish({
		delay:       500,
		animation:   {opacity:'show',height:'show'},
		speed:       'fast'
   	});

   	$( window ).scroll( function() {
		if ( $( this ).scrollTop() > 200 ) {
			$( '.back-to-top' ).addClass( 'show-back-to-top' );
		} else {
			$( '.back-to-top' ).removeClass( 'show-back-to-top' );
		}
	});

	// Click event to scroll to top.
	$( '.back-to-top' ).click( function() {
		$( 'html, body' ).animate( { scrollTop : 0 }, 500 );
		return false;
	});
});

function steps_dance_academy_open() {
	jQuery(".sidenav").addClass('show');
}
function steps_dance_academy_close() {
	jQuery(".sidenav").removeClass('show');
    jQuery( '.mobile-menu' ).focus();
}

function steps_dance_academy_menuAccessibility() {
	var links, i, len,
	    steps_dance_academy_menu = document.querySelector( '.nav-menu' ),
	    steps_dance_academy_iconToggle = document.querySelector( '.nav-menu ul li:first-child a' );
    
	let steps_dance_academy_focusableElements = 'button, a, input';
	let steps_dance_academy_firstFocusableElement = steps_dance_academy_iconToggle; // get first element to be focused inside menu
	let steps_dance_academy_focusableContent = steps_dance_academy_menu.querySelectorAll(steps_dance_academy_focusableElements);
	let steps_dance_academy_lastFocusableElement = steps_dance_academy_focusableContent[steps_dance_academy_focusableContent.length - 1]; // get last element to be focused inside menu

	if ( ! steps_dance_academy_menu ) {
    	return false;
	}

	links = steps_dance_academy_menu.getElementsByTagName( 'a' );

	// Each time a menu link is focused or blurred, toggle focus.
	for ( i = 0, len = links.length; i < len; i++ ) {
	    links[i].addEventListener( 'focus', toggleFocus, true );
	    links[i].addEventListener( 'blur', toggleFocus, true );
	}

	// Sets or removes the .focus class on an element.
	function toggleFocus() {
      	var self = this;

      	// Move up through the ancestors of the current link until we hit .mobile-menu.
      	while (-1 === self.className.indexOf( 'nav-menu' ) ) {
	      	// On li elements toggle the class .focus.
	      	if ( 'li' === self.tagName.toLowerCase() ) {
	          	if ( -1 !== self.className.indexOf( 'focus' ) ) {
	          		self.className = self.className.replace( ' focus', '' );
	          	} else {
	          		self.className += ' focus';
	          	}
	      	}
	      	self = self.parentElement;
      	}
	}
    
	// Trap focus inside modal to make it ADA compliant
	document.addEventListener('keydown', function (e) {
	    let isTabPressed = e.key === 'Tab' || e.keyCode === 9;

	    if ( ! isTabPressed ) {
	    	return;
	    }

	    if ( e.shiftKey ) { // if shift key pressed for shift + tab combination
	      	if (document.activeElement === steps_dance_academy_firstFocusableElement) {
		        steps_dance_academy_lastFocusableElement.focus(); // add focus for the last focusable element
		        e.preventDefault();
	      	}
	    } else { // if tab key is pressed
	    	if (document.activeElement === steps_dance_academy_lastFocusableElement) { // if focused has reached to last focusable element then focus first focusable element after pressing tab
		      	steps_dance_academy_firstFocusableElement.focus(); // add focus for the first focusable element
		      	e.preventDefault();
	    	}
	    }
	});   
}

jQuery(function($){
	$('.mobile-menu').click(function () {
	    steps_dance_academy_menuAccessibility();
  	});
	$('.search-toggle').click(function () {
	    steps_dance_academy_trapFocus($('.search-outer'));
  	});
});

function steps_dance_academy_search_open() {
	jQuery(".search-outer").addClass('show');
}
function steps_dance_academy_search_close() {
	jQuery(".search-outer").removeClass('show');
}

function steps_dance_academy_trapFocus(elem) {

    var steps_dance_academy_tabbable = elem.find('select, input, textarea, button, a').filter(':visible');

    var steps_dance_academy_firstTabbable = steps_dance_academy_tabbable.first();
    var steps_dance_academy_lastTabbable = steps_dance_academy_tabbable.last();
    /*set focus on first input*/
    steps_dance_academy_firstTabbable.focus();

    /*redirect last tab to first input*/
    steps_dance_academy_lastTabbable.on('keydown', function (e) {
        if ((e.which === 9 && !e.shiftKey)) {
            e.preventDefault();
            steps_dance_academy_firstTabbable.focus();
        }
    });

    /*redirect first shift+tab to last input*/
    steps_dance_academy_firstTabbable.on('keydown', function (e) {
        if ((e.which === 9 && e.shiftKey)) {
            e.preventDefault();
            steps_dance_academy_lastTabbable.focus();
        }
    });

    /* allow escape key to close insiders div */
    elem.on('keyup', function (e) {
        if (e.keyCode === 27) {
            elem.hide();
        }
        ;
    });
};