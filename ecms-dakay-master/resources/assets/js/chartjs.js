import { LineTypeChart, BarTypeChart, PieTypeChart, MultiBarTypeChart, MultiLineTypeChart } from './charts';

/**
 * This is customise js created through modules structure
 * with ES6 kind of code and will compile in webpack.
 * importing files coming from index.js in modules folder
 */

window.CreateChart = (ttype, opts) => {

    switch (ttype){
        case 'line':
            new LineTypeChart().defaultLayout(opts);
            break;

        case 'bar':
            new BarTypeChart().defaultLayout(opts);
            break;

        case 'pie':
            new PieTypeChart().defaultLayout(opts);
            break;

        case 'multi-bar':
            new MultiBarTypeChart().defaultLayout(opts);
            break;

        case 'multi-line':
            new MultiLineTypeChart().defaultLayout(opts);
            break;

        default:
            console.error('Chart Error: No type found')
            break;
    }
}