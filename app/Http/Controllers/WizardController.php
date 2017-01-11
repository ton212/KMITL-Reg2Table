<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WizardController extends Controller
{
    public function stepOne()
    {
        return view('wizard.step1');
    }

    public function processStepOne(Request $request)
    {
        $rawData = array_map(function ($course) {
            return explode("\t\t", $course);
        }, explode("\n", $request->data));

        $courseStartOffset = 0;

        foreach ($rawData as $index => $data) {
            if (count($data) == 8 && $courseStartOffset == 0) {
                $courseStartOffset = $index;
            }
        }

        $header = array_slice(array_slice($rawData, $courseStartOffset - 5), 0, 5);

        $courses = array_filter($rawData, function ($data) {
            return (count($data) == 8 ? true : false);
        });

        $courses = array_slice($courses, 1);

        session([
            'header' => $header,
            'courses' => $courses
        ]);

        return redirect(route('wizard.step2'));
    }

    public function stepTwo()
    {
        return view('wizard.step2', [
            'courses' => session('courses')
        ]);
    }

    public function processStepTwo(Request $request)
    {
        $courses = session('courses');

        foreach ($request->acronym as $courseIndex => $value) {
            $courses[$courseIndex][8] = $value;
        }

        session(['courses' => $courses]);

        return redirect(route('convert.table'));
    }
}
