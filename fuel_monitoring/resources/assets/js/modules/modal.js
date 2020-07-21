class Modal{

    constructor(target, element_id){
        this.target = target;
        this.motherofModal = $('.append-modal');
        this.fatherofModal = $('.confirm-modal');
        this.loading = '<i class="fa fa-spin fa-spinner"></i>';

        this.conditionalModal = element_id;

        this.setModal(this.conditionalModal);
    }

    appendViewModal(ev, targetModal, opts){
        var $url = $(ev).data('url') || null;
        var $title = $(ev).data('title') || null;
        var $target = $(targetModal);

        opts = (typeof opts !== "object") ? {} : opts;
        opts.refresh = opts.refresh || false;
        opts.modal_size = opts.modal_size || '';

        if(opts.modal_size == 'md-custom'){
            $('.append-modal').addClass('modal-md-custom');
        }

        //set modal title = hasTitleAttribute
        if($title) {
            $target.find('.modal-title').html($title);
            //before axios append
            $target.find('.modal-body').html(this.loading);
        }

        // opening modal
        $target.modal('show');

        $target.on('shown.bs.modal', function () {
            axios.get($url).then(function (response) {
                $target.find('.modal-body').html(response.data);
            })
        });

        // close modal
        $target.find('.close-modal').on('click', function(){
            $target.modal('close');
        });

        $target.on('hidden.bs.modal', function () {
            $target.find('.modal-body').html('');
            $target.off();
        });
    }

    refreshWhenExit(){
        location.reload();
    }

    confirmModal(ev, targetModal, opts){
         var $url = $(ev).data('url') || null;
         var $title = $(ev).data('title') || null;
         var $name = $(ev).data('name') || null;
         var $target = $(targetModal);

         opts = (typeof opts !== "object") ? {} : opts;
         opts.refresh = opts.refresh || false;
         opts.mod = opts.mod || false;

         if($title)
            $target.find('.modal-title').html($title);

         if(opts.mod)
            $target.find('.'+opts.mod).removeClass();

        if($name)
            $target.find('.to-append').html($name);

         // opening modal
         $target.modal('show');

         $target.find('.btn-confirm-approve').attr("href", $url);

         // close modal
         $target.find('.close-modal').on('click', function(){
            $target.modal('close');
         });

        $target.on('hidden.bs.modal', function () {
            $target.off();
        });
    }

    setIdElement(element_id){
        this.conditionalModal = element_id;
    }

    getIdElement(){
        return this.conditionalModal;
    }

    setModal(){

        if(this.conditionalModal == 'confirmModal'){
            this.fatherofModal.attr('id', this.target.replace('#',''));
        }else {
            this.motherofModal.attr('id', this.target.replace('#',''));
        }
    }

    animateModal(animateClass, idTag) {
        $(this.target).find('.modal-dialog').attr('class', 'modal-dialog  ' + animateClass + '  animated');
    }

}

export { Modal }