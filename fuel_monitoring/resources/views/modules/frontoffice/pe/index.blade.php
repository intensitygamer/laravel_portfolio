@php
    // refactor magic numbers
    $permission = (new \Permission);
    $dateHelper = new \App\Helpers\DateHelper;
    $numFormat = new \App\Helpers\NumberFormatHelper;
    $inputHelper = new \App\Helpers\InputHelper;
    $equipment_list = \App\Helpers\InputHelper::equipment_list();
    $subcontractor_list = \App\Helpers\InputHelper::subcontractor_list();
    $project_list = \App\Helpers\InputHelper::project_list();

    // query and compute fuel remaining balance


@endphp

<div class="row">
    <div class="col-md-12">

        <div class="form-pe-date">
            {!! Form::open(['method'=>'get', 'class' => 'form-horizontal pe-form', 'name' => 'pe-form']) !!}
            <div class="row">
                <div class="col-md-12 sub-con-set">
                    @if($page == 'work-audit')
                        {{ Form::bsSelect('subcontractor', request('subcontractor'), 'Sub Contractor', $subcontractor_list) }}
                    @endif
                </div>

                <div class="col-md-12 sub-con-set">
                    @if($page == 'fuel')
                        {{ Form::bsSelect('project', request('project'), 'Project', $project_list) }}
                    @endif
                </div>
                
                 <div class="col-md-12">
                    {{ Form::bsDateRangePicker(
                       ['name' => 'mdf', 'value' => request('mdf'), 'label' => 'From Date', 'attributes' => ['id'=>'mdf'] ],
                       ['name' => 'mdt', 'value' => request('mdt'), 'label' => 'To Date','attributes' => ['id'=>'mdt'] ]
                   ) }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button type="button" class="btn btn-danger btn-confirm-deny margin-bottom-10" data-dismiss="modal" aria-label="Close">Close</button>
                    {{ Form::submit('Submit', ['class' => 'btn btn-primary btn-filter display-block margin-bottom-10']) }}
                </div>
            </div>
            {!! Form::close() !!}
        </div>

        <div class="form-pe-date-statement">
            <div class="dates">
                <div class="row">
                    <div class="col-md-12">
                        <div class="subcon">
                            <span class="text-center text-center subcon-name text-success"></span>

                            <span class="text-center text-center project-name text-success"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <span class="span-date-from"></span> - <span class="span-date-to"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="fpds-tag text-center">
                        <!-- <a class="btn btn-warning export-button-modal"><i class="fa fa-file-excel-o"></i> EXPORT XLSX</a> -->
                        <a target="_blank" class="btn btn-success print-button-modal"><i class="fa fa-print"></i> 
                            PRINT PREVIEW
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            CodeJquery(function(){
                var format = "MMMM DD, YYYY"
                createDatePicker('dateRange', { from: '#mdf', to: '#mdt', format: format });

                $('.pe-form').submit(function (event) {
                    event.preventDefault();

                    sendAjax('axios', {
                        url: '{{ url('manage/pe/'.$page.'/'.$type) }}',
                        type: 'post',
                        data: $(this).serialize(),
                        element: $(this)
                    });

                    $(".project-name").html($("#project").find(":selected").text());

                    // var print_href = $("a.print-button-modal").attr('href');

                    //     $("a.print-button-modal").attr('href', print_href + "&project=" + $("#project").val());

                    // alert(print_href);

                });

             })
        </script>

    </div>
</div>
