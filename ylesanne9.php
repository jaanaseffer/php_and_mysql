<?php
class auto{
    var $color;
    var $tootja;
    var $kiirus = 0;
    function kiirendus(){
        while($this->kiirus <= 90){
            $this->kiirus += 10;
            echo 'Kiirus: '.$this->kiirus;
            echo '<br>';
        }
    }
}
$auto1 = new auto;
$auto1->kiirendus();
