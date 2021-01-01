<?php


namespace iup;

use FFI;

if (!extension_loaded("FFI")) {
    die("FFI extension required\n");
}

/**
 * @package php-iup
 * @author Shubham Chaudhary <ghost.jat@gmail.com>
 * @copyright (c) 2019,2020, Shubham Chaudhary
 * @todo callbacks
 */
class core {

    const K_SP = ' ';   /* 32 (0x20) */
    const K_exclam = '!'; /* 33 */
    const K_quotedbl = '\"'; /* 34 */
    const K_numbersign = '#'; /* 35 */
    const K_dollar = '$'; /* 36 */
    const K_percent = '%'; /* 37 */
    const K_ampersand = '&'; /* 38 */
    const K_apostrophe = '\''; /* 39 */
    const K_parentleft = '('; /* 40 */
    const K_parentright = ')'; /* 41 */
    const K_asterisk = '*'; /* 42 */
    const K_plus = '+'; /* 43 */
    const K_comma = ','; /* 44 */
    const K_minus = '-'; /* 45 */
    const K_period = '.'; /* 46 */
    const K_slash = '/'; /* 47 */
    const K_0 = '0'; /* 48 (0x30) */
    const K_1 = '1'; /* 49 */
    const K_2 = '2'; /* 50 */
    const K_3 = '3'; /* 51 */
    const K_4 = '4'; /* 52 */
    const K_5 = '5'; /* 53 */
    const K_6 = '6'; /* 54 */
    const K_7 = '7'; /* 55 */
    const K_8 = '8'; /* 56 */
    const K_9 = '9'; /* 57 */
    const K_colon = ':'; /* 58 */
    const K_semicolon = ';'; /* 59 */
    const K_less = '<'; /* 60 */
    const K_equal = '='; /* 61 */
    const K_greater = '>'; /* 62 */
    const K_question = '?'; /* 63 */
    const K_at = '@'; /* 64 */
    const K_A = 'A'; /* 65 (0x41) */
    const K_B = 'B'; /* 66 */
    const K_C = 'C'; /* 67 */
    const K_D = 'D'; /* 68 */
    const K_E = 'E'; /* 69 */
    const K_F = 'F'; /* 70 */
    const K_G = 'G'; /* 71 */
    const K_H = 'H'; /* 72 */
    const K_I = 'I'; /* 73 */
    const K_J = 'J'; /* 74 */
    const K_K = 'K'; /* 75 */
    const K_L = 'L'; /* 76 */
    const K_M = 'M'; /* 77 */
    const K_N = 'N'; /* 78 */
    const K_O = 'O'; /* 79 */
    const K_P = 'P'; /* 80 */
    const K_Q = 'Q'; /* 81 */
    const K_R = 'R'; /* 82 */
    const K_S = 'S'; /* 83 */
    const K_T = 'T'; /* 84 */
    const K_U = 'U'; /* 85 */
    const K_V = 'V'; /* 86 */
    const K_W = 'W'; /* 87 */
    const K_X = 'X'; /* 88 */
    const K_Y = 'Y'; /* 89 */
    const K_Z = 'Z'; /* 90 */
    const K_bracketleft = '['; /* 91 */
    const K_backslash = '\\'; /* 92 */
    const K_bracketright = ']'; /* 93 */
    const K_circum = '^'; /* 94 */
    const K_underscore = '_'; /* 95 */
    const K_grave = '`'; /* 96 */
    const K_a = 'a'; /* 97 (0x61) */
    const K_b = 'b'; /* 98 */
    const K_c = 'c'; /* 99 */
    const K_d = 'd'; /* 100 */
    const K_e = 'e'; /* 101 */
    const K_f = 'f'; /* 102 */
    const K_g = 'g'; /* 103 */
    const K_h = 'h'; /* 104 */
    const K_i = 'i'; /* 105 */
    const K_j = 'j'; /* 106 */
    const K_k = 'k'; /* 107 */
    const K_l = 'l'; /* 108 */
    const K_m = 'm'; /* 109 */
    const K_n = 'n'; /* 110 */
    const K_o = 'o'; /* 111 */
    const K_p = 'p'; /* 112 */
    const K_q = 'q'; /* 113 */
    const K_r = 'r'; /* 114 */
    const K_s = 's'; /* 115 */
    const K_t = 't'; /* 116 */
    const K_u = 'u'; /* 117 */
    const K_v = 'v'; /* 118 */
    const K_w = 'w'; /* 119 */
    const K_x = 'x'; /* 120 */
    const K_y = 'y'; /* 121 */
    const K_z = 'z'; /* 122 */
    const K_braceleft = '{'; /* 123 */
    const K_bar = '|'; /* 124 */
    const K_braceright = '}'; /* 125 */
    const K_tilde = '~'; /* 126 (0x7E) */


    /* also define the escape sequences that have keys associated */
    const K_BS = '\b';     /* 8 */
    const K_TAB = '\t';     /* 9 */
    const K_LF = '\n';     /* 10 (0x0A) not a real key, is a combination of CR with a modifier, just to document */
    const K_CR = '\r';     /* 13 (0x0D) */

