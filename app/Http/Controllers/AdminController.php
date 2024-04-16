<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Course;

class AdminController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('admin.index', [
            'nama' => 'Admin 1',
            'courses' => $courses
        ]);
    }

    public function create() {
        return view('admin.add');
    }

    public function store(Request $request) {
//        dd($request->all());
        $course = Course::create([
            'name' => $request->get('name'),
            'semester' => $request->get('semester')
        ]);

        return redirect()->back()->with('success', 'Berhasil menambahkan mata kuliah');
    }

    public function edit(Course $course) {
        return view('admin.edit', compact('course'));
    }

    public function update(Request $request, Course $course) {
//        $course->update([
//            'name' => $request->get('name'),
//            'semester' => $request->get('semester')
//        ]);

        $course = Course::find($course->id);
        $course->name = $request->get('name');
        $course->semester = $request->get('semester');
        $course->save();
        return redirect()->back()->with('success', 'Berhasil menambahkan mata kuliah');
    }


    public function destroy(Course $course) {
        $nama = $course->name;
        $course->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus mata kuliah ' . $nama);
    }

    public function mahasiswa(Course $course) {
        $students = $course->students()->get();
        return view('admin.mahasiswa', compact('students', 'course'));
    }

    public function viewTambahMahasiswa(Course $course) {
        $students = Student::all();

        return view('admin.tambah-mahasiswa', compact('students', 'course'));
    }

    public function storeMahasiswa(Course $course, Request $request) {
        $course->students()->attach(
            [
                $request->get('id_mahasiswa') => ['lecturer_id' => 1, 'kp' => 'A']
            ]
        );

        return redirect()->back()->with('success', 'Berhasil Menambahkan Mahasiswa');
    }

    public function viewUbahMahasiswa(Course $course, Student $student) {
        return view('admin.ubah-mahasiswa', compact('course', 'student'));
    }

    public function ubahMahasiswa(Course $course, Student $student, Request $request) {
        $course->students()->syncWithoutDetaching(
            [$student->id, ['kp' => $request->get('kp')]]
        );

        return redirect()
            ->route('admin.matakuliah-mahasiswa', ['course' => $course->id])
            ->with('success', 'Berhasil Mengubah KP untuk Mahasiswa ' . $student->name);
    }

    public function deleteMahasiswa(Course $course, Student $student) {
        $course->students()->detach($student->id);

        return redirect()
            ->back()
            ->with('success', 'Berhasil Menghapus Mahasiswa ' . $student->name . ' Pada matakuliah ' . $course->name);
    }
}
