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