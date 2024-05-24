
<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
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
          @foreach( $bonuses as $b )

            <tr class="bg-white border-b ">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-dark">
                    {{ $b->emp_id }}
                </th>

                <td class="px-6 py-4">
                  {{ $b->store_id }}
                </td>

                <td class="px-6 py-4">
                  {{ $b->week_id }}
                </td>

                <td class="px-6 py-4">
                  {{ $b->bonus_sales }}
                </td>

                <td class="px-6 py-4">
                  {{ $b->bonus_sales_mgr }}
                </td>

                <td class="px-6 py-4">
                  {{ $b->bonus_tech }}
                </td>

                <td class="px-6 py-4">
                  {{ $b->bonus_collections }}
                </td>

                <td class="px-6 py-4">
                  {{ $b->bonus_store_mgr }}
                </td>

                <td class="px-6 py-4">
                  {{ $b->bonus_service }}
                </td>

                <td class="px-6 py-4">
                  {{ $b->bonus_leadership }}
                </td>

                <td class="px-6 py-4">
                  {{ $b->bonus_one_time }}
                </td>

                <td class="px-6 py-4">
                  {{ $b->bonus_total }}
                </td>
            </tr>

          @endforeach
        </tbody>

    </table>

</div>