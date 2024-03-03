@if(request()->is('finance/withdrawal'))
        <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>No ID</td>
                        <td>Nama Terapis</td>
                        <td>Jenis Kelamin</td>
                        <td>Asal kota</td>
                        <td>Tanggal</td>
                        <td>Status</td>
                        <td>Detail</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->terapis->id }}</td>
                            <td style="justify-content: space-between;">{{ $item->terapis->nama }}</td>
                            <td>{{ $item->jenis_kelamin != 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                            @foreach ($item->terapis->alamat as $alamat)
                                <td>{{ $alamat->provinsi }}</td>
                            @endforeach
                            <td> {{ date('d M Y', strtotime($item->tanggal)) }}</td>
                            @if($item->status == "pending")
                                <td><span style="color: red; font-weight: bold;">Menunggu Konfirmasi</span></td>
                            @elseif($item->status == "success")
                                <td><span style="color: green; font-weight: bold;">Dikonfirmasi</span></td>
                            @else
                                <td>Failed</td>
                            @endif
                            <td>
                                <span style="text-decoration: none; color: blue; cursor: pointer; font-weight:bold;" onclick="openDetailModal({{$item->id}})">Detail</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
@else
<table class="table table-bordered">
                <thead>
                    <tr>
                        <td>No ID</td>
                        <td>Nama Terapis</td>
                        <td>Jenis Kelamin</td>
                        <td>Asal kota</td>
                        <td>Tanggal</td>
                        <td>Status</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->terapis->id }}</td>
                            <td style="justify-content: space-between;">{{ $item->terapis->nama }}</td>
                            <td>{{ $item->jenis_kelamin != 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                            @foreach ($item->terapis->alamat as $alamat)
                                <td>{{ $alamat->provinsi }}</td>
                            @endforeach
                            <td> {{ date('d M Y', strtotime($item->tanggal)) }}</td>
                            @if($item->status == "pending")
                                <td><span style="color: red; font-weight: bold;">Menunggu Konfirmasi</span></td>
                            @elseif($item->status == "success")
                                <td><span style="color: green; font-weight: bold;">Dikonfirmasi</span></td>
                            @else
                                <td>Failed</td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
@endif