    /* These use the same definition as X11 and GDK.
      This also means that any X11 or GDK definition can also be used. */
    const K_PAUSE = 0xFF13;
    const K_ESC = 0xFF1B;
    const K_HOME = 0xFF50;
    const K_LEFT = 0xFF51;
    const K_UP = 0xFF52;
    const K_RIGHT = 0xFF53;
    const K_DOWN = 0xFF54;
    const K_PGUP = 0xFF55;
    const K_PGDN = 0xFF56;
    const K_END = 0xFF57;
    const K_MIDDLE = 0xFF0B;
    const K_Print = 0xFF61;
    const K_INS = 0xFF63;
    const K_Menu = 0xFF67;
    const K_DEL = 0xFFFF;
    const K_F1 = 0xFFBE;
    const K_F2 = 0xFFBF;
    const K_F3 = 0xFFC0;
    const K_F4 = 0xFFC1;
    const K_F5 = 0xFFC2;
    const K_F6 = 0xFFC3;
    const K_F7 = 0xFFC4;
    const K_F8 = 0xFFC5;
    const K_F9 = 0xFFC6;
    const K_F10 = 0xFFC7;
    const K_F11 = 0xFFC8;
    const K_F12 = 0xFFC9;

    /* no Shift/Ctrl/Alt */
    const K_LSHIFT = 0xFFE1;
    const K_RSHIFT = 0xFFE2;
    const K_LCTRL = 0xFFE3;
    const K_RCTRL = 0xFFE4;
    const K_LALT = 0xFFE9;
    const K_RALT = 0xFFEA;
    const K_NUM = 0xFF7F;
    const K_SCROLL = 0xFF14;
    const K_CAPS = 0xFFE5;

    /* Also, these are the same as the Latin-1 definition */
    const K_ccedilla = 0x00E7;
    const K_Ccedilla = 0x00C7;
    const K_acute = 0x00B4; /* no Shift/Ctrl/Alt */
    const K_diaeresis = 0x00A8;
    /*     * ********************************************************************* */
    /*                   Common Flags and Return Values                     */
    /*     * ********************************************************************* */
    const ERROR = 1;
    const NOERROR = 0;
    const OPENED = -1;
    const INVALID = -1;
    const INVALID_ID = -10;

    /*     * ********************************************************************* */
    /*                   Callback Return Values                                    */
    /*     * ********************************************************************* */
    const IGNORE = -1;
    const DEFAULT = -2;
    const CLOSE = -3;
    const CONTINUE = -4;

    /*     * ********************************************************************* */
    /*           IupPopup and IupShowXY Parameter Values                           */
    /*     * ********************************************************************* */
    const CENTER = 0xFFFF;  /* 65535 */
    const LEFT = 0xFFFE;  /* 65534 */
    const RIGHT = 0xFFFD;  /* 65533 */
    const MOUSEPOS = 0xFFFC;  /* 65532 */
    const CURRENT = 0xFFFB;  /* 65531 */
    const CENTERPARENT = 0xFFFA;  /* 65530 */
    const TOP = self::LEFT;
    const BOTTOM = self::RIGHT;
    const BUTTON1 = '1';
    const BUTTON2 = '2';
    const BUTTON3 = '3';
    const BUTTON4 = '4';
    const BUTTON5 = '5';
    const GETPARAM_BUTTON1 = -1;
    const GETPARAM_INIT = -2;
    const GETPARAM_BUTTON2 = -3;
    const GETPARAM_BUTTON3 = -4;
    const GETPARAM_CLOSE = -5;
    const GETPARAM_MAP = -6;
    const GETPARAM_OK = self::GETPARAM_BUTTON1;
    const GETPARAM_CANCEL = self::GETPARAM_BUTTON2;
    const GETPARAM_HELP = self::GETPARAM_BUTTON3;
    const PRIMARY = -1;
    const SECONDARY = -2;
    /*     * ********************************************************************* */
    /*                      Pre-Defined Masks                               */
    /*     * ********************************************************************* */
    const MASK_FLOAT = "[+/-]?(/d+/.?/d*|/./d+)";
    const MASK_UFLOAT = "(/d+/.?/d*|/./d+)";
    const MASK_EFLOAT = "[+/-]?(/d+/.?/d*|/./d+)([eE][+/-]?/d+)?";
    const MASK_UEFLOAT = "(/d+/.?/d*|/./d+)([eE][+/-]?/d+)?";
    const MASK_FLOATCOMMA = "[+/-]?(/d+/,?/d*|/,/d+)";
    const MASK_UFLOATCOMMA = "(/d+/,?/d*|/,/d+)";
    const MASK_INT = "[+/-]?/d+";
    const MASK_UINT = "/d+";
    const CD_IUPDRAW = 'CD_IUPDRAW';

    protected $argc, $ffi_imgLib;
    protected static $ihandle_ptr;
    public $ffi_iup;
    
    public function __construct() {
        $this->ffi_iup = FFI::load(__DIR__ . '/iup.h');
        $this->ffi_imgLib = FFI::cdef('extern void IupImageLibOpen(void);', '/usr/lib/libiupimglib.so');
        self::$ihandle_ptr = $this->ffi_iup->type('Ihandle*');
        
        $this->argc = $this->ffi_iup->new('int32_t', false);
        $this->open(FFI::addr($this->argc), null);
        $this->ImageLibOpen();
    }
    
    /**
     * @uses ihandle pointer call
     * @return ihandle*
     */
    public static function ihandlePtr () {
        return self::$ihandle_ptr;
    }
    
    public function string(FFI\CData $data){
        return \FFI::string($data);
    }


    protected function ImageLibOpen() {
        return $this->ffi_imgLib->IupImageLibOpen();
    }
    
    public function __call($name, $arguments = []) {
        $name = 'Iup' . ucfirst($name);
        return $this->ffi_iup->$name(...$arguments);
    }
    
    

    public function version() {
        $ver['ver'] = FFI::string($this->ffi_iup->IupVersion());
        $ver['date'] = FFI::string($this->ffi_iup->IupVersionDate());
        $ver['num'] = (string) $this->ffi_iup->IupVersionNumber();
        return (object) $ver;
    }
    
