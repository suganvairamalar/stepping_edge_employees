<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class EmployeeDetailLeave extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'employee_leave_details';



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['employee_name','emp_id','leave_type','from_date','to_date','no_of_days','leave_status'];


    protected $dates = ['from_date', 'to_date'];

    public function getFromDateAttribute($value){         
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getToDateAttribute($value){         
        return Carbon::parse($value)->format('d-m-Y');
    }

     public function setFromDateAttribute($from_date)
    {
        $this->attributes['from_date'] = Carbon::parse($from_date)->toDateString(); //'toDateTimeString(); use to dd:mm:yyyy:hh:mm:ss
    }

    public function setToDateAttribute($to_date)
    {
        $this->attributes['to_date'] = Carbon::parse($to_date)->toDateString(); 
    }
    
}
