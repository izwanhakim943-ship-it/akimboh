
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Song extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'artist',
        'album',
        'genre',
        'audio_path',
        'cover_path',
        'size_bytes',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'size_bytes' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
