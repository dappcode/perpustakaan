<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Book extends Model
{
    public static function boot()
    {
        parent::boot();

        self::updating( function ($book){ 
            if ($book->amount < $book->borrowed) {
                Session::flash('flash_notification', [
                    'level'     => 'warning',
                    'message'   => "Jumlah buku $book->title harus >= $book->borrowed"
                ]);
                return false;
            }
        });
    }

    protected $fillable = [
        'title', 'amount', 'cover', 'author_id'
    ];

    public function author()
    {
      return $this->belongsTo(Author::class);
    }

    public function borrowLogs()
    {
        return $this->hasMany(BorrowLog::class);
    }

    public function getStockAttribute()
    {
        $borrowed = $this->borrowLogs()->borrowed()->count();
        $stock    = $this->amount - $borrowed;

        return $stock;
    }

    public function getBorrowedAttribute()
    {
        return $this->borrowLogs()->borrowed()->count();
    }
}
