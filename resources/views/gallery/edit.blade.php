@extends('auth.layouts')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Gambar</div>
                <div class="card-body">
                    <form action="{{ route('gallery.update', $gambar->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul</label>
                            <input type="text" name="title" class="form-control" id="title"
                                value="{{ $gambar->title }}">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea name="description" class="form-control" id="description" rows="5">{{ $gambar->description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="picture" class="form-label">Gambar Saat Ini</label><br>
                            <img class="example-image img-fluid mb-2"
                                src="{{ asset('storage/posts_image/' . $gambar->picture) }}" width="100px" />
                                <input type="hidden" id="gambar_old" name="gambar_old" value="{{ $gambar->picture }}">
                        </div>
                        <div class="mb-3 row">
                            <label for="input-file" class="form-label">File input</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="input-file" name="picture">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Edit</button>
                        <a href="{{ route('gallery.detail') }}" class="btn btn-danger">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
