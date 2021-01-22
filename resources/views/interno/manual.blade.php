@extends('layouts.app')
@section('content')
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
<div class=WordSection1>

<p><h1>Manual de Usuario</h1></p>

<p style='text-align:justify;text-justify:inter-ideograph'><b><u><span
style='font-size:12.0pt;line-height:115%'>Índice</span></u></b></p>


<p  style='margin-left:0cm'><span><a
href="#_Toc492509030">Introducción<span style='color:windowtext;display:none;
text-decoration:none'>. </span></a></span></p>

<p  style='margin-left:0cm'><span><a
href="#_Toc492509031">Inicio – Registro<span style='color:windowtext;
display:none;text-decoration:none'>. </span></a></span></p>

<p  style='margin-left:0cm'><span><a
href="#_Toc492509032">Inicio – Inicio de sesión<span style='color:windowtext;
display:none;text-decoration:none'>. </span></a></span></p>

<p  style='margin-left:0cm'><span><a
href="#_Toc492509033">Almacén – Inicio<span style='color:windowtext;display:
none;text-decoration:none'>. </span></a></span></p>

<p  style='margin-left:0cm'><span><a
href="#_Toc492509034">Almacén - Artículos<span style='color:windowtext;
display:none;text-decoration:none'>. </span></a></span></p>

<p  style='margin-left:0cm'><span><a
href="#_Toc492509035">Almacén - Categorías<span style='color:windowtext;
display:none;text-decoration:none'>. </span></a></span></p>

<p  style='margin-left:0cm'><span><a
href="#_Toc492509036">Configuración<span style='color:windowtext;display:none;
text-decoration:none'>. </span></a></span></p>

<p  style='margin-left:0cm'><span><a
href="#_Toc492509037">Almacén - Presupuesto<span style='color:windowtext;
display:none;text-decoration:none'>. </span></a></span></p>

<p  style='margin-left:0cm'><span><a
href="#_Toc492509038">Almacén - Recaudación Diaria<span style='color:windowtext;
display:none;text-decoration:none'>. </span><span
style='color:windowtext;display:none;text-decoration:none'>10</span></a></span></p>

<p  style='margin-left:0cm'><span><a
href="#_Toc492509039">Ventas – Clientes<span style='color:windowtext;
display:none;text-decoration:none'>. </span><span
style='color:windowtext;display:none;text-decoration:none'>11</span></a></span></p>

<p  style='margin-left:0cm'><span><a
href="#_Toc492509040">Ventas – Venta<span style='color:windowtext;display:none;
text-decoration:none'>. </span><span
style='color:windowtext;display:none;text-decoration:none'>12</span></a></span></p>

<p  style='margin-left:0cm'><span><a
href="#_Toc492509041">Ventas – Mensual<span style='color:windowtext;display:
none;text-decoration:none'> </span><span
style='color:windowtext;display:none;text-decoration:none'>15</span></a></span></p>

<p  style='margin-left:0cm'><span><a
href="#_Toc492509042">Compras – Proveedores<span style='color:windowtext;
display:none;text-decoration:none'>. </span><span
style='color:windowtext;display:none;text-decoration:none'>16</span></a></span></p>

<p  style='margin-left:0cm'><span><a
href="#_Toc492509043">Compras – Ingresos<span style='color:windowtext;
display:none;text-decoration:none'>. </span><span
style='color:windowtext;display:none;text-decoration:none'>16</span></a></span></p>

<p  style='margin-left:0cm'><span><a
href="#_Toc492509044">Acceso – Usuario<span style='color:windowtext;display:
none;text-decoration:none'>. </span><span
style='color:windowtext;display:none;text-decoration:none'>18</span></a></span></p>

<p  style='margin-left:0cm'><span><a
href="#_Toc492509045">Acceso – Roles y Permisos.<span style='color:windowtext;
display:none;text-decoration:none'> </span><span
style='color:windowtext;display:none;text-decoration:none'>18</span></a></span></p>

<p  style='margin-left:0cm'><span><a
href="{{route('diccionario')}}">Diccionario de datos.<span style='color:windowtext;
display:none;text-decoration:none'> </span><span
style='color:windowtext;display:none;text-decoration:none'>18</span></a></span></p>
<br>
<h1><a name="_Toc492509030">Introducción</a> </h1>


