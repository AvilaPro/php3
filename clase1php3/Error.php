<?php
    class ValidarExcepcion extends Exception{
        public function mensaje(){
            return "Error: ".$this->getMessage()." en la linea ".$this->
                    getLine()."en el archivo ".$this->getFile()."</br>";
        }
    }
         
   
?>