    /**
     * 
     * @param iup\widget $ih
     * @param string $value in from of 'WxH'
     * @return type
     */
    public function setSize($ih,$value){
        return $this->setAttribute($ih, 'SIZE', $value);
    }
    
    
    public function setTitle($ih,$title){
        return $this->setAttribute($ih, 'TITLE', $title);
    }


    /**
     * 
     * @param iup\Widget $ih
     * @param type $value 'text value '
     * @return type
     */
    public function setValue($ih,$value){
        return $this->setAttribute($ih, 'VALUE', $value);
    }
    
    
    public function getValue($ih){
        return $this->getAttribute($ih, 'VALUE');
    }
    
    /**
     * 
     * @param \iup\ihandle $ih
     * @param string $numCol
     * @param string $numLin
     * @param string $cx
     * @param string $cy
     * @param string $expand
     */
    protected function _matrixConfig($ih,$numCol=3,$numLin=3,$cx=null,$cy=null,$expand='yes',$resize='yes'){
        $this->setInt($ih, "NUMCOL", $numCol);
        $this->setInt($ih, "NUMLIN", $numLin);
        $this->setAttribute($ih, "NUMCOL_VISIBLE", (string)$numCol);
        $this->setAttribute($ih, "NUMLIN_VISIBLE", (string)$numLin);
        $this->setAttribute($ih, "EXPAND", (string)$expand);
        $this->setAttribute($ih, "RESIZEMATRIX", $resize);
        $this->setAttribute($ih, "CX", (string)$cx);
        $this->setAttribute($ih, "CY", (string)$cy);
    }
    
    /**
     * 
     * @param \iup\ihandle $ih
     * @param array $data
     * @param string $name
     * all the data values must be string cast
     */
    public function matrixData($ih,array $data,string $name='matrix'){
        $this->setAttribute($ih, "NAME", $name);
        $numCol = count(array_keys($data));
        $numLin = count($data[array_key_first($data)]);
        $this->_matrixConfig($ih, $numCol-1, $numLin);
        $h = 0;
        
        foreach ($data as $header => $value) {
            $this->setAttribute($ih, "0:$h", $header);
            $l=1;
            foreach ($value as $val) {
                $this->setAttribute($ih, "$l:$h", $val);
                $l++;
            }
            $h++;
        }
    }


    /**
     * 
     * @param type $title
     * @param type $msg
     * @param type $b1
     * @param type $b2
     * @param type $b3
     * @return type
     */
    public function alarm($title, $msg, $b1, $b2, $b3) {
        return $this->ffi_iup->IupAlarm($title, $msg, $b1, $b2, $b3);
    }
    
    /**
     * 
     * @param type $animation
     * @return type
     */
    public function animatedLabel($animation) {
        return $this->ffi_iup->IupAnimatedLabel($animation);
    }
    
    /**
     * 
     * @param type $title
     * @param type $action
     * @return type
     */
    public function button($title, $action = null) {
        return $this->ffi_iup->IupButton($title, $action);
    }
    
    /**
     * 
     * @param type $child
     * @return type
     */
    public function backgroundBox($child) {
        return $this->ffi_iup->IupBackgroundBox($child);
    }

    /**
     * 
     * @param type $ih
     * @param type $name
     * @param type $func
     * @return type
     */
    public function callback($ih, $name, $func) {
        return $this->ffi_iup->IupSetCallback($ih, $name, $func);
    }
    
    /**
     * 
     * @param type $ih
     * @param type $x
     * @param type $y
     * @return type
     */
    public function convertXYToPos($ih, $x, $y) {
        return $this->ffi_iup->IupConvertXYToPos($ih, $x, $y);
    }
    
    public function close() {
        $this->ffi_iup->IupClose();
    }
    
    public function cells() {
        return $this->ffi_iup->IupCells();
    }
    
    /**
     * 
     * @param type $child
     * @return type
     */
    public function cbox($child) {
        return $this->ffi_iup->IupCbox($child);
    }

    /**
     * 
     * @param type $children
     * @return type
     */
    public function cboxV($children) {
        return $this->ffi_iup->IupCboxv($children);
    }
    
    /**
     * 
     * @param type $action
     * @return type
     */
    public function canvas($action = null) {
        return $this->ffi_iup->IupCanvas($action);
    }
    
    public function clipBoard() {
        return $this->ffi_iup->IupClipBoard();
    }
    
    public function calendar() {
        return $this->ffi_iup->IupCalendar();
    }
    
    public function colorBar() {
        return $this->ffi_iup->IupColorbar();
    }
    
    /**
     * 
     * @param type $type
     * @return type
     */
    public function dial($type) {
        return $this->ffi_iup->IupDial($type);
    }
    
    public function datePick() {
        return $this->ffi_iup->IupDatePick();
    }
    
    /**
     * 
     * @param \iup\widget $child
     * @return type
     */
    public function dialog($child) {
        return $this->ffi_iup->IupDialog($child);
    }
    
    /**
     * 
     * @param type $child
     * @return type
     */
    public function detachBox($child) {
        return $this->ffi_iup->IupDetachBox($child);
    }
    
    /**
     * 
     * @param type $dropChild
     * @return type
     */
    public function dropButton($dropChild) {
        return $this->ffi_iup->IupDropChild($dropChild);
    }
    
    /**
     * 
     * @param type $child
     * @return type
     */
    public function expander($child) {
        return $this->ffi_iup->IupExpander($child);
    }
    
    /**
     * 
     * @param type $first
     * @return type
     */
    public function flatTabs($first) {
        return $this->ffi_iup->IupFlatTabs($first);
    }

