<?php
namespace App\Controllers;

class Promo extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->validation = \Config\Services::validation();
		$this->session = session();
	}

	public function index()
	{
		$promoModel = new \App\Models\PromoModel();
		$promos = $promoModel->findAll();

		return view('promo/index',[
			'promos'=>$promos,
		]);
	}

	public function view()
	{
		$id = $this->request->uri->getSegment(3);

		$promoModel = new \App\Models\PromoModel();

		$promo = $promoModel->find($id);

		return view('promo/view',[
			'promo' => $promo,
		]);
	}

	public function create()
	{
		if($this->request->getPost())
		{
			//jika ada data yang di post
			$data = $this->request->getPost();
			$this->validation->run($data, 'promo');
			$errors = $this->validation->getErrors();

			if(!$errors)
			{
				//simpan datanya
				$promoModel = new \App\Models\PromoModel();

				$promo = new \App\Entities\Barang();

				$promo->fill($data);
				$promo->gambar = $this->request->getFile('gambar');
				$promo->created_by = $this->session->get('id');
				$promo->created_date = date("Y-m-d H:i:s");

				$promoModel->save($promo);

				$id = $promoModel->insertID();

				$segments = ['promo', 'view', $id];
				// /barang/view/$id
				return redirect()->to(site_url($segments));

			}
		}
		return view('promo/create');
	}

	public function update()
	{
		$id = $this->request->uri->getSegment(3);

		$promoModel = new \App\Models\PromoModel();

		$promo = $promoModel->find($id);

		if($this->request->getPost())
		{
			$data = $this->request->getPost();
			$this->validation->run($data, 'promoupdate');
			$errors = $this->validation->getErrors();

			if(!$errors)
			{
				$p = new \App\Entities\Barang();
				$p->id = $id;
				$p->fill($data);

				if($this->request->getFile('gambar')->isValid()){
					$p->gambar = $this->request->getFile('gambar');
				}

				$p->updated_by = $this->session->get('id');
				$p->updated_date = date("Y-m-d H:i:s");

				$promoModel->save($p);
				
				$segments = ['Promo','view',$id];

				return redirect()->to(base_url($segments));
			}
		}

		return view('promo/update',[
			'promo' => $promo,
		]);
	}

	public function delete()
	{
		$id = $this->request->uri->getSegment(3);

		$modelPromo = new \App\Models\PromoModel();
		$delete = $modelPromo->delete($id);

		return redirect()->to(site_url('promo/index'));
	}
}