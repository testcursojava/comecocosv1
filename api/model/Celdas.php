<?php
    include_once("Repository.php");
    class Celdas extends Repository{
        const TABLA = "celdas";
        
        protected $table = self::TABLA;
        
        private $partida;
        
        public function removeByUser($user){
            $this->query("delete from ".self::TABLA." where oc=:u",
                         array(array("k"=>"u","v"=>$user,"int"=>true)))
        }
        
        private function initCasillas($dimension){
            $casillas = array();
            for($x=0;$x<$dimension;$x++){
                $fila = array();
                for($y=0;$y<$dimension;$y++){
                    $fila[$y] = true;
                }
                $casillas[$x] = $fila;
            }
            return $casillas;
        }
        
        private function marcarOcupadas(&$casillas,$x,$y,$distmin,$dim){
            $max = $dim-1;
            $xa = $x-$distmin;
            $xb = $x+$distmin;
            $ya = $y-$distmin;
            $yb = $y+$distmin;
            for($i=$xa;$i<=$xb;$i++){
                $xn = $i;
                if($xn<0)
                    $xn = $max-$i;
                else if($xn>$max)
                    $xn = $i-$max;
                for($j=$ya;$j<=$yb;$j++){
                    $yn = $j;
                    if($yn<0)
                        $yn = $max-$j;
                    else if($yn>$max)
                        $yn = $j-$max;
                    $casillas[$xn][$yn] = false;
                }
            }
        }
        
        private function saveCelda($x,$y,$rol){
            $movimiento = rand(0,3);
            $this->add(self::TABLA,array(
               array("k"=>"partida","v"=>$this->partida,"int"=>true),
               array("k"=>"x","v"=>$v,"int"=>true),
               array("k"=>"y","v"=>$y,"int"=>true),
               array("k"=>"oc","v"=>(($rol==NULL || $rol->user==NULL)?-1:$rol->user->id),"int"=>true),
               array("k"=>"movimiento","v"=>$movimiento,"int"=>true)
            ));
        }
        
        private function fillRol($casillas,$rol){
            $libres = array();
            for($x=0;$x<sizeof($casillas);$x++){
                $fila = $casillas[$x];
                for($y=0;$y<sizeof($fila);$y++){
                    if($fila[$y])
                        libres[] = array("x"=>$x,"y"=>$y);
                }
            }
            $p = rand(0,sizeof($libres)-1);
            $pos = $libres[$p];
            return $pos;
        }
        
        private function canset($ocupadas,$x,$y){
            $can = true;
            for($i=0;$i<sizeof($ocupadas);$i++){
                $pos = $ocupadas[$i];
                if($pos["x"]==$x && $pos["y"]==$y){
                    $can = false;
                    break;
                }
            }
            return $can;
        }
        
        private function fillComida($ocupadas,$dimension){
            for($x=0;$x<$dimension;$x++){
                for($y=0;$y<$dimension;$y++){
                    if($this->canset($ocupadas,$x,$y)){
                        $this->add(self::TABLA,array(
                            array("k"=>"partida","v"=>$this->partida,"int"=>true),
                            array("k"=>"x","v"=>$v,"int"=>true),
                            array("k"=>"y","v"=>$y,"int"=>true),
                            array("k"=>"oc","v"=>0,"int"=>true),
                            array("k"=>"movimiento","v"=>0,"int"=>true)
                         ));
                    }
                }
            }
        }
        
        private function fillRoles($dimension,$roles,$distmin){
            $casillas = &$this->initCasillas($dimension);
            $ocupadas = array();
            for($i=0;$i<sizeof($roles);$i++){
                $pos = $this->fillRol($casillas,$roles[$i]);
                $ocupadas[] = $pos;
                $this->marcarOcupadas($casillas,$pos["x"],$pos["y"],$distmin,$dimension);
            }
        }
        
        public function init($dimension,$partida,$distmin){
            $this->partida = $partida;
            include_once("Roles.php");
            $reproles = new Roles();
            $roles = $reproles->getByPartida($partida);
            $this->fillRoles($dimension,$roles,$distmin);
        }
        
    }
?>