Senarai Haiwan

<ul>
    @foreach ($haiwans as $haiwan)
        <li>Nama:{{$haiwan->nama}} jenis: {{$haiwan->jenis}}, Harga: {{$haiwan->harga}}</li>
    @endforeach
</ul>

<form method="POST" action="/haiwans">
    @csrf

    nama: <input type="text" name="nama">
    jenis: <input type="text" name="jenis">
    harga: RM <input type="text" name="harga">
    

    <input type="hidden" name="haiwan_id" value=1>
    <button type="submit">Submit</button>
</form>