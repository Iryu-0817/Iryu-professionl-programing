<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;


    // $table プロパティを使用することで、モデルが関連付けるデータベーステーブルの名前を指定できます。
    protected $table = 'tweets';

    public function user() {
        return $this->belongsTo(User::class);
    }
    // protected $primaryKey = 'tweet_id';

    // public $incrementing= false;
    // protected $keyType = 'string';
}
 