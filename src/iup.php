<?php

namespace iup;

use FFI;
 
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

    public $ffi, $ihandle, $ffi_libImg;
    protected $argc;

    public function __construct() {
        $this->ffi = FFI::load(__DIR__ . '/iup.h');
        $this->ffi_libImg = FFI::cdef('extern void IupImageLibOpen(void);', 'dll_libs/iup/iupimglib.dll');
        $this;
    }

    public function init() {
        $this->argc = $this->ffi->new('int32_t', false);
        $this->ffi->IupOpen(FFI::addr($this->argc), null);
        return $this;
    }

    public function ihandle() {
        return $this->ihandle = $this->ffi->new('Ihandle*');
    }

    public function close() {
        $this->ffi->IupClose();
    }
    public function __call($name, $arguments = []) {
        $name = 'Iup' . ucfirst($name);
        $number = count($arguments);
        return $this->ffi->$name(...$arguments);
    }
    public function Version() {
        $ver[] = FFI::string($this->ffi->IupVersion());
        $ver[] = FFI::string($this->ffi->IupVersionDate());
        $ver[] = (string) $this->ffi->IupVersionNumber();
        return $ver;
    }

    public function ImageLibOpen() {
        return $this->ffi_libImg->IupImageLibOpen();
    }

    public function MainLoop() {
        return $this->ffi->IupMainLoop();
    }

    public function GetAttribute($ih, $name) {
        return $this->ffi->IupGetAttribute($ih, $name);
    }

    /**
     * 
     * @param Ihandle $name
     * @return type
     */
    public function GetHandle($name) {
        return $this->ffi->IupGetHandle($name);
    }

    /**
     * 
     * @param \iup\Ihandle $ih
     * @param string $name
     * @param string $vale
     * @return type
     */
    public function SetAttribute($ih, $name, $vale) {
        return $this->ffi->IupSetAttribute($ih, $name, $vale);
    }

    public function SetAttributes($ih, $str) {
        return $this->ffi->IupSetAttributes($ih, $str);
    }

    public function setInt($ih, $name, $value) {
        return $this->ffi->IupSetInt($ih, $name, $value);
    }

    public function SetAttributeHandle($ih, $name, $ih_named) {
        return $this->ffi->IupSetAttributeHandle($ih, $name, $ih_named);
    }

    public function GetAttributeHandle($ih, $name) {
        return $this->ffi->IupGetAttributeHandle($ih, $name);
    }

    public function SetHandle($name, $ih) {
        return $this->ffi->IupSetHandle($name, $ih);
    }

    public function ShowXY($ih, $x, $y) {
        return $this->ffi->IupShowXY($ih, $x, $y);
    }

    public function StoreAttribute($ih, $name, $value) {
        return $this->ffi->IupStoreAttribute($ih, $name, $value);
    }

    /**
     * 
     * @param \iup\widget $child
     * @param type $flag
     * @return type
     */
    public function Vbox($child, $flag = null) {
        return $this->ffi->IupVbox($child, $flag);
    }

    /**
     * 
     * @param type $title
     * @param type $action
     * @return type
     */
    public function Button($title, $action = null) {
        return $this->ffi->IupButton($title, $action);
    }

    public function Callback($ih, $name, $func) {
        return $this->ffi->IupSetCallback($ih, $name, $func);
    }

    public function SetCallback($ih, $name, $func) {
        return $this->ffi->IupSetCallback($ih, $name, $func);
    }

    public function SetCallbacks($ih, $name, $func, $arryF) {
        return $this->ffi->IupSetCallbacks($ih, $name, $func, $arryF);
    }

    /**
     * 
     * @param string $label
     * @return \iup\core - IupLabel
     */
    public function Label($label=null) {
        return $this->ffi->IupLabel($label);
    }

    /**
     * 
     * @param \iup\widget $child
     * @return type
     */
    public function Dialog($child) {
        return $this->ffi->IupDialog($child);
    }

    /**
     * 
     * @param string $title
     * @param string $msg
     * @return Iup\Message - dialog
     */
    public function Message($title, $msg) {
        return $this->ffi->IupMessage($title, $msg);
    }

    public function Help($url) {
        return $this->ffi->IupHelp($url);
    }

    public function Fill() {
        return $this->ffi->IupFill();
    }

    public function Space() {
        return $this->ffi->IupSpace();
    }

    public function Radio($child) {
        return $this->ffi->IupRadio($child);
    }

    public function VboxV($children) {
        return $this->ffi->IupVboxv($children);
    }

    public function Zbox($child) {
        return $this->ffi->IupZbox($child);
    }

    public function ZboxV($children) {
        return $this->ffi->IupZboxv($children);
    }

    public function Hbox($child) {
        return $this->ffi->IupHbox($child);
    }

    public function HobxV($children) {
        return $this->ffi->IupHboxv($children);
    }

    public function Normalizer($ih_first) {
        return $this->ffi->IupNormalizer($ih_first);
    }

    public function NormalizerV($ih_list) {
        return $this->ffi->IupNormalizerv($ih_list);
    }

    public function Cbox($child) {
        return $this->ffi->IupCbox($child);
    }

    public function CboxV($children) {
        return $this->ffi->IupCboxv($children);
    }

    public function Sbox($child) {
        return $this->ffi->IupSbox($child);
    }

    public function Split($child_1, $child_2) {
        return $this->ffi->IupSplit($child_1, $child_2);
    }

    public function ScrollBox($child) {
        return $this->ffi->IupScrollBox($child);
    }

    public function FlatScrollBox($child) {
        return $this->ffi->IupFlatScrollBox($child);
    }

    public function GridBox($child) {
        return $this->ffi->IupGridBox($child);
    }

    public function GridBoxV($children) {
        return $this->ffi->IupGridBoxv($children);
    }

    public function MultiBox($child) {
        return $this->ffi->IupMultiBox($child);
    }

    public function MultiBoxV($children) {
        return $this->ffi->IupMultiBoxv($children);
    }

    public function Expander($child) {
        return $this->ffi->IupExpander($child);
    }

    public function DetachBox($child) {
        return $this->ffi->IupDetachBox($child);
    }

    public function BackgroundBox($child) {
        return $this->ffi->IupBackgroundBox($child);
    }

    public function Frame($child) {
        return $this->ffi->IupFrame($child);
    }

    public function FlatFrame($child) {
        return $this->ffi->IupFlatFrame($child);
    }

    /**
     * 
     * @param int $width
     * @param int $hight
     * @param array $pixmap
     * @return type
     */
    public function Image($width, $hight, $pixmap = []) {
        $size = sizeof($pixmap);
        $img = FFI::new("unsigned char[$size]");
        for ($i = 0; $i < count($pixmap); $i++) {
            $img[$i] = $pixmap[$i];
        }
        return $this->ffi->IupImage($width, $hight, $img);
    }

    public function ImageRGB($widht, $height, $pixmap) {
        return $this->ffi->IupImageRGB($widht, $height, $pixmap);
    }

    public function ImageRGBA($width, $height, $pixmap) {
        return $this->ffi->IupImageRGBA($width, $height, $pixmap);
    }

    public function Item($title, $action = null) {
        return $this->ffi->IupItem($title, $action);
    }

    public function SubMenu($title, $child) {
        return $this->ffi->IupSubmenu($title, $child);
    }

    public function Separator() {
        return $this->ffi->IupSeparator();
    }

    public function Menu($child) { //todo
        return $this->ffi->IupMenu($child, null);
    }

    public function MenuV($children) {
        return $this->ffi->IupMenuV($children);
    }

    public function FlatButton($title) {
        return $this->ffi->IupFlatButton($title);
    }

    public function FlatToggle($title) {
        return $this->ffi->IupFlatToggle($title);
    }

    public function DropButton($dropChild) {
        return $this->ffi->IupDropChild($dropChild);
    }

    public function FlatLabel($title) {
        return $this->ffi->IupFlatLabel($title);
    }

    public function FlatSeparator() {
        return $this->ffi->IupFlatSeparator();
    }

    public function Canvas($action = null) {
        return $this->ffi->IupCanvas($action);
    }

    public function User() {
        return $this->ffi->IupUser();
    }

    public function List($action = null) {
        return $this->ffi->IupList($action);
    }

    public function FlatList() {
        return $this->ffi->IupFlatList();
    }

    public function Text($action = null) {
        return $this->ffi->IupText($action);
    }

    public function Toggle($title, $action = null) {
        return $this->ffi->IupToggle($title, $action);
    }

    public function MultiLine($action = null) {
        return $this->ffi->IupMultiLine($action);
    }

    public function Timer() {
        return $this->ffi->IupTimer();
    }

    public function ClipBoard() {
        return $this->ffi->IupClipBoard();
    }

    public function ProgressBar() {
        return $this->ffi->IupProgressBar();
    }

    public function Val($type = null) {
        return $this->ffi->IupVal($type);
    }

    public function Tabs($child) {
        return $this->ffi->IupTabs($child);
    }

    public function TabsV($children) {
        return $this->ffi->IupTabsv($children);
    }

    public function FlatTabs($first) {
        return $this->ffi->IupFlatTabs($first);
    }

    public function FlatTabsV($children) {
        return $this->ffi->IupFlatTabsv($children);
    }

    public function Tree() {
        return $this->ffi->IupTree();
    }

    public function Link($url, $title) {
        return $this->ffi->IupLink($url, $title);
    }

    public function AnimatedLabel($animation) {
        return $this->ffi->IupAnimatedLabel($animation);
    }

    public function DatePick() {
        return $this->ffi->IupDatePick();
    }

    public function Calendar() {
        return $this->ffi->IupCalendar();
    }

    public function ColorBar() {
        return $this->ffi->IupColorbar();
    }

    public function Gauge() {
        return $this->ffi->IupGauge();
    }

    public function Dial($type) {
        return $this->ffi->IupDial($type);
    }

    public function Spin() {
        return $this->ffi->IupSpin();
    }

    public function SpinBox($child) {
        return $this->ffi->IupSpinbox($child);
    }

    public function StringCompare($string_1, $string_2, $casesensitive, $lexicographic) {
        return $this->ffi->IupStringCompare($string_1, $string_2, $casesensitive, $lexicographic);
    }

    public function SaveImageAsText($ih, $file_name, $format, $name) {
        return $this->ffi->IupSaveImageAsText($ih, $file_name, $format, $name);
    }

    public function TextConvertLinColToPos($ih, $ln, $col, $pos) {
        return $this->ffi->IupTextConvertLinColToPos($ih, $ln, $col, $pos);
    }

    public function TextConvertPosToLinCol($ih, $pos, $ln, $col) {
        return $this->ffi->IupTextConvertPosToLinCol($ih, $pos, $ln, $col);
    }

    public function ConvertXYToPos($ih, $x, $y) {
        return $this->ffi->IupConvertXYToPos($ih, $x, $y);
    }

    public function TreeSetUserId($ih, $id, $userid) {
        return $this->ffi->IupTreeSetUserId($ih, $id, $userid);
    }

    public function TreeGetUserId($ih, $id) {
        return $this->ffi->IupTreeGetUserId($ih, $id);
    }

    public function TreeGetId($ih, $userid) {
        return $this->ffi->IupTreeGetId($ih, $userid);
    }

    public function TreeSetAttributeHandle($ih, $name, $id, $ih_named) {
        return $this->ffi->IupTreeSetAttributeHandle($ih, $name, $id, $ih_named);
    }

    /**
     * 
     * @param \iup\Ihandle $ih
     * @param type $name
     * @return type
     */
    public function IupGetFloat($ih, $name) {
        return $this->ffi->IupGetFloat($ih, $name);
    }

    public function GetFile($file) {
        return $this->ffi->IupGetFile($file);
    }

    public function Messagef($title, $format) {
        return $this->ffi->IupMessagef($title, $format);
    }

    public function MessageError($parent, $message) {
        return $this->ffi->IupMessageError($parent, $message);
    }

    public function MessageAlarm($parent, $title, $message, $buttons) {
        return $this->ffi->IupMessageAlarm($parent, $title, $message, $buttons);
    }

    public function Alarm($title, $msg, $b1, $b2, $b3) {
        return $this->ffi->IupAlarm($title, $msg, $b1, $b2, $b3);
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
    public function ListDialog($type, $title, $size, $list, $op, $max_col, $max_lin, $marks) {
        return $this->ffi->IupListDialog($type, $title, $size, $list, $op, $max_col, $max_lin, $marks);
    }

    /**
     * 
     * @param type $title
     * @param type $text
     * @param int $maxsize
     * @return type
     */
    public function GetText($title, $text, $maxsize) {
        return $this->ffi->IupGetText($title, $text, $maxsize);
    }

    public function GetColor($x, $y, $r, $g, $b) {
        return $this->ffi->IupGetColor($x, $y, $r, $g, $b);
    }

    public function GlobalsDialog() {
        return $this->ffi->IupGlobalsDialog();
    }

    public function LayoutDialog($dialog) {
        return $this->ffi->IupLayoutDialog($dialog);
    }

    public function Param($format) {
        return $this->ffi->IupParam($format);
    }

    public function ParamBox($param) {
        return $this->ffi->IupParamBox($param);
    }

    public function ParamBoxV($param_array) {
        return $this->ffi->IupParamBoxv($param_array);
    }

    public function ElementPropertiesDialog($elem) {
        return $this->ffi->IupElementPropertiesDialog($elem);
    }

    public function Scanf($format) {
        return $this->ffi->IupScanf($format);
    }

    public function FileDlg() {
        return $this->ffi->IupFileDlg();
    }

    public function ColorDlg() {
        return $this->ffi->IupColorDlg();
    }

    public function FontDlg() {
        return $this->ffi->IupFontDlg();
    }

    public function ProgressDlg() {
        return $this->ffi->IupProgressDlg();
    }

    public function LoopStep() {
        return $this->ffi->IupLoopStep();
    }

    public function LoopStepWait() {
        return $this->ffi->IupLoopStepWait();
    }

    public function MainLoopLevel() {
        return $this->ffi->IupMainLoopLevel();
    }

    public function Flush() {
        return $this->ffi->IupFlush();
    }

    public function ExitLoop() {
        return $this->ffi->IupExitLoop();
    }

    public function RecordInput($file, $mode) {
        return $this->ffi->IupRecordInput($file, $mode);
    }

    public function PlayInput($filename) {
        return $this->ffi->IupPlayInput($filename);
    }

    public function Update($ih) {
        return $this->ffi->IupUpdate($ih);
    }

    public function UpdateChildren($ih) {
        return $this->ffi->IupUpdateChildren($ih);
    }

    public function Redraw($ih, $children) {
        return $this->ffi->IupRedraw($ih, $children);
    }

    public function Refresh($ih) {
        return $this->ffi->IupRefresh($ih);
    }

    public function RefreshChildren($ih) {
        return $this->ffi->IupRefreshChildren($ih);
    }

    public function Load($filname) {
        return $this->ffi->IupLoad($filname);
    }

    public function LoadBuffer($buffer) {
        return $this->ffi->IupLoadBuffer($buffer);
    }

    public function Destroy($ih) {
        return $this->ffi->IupDestroy($ih);
    }

    public function Detach($child) {
        return $this->ffi->IupDetach($child);
    }

    public function Append($ih, $child) {
        return $this->ffi->IupAppend($ih, $child);
    }

    public function Insert($ih, $ref_child, $child) {
        return $this->ffi->IupInsert($ih, $ref_child, $child);
    }

    public function GetChild($ih, $child) {
        return $this->ffi->IupGetChild($ih, $child);
    }

    public function GetChildPos($ih, $child) {
        return $this->ffi->IupGetChildPos($ih, $child);
    }

    public function GetChildCount($ih) {
        return $this->ffi->IupGetChildCount($ih);
    }

    public function GetNextChild($ih, $child) {
        return $this->ffi->IupGetNextChild($ih, $child);
    }

    public function GetBrother($ih) {
        return $this->ffi->IupGetBrother($ih);
    }

    public function GetParent($ih) {
        return $this->ffi->IupGetParent($ih);
    }

    public function GetDialog($ih) {
        return $this->ffi->IupGetDialog($ih);
    }

    public function GetDialogChild($ih, $name) {
        return $this->ffi->IupGetDialogChild($ih, $name);
    }

    public function Reparent($ih, $new_parent, $ref_child) {
        return $this->ffi->IupReparent($ih, $new_parent, $ref_child);
    }

    public function Popup($ih, $x, $y) {
        return $this->ffi->IupPopup($ih, $x, $y);
    }

    public function Show($ih) {
        return $this->ffi->IupShow($ih);
    }

    public function Hide($ih) {
        return $this->ffi->IupHide($ih);
    }

    public function Map($ih) {
        return $this->ffi->IupMap($ih);
    }

    public function UnMap($ih) {
        return $this->ffi->IupUnmap($ih);
    }

    public function SetFunction($name, $func) {
        return $this->ffi->IupSetFunction($name, $func);
    }

    public function SetGlobal($name, $value) {
        return $this->ffi->IupSetGlobal($name, $value);
    }

    public function SetStrGlobal($name, $value) {
        return $this->ffi->IupSetStrGlobal($name, $value);
    }

    public function GetGlobal($ih, $name) {
        return $this->ffi->IupGetGlobal($ih, $name);
    }

    public function im() {
        return $im = new im();
    }

    public function loadImage($file_name) {
        $load_image = $this->im()->ffi_iupim->IupLoadImage($file_name);
        return \FFI::cast(\FFI::typeof($this->ihandle()), $load_image);
    }

    public function saveImage($ih, $file_name, $format) {
        return $this->im()->ffi_iupim->IupSaveImage($ih, $file_name, $format);
    }

    public function loadAnimation($file_name) {
        $load_animation = $this->im()->ffi_iupim->IupLoadAnimation($file_name);
        return \FFI::cast(\FFI::typeof($this->ihandle()), $load_animation);
    }

    public function loadAnimationFrames($file_name_list, $file_count) {
        $frames = $this->im()->ffi_iupim->IupLoadAnimationFrames($file_name_list, $file_count);
        return \FFI::cast(\FFI::typeof($this->ihandle()), $frames);
    }

    public function cells() {
        
    }

}

