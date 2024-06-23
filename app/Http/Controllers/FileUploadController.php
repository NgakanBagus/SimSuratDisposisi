<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pdf;
use App\Models\DisposisiSurat;

class FileUploadController extends Controller
{
    public function create()
    {
        $pdfs = Pdf::with('disposisi')->get(); // Eager load disposisi data
        return view('upload', compact('pdfs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf|max:2048',
        ]);

        if ($request->file()) {
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

            $pdf = new Pdf();
            $pdf->file_name = $fileName;
            $pdf->file_path = '/storage/' . $filePath;
            $pdf->save();

            return back()
                ->with('success', 'File berhasil diunggah.')
                ->with('file', $fileName);
        }
    }

    public function show($id)
    {
        $pdf = Pdf::findOrFail($id);
        return response()->file(storage_path('app/public/uploads/' . $pdf->file_name));
    }

    // Disposisi Surat Methods
    public function createDisposisi($pdfId)
    {
        $pdf = Pdf::findOrFail($pdfId);
        return view('create_disposisi', compact('pdf'));
    }

    public function storeDisposisi(Request $request, $pdfId)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'sender' => 'required|string|max:255',
            'receiver' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string|in:pending,processed,completed',
        ]);

        $disposisi = new DisposisiSurat();
        $disposisi->pdf_id = $pdfId;
        $disposisi->title = $request->title;
        $disposisi->sender = $request->sender;
        $disposisi->receiver = $request->receiver;
        $disposisi->description = $request->description;
        $disposisi->status = $request->status;
        $disposisi->save();

        return redirect()->route('upload')
            ->with('success', 'Disposisi surat berhasil ditambahkan.');
    }

    public function editDisposisi($id)
    {
        $disposisi = DisposisiSurat::findOrFail($id);
        return view('edit_disposisi', compact('disposisi'));
    }

    public function updateDisposisi(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'sender' => 'required|string|max:255',
            'receiver' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string|in:pending,processed,completed',
        ]);

        $disposisi = DisposisiSurat::findOrFail($id);
        $disposisi->title = $request->title;
        $disposisi->sender = $request->sender;
        $disposisi->receiver = $request->receiver;
        $disposisi->description = $request->description;
        $disposisi->status = $request->status;
        $disposisi->save();

        return redirect()->route('upload')
            ->with('success', 'Disposisi surat berhasil diperbarui.');
    }

    public function deleteDisposisi($id)
    {
        $disposisi = DisposisiSurat::findOrFail($id);
        $disposisi->delete();

        return redirect()->route('upload')
            ->with('success', 'Disposisi surat berhasil dihapus.');
    }
}
