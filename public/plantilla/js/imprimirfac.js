function imprSelec(nombre)

 {

 ////////
 var ficha = document.getElementById(nombre);

 var ventimp = window.open(' ', 'popimpr');

 ventimp.document.write( ficha.innerHTML );

 ventimp.document.close();

 ventimp.print( );

 ventimp.close();

 }