class scintilla extends core {

    public $ffi_scintila;

    public function __construct() {
        parent::__construct();
        $this->init();
        $this->ffi_scintila = FFI::load(__DIR__ . '/scintilla.h');
    }

    public function scintillaOpen() {
        return $this->ffi_scintila->IupScintillaOpen();
    }

    public function scintilla() {
        return \FFI::cast(\FFI::typeof($this->ihandle()), $this->ffi_scintila->IupScintilla());
    }

    public function ScintillaDlg() {
        return \FFI::cast(\FFI::typeof($this->ihandle()), $this->ffi_scintila->IupScintillaDlg());
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
    const CD_RED = 0xFF0000;   /* 255,  0,  0 */
    const CD_DARK_RED = 0x800000; /* 128,  0,  0 */
    const CD_GREEN = 0x00FF00; /*   0,255,  0 */
    const CD_DARK_GREEN = 0x008000; /*   0,128,  0 */
    const CD_BLUE = 0x0000FF; /*   0,  0,255 */
    const CD_DARK_BLUE = 0x000080; /*   0,  0,128 */
    const CD_YELLOW = 0xFFFF00; /* 255,255,  0 */
    const CD_DARK_YELLOW = 0x808000; /* 128,128,  0 */
    const CD_MAGENTA = 0xFF00FF; /* 255,  0,255 */
    const CD_DARK_MAGENTA = 0x800080; /* 128,  0,128 */
    const CD_CYAN = 0x00FFFF; /*   0,255,255 */
    const CD_DARK_CYAN = 0x008080; /*   0,128,128 */
    const CD_WHITE = 0xFFFFFF; /* 255,255,255 */
    const CD_BLACK = 0x000000; /*   0,  0,  0 */
    const CD_DARK_GRAY = 0x808080; /* 128,128,128 */
    const CD_GRAY = 0xC0C0C0; /* 192,192,192 */

    public $ffi_iupcd, $ffi_cd, $cdCanvas;

    public function __construct() {
        $this->ffi_cd = FFI::load(__DIR__ . '/cd.h');
        $this->ffi_iupcd = FFI::load(__DIR__ . '/iupcd.h');
    }

    public function cdCanvas() {
        return $this->ffi_cd->new('cdCanvas*');
    }

    public function cdCreateCanvas($cd_context, $data) {
        return $this->ffi_cd->cdCreateCanvas($cd_context, $data);
    }

    public function cdCanvasActivate($cdCanvas) {
        return $this->ffi_cd->cdCanvasActivate($cdCanvas);
    }

    public function cdCanvasClear($cdCanvas) {
        return $this->ffi_cd->cdCanvasClear($cdCanvas);
    }

    public function cdCanvasFlush($canvas) {
        return $this->ffi_cd->cdCanvasFlush($canvas);
    }

    public function cdKillCanvas($canvas) {
        return $this->ffi_cd->cdKillCanvas($canvas);
    }

}

class plot extends cd {


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

