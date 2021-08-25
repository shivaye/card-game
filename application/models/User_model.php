<?php
class User_model extends CI_Model
{
  function __construct()
  {
          // Call the Model constructor
    parent::__construct();
  }

  public function createUser($data)
  {
    return $this->db->insert('customers', $data);
  }

  public function placeorder($form_array)
  {
    $insert = $this->db->insert('orders',$form_array);
    return $this->db->insert_id();
  }

  public function insertOrderItems($data = array()) {
    $insert = $this->db->insert_batch("order_items", $data);
    return $insert?true:false;
  }
  
  public function get_user_details($user_id)
  {
    $this->db->where('id',$user_id);
    $this->db->where('status',1);
    $user = $this->db->get('customers')->row_array();
    return $user;
  }
  
  public function getVerificationCode($verification_code)
  {
    $this->db->where('verification_code',$verification_code);
    $data = $this->db->get('customers')->row_array();
    return $data;
  }
  
  public function UserCartProducts($cart_ids){

    $this->db->where_in('id',$cart_ids, FALSE);
    $query =  $this->db->get('cart_user');
    return $query->result_array();
  }
  
  public function getAllOrders($user_id)
  {
   $this->db->where('user_id', $user_id);
   $this->db->where('order_status',0);
   $this->db->order_by("order_id", "desc");
   $return_orders = $this->db->get('orders')->result_array();
   return $return_orders;
 }

 public function getAllCancelOrders($user_id)
 {
  $this->db->where('user_id', $user_id);
  $this->db->where('order_status',5);
  $this->db->order_by("order_id", "desc");
  $return_orders = $this->db->get('orders')->result_array();
  return $return_orders;
}

public function delete_power($power_id)
{
  $this->db->where('id',$power_id);
  $delete = $this->db->delete('user_power');
  return $delete;
}

public function getAllCompletedOrders($user_id)
{
  $this->db->where('user_id', $user_id);
  $this->db->where('order_status',2);
  $this->db->order_by("order_id", "desc");
  $return_orders = $this->db->get('orders')->result_array();
  return $return_orders;
}

public function getAllAddress($user_id)
{
  $this->db->where('user_id', $user_id);
  $return_address = $this->db->get('user_address1')->result_array();
  return $return_address;
}

      //send verification email to user's email id
function sendEmailVerificationCode($name,$to_email,$verification_code)
{
           $from_email = 'info@websitesowner.com'; //change this to yours

           $anchorTag = '<a href="'.base_url().'welcome/verify/'.$verification_code.'">Click Here</a>';

           $message = 'Dear '.$name.',<br /><br />Please click on the below activation link to verify your email address.<br /><br />'.$anchorTag.'<br /><br /><br />Thanks<br />RHC2';

           $email_to = $to_email;
           $email_subject = "Email verification";


           $headers = "MIME-Version: 1.0" . "\r\n";
           $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

           $headers .= 'From:' .$from_email."\r\n";

           $mailSent=mail($email_to,$email_subject, $message,$headers);
           return $mailSent;
         }

      //activate user account
         function verifyEmailID($key)
         {
          $data = array('status' => 1);
          $this->db->where('verification_code', $key);
          return $this->db->update('customers', $data);
        }

        public function getByemail($email)
        {
          $this->db->where('email',$email);
          $this->db->or_where('phone',$email); 
          $this->db->where('status',1);
          $user = $this->db->get('customers')->row_array();
          return $user;
        }

        public function create_address($formarray)
        {
          return $this->db->insert('user_address1', $formarray);
        }

        public function delete_address($address_id)
        {
          $this->db->where('id',$address_id);
          $delete = $this->db->delete('user_address1');
          return $delete;
        }

        public function UpdateUser($user_id,$form_array)
        {
          $this->db->where('id',$user_id);
          $update = $this->db->update('customers',$form_array);
          return $update;
        }

        public function UpdateTransaction($order_id)
        {
          $data['status'] = "1";
          $this->db->where('trx_id',$order_id);
          $update = $this->db->update('orders',$data);
          return $update;
        }

        public function sendEmailPasswordReset($to_email,$password)
        {

          $from_email = 'info@websitesowner.com';
          $message = 'Dear User,<br /><br />Your System Genrated Password is given below.<br /><br />'. $password . '<br /><br /> Plese Change Your Password After Login<br />Thanks<br />Lenswish';

          $email_to = $to_email;
          $email_subject = "New Password";

          $headers = "MIME-Version: 1.0" . "\r\n";
          $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

          $headers .= 'From:' .$from_email."\r\n";

          $mailSent=mail($email_to,$email_subject, $message,$headers);
          return $mailSent;

        }

        public function sendEmail_OTP($to_email,$otp)
        {

        $from_email = 'hello@lenswish.com'; //change this to yours
        $subject = 'Order verification Otp';
        $message = 'Dear User,<br /><br />Please Verify Otp To Place Order.<br /><br />' .$otp. '<br /><br /><br />Thanks<br />Lenswish';

        $email_to = $to_email;

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $headers .= 'From:' .$from_email."\r\n";

        $mailSent=mail($email_to,$subject, $message,$headers);
        return $mailSent;

      }


    }
  ?>