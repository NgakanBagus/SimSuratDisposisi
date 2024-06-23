<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisposisiSurat extends Model
{

    use HasFactory;
    protected $table = 'disposisi_surat';

    protected $fillable = [
        'pdf_id', 'title', 'sender', 'receiver', 'description', 'status',
    ];

    public function pdf()
    {
        return $this->belongsTo(Pdf::class);
    }
}
