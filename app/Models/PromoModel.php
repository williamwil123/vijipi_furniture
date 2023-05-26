<?php namespace App\Models;

use CodeIgniter\Model;

class PromoModel extends Model
{
	protected $table = 'promo';
	protected $primaryKey = 'id';
	protected $allowedFields = [
		'nama','harga','harga_promo','stok','gambar','created_date','created_by','updated_date','updated_by'
	];
	protected $returnType = 'App\Entities\Barang';
	protected $useTimestamps = false;
}