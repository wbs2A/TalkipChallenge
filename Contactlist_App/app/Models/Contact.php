<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model{
    use HasFactory, SoftDeletes;
    /**
     * Assignable names .
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone',
        'CPF',
        'Status'
    ];

    protected $casts = [
        'Status' => ['A', 'B', 'C']
    ];

    public function contactList(){
        return $this->belongsToMany(ContactList::class);

    }
}
