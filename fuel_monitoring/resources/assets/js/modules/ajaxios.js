class Ajaxios
{
    construtor(properties){
        /**
         * Axios or Jquery
         */
        this.properties = properties;
    }

    useAxios(opts){
        opts = (typeof opts !== "object") ? {} : opts;
        opts.type = opts.type || console.error('post/get type property required');
        opts.url = opts.url || console.error('url property required');
        opts.data = opts.data || {};
        opts.helpClass = opts.helpClass || 'help-block';
        opts.hasCaptcha = opts.hasCaptcha || false;
        opts.element = opts.element || console.error('element required');
        var count = 5;

        if(opts.type === 'post'){
            $('button[type=submit]').prop('disabled', true);

            axios.post(opts.url, opts.data)

            .then(function (response) {
                $('button[type=submit]').prop('disabled', false);
                /**
                 * @response: on successful
                 */
                if(response.data.hasOwnProperty('redirect_url'))
                    window.location.href = response.data.redirect_url;

                if(response.data.status)
                    CreateNoty({ type:response.data.status, text: response.data.message });

                if(response.data.printOrExport){
                    console.log(response.data);

                    $('.form-pe-date').remove();

                    //set the date information to print and export
                    $('body .form-pe-date-statement').css('display', 'block');

                    //set values to tags
                    $('.span-date-from').html(response.data.dates.mdf);
                    $('.span-date-to').html(response.data.dates.mdt);

                    $('.export-button-modal').attr('href',response.data.export_url);
                    $('.print-button-modal').attr('href',response.data.print_url);

                    //if it is subcon
                    if(response.data.subcon)
                        $('.subcon-name').html(response.data.subcon)

                    // //if it is fuel
                    // if(response.data.project)
                    //     $('.project-name').html(response.data.project)
                }

                if(response.data.empty_field){
                    const formElement = $('.modal form');

                    // remove element under form
                    $(formElement).find('div').remove()

                    // add new element under form
                    $(formElement).append(`
                        <div class="success-modal-page">
                            <i class="fa fa-check-circle-o"></i>
                            <div class="text-success">
                                Successfully Submitted!
                            </div>
                        </div>
                        <div class="text-center margin-top-50 margin-bottom-20">
                            <button class="btn btn-success" onclick="location.reload()" type="button">Close Box</button>
                        </div>
                    `);

                    // comment old response
                    // opts.element[0].reset();
                    // $('.'+opts.helpClass).remove();
                }

                if(response.data.refresh){
                    $('button[type=submit]').prop('disabled', true);
                    location.reload();
                    // var int = setInterval(function() {
                    //     // $(".tmx").html('<i class="fa fa-clock-o"></i> Refresh in <strong>'+ count + '</strong>');
                    //     // count-- || clearInterval(int) ? console.info(count) : location.reload();
                    // }, 10);

                }
            })
            .catch(function (error) {
                $('button[type=submit]').prop('disabled', false);

                if (error.response) {
                    /**
                     * The request was made, but the server responded with a status code
                     * that falls out of the range of 2xx
                     * @responses:
                     * error.response.data
                     * error.response.status
                     * error.response.headers
                     */
                    var list = error.response.data;
                    var ninfo = true;

                    /**
                     * Remove previous error before appending new errors
                     */
                    $('.'+opts.helpClass).remove();

                    _.forEach(list, function(value, key) {
                        if(key === 'status'){

                            CreateNoty({ type:'error', text: list.message });
                            ninfo = false;
                            return;
                        }
                        $('#'+key).after('<span class="'+opts.helpClass+'">'+value+'</span>')

                    });

                    if(ninfo){
                        CreateNoty({ type:'error', text:'There are errors on the form. Please correct them before continuing.' });
                    }

                    if(opts.hasCaptcha) {
                        axios.get('/captcha').then(function (response) {
                            $('#captcha_img > img').attr('src', response.data);
                        })
                    }
                } else {
                    /**
                     * Something happened in setting up the request that triggered an Error
                     * @response:
                     * error.message
                     */
                    CreateNoty({ type:'error', text:'Error: Something happen in setting up - ' + error.message });

                    console.log('Error: Something happen in setting up - ', error.message);
                }

                /**
                 * check error config when something went wrong on the two
                 * console.log(error.config);
                 */

            });
        }

    }

    useJquery(opts){
        console.log('jquery');
    }


}

export { Ajaxios }