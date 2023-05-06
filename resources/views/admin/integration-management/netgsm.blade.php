 @extends('admin.layout.main')
 @section('title', 'NetGSM Entegrasyonu')
 @section('css')
 @endsection
 @section('content')
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
                         'title' => 'NetGSM Bilgileri',
                     ],
                 ],
             ])
             <div class="card">
                 <div class="card-header d-flex flex-column pt-4">
                     <h3 class="card-title">
                         NETGSM BİLGİLERİ
                     </h3>
                     <p class="text-muted">
                         NetGSM bilgilerinizi bu sayfadan düzenleyebilirsiniz.
                     </p>
                 </div>
                 <form action="{{ route('panel.save.netgsm') }}" method="post">
                     @csrf
                     @method('PUT')
                     <div class="card-body">
                         <div class="form-group mb-5">
                             <label for="username" class="form-label">Kullanıcı Adı</label>
                             <input type="text" name="username" id="username" class="form-control"
                                 value="{{ $netgsm->username }}">
                         </div>
                         <div class="form-group mb-5">
                             <label for="password" class="form-label">Şifre</label>
                             <input type="text" name="password" id="password" class="form-control"
                                 value="{{ $netgsm->password }}">
                         </div>
                         <div class="form-group mb-5">
                             <label for="sender_title" class="form-label">Gönderici Başlığı</label>
                             <input type="text" name="sender_title" id="title" class="form-control"
                                 value="{{ $netgsm->sender_title }}">
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
