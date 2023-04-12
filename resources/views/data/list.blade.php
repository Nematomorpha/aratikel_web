<h1>Data kategori</h1>

{{-- {{ $id }}    --}}

<ul>
    @foreach ($kategori as $item)
    @if ($id == $item['id'])
    <li>{{ $item['id'] ." ". $item['nama_kategori']}}</li>
    @break
    @endif
    @endforeach
    @if ($id != $item['id'])
    {{"ID tidak ditemukan"}}
    @endif

</ul>