@if(request()->is('finance/transaksi'))
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>Select</td>
                        <td>No</td>
                        <td>Tipe User</td>
                        <td>ID User</td>
                        <td>Nama</td>
                        <td>Nominal</td>
                        <td>Tanggal</td>
                        <td>Detail</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach($sortedData as $item)
                        <tr>
                            <td><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                            <td>{{$loop->iteration}}</td>
                            @if($item->customer_id != null)
                                <td>Customer</td>
                            @else
                                <td>Terapis</td>
                            @endif
                            @if($item->customer_id != null)
                                <td>{{ $item->customer_id}}</td>
                            @else
                                <td>{{ $item->terapis_id}}</td>
                            @endif
                            @if($item->customer_id != null)
                                <td>{{ $item->customers->nama }}</td>
                            @else
                                <td>{{ $item->terapis->nama }}</td>
                            @endif
                            @if($item->jumlah != null)
                                <td>Rp {{ number_format($item->jumlah, 0, ',', '.') }}</td>
                            @else
                                <td>Rp {{ number_format($item->total_bayar, 0, ',', '.') }}</td>
                            @endif
                            <td>{{ date('d M Y', strtotime($item->created_at)) }}</td>
                            @if($item->status_pembayaran)
                            <td>
                                <span style="text-decoration: none; color: blue; cursor: pointer; font-weight:bold;" onclick="openDetailModalPemesanan({{$item->id}})">Detail</span>
                            </td>
                            @elseif($item->status_refund)
                            <td>
                                <span style="text-decoration: none; color: blue; cursor: pointer; font-weight:bold;" onclick="openDetailModalRefund({{$item->id}})">Detail</span>
                            </td>
                            @else
                            <td>
                                <span style="text-decoration: none; color: blue; cursor: pointer; font-weight:bold;" onclick="openDetailModalDeposit({{$item->id}})">Detail</span>
                            </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
@endif