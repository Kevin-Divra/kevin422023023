<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use OpenApi\Annotations as OA;


/**
 * Class Sport.
 * 
 * @author kevin <kevindivra2420@gmail.com>
 * 
 * @OA\Schema(
 *     description="Sport model",
 *     title="Sport model",
 *     required={"title", "brand"},
 *     @OA\Xml(
 *         name="Sport"
 *     )
 * )
 */
class Sport extends Model
{
    // use HasFactory;
    use SoftDeletes;
    protected $table = 'sports';
    protected $fillable = [
        'title',
        'brand',
        'category',
        'publication_year',
        'cover',
        'descripton',
        'price',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
    ];

    public function data_adder(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}