    public $ffi_iupim, $ffi_im, $ffi_image, $imImage, $imFile;

    public function __construct() {
        $this->ffi_im = FFI::load(__DIR__ . '/im.h');
        $this->ffi_image = FFI::load(__DIR__ . '/image.h');
        $this->ffi_iupim = FFI::load(__DIR__ . '/iupim.h');
        return $this;
    }

    public function imFile() {
        return $this->imFile = $this->ffi_im->new('imFile*');
    }

    public function imImage() {
        return $this->imImage = $this->ffi_image->new('imImage*');
    }
    
    public function __call($name, $arguments = []) {
        $name = 'im' . ucfirst($name);
        $number = count($arguments);
        return $this->ffi_image->$name(...$arguments);
    }

    public function imFileImageLoadBitmap($file, $index, $error) {
        return $this->ffi_image->imFileImageLoadBitmap($file, $index, $error);
    }

    public function imImageRemoveAlpha($image) {
        return $this->ffi_image->imImageRemoveAlpha($image);
    }

    public function imImageCreateBased($image, $width, $height, $color_space, $data_type) {
        return $this->ffi_image->imImageCreateBased($image, $width, $height, $color_space, $data_type);
    }

    public function imImageDestroy($image) {
        return $this->ffi_image->imImageDestroy($image);
    }

