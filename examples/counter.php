<?php

require __DIR__.'/../vendor/autoload.php';

class app extends iup\core {
    
    public function __construct() {
        parent::__construct();
        $this->counter();
        $this->mainLoop();
        $this->close();
    }
    
    function btn_count_cb(){
        $text = $this->getDialogChild($this->text, "Text");
        $value = $this->getInt($text,"VALUE");
        $this->setInt($text, 'VALUE', ++$value);
        self::DEFAULT;
    }
    
    function counter(){
        $this->button = $this->button('Count');
        $this->setAttribute($this->button, "SIZE", "60");
        $this->text = $this->text();
        $this->setAttribute($this->text, "SIZE", "60");
        $this->setAttribute($this->text, "NAME", "Text");
        $this->setAttribute($this->text, "READONLY", "YES");
        $hbox = $this->ffi_iup->IupHbox($this->text,$this->button,null);
        $this->setAttribute($hbox, "MARGIN", "10x10");
        $this->setAttribute($hbox, "GAP", "10");
        
        $this->dlg = $this->dialog($hbox);
        $this->setAttribute($this->dlg, "TITLE", "Counter");
        $this->setInt($this->text, "VALUE", 0);
        $this->setCallback($this->button, "ACTION", [$this,'btn_count_cb']);
        $this->showXY($this->dlg, self::CENTER, self::CENTER);
    }
}

new app();