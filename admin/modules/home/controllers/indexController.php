<?php
function construct()
{
    load_module('index');
}

function indexAction()
{
    // $data['customers_number'] = customers_number();
    load_view('main');
}
