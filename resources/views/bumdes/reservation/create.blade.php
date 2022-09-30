@extends('layouts.bumdes.main')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Penyewaan</h1>
    </div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    {{-- Start Page Content --}}
    <div class="row">
        <a href="{{ route('reservation') }}" type="button" class="btn btn-warning mb-auto">Kembali</a>
        <div class="card shadow col-8 mb-4 mx-auto">
            <div class="card-header py-3 text-center">
                <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Penyewaan</h6>
            </div>
            <div class=" card-body">
                <form action="{{ route('store-reservation') }}" method="post" id="inputForm"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                            value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="telp">No Telepon</label>
                        <input type="text" class="form-control @error('telp') is-invalid @enderror" id="telp" name="telp"
                            value="{{ old('telp') }}">
                        @error('telp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="location">Lokasi Penyewaan</label>
                        <textarea type="text" class="form-control @error('location') is-invalid @enderror" id="location"
                            name="location" value="{{ old('location') }}"></textarea>
                        @error('location')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="start_reservation_date">Tanggal Mulai</label>
                                <input type="date"
                                    class="form-control @error('start_reservation_date') is-invalid @enderror"
                                    id="start_reservation_date" name="start_reservation_date"
                                    value="{{ old('start_reservation_date') }}">
                                @error('start_reservation_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="end_reservation_date">Tanggal Selesai</label>
                                <input type="date" class="form-control @error('end_reservation_date') is-invalid @enderror"
                                    id="end_reservation_date" name="end_reservation_date"
                                    value="{{ old('end_reservation_date') }}">
                                @error('end_reservation_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="package">Paket Penyewaan</label>
                        <input type="text" class="form-control @error('package') is-invalid @enderror" id="package"
                            name="package" value="{{ old('package') }}">
                        @error('package')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <label for="payment">Harga Sewa</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Rp.</span>
                        </div>
                        <input type="text" class="form-control @error('payment') is-invalid @enderror" id="payment"
                            name="payment" value="{{ old('payment') }}" data-type="currency">
                        @error('payment')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="payment_status" class="required">Status Pembayaran</label>
                        <select class="form-control @error('payment_status') is-invalid @enderror" id="payment_status"
                            name="payment_status">
                            <option value="{{ old('payment_status') }}">
                                {{ old('payment_status') ? old('payment_status') : '-Pilihan-' }} </option>
                            <option value="Lunas">Lunas</option>
                            <option value="Belum Lunas">Belum Lunas</option>
                        </select>
                        @error('payment_status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <input type="hidden" name="rental_status" value="Dalam Penyewaan">
                    <button type="submit" class="btn btn-primary" id="tombol">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    {{-- End Page Content --}}
@endsection

@section('javascript')
    <script>
        // Jquery Dependency

        $("input[data-type='currency']").on({
            keyup: function() {
                formatCurrency($(this));
            },
            blur: function() {
                formatCurrency($(this), "blur");
            }
        });


        function formatNumber(n) {
            // format number 1000000 to 1,234,567
            return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        }


        function formatCurrency(input, blur) {
            // appends $ to value, validates decimal side
            // and puts cursor back in right position.

            // get input value
            var input_val = input.val();

            // don't validate empty input
            if (input_val === "") {
                return;
            }

            // original length
            var original_len = input_val.length;

            // initial caret position 
            var caret_pos = input.prop("selectionStart");

            // check for decimal
            if (input_val.indexOf(".") >= 0) {

                // get position of first decimal
                // this prevents multiple decimals from
                // being entered
                var decimal_pos = input_val.indexOf(".");

                // split number by decimal point
                var left_side = input_val.substring(0, decimal_pos);
                var right_side = input_val.substring(decimal_pos);

                // add commas to left side of number
                left_side = formatNumber(left_side);

                // validate right side
                right_side = formatNumber(right_side);

                // On blur make sure 2 numbers after decimal
                if (blur === "blur") {
                    right_side += "00";
                }

                // Limit decimal to only 2 digits
                right_side = right_side.substring(0, 2);

                // join number by .
                input_val = left_side + "." + right_side;

            } else {
                // no decimal entered
                // add commas to number
                // remove all non-digits
                input_val = formatNumber(input_val);

                // final formatting
                if (blur === "blur") {
                    input_val += ".00";
                }
            }

            // send updated string to input
            input.val(input_val);

            // put caret back in the right position
            var updated_len = input_val.length;
            caret_pos = updated_len - original_len + caret_pos;
            input[0].setSelectionRange(caret_pos, caret_pos);
        }
    </script>
@endsection
