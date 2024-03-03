<!-- halaman transaksi terapis  -->
@if(request()->is('finance/terapis'))
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>Select</td>
                        <td>ID Terapis</td>
                        <td>Nama Terapist</td>
                        <td>Transaksi</td>
                        <td>Tanggal</td>
                        <td>Status</td>
                        <td>Detail</td>
                    </tr>
                </thead>

                <tbody>
                @forelse ($data as $item)
                    <tr>
                        <td><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                        @php
                            $terapisId = isset($item->terapis3) ? $item->terapis3->id : (isset($item->terapis2) ? $item->terapis2->id : $item->terapis->id);
                        @endphp

                        @if(isset($item->terapis3))
                            <td>TR{{ $item->terapis3->id }}</td>
                            <td>{{ $item->terapis3->nama }}</td>
                        @elseif(isset($item->terapis2))
                            <td>TR{{ $item->terapis2->id }}</td>
                            <td>{{ $item->terapis2->nama }}</td>
                        @else
                            <td>TR{{ $item->terapis->id }}</td>
                            <td>{{ $item->terapis->nama }}</td>
                        @endif
                        <td>
                            @if($item->tanggal_pemesanan != null)
                                Layanan
                            @elseif($item->bukti_transfer != null)
                                Deposit
                            @else
                                Penarikan Saldo
                            @endif
                        </td>
                        <td>{{ $item->updated_at->format('d-m-Y') }}</td>
                        <td>Cair</td>

                            @if($item->tanggal_pemesanan != null)
                            <td>
                                <span style="text-decoration: none; color: blue; cursor: pointer; font-weight:bold;" onclick="openDetailModalPemesanan({{$item->id}},{{ $terapisId }})">Detail</span>
                            </td>
                            @elseif($item->bukti_transfer != null)
                            <td>
                                <span style="text-decoration: none; color: blue; cursor: pointer; font-weight:bold;" onclick="openDetailModalDeposit({{$item->id}})">Detail</span>
                            </td>
                            @else
                            <td>
                                <span style="text-decoration: none; color: blue; cursor: pointer; font-weight:bold;" onclick="openDetailModalWithdrawal({{$item->id}})">Detail</span>
                            </td>
                            @endif
                    </tr>
                @empty
                    <tr>
                        <td colspan="10">Maaf Nama tidak ditemukan..</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
@elseif(request()->is('finance/transaksi-terapis/search'))
<table class="table table-bordered">
                <thead>
                    <tr>
                        <td>Select</td>
                        <td>ID Terapis</td>
                        <td>Nama Terapist</td>
                        <td>Transaksi</td>
                        <td>Tanggal</td>
                        <td>Status</td>
                        <td>Detail</td>
                    </tr>
                </thead>

                <tbody>
                @forelse ($data as $item)
                    <tr>
                        <td><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>

                        @if($keyword == $item->terapis->nama)
                            <td>TR{{ $item->terapis->id }}</td>
                            <td>{{ $item->terapis->nama }}</td>
                            @php
                                $terapisId = $item->terapis->id;
                            @endphp
                        @elseif($keyword == $item->terapis2->nama)
                            <td>TR{{ $item->terapis2->id }}</td>
                            <td>{{ $item->terapis2->nama }}</td>
                            @php
                                $terapisId = $item->terapis2->id;
                            @endphp
                        @else
                            <td>TR{{ $item->terapis3->id }}</td>
                            <td>{{ $item->terapis3->nama }}</td>
                            @php
                                $terapisId = $item->terapis3->id;
                            @endphp
                        @endif

                        <td>
                            @if($item->tanggal_pemesanan != null)
                                Layanan
                            @elseif($item->bukti_transfer != null)
                                Deposit
                            @else
                                Penarikan Saldo
                            @endif
                        </td>

                        <td>{{ $item->updated_at->format('d-m-Y') }}</td>
                        <td>Cair</td>

                            @if($item->tanggal_pemesanan != null)
                            <td>
                                <span style="text-decoration: none; color: blue; cursor: pointer; font-weight:bold;" onclick="openDetailModalPemesanan({{$item->id}},{{ $terapisId }})">Detail</span>
                            </td>
                            @elseif($item->bukti_transfer != null)
                            <td>
                                <span style="text-decoration: none; color: blue; cursor: pointer; font-weight:bold;" onclick="openDetailModalDeposit({{$item->id}})">Detail</span>
                            </td>
                            @else
                            <td>
                                <span style="text-decoration: none; color: blue; cursor: pointer; font-weight:bold;" onclick="openDetailModalWithdrawal({{$item->id}})">Detail</span>
                            </td>
                            @endif
                    </tr>
                @empty
                    <tr>
                        <td colspan="10">Maaf Nama tidak ditemukan..</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
