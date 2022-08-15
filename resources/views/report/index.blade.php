<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Report') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-10">
                <a href="{{ route('report.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    + Create Report
                </a>
            </div>
            <div class="bg-white">
                <table class="table-auto w-full">
                    <thead>
                    <tr>
                        <th class="border px-6 py-4">NO</th>
                        <th class="border px-6 py-4">ASSET ID</th>
                        <th class="border px-6 py-4">PERIODE</th>
                        <th class="border px-6 py-4">REVENUE USD</th>
                        <th class="border px-6 py-4">RATE IDR</th>
                        <th class="border px-6 py-4">REVENUE IDR</th>
                        <th class="border px-6 py-4">LABEL REVENUE</th>
                        <th class="border px-6 py-4">GET UGC</th>
                        <th class="border px-6 py-4">MARKETING</th>
                        <th class="border px-6 py-4">SHARE REVENUE</th>
                        <th class="border px-6 py-4">TAX</th>
                        <th class="border px-6 py-4">FINAL REVENUE</th>
                        <th class="border px-6 py-4">SHARE</th>
                        <th class="border px-6 py-4">ADS</th>
                        <th class="border px-6 py-4">ACTION</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($report as $item)
                        
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
                           
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-5">
                {{ $report->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
