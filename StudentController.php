<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;


class StudentController extends Controller
{
    public function index()
    {
        // $nama = 'Danny Ramadhan';
        //$nim = '2030511017';

        $student = Student::latest()->paginate(2);
        //('id', 'asc')

        //$student = null
        //var_dump($student);
        return view('student', compact('student'));


        //return view('student', compact('name', 'nim'));
    }

    public function create()
    {
        return view('create_student');
    }

    public function store(Request $request)
    {
        //validasi
        $this->validate($request, [
            'nim' => 'required|min:10|max:15',
            'name' => 'required'
        ]);



        //tampil data
        // echo $request->nim;
        // echo '<br>';
        //echo $request->name;

        // echo $request->get('nim');
        //echo '<br>';
        //echo $request->get('name');

        $student = Student::create([
            'nim' => $request->nim,
            'name' => $request->name
        ]);

        return redirect()->route('student.index')
            ->with('success', 'Data Mahasiswa Berhasil Di Simpan ');

        //simpan
        //  student::create([
        //     'nim'=>request => nim,
        //    'nama'=>request => name,
        //]),

        //redirect
    }

    public function show($id, $class, $name)
    {
        echo 'id mahasiswa: ', $id;
        echo '<br>';
        echo 'kelas mahasiswa: ', $class;
        echo '<br>';
        echo 'nama mahasiswa: ', $name;
    }

    private function getData()
    {
        return [
            [
                'id' => 1,
                'nim' => '2030511017',
                'name' => 'Danny Ramadhan'
            ],
            [
                'id' => 2,
                'nim' => '21100573122',
                'name' => 'Randy Orto'
            ],
            [
                'id' => 3,
                'nim' => '2110032110',
                'name' => 'Thomas Shelby'
            ]

        ];
    }
}
