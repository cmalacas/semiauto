

<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase">
            <tr>

                @foreach( $cols as $c)

                <th scope="col" class="px-6 py-3">
                    {{ $c }}
                </th>

                @endforeach

                
            </tr>
        </thead>
        <tbody>

            @foreach( $rows as $r)

            <tr class="bg-white border-b">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $r->store_id }}
                </th>
                <td class="px-6 py-4">
                    --
                </td>
                <td class="px-6 py-4">
                    {{ $r->PR_WK_COR }}
                </td>
                <td class="px-6 py-4">
                   {{ $r->CUR_WK_COR }}
                </td>

                <td>
                    {{
                        $r->STRE_OPEN_DATE
                        
                    }}
                </td>
                
                <td>
                    {{
                        $r->WKS_OPEN	
                
                    }}
                </td>
                <td>
                    {{
                        $r->ANDER_EQUIV		
                
            }}
        </td>
        <td>
            {{
                $r->ANDER_PCT_COMP		
                
            }}
        </td>
        <td>
            {{
                $r->WK_PAY_OFF			
                
            }}
        </td>
        <td>
            {{
                $r->CUST_RENT			
                
            }}
        </td>
        <td>
            {{
                $r->NEW_AGR			
                
            }}
        </td>
        <td>
            {{
                $r->CASH_SALES			
                
            }}
        </td>
        <td>
            {{
                $r->SERVICE_REVENUE			
                
            }}
        </td>
        <td>
            {{
                $r->PCT_MARGIN			
                
            }}
        </td>
        <td>
            {{
                $r->PCT_CUST_RENT			
                
            }}
        </td>
        <td>
            {{
                $r->PCT_CUST_RENT_YEAR			
                
            }}
        </td>
        <td>
            {{
                $r->AVG_TURN			
                
            }}
        </td>
        <td>
            {{
                $r->SAT_CLOSE			
                
            }}
        </td>
        <td>
            {{
                $r->SAT_CLOSE_7			
                
            }}
        </td>
        <td>
            {{
                $r->SAT_CLOSE_14			
                
            }}
        </td>
        <td>
            {{
                $r->SAT_CLOSE_21			
                
            }}
        </td>
        <td>
            {{
                $r->SAT_CLOSE_30			
                
            }}
        </td>
        <td>
            {{
                $r->SAT_CLOSE_OVR30			
                
            }}
        </td>
        <td>
            {{
                $r->SKIPS			
                
            }}
        </td>
        <td>
            {{
                $r->SKIP_RATIO			
                
            }}
        </td>
        <td>
            {{
                $r->SKIP_RATIO_MONTH			
                
            }}
        </td>
        <td>
            {{
                $r->REPOS			
                
            }}
        </td>
        <td>
            {{
                $r->ALIGN_PCT			
                
            }}
        </td>
        <td>
            {{
                $r->NEWALIGN_PCT			
                
            }}
        </td>
        <td>
            {{
                $r->AUTOPAY_PCT			
                
            }}
        </td>
        <td>
            {{
                $r->NEW_AUTOPAY_PCT			
                
            }}
        </td>
        <td>
            {{
                $r->AGR_LDW_PCT			
                
            }}
        </td>
        <td>
            {{
                $r->AGR_CLUB_PCT			
                
            }}
        </td>
        <td>
            {{
                $r->AGR_NEWCLUB_PCT			
                
            }}
        </td>
        <td>
            {{
                $r->INV_PURCH_LW			
                
            }}
        </td>
        <td>
            {{
                $r->INV_SOLD_LW			
                
            }}
        </td>
        <td>
            {{
                $r->TOT_IDLE_INV			
                
            }}
        </td>
        <td>
            {{
                $r->PCT_IDLE_USED			
                
            }}
        </td>
        <td>
            {{
                $r->IDLE_OVER_45			
                
            }}
        </td>
        <td>
            {{
                $r->IDLE_OVER_90			
                
            }}
        </td>
        <td>
            {{
                $r->IDLE_OVER_180			
                
            }}
        </td>
        <td>
            {{
                $r->PCTFREETIME			
                
            }}
        </td>
        <td>
            {{
                $r->TOT_ADV_PAY			
                
            }}
        </td>
        <td>
            {{
                $r->NEG_PYMT			
                
            }}
        </td>
        <td>
            {{
                $r->AVG_ITEM_AGR			
                
            }}
        </td>
        <td>
            {{
                $r->AVG_AGR_CUST			
                
            }}
        </td>
        <td>
            {{
                $r->DUP_CUST			
                
            }}
        </td>
        <td>
            {{
                $r->FREEDAYS			
                
            }}
        </td>
        <td>
            {{
                $r->WK_PROMO_DOLLARS			
                
            }}
        </td>
        <td>
            {{
                $r->WK_PROMO_CUSTS			
                
            }}
        </td>
        <td>
            {{
                $r->PROMO_CUST_RENT_RATIO			
                
            }}
        </td>
        <td>
            {{
                $r->WK_AVG_PROMO_CUST			
                
            }}
        </td>
        <td>
            {{
                $r->AVG_WKS_TO_PO			
                
            }}
        </td>
        <td>
            {{
                $r->PCT_WITH_INSPECTION			
                
            }}
        </td>
        <td>
            {{
                $r->PCT_ESTIMATE			
                
            }}
        </td>
        <td>
            {{
                $r->PCT_CONVERSION			
                
            }}
        </td>
        <td>
            {{
                $r->PR_WK_SOR		
                
            }}
        </td>
        <td>
            {{
                $r->CUR_WK_SOR	
                
            }}
        </td>
        <td>
            {{
                $r->wK_SVC_PAYOFF			
                
            }}
        </td>
        <td>
            {{
                $r->WK_SVC_SKIP			
                
            }}
        </td>
        <td>
            {{
                $r->SVC_WK_REV			
                
            }}
        </td>
        <td>
            {{
                $r->SVC_CASH_SALES			
                
            }}
        </td>
        <td>
            {{
                $r->SVC_SAT_CLOSE			
                
            }}
        </td>
        <td>
            {{
                $r->SVC_SAT_CLOSE_7			
                
            }}
        </td>
        <td>
            {{
                $r->SVC_SAT_CLOSE_14			
                
            }}
        </td>
        <td>
            {{
                $r->SVC_SAT_CLOSE_21			
                
            }}
        </td>
        <td>
            {{
                $r->SVC_SAT_CLOSE_30			
                
            }}
        </td>
        <td>
            {{
                $r->SVC_SAT_CLOSE_OVR30			
                
            }}
        </td>
        <td>
            {{
                $r->NUMOVERRIDES			
                
            }}
        </td>
        <td>
            {{
                $r->OVERRIDEAMT			
                
            }}
        </td>
        <td>
            {{
                $r->NUMDISPOSED			
                
            }}
        </td>
        <td>
            {{
                $r->NUMMISCEXP			
                
            }}
        </td>
        <td>
            {{
                $r->MISCEXPAMOUNT			
                
            }}
        </td>
        <td>
            {{
                $r->NUMMISCCLUB			
                
            }}
        </td>
        <td>
            {{
                $r->TPMSCOUNTSALES			
                
            }}
        </td>
        <td>
            {{
                $r->TPMSSALEAMT			
                
            }}
        </td>
        <td>
            {{
                $r->NEW_AGR			
                
            }}
        </td>
        <td>
            {{
                $r->AOR		
                
            }}
        </td>
            </tr>

            @endforeach
            
        </tbody>
    </table>
</div>
