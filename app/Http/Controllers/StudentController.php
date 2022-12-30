<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRequestStudent;
use App\Http\Requests\UpdataRequestParent;
use App\Http\Requests\UpdataRequestProfile;
use App\Http\Requests\UpdataRequestScholl;
use App\Http\Requests\UpdateRequestPhoto;
use App\Jobs\SendRegisStudent;
use App\Jobs\SendWa;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Prestasi;
use App\Models\School;
use App\Models\Student;
use App\Models\Temp;
use App\Models\User;

use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use PHPUnit\Framework\Constraint\Count;

class StudentController extends Controller
{

    public function index()
    {
        $title = 'Dashboard';
        $student = Student::where('user_id', auth()->id())->first();
        $count = Student::where('user_id',auth()->id())->get()->count();
        $schools = School::all();
        //dd($count);
        return view('siswa.home' , compact('student','title','count','schools'));
    }

    public function store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'name'=>'required|unique:students',
            'jenis_kelamin'=>'required',
            'namaayah'=>'required',
            'asal_sekolah'=>'required',
            'kecamatan_pd'=>'required',
            'kota_pd'=>'required',
            'nohp_siswa'=>'required|min:10|numeric'
        ],
        [
            'name.required'=>'Nama Lengkap Wajib Diisi',
            'kota_pd.required'=>'Kota / Kabupaten Wajib Diisi',
            'namaayah.required'=>'Nama Ayah Wajib Diisi',
            'nohp_siswa.required'=>'Nomor Hp Siswa Wajib Diisi',
            'nohp_siswa.min'=>'Nomor Hp Siswa minimal 10 Angka',
            'nohp_siswa.numeric'=>'Nomor Hp Siswa Wajib Angka',
            'asal_sekolah.required'=>'Asal Sekolah Wajib Diisi',
            'kecamatan_pd.required'=>'Kecamatan Domisili Wajib Diisi',
            'jenis_kelamin.required'=>'Jenis Kelamin Wajib Di Pilih',
            'name.unique'=>'Nama '.$request->name.' Sudah Terdaftar',

            ]);
        if ($valid->fails())
        {
            return response()->json(['errors'=>$valid->errors()->all()]);
        }
            $Id = IdGenerator::generate(['table' => 'students','field'=>'nodaftar', 'length' => 10, 'prefix' =>('SMATEL-')]);
            $studentid = Student::all()->count();
            $student = Student::create([
                'name'=>$request->name,
                'kecamatan_pd'=>$request->kecamatan_pd,
                'kota_pd'=>$request->kota_pd,
                'jenis_kelamin'=>$request->jenis_kelamin,
                'asal_sekolah'=>$request->asal_sekolah,
                'user_id'=> auth()->id(),
                'nodaftar'=>$Id,
                'nohp_ortu'=>Auth::user()->nohp,
                'nohp_siswa'=>$request->nohp_siswa,
                'id'=>$studentid+1,
                'namaayah'=>$request->namaayah,
            ]);
            SendRegisStudent::dispatch($student);
            return response()->json(['success'=>'Data is successfully added']);
    }

    public function edit(Student $student)
    {
        $title = 'Data Pribadi';
        //okeyeyyey
        $siswa = new Student();
        $jenis_kelamin = $siswa->jenis_kelamin();
        $agama = $siswa->agama();
        $hoby = $siswa->hoby();
        $cita = $siswa->cita();
        return view('siswa.index', compact('student', 'title','jenis_kelamin','agama','hoby','cita'));
    }

    public function editsekolah(Student $student)
    {
        $title = 'Data Sekolah';
        $schools = School::all();
        return view('siswa.sekolah', compact('student', 'title','schools'));
    }

    public function editparent(Student $student)
    {
        $title = 'Data Sekolah';
        $siswa = new Student();
        $pendidikan = $siswa->pendidikan();
        $pekerjaan = $siswa->pekerjaan();
        $penghasilan = $siswa->penghasilan();
        return view('siswa.parent', compact('student', 'pendidikan','pekerjaan','penghasilan','title'));
    }

    public function editphoto(Student $student)
    {
        $title = 'Upload Foto';
        return view('siswa.photo', compact('student','title'));
    }

    public function studentprofile(UpdataRequestProfile $request, Student $student)
    {
        $student->update($request->validated());
        return redirect()->back()->with('success', 'Data berhasil Di Update');

    }

    public function updatesekolah(UpdataRequestScholl $request, Student $student)
    {
        $student->update($request->validated());
        return redirect()->back()->with('success', 'Data Sekolah berhasil Di Update');
    }

    public function updateparent(UpdataRequestParent $request, Student $student)
    {
        $student->update($request->validated());
        return redirect()->back()->with('success', 'Data Orang Tua berhasil Di Update');
    }

    public function uploadphoto(UpdateRequestPhoto $request, Student $student)
    {
        if ($request->file('foto')){
            if ($request->oldfile) {
                Storage::delete($request->oldfile);
            }
            $save=$request->file('foto')->store('pasphoto');
        }
        $student->update(['foto'=>$save]);
        return redirect()->back()->with('success', 'Pas Foto berhasil Di Update');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with(['delete' => 'Data Siswa Baru Berhasil Dihapus']);
    }

    public function prestasi(Student $student)
    {
        $title = 'Data Prestasi Siswa';
        $prestasi = Prestasi::where('student_id', $student->id)->get();
        $count = count($prestasi);
        //dd($count);
        return view('siswa.prestasi', compact('student', 'prestasi','count', 'title'));
    }

    public function addprestasi(Request $request, Student $student)
    {

        if ($request->file('sertifikat')){
            $save=$request->file('sertifikat')->store('sertifikat');
        }
        $data = ([
            'student_id' => $student->id,
            'nama_kegiatan' => $request->nama_kegiatan,
            'jenis_kegiatan' => $request->jenis_kegiatan,
            'tingkat' => $request->tingkat,
            'tahun' => $request->tahun,
            'hasil' => $request->hasil,
            'sertifikat'=>$save,
        ]);
        $prestasi = Prestasi::create($data);
        return redirect()->back()->with('success', 'Pas Foto berhasil Di Update');

    }

    public function updateprestasi(Request $request, $item)
    {
        if ($request->file('sertifikat')){
            if ($request->oldfile) {
                Storage::delete($request->oldfile);
            }
            $save=$request->file('sertifikat')->store('sertifikat');
            $prestasi = Prestasi::find($item);
            $prestasi->update([
                'nama_kegiatan'=>$request->nama_kegiatan,
                'jenis_kegiatan'=>$request->jenis_kegiatan,
                'tingkat'=>$request->tingkat,
                'tahun'=>$request->tahun,
                'hasil'=>$request->hasil,
                'sertifikat'=>$save,
            ]);
        }elseif ($request->file('sertifikat')==null){
            $prestasi = Prestasi::find($item);
            $prestasi->update([
                'nama_kegiatan'=>$request->nama_kegiatan,
                'jenis_kegiatan'=>$request->jenis_kegiatan,
                'tingkat'=>$request->tingkat,
                'tahun'=>$request->tahun,
                'hasil'=>$request->hasil,
            ]);
        }
        return redirect()->back()->with('success', 'Pas Foto berhasil Di Update');
    }

    public function deleteprestasi ($item)
    {
        $prestasi = Prestasi::find($item);
        Storage::delete($prestasi->sertifikat);
        $prestasi->delete();
        return redirect()->back()->with('success', 'Prestasi berhasil Dihapus');

    }

    public function files(Request $request, Student $student)
    {
        return view('siswa.file', compact('student'));
    }

    public function verifikasisiswa(Student $student)
    {
        $title = 'Verifikasi Data Siswa';
        $prestasi = Prestasi::where('student_id', $student->id)->get();
        return view('siswa.verifikasi', compact('student','title','prestasi'));
    }

    public function confirm(Request $request, Student $student)
    {
        $confirm = Student::find($student->id);
        $confirm->update(['verifikasi'=>$request->verifikasi]);
        return redirect()->back()->with('success', 'Data Berhasil di Simpan Permanen');
    }

    public function addpayment(Student $student)
    {
        $json = json_decode($request->get('json'));
        $data = ([
            'student_id'=>$student->id,
            'status'=>$json->transaction_status,
            'order_id'=>$json->order_id,
            'gross_amount'=>$json->gross_amount,
            'payment_type'=>$json->payment_type,
            'status_message'=>$json->status_message,
            'pdf_url'=>$json->pdf_url,
        ]);
        $payment = Payment::create($data);
        return redirect()->back()->with('success', 'Prestasi berhasil Dihapus');
    }

    public function editcard(Student $student)
    {
        $title = 'Persyaratan';
        return view('siswa.persyaratan.card', compact('student','title'));
    }

    public function uploadcard(Request $request,$student)
    {
        $test = Student::find($student);
        if ($request->file('ijazah')){
            if ($test->ijazah) {
                Storage::delete($test->ijazah);
            }
            $save=$request->file('ijazah')->store('ijazah');
        }
        $test->update([
            'ijazah'=>$save,
        ]);
       return redirect()->back();
    }

    public function ijazah(Student $student)
    {
        $title = 'Persyaratan';
        return view('siswa.persyaratan.ijazah', compact('student','title'));
    }

    public function kk(Student $student)
    {
        $title = 'Persyaratan';
        return view('siswa.persyaratan.kk', compact('student','title'));
    }

    public function uploadkk(Request $request,$student)
    {
        $test = Student::find($student);
        if ($request->file('kk')){
            if ($test->kk) {
                Storage::delete($test->kk);
            }
            $save=$request->file('kk')->store('kk');
        }
        $test->update([
            'kk'=>$save,
        ]);
        return redirect()->back();
    }
    public function akte(Student $student)
    {
        $title = 'Persyaratan';
        return view('siswa.persyaratan.akte', compact('student','title'));
    }
    public function uploadakte(Request $request,$student)
    {
        $test = Student::find($student);
        if ($request->file('akte')){
            if ($test->akte) {
                Storage::delete($test->akte);
            }
            $save=$request->file('akte')->store('akte');
        }
        $test->update([
            'akte'=>$save,
        ]);
        return redirect()->back();
    }

}
