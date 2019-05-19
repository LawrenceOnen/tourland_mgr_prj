<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
    $f = array("reference"=>"", "location"=>"", "name"=>"", "category"=>"");
    if(null !== $this->input->post('category')){
      $f["category"] = $this->input->post('category');
    }
    if(null !== $this->input->post('location')){
      $f["location"] = $this->input->post('location');
    }

    $data = array();
    $client = new SoapClient("http://localhost/soap/profilingservice/?wsdl");
    $attraction_sites = $client->getAttractionSite($f);
    $status = $attraction_sites->status;
    $statusCode = $attraction_sites->statusCode;
    $respose = $attraction_sites->response;

    if ($status == "OK"){
      if(isset($respose->site)){
        if(sizeof($respose->site)){
          $data['object_list'] = $respose->site;
        }
      }
    }

    $attraction_category = $client->getAttractionCategory();
    $_status = $attraction_category->status;
    $_statusCode = $attraction_category->statusCode;
    $_respose = $attraction_category->response;
    $cats[''] = 'Select Category';
    if ($_status == "OK"){
        if(sizeof($_respose->item)>1){
          foreach ($_respose->item as $key) {
            $cats[$key->code] = $key->name;
          }
        }
    }
    $data['options'] = $cats;


    $attraction_sp = $client->getServiceProvider();
    $_status1 = $attraction_sp->status;
    $_statusCode1 = $attraction_sp->statusCode;
    $_respose1 = $attraction_sp->response;

    if ($_status == "OK"){
        $data['serviceProviders'] = $_respose1;
    }
    $data['options'] = $cats;

    $this->template->set('title', 'Home');
		$this->template->load('template', 'contents' , 'home', $data);
	}

  public function detail($id)
	{
    $data = array();
    $client = new SoapClient("http://localhost/soap/profilingservice/?wsdl");
    $attraction_sites = $client->getAttractionSite(array("reference" => $id, "location" => "", "name"=>"", "category"=>"" ));
    $status = $attraction_sites->status;
    $statusCode = $attraction_sites->statusCode;
    $respose = $attraction_sites->response;
    if ($status == "OK"){
        $data['object_list'] = $respose->site;
    }

    $data['script'] = TRUE;
    $data['coordinates'] = explode(",", $respose->site->gpsCoordinates);
    $this->template->set('title', 'Detail');
		$this->template->load('template2', 'contents' , 'detail', $data);
	}
}
