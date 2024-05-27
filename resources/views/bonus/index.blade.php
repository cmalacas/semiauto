<x-app-layout>
    <x-slot name="header">
        
    

    </x-slot>

    

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div>
                        <select id="week" name="week" onChange="javascript:doSelect()">
                            <option value="0">--- select week ---</option>
                            @foreach($weeks as $week)
                                @if( $current_week == $week)
                                    <option selected value="{{ $week }}">{{ $week }}</option>
                                @else
                                    <option value="{{ $week }}">{{ $week }}</option>    
                                @endif
                            @endforeach
                        </select>
                        <select id="year" name="year" onChange="javascript:doSelect()">
                            <option value="0">--- select year ---</option>
                            @foreach($years as $year)
                                @if( $current_year == $year )
                                    <option selected value="{{ $year }}">{{ $year }}</option>
                                @else
                                    <option value="{{ $year }}">{{ $year }}</option>    
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="py-10">

                        {!! $table !!}

                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<link href="//cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="//cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>

<script>
    let table = new DataTable('#bonus-table');

    var APP_URL = "{!! env('APP_URL') !!}"

    function doSelect() {

        var week = document.getElementById('week').value;
        var year = document.getElementById('year').value;

        location = APP_URL + '/bonus-cacl/' + week + '/' + year;

    }

</script>