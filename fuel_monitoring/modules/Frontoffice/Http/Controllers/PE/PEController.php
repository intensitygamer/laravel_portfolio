<?php

namespace Modules\FrontOffice\Http\Controllers\PE;

use Excel;
use App\Repositories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FrontOffice\PE\PERequest;
use App\Helpers\DateHelper;

use App\Commands\Fuel\FuelSearchCommand;
use App\Commands\Lubricant\LubricantSearchCommand;
use App\Commands\SubContractorWork\SubContractorWorkSearchCommand;

class PEController extends Controller
{

    /**
     * Display a date of the resource.
     * @return Response
     */
    function index($page, $type)
    {
        /*if (! (new \Permission)->can_manage_fuel_list())
            return view('errors.404');*/

        return view('modules.frontoffice.pe.index', compact('type', 'page'));
    }

    /**
     * Use post process
     * @return Response
     */
    function process(PERequest $request, $page)
    {
        /*if (! (new \Permission)->can_manage_fuel_use())
            return view('errors.404');*/

        $base_url = route('users.manage.get.process');

        try {

            if($page == 'work-audit') {
                $subcon = (new Repositories\SubContractor\SubContractorRepository)->get_subcontractor_by_id($request['subcontractor']);

                $printURL = $base_url.'?page='.$page.'&subcontractor='.$subcon['id'].'&type=print&date_from='.$request['mdf'].'&date_to='.$request['mdt'];
                $exportURL = $base_url.'?page='.$page.'&subcontractor='.$subcon['id'].'&type=export&date_from='.$request['mdf'].'&date_to='.$request['mdt'];

                $response = [
                    'dates'=>$request->all(),
                    'print_url' => $printURL,
                    'export_url' => $exportURL,
                    'printOrExport' => true,
                    'page' => $page,
                    'subcon' => $subcon['name']
                ];

            } else {
                
                $printURL = $base_url.'?page='.$page.'&type=print&date_from='.$request['mdf'].'&date_to='.$request['mdt'].'&project='.$request['project'];
                $exportURL = $base_url.'?page='.$page.'&type=export&date_from='.$request['mdf'].'&date_to='.$request['mdt'];

                $response = [
                    'dates'=>$request->all(),
                    'print_url' => $printURL,
                    'export_url' => $exportURL,
                    'printOrExport' => true,
                    'page' => $page,
                    'subcon' => null,
                    'project' => $request['project']
                ];

            }


        } catch (\Exception $e) {
            \Log::info($e);
            $response = ['status' => 'error', 'message' => (isset($e->errors) ? $e->errors : 'Something went wrong!')];
        }

        return response()->json($response,  200 );
    }

