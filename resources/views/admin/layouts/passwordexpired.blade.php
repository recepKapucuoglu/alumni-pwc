@if(auth()->user()->isPasswordExpired())
    <!--begin::Alert-->
    <div class="alert alert-dismissible bg-light-danger d-flex flex-column flex-sm-row w-100 p-5 mb-10">
        <!--begin::Wrapper-->
        <div class="d-flex flex-column pe-0 pe-sm-10">
            <!--begin::Title-->
            <h4 class="fw-bold">Şifrenizin kullanım süresi dolmuştur.</h4>
            <!--end::Title-->
            <!--begin::Content-->
            <span>Şifrenizin kullanım süresi dolmuştur, lütfen şifrenizi <a href="{{ route('manager.password.index') }}">yenileyiniz.</a></span>
            <!--end::Content-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Alert-->
@endif
