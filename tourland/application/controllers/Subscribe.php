<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Subscribe extends CI_Controller {

	public function index()
	{
    $data = array();
    $now = date('Y-m-d H:i:s');
    $site_client = new SoapClient("http://localhost/soap/profilingservice/?wsdl");
    $attraction_sites = $site_client->getAttractionCategory();
    $_status = $attraction_sites->status;
    $_statusCode = $attraction_sites->statusCode;
    $_respose = $attraction_sites->response;
    $cats = array();
    if ($_status == "OK"){
        if(sizeof($_respose->item)>1){
          foreach ($_respose->item as $key) {
            $cats[$key->code] = $key->name;
          }
        }
    }
    $data['options'] = $cats;

    $client = new SoapClient("http://localhost/soap/subscriptionservice/?wsdl");

    $this->load->library('form_validation');
    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required');
    $this->form_validation->set_rules('country', 'Country', 'required');
    $this->form_validation->set_rules('category[]', 'Category', 'required');
    if ($this->form_validation->run() == TRUE)
    {
      $name= $this->input->post('name');
      $email= $this->input->post('email');
      $country = $this->input->post('country');
      $sub_date = $now;
      $category = $this->input->post('category');

      // print_r(array("name" => $name, "email" => $email, "country"=>$country,
      // "subscriptionDate"=>$sub_date, "siteCategory"=> array("category" => $category)));

      $subscribe_service = $client->saveSubscriber(array("name" => $name, "email" => $email, "country"=>$country,
      "subscriptionDate"=>$sub_date, "siteCategory"=> array("category" => $category)));
      $status = $subscribe_service->status;
      $statusCode = $subscribe_service->statusCode;
      $respose = $subscribe_service->message;

      if ($status == "OK"){
          $this->template->set('title', 'Home');
          $this->template->load('template2', 'contents' , 'subscribe', $data);
      }else{
        $data['error'] = $respose;
      }

    }


    $this->template->set('title', 'Home');
		$this->template->load('template2', 'contents' , 'subscribe', $data);
  }
}
 ?>
