<?php    
    include("class.almacen.php");    
    include("class.carrito.php");
    $productos=new Almacen;
    $compra=new Carrito;
	
	//error_reporting(0);
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>
<html>
  <head>
    <title>Ejemplo de carrito de compras con PHP y sesiones</title>
  </head>
  <body>
  <table width=95% border=0 align="center" cellpadding=0 cellspacing=0>
  <tbody>
    <tr>
      <td width="20%" valign=top><br>
        <table width="95%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#6699cc">
          <tr>
            <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="71%"> <p align="center"> <br>
                      <font color="#000099" face="Courier New"><strong><font size="4">Elegir
                      categor&iacute;a </font></strong></font>
                    <p>
                        <?php
						$productos->despliegaArreglo($productos->getCategorias($productos->getTienda()),"<br>",$_SERVER["PHP_SELF"], "enlace", "categoria");
                        ?>
                        </p>
                        <br>
                    </p>
                  </td>
                </tr>
              </table></td>
          </tr>
        </table>
        <p>&nbsp;</p></td>
      <td height="100%" vAlign=top><br>
        <table width="95%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#6699cc">
          <tr>
            <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="71%"><div align="left">
                      <p align="center"><br><font color="#000099">
                        <strong><font size="4">Elegir producto / cantidad
                        </font></strong></font></p>
                        
                      <?php
                            if ($_GET["categoria"])
                            {
                                echo "<center>| ";
                                $productos->despliegaArreglo($productos->getElementosCate($productos->getTienda(), $_GET["categoria"]), " | ", $_SERVER["PHP_SELF"], "enlace", "producto");
                                echo "<center>";
                            }
                            if ($_GET["producto"])
                            {                                
                      ?>
                                <form name="frmAgregarProducto" action="" method="post">          
                                  <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr bgcolor="#CCCCCC">
                                      <td> <div align="center"><font face="Courier New"><strong><font color="#FFFFFF">Cantidad</font></strong></font></div></td>
                                      <td> <div align="center"><font face="Courier New"><strong><font color="#FFFFFF">Producto</font></strong></font></div></td>
                                      <td> <div align="center"><font face="Courier New"><strong><font color="#FFFFFF">Descripci&oacute;n</font></strong></font></div></td>
                                      <td> <div align="center"><font face="Courier New"><strong><font color="#FFFFFF">Precio</font></strong></font></div></td>                              
                                    </tr>
                                    <tr>
                                      <td><div align="center">&nbsp;</div></td>
                                      <td><div align="center">&nbsp;</div></td>
                                      <td><div align="center">&nbsp;</div></td>
                                      <td><div align="center">&nbsp;</div></td>
                                    </tr>
                                    <tr>
                                      <td><div align="center">
                                        <input name="txtCantidad" type="text" id="txtCantidad" size="2" value="1">
                                      </div></td>
                                      <td><div align="center"></div></td>
                                      <td><div align="center"><?php echo $productos->getDescripcion($productos->getTienda(),$_GET["producto"]) ?></div></td>
                                      <td><div align="center"><?php echo "$&nbsp;".number_format($productos->getPrecio($productos->getTienda(),$_GET["producto"])) ?></div></td>
                                    </tr>
                                    <tr>
                                      <td><div align="center">&nbsp;</div></td>
                                      <td><div align="center">&nbsp;</div></td>
                                      <td><div align="center">&nbsp;</div></td>
                                      <td><div align="center">&nbsp;</div></td>
                                    </tr>
                                    <tr>
                                      <td><div align="center"><font face="Courier New">&nbsp;</font></div></td>
                                      <td><div align="center"><font face="Courier New">&nbsp;</font></div></td>
                                      <td><div align="center"><font face="Courier New">&nbsp;</font></div></td>
                                      <td><div align="center"><font face="Courier New">
                                        <input type="submit" name="btnAgregar" value="Agregar">
                                        &nbsp;</font></div></td>
                                    </tr>
                                  </table>
                                  </form>
                      <?php
                              }
                      ?>
                      <br>                            
                        </p>
                    </div></td>
                </tr>
              </table></td>
          </tr>
        </table>
        <br>
        <table width="95%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#6699cc">
          <tr>
            <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="71%"><div align="left">
                      <p align="center"><font color="#000099" face="Courier New"><br>
                        <strong><font size="4">Nuestro carrito de compras</font></strong></font></p>
                        <?php
                            if ($_GET["producto"] and $_POST["btnAgregar"]!="")
                            {
                                $compra->agregaElemento($_GET["producto"], $_POST["txtCantidad"]);
                            }
                                                    
                            if (isset($_SESSION["carrito"]))
                            {
                                if ($_GET["eliminar"])
                                {
                                    $compra->borraElemento($_GET["eliminar"]);
                                }
                        ?>                     
                              <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr bgcolor="#CCCCCC">
                                  <td> <div align="center"><font face="Courier New"><strong><font color="#FFFFFF">Cantidad</font></strong></font></div></td>
                                  <td> <div align="center"><font face="Courier New"><strong><font color="#FFFFFF">Producto</font></strong></font></div></td>
                                  <td> <div align="center"><font face="Courier New"><strong><font color="#FFFFFF">Subtotales</font></strong></font></div></td>
                                  <td> <div align="center"><font face="Courier New"><strong></strong></font></div></td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                </tr>
                                <?php echo $compra->mostrarCarrito();    ?>
                                <tr>
                                  <td><hr noshade></td>
                                  <td><hr noshade></td>
                                  <td><hr noshade></td>
                                  <td><hr noshade></td>
                                </tr>
                                <tr>
                                  <td><font face="Courier New">&nbsp;</font></td>
                                  <td><div align="right"><font face="Courier New"><b>&nbsp;Total:
                                      &nbsp;</b></font></div></td>
                                  <td><div align="right"><b><?php echo "$&nbsp;".$compra->calcularTotal(); ?></b></div></td>
                                  <td><div align="right"><font face="Courier New">&nbsp;</font></div></td>
                                </tr>
                              </table>                            
                        <?php                     
                            }
                        ?>                       
                        <br>                        
                    </div></td>
                </tr>
              </table></td>
          </tr>
        </table>
        </td>
    </tr>
    <!--Inicio de las secciones-->
    <!--Fin de las secciones-->
  </tbody>
</table>
</body>
</html>

