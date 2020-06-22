<?php

require __DIR__.'/../vendor/autoload.php';

class tree extends iup\core {
    
    public $dlg,$tree,$vbox,$frame;
    
    function __construct() {
        parent::__construct();
        $this->init_tree();
        $this->init_dlg();
        $dlg = $this->getHandle("dlg");
        $this->showXY($dlg, self::CENTER, self::CENTER);
        $this->init_tree_atributes();
        $this->mainLoop();
        $this->close();
    }
    
    function init_tree() {
        $this->tree = $this->Tree();
        $this->setCallback($this->tree, "EXECUTELEAF_CB", [$this,'executeleaf_cb']);
        $this->setCallback($this->tree, "RENAME_CB", [$this,'rename_cb']);
        $this->setCallback($this->tree, "BRANCHCLOSE_CB", [$this,'branchclose_cb']);
        $this->setCallback($this->tree, "BRANCHOPEN_CB", [$this,'branchopen_cb']);
        $this->setCallback($this->tree, "DRAGDROP_CB", [$this,'dragdrop_cb']);
        $this->setCallback($this->tree, "RIGHTCLICK_CB", [$this,'rightclick_cb']);
        $this->setCallback($this->tree, "K_ANY", [$this,'k_any_cb']);
        $this->setAttribute($this->tree, "SHOWRENAME", "YES");
        $this->setHandle("tree", $this->tree);
    }
    
    /* Initializes the IupTree�s attributes */
    function init_tree_atributes() {
      $tree = $this->getHandle("tree");

      $this->setAttribute($tree, "TITLE","Figures");
      $this->setAttribute($tree, "ADDBRANCH","3D");
      $this->setAttribute($tree, "ADDBRANCH","2D");
      $this->setAttribute($tree, "ADDLEAF","test");
      $this->setAttribute($tree, "ADDBRANCH1","parallelogram");
      $this->setAttribute($tree, "ADDLEAF2","diamond");
      $this->setAttribute($tree, "ADDLEAF2","square");
      $this->setAttribute($tree, "ADDBRANCH1","triangle");
      $this->setAttribute($tree, "ADDLEAF2","scalenus");
      $this->setAttribute($tree, "ADDLEAF2","isoceles");
      $this->setAttribute($tree, "ADDLEAF2","equilateral");
      $this->setAttribute($tree, "VALUE","6");
    }
    function init_dlg() {
        $tree = $this->getHandle("tree");
        $this->vbox = $this->ffi_iup->IupVbox(
                $this->ffi_iup->IupHbox($tree, $this->button('test'),null),null);
        $this->dlg = $this->dialog($this->vbox);
        $this->setAttribute($this->dlg, "TITLE", "IupTree");
        $this->setAttribute($this->vbox, "MARGIN", "20x20");
        $this->setHandle("dlg", $this->dlg);
    }
    
    function addleaf() {
        $tree = $this->getHandle('tree');
        $id = $this->getInt($tree, "VALUE");
        $this->setAttribute($tree, sprintf("ADDLEAF%d",$id), "");
        return self::DEFAULT;
    }
    
    /*Callback called when a branch is added by the menu*/
    function addbranch() {
        $tree = $this->getHandle('tree');
        $id = $this->getInt($tree, "VALUE");
        $this->setAttribute($tree, sprintf("ADDBRANCH%d",$id), "");
        return self::DEFAULT;
    }
    
    function removednode() {
        $tree = $this->getHandle("tree");
        $this->setAttribute($tree, "DELNODE", "MARKED");
        return self::DEFAULT;
    }
    
    function renamenode() {
        return self::DEFAULT;
    }
    
    function executeleaf_cb() {
        $tree = $this->getHandle('tree');
        $id = $this->getInt($tree, "VALUE");
        printf("exexcuteleaf_cb %d\n", $id);
    }
    
   function branchopen_cb() {
       $tree = $this->getHandle('tree');
       $id = $this->getInt($tree, "VALUE");
       printf("branchopen_cb (%d)\n", $id);
       return self::DEFAULT;
   }
   function branchclose_cb() {
       $tree = $this->getHandle('tree');
       $id = $this->getInt($tree, "VALUE");
       printf("branchclose_cb (%d)\n", $id);
       return self::DEFAULT;
   }
   
   function k_any_cb() {
       if(self::K_DEL) {
           $this->setAttribute($this->tree, "DELNODE", "MARKED");
       }
       return self::DEFAULT;
   }


   function selectnode() {
       $tree = $this->getHandle('tree');
       $this->setAttribute($tree, "VALUE", $this->getAttribute($this->tree, "TITLE"));
       return self::DEFAULT;
   }
   
   function rightclick_cb() {
       $popup_menu = $this->ffi_iup->IupMenu(
       $this->item("Add Leaf", "addleaf"),
       $this->item("Add Branch", "addbranch"),
       $this->item("Rename Node", "renamenode"),
       $this->item("Remove Node", "removenode"),
       $this->ffi_iup->IupSubMenu("Selection", $this->ffi_iup->IupMenu(
       $this->item("Root", "selectnode"),
       $this->item("Last", "selectnode"),
       $this->item("PGUP", "selectnode"),
       $this->item("PGDN", "selectnode"),
       $this->item("NEXT", "selectnode"),
       $this->item("PREVIOUS", "selectnode"),
       $this->separator(),
       $this->item("INVERT", "selectnode"),
       $this->item("BLOCK", "selectnode"),
       $this->item("CLEARALL", "selectnode"),
       $this->item("MARKALL", "selectnode"),
       $this->item("INVERTALL", "selectnode"),
               null)),null);
       $this->setFunction("selectnode", [$this,"selectnode"]);
       $this->setFunction("addleaf", [$this,"addleaf"]);
       $this->setFunction("addbranch", [$this,"addbranch"]);
       $this->setFunction("removenode", [$this,"removenode"]);
       $this->setFunction("renamenode", [$this,"renamenode"]);
       $tree = $this->getHandle('tree');
       $id = $this->getInt($tree, "VALUE");
       $this->setAttribute($this->tree, "VALUE", sprintf("%d",$id));
       $this->popup($popup_menu, self::MOUSEPOS, self::MOUSEPOS);
       $this->destroy($popup_menu);
       return self::DEFAULT;
   }
}

$tree = new tree();