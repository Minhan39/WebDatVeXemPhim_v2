<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Services (Popcorn/Soda)') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between mb-4">
                        <div>
                            <a href="{{ route('popcorn-and-soda.create') }}" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Add Service</a>
                        </div>
                    </div>
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" id="i-table">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Image
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Country
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Description
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Price of Service
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#i-table').DataTable({
                data: @json($data),
                searchPanes: {
                    initCollapsed: true
                },
                columnDefs: [
                    {
                        searchPanes: {
                            show: true
                        },
                        targets: [1]
                    },
                    {orderable: false, targets: 4}
                ],
                dom: 'P<"flex flex-row justify-between"lf><rt><"flex flex-row justify-between"ip>',
                fixedColumns: true,
                columns: [
                    {
                        data: null,
                        render: function(data, type, row) {
                            return '<img src="/storage/' + row.image + '" class="h-20 w-20 object-cover rounded-lg" alt="Service Image">';
                        }
                    },
                    {data: 'country'},
                    {data: 'description'},
                    {
                        data: null,
                        render: function(data, type, row) {
                            return row.price.toLocaleString('pl-PL') + ' ' + row.unit;
                        }
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return '<a href="/popcorn-and-soda/' + row.id + '/edit" class="text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Edit</a><form action="/popcorn-and-soda/' + row.id + '" method="POST" class="inline">@csrf @method("DELETE") <button type="submit" onclick="return confirm(\'Are you sure you want to delete this service?\')" class="text-gray-900 bg-gradient-to-r from-teal-200 to-lime-200 hover:bg-gradient-to-l hover:from-teal-200 hover:to-lime-200 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-teal-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Delete</button></form>';
                        }
                    }
                ]
            });
            console.log(@json($data));
        });
    </script>
</x-app-layout>