    public function imcdCanvasPutImage($_canvas, $_image, $_w, $_h, $_x = 0, $_y = 0, $_xmin = 0, $_xmax = 0, $_ymin = 0, $_ymax = 0) {
        $this->ffi_image->imcdCanvasPutImage($_canvas, $_image, $_x, $_y, $_w, $_h, $_xmin, $_xmax, $_ymin, $_ymax);
    }

    public function fileopen($fileName, $error) {
        return $this->ffi_im->imFileOpen($fileName, $error);
    }

    public function fileopenAs($fileName, $format, $error) {
        return $this->ffi_im->imFileOpenAs($fileName, $format, $error);
    }

    public function new($fileName, $format, $error) {
        return $this->ffi_im->imFileNew($fileName, $format, $error);
    }

    public function imClose($file) {
        return $this->ffi_im->imFileClose($file);
    }

    public function handle($file, $index) {
        return $this->ffi_im->imFileHandle($file, $index);
    }

    public function getinfo($file, $format, $compression, $image_count) {
        return $this->ffi_im->imFileGetInfo($file, $format, $compression, $image_count);
    }

    public function setinfo($file, $compression) {
        return $this->ffi_im->imFileSetInfo($file, $compression);
    }

    public function imFileSetAttribute($file, $attrib, $data_type, $count, $data) {
        return $this->ffi_im->imFileSetAttribute($file, $attrib, $data_type, $count, $data);
    }

