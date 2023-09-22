@extends("admin.layouts.app")
@section("title", "Knowledge & Development Ekle")
@section("content")
    <div class="row">
        <div class="col-lg-12">
            <!--begin::Card-->
            <div class="card card-custom gutter-b example example-compact">
                <div class="card-header">
                    <h3 class="card-title">Knowledge & Development Ekle</h3>
                </div>
                <form class="form" method="post" action="{{ route('manager.knowledge.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="mb-10">
                            <label for="exampleFormControlInput1" class="required form-label">İçerik Başlığı</label>
                            <input value="{{ old("knowledge_title") }}" name="knowledge_title" type="text" class="form-control form-control-solid" required/>
                        </div>
                        <div class="mb-10">
                            <label for="knowledge_abstract" class="form-label">İçerik Kısa Açıklaması</label>
                            <textarea id="knowledge_abstract" name="knowledge_abstract" class="form-control form-control-solid">{{ old("knowledge_abstract") }}</textarea>
                        </div>
                        <div class="mb-10">
                            <label for="knowledge_text" class="required form-label">İçerik Metni</label>
                            <textarea id="knowledge_text" name="knowledge_text" class="form-control form-control-solid">{{ old("knowledge_text") }}</textarea>
                        </div>
                        <div class="mb-10">
                            <label for="knowledge_embed" class="form-label">Video linkleri</label>
                            <textarea id="knowledge_embed" name="knowledge_embed" class="form-control form-control-solid">{{ old("knowledge_embed") }}</textarea>
                            <small>Video linkerini virgül ile ayırarak giriniz.</small>
                        </div>
                        <div class="mb-10">
                            <label for="exampleFormControlInput1" class="required form-label">Afiş Görseli</label>
                            <input name="knowledge_poster" type="file" class="form-control form-control-solid" required/>
                            <small class="text-muted">Görsel {{ $config['image']['poster']['width'] }} px genişliğinde ve {{ $config['image']['poster']['height'] }} px yükseliğinde olmalıdır. Boyutu en fazla {{ $config['image']['poster']['max_size'] }} kb olmalıdır. </small>
                        </div>
                        <div class="mb-10">
                            <label for="exampleFormControlInput1" class="form-label">Dosya</label>
                            <input name="media_gallery[]" type="file" class="form-control form-control-solid" multiple />
                        </div>
                        <div class="row mb-10">
                            <!--begin::Label-->
                            <label class="col-lg-3 col-form-label fw-bold fs-6">İçerik Aktif Mi?</label>
                            <!--begin::Label-->
                            <!--begin::Label-->
                            <div class="col-lg-9 d-flex align-items-center">
                                <div class="form-check form-check-solid form-switch fv-row">
                                    <input name="knowledge_visible" class="form-check-input w-45px h-30px"
                                           type="checkbox" id="knowledge_visible_id"/>
                                    <label class="form-check-label" for=knowledge_visible_id"></label>
                                </div>
                            </div>
                            <!--begin::Label-->
                        </div>
                        <div class="row mb-10">
                            <!--begin::Label-->
                            <label class="col-lg-3 col-form-label fw-bold fs-6">Gönderi Öne Çıkarılsın Mı?</label>
                            <!--begin::Label-->
                            <!--begin::Label-->
                            <div class="col-lg-9 d-flex align-items-center">
                                <div class="form-check form-check-solid form-switch fv-row">
                                    <input name="knowledge_featured" class="form-check-input w-45px h-30px"
                                           type="checkbox" id="knowledge_featured_id"/>
                                    <label class="form-check-label" for=knowledge_featured_id"></label>
                                </div>
                            </div>
                            <!--begin::Label-->
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6">
                                <button type="submit" class="btn btn-success mr-2">İçerik Ekle</button>
                                <button type="reset" class="btn btn-secondary">Formu Temizle</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section("js")
    <script src="{{ url("static/admin/assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js") }}"></script>
    <script type="text/javascript">
        let wysiwygEditor = function () {
            // Private functions
            let conf = {ckfinder: {
            uploadUrl: '{{ route('manager.uploader', ['_token' => csrf_token() ]) }}',
            uploadMethod: 'form'
            }};

            let ckeditor = function () {
                ClassicEditor
                    .create(document.querySelector('#knowledge_text'), conf);
            }
            return {
                // public functions
                init: function() {
                    ckeditor();
                }
            };
        }();
        // Initialization of wysiwyg editor
        jQuery(document).ready(function() {
            wysiwygEditor.init();
        });
    </script>
@endsection
