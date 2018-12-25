<?php 
	namespace App\Models;
	
	use Illuminate\Database\Eloquent\Model;
	
	class Voucher extends Model{
		// protected $table = 'sepeda';
		
		//scope untuk prefix dan WithCode untuk namanya, dan huruf W jadi kecil ketika dipanggil dicontroller
		public function scopeWithCode($query,$code){
			return $query->where('code',$code);
		}
		
		public function getBalance(){
			return $this->balance;
		}
		
	}
