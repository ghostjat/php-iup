#define FFI_SCOPE "iupim"
#define FFI_LIB "/usr/lib/libiupim.so"

typedef struct Ihandle_ Ihandle;
typedef int (*Icallback)(Ihandle*);

extern Ihandle* IupLoadImage(const char* file_name);
int IupSaveImage(Ihandle* ih, const char* file_name, const char* format);

extern Ihandle* IupLoadAnimation(const char* file_name);
extern Ihandle* IupLoadAnimationFrames(const char** file_name_list, int file_count);
