<?php

namespace App\Http\Controllers;

use App\Models\Voucher;

class VoucherController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
	
	/* public function get($code,Voucher $voucher){
		//eloquent adalah objek relation maping, untuk tanda = sebenarnya tidak perlu ditulis karena sudah default, jika memakai kondisi <, >, != , maka pelu ditulis pada parameter kedua dalam where query 
		$voucher = $voucher->where('code','=',$code)->first();
		// sama aja dengan select * from vouchers where code = kode yg di input dri url
		//dd adalah fungsi u/ menghentikan halaman atau file ini.
		dd($voucher->balance);
	} */
	
	/* sebenarnya where('code',$code) belum optimal karena jika dipakai di banyak kontroller script ini maka ketika kita merubah skema dari code mejadi voucher_code maka harus dirubah 1 per 1 solusinya yaitu membuat sebuah scope di model Voucher */
	
	/* public function get($code,Voucher $voucher){
		$voucher = $voucher->withCode($code)->first();
		
		// dd($voucher->balance);
		//jika field balance mengalami perubahan maka dibuat di Models
		
		dd($voucher->getBalance());
	} */
	
	
	/* jadi di model telah dibuat fungsi untuk membuat code lebih rapi dan jika da perubahan nama field pada tabel maka tidak perlu semua controller dirubah 1 per 1 hanya dirubah bagian model untuk fungsi tertentu yang mengarah pada nama field yang kita ingin rubah. */
	
	
	
	
	public function get($code,Voucher $voucher){
		$voucher = $voucher->withCode($code)->first();
		
		// untuk nilai parameter yg tidak ada di dalam database maka kita akan membuat halaman error 404 
		
		if(!$voucher){
			abort(404);
		}
		return view('voucher',[
			'voucher' => $voucher,
		]);
	}
}