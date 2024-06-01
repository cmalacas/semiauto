<div class="relative overflow-x-auto">
    <table id="bonus-table" class="table-auto w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase  dark:text-gray-400">
            @php

                $today = \Carbon\Carbon::now();

            @endphp
            <tr>
                <th>Start Date</th>
                @for( $w = $minWeek; $w <= $maxWeek; $w++)
                <th>{{ $today->week($w)->startOfWeek()->format("m/d/Y") }}</th>
                @endfor
            </tr>
            <tr>
                <th>End Date</th>
                @for( $w = $minWeek; $w <= $maxWeek; $w++)
                <th>{{ $today->week($w)->endOfWeek()->format("m/d/Y") }}</th>
                @endfor
            </tr>
            <tr>
                <th>Working Days</th>
                @for( $w = $minWeek; $w <= $maxWeek; $w++)
                <th>6</th>
                @endfor
            </tr>
            <tr>
                <th>Week Number</th>
                @for( $w = $minWeek; $w <= $maxWeek; $w++)
                <th>{{ $w }}</th>
                @endfor
            </tr>
        </thead>
        <tbody>
            @foreach( $states as $st)
            <tr>
                <td>{{ $st->state_name }}</td>
                @for( $w = $minWeek; $w <= $maxWeek; $w++)
                <td></td>
                @endfor
            </tr>
            <tr>
                <td>Leadership</td>
                @for( $w = $minWeek; $w <= $maxWeek; $w++)
                <td>{{ App\Models\BonusCalc::getTotalLeadershipBonus( $w, $year, $st->state ) }}</td>
                @endfor
            </tr>
            <tr>
                <td>Manager</td>
                @for( $w = $minWeek; $w <= $maxWeek; $w++)
                <td>{{ App\Models\BonusCalc::getTotalManagerBonus( $w, $year, $st->state ) }}</td>
                @endfor
            </tr>
            <tr>
                <td>Sales</td>
                @for( $w = $minWeek; $w <= $maxWeek; $w++)
                <td>{{ App\Models\BonusCalc::getTotalSalesBonus( $w, $year, $st->state ) }}</td>
                @endfor
            </tr>
            <tr>
                <td>Tech</td>
                @for( $w = $minWeek; $w <= $maxWeek; $w++)
                <td>{{ App\Models\BonusCalc::getTotalTechBonus( $w, $year , $st->state) }}</td>
                @endfor
            </tr>
            <tr>
                <td>Collections</td>
                @for( $w = $minWeek; $w <= $maxWeek; $w++)
                <td>{{ App\Models\BonusCalc::getTotalCollectionBonus( $w, $year, $st->state ) }}</td>
                @endfor
            </tr>
            <tr>
                <td>Total</td>
                @for( $w = $minWeek; $w <= $maxWeek; $w++)
                <td>{{ App\Models\BonusCalc::getTotalBonus( $w, $year, $st->state )}}</td>
                @endfor
            </tr>
            @endforeach
        </tbody>
    </table>
</div>