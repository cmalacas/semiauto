<x-app-layout>
    <x-slot name="header">
        
    

    </x-slot>

    

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                

                  <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="number" name="week" value="{{ $week }}" />
                    <input type="text" name="year" value="{{ $year }}" />
                    <input type="file" name="file" accept=".csv">
                    <button type="submit">Import CSV</button>
                  </form>

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
    let table = new DataTable('#vital-stat-table');
</script>

