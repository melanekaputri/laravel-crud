<table class="table" style="border:1px solid #ddf">
    <thead>
        <tr>
            <th>NAMA LENGKAP</th>
            <th>JENIS KELAMIN</th>
            <th>AGAMA</th>
            <th>ALAMAT</th>
            <th>RATA-RATA NILAI</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($siswa as $s)
        <tr>
            <td>{{$s->nama_lengkap()}}</td>
            <td>{{$s->jenis_kelamin}}</td>
            <td>{{$s->agama}}</td>
            <td>{{$s->alamat}}</td>
            <td>{{$s->rataNilai()}}</td>
        </tr>
        @endforeach
    </tbody>
</table>