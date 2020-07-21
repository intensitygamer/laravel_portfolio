import { MultiDropzone } from './multi_uploads';

/**
 * This is customise js created through modules structure
 * with ES6 kind of code and will compile in webpack.
 * importing files coming from index.js in modules folder
 */

window.createMultiUpload = (ttype, opts) => {

    switch (ttype){
        case 'dropzone':
            new MultiDropzone().UploadImage(opts);
            break;

        default:
            console.error('Upload Error: No type found')
            break;
    }
}