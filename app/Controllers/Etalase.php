<?php
namespace App\Controllers;

class Etalase extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->validation = \Config\Services::validation();
		$this->session = session();
	}

	public function index()
	{
		$barang = new \App\Models\BarangModel();
		$data = [
            'barangs' => $barang->paginate(9),
            'pager' => $barang->pager
        ];
        return view('etalase/index',[
            'data' => $data,
        ]);
	}

    public function indexpromo()
	{
		$promo = new \App\Models\PromoModel();
		$data = [
            'promos' => $promo->paginate(9),
            'pager' => $promo->pager
        ];
        return view('etalase/indexpromo',[
            'data' => $data,
        ]);
	}
}