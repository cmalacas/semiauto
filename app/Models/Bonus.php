<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Week;
use App\Models\Termination;
use App\Models\Sale;
use App\Models\getListSalesMgrException;
use App\Models\VitalStat;
use App\Models\StoreUnit;
use App\Modesl\BonusCheckRule;
use App\Models\TireTech;
use App\Models\EmployeeRole;
use App\Models\MechanicValue;
use App\Models\BonusOneTime;
use App\Models\BonusCalc;

use DB;

class Bonus extends Model
{
    use HasFactory;

    protected $table = 'bonuses';

    public static function _get($week, $year) {

        $list = self::list();

        $bonuses = [];

        $endDate = self::getEndDate( $year, $week );

        $workingDays = self::getWorkingDays($year,$week);

        $count = 0;

        foreach( $list as $e) {

            $bonusSales = 0;
            $bonusSalesMgr = 0;
            $bonusTech = 0;
            $bonusStoreMgr = 0;
            $bonusService = 0;
            $bonusLeadership = 0;
            $bonusOneTime = 0;
            $bonusCollections = 0;

            if (self::checkTermination($e->emp_id, $endDate)) {
                
                $count++;

                continue;

            }

            if ($e->BonusType == 'BonusSales') {

                $unitsSold = self::getSalesUnits( $e->emp_id, $e->store_id, $week, $year );

                if ($unitsSold != 0) {

                    $unitTarget = 6.33 * $workingDays;

                    if ($unitSold < $unitTarget) {

                        $bonusSales += $unitSold * 2.5;

                    } else {

                        $bonusSales += $unitSold * 3.75;

                    }


                }

            }

            if ($e->BonusType == 'BonusSalesMgr') {

                $listOfSalesMgrExceptions = self::getListSalesMgrException();

                $stats = self::getVitalStats($e->store_id, $week, $year);

                if (!empty($stats->new_agr)) {

                    $newAgreemens = $stats->new_agr;

                    if (in_array( $e->emp_id, $listOfSalesExceptions)) {

                        $bonusSalesMgr += $newAgreements * 2.5;

                    } else {

                        $bonusSalesMgr += $newAgreements * 5;

                    }

                }

            }

            if ($e->BonusType == 'BonusTech') {

               $storeUnit = self::getStoreUnitTech($year, $week, $e->emp_id, $e->store_id);

               if (!empty($storeUnit)) {

                $tire_tech = self::getEmpTireTech($year, $week, $e->emp_id, $e->store_id);

                if ($tire_tech != 0) {

                    $sum_tire_tech_by_storeID = self::getTotalTireTechByStoreId( $year, $week, $e->store_id );

                    $result = ($storeUnit->units * 0.5 * $tire_tech) / $sum_tire_tech_by_storeID;

                    $bonusTech += $result;

                }

               }

            }

            if ($e->BonusType == 'BonusCollections') {

               $stats = self::getVitalStats( $e->store_id, $week, $year);

               if (!empty($stats->agr_total)) {

                $totalAgreement = $stats->agr_tottal;
                $satClose = $stats->sat_close / 100;
                $autopayPercent = $stats->autopay_pct;

                $initCalc = 0.5 * $totalAgreement;

                $multiplier = 1;
                
                if ($satClose > 0.1) {
                    $multiplier -= 0.25;
                }
                
                $initCalc = $initCalc * $multiplier;

                $multiplier1 = 1;
                
                if ($autopayPercent < 0.85) {
                    $multiplier1 -= 0.1;
                }
                
                $initCalc = $initCalc * $multiplier1;

                $bonusCollections += $initCalc / 4.3333;

               }

            }

            if ($e->BonusType == 'BonusStoreMgr') {

                $stats = self::getVitalStats($e->store_id, $week, $year);  

                $newAgreements = 1;
                
                if (!empty($stats->new_agr)) {

                    $newAgreemens = $stats->new_agr;

                }

                $initStoreMgrBon = 10 * $newAgreements;

                if(!empty($stats->sat_close)){


                    $newAgreements = $stats->new_year;
                    $satClose = $stats->sat_close / 100;
                    $autopayPercent = $stats->autopay_pct;
                    $newAlignmentPercent = $stats->new_alignment_pct / 100;
                    $newClubPercent = $stats->agr_newclub_pct / 100;    
                    $unverified = $stats->unverified;
                    $errors = $stats->errors;

                    $initStoreMgrBon = 10 * $newAgreements;

                    $satMultiplier = 1;
                    if ($satClose <= 0.10) {
                        if ($satClose <= 0.08) {
                            $satMultiplier = 1.1;
                        } else {
                            $satMultiplier = 1;
                        }
                    } else {
                        $satMultiplier = 0.9;
                    }

                    $initStoreMgrBon = $initStoreMgrBon * $satMultiplier;

                    $newAlignmentMultiplier = 1;

                    if ($newAlignmentPercent >= 0.85) {
                        $newAlignmentMultiplier += 0.1;
                    } else {
                        $newAlignmentMultiplier -= 0.1;
                    }

                    $initStoreMgrBon = $initStoreMgrBon * $newAlignmentMultiplier;
                    

                    $newClubPercentMultiplier = 1;

                    if ($newClubPercent >= 0.85) {
                        $newClubPercentMultiplier = 1.1;
                    } else {
                        $newClubPercentMultiplier = 0.9;
                    }




                    $initStoreMgrBon = $initStoreMgrBon * $newClubPercentMultiplier;

                    $autopayPercentMultiplier = 1;
                    if ($autopayPercent < 0.85) {
                        $autopayPercentMultiplier -= 0.1;
                    }

                    $initStoreMgrBon = $initStoreMgrBon * $autopayPercentMultiplier;

                    $unverifiedMultiplier = 1;
                    if ($unverified === 3) {
                        $unverifiedMultiplier -= 0.05;
                    } elseif ($unverified === 4) {
                        $unverifiedMultiplier -= 0.1;
                    } elseif ($unverified > 4) {
                        $unverifiedMultiplier -= 0.15;
                    }
                    $initStoreMgrBon = $initStoreMgrBon * $unverifiedMultiplier;
                    
                    $errorsMultiplier = 1;
                    if ($errors === 2) {
                        $errorsMultiplier -= 0.05;
                    } elseif ($errors === 3) {
                        $errorsMultiplier -= 0.1;
                    } elseif ($errors > 3) {
                        $errorsMultiplier -= 0.15;
                    }
                    
                    $initStoreMgrBon = $initStoreMgrBon * $errorsMultiplier;

                }

            }

            if ($e->BonusType == 'BonusService') {

                if(!empty(self::getServicePartsLabor($year,$week, $e->emp_id))){
                    
                    $partsLabor = self::getServicePartsLabor($year,$week, $e->emp_id);
                    
                    $serviceTotal = self::getServiceTotal($year,$weekr,$partsLabor->store_id);

                    $laborMultiplier = 0.1;
                    $partsMultiplier = 0;
                    

                    if($serviceTotal >= 0 && $serviceTotal <= 2884.62){
                        $partsMultiplier = 0;
                    }
                    elseif($serviceTotal > 2884.62 && $serviceTotal <= 3923.08){
                        $partsMultiplier = 0.05;
                    }
                    elseif($serviceTotal > 3923.08 && $serviceTotal <= 4615.38){
                        $partsMultiplier = 0.075;
                    }
                    else{
                        $partsMultiplier = 0.1;
                    }

                    $bonusService += ($partsLabor->labor * $laborMultiplier) + ($partsLabor->parts * $partsMultiplier);
                }

            }

            if ($e->BonusType == 'BonusLeadership') {

                $bonusLeadership += $e->leadership_bonus;

            }

            if ($e->BonusType == 'BonusOneTime') {

                if(self::getOneTimeBonus($e->emp_id, $week, $year))
                {
                    foreach(self::getOneTimeBonus($e->emp_id, $week, $year) as $bonus){
                        $bonusOneTime +=  $bonus->amount;
                    }
                }

            }

            $totalBonus = $bonusSales + $bonusSalesMgr + $bonusTech + $bonusStoreMgr + $bonusService + $bonusLeadership + $bonusOneTime + $bonusCollections;

            $bonusCalc = new BonusCalc;

            $bonusCalc->emp_id = $e->emp_id;
            $bonusCalc->store_id = $e->store_id;
            $bonusCalc->week_id = $week;

            $bonusCalc->bonus_sales = $bonusSales;
            $bonusCalc->bonus_sales_mgr = $bonusSalesMgr;
            $bonusCalc->bonus_tech = $bonusTech;
            $bonusCalc->bonus_collections = $bonusCollections;
            $bonusCalc->bonus_store_mgr = $bonusStoreMgr;
            $bonusCalc->bonus_service = $bonusService;
            $bonusCalc->bonus_leadership = $bonusLeadership;
            $bonusCalc->bonus_one_time = $bonusOneTime;
            $bonusCalc->bonus_total = $totalBonus;

            $bonusCalc->save();

        }

        return $bonuses;


    }

