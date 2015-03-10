<?php 
global $bp;
foreach ( (array)$bp as $key => $value ) {
    echo '<pre>';
    echo '<strong>' . $key . ': </strong><br />';
    print_r( $value );
    echo '</pre>';
} ?>