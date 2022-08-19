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
