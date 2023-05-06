 @extends('admin.layout.main')
 @section('title', 'Kurs Ekle')
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
                         'title' => 'İçerik Yönetimi',
                     ],
                     [
                         'link' => route('panel.courses.index'),
                         'title' => 'Kurs Yönetimi',
                     ],
                     [
                         'link' => '',
                         'title' => 'Kurs Ekle',
                     ],
                 ],
             ])
             <div class="card">
                 <form action="{{ route('panel.courses.store') }}" method="post" enctype="multipart/form-data">
                     @csrf
                     <div class="card-body">
                         <div class="row">
                             <div class="col-md-6">
                                 <div class="form-group mb-5">
                                     <label for="image" class="form-label">Listeleme Görseli</label>
                                     <small class="text-danger ms-3">{{ $errors->first('image') }}</small>
                                     <input type="file" name="image" v-on:change="loadImage($event)" id="image"
                                         class="form-control" accept="image/*">
                                     <img :src="image_preview" alt="" id="image_preview" class="mt-2"
                                         style="width: 250px;">
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="form-group mb-5">
                                     <label for="title" class="form-label">Başlık</label>
                                     <small class="text-danger ms-3">{{ $errors->first('title') }}</small>
                                     <input type="text" name="title" id="title" class="form-control"
                                         placeholder="Başlık">
                                 </div>
                             </div>
                         </div>
                         <div class="form-group mb-5">
                             <label for="price" class="form-label">Fiyat</label>
                             <small class="text-danger ms-3">{{ $errors->first('price') }}</small>
                             <input type="text" name="price" id="price" class="form-control" placeholder="Fiyat">
                         </div>

                         <div class="form-group mb-5">
                             <label for="status" class="form-label">Durum</label>
                             <small class="text-danger ms-3">{{ $errors->first('status') }}</small>
                             <select name="status" id="addStatus" class="form-select" data-control="select2"
                                 data-hide-search="true">
                                 <option value="1">Aktif</option>
                                 <option value="0">Pasif</option>
                             </select>
                         </div>
                         <div class="form-group mb-5">
                             <label for="description" class="form-label">Kısa Açıklama</label>
                             <small class="text-danger ms-3">{{ $errors->first('description') }}</small>
                             <textarea class="form-control" name="description" data-kt-autosize="true"></textarea>
                         </div>
                         <div class="form-group">
                             <label for="content" class="form-label">İçerik</label>
                             <small class="text-danger ms-3">{{ $errors->first('content') }}</small>
                             <textarea name="content" id="content"></textarea>
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
     <script>
         Vue.createApp({
             data() {
                 return {
                     image_preview: null,
                 }
             },
             methods: {
                 loadImage(event, type) {
                     let file = event.target.files[0];
                     this.image_preview = URL.createObjectURL(file);
                 }
             },
         }).mount("#app");

         ClassicEditor
             .create(document.querySelector('#content'), {
                 heading: {
                     options: [{
                             model: 'paragraph',
                             title: 'Paragraph',
                             class: 'ck-heading_paragraph'
                         },
                         {
                             model: 'heading1',
                             view: 'h1',
                             title: 'Heading 1',
                             class: 'ck-heading_heading1'
                         },
                         {
                             model: 'heading2',
                             view: 'h2',
                             title: 'Heading 2',
                             class: 'ck-heading_heading2'
                         },
                         {
                             model: 'heading3',
                             view: 'h3',
                             title: 'Heading 3',
                             class: 'ck-heading_heading2'
                         }
                     ]
                 }
             })
             .then(editor => {
                 window.editor = editor;
             })
             .catch(error => {
                 console.error('Oops, something went wrong!');
                 console.error(
                     'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:'
                 );
                 console.warn('Build id: y9lkfsfe20pr-jujsj4qk5w31');
                 console.error(error);
             });
     </script>
 @endsection
