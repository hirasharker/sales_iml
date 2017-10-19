
// select tag with select2
$.fn.select2.defaults.set( "theme", "bootstrap" );

anchors.options.placement = 'left';
    anchors.add('.container h1, .container h2, .container h3, .container h4, .container h5');


$( ".select-tag" ).select2( {
    width: null,
    containerCssClass: ':all:'
} );

$( ".select2-allow-clear" ).select2( {
    allowClear: true,
    placeholder: placeholder,
    width: null,
    containerCssClass: ':all:'
} );