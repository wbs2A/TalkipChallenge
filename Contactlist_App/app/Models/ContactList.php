<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactList extends Model{
    use HasFactory;
    protected $table = 'contacts_lists';
    protected $fillable = [
        'name'
    ];
    public function contacts(){
        return $this->hasMany(Contact::class);

    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
