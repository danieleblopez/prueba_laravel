<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(array $all)
 * @property mixed id
 * @property mixed lessons
 */
class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['first_name', 'last_name', 'email'];

    /**
     * @return BelongsToMany
     */
    public function lessons(): BelongsToMany
    {
        return $this->belongsToMany(Lesson::class);
    }
}
