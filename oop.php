<?php
class opilased{ //objektid
    var $eesnimi;
    var $perenimi;
    var $vanus;
    var $sugu = 'm';
    function ytle_tere(){
        echo "Tere maailm!";
    }
    function ytle_taisnimi(){
        echo $this->eesnimi.' '.$this->perenimi;
    }
}
//isendi loomine
$oppur1 = new opilased;
echo $oppur1->sugu.'<br>';
echo $oppur1->eesnimi='Mati'.'<br>';
echo $oppur1->perenimi='Maakas'.'<br>';
$oppur1->ytle_taisnimi();
echo $oppur1->vanus='18'.'<br>';
echo '<br>';
$oppur2 = new opilased;
//omaduse väljakutsumine
echo $oppur1->sugu;
echo $oppur2->sugu='n'.'<br>';
echo $oppur2->eesnimi='Kati'.'<br>';
echo $oppur2->perenimi='Karu'.'<br>';
echo $oppur2->vanus='17'.'<br>';
var_dump($oppur1);
echo '<br>';

//meetodid
$oppur1->ytle_tere();