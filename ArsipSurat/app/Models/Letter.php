<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Letter extends Model
{
    use HasFactory;
    protected $fillable = [
        'number', 'category_id', 'title', 'file_path', 'archived_at'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
