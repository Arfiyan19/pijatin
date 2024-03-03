    @if(request()->is('finance/transfer'))
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>Select</td>
                    <td>Nomor Id</td>
                    <td>Nama</td>
                    <td>Tanggal</td>
                    <td>Durasi</td>
                    <td>Metode</td>
                    <td>Status</td>
                    <td>Rupiah</td>
                    <td>Detail</td>
                </tr>
            </thead>

            <tbody>
                @forelse ($data as $item)
                <tr>
                    <td><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                    <td>P{{ $item->id }}</td>
                    <td>{{ $item->customers->nama }}</td>
                    <td>{{ date('d M Y', strtotime($item->tanggal_pemesanan)) }}</td>
                    @foreach ($item->pemesanan_detail as $detailPemesanan)
                    <td>{{ $detailPemesanan->layanan->durasi }} Menit</td>
                    @endforeach
                    @if( $item->metode_pembayaran == 'Cash' )
                        <td><span>Cash</span></td>
                    @elseif( $item->metode_pembayaran == 'Transfer Bank' )
                        <td><span>Transfer</span></td>
                    @endif
                    <td>
                        @if ($item->status_pembayaran == 'Dalam Proses')
                            <span style="color:red; font-weight:bold;">Belum Lunas</span>
                        @elseif ($item->status_pembayaran == 'Pembayaran Sukses')
                            <span style="color:green; font-weight:bold;">Lunas</span>
                        @elseif ( $item->status_pembayaran == 'Uang Kembali')
                            <span style>Uang Kembali</span>
                        @else
                            <span style="color:red">{{ $item->status_pembayaran }}</span>
                        @endif
                    </td>
                    <td>Rp {{ number_format($item->total_bayar, 0, ',', '.') }}</td>
                    <td>
                        <span style="text-decoration: none; color: blue; cursor: pointer; font-weight:bold;" onclick="openDetailModal({{$item->id}})">Detail</span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10">Maaf Nama tidak ditemukan..</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    @elseif(request()->is('finance/transfer/export'))
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Nomor Id</td>
                    <td>Nama</td>
                    <td>Tanggal</td>
                    <td>Durasi</td>
                    <td>Metode</td>
                    <td>Status</td>
                    <td>Rupiah</td>
                </tr>
            </thead>

            <tbody>
                @forelse ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>P{{ $item->id }}</td>
                    <td>{{ $item->customers->nama }}</td>
                    <td>{{ date('d M Y', strtotime($item->tanggal_pemesanan)) }}</td>
                    @foreach ($item->pemesanan_detail as $detailPemesanan)
                    <td>{{ $detailPemesanan->layanan->durasi }} Menit</td>
                    @endforeach
                    @if( $item->metode_pembayaran == 'Cash' )
                        <td><span>Cash</span></td>
                    @elseif( $item->metode_pembayaran == 'Transfer Bank' )
                        <td><span>Transfer</span></td>
                    @endif
                    <td>
                        @if ($item->status_pembayaran == 'Dalam Proses')
                            <span style="color:red; font-weight:bold;">Belum Lunas</span>
                        @elseif ($item->status_pembayaran == 'Pembayaran Sukses')
                            <span style="color:green; font-weight:bold;">Lunas</span>
                        @elseif ( $item->status_pembayaran == 'Uang Kembali')
                            <span style>Uang Kembali</span>
                        @else
                            <span style="color:red">{{ $item->status_pembayaran }}</span>
                        @endif
                    </td>
                    <td>Rp {{ number_format($item->total_bayar, 0, ',', '.') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="10">Maaf Nama tidak ditemukan..</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        
    @elseif(request()->is('finance/cash'))
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>Select</td>
                    <td>No</td>
                    <td>Nomor Id</td>
                    <td>Nama</td>
                    <td>Tanggal</td>
                    <td>Durasi</td>
                    <td>Metode</td>
                    <td>Status</td>
                    <td>Rupiah</td>
                    <td>Detail</td>
                </tr>
            </thead>

            <tbody>
                @forelse ($data as $item)
                <tr>
                    <td><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                    <td>{{ $loop->iteration }}</td>
                    <td>P{{ $item->id }}</td>
                    <td>{{ $item->customers->nama }}</td>
                    <td>{{ date('d M Y', strtotime($item->tanggal_pemesanan)) }}</td>
                    @foreach ($item->pemesanan_detail as $detailPemesanan)
                    <td>{{ $detailPemesanan->layanan->durasi }} Menit</td>
                    @endforeach
                    @if( $item->metode_pembayaran == 'Cash' )
                        <td><span>Cash</span></td>
                    @elseif( $item->metode_pembayaran == 'Transfer Bank' )
                        <td><span>Transfer</span></td>
                    @endif
                    <td>
                        @if ($item->status_pembayaran == 'Dalam Proses')
                            <span style="color:red; font-weight:bold;">Belum Lunas</span>
                        @elseif ($item->status_pembayaran == 'Pembayaran Sukses')
                            <span style="color:green; font-weight:bold;">Lunas</span>
                        @elseif ( $item->status_pembayaran == 'Uang Kembali')
                            <span>Uang Kembali</span>
                        @else
                            <span style="color:red">{{ $item->status_pembayaran }}</span>
                        @endif
                    </td>
                    <td>Rp {{ number_format($item->total_bayar, 0, ',', '.') }}</td>
                    <td>
                        <span style="text-decoration: none; color: blue; cursor: pointer; font-weight:bold;" onclick="openDetailModal({{$item->id}})">Detail</span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10">Maaf Nama tidak ditemukan..</td>
                </tr>
                @endforelse
            </tbody>
        </table>

    @elseif(request()->is('finance/cash/export'))
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Nomor Id</td>
                    <td>Nama</td>
                    <td>Tanggal</td>
                    <td>Durasi</td>
                    <td>Metode</td>
                    <td>Status</td>
                    <td>Rupiah</td>
                </tr>
            </thead>

            <tbody>
                @forelse ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>P{{ $item->id }}</td>
                    <td>{{ $item->customers->nama }}</td>
                    <td>{{ date('d M Y', strtotime($item->tanggal_pemesanan)) }}</td>
                    @foreach ($item->pemesanan_detail as $detailPemesanan)
                    <td>{{ $detailPemesanan->layanan->durasi }} Menit</td>
                    @endforeach
                    @if( $item->metode_pembayaran == 'Cash' )
                        <td><span>Cash</span></td>
                    @elseif( $item->metode_pembayaran == 'Transfer Bank' )
                        <td><span>Transfer</span></td>
                    @endif
                    <td>
                        @if ($item->status_pembayaran == 'Dalam Proses')
                            <span style="color:red; font-weight:bold;">Belum Lunas</span>
                        @elseif ($item->status_pembayaran == 'Pembayaran Sukses')
                            <span style="color:green; font-weight:bold;">Lunas</span>
                        @elseif ( $item->status_pembayaran == 'Uang Kembali')
                            <span>Uang Kembali</span>
                        @else
                            <span style="color:red">{{ $item->status_pembayaran }}</span>
                        @endif
                    </td>
                    <td>Rp {{ number_format($item->total_bayar, 0, ',', '.') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="10">Maaf Nama tidak ditemukan..</td>
                </tr>
                @endforelse
            </tbody>
        </table>

    @elseif(request()->is('finance/cancel'))
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>Select</td>
                    <td>No</td>
                    <td>Nomor ID</td>
                    <td>Nama</td>
                    <td>Tanggal</td>
                    <td>Metode</td>
                    <td>Status</td>
                    <td>Rupiah</td>
                    <td>Detail</td>
                </tr>
            </thead>

            <tbody>
            @forelse ($data as $item)
                <tr>
                    <td><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                    <td>{{ $loop->iteration}}</td>
                    <td>P{{ $item->id }}</td>
                    <td>{{ $item->customers->nama }}</td>
                    <td>{{ date('d M Y', strtotime($item->tanggal_pemesanan)) }}</td>
                    @if( $item->metode_pembayaran == 'Cash' )
                        <td><span style="color:blue">Cash</span></td>
                    @elseif( $item->metode_pembayaran == 'Transfer Bank' )
                        <td><span style="color:green">Transfer</span></td>
                    @endif
                    <td>
                        @if ($item->status_pemesanan == 'Batal')
                            <span style="color:red; font-weight:bold;">Dibatalkan</span>
                        @endif
                    </td>
                    <td>Rp {{ number_format($item->total_bayar, 0, ',', '.') }}</td>
                    <td>
                        <span style="text-decoration: none; color: blue; cursor: pointer; font-weight:bold;" onclick="openDetailModal({{$item->id}})">Detail</span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10">Maaf Nama tidak ditemukan..</td>
                </tr>
                @endforelse
            </tbody>
        </table>

    @elseif(request()->is('finance/cancel/export'))
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Nomor ID</td>
                    <td>Nama</td>
                    <td>Tanggal</td>
                    <td>Metode</td>
                    <td>Status</td>
                    <td>Rupiah</td>
                </tr>
            </thead>

            <tbody>
            @forelse ($data as $item)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>P{{ $item->id }}</td>
                    <td>{{ $item->customers->nama }}</td>
                    <td>{{ date('d M Y', strtotime($item->tanggal_pemesanan)) }}</td>
                    @if( $item->metode_pembayaran == 'Cash' )
                        <td><span style="color:blue">Cash</span></td>
                    @elseif( $item->metode_pembayaran == 'Transfer Bank' )
                        <td><span style="color:green">Transfer</span></td>
                    @endif
                    <td>
                        @if ($item->status_pemesanan == 'Batal')
                            <span style="color:red; font-weight:bold;">Dibatalkan</span>
                        @endif
                    </td>
                    <td>Rp {{ number_format($item->total_bayar, 0, ',', '.') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="10">Maaf Nama tidak ditemukan..</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        @elseif(request()->is('finance/transaksi-customer/search'))
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>Select</td>
                    <td>Nomor Id</td>
                    <td>Nama</td>
                    <td>Tanggal</td>
                    <td>Durasi</td>
                    <td>Metode</td>
                    <td>Status</td>
                    <td>Rupiah</td>
                    <td>Detail</td>
                </tr>
            </thead>

            <tbody>
                @forelse ($data as $item)
                <tr>
                    <td><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                    <td>P{{ $item->id }}</td>
                    <td>{{ $item->customers->nama }}</td>
                    <td>{{ date('d M Y', strtotime($item->tanggal_pemesanan)) }}</td>
                    @foreach ($item->pemesanan_detail as $detailPemesanan)
                    <td>{{ $detailPemesanan->layanan->durasi }} Menit</td>
                    @endforeach
                    @if( $item->metode_pembayaran == 'Cash' )
                        <td><span>Cash</span></td>
                    @elseif( $item->metode_pembayaran == 'Transfer Bank' )
                        <td><span>Transfer</span></td>
                    @endif
                    <td>
                        @if ($item->status_pemesanan == 'Batal')
                            <span style="color:red; font-weight:bold;">Dibatalkan</span>
                        @else
                            @if ($item->status_pembayaran == 'Dalam Proses')
                                <span style="color:red; font-weight:bold;">Belum Lunas</span>
                            @elseif ($item->status_pembayaran == 'Pembayaran Sukses')
                                <span style="color:green; font-weight:bold;">Lunas</span>
                            @elseif ($item->status_pembayaran == 'Uang Kembali')
                                <span style>Uang Kembali</span>
                            @else
                                <span style="color:red">{{ $item->status_pembayaran }}</span>
                            @endif
                        @endif
                    </td>
                    <td>Rp {{ number_format($item->total_bayar, 0, ',', '.') }}</td>
                    <td>
                        <span style="text-decoration: none; color: blue; cursor: pointer; font-weight:bold;" onclick="openDetailModal({{$item->id}})">Detail</span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10">Maaf Nama tidak ditemukan..</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    @endif