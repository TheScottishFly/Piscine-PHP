<?php

class Camera
{
    private $_proj;
    private $_tR;
    private $_tT;
    private $_origin;
    private $_width;
    private $_height;
    private $_ratio;
    
    static $verbose = false;
    
    public function __construct($array)
    {
        $this->_origin = $array['origin'];
        $vt = new Vector(array('dest' => $this->_origin));
        $this->_tT = new Matrix(array('preset' => Matrix::TRANSLATION, 'vtc' => $vt->opposite()));
        $this->_tR = $this->_transpose($array['orientation']);
        $this->_width = (float)$array['width'] / 2;
        $this->_height = (float)$array['height'] / 2;
        $this->_ratio = $this->_width / $this->_height;
        $this->_proj = new Matrix(array(
            'preset' => Matrix::PROJECTION,
            'fov' => $array['fov'],
            'ratio' => $this->_ratio,
            'near' => $array['near'],
            'far' => $array['far']
        ));
        if (self::$verbose) {
            echo "Camera instance constructed\n";
        }
    }
    
    public function watchVertex(Vertex $worldVertex){
        $vtx = $this->_proj->transformVertex($this->_tR->transformVertex($worldVertex));
        $vtx->setX($vtx->getX() * $this->_ratio);
        $vtx->setY($vtx->getY());
        $vtx->setColor($worldVertex->getColor());
        return ($vtx);
    }
    
    private function _transpose(Matrix $m){
        $matrix = $m->getMatrix();
        $tmp[0] = $matrix[0];
        $tmp[1] = $matrix[4];
        $tmp[2] = $matrix[8];
        $tmp[3] = $matrix[12];
        $tmp[4] = $matrix[1];
        $tmp[5] = $matrix[5];
        $tmp[6] = $matrix[9];
        $tmp[7] = $matrix[13];
        $tmp[8] = $matrix[2];
        $tmp[9] = $matrix[6];
        $tmp[10] = $matrix[10];
        $tmp[11] = $matrix[14];
        $tmp[12] = $matrix[3];
        $tmp[13] = $matrix[7];
        $tmp[14] = $matrix[11];
        $tmp[15] = $matrix[15];
        $m->setMatrix($tmp);
        return ($m);
    }
    
    function __destruct()
    {
        if (self::$verbose)
            printf("Camera instance destructed\n");
    }
    
    function __toString()
    {
        $tmp = "Camera( \n";
        $tmp .= "+ Origine: ".$this->_origin."\n";
        $tmp .= "+ tT:\n".$this->_tT."\n";
        $tmp .= "+ tR:\n".$this->_tR."\n";
        $tmp .= "+ tR->mult( tT ):\n".$this->_tR->mult($this->_tT)."\n";
        $tmp .= "+ Proj:\n".$this->_proj."\n)";
        return ($tmp);
    }
    
    public static function doc()
    {
        $read = fopen("Camera.doc.txt", 'r');
        echo "\n";
        while ($read && !feof($read))
            echo fgets($read);
        echo "\n";
    }
}