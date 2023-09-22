@extends("admin.layouts.app")
@section("title", sprintf("%s - Düzenle", $item->name))
@section("content")
    <div class="row">
        <div class="col-lg-12">
            <!--begin::Card-->
            <div class="card card-custom gutter-b example example-compact">
                <div class="card-header">
                    <h3 class="card-title">Los Ekle</h3>
                </div>
                <form class="form" method="post" action="{{ route('manager.los.update', $item->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method("put")
                    <div class="card-body">
                        <div class="mb-10">
                            <label for="name" class="required form-label">Los Başlık</label>
                            <input value="{{ $item->name }}" id="name" name="name" type="text" class="form-control form-control-solid" required/>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6">
                                <button type="submit" class="btn btn-success mr-2">Los Düzenle</button>
                                <button type="reset" class="btn btn-secondary">Formu Temizle</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
