<!DOCTYPE html>
<html>
<head>
	<title>Berita Acara Pengadaan</title>
	<link rel="stylesheet" href="{{asset('/css/pdf.css')}}">
</head>
<body>
	<div class="kop">
		<div class="logo">
			<center>
				<img src="{{asset('/images/logo_sumenep.png')}}" width="90px">
			</center>
		</div>
		<div class="judul">
			<p>PEMERINTAH KABUPATEN SUMENEP</p>
			<p class="bold">DINAS PARIWISATA KEBUDAYAAN PEMUDA DAN OLAH RAGA</p>
			<p>Jl. Dr. Soetomo No. 5 Telp. 0328 - 667148, Fax. 0328 - 672617</p>
			<p class="bold underline">SUMENEP</p>
			<p class="text-right italic">Kode Pos 69416</p>
		</div>
	</div>
	<br>
	<div class="content">
		<div class="jud">
			<p class="bold underline">BERITA ACARA PENGADAAN BARANG</p>
			<p>Nomor: {{$kegiatan->kode}}</p>
		</div>
		<p style="text-indent: 40px"> Pada hari ini .............  tanggal ............ bulan .............. tahun ........... pukul ..........., yang bertanda tangan di bawah ini:</p>
		<table cellpadding="7px">
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><strong>{{$kegiatan->user->name}}</strong></td>
			</tr>
			<tr>
				<td>NIP</td>
				<td>:</td>
				<td><strong>{{$kegiatan->user_id}}</strong></td>
			</tr>
			<tr>
				<td>Jabatan</td>
				<td>:</td>
				<td><strong>{{$kegiatan->profile->role->role}}</strong></td>
			</tr>
		</table>
		<p style="text-indent: 40px">Dalam rangka diadakannya kegiatan <strong>{{$kegiatan->nama_kegiatan}}</strong>, maka akan lakukan pengadaan barang berupa:</p>
		<table id="pengadaan">
			<tr>
				<th>No</th>
				<th>Nama Barang</th>
				<th>Jumlah</th>
				<th>Harga Satuan (Rp)</th>
				<th>Harga Total (Rp)</th>
				<th>Kategori</th>
				<th>No BST</th>
			</tr>
		@foreach ($pengadaan as $key => $data)
			<tr>
				<td align="center">{{ ++$key }}</td>
				<td>{{ $data->nama }}</td>
				<td>{{ $data->jumlah }}</td>
				<td>{{ $data->harga_satuan }}</td>
				<td>{{ $data->total }}</td>
				<td>{{ $data->kategori->nama_kategori }}</td>
				<td>{{ $data->no_bst }}</td>
			</tr>
		@endforeach
		</table>
		<p style="text-indent: 40px">Demikian Berita Pengadaan Barang ini dibuat dan ditandatangani untukdipergunakan sebagaimana mestinya.</p>

		<div class="ttd">
			<div class="kiri">
				<p>Mengetahui</p>
				<p>An. Kepala DISPARBUDPORA Kab.Sumenep</p>
				<p>Pejabat Penatausaha Pengguna Barang</p>
				<br><br><br><br><br><br><br>
				<hr width="80%">
				<p>NIP: </p>

			</div>
			<div class="kanan">
				<p>Sumenep, .......</p>
				<p>Pengaju</p>
				<br><br><br><br><br><br><br><br>
				<hr width="80%">
				<p>NIP: </p>
			</div>
		</div>
	</div>
</body>
</html>