    /**
     * 
     * @param type $children
     * @return type
     */
    public function flatTabsV($children) {
        return $this->ffi_iup->IupFlatTabsv($children);
    }
    
    /**
     * 
     * @param type $title
     * @return type
     */
    public function flatLabel($title) {
        return $this->ffi_iup->IupFlatLabel($title);
    }

    public function flatSeparator() {
        return $this->ffi_iup->IupFlatSeparator();
    }
    
    public function fill() {
        return $this->ffi_iup->IupFill();
    }
    
    /**
     * 
     * @param type $child
     * @return type
     */
    public function flatScrollBox($child) {
        return $this->ffi_iup->IupFlatScrollBox($child);
    }
    
    /**
     * 
     * @param type $child
     * @return type
     */
    public function frame($child) {
        return $this->ffi_iup->IupFrame($child);
    }
    
    /**
     * 
     * @param type $child
     * @return type
     */
    public function flatFrame($child) {
        return $this->ffi_iup->IupFlatFrame($child);
    }
    
    /**
     * 
     * @param type $title
     * @return type
     */
    public function flatButton($title) {
        return $this->ffi_iup->IupFlatButton($title);
    }
    
    /*
     * 
     */
    public function flatToggle($title) {
        return $this->ffi_iup->IupFlatToggle($title);
    }
    
    public function flatList() {
        return $this->ffi_iup->IupFlatList();
    }
    
    public function gauge() {
        return $this->ffi_iup->IupGauge();
    }

    /**
     * 
     * @param type $child
     * @return type
     */
    public function gridBox($child) {
        return $this->ffi_iup->IupGridBox($child);
    }
    
    /**
     * 
     * @param type $children
     * @return type
     */
    public function gridBoxV($children) {
        return $this->ffi_iup->IupGridBoxv($children);
    }
    
    /**
     * 
     * @param Ihandle $name
     * @return type
     */
    public function getHandle($name) {
        return $this->ffi_iup->IupGetHandle($name);
    }
    
    /**
     * 
     * @param type $name
     * @return type
     */
    public function getFunction($name){
        return $this->ffi_iup->IupGetFunction($name);
    }
    
    /**
     * 
     * @param type $ih
     * @param type $name
     * @return type
     */
    public function getAttributeHandle($ih, $name) {
        return $this->ffi_iup->IupGetAttributeHandle($ih, $name);
    }
    /**
     * 
     * @param type $ih
     * @param type $name
     * @return type
     */
    public function getCallback($ih,$name){
        return $this->ffi_iup->IupGetCallback($ih, $name);
    }
    
    public function getClassName($ih){
        return $this->ffi_iup->IupGetClassName($ih);
    }
    
    public function getClassType($ih){
        return $this->ffi_iup->IupGetClassType($ih);
    }


    /**
     * 
     * @param type $ih
     * @param type $name
     * @return type
     */
    public function getAttribute($ih, $name) {
        return $this->ffi_iup->IupGetAttribute($ih, $name);
    }
    /**
     * 
     * @param \iup\Ihandle $ih
     * @param type $name
     * @return type
     */
    public function getFloat($ih, $name) {
        return $this->ffi_iup->IupGetFloat($ih, $name);
    }
    
    /**
     * 
     * @param type $ih
     * @param type $name
     * @return type
     */
    public  function getInt($ih,$name){
        return $this->ffi_iup->IupGetInt($ih,$name);
    }
    
    /**
     * 
     * @param type $x
     * @param type $y
     * @param type $r
     * @param type $g
     * @param type $b
     * @return type
     */
    public function getColor($x, $y, $r, $g, $b) {
        return $this->ffi_iup->IupGetColor($x, $y, $r, $g, $b);
    }

    public function globalsDialog() {
        return $this->ffi_iup->IupGlobalsDialog();
    }
    
    /**
     * 
     * @param type $title
     * @param type $text
     * @param int $maxsize
     * @return type
     */
    public function getText($title, $text, $maxsize) {
        return $this->ffi_iup->IupGetText($title, $text, $maxsize);
    }
    
    /**
     * 
     * @param type $file
     * @return type
     */
    public function getFile($file) {
        return $this->ffi_iup->IupGetFile($file);
    }
    
    /**
     * 
     * @param type $url
     * @return type
     */
    public function help($url) {
        return $this->ffi_iup->IupHelp($url);
    }
    
    /**
     * 
     * @param type $child
     * @return type
     */
    public function hbox($child) {
        return $this->ffi_iup->IupHbox($child);
    }

    public function hboxV($children) {
        return $this->ffi_iup->IupHboxv($children);
    }
    
    /**
     * 
     * @param int $width
     * @param int $hight
     * @param array $pixmap
     * @return type
     */
    public function image($width, $hight, $pixmap = []) {
        $size = sizeof($pixmap);
        $img = FFI::new("unsigned char[$size]");
        for ($i = 0; $i < count($pixmap); ++$i) {
            $img[$i] = $pixmap[$i];
        }
        return $this->ffi_iup->IupImage($width, $hight, $img);
    }
    
    /**
     * 
     * @param type $widht
     * @param type $height
     * @param type $pixmap
     * @return type
     */
    public function imageRGB($widht, $height, $pixmap) {
        $size = sizeof($pixmap);
        $img = FFI::new("unsigned char[$size]");
        for ($i = 0; $i < count($pixmap); ++$i) {
            $img[$i] = $pixmap[$i];
        }
        return $this->ffi_iup->IupImageRGB($widht, $height, $img);
    }
    /**
     * 
     * @param type $width
     * @param type $height
     * @param type $pixmap
     * @return type
     */
    public function imageRGBA($width, $height, $pixmap) {
        $size = sizeof($pixmap);
        $img = FFI::new("unsigned char[$size]");
        for ($i = 0; $i < count($pixmap); ++$i) {
            $img[$i] = $pixmap[$i];
        }
        return $this->ffi_iup->IupImageRGBA($width, $height, $img);
    }

