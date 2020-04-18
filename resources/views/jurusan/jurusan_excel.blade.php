<table>
    <thead>
        <tr>
                <th>No</th>
                <th>Jurusan</th>
                <th>Fakultas</th>
                <th>Waktu terbuat</th>
                <th>Waktu terupdate</th>
        </tr>
    </thead>
   <tbody>
            @foreach($jurusan as $jurusan)
            <tr>
                <td>{{$jurusan->id}}</td>
                <td>{{$jurusan->nama_jurusan}}</td>
                <td>{{$jurusan->fakultas->nama_fakultas}}</td>
                <td>{{$jurusan->created_at}}</td>
                <td>{{$jurusan->updated_at}}</td>
            </tr>
            @endforeach
        </tbody>
</table>