@extends('layouts.bumdes.print')

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb text-center text-uppercase">
        <p>
            Data Inventaris Barang <br>
            bumdes amanah rakyat <br>
            desa wonoharjo
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
                            <th class="col-2">Sumber</th>
                            <th class="col-4">Nama</th>
                            <th class="col-3">Jumlah</th>
                            <th class="col-3">Kondisi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->source }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->amount }}</td>
                                <td>{{ $item->condition }}</td>
                            </tr>
                        @endforeach
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
