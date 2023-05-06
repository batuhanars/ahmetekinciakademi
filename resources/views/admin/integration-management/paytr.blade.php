 @extends('admin.layout.main')
 @section('title', 'Sanal Pos Entegrasyonu')
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
                         'title' => 'PayTR Bilgileri',
                     ],
                 ],
             ])
             <div class="card">
                 <div class="card-header d-flex flex-column pt-4">
                     <h3 class="card-title">
                         PAYTR BİLGİLERİ
                     </h3>
                     <p class="text-muted">
                         PayTR bilgilerinizi bu sayfadan düzenleyebilirsiniz.
                     </p>
                 </div>
                 <form action="{{ route('panel.save.paytr') }}" method="post">
                     @csrf
                     @method('PUT')
                     <div class="card-body">
                         <div class="form-group mb-5">
                             <label for="shopping_number" class="form-label">Mağaza Numarası</label>
                             <span class="text-danger d-block">{{ $errors->first('title') }}</span>
                             <input type="text" name="shopping_number" id="shopping_number" class="form-control"
                                 value="{{ $paytr->shopping_number }}">
                         </div>
                         <div class="form-group mb-5">
                             <label for="shopping_password" class="form-label">Mağaza Parola</label>
                             <span class="text-danger d-block">{{ $errors->first('title') }}</span>
                             <input type="text" name="shopping_password" id="shopping_password" class="form-control"
                                 value="{{ $paytr->shopping_password }}">
                         </div>
                         <div class="form-group mb-5">
                             <label for="shopping_secret_key" class="form-label">Mağaza Gizli Anahtar</label>
                             <span class="text-danger d-block">{{ $errors->first('title') }}</span>
                             <input type="text" name="shopping_secret_key" id="shopping_secret_key" class="form-control"
                                 value="{{ $paytr->shopping_secret_key }}">
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