<p>El
presente sistema surgió de la idea de generarlo para uso propio, en donde se
incorporaron diferentes módulos, tales como para generar un conteo de
productos, obtener el stock total, ganancias, guardar información de los
proveedores, de los clientes, también generar comprobantes si se desea. Tener un
seguimiento de los productos tanto, como ingreso o venta, además genera alertas
de los productos faltantes o los que están por falta, también genera una serie
de estadística de las ventas. </p>

<p style='text-align:justify;text-justify:inter-ideograph'>También
tiene manejo de los usuarios, en donde se les puede asignar roles, y permisos
para los diferentes módulos, acciones de cada módulo, o el sistema entero.</p>

<h1><a name="_Toc492509031">Inicio – Registro</a></h1>

<p class=MsoListParagraph style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'>
</span></span>En esta sección se podrá registrarse al usuario, para luego
iniciar el sistema.</p>

<img class="img-thumbnail" class="img-responsive" src="{{asset('imagenes/manual/')}}/image001.png">



<h1><a name="_Toc492509032">Inicio – Inicio de sesión</a></h1>



<p class=MsoListParagraphCxSpFirst style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'>
</span></span>En esta sección una vez registrado y haber ingresado los datos
correctos se podrá ingresar al sistema cuando lo desee el usuario.</p>

<p class=MsoListParagraphCxSpLast style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'>
</span></span>El usuario puede mantener la sesión, apretando la palomita, recuérdame.
</p>

<p style='text-align:justify;text-justify:inter-ideograph'><b><span
style='font-size:12.0pt;line-height:115%'><img class="img-thumbnail" width=345 height=348
id="Imagen 48" src="{{asset('imagenes/manual/')}}/image002.png"></span></b><b><u><span
style='font-size:12.0pt;line-height:115%'>  </span></u></b></p>

<p style='text-align:justify;text-justify:inter-ideograph'><b><u><span
style='font-size:12.0pt;line-height:115%'><span style='text-decoration:none'></span></span></u></b></p>



<h1><a name="_Toc492509033">Almacén – Inicio</a></h1>



<p class=MsoListParagraph style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>Cuando inicia el sistema por primera vez, nos saldrá un modal
para configurar dicho sistema con ciertos requisitos necesarios para el
sistema, los cuales se podrán modificar en el apartado “Configuración”.</p>

<p style='text-align:justify;text-justify:inter-ideograph'><img class="img-thumbnail"
width=726 height=260 id="Imagen 1"
src="{{asset('imagenes/manual/')}}/image003.png"></p>

<p class=MsoListParagraphCxSpFirst style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>Una vez configurado, tendremos un menú y un inicio indicándonos los
productos faltantes, o que están por faltar, también una serie de estadísticas sobre
ventas.</p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:0cm;text-align:justify;
text-justify:inter-ideograph'></p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:0cm;text-align:justify;
text-justify:inter-ideograph'><img class="img-thumbnail" width=615 height=484 id="Imagen 49"
src="{{asset('imagenes/manual/')}}/image004.png"></p>

<p class=MsoListParagraphCxSpLast style='margin-left:0cm;text-align:justify;
text-justify:inter-ideograph'><img class="img-thumbnail" width=616 height=373 id="Imagen 50"
src="{{asset('imagenes/manual/')}}/image005.png"></p>

<p style='text-align:justify;text-justify:inter-ideograph'></p>



<h1><a name="_Toc492509034">Almacén - Artículos</a></h1>



<p class=MsoListParagraph style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>Para agregar un artículo, borrar o editar nos vamos al apartado
artículo.</p>

<p style='text-align:justify;text-justify:inter-ideograph'><img class="img-thumbnail"
width=724 height=304 id="Imagen 2"
src="{{asset('imagenes/manual/')}}/image006.png" class="img-thumbnail"></p>

<p class=MsoListParagraph style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'>-<span style='font:7.0pt "Times New Roman"'>
</span>Si deseamos buscar un artículo lo hacemos desde la entrada de texto
poniendo el nombre o código del producto.</p>

<p style='text-align:justify;text-justify:inter-ideograph'><img class="img-thumbnail"
width=725 height=220 id="Imagen 3"
src="{{asset('imagenes/manual/')}}/image007.png"></p>

