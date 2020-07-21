import datetimepicker from 'eonasdan-bootstrap-datetimepicker';

class DateTimePicker
{
    /**
     * Generated by Datetimepicker Plugin
     * @param opts
     * @constructor
     */
    constructor(){
        this.enableIcon();
    }

    createDate(opts){
        opts = (typeof opts !== "object") ? {} : opts;

        opts.tag = opts.tag;
        opts.format = opts.format || 'YYYY-MM-DD';
        opts.default_date = opts.default_date || '';

        $(opts.tag).datetimepicker({
            format: opts.format,
            defaultDate: opts.default_date
        });
    }

    createTime(opts){
        opts = (typeof opts !== "object") ? {} : opts;

        opts.tag = opts.tag;
        opts.format = opts.format || 'LT';
        opts.default_date = opts.default_date || '';

        $(opts.tag).datetimepicker({
            format: opts.format,
            defaultDate: opts.default_date
        });
    }

    createDateRange(opts){
        opts = (typeof opts !== "object") ? {} : opts;

        opts.from = opts.from;
        opts.to = opts.to;

        opts.format = opts.format || 'YYYY-MM-DD';
        opts.sbys = opts.sbys || true;
        opts.defvalue_from = opts.defvalue_from || '';
        opts.defvalue_to = opts.defvalue_to || '';

        $(opts.from).datetimepicker({
            format: opts.format,
            sideBySide:opts.sbys,
            defaultDate: opts.defvalue_from
        });

        $(opts.to).datetimepicker({
            format:opts.format,
            sideBySide:opts.sbys,
            useCurrent: false, //Important! See issue #1075
            defaultDate: opts.defvalue_to
        });

        this.SetMinMax(opts.from, opts.to);
    }

    SetMinMax(attr1, attr2){
        $(attr1).on("dp.change", function (e) {
            $(attr2).data("DateTimePicker").minDate(e.date);
        });

        $(attr2).on("dp.change", function (e) {
            $(attr1).data("DateTimePicker").maxDate(e.date);
        });
    }

    enableIcon(){
        $('.input-group-addon').click(function(ev){
            ev.preventDefault();
            var $this = $(event.currentTarget);
            $this.closest('.input-group.date').find('input').focus();
        });
    }
}

export { DateTimePicker }