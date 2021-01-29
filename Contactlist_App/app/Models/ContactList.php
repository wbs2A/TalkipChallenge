<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactList extends Model{
    use HasFactory, SoftDeletes;
    protected $table = 'contacts_list';

    protected $fillable = [
        'name', 'created_at'
    ];

    public function contacts(){
        return $this->hasMany(Contact::class);

    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
