<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'comments';


    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'comment_id';



    protected $fillable = [
        'content',
    ];

    // Relation (inverse) commentaire -> user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relation (inverse) article -> user
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
