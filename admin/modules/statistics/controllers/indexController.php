<?php
function construct()
{
    load_module('index');
}

function indexAction()
{
    load_view("main");
}


function order_priceAction()
{
    load_view("order_price");
}
