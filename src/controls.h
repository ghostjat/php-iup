#define FFI_SCOPE "iupControls"
#define FFI_LIB "/usr/lib/libiupcontrols.so"

typedef struct Ihandle_ Ihandle;
//typedef int (*Icallback)(Ihandle*);

int  IupControlsOpen(void);

Ihandle* IupCells(void);
Ihandle* IupMatrix(const char *action);
Ihandle* IupMatrixList(void);
Ihandle* IupMatrixEx(void);