<p class=MsoListParagraphCxSpFirst style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'>-<span style='font:7.0pt "Times New Roman"'>
</span>Si deseamos agregar un artículo rápidamente lo podemos hacer desde el
mismo índex.</p>

<p class=MsoListParagraphCxSpLast style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'>-<span style='font:7.0pt "Times New Roman"'>
</span>También podemos ir al botón nuevo y agregar un artículo de diferente
manera.</p>

<p style='text-align:justify;text-justify:inter-ideograph'><img class="img-thumbnail"
width=729 height=208 id="Imagen 4"
src="{{asset('imagenes/manual/')}}/image008.png"></p>

<p class=MsoListParagraph style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'>-<span style='font:7.0pt "Times New Roman"'>
</span>Si deseamos tener un seguimiento del producto, lo podemos hacer haciendo
clip en el producto que deseamos</p>

<p style='text-align:justify;text-justify:inter-ideograph'><img class="img-thumbnail"
width=703 height=322 id="Imagen 6"
src="{{asset('imagenes/manual/')}}/image009.png"></p>

<p class=MsoListParagraphCxSpFirst style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'>-<span style='font:7.0pt "Times New Roman"'>
</span>Si queremos editar un producto nos dirigiremos al botón editar.</p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:0cm;text-align:justify;
text-justify:inter-ideograph'></p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:0cm;text-align:justify;
text-justify:inter-ideograph'><img class="img-thumbnail" width=688 height=367 id="Imagen 5"
src="{{asset('imagenes/manual/')}}/image010.png"></p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:0cm;text-align:justify;
text-justify:inter-ideograph'></p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:0cm;text-align:justify;
text-justify:inter-ideograph'></p>

<p class=MsoListParagraphCxSpLast style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'>-<span style='font:7.0pt "Times New Roman"'>
</span>Por supuesto si queremos borrar el producto vamos al botón borrar, el
cual no se borrar sino se deshabilitará y no se podrá usar para vender o para
ingresar productos al sistema.</p>

<p style='text-align:justify;text-justify:inter-ideograph'><img class="img-thumbnail"
width=567 height=200 id="Imagen 7"
src="{{asset('imagenes/manual/')}}/image011.png"></p>

<p style='text-align:justify;text-justify:inter-ideograph'></p>

<p class=MsoListParagraph style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'>-<span style='font:7.0pt "Times New Roman"'>
</span>Para imprimir los códigos de los productos seleccionamos los productos
que deseamos imprimir y le damos clip en el botón de la impresora (<img class="img-thumbnail"
width=13 height=11 id="Imagen 8"
src="{{asset('imagenes/manual/')}}/image012.png">) y nos saldrá lo siguiente
pdf:</p>

<p style='text-align:justify;text-justify:inter-ideograph'><img class="img-thumbnail"
width=368 height=348 id="Imagen 9"
src="{{asset('imagenes/manual/')}}/image013.png"></p>



<h1><a name="_Toc492509035">Almacén - Categorías</a></h1>



<p class=MsoListParagraphCxSpFirst style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>Para agregar, eliminar (La cual no se elimina sino se
deshabilita), o editar es muy sencillo:</p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:33.3pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-family:
Wingdings'>§<span style='font:7.0pt "Times New Roman"'> </span></span>Listado
de categorías</p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:33.3pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-family:
Wingdings'>§<span style='font:7.0pt "Times New Roman"'> </span></span>Agregado
de categoría</p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:33.3pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-family:
Wingdings'>§<span style='font:7.0pt "Times New Roman"'> </span></span>Editar
categoría</p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:33.3pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-family:
Wingdings'>§<span style='font:7.0pt "Times New Roman"'> </span></span>Eliminar
categoría</p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:0cm;text-align:justify;
text-justify:inter-ideograph'><img class="img-thumbnail" width=718 height=250 id="Imagen 12"
src="{{asset('imagenes/manual/')}}/image014.png"></p>

<p class=MsoListParagraphCxSpLast style='margin-left:0cm;text-align:justify;
text-justify:inter-ideograph'></p>



<h1><a name="_Toc492509036">Configuración</a></h1>



<p class=MsoListParagraphCxSpFirst style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>Esta es la sección de editar la configuración del sistema.</p>

<p class=MsoListParagraphCxSpLast style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>Tendremos diferentes secciones como las que se detallan en la
siguiente imagen.</p>

