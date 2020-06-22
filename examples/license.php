<?php

require __DIR__ . '/../vendor/autoload.php';

class imageView extends iup\core {

    public $image, $dlg, $frame, $vbox, $list;

    function __construct($imageFile) {
        parent::__construct();
        $this->imgFrame($imageFile);
        $this->mainLoop();
        $this->close();
    }

    public function imgFrame($imageFile = '') {
        if ($imageFile == null) {
            $image = $this->imageLoad(__DIR__ . '/../php.png');
        } else {
            $image = $this->imageLoad($imageFile);
        }
        $this->image = $this->label();
        $this->setAttributeHandle($this->image, "IMAGE", $image);
        $this->setAttribute($this->image, "PADDING", "190x0");

        $this->vbox = $this->ffi_iup->IupVbox($this->image, $this->info(), null);
        $this->setAttribute($this->vbox, "MARGIN", "10x0");

        $frame = $this->frame($this->vbox);
        $this->setAttribute($frame, "TITLE", null);

        $this->dlg = $this->dialog($frame);
        $this->setAttribute($this->dlg, "TITLE", "PHP-IUP");
        $this->show($this->dlg);
    }

    protected function info() {
        return $this->label(" PHP-Version: " . PHP_VERSION .
                        " - IUP-Runtime: " . $this->Version()->ver .'['. $this->Version()->num .']'. PHP_EOL .
                        file_get_contents(__DIR__.'/LICENSE'));
    }

    protected function imageLoad($image) {
        $img = new iup\image();
        return $img->loadImage($image);
    }

}

new imageView('../php.png');
