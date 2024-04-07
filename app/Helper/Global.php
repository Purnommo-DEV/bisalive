<?php

function help_hapus_spesial_karakter($request_form_input)
{
    // $remove = array("@", "#", "(", ")", "*", "/", "'", "`");
    $hapus  = preg_replace('/[^A-Za-z0-9-_\-]/', ' ', $request_form_input);
    return $hapus;
}