<p style='text-align:justify;text-justify:inter-ideograph'><img class="img-thumbnail"
width=718 height=341 id="Imagen 13"
src="{{asset('imagenes/manual/')}}/image015.png"> </p>



<h1><a name="_Toc492509037">Almacén - Presupuesto</a></h1>



<p class=MsoListParagraphCxSpFirst style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>En este apartado se puede hacer un presupuesto en donde el stock
no se descontará hasta realizar la venta, para generar un nuevo presupuesto se tiene
que ir al botón nuevo.</p>

<p class=MsoListParagraphCxSpLast style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>En la caja de texto de buscar sirve para buscar los presupuestos
atreves del día que se generó dicho presupuesto.</p>

<p style='text-align:justify;text-justify:inter-ideograph'><img class="img-thumbnail"
width=720 height=162 id="Imagen 14"
src="{{asset('imagenes/manual/')}}/image016.png"></p>

<p class=MsoListParagraph style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>Aquí una captura del apartado para crear un presupuesto. </p>

<p style='text-align:justify;text-justify:inter-ideograph'><img class="img-thumbnail"
width=725 height=235 id="Imagen 16"
src="{{asset('imagenes/manual/')}}/image017.png"></p>

<p class=MsoListParagraph style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>En el botón detalles tendremos una descripción del presupuesto.</p>

<p style='text-align:justify;text-justify:inter-ideograph'><img class="img-thumbnail"
width=726 height=152 id="Imagen 17"
src="{{asset('imagenes/manual/')}}/image018.png"></p>

<p class=MsoListParagraph style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>También se podrá descargar un pdf de dicho presupuesto que luego
servirá para imprimirse si se desea.</p>

<p style='text-align:justify;text-justify:inter-ideograph'><img class="img-thumbnail"
width=505 height=398 id="Imagen 18"
src="{{asset('imagenes/manual/')}}/image019.png"></p>

<p class=MsoListParagraph style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>En el botón realizar venta, se podrá realizar la venta y se
descontarán los productos del stock, en donde acabe decir que se pedirán nuevos
datos para completar la venta.</p>

<p style='text-align:justify;text-justify:inter-ideograph'><img class="img-thumbnail"
width=731 height=189 id="Imagen 20"
src="{{asset('imagenes/manual/')}}/image020.png"></p>

<p class=MsoListParagraph style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>Una vez realizada la venta, el estado pasara de venta sin
realizar(<img class="img-thumbnail" width=70 height=14 id="Imagen 21"
src="{{asset('imagenes/manual/')}}/image021.png">) a venta realizada (<img class="img-thumbnail"
width=56 height=14 id="Imagen 23"
src="{{asset('imagenes/manual/')}}/image022.png">). Y se re direccionará al
apartado de ventas.  </p>



<h1><a name="_Toc492509038">Almacén - Recaudación Diaria</a></h1>



<p class=MsoListParagraph style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>Esta sección se encarga de sumar las ganancias en bruto del día, tanto
de ventas, como ventas mensuales (Clientes a cuenta corriente)</p>

<p style='text-align:justify;text-justify:inter-ideograph'></p>

<p class=MsoListParagraphCxSpFirst style='margin-left:0cm;text-align:justify;
text-justify:inter-ideograph'><img class="img-thumbnail" width=700 height=105 id="Imagen 25"
src="{{asset('imagenes/manual/')}}/image023.png"></p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>En la caja de texto de buscar sirve para buscar los reportes de
recaudaciones diarias atreves del día que se generó dicha recaudación.</p>

<p class=MsoListParagraphCxSpLast style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>Si le damos clip en la sección detalles vamos a ver todos los
productos que se han vendido en dicha fecha de la recaudación.</p>

<p style='text-align:justify;text-justify:inter-ideograph'><img class="img-thumbnail"
width=697 height=227 id="Imagen 26"
src="{{asset('imagenes/manual/')}}/image024.png"></p>

<p style='text-align:justify;text-justify:inter-ideograph'></p>

<p class=MsoListParagraph style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>También podremos descargar un pdf para tenerlo a mano por si
queremos revisarlo. </p>

<p style='text-align:justify;text-justify:inter-ideograph'><img class="img-thumbnail"
width=586 height=338 id="Imagen 27"
src="{{asset('imagenes/manual/')}}/image025.png"></p>

