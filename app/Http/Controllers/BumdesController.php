<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;


class BumdesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('bumdes.home.index', [
            'title' => "Home"
        ]);
    }
    public function index_inventory()
    {
        $inventory = Inventory::all();
        return view('bumdes.inventory.index', [
            'title' => "Inventory",
            'inventory' => $inventory
        ]);
    }
    public function print_inventory()
    {
        $inventory = Inventory::all()->sortBy('name');
        return view('bumdes.inventory.print', [
            'title' => "Cetak Data",
            'data' => $inventory
        ]);
    }
    public function create_inventory()
    {
        return view('bumdes.inventory.create', [
            'title' => "Inventory"
        ]);
    }
    public function store_inventory(request $request)
    {
        // Start validasi
        $rules = [
            'name' => 'required|unique:inventories,name',
            'source' => 'required',
            'amount' => 'required',
            'condition' => 'required',
            'picture' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ];
        $message = [
            'source.required' => 'Isi Kolom Sumber!',
            'amount.required' => 'Isi Kolom Jumlah!',
            'condition.required' => 'Isi Kolom Kondisi!',
            'name.required' => 'Isi Nama Barang!',
            'name.unique' => 'Barang Sudah Ada!',
            'picture.required' => 'Pilih File Foto Barang!',
            'picture.image' => 'File Harus Gambar!',
            'picture.mimes' => 'Format File jpeg,jpg atau png!',
            'picture.max' => 'Ukuran File Maksimum 2 Mb!',
        ];
        $validate = $this->validate($request, $rules, $message);
        // End validasi
        if ($validate) {
            // Start Upload Gambar
            $item = $request->picture;
            $imageName = time() . rand(100, 999) . "." . $item->getClientOriginalExtension();
            $item->move(public_path() . '/assets/img/inventory', $imageName);
            // Start Save Data
            Inventory::create([
                'name' => $request->name,
                'source' => $request->source,
                'amount' => $request->amount,
                'condition' => $request->condition,
                'picture' => $imageName,
            ]);
            return redirect()->route('inventory')->with('status', 'Data Barang berhasil ditambahkan!');
        }
    }
    public function show_inventory(inventory $inventory)
    {
        return view('bumdes.inventory.show', [
            'title' => "Inventory",
            'data' => $inventory
        ]);
    }
    public function edit_inventory(inventory $inventory)
    {
        return view('bumdes.inventory.edit', [
            'title' => "Inventory",
            'data' => $inventory
        ]);
    }
    public function update_inventory(request $request, inventory $inventory)
    {
        // Start Validasi
        // Cek Nama
        if ($request->name == $request->oldName) {
            $nameRules = 'required';
        } else {
            $nameRules = 'required|unique:inventories,name';
        }
        // End Cek Nama
        if ($request->hasFile('picture')) {
            $rules = [
                'name' => $nameRules,
                'source' => 'required',
                'amount' => 'required',
                'condition' => 'required',
                'picture' => 'required|image|mimes:jpeg,png,jpg|max:2048'
            ];
            $message = [
                'source.required' => 'Isi Kolom Sumber!',
                'amount.required' => 'Isi Kolom Jumlah!',
                'condition.required' => 'Isi Kolom Kondisi!',
                'name.required' => 'Isi Nama Barang!',
                'name.unique' => 'Barang Sudah Ada!',
                'picture.required' => 'Pilih File Foto Barang!',
                'picture.image' => 'File Harus Gambar!',
                'picture.mimes' => 'Format File jpeg,jpg atau png!',
                'picture.max' => 'Ukuran File Maksimum 2 Mb!',
            ];
            $validate = $this->validate($request, $rules, $message);
        } else {
            $rules = [
                'name' => $nameRules,
                'amount' => 'required',
                'source' => 'required',
                'condition' => 'required'
            ];
            $message = [
                'source.required' => 'Isi Kolom Sumber!',
                'amount.required' => 'Isi Kolom Jumlah!',
                'condition.required' => 'Isi Kolom Kondisi!',
                'name.required' => 'Isi Nama Barang!',
                'name.unique' => 'Barang Sudah Ada!'
            ];
            $validate = $this->validate($request, $rules, $message);
        }
        // End Validasi
        if ($validate) {
            if ($request->hasFile('picture')) {
                // Start Upload Gambar dengan Nama file yang sama
                $ubah = Inventory::findorfail($inventory->id);
                $awal = $ubah->picture;
                $request->picture->move(public_path() . '/assets/img/inventory', $awal);
                // End Upload Gambar

                // Start Update Data
                $inventory->update([
                    'name' => $request->name,
                    'amount' => $request->amount,
                    'source' => $request->source,
                    'condition' => $request->condition,
                    'picture' => $awal
                ]);
                // End Update Data
            } else {
                // Start Update Data
                $inventory->update([
                    'name' => $request->name,
                    'amount' => $request->amount,
                    'source' => $request->source,
                    'condition' => $request->condition
                ]);
                // End Update Data
            }
            return redirect()->route('inventory')->with('status', 'Data Barang Berhasil Diubah!');
        }
    }
    public function destroy_inventory(Inventory $inventory)
    {
        if (File::exists(public_path('assets/img/inventory/' . $inventory->picture))) {
            File::delete(public_path('assets/img/inventory/' . $inventory->picture));
            $inventory->delete();
        } else {
            return redirect()->route('inventory')->with('status', 'Gambar Tidak Ada! Data Tidak Berhasil Dihapus');
        }
        return redirect()->route('inventory')->with('status', 'Data Barang Berhasil Dihapus');
    }

    public function index_reservation()
    {
        $data = Rental::all();
        return view('bumdes.reservation.index', [
            'title' => "Reservation",
            'data' => $data
        ]);
    }
    public function create_reservation()
    {
        return view('bumdes.reservation.create', [
            'title' => "Reservation"
        ]);
    }
    public function store_reservation(request $request)
    {
        // Start validasi
        $rules = [
            'name' => 'required',
            'telp' => 'required',
            'start_reservation_date' => 'required',
            'end_reservation_date' => 'required',
            'location' => 'required',
            'package' => 'required',
            'payment' => 'required',
            'payment_status' => 'required',
        ];
        $message = [
            'telp.required' => 'Isi Kolom No Telepon!',
            'start_reservation_date.required' => 'Isi Tanggal!',
            'end_reservation_date.required' => 'Isi Tanggal!',
            'name.required' => 'Isi Nama Penyewa!',
            'location.required' => 'Isi Lokasi Penyewaan!',
            'package.required' => 'Isi Paket Penyewaan!',
            'payment.required' => 'Isi Harga Penyewaan!',
            'payment_status.required' => 'Isi Status Pembayaran!',
        ];
        $validate = $this->validate($request, $rules, $message);
        $pay = str_replace(",", "", $request->payment);
        // dd($pay);
        // End validasi
        if ($validate) {
            // Start Save Data
            Rental::create([
                'name' => $request->name,
                'telp' => $request->telp,
                'start_reservation_date' => $request->start_reservation_date,
                'end_reservation_date' => $request->end_reservation_date,
                'location' => $request->location,
                'package' => $request->package,
                'payment' => $pay,
                'payment_status' => $request->payment_status,
                'rental_status' => "Dalam Penyewaan",
                'staff' => Auth::user()->name
            ]);
            return redirect()->route('reservation')->with('status', 'Data Penyewaan berhasil ditambahkan!');
        }
    }
    public function lunas(Rental $reservation)
    {
        $reservation->update([
            'payment_status' => "Lunas"
        ]);
        return redirect()->route('reservation')->with('status', 'Pembayaran telah Lunas!');
    }
    public function selesai(Rental $reservation)
    {
        // Cek Pembayaran
        $cek = $reservation->payment_status;
        if ($cek == "Lunas") {
            $reservation->update([
                'rental_status' => "Selesai"
            ]);
            return redirect()->route('reservation')->with('status', 'Penyewaan Telah Selesai!');
        } else {
            return redirect()->route('reservation')->with('gagal', '' . $reservation->name . ' Belum Melakukan Pembayaran!');
        }
    }
    public function show_reservation(rental $reservation)
    {
        return view('bumdes.reservation.show', [
            'title' => "Reservation",
            'data' => $reservation
        ]);
    }
    public function edit_reservation(rental $reservation)
    {
        return view('bumdes.reservation.edit', [
            'title' => "Reservation",
            'data' => $reservation
        ]);
    }
    public function update_reservation(request $request, rental $reservation)
    {
        // Start validasi
        $rules = [
            'name' => 'required',
            'telp' => 'required',
            'start_reservation_date' => 'required',
            'end_reservation_date' => 'required',
            'location' => 'required',
            'package' => 'required',
            'payment' => 'required'
        ];
        $message = [
            'telp.required' => 'Isi Kolom No Telepon!',
            'start_reservation_date.required' => 'Isi Tanggal!',
            'end_reservation_date.required' => 'Isi Tanggal!',
            'name.required' => 'Isi Nama Penyewa!',
            'location.required' => 'Isi Lokasi Penyewaan!',
            'package.required' => 'Isi Paket Penyewaan!',
            'payment.required' => 'Isi Harga Penyewaan!'
        ];
        $validate = $this->validate($request, $rules, $message);
        $pay = str_replace(",", "", $request->payment);
        // dd($pay);
        // End validasi
        if ($validate) {
            // Start Save Data
            $reservation->update([
                'name' => $request->name,
                'telp' => $request->telp,
                'start_reservation_date' => $request->start_reservation_date,
                'end_reservation_date' => $request->end_reservation_date,
                'location' => $request->location,
                'package' => $request->package,
                'payment' => $pay,
                'staff' => Auth::user()->name
            ]);
            return redirect()->route('reservation')->with('status', 'Data Penyewaan berhasil diubah!');
        }
    }
    public function destroy_reservation(Rental $reservation)
    {
        $reservation->delete();
        return redirect()->route('reservation')->with('status', 'Data Barang Berhasil Dihapus');
    }
    public function index_rental()
    {
        $data = Rental::all();
        return view('bumdes.history.index', [
            'title' => 'Rental',
            'data' => $data
        ]);
    }
    public function show_rental(Rental $rental)
    {
        return view('bumdes.history.show', [
            'title' => 'Rental',
            'data' => $rental
        ]);
    }
    public function print_rental(Request $request)
    {
        $bulan = $request->bulan;
        $tahun = $request->tahun;
        if ($bulan != 0) {
            $dataBulan = Rental::whereMonth('end_reservation_date', $bulan)->whereYear('end_reservation_date', $tahun)->get();
            $dataLaporan = $dataBulan->where('rental_status', "Selesai");
        } else {
            $dataLaporan = Rental::whereYear('end_reservation_date', $tahun)->where('rental_status', "Selesai")->get();
        }
        $total = $dataLaporan->sum('payment');

        return view('bumdes.history.print', [
            'title' => 'Cetak Data',
            'data' => $dataLaporan->sortBy('end_reservation_date'),
            'total' => $total,
            'bulan' => $bulan,
            'tahun' => $tahun
        ]);
    }
}
