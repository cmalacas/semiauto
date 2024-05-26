<x-app-layout>
    <x-slot name="header">
        
    

    </x-slot>

    

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">                

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
</script>