    public static function list() {

        return DB::table(DB::raw('bonus_check_rules bc'))
            ->select(
                DB::raw('bc.emp_id'),
                DB::raw('bc.store_id'),
                DB::raw('bt.description as BonusType'),
                DB::raw('bc.leadership_bonus')
            )
            ->join(DB::raw('bonus_types bt'), 'bt.id', '=', 'bc.bonus_type_id')
            ->where('bc.is_active', '=', 1)
            ->orderBy(DB::raw('bc.emp_id, bc.store_id'))
            ->get();

    }

    static function getEndDate( $year, $week ) {

        $endDate = Week::where('week_number', '=', $week)
                    ->where('year', '=', $year)
                    ->first()
                    ->end_date;

        return $endDate;

    }

    static function checkTermination($emp_id, $enDate) {

        $result = Termination::where('emp_id', '=', $emp_id)
                    ->get();

        if ($result->count() > 0) {

            $terminationDate = $resul->end_date;

            if ($terminationDate < $endDate) {

                $employee = Employee::where('emp_id')->first();

                $employee->is_active = 0;

                $employee->save();

                return true;


            } else {

                $employee = Employee::where('emp_id')->first();

                $employee->is_active = 1;

                $employee->save();

                return false;
            
            }

        } else {

            return false;

        }        

    }

