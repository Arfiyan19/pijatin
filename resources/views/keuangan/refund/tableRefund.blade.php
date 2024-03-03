@if(request()->is('finance/refund/export'))
    <table class="table table-bordered">
        <thead>
            <tr>
                <td>No</td>
                <td>ID pesanan</td>
                <td>ID User</td>
                <td scope="col-2">Nama customer</td>
                <td>Rupiah</td>
                <td>Status</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->pemesanan_id }}</td>
                    <td>{{ $item->customers->user_id }}</td>
                    <td style="justify-content: space-between;">{{ $item->customers->nama }}</td>
                    <td>Rp {{ number_format($item->jumlah, 0, ',', '.') }}</td>
                    @if($item->status_refund == "Menunggu")
                        <td><span style="color: red; font-weight: bold;">Menunggu</span></td>
                    @elseif($item->status_refund == "Selesai")
                        <td><span style="color: green; font-weight: bold;">Lunas</span></td>
                    @else
                        <td>Failed</td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <table class="table table-bordered">
        <thead>
            <tr>
                <td>Select</td>
                <td>ID pesanan</td>
                <td>ID User</td>
                <td scope="col-2">Nama customer</td>
                <td>Rupiah</td>
                <td>Status</td>
                <td>Detail</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                <form id="refundForm{{ $item->id }}" action="{{ route('export.refund') }}" method="post">
                    @csrf
                    <td><input class="form-check-input" type="checkbox" value="{{ $item->id }}" name="selected_ids[]"></td>
                </form>
                    <td>{{ $item->pemesanan_id }}</td>
                    <td>{{ $item->customers->user_id }}</td>
                    <td style="justify-content: space-between;">{{ $item->customers->nama }}</td>
                    <td>Rp {{ number_format($item->jumlah, 0, ',', '.') }}</td>
                    @if($item->status_refund == "Menunggu")
                        <td><span style="color: red; font-weight: bold;">Menunggu</span></td>
                    @elseif($item->status_refund == "Selesai")
                        <td><span style="color: green; font-weight: bold;">Lunas</span></td>
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
@endif
