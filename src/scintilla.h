#define FFI_SCOPE "scintilla"
#define FFI_LIB "/usr/lib/libiup_scintilla.so"


typedef struct Ihandle_ Ihandle;
typedef intptr_t sptr_t;
typedef uintptr_t uptr_t;

typedef int (*Icallback)(Ihandle*);
typedef int (*Iparamcb) (Ihandle* dialog, int param_index,void* user_data);

extern void IupScintillaOpen(void);
extern Ihandle* IupScintilla(void);
extern Ihandle* IupScintillaDlg(void);

extern sptr_t IupScintillaSendMessage(Ihandle* ih, unsigned int iMessage, uptr_t wParam, sptr_t lParam);