    public function imFileSetAttribInt($file, $attrb, $data_type, $value) {
        return $this->ffi_im->imFileSetAtrribInteger($file, $attrb, $data_type, $value);
    }

    public function imFileSetAttribReal($file, $attrib, $data_type, $value) {
        return $this->ffi_im->imFileSetAttribReal($file, $attrib, $data_type, $value);
    }

    public function imFileSetAttribString($file, $attrib, $value) {
        return $this->ffi_im->imFileSetAttribString($file, $attrib, $value);
    }

    public function imFileGetAttribute($ifile, $attrib, $data_type, $count) {
        return $this->ffi_im->imFileGetAttribute($ifile, $attrib, $data_type, $count);
    }

    public function imFileGetAttribInteger($ifile, $attrib, $index) {
        return $this->ffi_im->imFileGetAttribInteger($ifile, $attrib, $index);
    }

    public function imFileGetAttribReal($ifile, $attrib, $index) {
        return $this->ffi_im->imFileGetAttribReal($ifile, $attrib, $index);
    }

    public function imFileGetAttribString($ifile, $attrib) {
        return $this->ffi_im->imFileGetAttribString($ifile, $attrib);
    }

    public function imFileGetAttributeList($ifile, $attrib, $attrib_count) {
        return $this->ffi_im->imFileGetAttributeList($ifile, $attrib, $attrib_count);
    }

