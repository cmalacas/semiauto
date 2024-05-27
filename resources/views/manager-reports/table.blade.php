<div class="relative overflow-x-auto">
    <table id="manager-report-table" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
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
          @foreach( $reports as $r )

            <tr class="bg-white border-b">

              <th class="px-6 py-4">{{ $r->store_id }}</th>

              <th class="px-6 py-4">{{ $r->store_name }}</th>

              <td class="px-6 py-4">{{ $r->week }}</td>

              <td class="px-6 py-4">{{ $r->emp_id }}</td>

              <th class="px-6 py-4">{{ $r->employee_name }}</th>

              <td class="px-6 py-4">{{ $r->days }}</td>

              <td class="px-6 py-4">{{ $r->units }}</td>

            </tr>

          @endforeach
      </tbody>
    </table>
</div>