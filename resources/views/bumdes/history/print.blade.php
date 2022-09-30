@extends('layouts.bumdes.print')

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb text-center text-uppercase">
        <p>
            Data Pendapatan Penyewaan Tenda <br>
            bumdes amanah rakyat <br>
            desa wonoharjo <br>
            {{ $bulan == 0 ? 'Tahun' : '' }}
            {{ $bulan == 1 ? 'Januari,' : '' }}
            {{ $bulan == 2 ? 'Februari,' : '' }}
            {{ $bulan == 3 ? 'Maret,' : '' }}
            {{ $bulan == 4 ? 'April,' : '' }}
            {{ $bulan == 5 ? 'Mei,' : '' }}
            {{ $bulan == 6 ? 'Juni,' : '' }}
            {{ $bulan == 7 ? 'Juli,' : '' }}
            {{ $bulan == 8 ? 'Agustus,' : '' }}
            {{ $bulan == 9 ? 'September,' : '' }}
            {{ $bulan == 10 ? 'Oktober,' : '' }}
            {{ $bulan == 11 ? 'November,' : '' }}
            {{ $bulan == 12 ? 'Desember,' : '' }}
            {{ $tahun }}
        </p>
    </h1>

    {{-- Start Page Content --}}
    <div class="container-fluid">
        <div class="card mx-3" style="border: none">
            <div class="table-responsive">
                <table class="table table-bordered border-dark" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th class="col-0">No</th>
                            <th class="col-3">Nama</th>
                            <th class="col-2">Telp</th>
                            <th class="col-3">Alamat</th>
                            <th class="col-2">Tanggal Penyewaan</th>
                            <th class="col-2">Harga Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->telp }}</td>
                                <td>{{ $item->location }}</td>
                                <td>
                                    {{ \Carbon\Carbon::parse($item->end_reservation_date)->isoFormat('D MMMM Y') }}
                                </td>
                                <td>Rp. {{ number_format($item->payment, 2, ',', '.') }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="4" class="fw-bold"></td>
                            <td class="fw-bold text-center">Total Pendapatan</td>
                            <td>Rp. {{ number_format($total, 2, ',', '.') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <p class="text-end">Wonoharjo, {{ now()->isoFormat('D MMMM Y') }}</p>
            <p class="text-end">Pengurus Bumdes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
            <br><br><br><br><br><br>
            <pre class="text-end">(                      )</pre>
        </div>
    </div>
    {{-- End Page Content --}}
@endsection

@section('javascript')
    <script type="text/javascript">
        window.print();
    </script>
@endsection