    function complete(Request $request){

        if($request->page == 'fuel') {

            $fuels = (new FuelSearchCommand($request))->execute();

            if($request->type == 'print') {
                //print
                return view('modules.frontoffice.reports.fuel.print', compact('fuels'));

            } else {
                //export

                // Generate and return the spreadsheet
                Excel::create('fuel_monitoring', function($excel) use ($fuels) {
                    // Set the spreadsheet title and description
                    $excel->setTitle('Fuel Monitoring');
                    $excel->setDescription('Fuel Monitoring File');

                    // passing the data
                    $excel->sheet('Fuels', function($sheet) use ($fuels) {
                        $headers = [
                            // 'Transaction ID',
                            'Date',
                            'Time of Transaction',
                            'Vendor',
                            'Reference No',
                            'Equipment',
                            'No. of Hours',
                            'Millage',
                            'Location',
                            'Operator',
                            'Project',
                            'Qty in Liter (IN)',
                            'Qty in Liter (Out)',
                            'Total Consumption per Unit',
                            'Remaining Balance',
                            'Remarks'];

                        $sheet->setStyle(array(
                            'font' => array(
                                'name'      =>  'Arial',
                                'size'      =>  12,
                            )
                        ));

                        // first row styling and writing content
                        $sheet->mergeCells('A1:K1');
                        $sheet->mergeCells('L1:P1');
                        $sheet->row(1, function ($cells) {
                            $cells->setFontSize(18);
                            $cells->setFontWeight('bold');
                            $cells->setAlignment('center');
                        });
                        $sheet->cell('A1', function($cell) { $cell->setValue('Transaction Information'); });
                        $sheet->cell('L1', function($cell) { $cell->setValue('Consumption'); });

                        $sheet->fromArray($headers, null, 'A2', false, false);
                        $sheet->row(2, function ($cells) {
                            $cells->setFontSize(12);
                            $cells->setFontWeight('bold');
                        });

                        foreach ($fuels as $key => $fuel) {
                            $sheet->appendRow(
                                $key+3,
                                array(
                                    // $fuel['transaction_no'],
                                    $fuel['transaction_date'],
                                    $fuel['transaction_time'],
                                    $fuel['vendor'],
                                    $fuel['reference_no'],
                                    $fuel['equipment'],
                                    $fuel['no_of_hours'],
                                    $fuel['millage'],
                                    $fuel['location'],
                                    $fuel['operator'],
                                    $fuel['project'],
                                    $fuel['in'],
                                    $fuel['out'],
                                    $fuel['total_consumption_per_unit'],
                                    $fuel['balance'],
                                    $fuel['remarks']
                                ));
                        }
                    });

                })->download('xlsx');
            }

        }

        if($request->page == 'lubricant') {

            $lubricants = (new LubricantSearchCommand($request))->execute();

            if($request->type == 'print') {
                //lubricants print
                return view('modules.frontoffice.reports.lubricant.print', compact('lubricants'));

            } else {
                //lubricant export

                // Generate and return the spreadsheet
                Excel::create('lubricant_monitoring', function($excel) use ($lubricants) {
                    // Set the spreadsheet title and description
                    $excel->setTitle('Lubricant Monitoring');
                    $excel->setDescription('Lubricant Monitoring File');

                    // passing the data
                    $excel->sheet('Lubricants', function($sheet) use ($lubricants) {
                        $headers = [
                            'Transaction ID',
                            'Date',
                            'Vendor',
                            'Reference No',
                            'Operator',
                            'Equipment',
                            'Location',
                            'Project',
                            'Remarks',

                            'Qty in Liter (IN)',
                            'Qty in Liter (Out)',
                            'Total Consumption per Unit',
                            'Remaining Balance',

                            'Qty in Liter (IN)',
                            'Qty in Liter (Out)',
                            'Total Consumption per Unit',
                            'Remaining Balance',

                            'Qty in Liter (IN)',
                            'Qty in Liter (Out)',
                            'Total Consumption per Unit',
                            'Remaining Balance',

                            'Qty in Liter (IN)',
                            'Qty in Liter (Out)',
                            'Total Consumption per Unit',
                            'Remaining Balance'
                        ];
                        $sheet->setStyle(array(
                            'font' => array(
                                'name'      =>  'Arial',
                                'size'      =>  12,
                            )
                        ));

                        // first row styling and writing content
                        $sheet->mergeCells('A1:I1');
                        $sheet->mergeCells('J1:M1');
                        $sheet->mergeCells('N1:Q1');
                        $sheet->mergeCells('R1:U1');
                        $sheet->mergeCells('V1:Y1');
                        $sheet->row(1, function ($cells) {
                            $cells->setFontSize(18);
                            $cells->setFontWeight('bold');
                            $cells->setAlignment('center');
                        });
                        $sheet->cell('A1', function($cell) { $cell->setValue('Transaction Information'); });
                        $sheet->cell('I1', function($cell) { $cell->setValue('Engine Oil (15W40)'); });
                        $sheet->cell('N1', function($cell) { $cell->setValue('Hydraulic Oil (AW100)'); });
                        $sheet->cell('R1', function($cell) { $cell->setValue('Gear Oil'); });
                        $sheet->cell('V1', function($cell) { $cell->setValue('Telluse'); });

                        $sheet->fromArray($headers, null, 'A2', false, false);
                        $sheet->row(2, function ($cells) {
                            $cells->setFontSize(12);
                            $cells->setFontWeight('bold');
                        });

                        foreach ($lubricants as $key => $lubricant) {
                            if($lubricant['type_of_oil_id'] == 1){
                                $sheet->appendRow(
                                    $key+3,
                                    array(
                                        $lubricant['transaction_no'],
                                        $lubricant['transaction_date'],
                                        $lubricant['vendor'],
                                        $lubricant['reference_no'],
                                        $lubricant['location'],
                                        $lubricant['equipment'],
                                        $lubricant['operator'],
                                        $lubricant['project'],
                                        $lubricant['remarks'],
                                        $lubricant['in'], $lubricant['out'], $lubricant['total_consumption_per_unit'], $lubricant['balance'],
                                        '', '', '', '',
                                        '', '', '', '',
                                        '', '', '', ''
                                    ));
                            }

                            if($lubricant['type_of_oil_id'] == 2){
                                $sheet->appendRow(
                                    $key+3,
                                    array(
                                        $lubricant['transaction_no'],
                                        $lubricant['transaction_date'],
                                        $lubricant['vendor'],
                                        $lubricant['reference_no'],
                                        $lubricant['location'],
                                        $lubricant['equipment'],
                                        $lubricant['operator'],
                                        $lubricant['project'],
                                        $lubricant['remarks'],
                                        '', '', '', '',
                                        $lubricant['in'], $lubricant['out'], $lubricant['total_consumption_per_unit'], $lubricant['balance'],
                                        '', '', '', '',
                                        '', '', '', ''
                                    ));
                            }

                            if($lubricant['type_of_oil_id'] == 3){
                                $sheet->appendRow(
                                    $key+3,
                                    array(
                                        $lubricant['transaction_no'],
                                        $lubricant['transaction_date'],
                                        $lubricant['vendor'],
                                        $lubricant['reference_no'],
                                        $lubricant['location'],
                                        $lubricant['equipment'],
                                        $lubricant['operator'],
                                        $lubricant['project'],
                                        $lubricant['remarks'],
                                        '', '', '', '',
                                        '', '', '', '',
                                        $lubricant['in'], $lubricant['out'], $lubricant['total_consumption_per_unit'], $lubricant['balance'],
                                        '', '', '', ''
                                    ));
                            }

                            if($lubricant['type_of_oil_id'] == 4){
                                $sheet->appendRow(
                                    $key+3,
                                    array(
                                        $lubricant['transaction_no'],
                                        $lubricant['transaction_date'],
                                        $lubricant['vendor'],
                                        $lubricant['reference_no'],
                                        $lubricant['location'],
                                        $lubricant['equipment'],
                                        $lubricant['operator'],
                                        $lubricant['project'],
                                        $lubricant['remarks'],
                                        '', '', '', '',
                                        '', '', '', '',
                                        '', '', '', '',
                                        $lubricant['in'], $lubricant['out'], $lubricant['total_consumption_per_unit'], $lubricant['balance']
                                    ));
                            }
                        }
                    });

                })->download('xlsx');
            }

        }


        if($request->page == 'work-audit') {

            $date_format = new DateHelper;

            $subcontractor = (new SubContractorWorkSearchCommand($request))->execute();
            $dates = ['date_from'=>$date_format->transaction_date($request->date_from),'date_to'=> $date_format->transaction_date($request->date_to)];

            $subcontractorworks = array_merge(['subcontractor'=>$subcontractor], ['dates'=>$dates]);

            if($request->type == 'print') {
                //audit print
                return view('modules.frontoffice.reports.subcontractorwork.print', compact('subcontractorworks'));

            } else {
                //audit export

                // Generate and return the spreadsheet
                Excel::create('subcontractor_work', function($excel) use ($subcontractorworks) {
                    // Set the spreadsheet title and description
                    $excel->setTitle('Sub Contractor Work');
                    $excel->setDescription('Sub Contractor Work File');

                    // passing the data
                    $excel->sheet('Sub Contractor Work', function($sheet) use ($subcontractorworks) {
                        $headers = [
                            'SCOPE OF WORK',
                            'AMOUNT',
                            '%',
                            'AMOUNT',
                            '%',
                            'AMOUNT',
                            'THIS BILLING',
                            'BALANCE AMOUNT',
                            'REMARKS'
                        ];

                        // first row styling and writing content
                        $sheet->setStyle(array(
                            'font' => array(
                                'name'      =>  'Arial',
                                'size'      =>  12,
                            )
                        ));

                        $sheet->setWidth('A', 45);
                        $sheet->setSize(array(
                            'B1:G1' => array(
                                'width'     => 20,
                            ),
                            'H1:I1' => array(
                                'width'     => 15,
                            ),
                            'H2' => array(
                                'width'     => 15,
                            ),
                            'I2' => array(
                                'width'     => 15,
                            ),
                            'B4' => array(
                                'width'     => 12,
                                'height'     => 15,
                            ),
                            'G4' => array(
                                'width'     => 12,
                                'height'     => 15,
                            )
                        ));

                        $sheet->setBorder('B4', 'solid', 'solid', 'none', 'solid');
                        $sheet->setBorder('G4', 'solid', 'solid', 'none', 'solid');

                        $sheet->mergeCells('B1:G2');
                        $sheet->cells('B1:G2', function($cells) { $cells->setFontWeight('bold'); $cells->setAlignment('center'); });
                        $sheet->cell('A1', function($cell) { $cell->setValue('PROJECT:'); });
                        $sheet->cell('A2', function($cell) use($subcontractorworks) {
                            if (!empty($subcontractorworks['subcontractor'])) {
                                $cell->setValue('SUBCON: '.$subcontractorworks['subcontractor'][0]['subcontractor']);
                            }
                        });

                        $sheet->cell('A3', function($cell) { $cell->setValue('CONTACT REF. NO.:'); });
                        $sheet->cell('B1', function($cell) { $cell->setValue('DAKAY CONSTRUCTION AND DEVELOPMENT CORPORATION'); });

                        $sheet->mergeCells('B3:G3');
                        $sheet->cells('B3:G3', function($cells) { $cells->setFontWeight('bold'); $cells->setAlignment('center'); });
                        $sheet->cell('B3', function($cell) { $cell->setValue('SUB-CONTRACTOR WEEKLY ACCOMPLISHMENT REPORT'); });

                        $sheet->mergeCells('H1:I1');
                        $sheet->cells('H1:I1', function($cells) { $cells->setAlignment('center'); });
                        $sheet->cell('H1', function($cell) { $cell->setValue('PERIOD COVERING'); });

                        $sheet->cell('H2', function($cell) { $cell->setValue('FROM:'); });
                        $sheet->cell('I2', function($cell) { $cell->setValue('TO:'); });

                        $sheet->cell('H3', function($cell) use ($subcontractorworks) { $cell->setValue($subcontractorworks['dates']['date_from']); });
                        $sheet->cell('I3', function($cell) use ($subcontractorworks) { $cell->setValue($subcontractorworks['dates']['date_to']); });

                        $sheet->cell('B4', function($cell) { $cell->setValue('CONTRACT'); });

                        $sheet->mergeCells('C4:D4');
                        $sheet->cell('C4', function($cell) { $cell->setValue('PREVIOUS ACCOMPLISHMENT'); });

                        $sheet->mergeCells('E4:F4');
                        $sheet->cell('E4', function($cell) { $cell->setValue('PRESENT ACCOMPLISHMENT'); });

                        $sheet->cell('G4', function($cell) { $cell->setValue('AMOUNT DUE'); });

                        $sheet->fromArray($headers, null, 'A5', false, false);

                        //dd($subcontractorworks);

                        foreach ($subcontractorworks['subcontractor'] as $key => $subcontractorwork) {
                            $sheet->appendRow(
                                );
                        }

                        $i = 6;
                        $total_amount = 0;

                        foreach ($subcontractorworks['subcontractor'] as $key => $subcontractorwork) {

                            if ($subcontractorwork)
                            {
                                $sheet->row($i, array(
                                    $subcontractorwork['equipment'].'-'.$subcontractorwork['scope_of_work'],
                                    $subcontractorwork['contract_amount'],
                                    '',
                                    '',
                                    \App\Helpers\InputHelper::calculate_percentage($subcontractorwork['contract_amount'], $subcontractorwork['total_current_paid_amount']).'%',
                                    $subcontractorwork['total_current_paid_amount'],
                                    $subcontractorwork['total_current_paid_amount'],
                                ));
                                $i++;
                                $total_amount +=$subcontractorwork['total_current_paid_amount'];
                            }
                        }

                        $total_row = $i + 8;

                        $sheet->mergeCells('E'.$total_row.':F'.$total_row);
                        $sheet->cell('E'.$total_row, function($cell) { $cell->setValue('TOTAL BILLING P'); });
                        $sheet->cells('E'.$total_row.':F'.$total_row, function($cells) { $cells->setFontWeight('bold'); });

                        $sheet->cell('G'.$total_row, function($cell) use ($total_amount) { $cell->setValue($total_amount); });

                    });

                })->download('xlsx');
            }
        }

    }

}