<?php

use EniumCriacaoSites\GettingAddresses\Models\City;
use EniumCriacaoSites\GettingAddresses\Models\State;
use Illuminate\Support\Facades\Route;
// MyVendor\formulario-contato\src\routes\web.php
Route::get('cities', function () {

    $estado = State::get();
    return $estado;
});