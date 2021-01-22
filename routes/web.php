<?php


Route::get('borrar-base', ['uses' => 'ConfigController@borrar']);
Route::get('/borrar', function() {

    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');

    return "Borrado!";

});


Route::get('plantillas/master', ['as' => 'plantilla', 'uses' => 'ConfigController@plantilla']);


Route::group(['middleware' => 'auth'], function () {

//    PDF
    Route::post('/pdf-codigo', 'PDFController@codigoarticulo')->name('pdf.codigo');
    Route::get('/pdf-cliente', 'PDFController@cliente')->name('pdf.cliente');
    Route::get('/pdf-proveedor', 'PDFController@proveedor')->name('pdf.proveedor');
    Route::get('pdf-categoria', 'PDFController@categoria')->name('pdf.categoria');
    Route::get('pdf-presupuesto/{id}', 'PDFController@presupuesto')->name('pdf.presupuesto');
    Route::get('pdf-ingreos/{id}', 'PDFController@ingreso')->name('pdf.ingreso');
    Route::get('pdf-estimacion/{id}', 'PDFController@estimacion')->name('pdf.estimacion');
    Route::get('pdf-mensual/{id}', 'PDFController@mensual')->name('pdf.mensual');
    Route::get('pdf-venta/{id}', 'PDFController@venta')->name('pdf.venta');
    Route::get('pdf-facturaa/{id}', 'VentaController@facturaa')->name('pdf.facturaa');
    Route::get('pdf-facturab/{id}', 'VentaController@facturab')->name('pdf.facturab');
    Route::get('devolucion-pdf/{id}', 'DevolucionController@pdf')->name('devolucion.pdf');
    Route::get('pdf/arqueo', 'PDFController@arqueo')->name('pdf.arqueo');
    Route::get('pdf-corriente/{id}', 'PDFController@corriente')->name('pdf.corriente');


//    ARTICULO
    Route::get('/articulo', 'ArticuloController@index')->name('articulo.index');
    Route::get('/articulo-tabla', 'ArticuloController@tabla')->name('articulo.tabla');
    Route::post('articulo-store', 'ArticuloController@store')->name('articulo.store');
    Route::patch('articulo-update/{id}', 'ArticuloController@update')->name('articulo.update');
    Route::delete('articulo-delete/{id}', 'ArticuloController@destroy')->name('articulo.destroy');
    Route::put('articulo-cambiar/{id}', 'ArticuloController@cambiar')->name('cambiar.precio');


//    CATEGORIA
    Route::get('/categoria', 'CategoriaController@index')->name('categoria.index');
    Route::get('/categoria-tabla', 'CategoriaController@tabla')->name('categoria.tabla');
    Route::post('categoria-store', 'CategoriaController@store')->name('categoria.store');
    Route::patch('categoria-update/{id}', 'CategoriaController@update')->name('categoria.update');
    Route::delete('categoria-delete/{id}', 'CategoriaController@destroy')->name('categoria.destroy');


//    CLIENTES
    Route::get('/cliente', 'ClienteController@index')->name('cliente.index');
    Route::get('/cliente-tabla', 'ClienteController@tabla')->name('cliente.tabla');
    Route::post('cliente-store', 'ClienteController@store')->name('cliente.store');
    Route::patch('cliente-update/{id}', 'ClienteController@update')->name('cliente.update');
    Route::delete('cliente-delete/{id}', 'ClienteController@destroy')->name('cliente.destroy');

//    PROVEEDORES
    Route::get('/proveedor', 'ProveedorController@index')->name('proveedor.index');
    Route::get('/proveedor-tabla', 'ProveedorController@tabla')->name('proveedor.tabla');
    Route::post('proveedor-store', 'ProveedorController@store')->name('proveedor.store');
    Route::patch('proveedor-update/{id}', 'ProveedorController@update')->name('proveedor.update');
    Route::delete('proveedor-delete/{id}', 'ProveedorController@destroy')->name('proveedor.destroy');

//    VENTA
    Route::get('ventas', 'VentaController@index')->name('venta.index');
    Route::get('ventas-crear', 'VentaController@create')->name('venta.create');
    Route::get('ventas-tabla', 'VentaController@tabla')->name('venta.tabla');
    Route::get('ventas-ver/{id}', 'VentaController@show')->name('venta.show');
    Route::get('ventas-editar/{id}', 'VentaController@edit')->name('venta.edit');
    Route::get('venta-ticke/{id}', 'VentaController@ticke')->name('venta.ticke');
    Route::post('ventas-store', 'VentaController@store')->name('venta.store');
    Route::get('ventas-ver/{id}', 'VentaController@show')->name('venta.show');
    Route::delete('ventas-borrar/{id}',  'VentaController@destroy')->name('venta.destroy');
    Route::patch('ventas-update/{id}', 'VentaController@update')->name('venta.update');


//    INGRESO
    Route::get('ingreso', 'IngresoController@index' )->name('ingreso.index');
    Route::get('ingreso-crear', 'IngresoController@create' )->name('ingreso.create');
    Route::get('ingreso-tabla', 'IngresoController@tabla'  )->name('ingreso.tabla');
    Route::get('ingreso-ver/{id}','IngresoController@show'  )->name('ingreso.show');
    Route::get('ingreso-editar/{id}','IngresoController@edit'  )->name('ingreso.edit');
    Route::post('ingreso-store', 'IngresoController@store' )->name('ingreso.store');
    Route::patch('ingreso-update/{id}','IngresoController@update'  )->name('ingreso.update');
    Route::delete('ingreso-borrar/{id}', 'IngresoController@destroy' )->name('ingreso.destroy');


//    DEVOLUCION
    Route::get('devolucion-inicio', 'DevolucionController@index')->name('devolucion.index');
    Route::get('devolucion-tabla', 'DevolucionController@tabla')->name('devolucion.tabla');
    Route::get('devolucion-ver/{id}', 'DevolucionController@show')->name('devolucion.show');
    Route::post('devolucion/store', 'DevolucionController@store')->name('devolucion.store');


//    ARQUEO
    Route::get('/arqueo', 'ArqueController@index')->name('arqueo.index');
    Route::get('/arqueo/tabla', 'ArqueController@tabla')->name('arqueo.tabla');
    Route::get('/arqueo/detalle/{id}', 'ArqueController@show')->name('arqueo.show');
    Route::get('/arqueo/tabla/{id}', 'ArqueController@tablashow')->name('arqueo.show.tabla');
    Route::put('/arqueo/update/{id}', 'ArqueController@update')->name('arqueo.update');
    Route::post('/arqueo/store', 'ArqueController@store')->name('arqueo.store');
    Route::post('/arqueo/detalle/store', 'ArqueController@storeshow')->name('arqueo.store.show');
    Route::get('/arqueo/pagos/{id}', 'ArqueController@pagos')->name('arqueo.pago.show');
    Route::get('/arqueo/tabla-pago/{id}', 'ArqueController@tablapago')->name('arqueo.pago.tabla');

//    CONFIGURACION
    Route::get('configuracion', 'ConfigController@index')->name('configuracion');
    Route::post('config/create', 'ConfigController@create')->name('config.create');
    Route::get('config/{id}/editar', 'ConfigController@edit')->name('configuracion.editar');
    Route::patch('config/{id}', 'ConfigController@update')->name('configuracion.update');


//    USUARIOS
    Route::get('/usuarios', 'UsuarioController@index')->name('usuarios.index');
    Route::get('/usuarios/tabla', 'UsuarioController@tabla')->name('usuarios.tabla');
    Route::post('/usuarios/store', 'UsuarioController@store')->name('usuarios.store');
    Route::put('/usuarios/update/{id}', 'UsuarioController@update')->name('usuarios.update');
    Route::put('/usuarios/delete/{id}', 'UsuarioController@delete')->name('usuarios.delete');


    //    CUENTA CORRIENTE
    Route::get('cuenta-corriente-inicio', 'CuentaCorrienteController@index')->name('corriente.index');
    Route::get('cuenta-corriente-tabla', 'CuentaCorrienteController@tabla')->name('corriente.tabla');
    Route::get('cuenta-corriente-ver/{id}', 'CuentaCorrienteController@show')->name('corriente.show');
    Route::post('corriente/update/{id}', 'CuentaCorrienteController@update')->name('corriente.update');






    Route::get('/', ['as' => 'home', 'uses' => 'HomeController@avisos']);



});

Auth::routes();
