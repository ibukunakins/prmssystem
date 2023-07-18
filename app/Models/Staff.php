<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'title',
        'address',
        'post_code',
        'city',
        'phone',
        'email',
        'gender',
        'dob',
        'marital_status',
        'department_id',
        'user_id'
    ];
    public $appends = ['fullName', 'readableGender', 'readableMarital'];

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'username';
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    /**
     * @param array $options
     * @return bool|null|void
     * @throws \Exception
     */
    public function delete(array $options = [])
    {
        if ($this->image)
        {
            $this->image->delete();
        }

        return parent::delete($options);
    }

    public function user() 
    {
        return $this->belongsTo(User::class);
    }
    
    function getFullNameAttribute() 
    {
        return $this->first_name . ' ' . $this->middle_name . ' ' . $this->last_name;    
    }
    
    function getReadableGenderAttribute() 
    {
        $code = [
            'm' => 'Male',
            'o' => 'Others',
            'f' => 'Female',
        ];

        return $code[$this->gender];
    }
    
    function getReadableMaritalAttribute() 
    {
        $code = [
            'w' => 'Widowed',
            's' => 'Single',
            'm' => 'Married',
            'd' => 'Divirced',
        ];

        return $code[$this->marital_status];
    }
}
