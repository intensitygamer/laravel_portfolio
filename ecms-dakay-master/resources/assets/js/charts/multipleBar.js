import Chart from 'chart.js';

class MultiBarTypeChart{


    defaultLayout(opts){
        /**
         * Get canvas ID
         * @type {*}
         */
        var ctx = document.getElementById(opts.selector).getContext("2d");

        /**
         * Options
         * @type {{}}
         */
        opts = (typeof opts !== "object") ? {} : opts;
        opts.selector = opts.selector || console.error('selector required!');
        opts.type = opts.type || 'bar';
        opts.data = opts.data || console.error('data required!');
        opts.options = opts.options || {};

        /**
         * Override options values
         */
        opts.options.responsive = true;
        opts.options.pointDotStrokeWidth = 1;
        opts.options.datasetStrokeWidth = 1;
        opts.options.datasetStrokeWidth = 1;
        opts.options.legend = { display: false };

        new Chart(ctx, {
            type: opts.type,
            data: opts.data,
            options: opts.options
        });
    }

}

export { MultiBarTypeChart }