    public function GetPalette($ifile, $palette, $palette_count) {
        return $this->ffi_im->imFileGetPalette($ifile, $palette, $palette_count);
    }

    public function SetPalette($ifile, $palette, $palette_count) {
        return $this->ffi_im->imFileSetPalette($ifile, $palette, $palette_count);
    }

    public function ReadImageInfo($ifile, $index, $width, $height, $file_color_mode, $file_data_type) {
        return $this->ffi_im->imFileReadImageInfo($ifile, $index, $width, $height, $file_color_mode, $file_data_type);
    }

    public function WriteImageInfo($ifile, $width, $height, $user_color_mode, $user_data_type) {
        return $this->ffi_im->imFileWriteImageInfo($ifile, $width, $height, $user_color_mode, $user_data_type);
    }

    public function ReadImageData($ifile, $data, $convert2bitmap, $color_mode_flags) {
        return $this->ffi_im->imFileReadImageData($ifile, $data, $convert2bitmap, $color_mode_flags);
    }

    public function WriteImageData($ifile, $data) {
        return $this->ffi_im->imFileWriteImageData($ifile, $data);
    }

    public function FormatRegisterInternal() {
        return $this->ffi_im->imFormatRegisterInternal(void);
    }

    public function FormatRemoveAll() {
        return $this->ffi_im->imFormatRemoveAll(void);
    }

