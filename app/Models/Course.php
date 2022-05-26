<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    const OPTION_BEGINNER = 10;
    const OPTION_MIDDLE = 20;
    const OPTION_EXPERT = 30;

    const OPTION_LIST = [
        self::OPTION_BEGINNER => "初級",
        self::OPTION_MIDDLE => "中級",
        self::OPTION_EXPERT => "上級"
    ];

}
