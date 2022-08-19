<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Report') }}
        </h2>
    </x-slot>

    <x-slot name="script">
        <script>
            // AJAX DataTable
            var datatable = $('#crudTable').DataTable({
                ajax: {
                    url: '{!! url()->current() !!}',
                },
                
                columns: [
                    { data: 'id', name: 'id', width: '5%'},
                    { data: 'asset_id', name: 'asset_id' },
                    { data: 'periode', name: 'periode' },
                    { data: 'revenue_usd', name: 'revenue_usd' },
                    { data: 'rate_idr', name: 'rate_idr' },
                    { data: 'revenue_idr', name: 'revenue_idr' },
                    { data: 'label_revenue', name: 'label_revenue' },
                    { data: 'get_ugc', name: 'get_ugc' },
                    // { data: 'marketing', name: 'marketing' },
                    { data: 'share_revenue', name: 'share_revenue' },
                    { data: 'tax', name: 'tax' },
                    { data: 'final_revenue', name: 'final_revenue' },
                    { data: 'share', name: 'share' },
                    { data: 'ads', name: 'ads' },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        width: '25%'
                    },
                ],
            });
        </script>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8"> 
        {{-- mx-auto sm:px-6 lg:px-8"> --}}
            <div class="mb-10">
                <a href="{{ route('report.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    + Create Report
                </a>
            </div>
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <table id="crudTable">
                    <thead>
                    <tr>
                        <th>NO</th>
                        <th>ASSET ID</th>
                        <th>PERIODE</th>
                        <th>REVENUE USD</th>
                        <th>RATE IDR</th>
                        <th>REVENUE IDR</th>
                        <th>LABEL REVENUE</th>
                        <th>GET UGC</th>
                        {{-- <th>MARKETING</th> --}}
                        <th>SHARE REVENUE</th>
                        <th>TAX</th>
                        <th>FINAL REVENUE</th>
                        <th>SHARE</th>
                        <th>ADS</th>
                        <th>ACTION</th>
                    </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
            {{-- <div class="text-center mt-5">
                {{ $report->links() }}
            </div> --}}
        </div>
    </div>
</x-app-layout>
