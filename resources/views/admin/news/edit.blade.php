@extends('admin.includes.admin_design')

@section('title') Edit News - {{ config('app.name', 'Laravel') }} @endsection


@section('content')


    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Edit News</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit News</li>
                        </ul>
                    </div>

                    <div class="col-auto float-right ml-auto">
                        <a href="{{ route('news.index') }}" class="btn add-btn" ><i class="fa fa-eye"></i> View All News</a>
                    </div>
                </div>
            </div>

            @include('admin.includes._message')
            <!-- /Page Header -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-body">
                            <form action="{{ route('news.update', $news->id) }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="text-center">
                                    <img src="{{ asset('public/uploads/news/'.$news->image) }}" alt="" width="200px" id="one" style="margin-top: 15px; margin-bottom: 10px">
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="category_id">Under Category</label>
                                            <select name="category_id" id="category_id" class="form-control">
                                                @php echo  $categories_dropdown @endphp

                                            </select>
                                        </div>
                                    </div>



                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="category_name">Post Image</label>
                                            <input type="hidden" name="current_image" value="{{ $news->image }}">
                                            <input class="form-control " type="file" name="image" accept="image/*" onchange="readURL(this)">
                                        </div>
                                    </div>


                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>News Title</label>
                                            <input class="form-control "  type="text" name="news_title" value="{{ $news->news_title }}">
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="news_content">News Content</label>
                                            <textarea name="news_content" id="news_content" cols="30" rows="10" class="form-control">
                                                {{ $news->news_content }}
                                            </textarea>
                                        </div>
                                    </div>

                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <div class="form-check" data-children-count="1">
                                              <input class="form-check-input" type="checkbox" value="1" name="status" id="status" @if($news->status == 1) checked @endif>
                                              <label class="form-check-label" for="invalidCheck">
                                                  Mark as Active
                                              </label>
                                          </div>
                                      </div>
                                  </div>

                                </div>

                                <hr>

                                <h4 class="text-uppercase">
                                    SEO SETTINGS
                                </h4>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="seo_title">SEO Title</label>
                                            <input name="seo_title" id="seo_title"  class="form-control" value="{{ $news->seo_title }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="seo_subtitle">SEO Sub Title</label>
                                            <input name="seo_subtitle" id="seo_subtitle"  class="form-control" value="{{ $news->seo_subtitle }}" >
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="seo_keywords">SEO Keywords</label>
                                            <input name="seo_keywords" id="seo_keywords"  class="form-control" value="{{ $news->seo_keywords }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="seo_description">SEO Description</label>
                                            <input name="seo_description" id="seo_description"  class="form-control" value="{{ $news->seo_description }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="text-left">
                                    <button type="submit" class="btn btn-primary">Update News</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
    <!-- /Page Wrapper -->

@endsection

@section('js')
    <!-- Datatable JS -->
    <script src="{{ asset('public/adminpanel/assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/adminpanel/assets/js/dataTables.bootstrap4.min.js') }}"></script>

    <script>
        function readURL(input){
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function (e){
                    $("#one").attr('src', e.target.result).width(300)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('news_content', {
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>
    @endsection
