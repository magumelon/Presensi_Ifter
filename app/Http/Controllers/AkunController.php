<?php
    namespace App\Http\Controllers;

    use App\Models\Murid;
    use App\Models\Guru;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

    class AkunController extends Controller
    {
        // Menampilkan halaman akun (baik guru atau murid)
        public function index()
        {
            $user = Auth::user();

            // Jika role-nya guru
            if ($user->role === 'guru') {
                // Ambil data guru berdasarkan user_id
                $guru = Guru::where('user_id', $user->id)->first();

                if (!$guru) {
                    return redirect()->route('dashboard')->with('error', 'Data guru tidak ditemukan.');
                }

                return view('guru.account', compact('user', 'guru'));

            } elseif ($user->role === 'murid') {
                // Jika role-nya murid
                $murid = Murid::where('user_id', $user->id)->first();

                if (!$murid) {
                    return redirect()->route('dashboard')->with('error', 'Data murid tidak ditemukan.');
                }

                return view('Siswa.akun', compact('user', 'murid'));
            }

            return redirect()->route('dashboard')->with('error', 'Role tidak dikenali.');
        }

        // Update data akun murid
        public function update(Request $request)
        {
            $user = Auth::user();

            // Validasi dan update sesuai role (guru atau murid)
            if ($user->role === 'guru') {
                $guru = Guru::where('user_id', $user->id)->first();
                if (!$guru) {
                    return redirect()->route('akun')->with('error', 'Data guru tidak ditemukan.');
                }

                // Validasi dan update data guru
                $request->validate([
                    'nama'   => 'required|string|max:255',
                    'alamat' => 'nullable|string|max:255',
                    'nip'    => 'required|string|max:20|unique:gurus,nip,' . $guru->id,
                    'nohp'   => 'required|string|max:255',
                ]);

                $guru->update([
                    'nama'   => $request->nama,
                    'alamat' => $request->alamat,
                    'nip'    => $request->nip,
                    'nohp'   => $request->nohp,
                ]);
            } else {
                // Jika role murid
                $murid = Murid::where('user_id', $user->id)->first();
                if (!$murid) {
                    return redirect()->route('akun')->with('error', 'Data murid tidak ditemukan.');
                }

                // Validasi dan update data murid
                $request->validate([
                    'nama'   => 'required|string|max:255',
                    'alamat' => 'nullable|string|max:255',
                    'nisn'   => 'required|string|max:10|unique:murid,nisn,' . $murid->id,
                    'nohp'   => 'required|string|max:255',
                ]);

                $murid->update([
                    'nama'   => $request->nama,
                    'alamat' => $request->alamat,
                    'nisn'   => $request->nisn,
                    'nohp'   => $request->nohp,
                ]);
            }

            return redirect()->route('akun')->with('success', 'Informasi berhasil diperbarui.');
        }

        public function akunGuru()
        {
            $guru = auth()->user(); // ambil data guru yang login
            return view('akun_guru', compact('guru'));
        }

        public function updateGuru(Request $request)
        {
            $guru = auth()->user();
            $guru->name = $request->name;
            $guru->email = $request->email;
            $guru->save();

            return redirect()->back()->with('success', 'Data akun guru berhasil diperbarui!');
        }
    }
?>