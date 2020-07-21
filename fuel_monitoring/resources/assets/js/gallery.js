import { BootstrapGallery} from './static_library/bootstrap_gallery';

/**
 * This is customise js created through modules structure
 * with ES6 kind of code and will compile in webpack.
 * importing files coming from index.js in modules folder
 */

window.CreateGallery = (ttype, opts) => {

    switch (ttype){

        case 'bootstrap-gallery':
            new BootstrapGallery().defaultGallery(opts);
            break;

        default:
            console.error('Chart Error: No type found')
            break;
    }
}