<p class=MsoListParagraphCxSpFirst style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>Si apretamos el botón anular pasara el estado de sin revisar (<img class="img-thumbnail"
width=35 height=12 id="Imagen 28"
src="{{asset('imagenes/manual/')}}/image026.png">) ha revisado(<img class="img-thumbnail" width=33
height=12 id="Imagen 30" src="{{asset('imagenes/manual/')}}/image027.png">) </p>

<p class=MsoListParagraphCxSpLast style='margin-left:0cm;text-align:justify;
text-justify:inter-ideograph'></p>



<h1><a name="_Toc492509039">Ventas – Clientes</a></h1>



<p class=MsoListParagraphCxSpFirst style='margin-left:0cm;text-align:justify;
text-justify:inter-ideograph'><b><u><span style='font-size:12.0pt;line-height:
115%'><span style='text-decoration:none'></span></span></u></b></p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>Para buscar a los clientes, se debe especificar el nombre del
cliente en la caja de texto buscar.</p>

<p class=MsoListParagraphCxSpLast style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>En esta sección almacenaremos los clientes, los dos tipos de
clientes que existen en el sistema, clientes comunes, y clientes con cuenta
corriente. En donde se podrán agregar, borrar (no se borran sino se desactivan
y no se ven en ningún lado), y modificar.  A continuación, una captura de lo
sencillo que es hacer este paso.</p>

<p style='text-align:justify;text-justify:inter-ideograph'><img class="img-thumbnail"
width=734 height=342 id="Imagen 31"
src="{{asset('imagenes/manual/')}}/image028.png"></p>

<p style='text-align:justify;text-justify:inter-ideograph'></p>



<h1><a name="_Toc492509040">Ventas – Venta</a></h1>



<p class=MsoListParagraphCxSpFirst style='margin-left:0cm;text-align:justify;
text-justify:inter-ideograph'><b><u><span style='font-size:12.0pt;line-height:
115%'><span style='text-decoration:none'></span></span></u></b></p>

<p class=MsoListParagraphCxSpLast style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>Esta es la sección en donde se producen las ventas. </p>

<p style='text-align:justify;text-justify:inter-ideograph'><img class="img-thumbnail"
width=724 height=166 id="Imagen 32"
src="{{asset('imagenes/manual/')}}/image029.png"></p>

<p class=MsoListParagraphCxSpFirst style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>El botón buscar sirve para encontrar más rápido dicha venta,
colocando el número del comprobante buscaremos la venta que deseamos.</p>

<p class=MsoListParagraphCxSpLast style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>Si apretamos el nombre de algún cliente, el sistema nos mostrara
toda la información del cliente.</p>

<p style='text-align:justify;text-justify:inter-ideograph'><img class="img-thumbnail"
width=723 height=240 id="Imagen 33"
src="{{asset('imagenes/manual/')}}/image030.png"></p>

<p class=MsoListParagraph style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>Si apretamos el comprobante, obtendremos una vista para imprimir
atreves de una impresora de ticket, y nos devolverá un resumen de la venta.</p>

<p style='text-align:justify;text-justify:inter-ideograph'><img class="img-thumbnail"
width=723 height=348 id="Imagen 34"
src="{{asset('imagenes/manual/')}}/image031.png"></p>

<p class=MsoListParagraph style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>Volviendo a la vista principal de ventas, si apretamos el botón
detalle vamos a poder visualizar datos de la venta.</p>

<p style='text-align:justify;text-justify:inter-ideograph'><img class="img-thumbnail"
width=711 height=393 id="Imagen 35"
src="{{asset('imagenes/manual/')}}/image032.png"></p>

<p class=MsoListParagraph style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>Cabe aclarar que dicha venta se puede guardar en pdf. </p>

<p style='text-align:justify;text-justify:inter-ideograph'><img class="img-thumbnail"
width=586 height=524 id="Imagen 36"
src="{{asset('imagenes/manual/')}}/image033.png"></p>

<p class=MsoListParagraph style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>Para generar una nueva venta tendremos que volver al apartado
venta, y al lado del botón buscar, encontraremos el botón nuevo. </p>

<p style='text-align:justify;text-justify:inter-ideograph'><img class="img-thumbnail"
width=697 height=373 id="Imagen 38"
src="{{asset('imagenes/manual/')}}/image034.png"></p>

