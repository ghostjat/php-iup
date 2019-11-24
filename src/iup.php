<?php

namespace iup;

use FFI;

class core {
    /*     * ********************************************************************* */
    /*                   Common Flags and Return Values                     */
    /*     * ********************************************************************* */

    const IUP_ERROR = 1;
    const IUP_NOERROR = 0;
    const IUP_OPENED = -1;
    const IUP_INVALID = -1;
    const IUP_INVALID_ID = -10;


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
    public function iupButton($title, $action) {
        return $this->ffi->IupButton($title, $action);
    }

    public function iupCallback($ih, $name, $func) {
        return $this->ffi->IupSetCallback($ih, $name, $func);
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

    public function iupSplit($child_1, $child_2) {
        return $this->ffi->IupSplit($child_1, $child_2);
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

    public function iupBackgroundBox($child) {
        return $this->ffi->IupBackgroundBox($child);
    }

    public function iupFrame($child) {
        return $this->ffi->IupFrame($child);
    }

    public function iupFlatFrame($child) {
        return $this->ffi->IupFlatFrame($child);
    }

    /**
     * 
     * @param int $width
     * @param int $hight
     * @param type $pixmap
     * @return type
     */
    public function iupImage($width, $hight, $pixmap) {
        return $this->ffi->IupImage($width, $hight, $pixmap);
    }

    public function iupImageRGB($widht, $height, $pixmap) {
        return $this->ffi->IupImageRGB($widht, $height, $pixmap);
    }

    public function iupImageRGBA($width, $height, $pixmap) {
        return $this->ffi->IupImageRGBA($width, $height, $pixmap);
    }

    public function iupItem($title, $action) {
        return $this->ffi->IupItem($title, $action);
    }

    public function iupSubMenu($title, $child) {
        return $this->ffi->IupSubmenu($title, $child);
    }

    public function iupSeparator() {
        return $this->ffi->IupSeparator();
    }

    public function iupMenu($child) { //todo
        return $this->ffi->IupMenu($child);
    }

    public function iupMenuV($children) {
        return $this->ffi->IupMenuV($children);
    }

    public function iupFlatButton($title) {
        return $this->ffi->IupFlatButton($title);
    }

    public function iupFlatToggle($title) {
        return $this->ffi->IupFlatToggle($title);
    }

    public function iupDropButton($dropChild) {
        return $this->ffi->IupDropChild($dropChild);
    }

    public function iupFlatLabel($title) {
        return $this->ffi->IupFlatLabel($title);
    }

    public function iupFlatSeparator() {
        return $this->ffi->IupFlatSeparator();
    }

    public function iupCanvas($action) {
        return $this->ffi->IupCanvas($action);
    }

    public function iupUser() {
        return $this->ffi->IupUser();
    }

    public function iupList($action) {
        return $this->ffi->IupList($action);
    }

    public function iupFlatList() {
        return $this->ffi->IupFlatList();
    }

    public function iupText($action) {
        return $this->ffi->IupText($action);
    }

    public function iupToggle($title, $action) {
        return $this->ffi->IupToggle($title, $action);
    }

    public function iupMultiLine($action) {
        return $this->ffi->IupMultiLine($action);
    }

    public function iupTimer() {
        return $this->ffi->IupTimer();
    }

    public function iupClipBoard() {
        return $this->ffi->IupClipBoard();
    }

    public function iupProgressBar() {
        return $this->ffi->IupProgressBar();
    }

    public function iupVal($type) {
        return $this->ffi->IupVal($type);
    }

    public function iupTabs($child) {
        return $this->ffi->IupTabs($child);
    }

    public function iupTabsV($children) {
        return $this->ffi->IupTabsv($children);
    }

    public function iupFlatTabs($first) {
        return $this->ffi->IupFlatTabs($first);
    }

    public function iupFlatTabsV($children) {
        return $this->ffi->IupFlatTabsv($children);
    }

    public function iupTree() {
        return $this->ffi->IupTree();
    }

    public function iupLink($url, $title) {
        return $this->ffi->IupLink($url, $title);
    }

    public function iupAnimatedLabel($animation) {
        return $this->ffi->IupAnimatedLabel($animation);
    }

    public function iupDatePick() {
        return $this->ffi->IupDatePick();
    }

    public function iupCalendar() {
        return $this->ffi->IupCalendar();
    }

    public function iupColorBar() {
        return $this->ffi->IupColorbar();
    }

    public function iupGauge() {
        return $this->ffi->IupGauge();
    }

    public function iupDial($type) {
        return $this->ffi->IupDial($type);
    }

    public function iupSpin() {
        return $this->ffi->IupSpin();
    }

    public function iupSpinBox($child) {
        return $this->ffi->IupSpinbox($child);
    }

    public function iupStringCompare($string_1, $string_2, $casesensitive, $lexicographic) {
        return $this->ffi->IupStringCompare($string_1, $string_2, $casesensitive, $lexicographic);
    }

    public function iupSaveImageAsText($ih, $file_name, $format, $name) {
        return $this->ffi->IupSaveImageAsText($ih, $file_name, $format, $name);
    }

    public function iupTextConvertLinColToPos($ih, $ln, $col, $pos) {
        return $this->ffi->IupTextConvertLinColToPos($ih, $ln, $col, $pos);
    }

    public function iupTextConvertPosToLinCol($ih, $pos, $ln, $col) {
        return $this->ffi->IupTextConvertPosToLinCol($ih, $pos, $ln, $col);
    }

    public function iupConvertXYToPos($ih, $x, $y) {
        return $this->ffi->IupConvertXYToPos($ih, $x, $y);
    }

    public function iupTreeSetUserId($ih, $id, $userid) {
        return $this->ffi->IupTreeSetUserId($ih, $id, $userid);
    }

    public function iupTreeGetUserId($ih, $id) {
        return $this->ffi->IupTreeGetUserId($ih, $id);
    }

    public function iupTreeGetId($ih, $userid) {
        return $this->ffi->IupTreeGetId($ih, $userid);
    }

    public function iupTreeSetAttributeHandle($ih, $name, $id, $ih_named) {
        return $this->ffi->IupTreeSetAttributeHandle($ih, $name, $id, $ih_named);
    }

    public function iupIupGetFile($file) {
        return $this->ffi->IupIupGetFile($file);
    }

    public function iupMessagef($title, $format) {
        return $this->ffi->IupMessagef($title, $format);
    }

    public function iupMessageError($parent, $message) {
        return $this->ffi->IupMessageError($parent, $message);
    }

    public function iupMessageAlarm($parent, $title, $message, $buttons) {
        return $this->ffi->IupMessageAlarm($parent, $title, $message, $buttons);
    }

    public function iupAlarm($title, $msg, $b1, $b2, $b3) {
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
    public function iupListDialog($type, $title, $size, $list, $op, $max_col, $max_lin, $marks) {
        return $this->ffi->IupListDialog($type, $title, $size, $list, $op, $max_col, $max_lin, $marks);
    }

    /**
     * 
     * @param type $title
     * @param type $text
     * @param int $maxsize
     * @return type
     */
    public function iupGetText($title, $text, $maxsize) {
        return $this->ffi->IupGetText($title, $text, $maxsize);
    }

    public function iupGetColor($x, $y, $r, $g, $b) {
        return $this->ffi->IupGetColor($x, $y, $r, $g, $b);
    }

    public function iupGlobalsDialog() {
        return $this->ffi->IupGlobalsDialog();
    }

    public function iupLayoutDialog($dialog) {
        return $this->ffi->IupLayoutDialog($dialog);
    }

    public function iupParam($format) {
        return $this->ffi->IupParam($format);
    }

    public function iupParamBox($param) {
        return $this->ffi->IupParamBox($param);
    }

    public function iupParamBoxV($param_array) {
        return $this->ffi->IupParamBoxv($param_array);
    }

    public function iupElementPropertiesDialog($elem) {
        return $this->ffi->IupElementPropertiesDialog($elem);
    }

    public function iupScanf($format) {
        return $this->ffi->IupScanf($format);
    }

    public function iupFileDlg() {
        return $this->ffi->IupFileDlg();
    }

    public function iupColorDlg() {
        return $this->ffi->IupColorDlg();
    }

    public function iupFontDlg() {
        return $this->ffi->IupFontDlg();
    }

    public function iupProgressDlg() {
        return $this->ffi->IupProgressDlg();
    }

    public function iupLoopStep() {
        return $this->ffi->IupLoopStep();
    }

    public function iupLoopStepWait() {
        return $this->ffi->IupLoopStepWait();
    }

    public function iupMainLoopLevel() {
        return $this->ffi->IupMainLoopLevel();
    }

    public function iupFlush() {
        return $this->ffi->IupFlush();
    }

    public function iupExitLoop() {
        return $this->ffi->IupExitLoop();
    }

    public function iupRecordInput($file, $mode) {
        return $this->ffi->IupRecordInput($file, $mode);
    }

    public function iupPlayInput($filename) {
        return $this->ffi->IupPlayInput($filename);
    }

    public function iupUpdate($ih) {
        return $this->ffi->IupUpdate($ih);
    }

    public function iupUpdateChildren($ih) {
        return $this->ffi->IupUpdateChildren($ih);
    }

    public function iupRedraw($ih, $children) {
        return $this->ffi->IupRedraw($ih, $children);
    }

    public function iupRefresh($ih) {
        return $this->ffi->IupRefresh($ih);
    }

    public function iupRefreshChildren($ih) {
        return $this->ffi->IupRefreshChildren($ih);
    }

    public function iupLoad($filname) {
        return $this->ffi->IupLoad($filname);
    }

    public function iupLoadBuffer($buffer) {
        return $this->ffi->IupLoadBuffer($buffer);
    }

    public function iupDestroy($ih) {
        return $this->ffi->IupDestroy($ih);
    }

    public function iupDetach($child) {
        return $this->ffi->IupDetach($child);
    }

    public function iupAppend($ih, $child) {
        return $this->ffi->IupAppend($ih, $child);
    }

    public function iupInsert($ih, $ref_child, $child) {
        return $this->ffi->IupInsert($ih, $ref_child, $child);
    }

    public function iupGetChild($ih, $child) {
        return $this->ffi->IupGetChild($ih, $child);
    }

    public function iupGetChildPos($ih, $child) {
        return $this->ffi->IupGetChildPos($ih, $child);
    }

    public function iupGetChildCount($ih) {
        return $this->ffi->IupGetChildCount($ih);
    }

    public function iupGetNextChild($ih, $child) {
        return $this->ffi->IupGetNextChild($ih, $child);
    }

    public function iupGetBrother($ih) {
        return $this->ffi->IupGetBrother($ih);
    }

    public function iupGetParent($ih) {
        return $this->ffi->IupGetParent($ih);
    }

    public function iupGetDialog($ih) {
        return $this->ffi->IupGetDialog($ih);
    }

    public function iupGetDialogChild($ih, $name) {
        return $this->ffi->IupGetDialogChild($ih, $name);
    }

    public function iupReparent($ih, $new_parent, $ref_child) {
        return $this->ffi->IupReparent($ih, $new_parent, $ref_child);
    }

    public function iupPopup($ih, $x, $y) {
        return $this->ffi->IupPopup($ih, $x, $y);
    }

    public function iupShow($ih) {
        return $this->ffi->IupShow($ih);
    }

    public function iupHide($ih) {
        return $this->ffi->IupHide($ih);
    }

    public function iupMap($ih) {
        return $this->ffi->IupMap($ih);
    }

    public function iupUnMap($ih) {
        return $this->ffi->IupUnmap($ih);
    }

}
