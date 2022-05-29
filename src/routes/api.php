<?php

use EniumCriacaoSites\GettingAddresses\Http\AddressController;
use EniumCriacaoSites\GettingAddresses\Models\City;
use EniumCriacaoSites\GettingAddresses\Models\State;
use Illuminate\Support\Facades\Route;
// MyVendor\formulario-contato\src\routes\web.php

Route::prefix('api')->group(function () {
    Route::group(['middleware' => ['api']], function () {
        Route::get('cities', [AddressController::class, 'getCidades'])->name('get_cidades');
    });
});