#define FFI_SCOPE "iup"
#define FFI_LIB "/usr/lib/libiup.so"

enum {
    IUP_RECBINARY, IUP_RECTEXT
};

typedef struct Ihandle_ Ihandle;
typedef int (*Icallback)(Ihandle*);
typedef int (*Iparamcb) (Ihandle* dialog, int param_index,void* user_data);

extern int IupOpen(int *argc, char ***argv);
//void IupImageLibOpen(void);
extern void IupClose(void);

extern int IupMainLoop(void);
extern int IupLoopStep(void);
extern int IupLoopStepWait(void);
extern int IupMainLoopLevel(void);
extern void IupFlush(void);
extern void IupExitLoop(void);

extern int IupRecordInput(const char* filename, int mode);
extern int IupPlayInput(const char* filename);

extern void IupUpdate(Ihandle* ih);
extern void IupUpdateChildren(Ihandle* ih);
extern void IupRedraw(Ihandle* ih, int children);
extern void IupRefresh(Ihandle* ih);
extern void IupRefreshChildren(Ihandle* ih);

extern int IupExecute(const char *filename, const char* parameters);
extern int IupExecuteWait(const char *filename, const char* parameters);
extern int IupHelp(const char* url);
extern void IupLog(const char* type, const char* format, ...);

extern char* IupLoad(const char *filename);
extern char* IupLoadBuffer(const char *buffer);

extern char* IupVersion(void);
extern char* IupVersionDate(void);
extern int IupVersionNumber(void);

extern void IupSetLanguage(const char *lng);
extern char* IupGetLanguage(void);
extern void IupSetLanguageString(const char* name, const char* str);
extern void IupStoreLanguageString(const char* name, const char* str);
extern char* IupGetLanguageString(const char* name);
extern void IupSetLanguagePack(Ihandle* ih);

extern void IupDestroy(Ihandle* ih);
extern void IupDetach(Ihandle* child);
extern Ihandle* IupAppend(Ihandle* ih, Ihandle* child);
extern Ihandle* IupInsert(Ihandle* ih, Ihandle* ref_child, Ihandle* child);
extern Ihandle* IupGetChild(Ihandle* ih, int pos);
extern int IupGetChildPos(Ihandle* ih, Ihandle* child);
extern int IupGetChildCount(Ihandle* ih);
extern Ihandle* IupGetNextChild(Ihandle* ih, Ihandle* child);
extern Ihandle* IupGetBrother(Ihandle* ih);
extern Ihandle* IupGetParent(Ihandle* ih);
extern Ihandle* IupGetDialog(Ihandle* ih);
extern Ihandle* IupGetDialogChild(Ihandle* ih, const char* name);
extern int IupReparent(Ihandle* ih, Ihandle* new_parent, Ihandle* ref_child);

extern int IupPopup(Ihandle* ih, int x, int y);
extern int IupShow(Ihandle* ih);
extern int IupShowXY(Ihandle* ih, int x, int y);
extern int IupHide(Ihandle* ih);
extern int IupMap(Ihandle* ih);
extern void IupUnmap(Ihandle* ih);

extern void IupResetAttribute(Ihandle* ih, const char* name);
extern int IupGetAllAttributes(Ihandle* ih, char** names, int n);
extern void IupCopyAttributes(Ihandle* src_ih, Ihandle* dst_ih);
extern Ihandle* IupSetAtt(const char* handle_name, Ihandle* ih, const char* name, ...);
extern Ihandle* IupSetAttributes(Ihandle* ih, const char *str);
extern char* IupGetAttributes(Ihandle* ih);

extern void IupSetAttribute(Ihandle* ih, const char* name, const char* value);
extern void IupSetStrAttribute(Ihandle* ih, const char* name, const char* value);
extern void IupSetStrf(Ihandle* ih, const char* name, const char* format, ...);
extern void IupSetInt(Ihandle* ih, const char* name, int value);
extern void IupSetFloat(Ihandle* ih, const char* name, float value);
extern void IupSetDouble(Ihandle* ih, const char* name, double value);
extern void IupSetRGB(Ihandle* ih, const char* name, unsigned char r, unsigned char g, unsigned char b);

