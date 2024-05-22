<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   <table>
                        <thead>
                            <tr>
                                <th>Employee </th>
                                <th>Week</th>
                                <th>Bonus Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bonuses as $e)
                            <tr>
                                <td>{{ $e->name }}</td>
                                <td>{{ $e->week_id }}</td>
                                <td>{{ $e->bonus_total }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