    public function item($title, $action = null) {
        return $this->ffi_iup->IupItem($title, $action);
    }
    
    public function link($url, $title) {
        return $this->ffi_iup->IupLink($url, $title);
    }
    
    /**
     * 
     * @param int $type
     * @param type $title
     * @param int $size
     * @param type $list
     * @param int $op
     * @param int $max_col
     * @param int $max_lin
     * @param int $marks
     * @return type
     */
    #public function listDialog($type, $title, $size, $list, $op, $max_col, $max_lin, $marks) {
        #$str = implode("", $list);
        #$sizeOf = strlen($str);
        #$items = FFI::new("char *[$sizeOf]");
        #FFI::memcpy($items, $str, $sizeOf);
        #FFI::cast(FFI::type('char**'), $items);
        #$sizeof = sizeof($marks);
        #$mark = FFI::new("int[$sizeof]");
        #for ($i = 0; $i < count($marks); ++$i) {
        #    $mark[$i] = $marks[$i];
        #}
        #return $this->ffi_iup->IupListDialog($type, $title, $size, $items, $op, $max_col, $max_lin,null);
        
    #}
    
    public function layoutDialog($dialog) {
        return $this->ffi_iup->IupLayoutDialog($dialog);
    }
    /**
     * 
     * @param string $label
     * @return \iup\core - IupLabel
     */
    public function label($label=null) {
        return $this->ffi_iup->IupLabel($label);
    }
    
    public function list($action = null) {
        return $this->ffi_iup->IupList($action);
    }
    
    public function mainLoop() {
        return $this->ffi_iup->IupMainLoop();
    }
    
    public function menu($child) { //todo
        return $this->ffi_iup->IupMenu($child, null);
    }

    public function menuV($children) {
        return $this->ffi_iup->IupMenuV($children);
    }
    
    
    public function messagef($title, $format) {
        return $this->ffi_iup->IupMessagef($title, $format);
    }

    public function messageError($parent, $message) {
        return $this->ffi_iup->IupMessageError($parent, $message);
    }

    public function messageAlarm($parent, $title, $message, $buttons) {
        return $this->ffi_iup->IupMessageAlarm($parent, $title, $message, $buttons);
    }
    /**
     * 
     * @param string $title
     * @param string $msg
     * @return Iup\Message - dialog
     */
    public function message($title, $msg) {
        return $this->ffi_iup->IupMessage($title, $msg);
    }
    
    public function multiBox($child) {
        return $this->ffi_iup->IupMultiBox($child);
    }

    public function multiBoxV($children) {
        return $this->ffi_iup->IupMultiBoxv($children);
    }
    
    public function multiLine($action = null) {
        return $this->ffi_iup->IupMultiLine($action);
    }
    
    public function normalizer($ih_first) {
        return $this->ffi_iup->IupNormalizer($ih_first);
    }
    
    public function normalizerV($ih_list) {
        return $this->ffi_iup->IupNormalizerv($ih_list);
    }
    
    public function progressBar() {
        return $this->ffi_iup->IupProgressBar();
    }
    
    public function param($format) {
        return $this->ffi_iup->IupParam($format);
    }

    public function paramBox($param) {
        return $this->ffi_iup->IupParamBox($param);
    }

    public function paramBoxV($param_array) {
        return $this->ffi_iup->IupParamBoxv($param_array);
    }
    
    public function radio($child) {
        return $this->ffi_iup->IupRadio($child);
    }
    
    /**
     * 
     * @param \iup\core Ihandle $ih
     * @param string $name
     * @param string $vale
     * @return type
     */
    public function setAttribute($ih, $name, $vale) {
        return $this->ffi_iup->IupSetAttribute($ih, $name, $vale);
    }
    
    /**
     * 
     * @param \iup\core\Ihandle $ih
     * @param string  $str
     * @return Ihandle object
     */
    public function setAttributes($ih, $str) {
        return $this->ffi_iup->IupSetAttributes($ih, $str);
    }
    
    /**
     * 
     * @param type $ih
     * @param type $name
     * @param type $value
     * @return type
     */
    public function setInt($ih, $name, $value) {
        return $this->ffi_iup->IupSetInt($ih, $name, $value);
    }

    public function setAttributeHandle($ih, $name, $ih_named) {
        return $this->ffi_iup->IupSetAttributeHandle($ih, $name, $ih_named);
    }
    
    public function setHandle($name, $ih) {
        return $this->ffi_iup->IupSetHandle($name, $ih);
    }

    public function showXY($ih, $x, $y) {
        return $this->ffi_iup->IupShowXY($ih, $x, $y);
    }

    public function storeAttribute($ih, $name, $value) {
        return $this->ffi_iup->IupStoreAttribute($ih, $name, $value);
    }
    
    public function space() {
        return $this->ffi_iup->IupSpace();
    }
    
    public function setCallback($ih, $name, $func) {
        return $this->ffi_iup->IupSetCallback($ih, $name, $func);
    }

    public function setCallbacks($ih, $name, $func, $arryF) {
        return $this->ffi_iup->IupSetCallbacks($ih, $name, $func, $arryF);
    }
    
    public function sbox($child) {
        return $this->ffi_iup->IupSbox($child);
    }