extern char* IupGetAttribute(Ihandle* ih, const char* name);
extern int IupGetInt(Ihandle* ih, const char* name);
extern int IupGetInt2(Ihandle* ih, const char* name);
extern int IupGetIntInt(Ihandle* ih, const char* name, int *i1, int *i2);
extern float IupGetFloat(Ihandle* ih, const char* name);
extern double IupGetDouble(Ihandle* ih, const char* name);
extern void IupGetRGB(Ihandle* ih, const char* name, unsigned char *r, unsigned char *g, unsigned char *b);

extern void IupSetAttributeId(Ihandle* ih, const char* name, int id, const char *value);
extern void IupSetStrAttributeId(Ihandle* ih, const char* name, int id, const char *value);
extern void IupSetStrfId(Ihandle* ih, const char* name, int id, const char* format, ...);
extern void IupSetIntId(Ihandle* ih, const char* name, int id, int value);
extern void IupSetFloatId(Ihandle* ih, const char* name, int id, float value);
extern void IupSetDoubleId(Ihandle* ih, const char* name, int id, double value);
extern void IupSetRGBId(Ihandle* ih, const char* name, int id, unsigned char r, unsigned char g, unsigned char b);

extern char* IupGetAttributeId(Ihandle* ih, const char* name, int id);
extern int IupGetIntId(Ihandle* ih, const char* name, int id);
extern float IupGetFloatId(Ihandle* ih, const char* name, int id);
extern double IupGetDoubleId(Ihandle* ih, const char* name, int id);
extern void IupGetRGBId(Ihandle* ih, const char* name, int id, unsigned char *r, unsigned char *g, unsigned char *b);

extern void IupSetAttributeId2(Ihandle* ih, const char* name, int lin, int col, const char* value);
extern void IupSetStrAttributeId2(Ihandle* ih, const char* name, int lin, int col, const char* value);
extern void IupSetStrfId2(Ihandle* ih, const char* name, int lin, int col, const char* format, ...);
extern void IupSetIntId2(Ihandle* ih, const char* name, int lin, int col, int value);
extern void IupSetFloatId2(Ihandle* ih, const char* name, int lin, int col, float value);
extern void IupSetDoubleId2(Ihandle* ih, const char* name, int lin, int col, double value);
extern void IupSetRGBId2(Ihandle* ih, const char* name, int lin, int col, unsigned char r, unsigned char g, unsigned char b);

extern char* IupGetAttributeId2(Ihandle* ih, const char* name, int lin, int col);
extern int IupGetIntId2(Ihandle* ih, const char* name, int lin, int col);
extern float IupGetFloatId2(Ihandle* ih, const char* name, int lin, int col);
extern double IupGetDoubleId2(Ihandle* ih, const char* name, int lin, int col);
extern void IupGetRGBId2(Ihandle* ih, const char* name, int lin, int col, unsigned char *r, unsigned char *g, unsigned char *b);

extern void IupSetGlobal(const char* name, const char* value);
extern void IupSetStrGlobal(const char* name, const char* value);
extern char* IupGetGlobal(Ihandle* ih,const char* name);

extern Ihandle* IupSetFocus(Ihandle* ih);
extern Ihandle* IupGetFocus(void);
extern Ihandle* IupPreviousField(Ihandle* ih);
extern Ihandle* IupNextField(Ihandle* ih);

extern Icallback IupGetCallback(Ihandle* ih, const char *name);
extern Icallback IupSetCallback(Ihandle* ih, const char *name, Icallback func);
extern Ihandle* IupSetCallbacks(Ihandle* ih, const char *name, Icallback func, ...);

extern Icallback IupGetFunction(const char *name);
extern Icallback IupSetFunction(const char *name, Icallback func);

extern Ihandle* IupGetHandle(const char *name);
extern Ihandle* IupSetHandle(const char *name, Ihandle* ih);
extern int IupGetAllNames(char** names, int n);
extern int IupGetAllDialogs(char** names, int n);
extern char* IupGetName(Ihandle* ih);

extern void IupSetAttributeHandle(Ihandle* ih, const char* name, Ihandle* ih_named);
extern Ihandle* IupGetAttributeHandle(Ihandle* ih, const char* name);
extern void IupSetAttributeHandleId(Ihandle* ih, const char* name, int id, Ihandle* ih_named);
extern Ihandle* IupGetAttributeHandleId(Ihandle* ih, const char* name, int id);
extern void IupSetAttributeHandleId2(Ihandle* ih, const char* name, int lin, int col, Ihandle* ih_named);
extern Ihandle* IupGetAttributeHandleId2(Ihandle* ih, const char* name, int lin, int col);

