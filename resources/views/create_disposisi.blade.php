<!-- resources/views/create_disposisi.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Buat Disposisi Surat</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2 mt-5">
            <h2>Buat Disposisi Surat</h2>
            <form action="{{ route('disposisi.store', $pdf->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Judul</label>
                    <input type="text" name="title" class="form-control" id="title" required>
                </div>
                <div class="form-group">
                    <label for="sender">Pengirim</label>
                    <input type="text" name="sender" class="form-control" id="sender" required>
                </div>
                <div class="form-group">
                    <label for="receiver">Penerima</label>
                    <input type="text" name="receiver" class="form-control" id="receiver" required>
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea name="description" class="form-control" id="description"></textarea>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control" id="status" required>
                        <option value="pending">Pending</option>
                        <option value="processed">Processed</option>
                        <option value="completed">Completed</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
