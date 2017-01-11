@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-xs-8 col-xs-offset-2">
            <div class="well">
                <div class="page-header">
                  <h3>ขั้นตอนที่ 1 <small>คัดลอกข้อมูลจากสำนักทะเบียน</small></h3>
                </div>
                <ol>
                    <li>เข้าสู่ระบบ <a href="https://www.reg.kmitl.ac.th/" target="_blank">สำนักทะเบียนสจล.</a> ตามปกติ</li>
                    <li>คลิกเลือกเมนู <strong>ลงทะเบียน (เพิ่ม-เปลี่ยน-ถอน)</strong></li>
                    <li>คลิกเลือกเมนู <strong>ตารางเรียน</strong> ทางด้านซ้ายมือ</li>
                    <li>เลือกภาคและปีการศึกษาที่ต้องการดูตารางเรียน จากนั้นคลิกปุ่ม <strong>ดูตารางเรียน</strong></li>
                    <li>กดปุ่ม Ctrl+A เพื่อเลือกข้อความทั้งหน้า และทำการคัดลอก (หรือกด Ctrl+C)</li>
                    <li>วางข้อความที่คัดลอกมาในช่องด้านล่าง และคลิกปุ่ม <strong>ถัดไป</strong></li>
                </ol>
                <hr>
                <form action="{{ route('process.step1') }}" method="post">
                    {{ csrf_field() }}
                	<div class="form-group">
                		<label>ข้อมูลจากสำนักทะเบียน</label>
                        <textarea name="data" rows="10" class="form-control"></textarea>
                	</div>
                	<button type="submit" class="btn btn-primary">ถัดไป</button>
                </form>
            </div>
        </div>
    </div>
@endsection