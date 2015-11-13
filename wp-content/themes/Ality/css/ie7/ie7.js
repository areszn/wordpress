/* To avoid CSS expressions while still supporting IE 7 and IE 6, use this script */
/* The script tag referring to this file must be placed before the ending body tag. */

/* Use conditional comments in order to target IE 7 and older:
	<!--[if lt IE 8]><!-->
	<script src="ie7/ie7.js"></script>
	<!--<![endif]-->
*/

(function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'ality\'">' + entity + '</span>' + html;
	}
	var icons = {
		'icon-date': '&#xe600;',
		'icon-cat': '&#xe601;',
		'icon-simple-menu': '&#xe601;',
		'icon-comment': '&#xe602;',
		'icon-views': '&#xe603;',
		'icon-edit': '&#xe604;',
		'icon-down': '&#xe605;',
		'icon-home_h': '&#xe606;',
		'icon-search': '&#xe607;',
		'icon-login': '&#xe608;',
		'icon-st': '&#xe609;',
		'icon-scroll_t': '&#xe60a;',
		'icon-scroll_c': '&#xe60b;',
		'icon-scroll_b': '&#xe60c;',
		'icon-bulletin': '&#xe60d;',
		'icon-uniE60E': '&#xe60e;',
		'icon-uniE60F': '&#xe60f;',
		'icon-uniE610': '&#xe610;',
		'0': 0
		},
		els = document.getElementsByTagName('*'),
		i, c, el;
	for (i = 0; ; i += 1) {
		el = els[i];
		if(!el) {
			break;
		}
		c = el.className;
		c = c.match(/icon-[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
}());
