<!-- resources/views/edit_disposisi.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Edit Disposisi Surat</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h3>Edit Disposisi for PDF: {{ $disposisi->pdf->file_name }}</h3>
            <form action="{{ route('disposisi.update', $disposisi->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $disposisi->title }}" required>
                </div>
                <div class="form-group">
                    <label for="sender">Sender</label>
                    <input type="text" class="form-control" name="sender" id="sender" value="{{ $disposisi->sender }}" required>
                </div>
                <div class="form-group">
                    <label for="receiver">Receiver</label>
                    <input type="text" class="form-control" name="receiver" id="receiver" value="{{ $disposisi->receiver }}" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description">{{ $disposisi->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" name="status" id="status" required>
                        <option value="pending" {{ $disposisi->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="processed" {{ $disposisi->status == 'processed' ? 'selected' : '' }}>Processed</option>
                        <option value="completed" {{ $disposisi->status == 'completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
