<?php

namespace iup;

use FFI;

class core {
    
    /*     * ********************************************************************* */
    /*                   Callback Return Values                                    */
    /*     * ********************************************************************* */

    const IUP_IGNORE = -1;
    const IUP_DEFAULT = -2;
    const IUP_CLOSE = -3;
    const IUP_CONTINUE = -4;

    /*     * ********************************************************************* */
    /*           IupPopup and IupShowXY Parameter Values                           */
    /*     * ********************************************************************* */
    
    const IUP_CENTER = 0xFFFF;  /* 65535 */
    const IUP_LEFT = 0xFFFE;  /* 65534 */
    const IUP_RIGHT = 0xFFFD;  /* 65533 */
    const IUP_MOUSEPOS = 0xFFFC;  /* 65532 */
    const IUP_CURRENT = 0xFFFB;  /* 65531 */
    const IUP_CENTERPARENT = 0xFFFA;  /* 65530 */
    const IUP_TOP = self::IUP_LEFT;
    const IUP_BOTTOM = self::IUP_RIGHT;

    private $ffi;
    protected $argc;

    public function __construct() {
        $this->ffi = FFI::load(__DIR__ . '/iup.h');
    }

    public function init() {
        $this->argc = $this->ffi->new('int32_t', false);
        $this->ffi->IupOpen(FFI::addr($this->argc), null);
    }

    public function close() {
        $this->ffi->IupClose();
    }

    public function iupVersion() {
        $ver = $this->ffi->IupVersion();
        $date = $this->ffi->IupVersionDate();
        $num = $this->ffi->IupVersionNumber();
        return [$ver, $date, $num];
    }

    public function iupMainLoop() {
        return $this->ffi->IupMainLoop();
    }
    
    /**
     * 
     * @param \iup\Ihandle $ih
     * @param string $name
     * @param string $vale
     * @return type
     */
    public function iupSetAttribute($ih, $name, $vale) {
        return $this->ffi->IupSetAttribute($ih, $name, $vale);
    }

    public function iupShowXY($ih, $x, $y) {
        return $this->ffi->IupShowXY($ih, $x, $y);
    }

    /**
     * 
     * @param \iup\widget $child
     * @param type $flag
     * @return type
     */
    public function iupVbox($child, $flag = null) {
        return $this->ffi->IupVbox($child, $flag);
    }
    
    /**
     * 
     * @param type $title
     * @param type $action
     * @return type
     */
    public function iupButton($title,$action){
        return $this->ffi->IupButton($title, $action);
    }
    
    public function iupCallback($ih,$name,$func){
        return $this->ffi->IupSetCallback($ih,$name,$func);
    }

    /**
     * 
     * @param string $label
     * @return \iup\core - IupLabel
     */
    public function iupLabel(string $label) {
        return $this->ffi->IupLabel($label);
    }

    /**
     * 
     * @param \iup\widget $child
     * @return type
     */
    public function iupDialog($child) {
        return $this->ffi->IupDialog($child);
    }

    /**
     * 
     * @param string $title
     * @param string $msg
     * @return Iup\Message - dialog
     */
    public function iupMessage($title, $msg) {
        return $this->ffi->IupMessage($title, $msg);
    }
    
    public function iupFill() {
        return $this->ffi->IupFill();
    }
    
    public function iupSpace() {
        return $this->ffi->IupSpace();
    }
    
    public function iupRadio($child) {
        return $this->ffi->IupRadio($child);
    }
    
    public function iupVboxV($children) {
        return $this->ffi->IupVboxv($children);
    }
    
    public function iupZbox($child) {
        return $this->ffi->IupZbox($child);
    }
    
    public function iupZboxV($children) {
        return $this->ffi->IupZboxv($children);
    }
    
    public function iupHbox($child) {
        return $this->ffi->IupHobx($child);
    }
    
    public function iupHobxV($children) {
        return $this->ffi->IupHboxv($children);
    }
    
    public function iupNormalizer($ih_first) {
        return $this->ffi->IupNormalizer($ih_first);
    }
    
    public function iupNormalizerV($ih_list) {
        return $this->ffi->IupNormalizerv($ih_list);
    }
    
    public function iupCbox($child) {
        return $this->ffi->IupCbox($child);
    }
    
    public function iupCboxV($children) {
        return $this->ffi->IupCboxv($children);
    }
    
    public function iupSbox($child) {
        return $this->ffi->IupSbox($child);
    }
    
    public function iupSplit($child_1,$child_2) {
        return $this->ffi->IupSplit($child_1,$child_2);
    }
    
    public function iupScrollBox($child) {
        return $this->ffi->IupScrollBox($child);
    }
    
    public function iupFlatScrollBox($child) {
        return $this->ffi->IupFlatScrollBox($child);
    }
    
    public function iupGridBox($child) {
        return $this->ffi->IupGridBox($child);
    }
    
    public function iupGridBoxV($children) {
        return $this->ffi->IupGridBoxv($children);
    }
    
    public function iupMultiBox($child) {
        return $this->ffi->IupMultiBox($child);
    }
    
    public function iupMultiBoxV($children) {
        return $this->ffi->IupMultiBoxv($children);
    }
    
    public function iupExpander($child) {
        return $this->ffi->IupExpander($child);
    }
    public function iupDetachBox($child) {
        return $this->ffi->IupDetachBox($child);
    }

}