    public function split($child_1, $child_2) {
        return $this->ffi_iup->IupSplit($child_1, $child_2);
    }

    public function scrollBox($child) {
        return $this->ffi_iup->IupScrollBox($child);
    }
    
    public function subMenu($title, $child) {
        return $this->ffi_iup->IupSubmenu($title, $child);
    }

    public function separator() {
        return $this->ffi_iup->IupSeparator();
    }
    
    public function spin() {
        return $this->ffi_iup->IupSpin();
    }

    public function spinBox($child) {
        return $this->ffi_iup->IupSpinbox($child);
    }
    
    public function setFunction($name,$func){
        return $this->ffi_iup->IupSetFunction($name, $func);
    }
    
    public function setStrf($ih, $name, $format, ...$arg) {
        return $this->ffi_iup->IupSetStrf($ih, $name, $format, ...$arg);
    }

    public function stringCompare($string_1, $string_2, $casesensitive, $lexicographic) {
        return $this->ffi_iup->IupStringCompare($string_1, $string_2, $casesensitive, $lexicographic);
    }

    public function saveImageAsText($ih, $file_name, $format, $name) {
        return $this->ffi_iup->IupSaveImageAsText($ih, $file_name, $format, $name);
    }

    public function textConvertLinColToPos($ih, $ln, $col, $pos) {
        return $this->ffi_iup->IupTextConvertLinColToPos($ih, $ln, $col, $pos);
    }

    public function textConvertPosToLinCol($ih, $pos, $ln, $col) {
        return $this->ffi_iup->IupTextConvertPosToLinCol($ih, $pos, $ln, $col);
    }
    
    public function text($val = null) {
        return $this->ffi_iup->IupText($val);
    }
    
    public function toggle($title, $action = null) {
        return $this->ffi_iup->IupToggle($title, $action);
    }
    
    public function timer() {
        return $this->ffi_iup->IupTimer();
    }
    
    public function tree() {
        return $this->ffi_iup->IupTree();
    }

    public function tabs($child) {
        return $this->ffi_iup->IupTabs($child);
    }

    public function tabsV($children) {
        return $this->ffi_iup->IupTabsv($children);
    }
    
    public function user() {
        return $this->ffi_iup->IupUser();
    }
    
    public function val($type = null) {
        return $this->ffi_iup->IupVal($type);
    }
    
    /**
     * 
     * @param \iup\widget $child
     * @param type $flag
     * @return type
     */
    public function vbox($child, $flag = null) {
        return $this->ffi_iup->IupVbox($child, $flag);
    }
    
    public function vboxV($children) {
        return $this->ffi_iup->IupVboxv($children);
    }

    public function zbox($child) {
        return $this->ffi_iup->IupZbox($child);
    }

    public function zboxV($children) {
        return $this->ffi_iup->IupZboxv($children);
    }
    
    public function elementPropertiesDialog($elem) {
        return $this->ffi_iup->IupElementPropertiesDialog($elem);
    }

    public function scanf($format) {
        return $this->ffi_iup->IupScanf($format);
    }

    public function fileDlg() {
        return $this->ffi_iup->IupFileDlg();
    }

    public function colorDlg() {
        return $this->ffi_iup->IupColorDlg();
    }

    public function fontDlg() {
        return $this->ffi_iup->IupFontDlg();
    }

    public function progressDlg() {
        return $this->ffi_iup->IupProgressDlg();
    }

    public function loopStep() {
        return $this->ffi_iup->IupLoopStep();
    }

    public function loopStepWait() {
        return $this->ffi_iup->IupLoopStepWait();
    }

    public function mainLoopLevel() {
        return $this->ffi_iup->IupMainLoopLevel();
    }

    public function flush() {
        return $this->ffi_iup->IupFlush();
    }

    public function exitLoop() {
        return $this->ffi_iup->IupExitLoop();
    }

    public function recordInput($file, $mode) {
        return $this->ffi_iup->IupRecordInput($file, $mode);
    }

    public function playInput($filename) {
        return $this->ffi_iup->IupPlayInput($filename);
    }

    public function update($ih) {
        return $this->ffi_iup->IupUpdate($ih);
    }

    public function updateChildren($ih) {
        return $this->ffi_iup->IupUpdateChildren($ih);
    }

    public function redraw($ih, $children) {
        return $this->ffi_iup->IupRedraw($ih, $children);
    }

    public function refresh($ih) {
        return $this->ffi_iup->IupRefresh($ih);
    }

    public function refreshChildren($ih) {
        return $this->ffi_iup->IupRefreshChildren($ih);
    }

    public function load($filname) {
        return $this->ffi_iup->IupLoad($filname);
    }

    public function loadBuffer($buffer) {
        return $this->ffi_iup->IupLoadBuffer($buffer);
    }

    public function destroy($ih) {
        return $this->ffi_iup->IupDestroy($ih);
    }

    public function detach($child) {
        return $this->ffi_iup->IupDetach($child);
    }

    public function append($ih, $child) {
        return $this->ffi_iup->IupAppend($ih, $child);
    }

    public function insert($ih, $ref_child, $child) {
        return $this->ffi_iup->IupInsert($ih, $ref_child, $child);
    }

    public function getChild($ih, $child) {
        return $this->ffi_iup->IupGetChild($ih, $child);
    }

    public function getChildPos($ih, $child) {
        return $this->ffi_iup->IupGetChildPos($ih, $child);
    }

    public function getChildCount($ih) {
        return $this->ffi_iup->IupGetChildCount($ih);
    }

    public function getNextChild($ih, $child) {
        return $this->ffi_iup->IupGetNextChild($ih, $child);
    }

