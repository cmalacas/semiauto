<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('vital_stats', function (Blueprint $table) {
            $table->integer('PR_WK_COR')->default(0)->nullable();            
            $table->integer('CUR_WK_COR')->default(0)->nullable();            
            $table->date('STRE_OPEN_DATE')->nullable();            
            $table->integer('WKS_OPEN')->default(0)->nullable();            
            $table->integer('ANDER_EQUIV')->default(0)->nullable();            
            $table->integer('ANDER_PCT_COMP')->default(0)->nullable();            
            $table->integer('WK_PAY_OFF')->default(0)->nullable();            
            // $table->integer('CUST_RENT')->default(0)->nullable();            
            // $table->integer('NEW_AGR')->default(0)->nullable();            
            $table->float('CASH_SALES')->default(0)->nullable();            
            $table->integer('SERVICE_REVENUE')->default(0)->nullable();            
            $table->integer('PCT_MARGIN')->default(0)->nullable();            
            $table->integer('PCT_CUST_RENT')->default(0)->nullable();            
            $table->integer('PCT_CUST_RENT_YEAR')->default(0)->nullable();            
            $table->float('AVG_TURN')->default(0)->nullable();            
            // $table->float('SAT_CLOSE')->default(0)->nullable();            
            $table->float('SAT_CLOSE_7')->default(0)->nullable();            
            $table->float('SAT_CLOSE_14')->default(0)->nullable();            
            $table->float('SAT_CLOSE_21')->default(0)->nullable();            
            $table->float('SAT_CLOSE_30')->default(0)->nullable();            
            $table->float('SAT_CLOSE_OVR30')->default(0)->nullable();            
            $table->integer('SKIPS')->default(0)->nullable();            
            $table->float('SKIP_RATIO')->default(0)->nullable();            
            $table->float('SKIP_RATIO_MONTH')->default(0)->nullable();            
            $table->integer('REPOS')->default(0)->nullable();            
            $table->float('ALIGN_PCT')->default(0)->nullable();            
            $table->float('NEWALIGN_PCT')->default(0)->nullable();            
            // $table->float('AUTOPAY_PCT')->default(0)->nullable();            
            $table->float('NEW_AUTOPAY_PCT')->default(0)->nullable();            
            $table->float('AGR_LDW_PCT')->default(0)->nullable();            
            $table->float('AGR_CLUB_PCT')->default(0)->nullable();            
            // $table->integer('AGR_NEWCLUB_PCT')->default(0)->nullable();            
            $table->float('INV_PURCH_LW')->default(0)->nullable();            
            $table->float('INV_SOLD_LW')->default(0)->nullable();            
            $table->float('TOT_IDLE_INV')->default(0)->nullable();            
            $table->float('PCT_IDLE_USED')->default(0)->nullable();            
            $table->float('IDLE_OVER_45')->default(0)->nullable();            
            $table->float('IDLE_OVER_90')->default(0)->nullable();            
            $table->float('IDLE_OVER_180')->default(0)->nullable();            
            $table->float('PCTFREETIME')->default(0)->nullable();            
            $table->float('TOT_ADV_PAY')->default(0)->nullable();            
            $table->float('NEG_PYMT')->default(0)->nullable();            
            $table->float('AVG_ITEM_AGR')->default(0)->nullable();            
            $table->float('AVG_AGR_CUST')->default(0)->nullable();            
            $table->integer('DUP_CUST')->default(0)->nullable();            
            $table->integer('FREEDAYS')->default(0)->nullable();            
            $table->integer('WK_PROMO_DOLLARS')->default(0)->nullable();            
            $table->integer('WK_PROMO_CUSTS')->default(0)->nullable();            
            $table->integer('PROMO_CUST_RENT_RATIO')->default(0)->nullable();            
            $table->integer('WK_AVG_PROMO_CUST')->default(0)->nullable();            
            $table->integer('AVG_WKS_TO_PO')->default(0)->nullable();            
            $table->integer('PCT_WITH_INSPECTION')->default(0)->nullable();            
            $table->integer('PCT_ESTIMATE')->default(0)->nullable();            
            $table->integer('PCT_CONVERSION')->default(0)->nullable();            
            $table->integer('PR_WK_SOR')->default(0)->nullable();            
            $table->integer('CUR_WK_SOR')->default(0)->nullable();            
            $table->integer('WK_SVC_PAYOFF')->default(0)->nullable();            
            $table->integer('WK_SVC_SKIP')->default(0)->nullable();            
            $table->float('SVC_WK_REV')->default(0)->nullable();            
            $table->float('SVC_CASH_SALES')->default(0)->nullable();            
            $table->float('SVC_SAT_CLOSE')->default(0)->nullable();            
            $table->float('SVC_SAT_CLOSE_7')->default(0)->nullable();            
            $table->float('SVC_SAT_CLOSE_14')->default(0)->nullable();            
            $table->float('SVC_SAT_CLOSE_21')->default(0)->nullable();            
            $table->float('SVC_SAT_CLOSE_30')->default(0)->nullable();            
            $table->float('SVC_SAT_CLOSE_OVR30')->default(0)->nullable();            
            $table->float('NUMOVERRIDES')->default(0)->nullable();            
            $table->float('OVERRIDEAMT')->default(0)->nullable();            
            $table->integer('NUMDISPOSED')->default(0)->nullable();            
            $table->integer('NUMMISCEXP')->default(0)->nullable();            
            $table->float('MISCEXPAMOUNT')->default(0)->nullable();            
            $table->integer('NUMMISCCLUB')->default(0)->nullable();            
            $table->integer('TPMSCOUNTSALES')->default(0)->nullable();            
            $table->float('TPMSSALEAMT')->default(0)->nullable();            
            $table->integer('AOR')->default(0)->nullable();            
        });
    }

    					

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
