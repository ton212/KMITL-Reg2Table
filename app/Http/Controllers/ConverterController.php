<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConverterController extends Controller
{
    public function convertToTable(Request $request)
    {
        if (!$request->session()->has('courses')) {
            return redirect(route('index'));
        }

        $courses = session('courses');
        $header = session('header');

        $timetable = [[], [], [], [], [], [], []];
        $timeslot = 16;

        foreach ($courses as $course) {
            try {
                $timestamp = explode(' ', $course[5]);
                $time = explode('-', $timestamp[1]);

                if ($time[1] >= '19:00' or $timeslot == 20) {
                    $timeslot = 20;
                } else {
                    $timeslot = 16;
                }

                $timestamp[1] = $time;
                $course[5] = $timestamp;

                $timetable[$this->thDateToNumeric($timestamp[0])][$time[0]] = $course;
            } catch (\Exception $e) {
                continue;
            }
        }

        $timetable = array_map(function ($day) {
            ksort($day);
            return $day;
        }, $timetable);

        return view('convert.table', compact('timetable', 'timeslot', 'header'));
    }

    private function thDateToNumeric($date)
    {
        return [
            'อา.' => 0,
            'จ.'  => 1,
            'อ.'  => 2,
            'พ.'  => 3,
            'พฤ.' => 4,
            'ศ.'  => 5,
            'ส.'  => 6,
        ][$date];
    }
}
