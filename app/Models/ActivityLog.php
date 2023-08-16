<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class ActivityLog extends Model
{
    use HasFactory;

    public function user()
{
    return $this->belongsTo(User::class);
}
    protected $table = 'activity_logs';

    protected $fillable = ['user_id', 'activity_description'];



}
