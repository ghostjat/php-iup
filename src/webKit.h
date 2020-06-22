#define FFI_SCOPE "web"
#define FFI_LIB "/usr/lib/libiupweb.so"

typedef struct Ihandle_ Ihandle;
typedef int (*Icallback)(Ihandle*);

int IupWebBrowserOpen(void);
extern Ihandle *IupWebBrowser(void);
