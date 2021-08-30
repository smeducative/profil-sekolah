@extends('layouts.app')

@section('title', 'Buat artikel baru')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Berita</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Berita</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <form role="form" enctype="multipart/form-data" method="POST" action="{{ route('post.create') }}">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tambah Berita</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Judul Berita</label>
                        <input type="text" name="title" class="form-control" placeholder="Masukan Judul Berita ..." required>
                    </div>
                    <div class="form-group">
                        <label for="customFile">Cover Berita</label>
                        <div class="custom-file">
                            <input type="file" name="cover" accept="image/*" class="custom-file-input" id="customFile" required>
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Tanggal Berita</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" name="published_at" class="form-control" value="{{ now()->format('d m Y') }}" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Isi Berita</label>
                        <textarea class="form-control" name="body" rows="3"></textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <button type='submit' class='btn btn-info'>Simpan</button>

                    <a href="{{ route('post.index') }}" class="btn btn-default float-right">Kembali</a>
                </div>
            </div>
        </form>
    </section>
@endsection

@section('footer')

	<!-- TinyMCE -->
	<script src="/plugins/tinymce/js/tinymce/tinymce.min.js"></script>

	<!-- bs-custom-file-input -->
	<script src="/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
	<!-- InputMask -->
	<script src="/plugins/inputmask/jquery.inputmask.min.js"></script>

    <script>
        $(function () {
			//Datemask dd/mm/yyyy
			$('#datemask').inputmask('yyyy/mm/dd', { 'placeholder': 'yyyy/mm/dd' })
			//Money Euro
			$('[data-mask]').inputmask()
		})
	</script>
	<script>
		$(document).ready(function () {
			bsCustomFileInput.init();
		});

        tinymce.init({
  selector: 'textarea',
  height: 500,
  theme: 'modern',
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools responsivefilemanager '
  ],
  toolbar1: 'responsivefilemanager | formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
  image_advtab : true,

  relative_urls: false,
  external_filemanager_path:"/plugins/filemanager/",
  filemanager_title:"Responsive Filemanager" ,
  external_plugins: { "filemanager" : "/plugins/filemanager/plugin.min.js"},

  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
  ]
 });
	</script>
@endsection
