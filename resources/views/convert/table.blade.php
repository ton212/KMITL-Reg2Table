@extends('layout.app')

@section('content')
    <?php
        $thDate = [
            0 => 'อาทิตย์',
            1 => 'จันทร์',
            2 => 'อังคาร',
            3 => 'พุธ',
            4 => 'พฤหัสบดี',
            5 => 'ศุกร์',
            6 => 'เสาร์',
        ];
    ?>
    <div class="well text-center hidden-print">
        <p class="text-muted"><strong>การสร้างตารางเรียนสำเร็จ! คุณสามารถสั่งพิมพ์หน้านี้ลงบนกระดาษได้ทันที แนะนำให้สั่งพิมพ์เป็นแนวนอนนะจ๊ะ 😚</strong></p>
        <span class="text-muted">(ข้อความและสีพื้นหลังของหน้านี้จะถูกซ่อนเมื่อพิมพ์)</span>
    </div>
    <div class="well">
        <div class="text-center timetable-info">
            <strong>ตารางเรียน</strong>
            @foreach($header as $line)
            {{ $line[0] }}<br>
            @endforeach
        </div>
        <hr>
        <table class="table table-bordered timetable">
            <tr>
                <th class="text-center"></th>
                @for($hour = '09'; $hour <= $timeslot; $hour++)
                    <th colspan="2" class="text-center timetable-time">{{ $hour }}:00</th>
                @endfor
            </tr>
            @for($date = 0; $date < 7; $date++)
                <tr style="">
                    <th class="text-center timetable-day">{{ $thDate[$date] }}</th>
                    @for($hour = '09'; $hour <= $timeslot; $hour++)
                        @if(array_has($timetable[$date], "{$hour}:00"))
                            <?php $course = $timetable[$date]["{$hour}:00"]; ?>
                            <td class="text-center timetable-course" colspan="{{ ($course[5][1][1] - $course[5][1][0]) * 2 }}">
                                <strong>{{ "{$course[1]}" }}</strong><br>
                                <span class="timetable-class_location">{{ "{$course[7]} / {$course[6]}" }}</span>
                            </td>
                            <?php $hour += ($course[5][1][1] - $course[5][1][0]) - 1; ?>
                        @elseif(array_has($timetable[$date], "{$hour}:30"))
                            <td></td>
                            <?php $course = $timetable[$date]["{$hour}:30"]; ?>
                            <td class="text-center timetable-course" colspan="{{ ($course[5][1][1] - $course[5][1][0]) * 2 }}">
                                <strong>{{ "{$course[1]}" }}</strong><br>
                                <span class="timetable-class_location">{{ "{$course[7]} / {$course[6]}" }}</span>
                            </td>
                            <?php $hour += $course[5][1][1] - $course[5][1][0]; ?>
                            <td></td>
                        @else
                            <td style="border-right: 0;"></td>
                            <td style="border-left: 0;"></td>
                        @endif
                    @endfor
                </tr>
            @endfor
        </table>
        <div class="text-right timetable-info" style="font-size: 10px;">
            สร้างจาก KMITL Timetable Converter<br>ที่ http://reg2table.iton.in.th
        </div>
    </div>
@endsection