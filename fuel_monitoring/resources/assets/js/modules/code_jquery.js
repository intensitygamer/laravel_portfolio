import $ from 'jquery';

class CodeJquery
{
    start(codes){
        $(document).ready(function() {
            codes();
        });
    }
}

export { CodeJquery };