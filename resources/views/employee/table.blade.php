

<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>

                @foreach( $cols as $c)

                <th scope="col" class="px-6 py-3">
                    {{ $c }}
                </th>

                @endforeach

                
            </tr>
        </thead>
        <tbody>

            @foreach( $employees as $e)

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $e->emp_id }}
                </th>
                <td class="px-6 py-4">
                    {{ $e->last_name }}
                </td>

                <td class="px-6 py-4">
                    {{ $e->first_name }}
                </td>

                <td class="px-6 py-4">
                    {{ $e->email }}
                </td>

                <td class="px-6 py-4">
                    {{ $e->work_email }}
                </td>

                <td class="px-6 py-4">
                    {{ $e->pay_method_code }}
                </td>

                <td class="px-6 py-4">
                    {{ $e->hourly_rate }}
                </td>

                <td class="px-6 py-4">
                    {{ $e->standard_hours }}
                </td>

                <td class="px-6 py-4">
                    {{ $e->annual_rate }}
                </td>

                <td class="px-6 py-4">
                    {{ $e->emp_type_code }}
                </td>

                <td class="px-6 py-4">
                    {{ $e->home_phone_number }}
                </td>

                <td class="px-6 py-4">
                    {{ $e->is_exempt }}
                </td>

                <td class="px-6 py-4">
                    {{ $e->client_legal_name }}
                </td>

                <td class="px-6 py-4">
                    {{ $e->eeo_job_class_code }}
                </td>

                <td class="px-6 py-4">
                    {{ $e->status_date }}
                </td>

                <td class="px-6 py-4">
                    {{ $e->last_hire_date }}
                </td>

                <td class="px-6 py-4">
                    {{ $e->original_hire_date }}
                </td>

                <td class="px-6 py-4">
                    {{ $e->seniority_date }}
                </td>

                <td class="px-6 py-4">
                    {{ $e->termination_date }}
                </td>

                <td class="px-6 py-4">
                    {{ $e->is_active }}
                </td>
            
            </tr>

            @endforeach
            
        </tbody>
    </table>
</div>
