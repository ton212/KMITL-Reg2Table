@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1">
            <div class="well">
                <div class="page-header">
                  <h3>ขั้นตอนที่ 2 <small>ตรวจสอบความถูกต้อง</small></h3>
                </div>
                <ul>
                    <li>ตรวจสอบความถูกต้องของข้อมูลที่ระบบอ่านได้จากขั้นตอนก่อนหน้า</li>
                    <li>ตารางที่ระบบสร้างขึ้นจะประกอบไปด้วย "รหัสวิชาและห้องเรียน" เท่านั้น</li>
                    <li>หากต้องการให้แสดงชื่อย่อรายวิชา คุณสามารถกำหนดชื่อย่อรายวิชาได้ในตารางด้านล่าง (เว้นว่างหากไม่ต้องการให้แสดงชื่อย่อวิชา)</li>
                    <li class="text-danger">วิชาที่ไม่มีกำหนดเวลาเรียน จะไม่แสดงในตาราง</li>
                </ul>
                <hr>
                <form action="{{ route('process.step2') }}" method="post">
                    {{ csrf_field() }}
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">ที่</th>
                                <th class="text-center">รหัสวิชา</th>
                                <th class="text-center">ชื่อวิชา</th>
                                <th class="text-center">กลุ่ม</th>
                                <th class="text-center" width="130px">เวลา</th>
                                <th class="text-center" width="90px">อาคาร</th>
                                <th class="text-center" width="70px">ห้องเรียน</th>
                                <th class="text-center" width="100px">ชื่อย่อวิชา</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($courses as $index => $course)
                                <tr>
                                    <td class="text-center">{{ $course[0] }}</td>
                                    <td class="text-center">{{ $course[1] }}</td>
                                    <td>{{ $course[2] }}</td>
                                    <td class="text-center">{{ $course[4] }}</td>
                                    <td class="text-center">{{ $course[5] }}</td>
                                    <td class="text-center">{{ $course[7] }}</td>
                                    <td class="text-center">{{ $course[6] }}</td>
                                    <td><input type="text" class="form-control input-sm text-center" name="acronym[{{ $index }}]"></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary">สร้างตาราง</button>
                </form>
            </div>
        </div>
    </div>
@endsection