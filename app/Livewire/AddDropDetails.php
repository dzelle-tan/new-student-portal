<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Classes;
use App\Models\TemporaryClasses;
use App\Models\AddDropRequest;
use Illuminate\Support\Facades\Auth;

class AddDropDetails extends Component
{
    public $classes = [];
    public $addedClasses = [];
    public $droppedClasses = [];
    public $dropdownContent = [];
    public $reason = '';
    public $otherReasons = '';

    public function mount()
    {
        $this->classes = TemporaryClasses::all();
        $this->dropdownContent = $this->classes->toArray();
    }
    public function updatedReason($value)
    {
        if ($value !== 'others') {
            $this->otherReasons = '';
        }
    }

    public function addClass($subjectCode)
    {
        $class = $this->classes->firstWhere('subject_code', $subjectCode);
        if ($class) {
            $this->addedClasses[] = $class;
            $this->dropdownContent = array_values(array_filter($this->dropdownContent, function ($c) use ($subjectCode) {
                return $c['subject_code'] !== $subjectCode;
            }));
        }
    }

    public function dropClass($subjectCode)
    {
        $class = $this->classes->firstWhere('subject_code', $subjectCode);
        if ($class) {
            $this->droppedClasses[] = $class;
            $this->dropdownContent = array_values(array_filter($this->dropdownContent, function ($c) use ($subjectCode) {
                return $c['subject_code'] !== $subjectCode;
            }));
        }
    }

    public function removeClass($subjectCode, $type)
    {
        if ($type == 'added') {
            $this->addedClasses = array_values(array_filter($this->addedClasses, function ($c) use ($subjectCode) {
                return $c['subject_code'] !== $subjectCode;
            }));
        } else if ($type == 'dropped') {
            $this->droppedClasses = array_values(array_filter($this->droppedClasses, function ($c) use ($subjectCode) {
                return $c['subject_code'] !== $subjectCode;
            }));
        }
    }

    public function saveChanges()
    {
        $student = Auth::user();

        $addDropDetails = [
            'added' => $this->addedClasses,
            'dropped' => $this->droppedClasses,
            'reason' => $this->reason == 'others' ? $this->otherReasons : $this->reason,
        ];

        AddDropRequest::create([
            'student_no' => $student->student_no,
            'add_drop_form' => json_encode($addDropDetails),
            'status' => 'Pending',
            'date_of_request' => now(),
        ]);

    }

    public function render()
    {
        return view('livewire.add-drop-details', [
            'dropdownContent' => $this->dropdownContent,
            'addedClasses' => $this->addedClasses,
            'droppedClasses' => $this->droppedClasses,
        ]);
    }
}