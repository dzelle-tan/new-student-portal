<?php

namespace App\Services;

use App\Models\Professor;
use App\Models\Student;
use Carbon\Carbon;

class PLMEmail
{
    /**
     * Generate a PLM email for a student.
     * 
     * @param string $firstName
     * @param string $middleName
     * @param string $lastName
     * @param int $year
     * @return string
     */
    public static function generate($firstName, $middleName, $lastName, $year)
    {
        // Example name: Juan Two Ang Dela Cruz, 2021
        // Expected output: jtadelacruz2021@plm.edu.ph

        $firstNameInitial = PLMEmail::getInitials($firstName);
        $middleNameInitial = PLMEmail::getInitials($middleName);
        $plmEmail = $firstNameInitial . $middleNameInitial . strtolower($lastName) . $year . '@plm.edu.ph';

        return PLMEmail::verifyUniqueness($plmEmail);
    }

    /**
     * Get the initials of a name.
     * 
     * @param string $name
     * @return string
     */
    private static function getInitials($name)
    {
        $allNames = explode(' ', strtolower($name));
        $allNamesInitial = '';
        foreach ($allNames as $n) {
            $allNamesInitial .= strtolower(substr($n, 0, 1));
        }

        return $allNamesInitial;
    }

    /**
     * Verify the uniqueness of the PLM email among students and professors.
     * 
     * @param string $plmEmail
     * @return string
     */
    private static function verifyUniqueness($plmEmail)
    {

        $emailParts = explode('@', $plmEmail);
        $baseEmail = $emailParts[0];
        $domain = $emailParts[1];

        $counter = 1;
        $uniqueEmail = $plmEmail;
        while (Student::where('plm_email', $uniqueEmail)->exists()) {
            $uniqueEmail = $baseEmail . $counter . '@' . $domain;
            $counter++;
        }

        return $uniqueEmail;
    }
}
