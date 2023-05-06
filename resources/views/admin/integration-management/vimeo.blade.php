 @extends('admin.layout.main')
 @section('title', 'Vimeo Entegrasyonu')
 @section('css')
 @endsection
 @section('content')
     <!--end::Toolbar-->
     <!--begin::Post-->
     <div class="post d-flex flex-column-fluid" id="kt_post">
         <!--begin::Container-->
         <div id="kt_content_container" class="container-fluid">
             @include('admin.breadcrumb', [
                 'items' => [
                     [
                         'link' => route('panel.index'),
                         'title' => 'İstatistikler',
                     ],
                     [
                         'link' => '',
                         'title' => 'Entegrasyon Yönetimi',
                     ],
                     [
                         'link' => '',
                         'title' => 'Vimeo Bilgileri',
                     ],
                 ],
             ])
             <div class="card">
                 <div class="card-header d-flex flex-column pt-4">
                     <h3 class="card-title">
                         Vimeo BİLGİLERİ
                     </h3>
                     <p class="text-muted">
                         Vimeo bilgilerinizi bu sayfadan düzenleyebilirsiniz.
                     </p>
                 </div>
                 <form action="{{ route('panel.save.vimeo') }}" method="post">
                     @csrf
                     @method('PUT')
                     <div class="card-body">
                         <div class="form-group mb-5">
                             <label for="client_id" class="form-label">Client Identifier</label>
                             <input type="text" name="client_id" id="client_id" class="form-control"
                                 value="{{ $vimeo->client_id }}">
                         </div>
                         <div class="form-group mb-5">
                             <label for="client_secret" class="form-label">Client Secret</label>
                             <input type="text" name="client_secret" id="client_secret" class="form-control"
                                 value="{{ $vimeo->client_secret }}">
                         </div>
                         <div class="form-group mb-5">
                             <label for="access_token" class="form-label">Access Token</label>
                             <input type="password" name="access_token" id="access_token" class="form-control"
                                 value="{{ $vimeo->access_token }}">
                         </div>
                     </div>

                     <div class="card-footer">
                         <button type="submit" class="btn btn-primary">Kaydet</button>
                     </div>
                 </form>
             </div>
         </div>
         <!--end::Container-->
     </div>
     <!--end::Post-->
 @endsection
 @section('js')

 @endsection
