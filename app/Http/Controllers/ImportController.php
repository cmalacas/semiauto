<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\VitalStat;
use App\Models\Store;

use DB;

class ImportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('import.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $file = $request->file('file');
        $fileContents = file($file->getPathname());

        foreach ($fileContents as $line) {
            
            $data = str_getcsv($line);

            list(
                $STORENAME, 
                $MANAGER, 
                $PR_WK_COR, 
                $CUR_WK_COR, 
                $STRE_OPEN_DATE, 
                $WKS_OPEN, 
                $ANDER_EQUIV, 
                $ANDER_PCT_COMP, 
                $WK_PAY_OFF, 
                $CUST_RENT, 
                $NEW_AGR, 
                $CASH_SALES, 
                $SERVICE_REVENUE, 
                $PCT_MARGIN, 
                $PCT_CUST_RENT, 
                $PCT_CUST_RENT_YEAR, 
                $AVG_TURN, 
                $SAT_CLOSE, 
                $SAT_CLOSE_7, 
                $SAT_CLOSE_14, 
                $SAT_CLOSE_21, 
                $SAT_CLOSE_30, 
                $SAT_CLOSE_OVR30, 
                $SKIPS, 
                $SKIP_RATIO, 
                $SKIP_RATIO_MONTH, 
                $REPOS, $ALIGN_PCT, 
                $NEWALIGN_PCT, 
                $AUTOPAY_PCT, 
                $NEW_AUTOPAY_PCT, 
                $AGR_LDW_PCT, 
                $AGR_CLUB_PCT, 
                $AGR_NEWCLUB_PCT, 
                $INV_PURCH_LW, 
                $INV_SOLD_LW, 
                $TOT_IDLE_INV, 
                $PCT_IDLE_USED, 
                $IDLE_OVER_45, 
                $IDLE_OVER_90, 
                $IDLE_OVER_180, 
                $PCTFREETIME, 
                $TOT_ADV_PAY, 
                $NEG_PYMT, 
                $AVG_ITEM_AGR, 
                $AVG_AGR_CUST, 
                $DUP_CUST, 
                $FREEDAYS, 
                $WK_PROMO_DOLLARS, 
                $WK_PROMO_CUSTS, 
                $PROMO_CUST_RENT_RATIO, 
                $WK_AVG_PROMO_CUST, 
                $AVG_WKS_TO_PO, 
                $PCT_WITH_INSPECTION, 
                $PCT_ESTIMATE, 
                $PCT_CONVERSION, 
                $PR_WK_SOR, 
                $CUR_WK_SOR, 
                $WK_SVC_PAYOFF, 
                $WK_SVC_SKIP, 
                $SVC_WK_REV, 
                $SVC_CASH_SALES, 
                $SVC_SAT_CLOSE, 
                $SVC_SAT_CLOSE_7, 
                $SVC_SAT_CLOSE_14, 
                $SVC_SAT_CLOSE_21, 
                $SVC_SAT_CLOSE_30, 
                $SVC_SAT_CLOSE_OVR30, 
                $NUMOVERRIDES, 
                $OVERRIDEAMT, 
                $NUMDISPOSED, 
                $NUMMISCEXP, 
                $MISCEXPAMOUNT, 
                $NUMMISCCLUB, 
                $TPMSCOUNTSALES, 
                $TPMSSALEAMT, 
                $NEW_AGR, 
                $AOR ) = $data;

            if (trim($STORENAME) != 'STORENAME') {

                $week = date("w");

                $year = date("Y");

                $store = explode(' ', $STORENAME);

                
                // $store_id = self::getStoreIdByStoreName($STORENAME);

                // echo count($store);
                //echo " / ";
                // echo $STORENAME;
                // print_r($store);
                // echo $store[count($store) - 1];
                // echo "<br />";

                $store_id = end($store);
                
                if (count($store) > 1 && $store_id > 0) {

                    

                    $cond = ['store_id' => $store_id, 'week_number' => $week];

                    echo $NEW_AGR;

                    $insert = [
                            'week_number' => $week,
                            'store_id' => $store_id,
                            'year' => $year,
                            //'STORENAME' => $STORENAME, 
                            //'MANAGER' => $MANAGER, 
                            'PR_WK_COR' => $PR_WK_COR, 
                            'CUR_WK_COR' => $CUR_WK_COR, 
                            'STRE_OPEN_DATE' => self::toMySql($STRE_OPEN_DATE), 
                            'WKS_OPEN' => $WKS_OPEN, 
                            'ANDER_EQUIV' => $ANDER_EQUIV, 
                            'ANDER_PCT_COMP' => $ANDER_PCT_COMP, 
                            'WK_PAY_OFF' => $WK_PAY_OFF, 
                            'CUST_RENT' => $CUST_RENT, 
                            'NEW_AGR' => (int)$NEW_AGR, 
                            'agr_total' => 0,
                            'CASH_SALES' => $CASH_SALES, 
                            'SERVICE_REVENUE' => $SERVICE_REVENUE, 
                            'PCT_MARGIN' => $PCT_MARGIN, 
                            'PCT_CUST_RENT' => $PCT_CUST_RENT, 
                            'PCT_CUST_RENT_YEAR' => $PCT_CUST_RENT_YEAR, 
                            'AVG_TURN' => $AVG_TURN, 
                            'SAT_CLOSE' => $SAT_CLOSE, 
                            'SAT_CLOSE_7' => $SAT_CLOSE_7, 
                            'SAT_CLOSE_14' => $SAT_CLOSE_14, 
                            'SAT_CLOSE_21' => $SAT_CLOSE_21, 
                            'SAT_CLOSE_30' => $SAT_CLOSE_30, 
                            'SAT_CLOSE_OVR30' => $SAT_CLOSE_OVR30, 
                            'SKIPS' => $SKIPS, 
                            'SKIP_RATIO' => $SKIP_RATIO, 
                            'SKIP_RATIO_MONTH' => $SKIP_RATIO_MONTH, 
                            'REPOS' => $REPOS, 
                            'ALIGN_PCT' => $ALIGN_PCT, 
                            'NEWALIGN_PCT' => $NEWALIGN_PCT, 
                            'AUTOPAY_PCT' => $AUTOPAY_PCT, 
                            'NEW_AUTOPAY_PCT' => $NEW_AUTOPAY_PCT, 
                            'AGR_LDW_PCT' => $AGR_LDW_PCT, 
                            'AGR_CLUB_PCT' => $AGR_CLUB_PCT, 
                            'AGR_NEWCLUB_PCT' => $AGR_NEWCLUB_PCT, 
                            'INV_PURCH_LW' => $INV_PURCH_LW, 
                            'INV_SOLD_LW' => $INV_SOLD_LW, 
                            'TOT_IDLE_INV' => $TOT_IDLE_INV, 
                            'PCT_IDLE_USED' => $PCT_IDLE_USED, 
                            'IDLE_OVER_45' => $IDLE_OVER_45, 
                            'IDLE_OVER_90' => $IDLE_OVER_90, 
                            'IDLE_OVER_180' => $IDLE_OVER_180, 
                            'PCTFREETIME' => $PCTFREETIME, 
                            'TOT_ADV_PAY' => $TOT_ADV_PAY, 
                            'NEG_PYMT' => $NEG_PYMT, 
                            'AVG_ITEM_AGR' => $AVG_ITEM_AGR, 
                            'AVG_AGR_CUST' => $AVG_AGR_CUST, 
                            'DUP_CUST' => $DUP_CUST, 
                            'FREEDAYS' => $FREEDAYS, 
                            'WK_PROMO_DOLLARS' => $WK_PROMO_DOLLARS, 
                            'WK_PROMO_CUSTS' => $WK_PROMO_CUSTS, 
                            'PROMO_CUST_RENT_RATIO' => $PROMO_CUST_RENT_RATIO, 
                            'WK_AVG_PROMO_CUST' => $WK_AVG_PROMO_CUST, 
                            'AVG_WKS_TO_PO' => $AVG_WKS_TO_PO, 
                            'PCT_WITH_INSPECTION' => $PCT_WITH_INSPECTION, 
                            'PCT_ESTIMATE' => $PCT_ESTIMATE, 
                            'PCT_CONVERSION' => $PCT_CONVERSION, 
                            'PR_WK_SOR' => $PR_WK_SOR, 
                            'CUR_WK_SOR' => $CUR_WK_SOR, 
                            'WK_SVC_PAYOFF' => $WK_SVC_PAYOFF, 
                            'WK_SVC_SKIP' => $WK_SVC_SKIP, 
                            'SVC_WK_REV' => $SVC_WK_REV, 
                            'SVC_CASH_SALES' => $SVC_CASH_SALES, 
                            'SVC_SAT_CLOSE' => $SVC_SAT_CLOSE, 
                            'SVC_SAT_CLOSE_7' => $SVC_SAT_CLOSE_7, 
                            'SVC_SAT_CLOSE_14' => $SVC_SAT_CLOSE_14, 
                            'SVC_SAT_CLOSE_21' => $SVC_SAT_CLOSE_21, 
                            'SVC_SAT_CLOSE_30' => $SVC_SAT_CLOSE_30, 
                            'SVC_SAT_CLOSE_OVR30' => $SVC_SAT_CLOSE_OVR30, 
                            'NUMOVERRIDES' => $NUMOVERRIDES, 
                            'OVERRIDEAMT' => $OVERRIDEAMT, 
                            'NUMDISPOSED' => $NUMDISPOSED, 
                            'NUMMISCEXP' => $NUMMISCEXP, 
                            'MISCEXPAMOUNT' => $MISCEXPAMOUNT, 
                            'NUMMISCCLUB' => $NUMMISCCLUB, 
                            'TPMSCOUNTSALES' => $TPMSCOUNTSALES, 
                            'TPMSSALEAMT' => $TPMSSALEAMT, 
                            //'NEW_AGR' => $NEW_AGR, 
                            'AOR' => $AOR 
                        ];

                    VitalStat::updateOrCreate($cond, $insert);

                }

            }
        }

        // return redirect()->route('importIndex');
    }

    /**
     * Display the specified resource.
     */
    private function getStoreIdByStoreName($storeName)
    {
        echo $storeName;

        DB::enableQueryLog();

        $store = Store::where(DB::raw('CONCAT(store_name, " ", store_id)'), '=',  $storeName)->first();

        var_dump(DB::getQueryLog());

        DB::disableQueryLog();

        if ($store) {

            return $store->store_id;

        } else {

            return 0;

        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function toMySql(string $date)
    {
        list($month, $day, $year) = explode('/', $date);

        return sprintf("%s-%02d-%02d", $year, $month, $day);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
