<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory; // required for TaskFactory to work

    protected $fillable = ['title', 'description', 'long_description'];

    public function toggleComplete()
    {
        $this->completed = !$this->completed;
        $this->save();
    }
}