    public function getBrother($ih) {
        return $this->ffi_iup->IupGetBrother($ih);
    }

    public function getParent($ih) {
        return $this->ffi_iup->IupGetParent($ih);
    }

    public function getDialog($ih) {
        return $this->ffi_iup->IupGetDialog($ih);
    }

    public function getDialogChild($ih, $name) {
        return $this->ffi_iup->IupGetDialogChild($ih, $name);
    }

    public function reparent($ih, $new_parent, $ref_child) {
        return $this->ffi_iup->IupReparent($ih, $new_parent, $ref_child);
    }

    public function popup($ih, $x, $y) {
        return $this->ffi_iup->IupPopup($ih, $x, $y);
    }

    public function show($ih) {
        return $this->ffi_iup->IupShow($ih);
    }

    public function hide($ih) {
        return $this->ffi_iup->IupHide($ih);
    }

    public function map($ih) {
        return $this->ffi_iup->IupMap($ih);
    }

    public function unMap($ih) {
        return $this->ffi_iup->IupUnmap($ih);
    }

    public function setGlobal($name, $value) {
        return $this->ffi_iup->IupSetGlobal($name, $value);
    }

    public function setStrGlobal($name, $value) {
        return $this->ffi_iup->IupSetStrGlobal($name, $value);
    }

    public function getGlobal($ih, $name) {
        return $this->ffi_iup->IupGetGlobal($ih, $name);
    }
    
    public static function strcpy($dst,$src){
        $ffi = FFI::cdef("");
    }
}

class scintilla {

    protected $ffi_scintilla;

    public function __construct() {
        $this->ffi_scintilla = \FFI::load(__DIR__ . '/scintilla.h');
        $this->scintillaOpen();
    }
    
    public function scintilla_init() {
        return \FFI::cast(core::ihandlePtr(), $this->ffi_scintilla->IupScintilla());
    }

    public function ScintillaDlg() {
        return \FFI::cast(core::ihandlePtr(), $this->ffi_scintilla->IupScintillaDlg());
    }
    
    public function __call($name, $arguments = []) {
        $name = 'Iup' . ucfirst($name);
        return $this->ffi_scintilla->$name(...$arguments);
    }
}

class webView {

    protected $ffi_webView;
    public $url, $title;

    public function __construct($title = 'core', $url = 'http://google.in') {
        $this->ffi_webView = \FFI::load(__DIR__ . '/webKit.h');
        $this->title = $title;
        $this->url = $url;
        $this->webBrowserOpen();
    }
    
    public function webopen(){
        return FFI::cast(core::ihandlePtr(), $this->webBrowser());
    }

    public function __call($name, $arguments = []) {
        $name = 'Iup' . ucfirst($name);
        return $this->ffi_webView->$name(...$arguments);
    }
}

class extra {

    protected $ffi_extra;

    public function __construct() {
        $this->ffi_extra = \FFI::load(__DIR__ . '/controls.h');
        $this->controlsOpen();
    }
    
    public function cells() {
        return FFI::cast(core::ihandlePtr(), $this->ffi_extra->IupCells());
    }
    
    public function matrix($action = null) {
        return FFI::cast(core::ihandlePtr(), $this->ffi_extra->IupMatrix($action));
    }
    
    public function matrixList() {
        return FFI::cast(core::ihandlePtr(), $this->ffi_extra->IupMatrixList());
    }

    public function matrixEx() {
        return FFI::cast(core::ihandlePtr(), $this->ffi_extra->IupMatrixEx());
    }
    
    public function __call($name, $arguments = []) {
        $name = 'Iup' . ucfirst($name);
        return $this->ffi_extra->$name(...$arguments);
    }

}

class image {

    protected $ffi_iupImage;

    public function __construct() {
        $this->ffi_iupImage = FFI::load(__DIR__ . '/iupim.h');
    }
    
    public function loadImage($file){
        return FFI::cast(core::ihandlePtr(), $this->ffi_iupImage->IupLoadImage($file));
    }
    
    public function saveImage($ih, $file_name, $format){
        return $this->ffi_iupImage->IupSaveImage($ih, $file_name, $format);
    }
    
    public function loadAnimation($file_name) {
        $load_animation = $this->ffi_iupImage->IupLoadAnimation($file_name);
        return \FFI::cast(core::ihandlePtr(), $load_animation);
    }
    
    public function loadAnimationFrames($file_name_list, $file_count) {
        $frames = $this->ffi_iupImage->IupLoadAnimationFrames($file_name_list, $file_count);
        return \FFI::cast(core::ihandlePtr(), $frames);
    }

}

class canvas {

    public $ffi_iupcd;

    public function __construct() {
        $this->ffi_cd = FFI::load(__DIR__ . '/cd.h');
        $this->ffi_iupcd = FFI::load(__DIR__ . '/iupcd.h');
    }

    public function __call($name, $arguments = []) {
        $name = 'Iup' . ucfirst($name);
        return $this->ffi_iupcd->$name(...$arguments);
    }

}

class im {

    const RGB = 'IM_RGB';
    const MAP = 'IM_MAP';
    const GRAY = 'IM_GRAY';
    const BINARY = 'IM_BINARY';
    const CMYK = 'IM_CMYK';
    const YCBCR = 'IM_YCBCR';
    const LAB = 'IM_LAB';
    const LUV = 'IM_LUV';
    const XYZ = 'IM_XYZ';
    const ERR_NONE = 'IM_ERR_NONE';
    const ERR_OPEN = 'IM_ERR_OPEN';
    const ERR_ACCESS = 'IM_ERR_ACCESS';
    const ERR_FORMAT = 'IM_ERR_FORMAT';
    const ERR_DATA = 'IM_ERR_DATA';
    const ERR_COMPRESS = 'IM_ERR_COMPRESS';
    const ERR_MEM = 'IM_ERR_MEM';
    const ERR_COUNTER = 'IM_ERR_COUNTER';
    const ALPHA = 0x100;
    const PACKED = 0x200;
    const TOPDOWN = 0x400;

