<?php

function smarty_modifier_script_escape($value) {

    if (is_array($value)) return $value;

    $pattern = "/<script.*?>|<\/script>|javascript:/i";
    $convert = "#script tag escaped#";

    if ( preg_match_all($pattern, $value, $matches) ) {
        return preg_replace($pattern, $convert, $value);
    } else {
        return $value;
    }
}

?>
