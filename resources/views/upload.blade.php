<!DOCTYPE html>
<html>
<head>
    <title>Laravel File Upload</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2 mt-5">
            <h2>Upload File PDF</h2>
            <form action="/upload" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="file">Pilih File</label>
                    <input type="file" name="file" class="form-control" id="file">
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
            @if (session('success'))
                <div class="alert alert-success mt-2">
                    {{ session('success') }}
                </div>
                @if (session('file'))
                    <div class="mt-2">
                        <strong>File:</strong> {{ session('file') }}
                    </div>
                @endif
            @endif

            <h2 class="mt-5">Daftar File PDF</h2>
            <ul class="list-group">
                @foreach ($pdfs as $pdf)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <a href="{{ route('pdf.show', $pdf->id) }}">{{ $pdf->file_name }}</a>
                            @if ($pdf->disposisi)
                                <span class="badge badge-info ml-2">{{ $pdf->disposisi->status }}</span>
                            @else
                                <span class="badge badge-secondary ml-2">No Disposisi</span>
                            @endif
                        </div>
                        <div>
                            <a href="{{ route('disposisi.create', $pdf->id) }}" class="btn btn-primary btn-sm">Disposisi Surat</a>
                            @if ($pdf->disposisi)
                                <a href="{{ route('disposisi.edit', $pdf->disposisi->id) }}" class="btn btn-warning btn-sm">Edit Disposisi</a>
                            @endif
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
</body>
</html>
