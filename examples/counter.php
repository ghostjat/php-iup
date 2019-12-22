<?php

require __DIR__.'/../vendor/autoload.php';

class app extends iup\core {
    
    public function __construct() {
        parent::__construct();
        $this->init();
        $this->counter();
        $this->MainLoop();
        $this->close();
    }
    
    function btn_count_cb(){
        $text = $this->GetDialogChild($this->text, "Text");
        $value = $this->getInt($text,"VALUE");
        $this->setInt($text, 'VALUE', ++$value);
        self::DEFAULT;
    }
    
    function counter(){
        $this->button = $this->Button('Count');
        $this->SetAttribute($this->button, "SIZE", "60");
        $this->text = $this->Text();
        $this->SetAttribute($this->text, "SIZE", "60");
        $this->SetAttribute($this->text, "NAME", "Text");
        $this->SetAttribute($this->text, "READONLY", "YES");
        $hbox = $this->ffi->IupHbox($this->text,$this->button,null);
        $this->SetAttribute($hbox, "MARGIN", "10x10");
        $this->SetAttribute($hbox, "GAP", "10");
        
        $this->dlg = $this->Dialog($hbox);
        $this->SetAttribute($this->dlg, "TITLE", "Counter");
        $this->setInt($this->text, "VALUE", 0);
        $this->setCallback($this->button, "ACTION", [$this,'btn_count_cb']);
        $this->ShowXY($this->dlg, self::CENTER, self::CENTER);
    }
}

new app();