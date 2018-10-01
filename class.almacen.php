<?php     
    class Almacen 
    { 
        var $tienda = array( 
                "Accesorios"    => array( 
                    "Microfono"        => array("17","Microfono Inalámbrico"), 
                    "Lentes"        => array("22","Para protejer los ojos"), 
                    "Filtro"        => array("10","Filtro para monitor") 
                                                ), 
                "Software"        => array( 
                    "Office"        => array("5000","Suite de oficina"), 
                    "Dreamweaver"    => array("6000","Suite para desarrollo web"), 
                    "Matlab"        => array("2000","Suite matemática") 
                                                ), 
                "Hardware"    => array( 
                    "Teclado"    => array("250","Teclado Qwerty"), 
                    "Ratón"        => array("80","Ratón Inalámbrico"), 
                    "Monitor"    => array("2000","Pantalla plana") 
                ) 
            ); 
         
        function getTienda() 
        { 
            return $this->tienda; 
        } /* function getTienda() */ 

        function getCategorias($arreglo) 
        { 
            foreach ($arreglo as $nombre=>$email) 
            { 
               $catego[]=$nombre; 
            } 
            return $catego; 
        } /* function getCategorias($arreglo) */ 
         
        function getElementosCate($arreglo, $strTabla) 
        { 
            foreach ($arreglo[$strTabla] as $nombre=>$valores) 
            { 
                $ele[]=$nombre; 
            } 
            return $ele; 
        } /* function getElementosCate($arreglo, $strTabla)  */ 
         
        function getPrecio($arreglo, $strNombre) 
        { 
            foreach ($arreglo as $grupo=>$elemento) 
            { 
                foreach ($elemento as $nombre=>$datos) 
                { 
                    if ($nombre == $strNombre) 
                    { 
                        return $datos[0]; 
                    } 
                }     
            } 
        } /* function getPrecio($arreglo, $strNombre) */ 
         
        function getDescripcion($arreglo, $strNombre) 
        { 
            foreach ($arreglo as $grupo=>$elemento) 
            { 
                foreach ($elemento as $nombre=>$datos) 
                { 
                    if ($nombre == $strNombre) 
                    { 
                        return $datos[1]; 
                    } 
                }     
            } 
        } /* function getDescripcion($arreglo, $strNombre) */ 
         
        function despliegaArreglo($arreglo, $separa="", $url="", $estilo="", $param="") 
        { 
            foreach ($arreglo as $elemento) 
            { 
                if ($url!="") 
                { 
                    if ($param!="") 
                    {         
                        echo "<a href=\"".$url."?$param=$elemento\" class=\"$estilo\">$elemento</a>$separa"; 
                    } 
                    else 
                    { 
                        echo "<a href=\"".$url."\" class=\"$estilo\">$elemento</a>$separa"; 
                    } 
                } 
                else 
                { 
                    echo "$elemento$separa"; 
                } 
            } 
        } /* function despliegaArreglo($arreglo, $separa="", $url="", $estilo="", $param="") */ 
                 
          function &getInstancia() 
        { 
            static $instancia; 
            if (!isset( $instancia )) 
            { 
                  $instancia = new Almacen(); 
            } 
            return $instancia;    
          }         
         
    } /* class Almacen */ 
?>