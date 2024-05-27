
<div class="relative overflow-x-auto">
    <table id="bonus-check-rule-table" class="table-auto w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase  dark:text-gray-400">
            <tr>

                @foreach( $cols as $c)

                <th scope="col" class="px-6 py-3">
                    {{ $c }}
                </th>

                @endforeach

                
            </tr>
        </thead>
        <tbody>
          @foreach( $rules as $r )

            <tr class="bg-white border-b ">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-dark">
                    {{ $r->emp_id }}
                </th>

                <td class="px-6 py-4">
                  {{ $r->employee_name }}
                </td>

                <td class="px-6 py-4">
                  {{ $r->store_id }}
                </td>

                <td class="px-6 py-4">
                  {{ $r->store_name }}
                </td>

                <td class="px-6 py-4">
                  {{ $r->bonus_type_id }}
                </td>

                <td class="px-6 py-4">
                  {{ $r->bonus_description }}
                </td>

                <td class="px-6 py-4">
                  {{ $r->leadership_bonus }}
                </td>

                <td class="px-6 py-4">
                  {{ $r->is_active == 1 ? 'Ye' : 'No' }}
                </td>

                
            </tr>

          @endforeach
        </tbody>

    </table>

</div>