    public function FormatList($format_list, $format_count) {
        return $this->ffi_im->imFormatList($format_list, $format_count);
    }

    public function FormatInfo($format, $desc, $ext, $can_sequence) {
        return $this->ffi_im->imFormatInfo($format, $desc, $ext, $can_sequence);
    }

    public function FormatInfoExtra($format, $extra) {
        return $this->ffi_im->imFormatInfoExtra($format, $extra);
    }

    public function FormatCompressions($format, $comp, $comp_count, $color_mode, $data_type) {
        return $this->ffi_im->imFormatCompressions($format, $comp, $comp_count, $color_mode, $data_type);
    }

    public function FormatCanWriteImage($format, $compression, $color_mode, $data_type) {
        return $this->ffi_im->imFormatCanWriteImage($format, $compression, $color_mode, $data_type);
    }

}

class extra {

    public $ffi_extra;

    public function __construct() {
        $this->ffi_extra = \FFI::load(__DIR__ . '/controls.h');
        return $this;
    }

    function init() {
        return $this->ffi_extra->IupControlsOpen();
    }

    public function Cells() {
        return $this->ffi_extra->IupCells();
    }

    public function Matrix($action = null) {
        return $this->ffi_extra->IupMatrix($action);
    }

    public function MatrixList() {
        return $this->ffi_extra->IupMatrixList();
    }

    public function MatrixEx() {
        return $this->ffi_extra->MatrixEx();
    }

}
