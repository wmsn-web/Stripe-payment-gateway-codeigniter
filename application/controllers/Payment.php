<?php /**
 * 
 */
class Payment extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view("paymemt");
	}

	public function process_payment() {
    require_once('application/libraries/stripe-php/init.php');
    
        \Stripe\Stripe::setApiKey($this->config->item('secret_key'));
     
       $charge =  \Stripe\Charge::create ([
                "amount" => $this->input->post('amount')*100,
                "currency" => "eur",
                "source" => $this->input->post('stripeToken'),
                "description" => "Dummy stripe payment." 
        ]);
       $fingerprint = $charge['id'];
       $data = json_encode($charge,true);
       $data = base64_encode($data);
       return redirect(base_url('Payment/success/'.urlencode($data)));
	}

	public function success($code)
	{
		$code = urldecode($code);
		$code = base64_decode($code);
		$data = json_decode($code,true);
		//echo "<pre>";
		//print_r($data);
		$this->load->view("success",$data);
	}
}