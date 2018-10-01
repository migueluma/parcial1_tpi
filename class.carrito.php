<?php
    @session_start();
    
    class Carrito
    {
        function agregaElemento($producto, $cantidad)
        {
            if (!isset($_SESSION["carrito"]))
            {
                $_SESSION["carrito"][$producto]=$cantidad;
            } /* if (!isset($_SESSION["carrito"])) */
            else
            {
                foreach($_SESSION["carrito"] as $nombre => $unidades)
                {
                    if ($_GET["producto"]==$nombre)
                    {
                         $_SESSION["carrito"][$nombre]+=$cantidad;
                         $encontrado=1;
                     } /* if ($_GET["producto"]==$nombre) */
                  } /* foreach($_SESSION["carrito"] as $nombre => $unidades) */
                  if (!$encontrado)
                {
                    $_SESSION["carrito"][$_GET["producto"]]=$cantidad;
                } /* if (!$encontrado) */
            }  /* else -> if (!isset($_SESSION["carrito"])) */
        } /* function agregaElemento($producto) */
        
        function borraElemento($nombre)
        {
            if (isset($_SESSION["carrito"]))
            {
                foreach($_SESSION["carrito"] as $nombre => $unidades)
                {
                    if ($_GET["eliminar"]==$nombre)
                    {
                         if ($_SESSION["carrito"][$nombre]>0)
                        {
                            $_SESSION["carrito"][$nombre]--;
                        } /* if ($_SESSION["carrito"][$nombre]>0) */
                     } /* if ($_GET["eliminar"]==$nombre) */
                  } /* foreach($_SESSION["carrito"] as $nombre => $unidades) */
            } /* if (isset($_SESSION["carrito"])) */        
        } /* function borraElemento($producto) */
        
        function mostrarCarrito()
        {
            $productos =& Almacen::getInstancia();
            foreach($_SESSION["carrito"] as $nombre => $unidades)
            {
                if ($unidades>0)
                {
                    echo "<tr>";
                    echo "  <td><div align=\"center\">$unidades</div></td>";
                    echo "  <td><div align=\"center\">$nombre</div></td>";
                    echo "  <td><div align=\"right\">$&nbsp;".( number_format( $productos->getPrecio($productos->getTienda(),$nombre)*$unidades ) )."</div></td>";
                    echo "  <td><div align=\"center\"><a href=\"?eliminar=$nombre\" class=\"enlace\">Eliminar</a></div></td>";
                    echo "</tr>";
                } /* if ($unidades>0) */                
            } /* foreach($_SESSION["carrito"] as $nombre => $unidades) */
        } /* function mostrarCarrito($formato="") */
        
        function calcularTotal()
        {
            $productos =& Almacen::getInstancia();
            foreach($_SESSION["carrito"] as $nombre => $unidades)
            {
                $total = $total + (double)($productos->getPrecio($productos->getTienda(),$nombre)*$unidades);
                $total = number_format($total, 2);
            } /* foreach($_SESSION["carrito"] as $nombre => $unidades) */
            return $total;
        } /* function calcularTotal() */
            
    } /* class Carrito */
?>
