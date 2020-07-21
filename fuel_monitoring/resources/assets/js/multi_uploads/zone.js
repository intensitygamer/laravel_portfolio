import Dropzone from 'dropzone';

class MultiDropzone{

    constructor(){

    }

    UploadImage(opts){
        opts = (typeof opts !== "object") ? {} : opts;

        opts.idTag = opts.idTag || console.error('idTag required');
        opts.postURL = opts.postURL || console.error('postURL required');
        opts.removeURL = opts.removeURL || console.error('removeURL required');

        Dropzone.autoDiscover = false;

        var hotDrop = new Dropzone(opts.idTag, {
            url: opts.postURL,
            params: { _token: document.querySelector('meta[name="site-csrf-token"]').getAttribute('content') },
            options: {
                paramName: "file", // The name that will be used to transfer the file
                addRemoveLinks: true,
            }
        });

        /**
         * show error
         */
        hotDrop.on("error", function(file, response) {
            //console.error(file, response);
            var _this = this;

            Object.keys(response).forEach(function(key) {
                CreateNoty({type:'error', text: response[key] })
            });

            _this.removeFile(file);
        });

        /**
         * added file management
         */
        hotDrop.on("addedfile", function(file, response) {

            var removeButton = Dropzone.createElement('<button class="btn btn-remove">REMOVE</button>');
            var _this = this;
            var name = file.name;;

            removeButton.addEventListener("click", function(e) {

                e.preventDefault();
                e.stopPropagation();

                var getFiles = $('.file-list input[data-file="'+name+'"]');

                /**
                 * remove from storage
                 */
                $.ajax({
                    type: 'GET',
                    url: opts.removeURL + getFiles.val(),
                    dataType: 'html',
                    success: function(data) {
                        getFiles.remove();
                        _this.removeFile(file);
                    },
                });

            });

            file.previewElement.appendChild(removeButton);

        });

        /**
         * Added file successfully
         */
        hotDrop.on("success", function(file, responseText) {

            if(responseText.status){
                $('.file-list').append('' +
                    '<input data-file="'+responseText.files.file_name+'" type="hidden" name="fileurl[]" value="'+responseText.files.file_url+'" />' +
                    '<input data-file="'+responseText.files.file_name+'" type="hidden" name="filename[]" value="'+responseText.files.file_name+'" />' +
                    '<input data-file="'+responseText.files.file_name+'" type="hidden" name="mimetype[]" value="'+responseText.files.mimetype+'" />' +
                    '');


                CreateNoty({type:'success', text: responseText.message })
            }
        });



    }

}

export { MultiDropzone }