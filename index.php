<?php
header('Location: pag/home.php');
// Clases de la parte Orientada a objetos, sirve para hacer mis consultas

     /*class Comic{
        //Atributos
        public $fechaSubida;
        public $comics = [];

        //METODOS

        public function __construct($fechaNueva){
            $this->fechaSubida = $fechaNueva;
        }

        public function verComic(){
            print_r($this->comics);
            echo "<br>";
            $contador = count($this->comics);
            for ($i = 0; $i < $contador;$i++ ){
                echo $this->comics[$i]['nombre'];
            }
        }

        public function GuardarComic($nombre,$size,$pag){
            $comicNuevo = ['nombre'=> $nombre, 'size'=>$size, 'pag'=>$pag];
            array_push($this->comics,$comicNuevo);
        }
    }


    $civilwar = new Comic("19-07-2018");
    $civilwar->GuardarComic("Civil War Vol 1","10","25");
    $civilwar->verComic("Hola");*/
?>