<table>
    <thead>
        <tr>
                <th>Id Barang</th>
                <th>Nama Barang</th>
                <th>Ruangan</th>
                <th>Total</th>
                <th>Rusak</th>
                <th>Dibuat Oleh</th>
                <th>Diedit Oleh</th>
        </tr>
    </thead>
   <tbody>
            @foreach($barang as $b)
            <tr>
                <td>{{$b->id_barang }}</td>
                <td>{{$b->nama_barang}}</td>
                <td>{{$b->ruangan->nama_ruangan}}</td>
                <td>{{$b->total}}</td>
                <td>{{$b->broken}}</td>
                <td>{{$b->user_create->name}}</td>
                <td>{{$b->user_update->name}}</td>
            </tr>
            @endforeach
        </tbody>
</table>