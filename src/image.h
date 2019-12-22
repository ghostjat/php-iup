#define FFI_SCOPE "image"
#define FFI_LIB "dll_libs/iup/im.dll"
typedef struct _imFile imFile;
typedef struct _imImage  imImage; 

imImage* imImageCreate(int width, int height, int color_space, int data_type);

imImage* imImageInit(int width, int height, int color_mode, int data_type, void* data_buffer, long* palette, int palette_count);

imImage* imImageCreateBased(const imImage* image, int width, int height, int color_space, int data_type);

void imImageDestroy(imImage* image);

void imImageAddAlpha(imImage* image);

void imImageSetAlpha(imImage* image, double alpha);

void imImageRemoveAlpha(imImage* image);

void imImageReshape(imImage* image, int width, int height);

void imImageCopy(const imImage* src_image, imImage* dst_image);

void imImageCopyData(const imImage* src_image, imImage* dst_image);

void imImageCopyAttributes(const imImage* src_image, imImage* dst_image);

void imImageMergeAttributes(const imImage* src_image, imImage* dst_image);

void imImageCopyPlane(const imImage* src_image, int src_plane, imImage* dst_image, int dst_plane);

imImage* imImageDuplicate(const imImage* image);

imImage* imImageClone(const imImage* image);

void imImageSetAttribute(const imImage* image, const char* attrib, int data_type, int count, const void* data);

void imImageSetAttribInteger(const imImage* image, const char* attrib, int data_type, int value);

void imImageSetAttribReal(const imImage* image, const char* attrib, int data_type, double value);

void imImageSetAttribString(const imImage* image, const char* attrib, const char* value);

const void* imImageGetAttribute(const imImage* image, const char* attrib, int *data_type, int *count);

int imImageGetAttribInteger(const imImage* image, const char* attrib, int index);

double imImageGetAttribReal(const imImage* image, const char* attrib, int index);

const char* imImageGetAttribString(const imImage* image, const char* attrib);

void imImageGetAttributeList(const imImage* image, char** attrib, int *attrib_count);

void imImageClear(imImage* image);

int imImageIsBitmap(const imImage* image);

void imImageSetPalette(imImage* image, long* palette, int palette_count);

int imImageMatchSize(const imImage* image1, const imImage* image2);

int imImageMatchColor(const imImage* image1, const imImage* image2);

int imImageMatchDataType(const imImage* image1, const imImage* image2);

int imImageMatchColorSpace(const imImage* image1, const imImage* image2);

int imImageMatch(const imImage* image1, const imImage* image2);

void imImageSetMap(imImage* image);

void imImageSetBinary(imImage* image);

void imImageSetGray(imImage* image);

void imImageMakeBinary(imImage *image);

void imImageMakeGray(imImage *image);

imImage* imFileLoadImage(imFile* ifile, int index, int *error);

void imFileLoadImageFrame(imFile* ifile, int index, imImage* image, int *error);

imImage* imFileLoadBitmap(imFile* ifile, int index, int *error);

imImage* imFileLoadImageRegion(imFile* ifile, int index, int bitmap, int *error,
        int xmin, int xmax, int ymin, int ymax, int width, int height);


void imFileLoadBitmapFrame(imFile* ifile, int index, imImage* image, int *error);

int imFileSaveImage(imFile* ifile, const imImage* image);

imImage* imFileImageLoad(const char* file_name, int index, int *error);


imImage* imFileImageLoadBitmap(const char* file_name, int index, int *error);


imImage* imFileImageLoadRegion(const char* file_name, int index, int bitmap, int *error,
        int xmin, int xmax, int ymin, int ymax, int width, int height);


int imFileImageSave(const char* file_name, const char* format, const imImage* image);
typedef struct _cdContext cdContext;

//extern cdContext* imcdCanvasPutImage(char* canvas, char* image, int x, int y, int w, int h, int xmin, int xmax, int ymin, int ymax);
                                                                              
enum imGammaFactor
{
  IM_GAMMA_LINEAR   = 0,
  IM_GAMMA_LOGLITE  = -10,
  IM_GAMMA_LOGHEAVY = -1000,
  IM_GAMMA_EXPLITE  = 2,
  IM_GAMMA_EXPHEAVY = 7
};
int imConvertDataType(const imImage* src_image, imImage* dst_image, int cpx2real, double gamma, int absolute, int cast_mode);
int imConvertColorSpace(const imImage* src_image, imImage* dst_image);
int imConvertToBitmap(const imImage* src_image, imImage* dst_image, int cpx2real, double gamma, int absolute, int cast_mode);
void* imImageGetOpenGLData(const imImage* image, int *glformat);
imImage* imImageCreateFromOpenGLData(int width, int height, int glformat, const void* gldata);
void imConvertPacking(const void* src_data, void* dst_data, int width, int height, int src_depth, int dst_depth, int data_type, int src_is_packed);
void imConvertMapToRGB(unsigned char* data, int count, int depth, int packed, long* palette, int palette_count);
