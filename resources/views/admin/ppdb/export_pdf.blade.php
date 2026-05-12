<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Data PPDB</title>
<style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { font-family: Arial, sans-serif; font-size: 11px; color: #333; }
    h1 { color: #166534; text-align: center; margin-bottom: 4px; font-size: 16px; }
    .subtitle { text-align: center; color: #666; margin-bottom: 16px; font-size: 10px; }
    table { width: 100%; border-collapse: collapse; }
    th { background: #166534; color: white; padding: 6px 8px; text-align: left; font-size: 10px; }
    td { padding: 5px 8px; border-bottom: 1px solid #e5e7eb; }
    tr:nth-child(even) { background: #f0fdf4; }
    .badge { display: inline-block; padding: 1px 6px; border-radius: 10px; font-size: 9px; font-weight: bold; }
    .badge-pending { background: #fef9c3; color: #854d0e; }
    .badge-diterima { background: #dcfce7; color: #166534; }
    .badge-ditolak { background: #fee2e2; color: #991b1b; }
    .badge-proses { background: #dbeafe; color: #1e40af; }
    footer { text-align: center; color: #999; font-size: 9px; margin-top: 16px; }
</style>
</head>
<body>
<h1>🕌 Madrasah Ibtidaiyah Miftahul Ulum</h1>
<div class="subtitle">Data Pendaftar PPDB | Dicetak: {{ date('d M Y, H:i') }}</div>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>No. Daftar</th>
            <th>Nama Siswa</th>
            <th>JK</th>
            <th>TTL</th>
            <th>Ayah / Ibu</th>
            <th>Telepon</th>
            <th>Tgl. Daftar</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ppdb_list as $i => $p)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $p->no_pendaftaran }}</td>
            <td><strong>{{ $p->nama_siswa }}</strong></td>
            <td>{{ $p->jenis_kelamin }}</td>
            <td>{{ $p->tempat_lahir }}, {{ $p->tanggal_lahir?->format('d/m/Y') }}</td>
            <td>{{ $p->nama_ayah }} / {{ $p->nama_ibu }}</td>
            <td>{{ $p->telepon }}</td>
            <td>{{ $p->created_at->format('d/m/Y') }}</td>
            <td><span class="badge badge-{{ $p->status }}">{{ $p->status }}</span></td>
        </tr>
        @endforeach
    </tbody>
</table>

<footer>Total {{ $ppdb_list->count() }} data. Dokumen ini digenerate otomatis oleh sistem MI Miftahul Ulum.</footer>
</body>
</html>
