/* To avoid CSS expressions while still supporting IE 7 and IE 6, use this script */
/* The script tag referencing this file must be placed before the ending body tag. */

/* Use conditional comments in order to target IE 7 and older:
    <!--[if lt IE 8]><!-->
    <script src="ie7/ie7.js"></script>
    <!--<![endif]-->
*/

(function() {
    function addIcon(el, entity) {
        var html = el.innerHTML;
        el.innerHTML = '<span style="font-family: \'icomoon\'">' + entity + '</span>' + html;
    }
    var icons = {
        'icon-chevron-right': '&#xe600;',
        'icon-controller-next': '&#xe601;',
        'icon-controller-paus': '&#xe602;',
        'icon-controller-play': '&#xe603;',
        'icon-dots-three-vertical': '&#xe604;',
        'icon-resize-100': '&#xe605;',
        'icon-resize-full-screen': '&#xe606;',
        'icon-air': '&#xe607;',
        'icon-circle-with-cross': '&#xe608;',
        'icon-export': '&#xe609;',
        'icon-info-with-circle': '&#xe60a;',
        'icon-list': '&#xe60b;',
        'icon-share-alternitive': '&#xe60c;',
        'icon-shuffle': '&#xe60d;',
        'icon-sound-mix': '&#xe60e;',
        'icon-ticket': '&#xe60f;',
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
