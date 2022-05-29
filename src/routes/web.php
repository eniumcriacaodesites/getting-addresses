<?php

use Carlos\GettingAddresses\Models\City;
use Carlos\GettingAddresses\Models\State;
use Illuminate\Support\Facades\Route;
// MyVendor\formulario-contato\src\routes\web.php
Route::get('cities', function () {

    $estado = State::get();
    return $estado;
});