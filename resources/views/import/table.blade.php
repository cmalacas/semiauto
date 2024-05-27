

<div class="relative overflow-x-auto">
    <table id="vital-stat-table" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
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
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-dark">
                    {{ $r->store_name }}
                </th>
                <td class="px-6 py-4">
                    {{ $r->MANAGER }}
                </td>
                <td class="px-6 py-4">
                    {{ $r->PR_WK_COR }}
                </td>
                <td class="px-6 py-4">
                   {{ $r->CUR_WK_COR }}
                </td>

                <td class="px-6 py-4">
                    {{
                        $r->STRE_OPEN_DATE
                        
                    }}
                </td>
                
                <td class="px-6 py-4">
                    {{
                        $r->WKS_OPEN	
                
                    }}
                </td>
                <td class="px-6 py-4">
                    {{
                        $r->ANDER_EQUIV		
                
                    }}
                </td class="px-6 py-4">
                <td>
                    {{
                        $r->ANDER_PCT_COMP		
                        
                    }}
                </td>
                <td class="px-6 py-4">
                    {{
                        $r->WK_PAY_OFF			
                        
                    }}
                </td>
                <td class="px-6 py-4">
                    {{
                        $r->cust_rent
                        
                    }}
                </td>
                <td class="px-6 py-4">
                    {{
                        $r->new_agr
                        
                    }}
                </td>
                <td class="px-6 py-4">
                    {{
                        $r->CASH_SALES			
                        
                    }}
                </td>
                <td class="px-6 py-4">
                    {{
                        $r->SERVICE_REVENUE			
                        
                    }}
                </td>
                <td class="px-6 py-4">
                    {{
                        $r->PCT_MARGIN			
                        
                    }}
                </td>
                <td class="px-6 py-4">
                    {{
                        $r->PCT_CUST_RENT			
                        
                    }}
                </td>
                <td class="px-6 py-4">
                    {{
                        $r->PCT_CUST_RENT_YEAR			
                        
                    }}
                </td>
                <td class="px-6 py-4">
                    {{
                        $r->AVG_TURN			
                        
                    }}
                </td>
                <td class="px-6 py-4">
                    {{
                        $r->SAT_CLOSE			
                        
                    }}
                </td>
                <td>
                    {{
                        $r->SAT_CLOSE_7			
                        
                    }}
                </td>
                <td class="px-6 py-4">
                    {{
                        $r->SAT_CLOSE_14			
                        
                    }}
                </td>
                <td class="px-6 py-4">
                    {{
                        $r->SAT_CLOSE_21			
                        
                    }}
                </td>
                <td class="px-6 py-4">
                    {{
                        $r->SAT_CLOSE_30			
                        
                    }}
                </td>
                <td class="px-6 py-4">
                    {{
                        $r->SAT_CLOSE_OVR30			
                        
                    }}
                </td>
                <td class="px-6 py-4">
                    {{
                        $r->SKIPS			
                        
                    }}
                </td>
                <td class="px-6 py-4">
                    {{
                        $r->SKIP_RATIO			
                        
                    }}
                </td>
                <td class="px-6 py-4">
                    {{
                        $r->SKIP_RATIO_MONTH			
                        
                    }}
                </td>
                <td class="px-6 py-4">
                    {{
                        $r->REPOS			
                        
                    }}
                </td>
                <td class="px-6 py-4">
                    {{
                        $r->ALIGN_PCT			
                        
                    }}
                </td>
                <td class="px-6 py-4">
                    {{
                        $r->NEWALIGN_PCT			
                        
                    }}
                </td>
                <td class="px-6 py-4">
                    {{
                        $r->autopay_pct
                        
                    }}
                </td>
                <td class="px-6 py-4">
                    {{
                        $r->NEW_AUTOPAY_PCT			
                        
                    }}
                </td>
                <td class="px-6 py-4">
                    {{
                        $r->AGR_LDW_PCT			
                        
                    }}
                </td>
                <td class="px-6 py-4">
                    {{
                        $r->AGR_CLUB_PCT			
                        
                    }}
                </td>
                <td class="px-6 py-4">
                    {{
                        $r->agr_newclub_pct
                        
                    }}
                </td>
                <td class="px-6 py-4">
                    {{
                        $r->INV_PURCH_LW			
                        
                    }}
                </td>
                <td class="px-6 py-4">
                    {{
                        $r->INV_SOLD_LW			
                        
                    }}
                </td>
                <td class="px-6 py-4">
                    {{
                        $r->TOT_IDLE_INV			
                        
                    }}
                </td>
                <td class="px-6 py-4">
                    {{
                        $r->PCT_IDLE_USED			
                        
                    }}
                </td>
                <td class="px-6 py-4">
                    {{
                        $r->IDLE_OVER_45			
                        
                    }}
                </td>
                <td class="px-6 py-4">
                    {{
                        $r->IDLE_OVER_90			
                        
                    }}
                </td>
                <td class="px-6 py-4">
                    {{
                        $r->IDLE_OVER_180			
                        
                    }}
                </td>
                <td class="px-6 py-4">
                    {{
                        $r->PCTFREETIME			
                        
                    }}
                </td>
                <td class="px-6 py-4">
                    {{
                        $r->TOT_ADV_PAY			
                        
                    }}
                </td>
                <td class="px-6 py-4">
                    {{
                        $r->NEG_PYMT			
                        
                    }}
                </td>
                <td class="px-6 py-4">
                    {{
                        $r->AVG_ITEM_AGR			
                        
                    }}
                </td>
                <td class="px-6 py-4">
                    {{
                        $r->AVG_AGR_CUST			
                        
                    }}
                </td>
                <td class="px-6 py-4">
                    {{
                        $r->DUP_CUST			
                        
                    }}
                </td>
                <td class="px-6 py-4">
                    {{
                        $r->FREEDAYS			
                        
                    }}
                </td>
                <td class="px-6 py-4">
                    {{
                        $r->WK_PROMO_DOLLARS			
                        
                    }}
                </td>
                <td class="px-6 py-4">
                    {{
                        $r->WK_PROMO_CUSTS			
                        
                    }}
                </td>
                <td class="px-6 py-4">
                    {{
                        $r->PROMO_CUST_RENT_RATIO			
                        
                    }}
                </td>
                <td class="px-6 py-4">
                    {{
                        $r->WK_AVG_PROMO_CUST			
                        
                    }}
                </td>
        <td class="px-6 py-4">
            {{
                $r->AVG_WKS_TO_PO			
                
            }}
        </td>
        <td class="px-6 py-4">
            {{
                $r->PCT_WITH_INSPECTION			
                
            }}
        </td>
        <td class="px-6 py-4">
            {{
                $r->PCT_ESTIMATE			
                
            }}
        </td>
        <td class="px-6 py-4">
            {{
                $r->PCT_CONVERSION			
                
            }}
        </td>
        <td class="px-6 py-4">
            {{
                $r->PR_WK_SOR		
                
            }}
        </td>
        <td class="px-6 py-4">
            {{
                $r->CUR_WK_SOR	
                
            }}
        </td>
        <td class="px-6 py-4">
            {{
                $r->WK_SVC_PAYOFF			
                
            }}
        </td>
        <td class="px-6 py-4">
            {{
                $r->WK_SVC_SKIP			
                
            }}
        </td>
        <td class="px-6 py-4">
            {{
                $r->SVC_WK_REV			
                
            }}
        </td>
        <td class="px-6 py-4">
            {{
                $r->SVC_CASH_SALES			
                
            }}
        </td>
        <td class="px-6 py-4">
            {{
                $r->SVC_SAT_CLOSE			
                
            }}
        </td>
        <td class="px-6 py-4">
            {{
                $r->SVC_SAT_CLOSE_7			
                
            }}
        </td>
        <td class="px-6 py-4">
            {{
                $r->SVC_SAT_CLOSE_14			
                
            }}
        </td>
        <td class="px-6 py-4">
            {{
                $r->SVC_SAT_CLOSE_21			
                
            }}
        </td>
        <td class="px-6 py-4">
            {{
                $r->SVC_SAT_CLOSE_30			
                
            }}
        </td>
        <td class="px-6 py-4">
            {{
                $r->SVC_SAT_CLOSE_OVR30			
                
            }}
        </td>
        <td class="px-6 py-4">
            {{
                $r->NUMOVERRIDES			
                
            }}
        </td>
        <td class="px-6 py-4">
            {{
                $r->OVERRIDEAMT			
                
            }}
        </td>
        <td class="px-6 py-4">
            {{
                $r->NUMDISPOSED			
                
            }}
        </td>
        <td class="px-6 py-4">
            {{
                $r->NUMMISCEXP			
                
            }}
        </td>
        <td class="px-6 py-4">
            {{
                $r->MISCEXPAMOUNT			
                
            }}
        </td>
        <td class="px-6 py-4">
            {{
                $r->NUMMISCCLUB			
                
            }}
        </td>
        <td class="px-6 py-4">
            {{
                $r->TPMSCOUNTSALES			
                
            }}
        </td>
        <td class="px-6 py-4">
            {{
                $r->TPMSSALEAMT			
                
            }}
        </td>
        <td class="px-6 py-4">
            {{
                $r->new_agr
                
            }}
        </td>
                <td class="px-6 py-4">
                    {{
                        $r->AOR		
                        
                    }}
                </td>
            </tr>

            @endforeach
            
        </tbody>
    </table>
</div>
