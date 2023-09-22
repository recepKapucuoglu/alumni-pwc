@extends("admin.layouts.app")
@section("title", $hobby->hobby_title)
@section("content")
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">{{ $hobby->hobby_title }} Katılımcı Listesi</span>
            </h3>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-3">
            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table align-middle gs-0 gy-4" id="hobby_users_table">
                    <!--begin::Table head-->
                    <thead>
                    <tr class="fw-bolder text-muted bg-light">
                        <th class="ps-4 min-w-325px rounded-start">Üye Ad ve Soyad</th>
                        <th class="ps-4 min-w-325px rounded-start">Üye Mail</th>
                        <th class="ps-4 min-w-125px rounded-start">Üye Telefon</th>
                        <th class="ps-4 min-w-125px rounded-start">Katılma Tarihi</th>
                    </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>
                            <span class="fw-bold d-block fs-7">{{ $user->name }}</span>
                        </td>
                        <td>
                            <span class="fw-bold d-block fs-7">{{ $user->email }}</span>
                        </td>
                        <td>
                            <span class="fw-bold d-block fs-7">{{ $user->phone }}</span>
                        </td>
                        <td>
                            <span class="fw-bold d-block fs-7">{{ \App\HobbyUser::where(["hobby_id" => $hobby->id, "user_id" => $user->id])->first()->created_at->format('d/m/Y H:i:s') }}</span>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
            <!--end::Table container-->
        </div>
        <!--begin::Body-->
    </div>
@endsection
@section("js")
    <script>
        $("#hobby_users_table").DataTable({
            "columnDefs": [{
                "visible": false,
            }],
            // Pagination settings
            dom: `<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>
			<'row'<'col-sm-12'tr>>
			<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,

            buttons: [
                {
                    extend: 'excelHtml5',
                    text: 'Excel',
                    titleAttr: 'Export to Excel',
                    title: '{{ $hobby->hobby_title }} Üye Listesi - {{ now()->format('d-m-Y H.i.s') }}',
                    exportOptions: {
                    }
                },
                {
                    extend: 'csvHtml5',
                    text: '<i class="fa fa-file-text-o"></i> CSV',
                    titleAttr: 'CSV',
                    title: '{{ $hobby->hobby_title }} Üye Listesi - {{ now()->format('d-m-Y H.i.s') }}',
                    exportOptions: {
                    }
                },
                {
                    extend: 'pdfHtml5',
                    text: '<i class="fa fa-file-pdf-o"></i> PDF',
                    titleAttr: 'PDF',
                    title: '{{ $hobby->hobby_title }} Üye Listesi - {{ now()->format('d-m-Y H.i.s') }}',
                    exportOptions: {
                    },
                },
            ],
        });
    </script>
@endsection
