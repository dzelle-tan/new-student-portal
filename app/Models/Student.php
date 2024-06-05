<?php

namespace App\Models;

use App\Services\PLMEmail;
use App\Services\StudentCredential;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Support\Str;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable;

class Student extends Model implements AuthenticatableContract
{
    use HasFactory, Notifiable, Authenticatable;

    protected $primaryKey = 'student_no';
    public $incrementing = false;

    protected $guarded = [
        'created_at',
        'updated_at',
    ];

    private function generatePLMEmail() {
        $this->plm_email = PLMEmail::generate($this->first_name, $this->middle_name, $this->last_name, $this->entry_date);
        $this->save();
    }

    public static function generateStudentNumber($entry_date, $city_id, $aysem_id) {
        $entryYear = $entry_date->format('Y');
        
        // Series number which is the next number in the total number of students in a specific aysem
        $series = Student::where('aysem_id', $aysem_id)->count() + 1;
        
        // Check if the student's 'city_id' belongs to 'Manila'
        $city = City::find($city_id);
        $cityName = $city->city_name;
        $cityIsManila = $cityName === 'Manila';
        // If the student lives in manila, create a variable with value 0, else 1
        $cityNumber = $cityIsManila ? 0 : 1;

        $studentNo = $entryYear . $cityNumber . str_pad($series, 4, '0', STR_PAD_LEFT);
        
        return $studentNo;
    }

    private function storePassword($password) {
        $this->password = Hash::make($password);
        $this->save();
    }
    
    private function addTerm($aysemId) {
        $this->terms()->create([
            'aysem_id' => $aysemId,
            'registration_status_id' => RegistrationStatus::where('status', 'Pending')->first()->id,
        ]);
    }

    public function terms(): HasMany
    {
        return $this->hasMany(StudentTerm::class);
    }

    protected static function booted()
    {
        static::created(function ($student) {
            $student->generatePLMEmail();
            $randomPassword = Str::random(6);
            $student->storePassword($randomPassword);
            StudentCredential::addToPendingCredentials($student->student_no, $randomPassword);
        });
    }
}