@elseif(request()->is('finance/terapis/export'))
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>ID Pesanan</td>
                        <td>Nomor Id</td>
                        <td>Nama Terapist</td>
                        <td>No Rekening</td>
                        <td>E-mail</td>
                        <td>No Telepon</td>
                        <td>Status</td>
                    </tr>
                </thead>

                <tbody>
                @php
                    $number = 1;
                @endphp
                @forelse ($data as $pemesanan)
                    @foreach ($pemesanan->pemesanan_detail as $detail)
                        @for ($i = 0; $i < $detail->jumlah; $i++)
                            @if( $i == 0 )
                                <tr>
                                    <td>{{$number}}</td>
                                    <td>ORD-{{ $pemesanan->id }}</td>
                                    <td>TP-{{ $pemesanan->terapis->id }}</td>
                                    <td>{{ $pemesanan->terapis->nama }}</td>
                                    @if($pemesanan->terapis->user_id == $pemesanan->terapis->user->bankAccount->user_id)
                                        <td>{{ $pemesanan->terapis->user->bankAccount->nomor_rekening }}</td>
                                    @endif
                                    <td>{{ $pemesanan->terapis->user->email }}</td>
                                    <td>{{ preg_replace('/(\d{4})(?=\d)/', '$1 ', $pemesanan->terapis->no_hp) }}</td>
                                    <td>
                                        @if( $pemesanan->status_pembayaran == 'Dalam Proses' )
                                            <span style="color:blue">Menunggu</span>
                                        @elseif( $pemesanan->status_pembayaran == 'Pembayaran Sukses' )
                                            <span style="color:green">Sukses</span>
                                        @else
                                            <span>{{ $pemesanan->status_pembayaran}}</span>    
                                        @endif
                                    </td>
                                </tr>
                            @elseif( $i == 1)
                                <tr>
                                    <td>{{$number}}</td>
                                    <td>ORD-{{ $pemesanan->id }}</td>
                                    <td>TP-{{ $pemesanan->terapis2->id }}</td>
                                    <td>{{ $pemesanan->terapis2->nama }}</td>
                                    @if($pemesanan->terapis2->user_id == $pemesanan->terapis2->user->bankAccount->user_id)
                                        <td>{{ $pemesanan->terapis2->user->bankAccount->nomor_rekening }}</td>
                                    @endif
                                    <td>{{ $pemesanan->terapis2->user->email }}</td>
                                    <td>{{ preg_replace('/(\d{4})(?=\d)/', '$1 ', $pemesanan->terapis2->no_hp) }}</td>
                                    <td>
                                        @if( $pemesanan->status_pembayaran == 'Dalam Proses' )
                                            <span style="color:blue">Menunggu</span>
                                        @elseif( $pemesanan->status_pembayaran == 'Pembayaran Sukses' )
                                            <span style="color:green">Sukses</span>
                                        @else
                                            <span>{{ $pemesanan->status_pembayaran}}</span>    
                                        @endif
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td>{{$number}}</td>
                                    <td>ORD-{{ $pemesanan->id }}</td>
                                    <td>TP-{{ $pemesanan->terapis3->id }}</td>
                                    <td>{{ $pemesanan->terapis3->nama }}</td>
                                    @if($pemesanan->terapis2->user_id == $pemesanan->terapis2->user->bankAccount->user_id)
                                        <td>{{ $pemesanan->terapis2->user->bankAccount->nomor_rekening }}</td>
                                    @endif
                                    <td>{{ $pemesanan->terapis3->user->email }}</td>
                                    <td>{{ preg_replace('/(\d{4})(?=\d)/', '$1 ', $pemesanan->terapis3->no_hp) }}</td>
                                    <td>
                                        @if( $pemesanan->status_pembayaran == 'Dalam Proses' )
                                            <span style="color:blue">Menunggu</span>
                                        @elseif( $pemesanan->status_pembayaran == 'Pembayaran Sukses' )
                                            <span style="color:green">Sukses</span>
                                        @else
                                            <span>{{ $pemesanan->status_pembayaran}}</span>    
                                        @endif
                                    </td>
                                </tr>
                            @endif
                            @php
                                $number++;
                            @endphp
                        @endfor
                    @endforeach
                @empty
                    <tr>
                        <td colspan="10">Maaf data tidak ditemukan..</td>
                    </tr>
                @endforelse
                </tbody>
            </table>

<!-- halaman member terapis  -->
@elseif(request()->is('finance/terapis/nama/export'))
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nomor Id</td>
                        <td>Nama</td>
                        <td>Tanggal Bergabung</td>
                        <td>Ponsel</td>
                        <td>Jenis Kelamin</td>
                        <td>Area kerja</td>
                    </tr>
                </thead>

                <tbody>
                @forelse ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>TR{{ $item->id }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ date('d M Y', strtotime($item->created_at)) }}</td>
                        <td>{{ $item->no_hp}}</td>
                        @if($item->jenis_kelamin == "L")
                            <td>Laki-Laki</td>
                        @else
                            <td>Perempuan</td>
                        @endif
                        @foreach( $item->alamat as $alamat)
                            <td>{{ $alamat->provinsi }}</td>
                        @endforeach
                    </tr>
                @empty
                    <tr>
                        <td colspan="10">Maaf Nama tidak ditemukan..</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
@elseif(request()->is('finance/terapis/nama'))
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Select</td>
                        <td>Nomor Id</td>
                        <td>Nama</td>
                        <td>Tanggal Bergabung</td>
                        <td>Ponsel</td>
                        <td>Jenis Kelamin</td>
                        <td>Area kerja</td>
                        <td>Detail</td>
                    </tr>
                </thead>

                <tbody>
                @forelse ($data as $item)
                    <tr>
                        <td><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                        <td>{{ $loop->iteration }}</td>
                        <td>TR{{ $item->id }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ date('d M Y', strtotime($item->created_at)) }}</td>
                        <td>{{ $item->no_hp}}</td>
                        @if($item->jenis_kelamin == "L")
                            <td>Laki-Laki</td>
                        @else
                            <td>Perempuan</td>
                        @endif
                        @foreach( $item->alamat as $alamat)
                            <td>{{ $alamat->provinsi }}</td>
                        @endforeach
                        <td><a href="{{ route('detail.terapis', $item->id) }}">detail</a></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10">Maaf Nama tidak ditemukan..</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
@endif