<p class=MsoListParagraphCxSpFirst style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>Si un cliente no existe se podrá agregar uno apretando el botón a
la orilla de nuevo cliente.</p>

<p class=MsoListParagraphCxSpLast style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>Con el botón anular podremos anular dicha venta. </p>



<h1><a name="_Toc492509041">Ventas – Mensual</a></h1>



<p class=MsoListParagraph style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>En esta sección tendremos los clientes que compran y pagan
mensualmente, en donde cada vez que realicen el pago y vuelva a sacar para
pagar luego iniciara la venta de cero. </p>

<p style='text-align:justify;text-justify:inter-ideograph'><img class="img-thumbnail"
width=689 height=129 id="Imagen 39"
src="{{asset('imagenes/manual/')}}/image035.png"></p>

<p class=MsoListParagraphCxSpFirst style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>Si damos clip en el botón nuevo tendremos la opción de crear una
nueva venta mensual, pero si el cliente tiene una cuenta mensual y no esta
anulada se agregará automáticamente a la venta mensual actual. Si no se creará
una nueva. </p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>Si damos clip sobre el cliente nos dará información sobre el
cliente como el apartado de ventas.  </p>

<p class=MsoListParagraphCxSpLast style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>Para buscar una venta mensual, hay que colocar el nombre del
cliente y apretar el botón buscar.</p>

<p style='text-align:justify;text-justify:inter-ideograph'><img class="img-thumbnail"
width=727 height=273 id="Imagen 40"
src="{{asset('imagenes/manual/')}}/image036.png"></p>

<p class=MsoListParagraphCxSpFirst style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>Cabe mencionar que se puede agregar un nuevo cliente sino
existiera. </p>

<p class=MsoListParagraphCxSpLast style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>Una vez guardada la venta, podemos apretar el botón detalle, y
ahí ver detalladamente los datos que nos sean útiles, tales como productos,
fecha, etc. </p>

<p style='text-align:justify;text-justify:inter-ideograph'><img class="img-thumbnail"
width=720 height=176 id="Imagen 41"
src="{{asset('imagenes/manual/')}}/image037.png"></p>

<p class=MsoListParagraph style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>También podemos descargar un pdf, para que el cliente revise los
productos que saco mensualmente si lo desea.</p>



<h1><a name="_Toc492509042">Compras – Proveedores</a></h1>



<p class=MsoListParagraphCxSpFirst style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>En esta sección podremos agregar, editar o borrar proveedores,
estos proveedores son los que nos proporcionaran productos a nuestro negocio.</p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>En la siguiente imagen podremos observar estas 3 sencillas
actividades.</p>

<p class=MsoListParagraphCxSpLast style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>Cabe mencionar que tiene su botón de búsqueda de proveedor, en
donde el proveedor se puede buscar con su nombre.</p>

<p style='text-align:justify;text-justify:inter-ideograph'><span
style='font-size:12.0pt;line-height:115%'><img class="img-thumbnail" width=727 height=338
id="Imagen 15" src="{{asset('imagenes/manual/')}}/image038.png"></span></p>



<h1><a name="_Toc492509043">Compras – Ingresos</a></h1>



<p class=MsoListParagraphCxSpFirst style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span><span style='font-size:11.0pt;line-height:115%'>En esta sección </span>vamos
a poder ingresar productos a nuestro sistema, en donde el usuario podrá agregar
los productos a un comprobante y a su respectivo proveedor.</p>

<p class=MsoListParagraphCxSpLast style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>Es muy similar a la parte de ventas, pero sin más vueltas voy a
mostrarlo en unas imágenes.</p>

<p style='text-align:justify;text-justify:inter-ideograph'><img class="img-thumbnail"
width=724 height=115 id="Imagen 19"
src="{{asset('imagenes/manual/')}}/image039.png"></p>

<p class=MsoListParagraphCxSpFirst style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>Se puede buscar el ingreso en la caja de texto buscar, colocando
el número de ingreso. </p>

<p class=MsoListParagraphCxSpLast style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>En la sección de nuevo tendremos una plantilla en donde
agregaremos los productos, y el proveedor que nos vende dicho proveedor, como
lo muestro en la imagen.</p>