extern char* IupGetClassName(Ihandle* ih);
extern char* IupGetClassType(Ihandle* ih);
extern int IupGetAllClasses(char** names, int n);
extern int IupGetClassAttributes(const char* classname, char** names, int n);
extern int IupGetClassCallbacks(const char* classname, char** names, int n);
extern void IupSaveClassAttributes(Ihandle* ih);
extern void IupCopyClassAttributes(Ihandle* src_ih, Ihandle* dst_ih);
extern void IupSetClassDefaultAttribute(const char* classname, const char *name, const char* value);
extern int IupClassMatch(Ihandle* ih, const char* classname);

extern Ihandle* IupCreate(const char *classname);
extern Ihandle* IupCreatev(const char *classname, void* *params);
extern Ihandle* IupCreatep(const char *classname, void* first, ...);

/************************************************************************/
/*                        Elements                                      */
/************************************************************************/

extern Ihandle* IupFill(void);
extern Ihandle* IupSpace(void);

extern Ihandle* IupRadio(Ihandle* child);
extern Ihandle* IupVbox(Ihandle* child, ...);
extern Ihandle* IupVboxv(Ihandle* *children);
extern Ihandle* IupZbox(Ihandle* child, ...);
extern Ihandle* IupZboxv(Ihandle* *children);
extern Ihandle* IupHbox(Ihandle* child, ...);
extern Ihandle* IupHboxv(Ihandle* *children);

extern Ihandle* IupNormalizer(Ihandle* ih_first, ...);
extern Ihandle* IupNormalizerv(Ihandle* *ih_list);

extern Ihandle* IupCbox(Ihandle* child, ...);
extern Ihandle* IupCboxv(Ihandle* *children);
extern Ihandle* IupSbox(Ihandle* child);
extern Ihandle* IupSplit(Ihandle* child1, Ihandle* child2);
extern Ihandle* IupScrollBox(Ihandle* child);
extern Ihandle* IupFlatScrollBox(Ihandle* child);
extern Ihandle* IupGridBox(Ihandle* child, ...);
extern Ihandle* IupGridBoxv(Ihandle* *children);
extern Ihandle* IupMultiBox(Ihandle* child, ...);
extern Ihandle* IupMultiBoxv(Ihandle **children);
extern Ihandle* IupExpander(Ihandle* child);
extern Ihandle* IupDetachBox(Ihandle* child);
extern Ihandle* IupBackgroundBox(Ihandle* child);

extern Ihandle* IupFrame(Ihandle* child);
extern Ihandle* IupFlatFrame(Ihandle* child);

extern Ihandle* IupImage(int width, int height, const unsigned char *pixmap);
extern Ihandle* IupImageRGB(int width, int height, const unsigned char *pixmap);
extern Ihandle* IupImageRGBA(int width, int height, const unsigned char *pixmap);

extern Ihandle* IupItem(const char* title, const char* action);
extern Ihandle* IupSubmenu(const char* title, Ihandle* child);
extern Ihandle* IupSeparator(void);
extern Ihandle* IupMenu(Ihandle* child, ...);
extern Ihandle* IupMenuv(Ihandle* *children);

extern Ihandle* IupButton(const char* title, const char* action);
extern Ihandle* IupFlatButton(const char* title);
extern Ihandle* IupFlatToggle(const char* title);
extern Ihandle* IupDropButton(Ihandle* dropchild);
extern Ihandle* IupFlatLabel(const char* title);
extern Ihandle* IupFlatSeparator(void);
extern Ihandle* IupCanvas(const char* action);
extern Ihandle* IupDialog(Ihandle* child);
extern Ihandle* IupUser(void);
extern Ihandle* IupLabel(const char* title);
extern Ihandle* IupList(const char* action);
extern Ihandle* IupFlatList(void);
extern Ihandle* IupText(const char* action);
extern Ihandle* IupMultiLine(const char* action);
extern Ihandle* IupToggle(const char* title, const char* action);
extern Ihandle* IupTimer(void);
extern Ihandle* IupClipboard(void);
extern Ihandle* IupProgressBar(void);
extern Ihandle* IupVal(const char *type);
extern Ihandle* IupTabs(Ihandle* child, ...);
extern Ihandle* IupTabsv(Ihandle* *children);
extern Ihandle* IupFlatTabs(Ihandle* first, ...);
extern Ihandle* IupFlatTabsv(Ihandle* *children);
extern Ihandle* IupTree(void);
extern Ihandle* IupLink(const char* url, const char* title);
extern Ihandle* IupAnimatedLabel(Ihandle* animation);
extern Ihandle* IupDatePick(void);
extern Ihandle* IupCalendar(void);
extern Ihandle* IupColorbar(void);
extern Ihandle* IupGauge(void);
extern Ihandle* IupDial(const char* type);
extern Ihandle* IupColorBrowser(void);

