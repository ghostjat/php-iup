#define FFI_SCOPE "iupim"
#define FFI_LIB "dll_libs/iup/im.dll"


typedef struct _imFile  imFile;

extern imFile* imFileOpen(const char* file_name, int *error);
extern imFile* imFileOpenAs(const char* file_name, const char* format, int *error);
extern imFile* imFileNew(const char* file_name, const char* format, int *error);
extern void imFileClose(imFile* ifile);
extern void* imFileHandle(imFile* ifile, int index); 
extern void imFileGetInfo(imFile* ifile, char* format, char* compression, int *image_count);
extern void imFileSetInfo(imFile* ifile, const char* compression);
extern void imFileSetAttribute(imFile* ifile, const char* attrib, int data_type, int count, const void* data);
extern void imFileSetAttribInteger(const imFile* ifile, const char* attrib, int data_type, int value);
extern void imFileSetAttribReal(const imFile* ifile, const char* attrib, int data_type, double value);
extern void imFileSetAttribString(const imFile* ifile, const char* attrib, const char* value);
extern const void* imFileGetAttribute(imFile* ifile, const char* attrib, int *data_type, int *count);
extern int imFileGetAttribInteger(const imFile* ifile, const char* attrib, int index);
extern double imFileGetAttribReal(const imFile* ifile, const char* attrib, int index);
extern const char* imFileGetAttribString(const imFile* ifile, const char* attrib);
extern void imFileGetAttributeList(imFile* ifile, char** attrib, int *attrib_count);
extern void imFileGetPalette(imFile* ifile, long* palette, int *palette_count);
extern void imFileSetPalette(imFile* ifile, long* palette, int palette_count);
extern int imFileReadImageInfo(imFile* ifile, int index, int *width, int *height, int *file_color_mode, int *file_data_type);
extern int imFileWriteImageInfo(imFile* ifile, int width, int height, int user_color_mode, int user_data_type);
extern int imFileReadImageData(imFile* ifile, void* data, int convert2bitmap, int color_mode_flags);
extern int imFileWriteImageData(imFile* ifile, void* data);
extern void imFormatRegisterInternal(void);
extern void imFormatRemoveAll(void);
extern void imFormatList(char** format_list, int *format_count);
extern int imFormatInfo(const char* format, char* desc, char* ext, int *can_sequence);
extern int imFormatInfoExtra(const char* format, char* extra);
extern int imFormatCompressions(const char* format, char** comp, int *comp_count, int color_mode, int data_type);
extern int imFormatCanWriteImage(const char* format, const char* compression, int color_mode, int data_type);

