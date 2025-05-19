@extends('layouts.main')

@section('title', 'Surat Masuk')

@section('content')
<div class="bg-white p-4 rounded shadow">
  <h2 class="text-xl font-bold text-[#192f46] mb-4">Daftar Surat Masuk</h2>

  @if($suratMasuk->isEmpty())
    <p class="text-gray-600">Tidak ada surat masuk saat ini.</p>
  @else
    <table class="table-auto w-full text-left border">
        <thead class="bg-[#192f46] text-white">
            <tr>
                <th class="p-2">Nama Murid</th>
                <th class="p-2">Alasan</th>
                <th class="p-2">Tanggal Pengajuan</th>
                <th class="p-2">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suratMasuk as $surat)
                <tr class="border-t">
                    <td class="p-2">{{ $surat->murid_id }}</td>
                    <td class="p-2">{{ $surat->alasan }}</td>
                    <td class="p-2">{{ $surat->tanggal_pengajuan }}</td>
                    <td class="p-2">{{ $surat->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
  @endif
</div>
@endsection
