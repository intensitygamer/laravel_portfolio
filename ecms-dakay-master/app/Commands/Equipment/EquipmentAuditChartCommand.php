<?php

namespace App\Commands\Equipment;

use Illuminate\Http\Request;
use App\Repositories\Equipment\EquipmentAuditRepository;

use App\Models\Monitoring;

class EquipmentAuditChartCommand
{
    protected $filters;
    protected $chart;

    public function __construct(Request $request)
    {
        $this->filters = [];
        $this->chart = [];

        if ($request->get('date_from', null) && $request->get('date_to', null))
        {
            $this->filters['date_from'] = $request->get('date_from');
            $this->filters['date_to'] = $request->get('date_to');
        }

        $this->request = $request;
    }

    public function execute()
    {
        /**
         * Initialize Repository
         */
        $audit_repository = new EquipmentAuditRepository;

        /**
         * consume chart
         */
        $this->chart['fuel'] = $audit_repository->get_fuel_by_date($this->filters, $this->request->get('equipment_id'));
        $this->chart['engine'] = $audit_repository->get_lubricant_by_date($this->filters, $this->request->get('equipment_id'), Monitoring::ENGINE_OIL_ID);
        $this->chart['hydraulic'] = $audit_repository->get_lubricant_by_date($this->filters, $this->request->get('equipment_id'), Monitoring::HYDRAULIC_OIL_ID);
        $this->chart['gear'] = $audit_repository->get_lubricant_by_date($this->filters, $this->request->get('equipment_id'), Monitoring::GEAR_OIL_ID);
        $this->chart['telluse'] = $audit_repository->get_lubricant_by_date($this->filters, $this->request->get('equipment_id'), Monitoring::TELLUSE_ID);

        $this->chart['subcontractorwork'] = $audit_repository->get_no_of_repairs_by_date($this->filters, $this->request->get('equipment_id'));

        return $this->chart;

    }
}
