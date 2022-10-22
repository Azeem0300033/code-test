<x-app-layout>
    <x-slot name="innerCss">
        <link rel="stylesheet" href="{{ asset('vendor/datatables/css/jquery.dataTables.min.css') }}">
    </x-slot>

    <div class="row">
        <div class="col-xl-12">

            <div class="card">
                <div class="container-fluid">
                    <x-include.title-bar :page-title="$pageTitle ?? null" ajax-form="ajaxForm('{{ route('item.create') }}','Add Item')"/>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table border-0" id="dataTable">
                                    <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Brand Name</th>
                                        <th scope="col">Model Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="ajaxModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div id="bodyAjax"></div>
            </div>
        </div>
    </div>

    <x-slot name="innerScript">
        <script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
        <script>
            $(document).ready(function () {
                $.fn.dataTable.ext.errMode = 'none';
                $('#dataTable').DataTable({
                    searching: false,
                    'processing': true,
                    'serverSide': true,
                    'serverMethod': 'get',
                    ajax: {
                        url: "{{ url('/item-fetch-ajax') }}",
                        type: "GET",
                    },
                    columns: [
                        {data: 'id'},
                        {data: 'name'},
                        {data: 'brand.name'},
                        {data: 'model_item.name'},
                        { render: function (data, type, row) {
                                return `
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0)" onclick="ajaxForm('item/`+row.id+`/edit','Edit Item')">Edit</a>
                                            <a class="dropdown-item" href="javascript:void(0)" onclick="globelDeleteFunction('item/`+row.id+`')">Delete</a>
                                        </div>
                                    </div>
                                `;
                            }
                        },
                    ]
                });
            });
        </script>
    </x-slot>
</x-app-layout>