    static function getWorkingDays( $year, $week ) {        

        $days = Week::where('week_number', '=', $week)
                    ->where('year','=', $year)
                    ->first()
                    ->working_days;
                   

        return $days;

    }

    static function getSalesUnits( $emp_id, $store_id, $week, $year ) {

        $units = Sale::where('emp_id', '=', $emp_id)
                    ->where('store_id', '=', $store_id)
                    ->where('week_number', '=', $week)
                    ->where('year', '=', $year)
                    ->first();
                    
        if ($units) {

            return $unis->units;

        } else {

            return false;

        }


    }

    static function getListSalesMgrException() {

        $result = SalesMgrException::where('is_deleted', '=', 0)
                    ->get();

        return $result;

    }

    static function getVitalStats($store_id, $week, $year) {

        $results = VitalStat::where('store_id', '=', $store_id)
                    ->where('week_number', '=', $week)
                    ->where('year', '=', $year)
                    ->first();

        return $results;

    }

    static function getStoreUnitTech( $year, $week, $emp_id, $store_id ) {

        $result = StoreUnit::select(
                        DB::raw('store_units.units'),
                        DB::raw('store_units.store_id'),
                    )
                    ->join('bonus_check_rules', 'bonus_check_rules.store_id','=', 'store_units.store_id')
                    ->where(DB::raw('store_units.year'), '=', $year)
                    ->where(DB::raw('store_units.week_number'), '=', $week)
                    ->where(DB::raw('store_units.store_id'), '=', $store_id)
                    ->where(DB::raw('bonus_check_rules.emp_id'), '=', $emp_id)
                    ->first();

        return $result;

    }

    static function getEmpTireTech( $year, $week, $emp_id, $store_id ) {

        $result = TireTech::where('year', '=', $year)
                    ->where('week_number', '=', $week)
                    ->where('store_id', '=', $store_id)
                    ->first();

        return $result ? $result->tire_tech : 0;

    }

    static function getTotalTireTechByStoreId( $year, $week, $store_id ) {

        $result = TireTech::select(
                            'store_id',
                            DB::raw('ROUND(SUM(tire_tech), 2) as total')
                        )
                    ->where('year', '=', $year)
                    ->where('week_number', '=', $week)
                    ->where('store_id', $store_id)
                    ->groupBy(DB::raw('store_id, year, week_number'))                    
                    ->first();

        return $result ? $result->total : 0;

    }

    static function getServicePartsLabor($year, $week, $emp_id) {

        $result = EmployeeRole::select()
                    ->join('mechanic_values', 'mechanic_values.emp_id', '=', 'employee_roles.emp_id')
                    ->where('mechanic_values.year', '=', $year)
                    ->where('mechanic_values.week_number', '=', $week)
                    ->where('employee_roles.emp_id', '=', $emp_id)
                    ->first();

        return $result;

    }

    static function getOneTimeBonus($emp_id, $week, $year) {

        $result = BonusOneTime::where('emp_id', '=', $emp_id)
                    ->where('week_number', '=', $week)
                    ->where('year', '=', $year)
                    ->get();

        return $result;

    }
} 