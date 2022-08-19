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
                        {{-- @forelse($report as $item)
                        
                            <tr>
                                <td class="border px-6 py-4">{{ $item->id}}</td>
                                <td class="border px-6 py-4 ">{{ $item->asset_id }}</td>
                                <td class="border px-6 py-4">{{ $item->periode }}</td>
                                <td class="border px-6 py-4">{{  number_format($item->revenue_usd) }}</td>
                                <td class="border px-6 py-4">{{  number_format($item->rate_idr) }}</td>
                                <td class="border px-6 py-4">{{  number_format($item->revenue_idr) }}</td>
                                <td class="border px-6 py-4">{{  number_format($item->label_revenue) }}</td>
                                <td class="border px-6 py-4">{{  number_format($item->get_ugc) }}</td>
                                <td class="border px-6 py-4">{{  number_format($item->marketing) }}</td>
                                <td class="border px-6 py-4">{{  number_format($item->share_revenue) }}</td>
                                <td class="border px-6 py-4">{{  number_format($item->tax) }}</td>
                                <td class="border px-6 py-4">{{  number_format($item->final_revenue) }}</td>
                                <td class="border px-6 py-4">{{  number_format($item->share) }}</td>
                                <td class="border px-6 py-4">{{  number_format($item->ads) }}</td>

                                <td class="border px-6 py- text-center">
                                    <a href="{{ route('report.edit', $item->id) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mx-2 rounded">
                                        Edit
                                    </a>
                                    <form action="{{ route('report.destroy', $item->id) }}" method="POST" class="inline-block">
                                        {!! method_field('delete') . csrf_field() !!}
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mx-2 rounded inline-block">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                               <td colspan="15" class="border text-center p-5">
                                   Data Tidak Ditemukan
                               </td>
                            </tr>
                           
                        @endforelse --}}
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
