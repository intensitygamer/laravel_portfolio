import Chart from 'chart.js';

class PieTypeChart{

    constructor(colors){
        this.colors = {
            red: 'rgb(255, 99, 132)',
            orange: 'rgb(255, 159, 64)',
            yellow: 'rgb(255, 205, 86)',
            green: 'rgb(75, 192, 192)',
            blue: 'rgb(54, 162, 235)',
            purple: 'rgb(153, 102, 255)',
            grey: 'rgb(231,233,237)'
        }
    }

    defaultLayout(opts){
        /**
         * Get canvas ID
         * @type {*}
         */
        var ctx = document.getElementById(opts.selector).getContext("2d");

        /**
         * Gradient
         * @type {CanvasGradient}
         */
        var gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(70,71,169,0.50)');
        gradient.addColorStop(1, 'rgba(255,255,255,0)');

        /**
         * Options
         * @type {{}}
         */
        opts = (typeof opts !== "object") ? {} : opts;
        opts.selector = opts.selector || console.error('selector required!');
        opts.type = opts.type || 'bar';
        opts.data = opts.data || console.error('data required!');
        opts.options = opts.options || {};
        opts.themes = opts.themes || {};

        /**
         * Override datasets value with colors and borders
         */

        // background
        opts.data.datasets[0].lineTension = 0;
        opts.data.datasets[0].backgroundColor = opts.themes.background;

        // point border colors
        opts.data.datasets[0].pointBorderColor = opts.themes.pointBackground;
        opts.data.datasets[0].pointBackgroundColor = opts.themes.pointBackground;
        opts.data.datasets[0].pointBorderWidth = 4;

        //point hover
        opts.data.datasets[0].pointHoverBorderWidth = 4;
        opts.data.datasets[0].pointHoverBorderColor = opts.themes.pointHoverBorder;
        opts.data.datasets[0].pointHoverBackgroundColor = opts.themes.pointHoverBackground;
        opts.data.datasets[0].pointHoverRadius = 5;

        // border colors
        opts.data.datasets[0].borderColor = opts.themes.pointBackground;
        opts.data.datasets[0].borderWidth = 4;


        /**
         * Override options values
         */
        opts.options.responsive = true;
        opts.options.pointDotStrokeWidth = 2;
        opts.options.datasetStrokeWidth = 1;
        opts.options.datasetStrokeWidth = 1;
        opts.options.legend = { display: false };
        opts.options.scales = {
            xAxes: [{
                gridLines: {
                    display: false,
                }
            }],
            yAxes: [{
                gridLines: {
                    drawBorder: false,
                },
                ticks: {
                    beginAtZero:true,
                    mirror:false,
                    suggestedMin: 0,
                    suggestedMax: 100,
                },
            }]
        };

        new Chart(ctx, {
            type: opts.type,
            data: opts.data,
            options: opts.options
        });
    }

}

export { PieTypeChart }