<?php

require __DIR__ . '/../vendor/autoload.php';

class imageView extends iup\core{
    
    public $image,$dlg,$frame,$vbox,$list;
    
    function __construct($imageFile) {
        parent::__construct();
        $this->init();
        $this->imgFrame($imageFile);
        $this->MainLoop();
        $this->close();
    }
    
    public function imgFrame($imageFile=''){
        if($imageFile == null){
            $image = $this->imageLoad(__DIR__.'/../logo.png');
        }
        else{
            $image = $this->imageLoad($imageFile);
        }
        $this->image = $this->Label();
        $this->SetAttributeHandle($this->image, "IMAGE", $image);
        $this->SetAttribute($this->image, "PADDING", "130x0");
        $this->vbox = $this->vbox($this->image,$this->info(),null);
        $this->SetAttribute($this->vbox, "MARGIN", "10x0");
        $frame = $this->Frame($this->vbox);
        $this->SetAttribute($frame, "TITLE", null);
        $this->dlg = $this->Dialog($frame);
        $this->SetAttribute($this->dlg, "TITLE", "PHP-IUP");
        $this->SetAttribute($this->dlg, "SIZE", "390x190");
        $this->Show($this->dlg);
    }
    
    protected function info(){
        return $this->Label(" php-version: ".PHP_VERSION.
                " - Runtime: ".$this->Version()[0].$this->Version()[2].PHP_EOL.
                "Copyright © 2019 by Shubam Chaudhary (ghost.jat@gmail.com) All rights reserved.
                \nRedistribution and use in source and binary forms, with or without modification, are permitted\nprovided that the following conditions are met:
                \nRedistributions of source code must retain the above copyright notice,this list of conditions\nand the following disclaimer.
                \nRedistributions in binary form must reproduce the above copyright notice,this list of conditions\nand the following disclaimer in the documentation\nand /or other materials provided with the distribution.
                \nNeither the name of Shubham Chaudhary nor the names of its contributors may be used to \nendorse or promote products derived from this software without\nspecific prior written permission.");
    }


    protected function imageLoad($image){
        return$this->loadImage($image);
    }
    
    
}
new imageView(__DIR__.'/../logo.png');