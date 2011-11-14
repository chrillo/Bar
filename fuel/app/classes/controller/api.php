<?php

/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 * 
 * @package  app
 * @extends  Controller
 */
  
class Controller_Api extends Controller_Rest {

	/**
	 * The index action.
	 * 
	 * @access  public
	 * @return  void
	 */
	private function api_response($status,$data){
		return array("status"=>$status,"data"=>$data);
	}
	public function action_index()
	{
		$this->response->body ="";
	}
	public function get_userbypin()
    {	
    	$pin=Input::get('pin');
    	if($pin==""){$this->response($this->api_response(500,array("error"=>"bad paremters")));}
        $query=Model_User::find()->where('pin', $pin);
        if($query->count()){;
        	$user=$query->get_one();
        	
        	$consumptions=DB::select()->from('consumptions')->as_object('Model_Consumption')->where('user_id',$user->id)->where('status',1)->execute();
    	
			$this->response->set_header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate');
			$this->response->set_header('Expires', 'Mon, 26 Jul 1997 05:00:00 GMT');
			$this->response->set_header('Pragma', 'no-cache');	
        	$this->response($this->api_response(200,array("user"=>array("username"=>$user->username,"id"=>$user->id,"pin"=>$user->pin),"consumptions"=>$consumptions->as_array())));
        }else{
        	$this->response($this->api_response(404,array("error"=>"not found")));
        }
    }
    public function get_placeorder(){
    	
    	
    	$pin=Input::get('pin');
    	$items=Input::get('items');
    	if(!isset($pin) || !isset($items) || $items=="" || $pin==""){ echo "bad parameters"; return; }
    	
        $user=Model_User::find()->where('pin', $pin)->get_one();
       	print_r($user);
        $items=explode(",",$items);
       
        $consumptions=array();
        $items_cache=array();
        $query = DB::insert('consumptions');

		$query->columns(array(
			    'user_id',
			    'item_id',
			    'price',
			    'status',
			    'title',  
			    'created_at',
			    'updated_at',
			    'order_id')
		);
		$time=time();
        foreach($items as $item_id){
        	 $item=@$items_cache[$item_id];
        	 if(!$item){	
        	 	$item=Model_item::find($item_id);
        	 	$items_cache[$item_id]=$item;
        	 }
        	 $query->values(array($user->id,$item->id,$item->price,1,$item->title,$time,$time,$time));
        }
		$query->execute();
		$this->response->set_header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate');
		$this->response->set_header('Expires', 'Mon, 26 Jul 1997 05:00:00 GMT');
		$this->response->set_header('Pragma', 'no-cache');
		$this->response($this->api_response(200,array("order_id"=>$time)));	
    }
    public function cancelorder(){
    	$pin=Input::get('pin');
    	$order_id=Input::get('order_id');
    	$query=Model_User::find()->where('pin', $pin);
        $user=$query->get_one();
        if($user && $oder_id!=""){
        	$query = DB::update('consumptions');
			$query->where('status',1);
			$query->where('user_id',$user->id);
			$query->where('order_id',$order_id);
			$query->value('status',0);
        	$query->execute();
        	$this->response->set_header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate');
			$this->response->set_header('Expires', 'Mon, 26 Jul 1997 05:00:00 GMT');
			$this->response->set_header('Pragma', 'no-cache');	
        	$consumptions=DB::select()->from('consumptions')->as_object('Model_Consumption')->where('user_id',$user->id)->where('status',1)->execute();
        	$this->response($this->api_response(200,$consumptions->as_array()));
        }else{
        	$this->response($this->api_response(500,'bad parameters'));
        }
    }
    /*
    public function get_consumptions(){
    	$pin=Input::get('pin');
		if($pin==""){echo "bad parameters"; return;}
		
    	$query=Model_User::find()->where('pin', $pin);
        $user=$query->get_one();
        
        $consumptions=DB::select()->from('consumptions')->as_object('Model_Consumption')->where('user_id',$user->id)->where('status','unpaid')->execute();
    	
    	$this->response($consumptions->as_array());
    }*/
    public function get_items(){
    	$items=DB::select()->from('items')->as_object('Model_Item')->execute();
    	$this->response($items->as_array());
    }
	

	/**
	 * The 404 action for the application.
	 * 
	 * @access  public
	 * @return  void
	 */
	public function action_404()
	{
		$messages = array('Aw, crap!', 'Bloody Hell!', 'Uh Oh!', 'Nope, not here.', 'Huh?');
		$data['title'] = $messages[array_rand($messages)];

		// Set a HTTP 404 output header
		$this->response->status = 404;
		$this->response->body = View::factory('welcome/404', $data);
	}
}

/* End of file welcome.php */