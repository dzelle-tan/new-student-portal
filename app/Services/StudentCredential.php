<?php

namespace App\Services;

use App\Models\PendingEmailPLMEmail;
use App\Models\PendingEmailStudentPortal;

class StudentCredential
{
    /**
     * Add the student's credentials to the pending credentials (Student portal and PLM email).
     * 
     * @param int $studentId
     * @param string $tempPassword
     * @return void
     */
    public static function addToPendingCredentials($studentId, $tempPassword)
    {
        PendingEmailStudentPortal::create([
            'student_no' => $studentId,
            'temp_password' => $tempPassword,
        ]);

        PendingEmailPLMEmail::create([
            'student_no' => $studentId,
            'temp_password' => $tempPassword,
        ]);
    }

    /**
     * Remove the student's pending Student Portal credentials email.
     * 
     * @param int $studentId
     * @return void
     */
    public static function removePendingStudPortal($studentId)
    {
        PendingEmailStudentPortal::where('student_no', $studentId)->delete();
    }

    /**
     * Remove the student's pending PLM email credentials email.
     * 
     * @param int $studentId
     * @return void
     */
    public static function removePendingPLMEmail($studentId)
    {
        PendingEmailPLMEmail::where('student_no', $studentId)->delete();
    }
}
