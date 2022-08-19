<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Asset') }}
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
                    { data: 'user_id', name: 'user_id' },
                    { data: 'url_video', name: 'url_video' },
                    { data: 'video_name', name: 'video_name' },
                    { data: 'channel_name', name: 'channel_name' },
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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-10">
                <a href="{{ route('asset.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    + Create Asset
                </a>
            </div>
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <table id="crudTable">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>USER ID</th>
                        <th>URL VIDEO</th>
                        <th>VIDEO NAME</th>
                        <th>CHANNEL NAME</th>
                        <th>ACTION</th>
                    </tr>
                    </thead>
                    <tbody>
                        {{-- @forelse($asset as $item)
                            <tr>
                                <td class="border px-6 py-4">{{ $item->id }}</td>
                                <td class="border px-6 py-4 ">{{ $item->user_id }}</td>
                                <td class="border px-6 py-4">{{ $item->url_video }}</td>
                                <td class="border px-6 py-4">{{ $item->video_name }}</td>
                                <td class="border px-6 py-4">{{ $item->channel_name }}</td>
                                <td class="border px-6 py- text-center">
                                    <a href="{{ route('asset.edit', $item->id) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mx-2 rounded">
                                        Edit
                                    </a>
                                    <form action="{{ route('asset.destroy', $item->id) }}" method="POST" class="inline-block">
                                        {!! method_field('delete') . csrf_field() !!}
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mx-2 rounded inline-block">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                               <td colspan="6" class="border text-center p-5">
                                   Data Tidak Ditemukan
                               </td>
                            </tr>
                        @endforelse --}}
                    </tbody>
                </table>
            </div>
        </div>
            {{-- <div class="text-center mt-5">
                {{ $asset->links() }}
            </div> --}}
        </div>
    </div>
</x-app-layout>
