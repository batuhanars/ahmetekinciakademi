@extends('admin.layout.main')
@section('title', 'Header Menü')
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
                        'title' => 'Menü Yönetimi',
                    ],
                    [
                        'link' => '',
                        'title' => 'Header Menü',
                    ],
                ],
            ])
            <div class="row">
                <div class="col-md-6">
                    <form @submit.prevent="storeMenu" v-if="editable == false">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Menü Ekle</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group mb-5">
                                    <label for="addUpMenu" class="form-label">Üst Menü</label>
                                    <select id="addUpMenu" class="form-select" v-model="menu.parent_id">
                                        <option value="0">Üst Menü</option>
                                        <option v-for="(parentItem, parentIndex) in items" :key="parentIndex"
                                            :value="parentItem.id" v-html="parentItem.title">
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group mb-5">
                                    <label for="order" class="form-label">Menü Sırası</label>
                                    <input type="number" id="order" name="order" class="form-control"
                                        v-model="menu.order">
                                </div>
                                <div class="form-group mb-5">
                                    <label for="title" class="form-label">Menü Adı</label>
                                    <input type="text" id="title" name="title" class="form-control"
                                        v-model="menu.title">
                                </div>
                                <div class="form-group mb-5">
                                    <label for="page" class="form-label">Bağlantı Sayfası</label>
                                    <select name="page" id="page" class="form-select" v-on:change="setLink($event)"
                                        v-model="page">
                                        <option value="">Manuel Link</option>
                                        <optgroup label="Sayfalar">
                                            <option v-for="(page, index) in pages" :key="index"
                                                :value="'/' + page.slug" v-html="page.title">
                                            </option>
                                        </optgroup>
                                        <optgroup label="Kurslar">
                                            <option v-for="(course, index) in courses" :key="index"
                                                :value="'/' + course.slug" v-html="course.title">
                                            </option>
                                        </optgroup>
                                        <optgroup label="Haberler">
                                            <option v-for="(blog, index) in blogs" :key="index"
                                                :value="'/' + blog.slug" v-html="blog.title">
                                            </option>
                                        </optgroup>
                                        <optgroup label="Fotoğraf Galeri">
                                            <option v-for="(image, index) in images" :key="index"
                                                :value="'/' + image.slug" v-html="image.title">
                                            </option>
                                        </optgroup>
                                        <optgroup label="Hizmetler">
                                            <option v-for="(service, index) in services" :key="index"
                                                :value="'/' + service.slug" v-html="service.title">
                                            </option>
                                        </optgroup>
                                        <optgroup label="Sabit Sayfalar">
                                            <option value="{{ route('home.index') }}">Anasayfa</option>
                                            <option value="{{ route('home.about') }}">Hakkımızda</option>
                                            <option value="{{ route('home.contact') }}">İletişim</option>
                                            <option value="{{ route('home.help-center') }}">Sıkça Sorulan Sorular</option>
                                            <option value="{{ route('home.course.index') }}">Kurslar</option>
                                            <option value="{{ route('home.corporate-courses') }}">Kurumsal Eğitim</option>
                                            <option value="{{ route('home.blog.index') }}">Haberler</option>
                                            <option value="{{ route('home.instructors.index') }}">Eğitmenler</option>
                                            <option value="{{ route('home.instructors.become') }}">Eğitmenlik Başvurusu
                                            </option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="form-group mb-5" v-show="showLink">
                                    <label for="link" class="form-label">Bağlantı Adresi <small
                                            class="text-muted">(Manuel Link
                                            Ekle)</small></label>
                                    <input type="text" id="link" name="link" class="form-control"
                                        v-model="menu.link">
                                </div>
                                <div class="form-group mb-5">
                                    <label for="open_new_tab" class="form-label">Yeni Sekmede Aç</label>
                                    <select name="open_new_tab" id="open_new_tab" class="form-select"
                                        v-model="menu.open_new_tab">
                                        <option value="0">Hayır</option>
                                        <option value="1">Evet</option>
                                    </select>
                                </div>
                                <div class="form-group mb-5">
                                    <label for="status" class="form-label">Menü Durumu</label>
                                    <select name="status" id="status" class="form-select" v-model="menu.status">
                                        <option value="1">Aktif</option>
                                        <option value="0">Pasif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Kaydet</button>
                            </div>
                        </div>
                    </form>
                    <form @submit.prevent="updateMenu(editMenu.id)" v-else>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> @{{ editMenu.title }} Menüsünü Güncelle</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group mb-5">
                                    <label for="editUpMenu" class="form-label">Üst Menü</label>
                                    <select id="editUpMenu" class="form-select" v-model="editMenu.parent_id">
                                        <option value="0">Üst Menü</option>
                                        <option v-for="(item, index) in items" :key="index"
                                            :value="item.id" v-html="item.title ">
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group mb-5">
                                    <label for="order" class="form-label">Menü Sırası</label>
                                    <input type="number" id="order" name="order" class="form-control"
                                        v-model="editMenu.order">
                                </div>
                                <div class="form-group mb-5">
                                    <label for="title" class="form-label">Menü Adı</label>
                                    <input type="text" id="title" name="title" class="form-control"
                                        v-model="editMenu.title">
                                </div>
                                <div class="form-group mb-5">
                                    <label for="editPage" class="form-label">Bağlantı Sayfası</label>
                                    <select name="page" id="editPage" class="form-select"
                                        v-on:change="setLink($event, 'edit')">
                                        <option value="">Manuel Link</option>
                                        <optgroup label="Sayfalarım">
                                            <option v-for="(page, index) in pages" :key="index"
                                                :value="'/' + page.slug" v-html="page.title ">
                                            </option>
                                        </optgroup>
                                        <optgroup label="Kurslar">
                                            <option v-for="(course, index) in courses" :key="index"
                                                :value="'/' + course.slug" v-html="course.title"></option>
                                        </optgroup>
                                        <optgroup label="Haberler">
                                            <option v-for="(blog, index) in blogs" :key="index"
                                                :value="'/' + blog.slug" v-html="blog.title"></option>
                                        </optgroup>
                                        <optgroup label="Fotoğraf Galeri">
                                            <option v-for="(image, index) in images" :key="index"
                                                :value="image.slug" v-html="image.title"></option>
                                        </optgroup>
                                        <optgroup label="Hizmetler">
                                            <option v-for="(service, index) in services" :key="index"
                                                :value="'/' + service.slug" v-html="service.title"></option>
                                        </optgroup>
                                        <optgroup label="Sabit Sayfalar">
                                            <option value="{{ route('home.index') }}">Anasayfa</option>
                                            <option value="{{ route('home.about') }}">Hakkımızda</option>
                                            <option value="{{ route('home.contact') }}">İletişim</option>
                                            <option value="{{ route('home.help-center') }}">Sıkça Sorulan Sorular</option>
                                            <option value="{{ route('home.course.index') }}">Kurslar</option>
                                            <option value="{{ route('home.corporate-courses') }}">Kurumsal Eğitim</option>
                                            <option value="{{ route('home.blog.index') }}">Haberler</option>
                                            <option value="{{ route('home.instructors.index') }}">Eğitmenler</option>
                                            <option value="{{ route('home.instructors.become') }}">Eğitmenlik Başvurusu
                                            </option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="form-group mb-5" v-show="showLink">
                                    <label for="link" class="form-label">Bağlantı Adresi <small
                                            class="text-muted">(Manuel Link
                                            Ekle)</small></label>
                                    <input type="text" id="link" name="link" class="form-control"
                                        v-model="editMenu.link">
                                </div>
                                <div class="form-group mb-5">
                                    <label for="open_new_tab" class="form-label">Yeni Sekmede Aç</label>
                                    <select name="open_new_tab" id="open_new_tab" class="form-select"
                                        v-model="editMenu.open_new_tab">
                                        <option value="0">Hayır</option>
                                        <option value="1">Evet</option>
                                    </select>
                                </div>
                                <div class="form-group mb-5">
                                    <label for="status" class="form-label">Menü Durumu</label>
                                    <select name="status" id="status" class="form-select" v-model="editMenu.status">
                                        <option value="1">Aktif</option>
                                        <option value="0">Pasif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success me-5">Kaydet</button>
                                <button type="button" v-on:click="editable = false" class="btn btn-success">Yeni
                                    Menü</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Menü</h3>
                        </div>
                        <div class="card-body">
                            <ul class="menu menu-column">
                                <div v-for="(parentItem, parentIndex) in items" :key="parentIndex">
                                    <li class="menu-item here my-2 text-white d-flex py-3 px-5 justify-content-between"
                                        :class="{ 'bg-dark': parentItem }">
                                        <div class="d-flex align-items-center">
                                            <div class="menu-icon me-3">
                                                <span class="badge badge-primary rounded-circle"
                                                    v-html="parentItem.order"></span>
                                            </div>
                                            <strong v-html="parentItem.title">
                                            </strong>
                                            <small class="ms-5" v-html="parentItem.link">
                                            </small>
                                        </div>
                                        <div class="tool d-flex">
                                            <a href="" @click.prevent="editItem(parentItem)"><i
                                                    class="fas fa-edit me-3 text-white text-hover-primary"></i></a>
                                            <a href="" @click.prevent="deleteItem(parentItem)"><i
                                                    class="fas fa-trash text-white text-hover-danger"></i></a>
                                        </div>

                                    </li>
                                    <li v-for="(subItem, subIndex) in parentItem.sub_menu" :key="subIndex"
                                        class="sub menu-item mt-2 ms-10 text-white d-flex py-3 px-5 justify-content-between"
                                        :class="{ 'bg-dark': subItem }">
                                        <div class="d-flex align-items-center">
                                            <div class="menu-icon me-3">
                                                <span class="badge badge-info rounded-circle"
                                                    v-html="subItem.order "></span>
                                            </div>
                                            <strong v-html="subItem.title">
                                            </strong>
                                            <small class="ms-5" v-html="subItem.link">
                                            </small>
                                        </div>
                                        <div class="tool d-flex">
                                            <a href="" @click.prevent="editItem(subItem)"><i
                                                    class="fas fa-edit me-3 text-white text-hover-primary"></i></a>
                                            <a href="" @click.prevent="deleteItem(subItem)"><i
                                                    class="fas fa-trash text-white text-hover-danger"></i></a>
                                        </div>
                                    </li>

                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
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
                    items: [],
                    pages: [],
                    courses: [],
                    blogs: [],
                    images: [],
                    services: [],
                    page: "",
                    menu: {
                        parent_id: 0,
                        order: 1,
                        title: null,
                        link: null,
                        open_new_tab: "0",
                        status: "1",
                    },
                    editMenu: {
                        parent_id: 0,
                        order: 1,
                        title: null,
                        link: null,
                        open_new_tab: "0",
                        status: "1",
                    },
                    editable: false,
                    showLink: true,
                }
            },
            mounted() {
                this.getMenuItems()
                this.getPages()
                this.getCourses()
                this.getBlogs()
                this.getImages()
                this.getServices()
            },
            methods: {
                setLink(event, type) {
                    if (event.target.value != "") {
                        this.showLink = false;
                        this.menu.link = event.target.value;
                        if (type == "edit") {
                            this.editMenu.link = event.target.value;
                        }
                    }
                    if (event.target.value == "") {
                        this.showLink = true;
                        this.menu.link = event.target.value;
                        if (type == "edit") {
                            this.editMenu.link = event.target.value;
                        }
                    }
                },
                getMenuItems() {
                    axios.get("/sistem/get-header-menu").then(res => {
                        this.items = res.data.menu;
                    });
                },
                getPages() {
                    axios.get("/sistem/get-header-menu").then(res => {
                        this.pages = res.data.pages;
                    });
                },
                getCourses() {
                    axios.get("/sistem/get-header-menu").then(res => {
                        this.courses = res.data.courses;
                    });
                },
                getBlogs() {
                    axios.get("/sistem/get-header-menu").then(res => {
                        this.blogs = res.data.blogs;
                    });
                },
                getImages() {
                    axios.get("/sistem/get-header-menu").then(res => {
                        this.images = res.data.images;
                    });
                },
                getServices() {
                    axios.get("/sistem/get-header-menu").then(res => {
                        this.services = res.data.services;
                    });
                },
                storeMenu() {
                    axios.post("{{ route('panel.header-menu.store') }}", this.menu).then(res => {
                        Swal.fire({
                            icon: "success",
                            title: "Başarılı",
                            text: res.data.success,
                            showConfirmButton: false,
                            timer: 1500,
                        }).then(() => {
                            this.getMenuItems()
                            this.menu = {
                                parent_id: 0,
                                page_id: 0,
                                order: 1,
                                title: null,
                                link: null,
                                open_new_tab: "0",
                                status: "1",
                            }
                            this.page = ""
                            this.showLink = true
                        });
                    });
                },
                editItem(item) {
                    this.editMenu = item;
                    this.editable = true;
                },
                updateMenu(id) {
                    axios.put("/sistem/header-menu/" + id, this.editMenu).then(res => {
                        Swal.fire({
                            icon: "success",
                            title: "Başarılı",
                            text: res.data.success,
                            showConfirmButton: false,
                            timer: 1500,
                        }).then(() => {
                            this.getMenuItems()
                        });
                    });
                },
                deleteItem(item) {
                    Swal.fire({
                        title: 'Emin misiniz?',
                        text: item.title +
                            " menüsünü silmek istiyor musunuz? Yapılan değişiklik geri alınamaz!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Evet Sil!',
                        cancelButtonText: 'İptal Et'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            axios.get("/sistem/header-menu/" + item.id + "/sil").then(() => {
                                Swal.fire({
                                    icon: "success",
                                    title: "Silindi",
                                    text: item.title +
                                        " menüsü başarıyla silindi.",
                                    confirmButtonText: "Tamam"
                                }).then(() => {
                                    this.getMenuItems()
                                });
                            })
                        }
                    })
                }
            }
        }).mount("#app");

        // $("#addUpMenu").select2();
        // $("#editUpMenu").select2();
    </script>
@endsection
