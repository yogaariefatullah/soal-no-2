<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Helper;
use Faker\Provider\ar_EG\Address;
use App\Models\StudyProgram;
use Illuminate\Support\Facades\Auth;

class CustomerModel extends Model
{

    protected $primaryKey = 'cst_id';
    protected $table = 'customer';
    protected $guarded = [];

   
}
