<x-app-layout>
    <x-slot name="header">
        
    

    </x-slot>

    

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="flex justify-between py-6">

                        <div>

                            <select id="week" name="week" onChange="javascript:doSelect()">
                                <option value="0">-- select week -- </option>
                                @foreach($weeks as $w)
                                    @if ($w == $week)
                                        <option selected value="{{ $w }}">{{ $w }}</option>
                                    @else 
                                        <option value="{{ $w }}">{{ $w }}</option>
                                    @endif
                                @endforeach
                            </select>

                            <select id="year" name="year" onChange="javascript:doSelect()">
                                <option value="0">-- select year -- </option>
                                @foreach($years as $y)
                                    @if ($y == $year)
                                        <option selected value="{{ $y }}">{{ $y }}</option>
                                    @else 
                                        <option value="{{ $y }}">{{ $y }}</option>
                                    @endif
                                @endforeach
                            </select>

                        </div>

                        <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="number" name="week" value="{{ $week }}" />
                            <input type="text" name="year" value="{{ $year }}" />
                            <input type="file" name="file" accept=".csv">
                            <button type="submit">Import CSV</button>
                        </form>

                        

                    </div>

                    <div class="pt-2">

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
    let table = new DataTable('#vital-stat-table');

    function doSelect() {

        var week = document.getElementById('week').value;
        var year = document.getElementById('year').value;

        var app_url = "{{ env('APP_URL') }}";

        location = app_url + '/import/' + week + '/' + year;

    }

</script>

