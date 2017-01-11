<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConverterController extends Controller
{
    public function convertToTable(Request $request)
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

        $timetable = [[], [], [], [], [], [], []];
        $timeslot = 0;

        foreach ($courses as $course) {
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