<p style='text-align:justify;text-justify:inter-ideograph'><img class="img-thumbnail"
width=721 height=246 id="Imagen 22"
src="{{asset('imagenes/manual/')}}/image040.png"></p>

<p class=MsoListParagraphCxSpFirst style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>Cabe mencionar que se puede agregar un proveedor nuevo sino
existiera.</p>

<p class=MsoListParagraphCxSpLast style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>Volviendo al inicio de ingresos, podemos agregar que si damos
clip en un proveedor de una factura nos enseñara toda la información del
proveedor, como lo muestra la imagen siguiente.</p>

<p style='text-align:justify;text-justify:inter-ideograph'><img class="img-thumbnail"
width=713 height=205 id="Imagen 24"
src="{{asset('imagenes/manual/')}}/image041.png"> </p>

<p class=MsoListParagraphCxSpFirst style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>Si deseamos cancelar o anular dicho comprobante solo basta con
darle clip al botón anular.</p>

<p class=MsoListParagraphCxSpLast style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>Si damos clip en el botón detalles nos mostrara un detalle de
dicho ingreso como lo nuestra la imagen.</p>

<p style='text-align:justify;text-justify:inter-ideograph'><img class="img-thumbnail"
width=714 height=142 id="Imagen 37"
src="{{asset('imagenes/manual/')}}/image042.png"></p>

<p class=MsoListParagraph style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>Si deseamos obtener el pdf del comprobante, solo hay que apretar
el botón que dice descargar comprobante, y nos descargara un archivo con todos
los datos del comprobante.</p>

<p style='text-align:justify;text-justify:inter-ideograph'><img class="img-thumbnail"
width=586 height=356 id="Imagen 42"
src="{{asset('imagenes/manual/')}}/image043.png"></p>

<p style='text-align:justify;text-justify:inter-ideograph'></p>



<h1><a name="_Toc492509044">Acceso – Usuario</a></h1>



<p class=MsoListParagraph style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>Esta sección es una de las principales del sistema, ya que se
puede agregar, modificar o borrar (Se desactivan, no se borra ningún usuario,
solo por un motivo de auditoria.) usuarios para que entren al sistema, también se
puede asignar roles y permisos. En la siguiente imagen mostrare como agregar o
modificar un usuario.</p>

<p style='text-align:justify;text-justify:inter-ideograph'><img class="img-thumbnail"
width=727 height=283 id="Imagen 43"
src="{{asset('imagenes/manual/')}}/image044.png"> </p>

<p style='text-align:justify;text-justify:inter-ideograph'></p>



<h1><a name="_Toc492509045">Acceso – Roles y Permisos.</a></h1>



<p class=MsoListParagraphCxSpFirst style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>Los roles y permiso son los que nos da acceso al sistema, cada sección
del sistema, nombrada anteriormente tiene un permiso, que será asignado a un
rol, si el usuario tiene el rol que le fue asignado un permiso, solo podrá ver
esa sección, la cual fue asignada al rol. </p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>Existen diferentes permisos, como de una sección poder borrar,
editar o agregar, o también se puede agregar un módulo completo o agregar el
sistema entero.</p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>En este sistema existen dos roles distintos, el administrador, y
el usuario.</p>

<p class=MsoListParagraphCxSpLast style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>A continuación, colocare una foto de cada sección. </p>

<p style='text-align:justify;text-justify:inter-ideograph'><img class="img-thumbnail"
width=709 height=272 id="Imagen 44"
src="{{asset('imagenes/manual/')}}/image045.png"></p>

<p class=MsoListParagraph style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>Cuando agregamos un rol podemos agregar permisos a dicho rol.</p>

<p style='text-align:justify;text-justify:inter-ideograph'><img class="img-thumbnail"
width=712 height=240 id="Imagen 45"
src="{{asset('imagenes/manual/')}}/image046.png"></p>

<p style='text-align:justify;text-justify:inter-ideograph'></p>

<p class=MsoListParagraph style='margin-left:18.0pt;text-align:justify;
text-justify:inter-ideograph;text-indent:-18.0pt'><span style='font-size:11.0pt;
line-height:115%'>-<span style='font:7.0pt "Times New Roman"'>
</span></span>A la hora de crear un permiso se puede agregar a que rol será asignado.
</p>
</div>
</div>
</section>
@endsection
