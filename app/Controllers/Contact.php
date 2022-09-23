<?php namespace App\Controllers;
use App\Models\ContactModel;

class Contact extends BaseController
{
	public function index(){
		$session = session();
		$event = new ContactModel();
		$data['contact'] = $event->get_contact();

		echo view('Templates/header');
		echo view('Templates/sidebar');
	    echo view('User/index', $data);        
	    echo view('Templates/footer');
	}

	public function add_contact(){
		$session = session();
		$no_hp = $this->request->getPost('hp_admin');
		$out = preg_replace('/^0/', '62', $no_hp);
		$masking = $out;
		$event = new ContactModel();

		$e = $event->add_contact($no_hp, $masking);
		$session->setFlashdata('add', 'Success');
		return $this->response->redirect(base_url('/contact'));
	}
}