/* Old controls, use SPIN attribute of IupText */
extern Ihandle* IupSpin(void);
extern Ihandle* IupSpinbox(Ihandle* child);

/************************************************************************/
/*                      Utilities                                       */
/************************************************************************/

/* String compare utility */
extern int IupStringCompare(const char* str1, const char* str2, int casesensitive, int lexicographic);

/* IupImage utility */
extern int IupSaveImageAsText(Ihandle* ih, const char* file_name, const char* format, const char* name);

/* IupText and IupScintilla utilities */
extern void IupTextConvertLinColToPos(Ihandle* ih, int lin, int col, int *pos);
extern void IupTextConvertPosToLinCol(Ihandle* ih, int pos, int *lin, int *col);

/* IupText, IupList, IupTree, IupMatrix and IupScintilla utility */
extern int IupConvertXYToPos(Ihandle* ih, int x, int y);

/* OLD names, kept for backward compatibility, will never be removed. */
extern void IupStoreGlobal(const char* name, const char* value);
extern void IupStoreAttribute(Ihandle* ih, const char* name, const char* value);
extern void IupSetfAttribute(Ihandle* ih, const char* name, const char* format, ...);
extern void IupStoreAttributeId(Ihandle* ih, const char* name, int id, const char *value);
extern void IupSetfAttributeId(Ihandle* ih, const char* name, int id, const char* f, ...);
extern void IupStoreAttributeId2(Ihandle* ih, const char* name, int lin, int col, const char* value);
extern void IupSetfAttributeId2(Ihandle* ih, const char* name, int lin, int col, const char* format, ...);

/* IupTree utilities */
extern int IupTreeSetUserId(Ihandle* ih, int id, void* userid);
extern void* IupTreeGetUserId(Ihandle* ih, int id);
extern int IupTreeGetId(Ihandle* ih, void *userid);
extern void IupTreeSetAttributeHandle(Ihandle* ih, const char* name, int id, Ihandle* ih_named); /* deprecated, use IupSetAttributeHandleId */

/************************************************************************/
/*                      Pre-defined dialogs                           */
/************************************************************************/

extern Ihandle* IupFileDlg(void);
extern Ihandle* IupMessageDlg(void);
extern Ihandle* IupColorDlg(void);
extern Ihandle* IupFontDlg(void);
extern Ihandle* IupProgressDlg(void);

extern int IupGetFile(char *arq);
extern void IupMessage(const char *title, const char *msg);
extern void IupMessagef(const char *title, const char *format, ...);
extern void IupMessageError(Ihandle* parent, const char* message);
extern int IupMessageAlarm(Ihandle* parent, const char* title, const char *message, const char *buttons);
extern int IupAlarm(const char *title, const char *msg, const char *b1, const char *b2, const char *b3);
extern int IupScanf(const char *format, ...);
extern int IupListDialog(int type, const char *title, int size, const char** list,
        int op, int max_col, int max_lin, int* marks);
extern int IupGetText(const char* title, char* text, int maxsize);
extern int IupGetColor(int x, int y, unsigned char* r, unsigned char* g, unsigned char* b);

extern int IupGetParam(const char* title, Iparamcb action, void* user_data, const char* format, ...);
extern int IupGetParamv(const char* title, Iparamcb action, void* user_data, const char* format, int param_count, int param_extra, void** param_data);
extern Ihandle* IupParam(const char* format);
extern Ihandle* IupParamBox(Ihandle* param, ...);
extern Ihandle* IupParamBoxv(Ihandle* *param_array);

extern Ihandle* IupLayoutDialog(Ihandle* dialog);
extern Ihandle* IupElementPropertiesDialog(Ihandle* elem);
extern Ihandle* IupGlobalsDialog(void);