    public $ffi_im, $imImage_ptr, $imFile_ptr;

    public function __construct() {
        $this->ffi_im = FFI::load(__DIR__ . '/im.h');
        $this->imFile_ptr = $this->ffi_im->type('imFile*');
        $this->imImage_ptr = $this->ffi_im->type('imImage*');
    }

    public function __call($name, $arguments = []) {
        $name = 'im' . ucfirst($name);
        return $this->ffi_im->$name(...$arguments);
    }

}

class cd {

    const CD_PLAIN = 0;
    const CD_BOLD = 1;
    const CD_ITALIC = 2;
    const CD_UNDERLINE = 4;
    const CD_STRIKEOUT = 8;
    const CD_QUERY = -1;
    const CD_ERROR = -1;
    const CD_OK = 0;
    const CD_SMALL = 8;
    const CD_STANDARD = 12;
    const CD_LARGE = 18;
    const CD_CAP_NONE = 0x00000000;
    const CD_CAP_FLUSH = 0x00000001;
    const CD_CAP_CLEAR = 0x00000002;
    const CD_CAP_PLAY = 0x00000004;
    const CD_CAP_YAXIS = 0x00000008;
    const CD_CAP_CLIPAREA = 0x00000010;
    const CD_CAP_CLIPPOLY = 0x00000020;
    const CD_CAP_REGION = 0x00000040;
    const CD_CAP_RECT = 0x00000080;
    const CD_CAP_CHORD = 0x00000100;
    const CD_CAP_IMAGERGB = 0x00000200;
    const CD_CAP_IMAGERGBA = 0x00000400;
    const CD_CAP_IMAGEMAP = 0x00000800;
    const CD_CAP_GETIMAGERGB = 0x00001000;
    const CD_CAP_IMAGESRV = 0x00002000;
    const CD_CAP_BACKGROUND = 0x00004000;
    const CD_CAP_BACKOPACITY = 0x00008000;
    const CD_CAP_WRITEMODE = 0x00010000;
    const CD_CAP_LINESTYLE = 0x00020000;
    const CD_CAP_LINEWITH = 0x00040000;
    const CD_CAP_FPRIMTIVES = 0x00080000;
    const CD_CAP_HATCH = 0x00100000;
    const CD_CAP_STIPPLE = 0x00200000;
    const CD_CAP_PATTERN = 0x00400000;
    const CD_CAP_FONT = 0x00800000;
    const CD_CAP_FONTDIM = 0x01000000;
    const CD_CAP_TEXTSIZE = 0x02000000;
    const CD_CAP_TEXTORIENTATION = 0x04000000;
    const CD_CAP_PALETTE = 0x08000000;
    const CD_CAP_LINECAP = 0x10000000;
    const CD_CAP_LINEJOIN = 0x20000000;
    const CD_CAP_PATH = 0x40000000;
    const CD_CAP_BEZIER = 0x80000000;
    const CD_CAP_ALL = 0xFFFFFFFF;
    const CD_SIM_NONE = 0x0000;
    const CD_SIM_LINE = 0x0001;
    const CD_SIM_RECT = 0x0002;
    const CD_SIM_BOX = 0x0004;
    const CD_SIM_ARC = 0x0008;
    const CD_SIM_SECTOR = 0x0010;
    const CD_SIM_CHORD = 0x0020;
    const CD_SIM_POLYLINE = 0x0040;
    const CD_SIM_POLYGON = 0x0080;
    const CD_SIM_TEXT = 0x0100;
    const CD_SIM_ALL = 0xFFFF;
    const RED = 0xFF0000;   /* 255,  0,  0 */
    const DARK_RED = 0x800000; /* 128,  0,  0 */
    const GREEN = 0x00FF00; /*   0,255,  0 */
    const DARK_GREEN = 0x008000; /*   0,128,  0 */
    const BLUE = 0x0000FF; /*   0,  0,255 */
    const DARK_BLUE = 0x000080; /*   0,  0,128 */
    const YELLOW = 0xFFFF00; /* 255,255,  0 */
    const DARK_YELLOW = 0x808000; /* 128,128,  0 */
    const MAGENTA = 0xFF00FF; /* 255,  0,255 */
    const DARK_MAGENTA = 0x800080; /* 128,  0,128 */
    const CYAN = 0x00FFFF; /*   0,255,255 */
    const DARK_CYAN = 0x008080; /*   0,128,128 */
    const WHITE = 0xFFFFFF; /* 255,255,255 */
    const BLACK = 0x000000; /*   0,  0,  0 */
    const DARK_GRAY = 0x808080; /* 128,128,128 */
    const GRAY = 0xC0C0C0; /* 192,192,192 */

    public $ffi_cd;
    protected static $cdCanvasPtr;

    public function __construct() {
        $this->ffi_cd = FFI::load(__DIR__ . '/cd.h');
        self::$cdCanvasPtr = $this->ffi_cd->new('cdCanvas*');
    }
    
    public static function canvasPtr() {
        return self::$cdCanvasPtr;
    }
    
    public function __call($name, $arguments = []) {
        $name = 'cd' . ucfirst($name);
        return $this->ffi_cd->$name(...$arguments);
    }

}
