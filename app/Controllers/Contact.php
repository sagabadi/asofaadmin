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
}