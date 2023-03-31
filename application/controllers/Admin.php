<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('admin_model');
		$this->load->helper('url');
		$this->load->library('session');
	}

	public function index()
	{
		$this->load->view('admin/login');
	}

    /******************** Login Start **********************/

    public function login()
    {
        $this->load->view('admin/login');
    }

    public function check_login()
    {
        //print_r('expression');exit;
        $email   = $this->input->post('email');
        //$name = $this->input->post('name');
        $password   = $this->input->post('password');

        $new_data = array('email' => $email);
        $this->session->set_userdata($new_data);

        $sql1 = $this->admin_model->check_admin_login($email, $password);
        //print_r($sql1);exit;

        if($sql1->num_rows() == 1)
        {
            $errors   = array();
            $message  = '';
            $redirect = '';

            $result = $sql1->row();

            //$this->session->set_userdata(array('n'=>$email,'name'=>$name));

            $status = 'success';
            $message = '<br><div class="alert alert-info">';
            $message.='<strong>Login SuccessFully. </strong>';
            $message.='</div>';
            $this->session->set_flashdata('message',$message);
            $redirect = base_url('admin/properties_list');

            $data['status']              = $status;
            $data['errors']              = $errors;
            $data['redirect']            = $redirect;
            $data['message']             = $message;
            
            echo json_encode($data);
        }
        else
        {
            $status = 'error';
            $message = '<br><div class="alert alert-info">';
            $message.='<strong>Invalid Credentials</strong>';
            $message.='</div>';
            $this->session->set_flashdata('message',$message);
            $redirect = base_url('admin/index');

            $data['status']              = $status;
            $data['redirect']            = $redirect;
            $data['message']             = $message;
            
            echo json_encode($data);
        }
        
    }

    public function logout()
    {
        $this->session->unset_userdata('email');

        $this->session->sess_destroy();
        
        //$this->load->view('admin/logout');
        redirect('admin/login');
        //header("location:index");
    }

    /******************** Login End **********************/

    /******************** Dashboard Start **********************/

    public function dashboard()
    {
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }
        $data['total_customer'] = $this->admin_model->get_total_customer();
        $data['total_vendor'] = $this->admin_model->get_total_vendor();
        $data['total_invoice'] = $this->admin_model->get_total_invoice();
        $data['total_bill'] = $this->admin_model->get_total_bill();
        $data['invoice_list'] = $this->admin_model->get_recent_invoice();
        $data['bill_list'] = $this->admin_model->get_recent_bill();
        $this->load->view('admin/index',$data);
    }

    /******************** Dashboard End **********************/

	/******************** Customer Start **********************/

	public function customer_list()
	{
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }
		$data['customer_list'] = $this->admin_model->get_all_customer_list();

		$this->load->view('admin/customer_list',$data);
	}

	public function add_customer()
	{
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }
		$this->load->view('admin/add_customer');
	}

	public function save_customer()
	{
		//print_r('expression');exit;
		$errors   = array();
        $message  = '';
        $redirect = '';
    
        $this->db->trans_begin();

        //$data['users'] = $this->admin_model->get_users_data();
        //$user_id = $data['users']->id;

        $this->load->library('upload');

        /*if (!empty($_FILES['photo']['name']))
        {
        	//print_r('aa');exit;
            $photo  = $_FILES['photo']['name'];
            //print_r($photo);exit;
            $config = array(
                'file_name'   => $photo,
                'upload_path' => "./uploads/",
                'allowed_types' => "gif|jpg|png|jpeg|pdf",
                'overwrite' => TRUE,
                'max_size' => "100000", // Can be set to particular file size , here it is 2 MB(2048 Kb) 2048000
                //'max_height' => "768",
                //'max_width' => "1024"
            );
            $this->upload->initialize($config);
            if($this->upload->do_upload('photo'))
            {
                //print_r('aaaa');exit;
                $upload_photo = $this->upload->data();
            } 
            else 
            {
                $status = 'error';
                $errors['photoError'] = $this->upload->display_errors();
            }
        }
        else
        {
            $upload_photo['file_name'] = '';
            //print_r($upload_photo);exit;
        }*/


        $data = array(
            'salutatior'      => $this->input->post('salutatior'),
        	'name'      => $this->input->post('name'),
        	'company_name'      => $this->input->post('company_name'),
        	'display_name'      => $this->input->post('display_name'),
        	'email'    => $this->input->post('email'),
            'phone'      => $this->input->post('phone'),
            'work_phone'      => $this->input->post('work_phone'),
            'website'   	=> $this->input->post('website'),
            'sale_person'      => $this->input->post('sale_person'),
            'payment_terms'     => $this->input->post('payment_terms'),
            'gst_treatment'     => $this->input->post('gst_treatment'),
            'gst_no'     => $this->input->post('gst_no'),
            'place_of_maharashtra'     => $this->input->post('place_of_maharashtra'),
            'opening_bal'     => $this->input->post('opening_bal'),
            'pan_no'     => $this->input->post('pan_no'),
            'discount'     => $this->input->post('discount'),
            'credit_limit'     => $this->input->post('credit_limit'),
            'billing_attention'     => $this->input->post('billing_attention'),
            'billing_street'     => $this->input->post('billing_street'),
            'billing_city'     => $this->input->post('billing_city'),
            'billing_state'     => $this->input->post('billing_state'),
            'billing_pincode'     => $this->input->post('billing_pincode'),
            'shipping_attention'     => $this->input->post('shipping_attention'),
            'shipping_street'     => $this->input->post('shipping_street'),
            'shipping_city'     => $this->input->post('shipping_city'),
            'shipping_state'     => $this->input->post('shipping_state'),
            'shipping_pincode'     => $this->input->post('shipping_pincode'),
            'bank_name'     => $this->input->post('bank_name'),
            'branch_name'     => $this->input->post('branch_name'),
            'ifsc_code'     => $this->input->post('ifsc_code'),
            'account_no'     => $this->input->post('account_no'),
            //'photo'     => $upload_photo['file_name'],
            //'status'     => $this->input->post('status'),
            'added_at'   => date('Y-m-d')
        );
        //print_r($data);exit;
        $this->db->insert('customer', $data);
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }

        $status = 'success';
        $message = '<br><div class="alert alert-info">';
        $message.='<strong>Customer Added Successfully. </strong>';
        $message.='</div>';
        $this->session->set_flashdata('message',$message);
        $redirect = base_url('admin/customer_list');

        $data['status']              = $status;
        $data['errors']              = $errors;
        $data['redirect']            = $redirect;
        $data['message']             = $message;
        
        echo json_encode($data);
	}

	public function edit_customer($id)
	{
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }
		$data['edit_customer'] = $this->admin_model->get_all_edit_customer($id);

		$this->load->view('admin/edit_customer',$data);
	}

	public function update_customer()
	{
		//print_r('update');exit;
		$errors   = array();
        $message  = '';
        $redirect = '';
    
        $this->db->trans_begin();

        //$data['users'] = $this->admin_model->get_users_data();
        //$user_id = $data['users']->id;

        $customer_id = $this->input->post('customer_id');

        $this->load->library('upload');

        /*$old_photo   = $this->input->post('old_photo');
        //print_r($old_photo);exit;

        if (!empty($_FILES['photo']['name']))
        {
        	if($old_photo != '')
            {
                $delete_file = './uploads/'.$old_photo;
                if(file_exists($delete_file))
                {
                    unlink('./uploads/'.$old_photo);
                }
            }

        	//print_r('aa');exit;
            $photo  = $_FILES['photo']['name'];
            $config = array(
                'file_name'   => $photo,
                'upload_path' => "./uploads/",
                'allowed_types' => "gif|jpg|png|jpeg|pdf",
                'overwrite' => TRUE,
                'max_size' => "100000", // Can be set to particular file size , here it is 2 MB(2048 Kb) 2048000
                //'max_height' => "768",
                //'max_width' => "1024"
            );
            $this->upload->initialize($config);
            if($this->upload->do_upload('photo'))
            {
                //print_r('aaaa');exit;
                $upload_photo = $this->upload->data();
            } 
            else 
            {
                $status = 'error';
                $errors['photoError'] = $this->upload->display_errors();
            }
        }
        else
        {
            $upload_photo['file_name'] = $old_photo;
            //print_r($upload_photo);exit;
        }*/


        $data = array(
            'salutatior'      => $this->input->post('salutatior'),
        	'name'      => $this->input->post('name'),
        	'company_name'      => $this->input->post('company_name'),
        	'display_name'      => $this->input->post('display_name'),
        	'email'    => $this->input->post('email'),
            'phone'      => $this->input->post('phone'),
            'work_phone'      => $this->input->post('work_phone'),
            'website'   	=> $this->input->post('website'),
            'sale_person'      => $this->input->post('sale_person'),
            'payment_terms'     => $this->input->post('payment_terms'),
            'gst_treatment'     => $this->input->post('gst_treatment'),
            'gst_no'     => $this->input->post('gst_no'),
            'place_of_maharashtra'     => $this->input->post('place_of_maharashtra'),
            'opening_bal'     => $this->input->post('opening_bal'),
            'pan_no'     => $this->input->post('pan_no'),
            'discount'     => $this->input->post('discount'),
            'credit_limit'     => $this->input->post('credit_limit'),

            'billing_attention'     => $this->input->post('billing_attention'),
            'billing_street'     => $this->input->post('billing_street'),
            'billing_city'     => $this->input->post('billing_city'),
            'billing_state'     => $this->input->post('billing_state'),
            'billing_pincode'     => $this->input->post('billing_pincode'),
            'shipping_attention'     => $this->input->post('shipping_attention'),
            'shipping_street'     => $this->input->post('shipping_street'),
            'shipping_city'     => $this->input->post('shipping_city'),
            'shipping_state'     => $this->input->post('shipping_state'),
            'shipping_pincode'     => $this->input->post('shipping_pincode'),
            'bank_name'     => $this->input->post('bank_name'),
            'branch_name'     => $this->input->post('branch_name'),
            'ifsc_code'     => $this->input->post('ifsc_code'),
            'account_no'     => $this->input->post('account_no'),
            //'status'     => $this->input->post('status'),
            //'photo'     => $upload_photo['file_name'],
            'updated_at'   => date('Y-m-d')
        );
        //print_r($data);exit;
        $this->db->where('id', $customer_id)->update('customer', $data);
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }

        $status = 'success';
        $message = '<br><div class="alert alert-info">';
        $message.='<strong>Customer Update Successfully. </strong>';
        $message.='</div>';
        $this->session->set_flashdata('message',$message);
        $redirect = base_url('admin/customer_list');

        $data['status']              = $status;
        $data['errors']              = $errors;
        $data['redirect']            = $redirect;
        $data['message']             = $message;
        
        echo json_encode($data);
	}

	public function delete_customer()
    {
        $id = $this->input->post('id');
        $this->admin_model->delete_customer($id);
        $data = base_url('admin/customer_list');
        echo json_encode($data);
    }

    public function view_customer($id)
    {
        $data['customer_details'] = $this->admin_model->get_customer_details($id);
        $customerid=$data['customer_details']->id;
        $data['invoice_amt'] = $this->admin_model->get_customer_invoice_amt($customerid);
        $data['paid_amt'] = $this->admin_model->get_customer_paid_amt($customerid);
        $data['invoice_transaction'] = $this->admin_model->get_customer_transaction_invoice($customerid);
        $data['payment_transaction'] = $this->admin_model->get_customer_transaction_payment_received($customerid);
        $data['challan_transaction'] = $this->admin_model->get_customer_transaction_challan($customerid);
        $data['company_details'] = $this->admin_model->get_company_details($id);
        $data['pending_invoice'] = $this->admin_model->get_pending_invoice_by_customer_dueamt($customerid);
        $data['total_due_amt'] = $this->admin_model->get_total_dueamt_pending_invoice_by_customer($customerid);
        $this->load->view('admin/view_customer',$data);
    }

    public function get_address_by_customer_name()
    {
        $customer_id = $this->input->post('customer_id');
        $data = $this->admin_model->get_address_by_customer_name($customer_id);
        echo json_encode($data);
    }

    /******************** Customer End **********************/

    /******************** Inventory Start **********************/

    public function inventory_list()
	{
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }
		$data['inventory_list'] = $this->admin_model->get_all_inventory_list();

		$this->load->view('admin/inventory_list',$data);
	}

	public function add_inventory()
	{
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }
		$data['godown_name'] = $this->admin_model->get_all_godown_list();
		$data['customer_name'] = $this->admin_model->get_all_customer_name();
		$this->load->view('admin/add_inventory',$data);
	}

	public function save_inventory()
	{
		//print_r('expression');exit;
		$errors   = array();
        $message  = '';
        $redirect = '';
    
        $this->db->trans_begin();

        //$data['users'] = $this->admin_model->get_users_data();
        //$user_id = $data['users']->id;

        $sales_information = $this->input->post('sales_information');

        if($sales_information == '')
        {
        	$sales_infor = '';
        }
        else
        {
        	$sales_infor = $this->input->post('sales_information');
        }

        $purchase_information = $this->input->post('purchase_information');

        if($purchase_information == '')
        {
        	$purchase_infor = '';
        }
        else
        {
        	$purchase_infor = $this->input->post('purchase_information');
        }

        $trackable_item = $this->input->post('trackable_item');

        if($trackable_item == '')
        {
        	$trackableitem = '';
        }
        else
        {
        	$trackableitem = $this->input->post('trackable_item');
        }


        $data = array(
        	'name'      => $this->input->post('name'),
            'unit'      => $this->input->post('unit'),
            'good_type'    => $this->input->post('good_type'),
            'tax_type'    => $this->input->post('tax_type'),
            'instrastate_gst'   	=> $this->input->post('instrastate_gst'),
            'insterstate_gst'   	=> $this->input->post('insterstate_gst'),
            'hsn'   	=> $this->input->post('hsn'),
            'sku'      	=> $this->input->post('sku'),
            'default_discount'     => $this->input->post('default_discount'),
            'amt_discount'     => $this->input->post('amt_discount'),
            'sales_information'     => $sales_infor,
            'sale_rate'     => $this->input->post('sale_rate'),
            'sales_account'     => $this->input->post('sales_account'),
            'sale_description'     => $this->input->post('sale_description'),
            'purchase_information'     => $purchase_infor,
            'purchase_rate'     => $this->input->post('purchase_rate'),
            'purchase_account'     => $this->input->post('purchase_account'),
            'purchase_description'     => $this->input->post('purchase_description'),
            'trackable_item'     => $trackableitem,
            'opening_stock'     => $this->input->post('opening_stock'),
            'opening_rate'     => $this->input->post('opening_rate'),
            'stock_account'     => $this->input->post('stock_account'),
            'godown'     => $this->input->post('godown'),
            'added_at'   => date('Y-m-d')
        );
        //print_r($data);exit;
        $this->db->insert('inventory', $data);

        /*$godown_name = $this->input->post('godown');
        $opening_stock = $this->input->post('opening_stock');

        $d['avail_qty'] = $this->admin_model->get_all_godown_qty($godown_name);
        $godown_qty = $d['avail_qty']->available_qty;
        //print_r($godown_qty);exit;

        $u_qty = $godown_qty + $opening_stock;

        $update_data = array(
            'available_qty'      => $u_qty
        );
        //print_r($data);exit;
        $this->db->where('name', $godown_name)->update('godown', $update_data);*/

        $godown_name = $this->input->post('godown');
        $opening_stock = $this->input->post('opening_stock');

        $update_data = array(
            'available_qty'      => $opening_stock
        );
        //print_r($data);exit;
        $this->db->where('name', $godown_name)->update('godown', $update_data);
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }

        $status = 'success';
        $message = '<br><div class="alert alert-info">';
        $message.='<strong>Inventory Added Successfully. </strong>';
        $message.='</div>';
        $this->session->set_flashdata('message',$message);
        $redirect = base_url('admin/inventory_list');

        $data['status']              = $status;
        $data['errors']              = $errors;
        $data['redirect']            = $redirect;
        $data['message']             = $message;
        
        echo json_encode($data);
	}

	public function edit_inventory($id)
	{
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }
		$data['edit_inventory'] = $this->admin_model->get_all_edit_inventory($id);

		$data['godown_name'] = $this->admin_model->get_all_godown_list();

		$this->load->view('admin/edit_inventory',$data);
	}

	public function update_inventory()
	{
		//print_r('expression');exit;
		$errors   = array();
        $message  = '';
        $redirect = '';
    
        $this->db->trans_begin();

        $inventory_id = $this->input->post('inventory_id');

        $sales_information = $this->input->post('sales_information');

        if($sales_information == '')
        {
        	$sales_infor = '';
        }
        else
        {
        	$sales_infor = $this->input->post('sales_information');
        }

        $purchase_information = $this->input->post('purchase_information');

        if($purchase_information == '')
        {
        	$purchase_infor = '';
        }
        else
        {
        	$purchase_infor = $this->input->post('purchase_information');
        }

        $trackable_item = $this->input->post('trackable_item');

        if($trackable_item == '')
        {
        	$trackableitem = '';
        }
        else
        {
        	$trackableitem = $this->input->post('trackable_item');
        }

        //$data['users'] = $this->admin_model->get_users_data();
        //$user_id = $data['users']->id;

        $data = array(
        	'name'      => $this->input->post('name'),
            'unit'      => $this->input->post('unit'),
            'good_type'    => $this->input->post('good_type'),
            'tax_type'    => $this->input->post('tax_type'),
            'instrastate_gst'   	=> $this->input->post('instrastate_gst'),
            'insterstate_gst'   	=> $this->input->post('insterstate_gst'),
            'hsn'   	=> $this->input->post('hsn'),
            'sku'      	=> $this->input->post('sku'),
            'default_discount'     => $this->input->post('default_discount'),
            'amt_discount'     => $this->input->post('amt_discount'),
            'sales_information'     => $sales_infor,
            'sale_rate'     => $this->input->post('sale_rate'),
            'sales_account'     => $this->input->post('sales_account'),
            'sale_description'     => $this->input->post('sale_description'),
            'purchase_information'     => $purchase_infor,
            'purchase_rate'     => $this->input->post('purchase_rate'),
            'purchase_account'     => $this->input->post('purchase_account'),
            'purchase_description'     => $this->input->post('purchase_description'),
            'trackable_item'     => $trackableitem,
            'opening_stock'     => $this->input->post('opening_stock'),
            'opening_rate'     => $this->input->post('opening_rate'),
            'stock_account'     => $this->input->post('stock_account'),
            'godown'     => $this->input->post('godown'),
            'updated_at'   => date('Y-m-d')
        );
        //print_r($data);exit;
        $this->db->where('id', $inventory_id)->update('inventory', $data);

        $godown_name = $this->input->post('godown');

        $godown_data = array(
            
            'available_qty'     => $this->input->post('opening_stock'),
            'updated_at'   => date('Y-m-d')
        );
        //print_r($data);exit;
        $this->db->where('name', $godown_name)->update('godown', $godown_data);
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }

        $status = 'success';
        $message = '<br><div class="alert alert-info">';
        $message.='<strong>Inventory Updated Successfully. </strong>';
        $message.='</div>';
        $this->session->set_flashdata('message',$message);
        $redirect = base_url('admin/inventory_list');

        $data['status']              = $status;
        $data['errors']              = $errors;
        $data['redirect']            = $redirect;
        $data['message']             = $message;
        
        echo json_encode($data);
	}

	public function delete_inventory()
    {
        $id = $this->input->post('id');
        $this->admin_model->delete_inventory($id);
        $data = base_url('admin/inventory_list');
        echo json_encode($data);
    }

    public function view_inventory($id)
    {
        $data['edit_inventory'] = $this->admin_model->get_all_edit_inventory($id);
        $inventoryname=$data['edit_inventory']->name;
        $data['view_inventory_sales'] = $this->admin_model->get_view_inventory_sales($inventoryname);
        $data['view_inventory_purchase'] = $this->admin_model->get_view_inventory_purchase($inventoryname);

        $data['available_purchase_qty'] = $this->admin_model->get_available_purchase_qty($inventoryname);
        $data['available_sales_qty'] = $this->admin_model->get_available_sales_qty($inventoryname);
        $this->load->view('admin/view_inventory',$data);
    }

    

    /******************** Inventory End **********************/

    /******************** Godown Start **********************/

	public function godown_list()
	{
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }

		$data['godown_list'] = $this->admin_model->get_all_godown_list();
        //$data['available_qty'] = $this->admin_model->get_all_godown_list();

		$this->load->view('admin/godown_list',$data);
	}

	public function add_godown()
	{
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }

		$this->load->view('admin/add_godown');
	}

	public function save_godown()
	{
		//print_r('expression');exit;
		$errors   = array();
        $message  = '';
        $redirect = '';
    
        $this->db->trans_begin();

        //$data['users'] = $this->admin_model->get_users_data();
        //$user_id = $data['users']->id;

        $data = array(
        	'name'      => $this->input->post('name'),
            'added_at'   => date('Y-m-d')
        );
        //print_r($data);exit;
        $this->db->insert('godown', $data);
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }

        $status = 'success';
        $message = '<br><div class="alert alert-info">';
        $message.='<strong>Godown Added Successfully. </strong>';
        $message.='</div>';
        $this->session->set_flashdata('message',$message);
        $redirect = base_url('admin/godown_list');

        $data['status']              = $status;
        $data['errors']              = $errors;
        $data['redirect']            = $redirect;
        $data['message']             = $message;
        
        echo json_encode($data);
	}

	public function edit_godown($id)
	{
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }

		$data['edit_godown'] = $this->admin_model->get_all_edit_godown($id);

		$this->load->view('admin/edit_godown',$data);
	}

	public function update_godown()
	{
		//print_r('update');exit;
		$errors   = array();
        $message  = '';
        $redirect = '';
    
        $this->db->trans_begin();

        //$data['users'] = $this->admin_model->get_users_data();
        //$user_id = $data['users']->id;

        $godown_id = $this->input->post('godown_id');

        $data = array(
        	'name'      => $this->input->post('name'),
            'updated_at'   => date('Y-m-d')
        );
        //print_r($data);exit;
        $this->db->where('id', $godown_id)->update('godown', $data);
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }

        $status = 'success';
        $message = '<br><div class="alert alert-info">';
        $message.='<strong>Godown Update Successfully. </strong>';
        $message.='</div>';
        $this->session->set_flashdata('message',$message);
        $redirect = base_url('admin/godown_list');

        $data['status']              = $status;
        $data['errors']              = $errors;
        $data['redirect']            = $redirect;
        $data['message']             = $message;
        
        echo json_encode($data);
	}

	public function delete_godown()
    {
        $id = $this->input->post('id');
        $this->admin_model->delete_godown($id);
        $data = base_url('admin/godown_list');
        echo json_encode($data);
    }

    /******************** Godown End **********************/

    /******************** Invoice Start **********************/

	public function invoice_list()
	{
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }

        //$data['customer_name'] = $this->admin_model->get_customer_name_invoice();
		$data['invoice_list'] = $this->admin_model->get_all_invoice_list();
        
		$this->load->view('admin/invoice_list',$data);
	}

	public function add_invoice()
	{
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }
		$data['customer_name'] = $this->admin_model->get_all_customer_list();
		//$data['item_name'] = $this->admin_model->get_all_item_name();

		$this->load->view('admin/add_invoice',$data);
	}

	public function save_invoice()
	{
		//print_r('expression');exit;
		$errors   = array();
        $message  = '';
        $redirect = '';
    
        $this->db->trans_begin();

        //$data['users'] = $this->admin_model->get_users_data();
        //$user_id = $data['users']->id;

        $data = array(
        	'customer_name'      => $this->input->post('customer_name'),
        	'invoice_date'      => $this->input->post('invoice_date'),
        	'due_date'      => $this->input->post('due_date'),
        	'invoice_no'      => $this->input->post('invoice_no'),
        	'order_no'      => $this->input->post('order_no'),
        	'place_of_supply'      => $this->input->post('place_of_supply'),
        	'item_rate'      => $this->input->post('item_rate'),
        	'sales_person'      => $this->input->post('sales_person'),
        	'subtotal'      => $this->input->post('subtotal'),
            'due_amount'      => $this->input->post('totalamt'),
        	'total_taxamt'      => $this->input->post('total_taxamt'),
        	'adjustment'      => $this->input->post('adjustment'),
        	'sale_of_good'      => $this->input->post('sale_of_good'),
        	'totalamt'      => $this->input->post('totalamt'),
        	'note'      => $this->input->post('note'),
            //'status'      => 'Sent',
            'added_at'   => date('Y-m-d')
        );
        //print_r($data);exit;
        $this->db->insert('invoice', $data);
        $last_insert_id = $this->db->insert_id();

		$iids = (count($this->input->post('iid'))==0)?array():$this->input->post('iid');
		$arr=array();
		foreach ($iids as $iid)
		{
			$entries_data=array(
				'invoiceid'=>$last_insert_id,
				'item' => $this->input->post('item_'.$iid),
				'description' => $this->input->post('description_'.$iid),
				'godown' => $this->input->post('godown_'.$iid),
				'qty' => $this->input->post('qty_'.$iid),
				'rate' => $this->input->post('rate_'.$iid),
				'account' => $this->input->post('account_'.$iid),
				'discount' => $this->input->post('discount_'.$iid),
				'taxrate' => $this->input->post('taxrate_'.$iid),
				'taxamt' => $this->input->post('taxamt_'.$iid),
				'total' => $this->input->post('total_'.$iid),
				'added_at'   => date('Y-m-d')
			);
			//print_r($entries_data);exit;
			$this->db->insert('invoice_entries', $entries_data);
		}

        /*$order_no = $this->input->post('order_no');
        //print_r($order_no);exit;

        $update_data = array(
            'status'      => 'Invoiced'
        );
        //print_r($update_data);exit;
        $this->db->where('challan_no', $order_no)->update('delivery_challan', $update_data);*/
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }

        $status = 'success';
        $message = '<br><div class="alert alert-info">';
        $message.='<strong>Invoice Added Successfully. </strong>';
        $message.='</div>';
        $this->session->set_flashdata('message',$message);
        $redirect = base_url('admin/invoice_list');

        $data['status']              = $status;
        $data['errors']              = $errors;
        $data['redirect']            = $redirect;
        $data['message']             = $message;
        
        echo json_encode($data);
	}

	public function edit_invoice($id)
	{
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }

		$data['customer_name'] = $this->admin_model->get_all_customer_list();
		$data['edit_invoice'] = $this->admin_model->get_all_edit_invoice($id);
		$invoiceid=$data['edit_invoice']->id;
		$data['edit_invoice_entries'] = $this->admin_model->get_all_edit_invoice_entries($invoiceid);
		$this->load->view('admin/edit_invoice',$data);
	}

	public function update_invoice()
	{
		//print_r('expression');exit;
		$errors   = array();
        $message  = '';
        $redirect = '';
    
        $this->db->trans_begin();

        //$data['users'] = $this->admin_model->get_users_data();
        //$user_id = $data['users']->id;

        $invoice_id = $this->input->post('invoice_id');

        $data = array(
        	'customer_name'      => $this->input->post('customer_name'),
        	'invoice_date'      => $this->input->post('invoice_date'),
        	'due_date'      => $this->input->post('due_date'),
        	'invoice_no'      => $this->input->post('invoice_no'),
        	'order_no'      => $this->input->post('order_no'),
        	'place_of_supply'      => $this->input->post('place_of_supply'),
        	'item_rate'      => $this->input->post('item_rate'),
        	'sales_person'      => $this->input->post('sales_person'),
        	'subtotal'      => $this->input->post('subtotal'),
            'due_amount'      => $this->input->post('totalamt'),
        	'total_taxamt'      => $this->input->post('total_taxamt'),
        	'adjustment'      => $this->input->post('adjustment'),
        	'sale_of_good'      => $this->input->post('sale_of_good'),
        	'totalamt'      => $this->input->post('totalamt'),
        	'note'      => $this->input->post('note'),
            'updated_at'   => date('Y-m-d')
        );
        //print_r($data);exit;
        $this->db->where('id', $invoice_id)->update('invoice', $data);
        $last_insert_id = $this->db->insert_id();

        $this->admin_model->delete_invoice_entries($invoice_id);
        //exit;
        

		$iids = (count($this->input->post('iid'))==0)?array():$this->input->post('iid');
		//print_r($iids);exit;
		$arr=array();
		foreach ($iids as $iid)
		{
			$entries_data=array(
				'invoiceid'=>$invoice_id,
				'item' => $this->input->post('item_'.$iid),
				'description' => $this->input->post('description_'.$iid),
				'godown' => $this->input->post('godown_'.$iid),
				'qty' => $this->input->post('qty_'.$iid),
				'rate' => $this->input->post('rate_'.$iid),
				'account' => $this->input->post('account_'.$iid),
				'discount' => $this->input->post('discount_'.$iid),
				'taxrate' => $this->input->post('taxrate_'.$iid),
				'taxamt' => $this->input->post('taxamt_'.$iid),
				'total' => $this->input->post('total_'.$iid),
				'added_at'   => date('Y-m-d')
			);
			//print_r($entries_data);exit;
			$this->db->insert('invoice_entries', $entries_data);
		}
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }

        $status = 'success';
        $message = '<br><div class="alert alert-info">';
        $message.='<strong>Invoice Update Successfully. </strong>';
        $message.='</div>';
        $this->session->set_flashdata('message',$message);
        $redirect = base_url('admin/invoice_list');

        $data['status']              = $status;
        $data['errors']              = $errors;
        $data['redirect']            = $redirect;
        $data['message']             = $message;
        
        echo json_encode($data);
	}

	public function delete_invoice()
    {
        $id = $this->input->post('id');
        $this->admin_model->delete_invoice($id);
        $data = base_url('admin/invoice_list');
        echo json_encode($data);
    }

	/*public function view_invoice()
	{
		$this->load->view('admin/view_invoice');
	}*/

	public function getitemsdetails()
	{
		//print_r('aaaa');exit;
		if ($this->input->post('itemsdetails'))
		{
			$name_startsWith=$this->input->post('name_startsWith');
			$type=$this->input->post('itemsdetails');
			$res = array();
			$data=$this->admin_model->getitemsdetails($name_startsWith);
			for ($i=0; $i < count($data); $i++) { 
			$name = $data[$i]['name'].'|'.$data[$i]['sale_description'].'|'.$data[$i]['godown'].'|'.$data[$i]['opening_stock'].'|'.$data[$i]['purchase_rate'].'|'.$data[$i]['sales_account'].'|'.$data[$i]['default_discount'].'|'.$data[$i]['instrastate_gst'].'|'.$data[$i]['sale_rate'].'|'.$data[$i]['purchase_account'].'|'.$data[$i]['purchase_description'];
			 array_push($res, $name);	
			}
			echo json_encode($res);
		}
		else
		{
			echo "failed";
		}
	}

	/*public function invoice_setting()
	{
		$this->load->view('admin/invoice_setting');
	}*/

    public function view_invoice($id)
    {
        $data['company_details'] = $this->admin_model->get_company_details($id);
        $data['edit_invoice'] = $this->admin_model->get_all_edit_invoice($id);
        $invoiceid=$data['edit_invoice']->id;
        $customerid=$data['edit_invoice']->customer_name;
        $data['edit_invoice_entries'] = $this->admin_model->get_all_edit_invoice_entries($invoiceid);
        $data['customer_address'] = $this->admin_model->get_customer_address($customerid);
        $this->load->view('admin/view_invoice',$data);
    }

	/********************Invoice End **********************/

	/************** vendor start *******************/

	public function vendor_list()
	{
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }

		$data['vendor_list'] = $this->admin_model->get_all_vendor_list();

		$this->load->view('admin/vendor_list',$data);
	}

	public function add_vendor()
	{
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }

		$this->load->view('admin/add_vendor');
	}

	public function save_vendor()
	{
		//print_r('expression');exit;
		$errors   = array();
        $message  = '';
        $redirect = '';
    
        $this->db->trans_begin();

        //$data['users'] = $this->admin_model->get_users_data();
        //$user_id = $data['users']->id;


        $data = array(
        	'primary_contact'      => $this->input->post('primary_contact'),
        	'first_name'      => $this->input->post('first_name'),
        	'last_name'      => $this->input->post('last_name'),
        	'company_name'      => $this->input->post('company_name'),
        	'display_name'      => $this->input->post('display_name'),
        	'email'    => $this->input->post('email'),
            'phone'      => $this->input->post('phone'),
            'mobile'      => $this->input->post('mobile'),
            'website'   	=> $this->input->post('website'),
            'payment_terms'     => $this->input->post('payment_terms'),
            'gst_treatment'     => $this->input->post('gst_treatment'),
            'gst_no'     => $this->input->post('gst_no'),
            'source_of_supply'     => $this->input->post('source_of_supply'),
            'opening_bal'     => $this->input->post('opening_bal'),
            'pan_no'     => $this->input->post('pan_no'),
            'billing_attention'     => $this->input->post('billing_attention'),
            'billing_street'     => $this->input->post('billing_street'),
            'billing_city'     => $this->input->post('billing_city'),
            'billing_state'     => $this->input->post('billing_state'),
            'billing_pincode'     => $this->input->post('billing_pincode'),
            'shipping_attention'     => $this->input->post('shipping_attention'),
            'shipping_street'     => $this->input->post('shipping_street'),
            'shipping_city'     => $this->input->post('shipping_city'),
            'shipping_state'     => $this->input->post('shipping_state'),
            'shipping_pincode'     => $this->input->post('shipping_pincode'),
            'bank_name'     => $this->input->post('bank_name'),
            'branch_name'     => $this->input->post('branch_name'),
            'ifsc_code'     => $this->input->post('ifsc_code'),
            'account_no'     => $this->input->post('account_no'),
            //'photo'     => $upload_photo['file_name'],
            //'status'     => $this->input->post('status'),
            'added_at'   => date('Y-m-d')
        );
        //print_r($data);exit;
        $this->db->insert('vendor', $data);
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }

        $status = 'success';
        $message = '<br><div class="alert alert-info">';
        $message.='<strong>Vendor Added Successfully. </strong>';
        $message.='</div>';
        $this->session->set_flashdata('message',$message);
        $redirect = base_url('admin/vendor_list');

        $data['status']              = $status;
        $data['errors']              = $errors;
        $data['redirect']            = $redirect;
        $data['message']             = $message;
        
        echo json_encode($data);
	}

	public function edit_vendor($id)
	{
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }

		$data['edit_vendor'] = $this->admin_model->get_all_edit_vendor($id);

		$this->load->view('admin/edit_vendor',$data);
	}

	public function update_vendor()
	{
		//print_r('update');exit;
		$errors   = array();
        $message  = '';
        $redirect = '';
    
        $this->db->trans_begin();

        //$data['users'] = $this->admin_model->get_users_data();
        //$user_id = $data['users']->id;

        $vendor_id = $this->input->post('vendor_id');


        $data = array(
        	'primary_contact'      => $this->input->post('primary_contact'),
        	'first_name'      => $this->input->post('first_name'),
        	'last_name'      => $this->input->post('last_name'),
        	'company_name'      => $this->input->post('company_name'),
        	'display_name'      => $this->input->post('display_name'),
        	'email'    => $this->input->post('email'),
            'phone'      => $this->input->post('phone'),
            'mobile'      => $this->input->post('mobile'),
            'website'   	=> $this->input->post('website'),
            'payment_terms'     => $this->input->post('payment_terms'),
            'gst_treatment'     => $this->input->post('gst_treatment'),
            'gst_no'     => $this->input->post('gst_no'),
            'source_of_supply'     => $this->input->post('source_of_supply'),
            'opening_bal'     => $this->input->post('opening_bal'),
            'pan_no'     => $this->input->post('pan_no'),
            'billing_attention'     => $this->input->post('billing_attention'),
            'billing_street'     => $this->input->post('billing_street'),
            'billing_city'     => $this->input->post('billing_city'),
            'billing_state'     => $this->input->post('billing_state'),
            'billing_pincode'     => $this->input->post('billing_pincode'),
            'shipping_attention'     => $this->input->post('shipping_attention'),
            'shipping_street'     => $this->input->post('shipping_street'),
            'shipping_city'     => $this->input->post('shipping_city'),
            'shipping_state'     => $this->input->post('shipping_state'),
            'shipping_pincode'     => $this->input->post('shipping_pincode'),
            'bank_name'     => $this->input->post('bank_name'),
            'branch_name'     => $this->input->post('branch_name'),
            'ifsc_code'     => $this->input->post('ifsc_code'),
            'account_no'     => $this->input->post('account_no'),
            //'photo'     => $upload_photo['file_name'],
            //'status'     => $this->input->post('status'),
            'updated_at'   => date('Y-m-d')
        );
        //print_r($data);exit;
        $this->db->where('id', $vendor_id)->update('vendor', $data);
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }

        $status = 'success';
        $message = '<br><div class="alert alert-info">';
        $message.='<strong>Vendor Update Successfully. </strong>';
        $message.='</div>';
        $this->session->set_flashdata('message',$message);
        $redirect = base_url('admin/vendor_list');

        $data['status']              = $status;
        $data['errors']              = $errors;
        $data['redirect']            = $redirect;
        $data['message']             = $message;
        
        echo json_encode($data);
	}

	public function delete_vendor()
    {
        $id = $this->input->post('id');
        $this->admin_model->delete_vendor($id);
        $data = base_url('admin/vendor_list');
        echo json_encode($data);
    }

    public function view_vendor($id)
    {
        $data['company_details'] = $this->admin_model->get_company_details($id);
        $data['vendor_details'] = $this->admin_model->get_vendor_details($id);
        $vendorid=$data['vendor_details']->id;
        $data['bill_amt'] = $this->admin_model->get_vendor_bill_amt($vendorid);
        $data['paid_amt'] = $this->admin_model->get_vendor_paid_amt($vendorid);
        $data['bill_transaction'] = $this->admin_model->get_vendor_transaction_bill($vendorid);
        $data['payment_transaction'] = $this->admin_model->get_vendor_transaction_payment_made($vendorid);
        $data['order_transaction'] = $this->admin_model->get_vendor_transaction_order($vendorid);
        $data['pending_bill'] = $this->admin_model->get_pending_bill_by_vendor_dueamt($vendorid);
        $data['total_due_amt'] = $this->admin_model->get_total_dueamt_pending_bill_by_vendor($vendorid);
        $this->load->view('admin/view_vendor',$data);
    }

    public function get_address_by_vendor_name()
    {
        $vendor_id = $this->input->post('vendor_id');
        $data = $this->admin_model->get_address_by_vendor_name($vendor_id);
        echo json_encode($data);
    }

    /*************** Vendor End *************/

    /*************** Bill Start *************/

    public function bill_list()
	{
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }

		$data['bill_list'] = $this->admin_model->get_all_bill_list();
        $data['vendor_name'] = $this->admin_model->get_all_vendor_name();
		$this->load->view('admin/bill_list',$data);
	}

    public function add_bill()
	{
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }
        $data['godown_name'] = $this->admin_model->get_all_godown_list();
		$data['vendor_name'] = $this->admin_model->get_all_vendor_list();
		$this->load->view('admin/add_bill',$data);
	}

	public function save_bill()
	{
		//print_r('expression');exit;
		$errors   = array();
        $message  = '';
        $redirect = '';
    
        $this->db->trans_begin();

        //$data['users'] = $this->admin_model->get_users_data();
        //$user_id = $data['users']->id;

        $data = array(
        	'vendor_name'      => $this->input->post('vendor_name'),
        	'bill_date'      => $this->input->post('bill_date'),
        	'due_date'      => $this->input->post('due_date'),
        	'bill_no'      => $this->input->post('bill_no'),
        	'source_of_supply'      => $this->input->post('source_of_supply'),
        	'destination_of_supply'      => $this->input->post('destination_of_supply'),
        	'order_no'      => $this->input->post('order_no'),
        	'item_rate'      => $this->input->post('item_rate'),
            //'due_amount'      => $this->input->post('subtotal'),
            'due_amount'      => $this->input->post('totalamt'),
        	'subtotal'      => $this->input->post('subtotal'),
        	'total_taxamt'      => $this->input->post('total_taxamt'),
        	'adjustment'      => $this->input->post('adjustment'),
        	'totalamt'      => $this->input->post('totalamt'),
        	'note'      => $this->input->post('note'),
            //'status'      => 'Open',
            'added_at'   => date('Y-m-d')
        );
        //print_r($data);exit;
        $this->db->insert('bill', $data);
        $last_insert_id = $this->db->insert_id();

		$iids = (count($this->input->post('iid'))==0)?array():$this->input->post('iid');
		$arr=array();
		foreach ($iids as $iid)
		{
			$entries_data=array(
				'billid'=>$last_insert_id,
				'item' => $this->input->post('item_'.$iid),
				'description' => $this->input->post('description_'.$iid),
				'godown' => $this->input->post('godown_'.$iid),
				'qty' => $this->input->post('qty_'.$iid),
				'rate' => $this->input->post('rate_'.$iid),
				'account' => $this->input->post('account_'.$iid),
				'discount' => $this->input->post('discount_'.$iid),
				'taxrate' => $this->input->post('taxrate_'.$iid),
				'taxamt' => $this->input->post('taxamt_'.$iid),
				'total' => $this->input->post('total_'.$iid),
				'added_at'   => date('Y-m-d')
			);
			//print_r($entries_data);exit;
			$this->db->insert('bill_entries', $entries_data);

            /*$godown_name = $this->input->post('godown_'.$iid);

            $d['avail_qty'] = $this->admin_model->get_all_godown_qty($godown_name);
            $godown_qty = $d['avail_qty']->available_qty;
            //print_r($godown_qty);exit;

            $bill_qty = $this->input->post('qty_'.$iid);

            $u_qty = $godown_qty + $bill_qty;

            $bill_qty_update_data = array(
                'available_qty'      => $u_qty
            );
            //print_r($data);exit;
            $this->db->where('name', $godown_name)->update('godown', $bill_qty_update_data);*/
		}

        /*$order_no = $this->input->post('order_no');
        //print_r($order_no);exit;

        $update_data = array(
            'status'      => 'Billed'
        );
        //print_r($update_data);exit;
        $this->db->where('purchase_order', $order_no)->update('purchase_order', $update_data);*/
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }

        $status = 'success';
        $message = '<br><div class="alert alert-info">';
        $message.='<strong>Bill Added Successfully. </strong>';
        $message.='</div>';
        $this->session->set_flashdata('message',$message);
        $redirect = base_url('admin/bill_list');

        $data['status']              = $status;
        $data['errors']              = $errors;
        $data['redirect']            = $redirect;
        $data['message']             = $message;
        
        echo json_encode($data);
	}

	public function edit_bill($id)
	{
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }

		$data['vendor_name'] = $this->admin_model->get_all_vendor_list();
		$data['edit_bill'] = $this->admin_model->get_all_edit_bill($id);
		$billid=$data['edit_bill']->id;
		$data['edit_bill_entries'] = $this->admin_model->get_all_edit_bill_entries($billid);
		$this->load->view('admin/edit_bill',$data);
	}

	public function update_bill()
	{
		//print_r('expression');exit;
		$errors   = array();
        $message  = '';
        $redirect = '';
    
        $this->db->trans_begin();

        //$data['users'] = $this->admin_model->get_users_data();
        //$user_id = $data['users']->id;

        $bill_id = $this->input->post('bill_id');

        $data = array(
        	'vendor_name'      => $this->input->post('vendor_name'),
            'bill_date'      => $this->input->post('bill_date'),
            'due_date'      => $this->input->post('due_date'),
            'bill_no'      => $this->input->post('bill_no'),
            'source_of_supply'      => $this->input->post('source_of_supply'),
            'destination_of_supply'      => $this->input->post('destination_of_supply'),
            'order_no'      => $this->input->post('order_no'),
            'item_rate'      => $this->input->post('item_rate'),
            'subtotal'      => $this->input->post('subtotal'),
            'total_taxamt'      => $this->input->post('total_taxamt'),
            'adjustment'      => $this->input->post('adjustment'),
            'totalamt'      => $this->input->post('totalamt'),
            'note'      => $this->input->post('note'),
            'updated_at'   => date('Y-m-d')
        );
        //print_r($data);exit;
        $this->db->where('id', $bill_id)->update('bill', $data);
        $last_insert_id = $this->db->insert_id();

        $this->admin_model->delete_bill_entries($bill_id);
        //exit;
        

		$iids = (count($this->input->post('iid'))==0)?array():$this->input->post('iid');
		//print_r($iids);exit;
		$arr=array();
		foreach ($iids as $iid)
		{
			$entries_data=array(
				'billid'=>$bill_id,
				'item' => $this->input->post('item_'.$iid),
				'description' => $this->input->post('description_'.$iid),
				'godown' => $this->input->post('godown_'.$iid),
				'qty' => $this->input->post('qty_'.$iid),
				'rate' => $this->input->post('rate_'.$iid),
				'account' => $this->input->post('account_'.$iid),
				'discount' => $this->input->post('discount_'.$iid),
				'taxrate' => $this->input->post('taxrate_'.$iid),
				'taxamt' => $this->input->post('taxamt_'.$iid),
				'total' => $this->input->post('total_'.$iid),
				'added_at'   => date('Y-m-d')
			);
			//print_r($entries_data);exit;
			$this->db->insert('bill_entries', $entries_data);
		}
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }

        $status = 'success';
        $message = '<br><div class="alert alert-info">';
        $message.='<strong>Bill Update Successfully. </strong>';
        $message.='</div>';
        $this->session->set_flashdata('message',$message);
        $redirect = base_url('admin/bill_list');

        $data['status']              = $status;
        $data['errors']              = $errors;
        $data['redirect']            = $redirect;
        $data['message']             = $message;
        
        echo json_encode($data);
	}

	public function delete_bill()
    {
        $id = $this->input->post('id');
        $this->admin_model->delete_bill($id);
        $data = base_url('admin/bill_list');
        echo json_encode($data);
    }

    public function view_bill($id)
    {
        $data['edit_bill'] = $this->admin_model->get_all_edit_bill($id);
        $billid=$data['edit_bill']->id;
        $vendorid=$data['edit_bill']->vendor_name;
        $data['edit_bill_entries'] = $this->admin_model->get_all_edit_bill_entries($billid);
        $data['vendor_address'] = $this->admin_model->get_vendor_address($vendorid);
        $data['company_details'] = $this->admin_model->get_company_details($id);
        $this->load->view('admin/view_bill',$data);
    }

    /*************** Bill End *************/

    /*************** Purchase Order Start *************/

    public function purchase_order_list()
    {
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }

        $data['purchase_order_list'] = $this->admin_model->get_all_purchase_order_list();
        $data['vendor_name'] = $this->admin_model->get_all_vendor_name();
        $this->load->view('admin/purchase_order_list',$data);
    }

    public function add_purchase_order()
    {
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }

        $data['vendor_name'] = $this->admin_model->get_all_vendor_list();
        $this->load->view('admin/add_purchase_order',$data);
    }

    public function save_purchase_order()
    {
        //print_r('expression');exit;
        $errors   = array();
        $message  = '';
        $redirect = '';
    
        $this->db->trans_begin();

        //$data['users'] = $this->admin_model->get_users_data();
        //$user_id = $data['users']->id;

        $data = array(
            'vendor_name'      => $this->input->post('vendor_name'),
            'order_date'      => $this->input->post('order_date'),
            'delivery_date'      => $this->input->post('delivery_date'),
            'purchase_order'      => $this->input->post('purchase_order'),
            'source_of_supply'      => $this->input->post('source_of_supply'),
            'destination_of_supply'      => $this->input->post('destination_of_supply'),
            'item_rate'      => $this->input->post('item_rate'),
            'subtotal'      => $this->input->post('subtotal'),
            'total_taxamt'      => $this->input->post('total_taxamt'),
            'adjustment'      => $this->input->post('adjustment'),
            'totalamt'      => $this->input->post('totalamt'),
            'note'      => $this->input->post('note'),
            //'Status'      => 'Open',
            'added_at'   => date('Y-m-d')
        );
        //print_r($data);exit;
        $this->db->insert('purchase_order', $data);
        $last_insert_id = $this->db->insert_id();

        $iids = (count($this->input->post('iid'))==0)?array():$this->input->post('iid');
        $arr=array();
        foreach ($iids as $iid)
        {
            $entries_data=array(
                'purchaseorderid'=>$last_insert_id,
                'item' => $this->input->post('item_'.$iid),
                'description' => $this->input->post('description_'.$iid),
                'qty' => $this->input->post('qty_'.$iid),
                'rate' => $this->input->post('rate_'.$iid),
                'account' => $this->input->post('account_'.$iid),
                'discount' => $this->input->post('discount_'.$iid),
                'taxrate' => $this->input->post('taxrate_'.$iid),
                'taxamt' => $this->input->post('taxamt_'.$iid),
                'total' => $this->input->post('total_'.$iid),
                'added_at'   => date('Y-m-d')
            );
            //print_r($entries_data);exit;
            $this->db->insert('purchase_order_entries', $entries_data);
        }
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }

        $status = 'success';
        $message = '<br><div class="alert alert-info">';
        $message.='<strong>Purchase Order Added Successfully. </strong>';
        $message.='</div>';
        $this->session->set_flashdata('message',$message);
        $redirect = base_url('admin/purchase_order_list');

        $data['status']              = $status;
        $data['errors']              = $errors;
        $data['redirect']            = $redirect;
        $data['message']             = $message;
        
        echo json_encode($data);
    }

    public function edit_purchase_order($id)
    {
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }

        $data['vendor_name'] = $this->admin_model->get_all_vendor_list();
        $data['edit_purchase_order'] = $this->admin_model->get_all_edit_purchase_order($id);
        $purchaseorderid=$data['edit_purchase_order']->id;
        $data['edit_purchase_order_entries'] = $this->admin_model->get_all_edit_purchase_order_entries($purchaseorderid);
        $this->load->view('admin/edit_purchase_order',$data);
    }

    public function update_purchase_order()
    {
        //print_r('expression');exit;
        $errors   = array();
        $message  = '';
        $redirect = '';
    
        $this->db->trans_begin();

        //$data['users'] = $this->admin_model->get_users_data();
        //$user_id = $data['users']->id;

        $purchase_order_id = $this->input->post('purchase_order_id');

        $data = array(
            'vendor_name'      => $this->input->post('vendor_name'),
            'order_date'      => $this->input->post('order_date'),
            'delivery_date'      => $this->input->post('delivery_date'),
            'purchase_order'      => $this->input->post('purchase_order'),
            'source_of_supply'      => $this->input->post('source_of_supply'),
            'destination_of_supply'      => $this->input->post('destination_of_supply'),
            'item_rate'      => $this->input->post('item_rate'),
            'subtotal'      => $this->input->post('subtotal'),
            'total_taxamt'      => $this->input->post('total_taxamt'),
            'adjustment'      => $this->input->post('adjustment'),
            'totalamt'      => $this->input->post('totalamt'),
            'note'      => $this->input->post('note'),
            'updated_at'   => date('Y-m-d')
        );
        //print_r($data);exit;
        $this->db->where('id', $purchase_order_id)->update('purchase_order', $data);
        $last_insert_id = $this->db->insert_id();

        $this->admin_model->delete_purchase_order_entries($purchase_order_id);
        //exit;
        

        $iids = (count($this->input->post('iid'))==0)?array():$this->input->post('iid');
        //print_r($iids);exit;
        $arr=array();
        foreach ($iids as $iid)
        {
            $entries_data=array(
                'purchaseorderid'=>$purchase_order_id,
                'item' => $this->input->post('item_'.$iid),
                'description' => $this->input->post('description_'.$iid),
                'qty' => $this->input->post('qty_'.$iid),
                'rate' => $this->input->post('rate_'.$iid),
                'account' => $this->input->post('account_'.$iid),
                'discount' => $this->input->post('discount_'.$iid),
                'taxrate' => $this->input->post('taxrate_'.$iid),
                'taxamt' => $this->input->post('taxamt_'.$iid),
                'total' => $this->input->post('total_'.$iid),
                'added_at'   => date('Y-m-d')
            );
            //print_r($entries_data);exit;
            $this->db->insert('purchase_order_entries', $entries_data);
        }
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }

        $status = 'success';
        $message = '<br><div class="alert alert-info">';
        $message.='<strong>Purchase Order Update Successfully. </strong>';
        $message.='</div>';
        $this->session->set_flashdata('message',$message);
        $redirect = base_url('admin/purchase_order_list');

        $data['status']              = $status;
        $data['errors']              = $errors;
        $data['redirect']            = $redirect;
        $data['message']             = $message;
        
        echo json_encode($data);
    }

    public function delete_purchase_order()
    {
        $id = $this->input->post('id');
        $this->admin_model->delete_purchase_order($id);
        $data = base_url('admin/purchase_order_list');
        echo json_encode($data);
    }

    public function view_purchase_order($id)
    {
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }
        
        $data['edit_purchase_order'] = $this->admin_model->get_all_edit_purchase_order($id);
        $purchaseorderid=$data['edit_purchase_order']->id;
        $vendorid=$data['edit_purchase_order']->vendor_name;
        $data['edit_purchase_order_entries'] = $this->admin_model->get_all_edit_purchase_order_entries($purchaseorderid);
        $data['vendor_address'] = $this->admin_model->get_vendor_address($vendorid);
        $data['company_details'] = $this->admin_model->get_company_details($id);
        $this->load->view('admin/view_purchase_order',$data);
    }

    /*************** Purchase Order End *************/

    /*************** Payment Received Start *************/

    public function payment_received_list()
    {
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }

        $data['payment_received_list'] = $this->admin_model->get_all_payment_received_list();
        $this->load->view('admin/payment_received_list',$data);
    }

    public function add_payment_received()
    {
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }

        $data['customer_name'] = $this->admin_model->get_all_customer_name();
        $data['bank_name'] = $this->admin_model->get_all_bank_list();
        $data['payment_received_id'] = $this->admin_model->get_payment_received_id_increment();
        $this->load->view('admin/add_payment_received',$data);
    }

    public function edit_payment_received($id)
    {
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }

        $data['customer_name'] = $this->admin_model->get_all_customer_name();
        $data['bank_name'] = $this->admin_model->get_all_bank_list();
        $data['edit_payment_received'] = $this->admin_model->get_all_edit_payment_received($id);
        $paymentreceivedid=$data['edit_payment_received']->id;
        $data['edit_payment_received_entries'] = $this->admin_model->get_all_edit_payment_received_entries($paymentreceivedid);
        $this->load->view('admin/edit_payment_received',$data);
    }

    public function get_pending_invoice()
    {
        $customer = $this->input->post('customer');
        $data = $this->admin_model->get_pending_invoice($customer);
        //print_r($data);exit;
        echo json_encode($data);
    }

    public function save_payment_received()
    {
        //print_r('save_payment_received');exit;

        $errors   = array();
        $message  = '';
        $redirect = '';
    
        $this->db->trans_begin();

        $data = array(
            'deposit'      => $this->input->post('deposit'),
            'customer'      => $this->input->post('customer'),
            'date'      => $this->input->post('date'),
            'payment_mode'      => $this->input->post('payment_mode'),
            'mobile'      => $this->input->post('mobile'),
            'balance'      => $this->input->post('balance'),
            'amount'      => $this->input->post('amount'),
            'bank_charges'      => $this->input->post('bank_charges'),
            'cheque_no'      => $this->input->post('cheque_no'),
            'cheque_date'      => $this->input->post('cheque_date'),
            'reference'      => $this->input->post('reference'),
            'note'      => $this->input->post('note'),
            'total'      => $this->input->post('total'),
            'amount_received'      => $this->input->post('amount_received'),
            'amount_used'      => $this->input->post('amount_used'),
            'amount_excess'      => $this->input->post('amount_excess'),
            'added_at'   => date('Y-m-d')
        );
        //print_r($data);
        $this->db->insert('payment_received', $data);
        $last_insert_id = $this->db->insert_id();

        /*$data1 = array(
            'payment_received_id'      => $last_insert_id,
            'invoicedate'      => $this->input->post('invoicedate'),
            'invoiceno'      => $this->input->post('invoiceno'),
            'invoiceamount'      => $this->input->post('invoiceamount'),
            'dueamount'      => $this->input->post('dueamount'),
            'payment'      => $this->input->post('payment'),
            'added_at'   => date('Y-m-d')
        );
        //print_r($data1);exit;
        $this->db->insert('payment_received_entries', $data1);*/

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }

        $status = 'success';
        $message = '<br><div class="alert alert-info">';
        $message.='<strong>Payment Received Added Successfully. </strong>';
        $message.='</div>';
        $this->session->set_flashdata('message',$message);
        $redirect = base_url('admin/payment_received_list');

        $data['status']              = $status;
        $data['errors']              = $errors;
        $data['redirect']            = $redirect;
        $data['message']             = $message;
        
        echo json_encode($data);
        
    }

    public function save_payment_received_entries()
    {
        //print_r('expression');exit;

        $errors   = array();
        $message  = '';
        $redirect = '';
    
        $this->db->trans_begin();

        //$data['users'] = $this->admin_model->get_users_data();
        //$user_id = $data['users']->id;

        $data['payment_received_id'] = $this->admin_model->get_payment_received_last_id();
        $last_inserted_id = $data['payment_received_id']->id;

        //$invoice_no = $this->input->post('invoiceno');
        //$dueamount = $this->input->post('dueamount');
        //$payment = $this->input->post('payment');

        //$uppayment = (int)$dueamount-(int)$payment;


        $data = array(
            'payment_received_id'      => $last_inserted_id,
            'customername'      => $this->input->post('customername'),
            'invoicedate'      => $this->input->post('invoicedate'),
            'invoiceno'      => $this->input->post('invoiceno'),
            'invoiceamount'      => $this->input->post('invoiceamount'),
            'dueamount'      => $this->input->post('dueamount'),
            'payment'      => $this->input->post('payment'),
            'added_at'   => date('Y-m-d')
        );
        //print_r($data);exit;
        $this->db->insert('payment_received_entries', $data);


        //if($dueamount != $payment)
        //{
          //  $status = 'Partially paid';
        //}
        //else
        //{
          //  $status = 'Paid';
        //}

        //update due amount
        //$updata = array(
        //    'due_amount'      => $uppayment,
        //    'status'      => $status
        //);
        //print_r($data);exit;
        //$this->db->where('invoice_no', $invoice_no)->update('invoice', $updata);

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }

        $status = 'success';
        $message = '<br><div class="alert alert-info">';
        $message.='<strong>Payment Received Added Successfully. </strong>';
        $message.='</div>';
        $this->session->set_flashdata('message',$message);
        $redirect = base_url('admin/payment_received_list');

        $data['status']              = $status;
        $data['errors']              = $errors;
        $data['redirect']            = $redirect;
        $data['message']             = $message;
        //print_r($data);exit;
        
        echo json_encode($data);
    }

    public function update_payment_received()
    {
        //print_r('expression');exit;
        $errors   = array();
        $message  = '';
        $redirect = '';
    
        $this->db->trans_begin();

        //$data['users'] = $this->admin_model->get_users_data();
        //$user_id = $data['users']->id;

        $payment_received_id = $this->input->post('payment_received_id');

        $data = array(
            'deposit'      => $this->input->post('deposit'),
            'customer'      => $this->input->post('customer'),
            'date'      => $this->input->post('date'),
            'payment_mode'      => $this->input->post('payment_mode'),
            'mobile'      => $this->input->post('mobile'),
            'balance'      => $this->input->post('balance'),
            'amount'      => $this->input->post('amount'),
            'bank_charges'      => $this->input->post('bank_charges'),
            'cheque_no'      => $this->input->post('cheque_no'),
            'cheque_date'      => $this->input->post('cheque_date'),
            'reference'      => $this->input->post('reference'),
            'note'      => $this->input->post('note'),
            'total'      => $this->input->post('total'),
            'amount_received'      => $this->input->post('amount_received'),
            'amount_used'      => $this->input->post('amount_used'),
            'amount_excess'      => $this->input->post('amount_excess'),
            'updated_at'   => date('Y-m-d')
        );
        //print_r($data);exit;
        $this->db->where('id', $payment_received_id)->update('payment_received', $data);

        $this->admin_model->delete_payment_received_entries($payment_received_id);


        $iids = (count($this->input->post('iid'))==0)?array():$this->input->post('iid');
        //print_r($iids);exit;
        $arr=array();
        foreach ($iids as $iid)
        {
            $entries_data=array(
                'payment_received_id'      => $payment_received_id,
                'invoicedate'      => $this->input->post('invoicedate'.$iid),
                'invoiceno'      => $this->input->post('invoiceno'.$iid),
                'invoiceamount'      => $this->input->post('invoiceamount'.$iid),
                'dueamount'      => $this->input->post('dueamount'.$iid),
                'payment'      => $this->input->post('payment'.$iid),
                'added_at'   => date('Y-m-d')
            );
            //print_r($entries_data);exit;
            $this->db->insert('payment_received_entries', $entries_data);
        }
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }

        $status = 'success';
        $message = '<br><div class="alert alert-info">';
        $message.='<strong>Payment Received Update Successfully. </strong>';
        $message.='</div>';
        $this->session->set_flashdata('message',$message);
        $redirect = base_url('admin/payment_received_list');

        $data['status']              = $status;
        $data['errors']              = $errors;
        $data['redirect']            = $redirect;
        $data['message']             = $message;
        
        echo json_encode($data);
    }

    public function delete_payment_received()
    {
        $id = $this->input->post('id');
        $this->admin_model->delete_payment_received($id);
        $data = base_url('admin/payment_received_list');
        echo json_encode($data);
    }

    public function view_payment_received($id)
    {
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }

        $data['view_payment_received'] = $this->admin_model->get_view_payment_received($id);
        $paymentreceivedid=$data['view_payment_received']->id;
        $data['view_payment_received_entries'] = $this->admin_model->get_all_edit_payment_received_entries($paymentreceivedid);
        $data['company_details'] = $this->admin_model->get_company_details($id);
        $this->load->view('admin/view_payment_received',$data);
    }


    /*************** Payment Received End *************/


    /*************** Banking Start *************/

    public function bank_list()
    {
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }

        $data['bank_list'] = $this->admin_model->get_all_bank_list();

        $this->load->view('admin/bank_list',$data);
    }

    public function add_bank()
    {
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }

        $this->load->view('admin/add_bank');
    }

    public function save_bank()
    {
        //print_r('expression');exit;
        $errors   = array();
        $message  = '';
        $redirect = '';
    
        $this->db->trans_begin();

        //$data['users'] = $this->admin_model->get_users_data();
        //$user_id = $data['users']->id;

        $show_dashboard = $this->input->post('show_dashboard');

        if($show_dashboard == 'on')
        {
            $dashboard = 'check';
        }
        else
        {
            $dashboard =  'uncheck';
        }

        $default_payment_retail_invoice = $this->input->post('default_payment_retail_invoice');

        if($default_payment_retail_invoice == 'on')
        {
            $default_payment = 'check';
        }
        else
        {
            $default_payment =  'uncheck';
        }

        $data = array(
            'account_name'      => $this->input->post('account_name'),
            'bank_name'      => $this->input->post('bank_name'),
            'branch_name'      => $this->input->post('branch_name'),
            'ifsc_code'      => $this->input->post('ifsc_code'),
            'account_no'      => $this->input->post('account_no'),
            'account_code'      => $this->input->post('account_code'),
            'description'      => $this->input->post('description'),
            'show_dashboard'      => $dashboard,
            'default_payment_retail_invoice'      => $default_payment,
            'status'      => 'Active',
            'added_at'   => date('Y-m-d')
        );
        //print_r($data);exit;
        $this->db->insert('bank', $data);
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }

        $status = 'success';
        $message = '<br><div class="alert alert-info">';
        $message.='<strong>Bank Details Added Successfully. </strong>';
        $message.='</div>';
        $this->session->set_flashdata('message',$message);
        $redirect = base_url('admin/bank_list');

        $data['status']              = $status;
        $data['errors']              = $errors;
        $data['redirect']            = $redirect;
        $data['message']             = $message;
        
        echo json_encode($data);
    }

    public function edit_bank($id)
    {
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }

        $data['edit_bank'] = $this->admin_model->get_all_edit_bank($id);

        $this->load->view('admin/edit_bank',$data);
    }

    public function update_bank()
    {
        //print_r('update');exit;
        $errors   = array();
        $message  = '';
        $redirect = '';
    
        $this->db->trans_begin();

        //$data['users'] = $this->admin_model->get_users_data();
        //$user_id = $data['users']->id;

        $bank_id = $this->input->post('bank_id');

        $show_dashboard = $this->input->post('show_dashboard');

        if($show_dashboard == 'on')
        {
            $dashboard = 'check';
        }
        else
        {
            $dashboard =  'uncheck';
        }

        $default_payment_retail_invoice = $this->input->post('default_payment_retail_invoice');

        if($default_payment_retail_invoice == 'on')
        {
            $default_payment = 'check';
        }
        else
        {
            $default_payment =  'uncheck';
        }

        $data = array(
            'account_name'      => $this->input->post('account_name'),
            'bank_name'      => $this->input->post('bank_name'),
            'branch_name'      => $this->input->post('branch_name'),
            'ifsc_code'      => $this->input->post('ifsc_code'),
            'account_no'      => $this->input->post('account_no'),
            'account_code'      => $this->input->post('account_code'),
            'description'      => $this->input->post('description'),
            'show_dashboard'      => $dashboard,
            'default_payment_retail_invoice'      => $default_payment,
            'updated_at'   => date('Y-m-d')
        );
        //print_r($data);exit;
        $this->db->where('id', $bank_id)->update('bank', $data);
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }

        $status = 'success';
        $message = '<br><div class="alert alert-info">';
        $message.='<strong>Bank Details Update Successfully. </strong>';
        $message.='</div>';
        $this->session->set_flashdata('message',$message);
        $redirect = base_url('admin/bank_list');

        $data['status']              = $status;
        $data['errors']              = $errors;
        $data['redirect']            = $redirect;
        $data['message']             = $message;
        
        echo json_encode($data);
    }

    public function delete_bank()
    {
        $id = $this->input->post('id');
        $this->admin_model->delete_bank($id);
        $data = base_url('admin/bank_list');
        echo json_encode($data);
    }

    /*************** Banking End *************/

    /*************** Payment Made Start *************/

    public function payment_made_list()
    {
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }

        $data['payment_made_list'] = $this->admin_model->get_all_payment_made_list();
        $this->load->view('admin/payment_made_list',$data);
    }

    public function add_payment_made()
    {
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }

        $data['vendor_name'] = $this->admin_model->get_all_vendor_name_payment_made();
        $data['bank_name'] = $this->admin_model->get_all_bank_list();
        $this->load->view('admin/add_payment_made',$data);
    }

    public function edit_payment_made($id)
    {
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }

        $data['vendor_name'] = $this->admin_model->get_all_vendor_name_payment_made();
        $data['bank_name'] = $this->admin_model->get_all_bank_list();
        $data['edit_payment_made'] = $this->admin_model->get_all_edit_payment_made($id);
        $paymentmadeid=$data['edit_payment_made']->id;
        $data['edit_payment_made_entries'] = $this->admin_model->get_all_edit_payment_made_entries($paymentmadeid);
        $this->load->view('admin/edit_payment_made',$data);
    }

    public function get_pending_bill()
    {
        $vendor = $this->input->post('vendor');
        $data = $this->admin_model->get_pending_bill($vendor);
        //print_r($data);exit;
        echo json_encode($data);
    }

    public function save_payment_made()
    {
        //print_r('expression');exit;

        $errors   = array();
        $message  = '';
        $redirect = '';
    
        $this->db->trans_begin();

        $data = array(
            'deposit'      => $this->input->post('deposit'),
            'vendor'      => $this->input->post('vendor'),
            'date'      => $this->input->post('date'),
            'payment_mode'      => $this->input->post('payment_mode'),
            'mobile'      => $this->input->post('mobile'),
            'balance'      => $this->input->post('balance'),
            'amount'      => $this->input->post('amount'),
            'bank_charges'      => $this->input->post('bank_charges'),
            'cheque_no'      => $this->input->post('cheque_no'),
            'cheque_date'      => $this->input->post('cheque_date'),
            'reference'      => $this->input->post('reference'),
            'note'      => $this->input->post('note'),
            'total'      => $this->input->post('total'),
            'amount_received'      => $this->input->post('amount_received'),
            'amount_used'      => $this->input->post('amount_used'),
            'amount_excess'      => $this->input->post('amount_excess'),
            'added_at'   => date('Y-m-d')
        );
        //print_r($data);exit;
        $this->db->insert('payment_made', $data);
        $last_insert_id = $this->db->insert_id();

        /*$data1 = array(
            'payment_made_id'      => $last_insert_id,
            'invoicedate'      => $this->input->post('invoicedate'),
            'invoiceno'      => $this->input->post('invoiceno'),
            'invoiceamount'      => $this->input->post('invoiceamount'),
            'dueamount'      => $this->input->post('dueamount'),
            'payment'      => $this->input->post('payment'),
            'added_at'   => date('Y-m-d')
        );
        //print_r($data);exit;
        $this->db->insert('payment_made_entries', $data1);*/

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }

        $status = 'success';
        $message = '<br><div class="alert alert-info">';
        $message.='<strong>Payment Made Added Successfully. </strong>';
        $message.='</div>';
        $this->session->set_flashdata('message',$message);
        $redirect = base_url('admin/payment_made_list');

        $data['status']              = $status;
        $data['errors']              = $errors;
        $data['redirect']            = $redirect;
        $data['message']             = $message;
        
        echo json_encode($data);
        
        
    }

    public function save_payment_made_entries()
    {
        //print_r('expression');exit;

        $errors   = array();
        $message  = '';
        $redirect = '';
    
        $this->db->trans_begin();

        //$data['users'] = $this->admin_model->get_users_data();
        //$user_id = $data['users']->id;

        $data['payment_made_id'] = $this->admin_model->get_payment_made_last_id();
        $last_inserted_id = $data['payment_made_id']->id;

        $bill_no = $this->input->post('invoiceno');
        $dueamount = $this->input->post('dueamount');
        $payment = $this->input->post('payment');

        $uppayment = $dueamount-$payment;

        $data = array(
            'payment_made_id'      => $last_inserted_id,
            'invoicedate'      => $this->input->post('invoicedate'),
            'invoiceno'      => $this->input->post('invoiceno'),
            'invoiceamount'      => $this->input->post('invoiceamount'),
            'dueamount'      => $this->input->post('dueamount'),
            'payment'      => $this->input->post('payment'),
            'added_at'   => date('Y-m-d')
        );
        //print_r($data);exit;
        $this->db->insert('payment_made_entries', $data);

        //if($dueamount != $payment)
        //{
            //$status = 'Partially paid';
        //}
        //else
        //{
            //$status = 'Paid';
        //}

        //$updata = array(
            //'due_amount'      => $uppayment,
            //'status'      => $status
        //);
        //print_r($data);exit;
        //$this->db->where('bill_no', $bill_no)->update('bill', $updata);

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }

        $status = 'success';
        $message = '<br><div class="alert alert-info">';
        $message.='<strong>Payment Made Added Successfully. </strong>';
        $message.='</div>';
        $this->session->set_flashdata('message',$message);
        $redirect = base_url('admin/payment_made_list');

        $data['status']              = $status;
        $data['errors']              = $errors;
        $data['redirect']            = $redirect;
        $data['message']             = $message;
        //print_r($data);exit;
        
        echo json_encode($data);
    }

    public function update_payment_made()
    {
        //print_r('expression');exit;
        $errors   = array();
        $message  = '';
        $redirect = '';
    
        $this->db->trans_begin();

        //$data['users'] = $this->admin_model->get_users_data();
        //$user_id = $data['users']->id;

        $payment_made_id = $this->input->post('payment_made_id');

        $data = array(
            'deposit'      => $this->input->post('deposit'),
            'vendor'      => $this->input->post('vendor'),
            'date'      => $this->input->post('date'),
            'payment_mode'      => $this->input->post('payment_mode'),
            'mobile'      => $this->input->post('mobile'),
            'balance'      => $this->input->post('balance'),
            'amount'      => $this->input->post('amount'),
            'bank_charges'      => $this->input->post('bank_charges'),
            'cheque_no'      => $this->input->post('cheque_no'),
            'cheque_date'      => $this->input->post('cheque_date'),
            'reference'      => $this->input->post('reference'),
            'note'      => $this->input->post('note'),
            'total'      => $this->input->post('total'),
            'amount_received'      => $this->input->post('amount_received'),
            'amount_used'      => $this->input->post('amount_used'),
            'amount_excess'      => $this->input->post('amount_excess'),
            'updated_at'   => date('Y-m-d')
        );
        //print_r($data);exit;
        $this->db->where('id', $payment_made_id)->update('payment_made', $data);

        $this->admin_model->delete_payment_made_entries($payment_made_id);


        $iids = (count($this->input->post('iid'))==0)?array():$this->input->post('iid');
        //print_r($iids);exit;
        $arr=array();
        foreach ($iids as $iid)
        {
            $entries_data=array(
                'payment_made_id'      => $payment_made_id,
                'invoicedate'      => $this->input->post('invoicedate'.$iid),
                'invoiceno'      => $this->input->post('invoiceno'.$iid),
                'invoiceamount'      => $this->input->post('invoiceamount'.$iid),
                'dueamount'      => $this->input->post('dueamount'.$iid),
                'payment'      => $this->input->post('payment'.$iid),
                'added_at'   => date('Y-m-d')
            );
            //print_r($entries_data);exit;
            $this->db->insert('payment_made_entries', $entries_data);
        }
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }

        $status = 'success';
        $message = '<br><div class="alert alert-info">';
        $message.='<strong>Payment Made Update Successfully. </strong>';
        $message.='</div>';
        $this->session->set_flashdata('message',$message);
        $redirect = base_url('admin/payment_made_list');

        $data['status']              = $status;
        $data['errors']              = $errors;
        $data['redirect']            = $redirect;
        $data['message']             = $message;
        
        echo json_encode($data);
    }

    public function delete_payment_made()
    {
        $id = $this->input->post('id');
        $this->admin_model->delete_payment_made($id);
        $data = base_url('admin/payment_made_list');
        echo json_encode($data);
    }

    public function view_payment_made($id)
    {
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }

        //$data['vendor_name'] = $this->admin_model->get_all_vendor_name_payment_made();
        //$data['bank_name'] = $this->admin_model->get_all_bank_list();
        $data['view_payment_made'] = $this->admin_model->get_view_payment_made($id);
        $paymentmadeid=$data['view_payment_made']->id;
        $data['view_payment_made_entries'] = $this->admin_model->get_all_edit_payment_made_entries($paymentmadeid);
        $data['company_details'] = $this->admin_model->get_company_details($id);
        $this->load->view('admin/view_payment_made',$data);
    }


    /*************** Payment Made End *************/

    /******************** Delivery Challan Start **********************/

    public function delivery_challan_list()
    {
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }

        //$data['customer_name'] = $this->admin_model->get_customer_name_invoice();
        $data['delivery_challan_list'] = $this->admin_model->get_all_delivery_challan_list();
        $this->load->view('admin/delivery_challan_list',$data);
    }

    public function add_delivery_challan()
    {
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }
        $data['customer_name'] = $this->admin_model->get_all_customer_list();
        //$data['item_name'] = $this->admin_model->get_all_item_name();

        $this->load->view('admin/add_delivery_challan',$data);
    }

    public function save_delivery_challan()
    {
        //print_r('expression');exit;
        $errors   = array();
        $message  = '';
        $redirect = '';
    
        $this->db->trans_begin();

        //$data['users'] = $this->admin_model->get_users_data();
        //$user_id = $data['users']->id;

        $data = array(
            'customer_name'      => $this->input->post('customer_name'),
            'challan_date'      => $this->input->post('challan_date'),
            'challan_type'      => $this->input->post('challan_type'),
            'challan_no'      => $this->input->post('challan_no'),
            'place_of_supply'      => $this->input->post('place_of_supply'),
            'item_rate'      => $this->input->post('item_rate'),
            'sales_person'      => $this->input->post('sales_person'),
            'subtotal'      => $this->input->post('subtotal'),
            'due_amount'      => $this->input->post('subtotal'),
            'total_taxamt'      => $this->input->post('total_taxamt'),
            'adjustment'      => $this->input->post('adjustment'),
            'sale_of_good'      => $this->input->post('sale_of_good'),
            'totalamt'      => $this->input->post('totalamt'),
            'note'      => $this->input->post('note'),
            //'status'      => 'Sent',
            'added_at'   => date('Y-m-d')
        );
        //print_r($data);exit;
        $this->db->insert('delivery_challan', $data);
        $last_insert_id = $this->db->insert_id();

        $iids = (count($this->input->post('iid'))==0)?array():$this->input->post('iid');
        $arr=array();
        foreach ($iids as $iid)
        {
            $entries_data=array(
                'deliverychallanid'=>$last_insert_id,
                'item' => $this->input->post('item_'.$iid),
                'description' => $this->input->post('description_'.$iid),
                'qty' => $this->input->post('qty_'.$iid),
                'rate' => $this->input->post('rate_'.$iid),
                'account' => $this->input->post('account_'.$iid),
                'discount' => $this->input->post('discount_'.$iid),
                'taxrate' => $this->input->post('taxrate_'.$iid),
                'taxamt' => $this->input->post('taxamt_'.$iid),
                'total' => $this->input->post('total_'.$iid),
                'added_at'   => date('Y-m-d')
            );
            //print_r($entries_data);exit;
            $this->db->insert('delivery_challan_entries', $entries_data);
        }
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }

        $status = 'success';
        $message = '<br><div class="alert alert-info">';
        $message.='<strong>Delivery Challan Added Successfully. </strong>';
        $message.='</div>';
        $this->session->set_flashdata('message',$message);
        $redirect = base_url('admin/delivery_challan_list');

        $data['status']              = $status;
        $data['errors']              = $errors;
        $data['redirect']            = $redirect;
        $data['message']             = $message;
        
        echo json_encode($data);
    }

    public function edit_delivery_challan($id)
    {
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }

        $data['customer_name'] = $this->admin_model->get_all_customer_list();
        $data['edit_delivery_challan'] = $this->admin_model->get_all_edit_delivery_challan($id);
        $deliverychallanid=$data['edit_delivery_challan']->id;
        $data['edit_delivery_challan_entries'] = $this->admin_model->get_all_edit_delivery_challan_entries($deliverychallanid);
        $this->load->view('admin/edit_delivery_challan',$data);
    }

    public function update_delivery_challan()
    {
        //print_r('expression');exit;
        $errors   = array();
        $message  = '';
        $redirect = '';
    
        $this->db->trans_begin();

        //$data['users'] = $this->admin_model->get_users_data();
        //$user_id = $data['users']->id;

        $delivery_challan_id = $this->input->post('delivery_challan_id');

        $data = array(
            'customer_name'      => $this->input->post('customer_name'),
            'challan_date'      => $this->input->post('challan_date'),
            'challan_type'      => $this->input->post('challan_type'),
            'challan_no'      => $this->input->post('challan_no'),
            'place_of_supply'      => $this->input->post('place_of_supply'),
            'item_rate'      => $this->input->post('item_rate'),
            'sales_person'      => $this->input->post('sales_person'),
            'subtotal'      => $this->input->post('subtotal'),
            'total_taxamt'      => $this->input->post('total_taxamt'),
            'adjustment'      => $this->input->post('adjustment'),
            'sale_of_good'      => $this->input->post('sale_of_good'),
            'totalamt'      => $this->input->post('totalamt'),
            'note'      => $this->input->post('note'),
            'updated_at'   => date('Y-m-d')
        );
        //print_r($data);exit;
        $this->db->where('id', $delivery_challan_id)->update('delivery_challan', $data);
        $last_insert_id = $this->db->insert_id();

        $this->admin_model->delete_delivery_challan_entries($delivery_challan_id);
        //exit;
        

        $iids = (count($this->input->post('iid'))==0)?array():$this->input->post('iid');
        //print_r($iids);exit;
        $arr=array();
        foreach ($iids as $iid)
        {
            $entries_data=array(
                'deliverychallanid'=>$delivery_challan_id,
                'item' => $this->input->post('item_'.$iid),
                'description' => $this->input->post('description_'.$iid),
                'qty' => $this->input->post('qty_'.$iid),
                'rate' => $this->input->post('rate_'.$iid),
                'account' => $this->input->post('account_'.$iid),
                'discount' => $this->input->post('discount_'.$iid),
                'taxrate' => $this->input->post('taxrate_'.$iid),
                'taxamt' => $this->input->post('taxamt_'.$iid),
                'total' => $this->input->post('total_'.$iid),
                'added_at'   => date('Y-m-d')
            );
            //print_r($entries_data);exit;
            $this->db->insert('delivery_challan_entries', $entries_data);
        }
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }

        $status = 'success';
        $message = '<br><div class="alert alert-info">';
        $message.='<strong>Delivery Challan Update Successfully. </strong>';
        $message.='</div>';
        $this->session->set_flashdata('message',$message);
        $redirect = base_url('admin/delivery_challan_list');

        $data['status']              = $status;
        $data['errors']              = $errors;
        $data['redirect']            = $redirect;
        $data['message']             = $message;
        
        echo json_encode($data);
    }

    public function delete_delivery_challan()
    {
        $id = $this->input->post('id');
        $this->admin_model->delete_delivery_challan($id);
        $data = base_url('admin/delivery_challan_list');
        echo json_encode($data);
    }

    public function view_delivery_challan($id)
    {
        $data['company_details'] = $this->admin_model->get_company_details();
        $data['edit_delivery_challan'] = $this->admin_model->get_all_edit_delivery_challan($id);
        $deliverychallanid=$data['edit_delivery_challan']->id;
        $customerid=$data['edit_delivery_challan']->customer_name;
        $data['edit_delivery_challan_entries'] = $this->admin_model->get_all_edit_delivery_challan_entries($deliverychallanid);
        $data['customer_address'] = $this->admin_model->get_customer_address($customerid);
        $this->load->view('admin/view_delivery_challan',$data);
    }

    /********************Delivery Challan End **********************/

    /************** Company start *******************/

    public function company_list()
    {
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }

        $data['company_list'] = $this->admin_model->get_all_company_list();

        $this->load->view('admin/company_list',$data);
    }

    public function add_company()
    {
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }

        $this->load->view('admin/add_company');
    }

    public function save_company()
    {
        //print_r('expression');exit;
        $errors   = array();
        $message  = '';
        $redirect = '';
    
        $this->db->trans_begin();

        //$data['users'] = $this->admin_model->get_users_data();
        //$user_id = $data['users']->id;

        $this->load->library('upload');

        if (!empty($_FILES['photo']['name']))
        {
            //print_r('aa');exit;
            $photo  = $_FILES['photo']['name'];
            $config = array(
                'file_name'   => $photo,
                'upload_path' => "./uploads/company/",
                'allowed_types' => "gif|jpg|png|jpeg|pdf",
                'overwrite' => TRUE,
                'max_size' => "100000", // Can be set to particular file size , here it is 2 MB(2048 Kb) 2048000
                //'max_height' => "768",
                //'max_width' => "1024"
            );
            $this->upload->initialize($config);
            if($this->upload->do_upload('photo'))
            {
                //print_r('aaaa');exit;
                $upload_photo = $this->upload->data();
            } 
            else 
            {
                $status = 'error';
                $errors['photoError'] = $this->upload->display_errors();
            }
        }
        else
        {
            $upload_photo['file_name'] = '';
            //print_r($upload_photo);exit;
        }

        if (!empty($_FILES['sign']['name']))
        {
            //print_r('aa');exit;
            $sign  = $_FILES['sign']['name'];
            $config = array(
                'file_name'   => $sign,
                'upload_path' => "./uploads/company/",
                'allowed_types' => "png",
                'overwrite' => TRUE,
                'max_size' => "100000", // Can be set to particular file size , here it is 2 MB(2048 Kb) 2048000
                //'max_height' => "768",
                //'max_width' => "1024"
            );
            $this->upload->initialize($config);
            if($this->upload->do_upload('sign'))
            {
                //print_r('aaaa');exit;
                $upload_sign = $this->upload->data();
            } 
            else 
            {
                $status = 'error';
                $errors['photoError'] = $this->upload->display_errors();
            }
        }
        else
        {
            $upload_sign['file_name'] = '';
            //print_r($upload_photo);exit;
        }


        $data = array(
            'photo'      => $upload_photo['file_name'],
            'company_name'      => $this->input->post('company_name'),
            'organization_type'      => $this->input->post('organization_type'),
            'fiscal_year'      => $this->input->post('fiscal_year'),
            'industry'      => $this->input->post('industry'),
            'currency'    => $this->input->post('currency'),
            'addressline1'      => $this->input->post('addressline1'),
            'addressline2'      => $this->input->post('addressline2'),
            'pincode'       => $this->input->post('pincode'),
            'phone'     => $this->input->post('phone'),
            'email'     => $this->input->post('email'),
            'website'     => $this->input->post('website'),
            'sign'      => $upload_sign['file_name'],
            'panno'     => $this->input->post('panno'),
            'tanno'     => $this->input->post('tanno'),
            'cinno'     => $this->input->post('cinno'),
            'gstno'     => $this->input->post('gstno'),
            'status'     => $this->input->post('status'),
            'added_at'   => date('Y-m-d')
        );
        //print_r($data);exit;
        $this->db->insert('company_details', $data);
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }

        $status = 'success';
        $message = '<br><div class="alert alert-info">';
        $message.='<strong>Company Added Successfully. </strong>';
        $message.='</div>';
        $this->session->set_flashdata('message',$message);
        $redirect = base_url('admin/company_list');

        $data['status']              = $status;
        $data['errors']              = $errors;
        $data['redirect']            = $redirect;
        $data['message']             = $message;
        
        echo json_encode($data);
    }

    public function edit_company($id)
    {
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }

        $data['edit_company'] = $this->admin_model->get_all_edit_company($id);

        $this->load->view('admin/edit_company',$data);
    }

    public function update_company()
    {
        //print_r('update');exit;
        $errors   = array();
        $message  = '';
        $redirect = '';
    
        $this->db->trans_begin();

        //$data['users'] = $this->admin_model->get_users_data();
        //$user_id = $data['users']->id;

        $company_id = $this->input->post('company_id');

        $this->load->library('upload');

        $old_photo   = $this->input->post('old_photo');
        //print_r($old_photo);exit;

        if (!empty($_FILES['photo']['name']))
        {
            if($old_photo != '')
            {
                $delete_file = './uploads/company/'.$old_photo;
                if(file_exists($delete_file))
                {
                    unlink('./uploads/company/'.$old_photo);
                }
            }

            //print_r('aa');exit;
            $photo  = $_FILES['photo']['name'];
            $config = array(
                'file_name'   => $photo,
                'upload_path' => "./uploads/company/",
                'allowed_types' => "gif|jpg|png|jpeg|pdf",
                'overwrite' => TRUE,
                'max_size' => "100000", // Can be set to particular file size , here it is 2 MB(2048 Kb) 2048000
                //'max_height' => "768",
                //'max_width' => "1024"
            );
            $this->upload->initialize($config);
            if($this->upload->do_upload('photo'))
            {
                //print_r('aaaa');exit;
                $upload_photo = $this->upload->data();
            } 
            else 
            {
                $status = 'error';
                $errors['photoError'] = $this->upload->display_errors();
            }
        }
        else
        {
            $upload_photo['file_name'] = $old_photo;
            //print_r($upload_photo);exit;
        }

        $old_sign   = $this->input->post('old_sign');
        //print_r($old_photo);exit;

        if (!empty($_FILES['sign']['name']))
        {
            if($old_sign != '')
            {
                $delete_file = './uploads/company/'.$old_sign;
                if(file_exists($delete_file))
                {
                    unlink('./uploads/company/'.$old_sign);
                }
            }

            //print_r('aa');exit;
            $sign  = $_FILES['sign']['name'];
            $config = array(
                'file_name'   => $sign,
                'upload_path' => "./uploads/company/",
                'allowed_types' => "png",
                'overwrite' => TRUE,
                'max_size' => "100000", // Can be set to particular file size , here it is 2 MB(2048 Kb) 2048000
                //'max_height' => "768",
                //'max_width' => "1024"
            );
            $this->upload->initialize($config);
            if($this->upload->do_upload('sign'))
            {
                //print_r('aaaa');exit;
                $upload_sign = $this->upload->data();
            } 
            else 
            {
                $status = 'error';
                $errors['photoError'] = $this->upload->display_errors();
            }
        }
        else
        {
            $upload_sign['file_name'] = $old_sign;
            //print_r($upload_sign);exit;
        }

        $data = array(
            'photo'      => $upload_photo['file_name'],
            'company_name'      => $this->input->post('company_name'),
            'organization_type'      => $this->input->post('organization_type'),
            'fiscal_year'      => $this->input->post('fiscal_year'),
            'industry'      => $this->input->post('industry'),
            'currency'    => $this->input->post('currency'),
            'addressline1'      => $this->input->post('addressline1'),
            'addressline2'      => $this->input->post('addressline2'),
            'pincode'       => $this->input->post('pincode'),
            'phone'     => $this->input->post('phone'),
            'email'     => $this->input->post('email'),
            'website'     => $this->input->post('website'),
            'sign'      => $upload_sign['file_name'],
            'panno'     => $this->input->post('panno'),
            'tanno'     => $this->input->post('tanno'),
            'cinno'     => $this->input->post('cinno'),
            'gstno'     => $this->input->post('gstno'),
            'status'     => $this->input->post('status'),
            'updated_at'   => date('Y-m-d')
        );
        //print_r($data);exit;
        $this->db->where('id', $company_id)->update('company_details', $data);
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }

        $status = 'success';
        $message = '<br><div class="alert alert-info">';
        $message.='<strong>Company Update Successfully. </strong>';
        $message.='</div>';
        $this->session->set_flashdata('message',$message);
        $redirect = base_url('admin/company_list');

        $data['status']              = $status;
        $data['errors']              = $errors;
        $data['redirect']            = $redirect;
        $data['message']             = $message;
        
        echo json_encode($data);
    }

    public function delete_company()
    {
        $id = $this->input->post('id');
        $this->admin_model->delete_company($id);
        $data = base_url('admin/company_list');
        echo json_encode($data);
    }

    /*public function view_company($id)
    {
        $data['vendor_details'] = $this->admin_model->get_vendor_details($id);
        $vendorid=$data['vendor_details']->id;
        $data['bill_amt'] = $this->admin_model->get_vendor_bill_amt($vendorid);
        $data['paid_amt'] = $this->admin_model->get_vendor_paid_amt($vendorid);
        $data['bill_transaction'] = $this->admin_model->get_vendor_transaction_bill($vendorid);
        $data['payment_transaction'] = $this->admin_model->get_vendor_transaction_payment_made($vendorid);
        $data['order_transaction'] = $this->admin_model->get_vendor_transaction_order($vendorid);
        $this->load->view('admin/view_vendor',$data);
    }*/

    /*************** Company End *************/


    /*************** Inventory summary Report Start *************/

    public function inventory_summary()
    {
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }

        $data['company_details'] = $this->admin_model->get_company_details();

        $data['inventory_summary'] = $this->admin_model->get_inventory_summary();
        
        

        $this->load->view('admin/inventory_summary',$data);
    }

    public function inventory_item_list()
    {
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }

        $data['company_details'] = $this->admin_model->get_company_details();

        $data['inventory_item_list'] = $this->admin_model->get_all_inventory_list();

        $this->load->view('admin/inventory_item_list',$data);
    }

    /*************** Inventory summary Report End *************/

    /*************** Godown summary Report Start *************/

    public function godown_summary()
    {
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }

        $data['company_details'] = $this->admin_model->get_company_details();

        $data['godown_summary'] = $this->admin_model->get_all_godown_list();
        
        $this->load->view('admin/godown_summary',$data);
    }

    public function godown_summary_details($godownname)
    {
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }

        $data['company_details'] = $this->admin_model->get_company_details();

        $data['godown_summary_details'] = $this->admin_model->get_godown_summary_details($godownname);
        
        $this->load->view('admin/godown_summary_details',$data);
    }

    /*************** Godown summary Report End *************/

    /*************** Receivables Report Start *************/

    public function account_receivable_summary()
    {
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }

        $data['company_details'] = $this->admin_model->get_company_details();

        $data['account_receivable_summary'] = $this->admin_model->get_all_customer_list();
        
        $this->load->view('admin/account_receivable_summary',$data);
    }

    public function account_receivable_summary_details($customer_id)
    {
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }

        $data['company_details'] = $this->admin_model->get_company_details();

        $data['account_receivable_summary_details'] = $this->admin_model->get_pending_invoice_by_customer_dueamt($customer_id);
        
        $this->load->view('admin/account_receivable_summary_details',$data);
    }

    public function invoice_details()
    {
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }

        $data['company_details'] = $this->admin_model->get_company_details();

        $data['invoice_details'] = $this->admin_model->get_all_invoice_list();
        
        $this->load->view('admin/invoice_details',$data);
    }

    /*************** Receivables Report End *************/

    /*************** Payables Report Start *************/

    public function account_payable_summary()
    {
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }

        $data['company_details'] = $this->admin_model->get_company_details();

        $data['account_payable_summary'] = $this->admin_model->get_all_vendor_list();
        
        $this->load->view('admin/account_payable_summary',$data);
    }

    public function account_payable_summary_details($customer_id)
    {
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }

        $data['company_details'] = $this->admin_model->get_company_details();

        $data['account_payable_summary_details'] = $this->admin_model->get_pending_bill_by_vendor_dueamt($customer_id);
        
        $this->load->view('admin/account_payable_summary_details',$data);
    }

    public function bill_details()
    {
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }

        $data['company_details'] = $this->admin_model->get_company_details();

        $data['bill_details'] = $this->admin_model->get_all_bill_list();
        
        $this->load->view('admin/bill_details',$data);
    }

    /*************** Payables Report End *************/


    /******************** Properties Start **********************/

    public function properties_list()
    {
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }
        $data['properties_list'] = $this->admin_model->get_all_properties_list();

        $this->load->view('admin/properties_list',$data);
    }

    public function add_properties()
    {
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }
        $data['godown_name'] = $this->admin_model->get_all_godown_list();
        $data['customer_name'] = $this->admin_model->get_all_customer_name();
        $this->load->view('admin/add_properties',$data);
    }

    public function save_properties()
    {
        //print_r('expression');exit;
        $errors   = array();
        $message  = '';
        $redirect = '';
    
        $this->db->trans_begin();

        //$data['users'] = $this->admin_model->get_users_data();
        //$user_id = $data['users']->id;


        $this->load->library('upload');

        if (!empty($_FILES['photo']['name']))
        {
            $photo  = $_FILES['photo']['name'];
            $config = array(
                'file_name'   => $photo,
                'upload_path' => "./uploads/properties/",
                'allowed_types' => "gif|jpg|png|jpeg",
                'overwrite' => TRUE,
                'max_size' => "100000", // Can be set to particular file size , here it is 2 MB(2048 Kb) 2048000
                //'max_height' => "768",
                //'max_width' => "1024"
            );
            $this->upload->initialize($config);
            if($this->upload->do_upload('photo'))
            {
                //print_r('aaaa');exit;
                $upload_photo = $this->upload->data();
            } 
            else 
            {
                $status = 'error';
                $errors['photoError'] = $this->upload->display_errors();
            }
        }
        else
        {
            $upload_photo['file_name'] = '';
            //print_r($upload_photo);exit;
        }

        /*if (!empty($_FILES['floor_plan']['name']))
        {
            $floor_plan  = $_FILES['floor_plan']['name'];
            $config = array(
                'file_name'   => $floor_plan,
                'upload_path' => "./uploads/properties/",
                'allowed_types' => "gif|jpg|png|jpeg",
                'overwrite' => TRUE,
                'max_size' => "100000", // Can be set to particular file size , here it is 2 MB(2048 Kb) 2048000
                //'max_height' => "768",
                //'max_width' => "1024"
            );
            $this->upload->initialize($config);
            if($this->upload->do_upload('floor_plan'))
            {
                //print_r('aaaa');exit;
                $upload_floor_plan = $this->upload->data();
            } 
            else 
            {
                $status = 'error';
                $errors['floor_planError'] = $this->upload->display_errors();
            }
        }
        else
        {
            $upload_floor_plan['file_name'] = '';
            //print_r($upload_floor_plan);exit;
        }*/

        $data = array(
            'properties_name'      => $this->input->post('properties_name'),
            'address'      => $this->input->post('address'),
            'photo'    => $upload_photo['file_name'],
            'category'       => $this->input->post('category'),
            //'gallery'              => $u,
            //'floor_plan'    => $upload_floor_plan['file_name'],
            'noofbedroom'       => $this->input->post('noofbedroom'),
            'noofbathroom'       => $this->input->post('noofbathroom'),
            'sqft'       => $this->input->post('sqft'),
            'garages'       => $this->input->post('garages'),
            'price'       => $this->input->post('price'),
            'video'       => $this->input->post('video'),
            'mobileno'       => $this->input->post('mobileno'),
            'description'       => $this->input->post('description'),
            'sale_rent'       => $this->input->post('sale_rent'),
            'added_at'   => date('Y-m-d')
        );
        //print_r($data);exit;
        $this->db->insert('properties', $data);
        $last_insert_id = $this->db->insert_id();

        if(!empty($_FILES['gallery']['name']))
        {
            $filesCount = count($_FILES['gallery']['name']);
            //echo "adsndsaiondasjn";die();
            for($j=0; $j < $filesCount; $j++)
            {   
                //$filen =date('ymdhis')."_".str_replace(" ","_", $_FILES["gallery"]['name']["$j"]); //file name

                $filen =$_FILES['gallery']['name'][$j]; //file name
                $path = './uploads/properties/'.$filen; //generate the destination path
                if(move_uploaded_file($_FILES['gallery']['tmp_name'][$j],$path)) 
                {
                    $images[$j]=$filen;
                }
            }
            foreach($images as $image)
            {
                

                $data1 = array(
                'properties_id'      => $last_insert_id,
                'gallery'              => $image,
                'added_at'   => date('Y-m-d')
                );
                //print_r($data);exit;
                $this->db->insert('properties_images', $data1);
            }
        }

        if(!empty($_FILES['floor_plan']['name']))
        {
            $filesCount = count($_FILES['floor_plan']['name']);
            //echo "adsndsaiondasjn";die();
            for($j=0; $j < $filesCount; $j++)
            {   
                //$filen =date('ymdhis')."_".str_replace(" ","_", $_FILES["gallery"]['name']["$j"]); //file name

                $filen =$_FILES['floor_plan']['name'][$j]; //file name
                $path = './uploads/floor_plan/'.$filen; //generate the destination path
                if(move_uploaded_file($_FILES['floor_plan']['tmp_name'][$j],$path)) 
                {
                    $images[$j]=$filen;
                }
            }
            foreach($images as $image)
            {
                $data2 = array(
                'properties_id'      => $last_insert_id,
                'floor_plan'              => $image,
                'added_at'   => date('Y-m-d')
                );
                //print_r($data);exit;
                $this->db->insert('properties_floor_plan', $data2);
            }
        }

        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }

        $status = 'success';
        $message = '<br><div class="alert alert-info">';
        $message.='<strong>Properties Added Successfully. </strong>';
        $message.='</div>';
        $this->session->set_flashdata('message',$message);
        $redirect = base_url('admin/properties_list');

        $data['status']              = $status;
        $data['errors']              = $errors;
        $data['redirect']            = $redirect;
        $data['message']             = $message;
        
        echo json_encode($data);
    }

    public function edit_properties($id)
    {
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }
        $data['edit_properties'] = $this->admin_model->get_all_edit_properties($id);
        $data['edit_properties_images'] = $this->admin_model->get_all_edit_properties_images($id);
        $data['edit_properties_floor_plan'] = $this->admin_model->get_all_edit_properties_floor_plan($id);

        $this->load->view('admin/edit_properties',$data);
    }

    public function update_properties()
    {
        //print_r('expression');exit;
        $errors   = array();
        $message  = '';
        $redirect = '';
    
        $this->db->trans_begin();

        $properties_id = $this->input->post('properties_id');

        //$data['users'] = $this->admin_model->get_users_data();
        //$user_id = $data['users']->id;

        $this->load->library('upload');

        $old_photo   = $this->input->post('old_photo');
        //print_r($old_photo);exit;

        if (!empty($_FILES['photo']['name']))
        {
            if($old_photo != '')
            {
                $delete_file = './uploads/properties/'.$old_photo;
                if(file_exists($delete_file))
                {
                    unlink('./uploads/properties/'.$old_photo);
                }
            }

            $photo  = $_FILES['photo']['name'];
            $config = array(
                'file_name'   => $photo,
                'upload_path' => "./uploads/properties/",
                'allowed_types' => "gif|jpg|png|jpeg",
                'overwrite' => TRUE,
                'max_size' => "100000", // Can be set to particular file size , here it is 2 MB(2048 Kb) 2048000
                //'max_height' => "768",
                //'max_width' => "1024"
            );
            $this->upload->initialize($config);
            if($this->upload->do_upload('photo'))
            {
                //print_r('aaaa');exit;
                $upload_photo = $this->upload->data();
            } 
            else 
            {
                $status = 'error';
                $errors['photoError'] = $this->upload->display_errors();
            }
        }
        else
        {
            $upload_photo['file_name'] = $old_photo;
            //print_r($upload_photo);exit;
        }

        /*$old_floor_plan   = $this->input->post('old_floor_plan');
        //print_r($old_floor_plan);exit;

        if (!empty($_FILES['floor_plan']['name']))
        {
            if($old_floor_plan != '')
            {
                $delete_file = './uploads/properties/'.$old_floor_plan;
                if(file_exists($delete_file))
                {
                    unlink('./uploads/properties/'.$old_floor_plan);
                }
            }

            $floor_plan = $_FILES['floor_plan']['name'];
            $config = array(
                'file_name'   => $floor_plan,
                'upload_path' => "./uploads/properties/",
                'allowed_types' => "gif|jpg|png|jpeg",
                'overwrite' => TRUE,
                'max_size' => "100000", // Can be set to particular file size , here it is 2 MB(2048 Kb) 2048000
                //'max_height' => "768",
                //'max_width' => "1024"
            );
            $this->upload->initialize($config);
            if($this->upload->do_upload('floor_plan'))
            {
                //print_r('aaaa');exit;
                $upload_floor_plan = $this->upload->data();
            } 
            else 
            {
                $status = 'error';
                $errors['floor_planError'] = $this->upload->display_errors();
            }
        }
        else
        {
            $upload_floor_plan['file_name'] = $old_floor_plan;
            //print_r($upload_floor_plan);exit;
        }*/

        $data = array(
            'properties_name'      => $this->input->post('properties_name'),
            'address'      => $this->input->post('address'),
            'photo'    => $upload_photo['file_name'],
            'category'       => $this->input->post('category'),
            //'floor_plan'    => $upload_floor_plan['file_name'],
            'noofbedroom'       => $this->input->post('noofbedroom'),
            'noofbathroom'       => $this->input->post('noofbathroom'),
            'sqft'       => $this->input->post('sqft'),
            'garages'       => $this->input->post('garages'),
            'price'       => $this->input->post('price'),
            'video'       => $this->input->post('video'),
            'mobileno'       => $this->input->post('mobileno'),
            'description'       => $this->input->post('description'),
            'sale_rent'       => $this->input->post('sale_rent'),
            'updated_at'   => date('Y-m-d')
        );
        //print_r($data);exit;
        $this->db->where('id', $properties_id)->update('properties', $data);
        $last_insert_id = $this->db->insert_id();

        if(isset($_FILES['gallery']['name'])!=0)
        {
            //echo "adsndsaiondasjn";die();
            for($j=0; $j < count($_FILES["gallery"]['name']); $j++)
            {   
                //$filen =date('ymdhis')."_".str_replace(" ","_", $_FILES["image"]['name']["$j"]); //file name

                $filen =$_FILES["gallery"]['name']["$j"]; //file name
                $path = './uploads/properties/'.$filen; //generate the destination path
                if(move_uploaded_file($_FILES["gallery"]['tmp_name']["$j"],$path)) 
                {
                $images[$j]=$filen;
                }
            }
            foreach($images as $image)
            {

                $data1 = array(
                    'properties_id'      => $properties_id,
                    'gallery'    => $image,
                    'added_at'   => date('Y-m-d')
                );
                //print_r($data);exit;
                //$this->db->where('id', $properties_id)->update('properties_images', $data);
                $this->db->insert('properties_images', $data1);
            }
        }

        if(isset($_FILES['floor_plan']['name'])!=0)
        {
            //echo "adsndsaiondasjn";die();
            for($j=0; $j < count($_FILES["floor_plan"]['name']); $j++)
            {   
                //$filen =date('ymdhis')."_".str_replace(" ","_", $_FILES["image"]['name']["$j"]); //file name

                $filen =$_FILES["floor_plan"]['name']["$j"]; //file name
                $path = './uploads/floor_plan/'.$filen; //generate the destination path
                if(move_uploaded_file($_FILES["floor_plan"]['tmp_name']["$j"],$path)) 
                {
                    $images[$j]=$filen;
                }
            }
            foreach($images as $image)
            {

                $data2 = array(
                    'properties_id'      => $properties_id,
                    'floor_plan'    => $image,
                    'added_at'   => date('Y-m-d')
                );
                //print_r($data);exit;
                //$this->db->where('id', $properties_id)->update('properties_images', $data);
                $this->db->insert('properties_floor_plan', $data2);
            }
        }
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }

        $status = 'success';
        $message = '<br><div class="alert alert-info">';
        $message.='<strong>Properties Updated Successfully. </strong>';
        $message.='</div>';
        $this->session->set_flashdata('message',$message);
        $redirect = base_url('admin/properties_list');

        $data['status']              = $status;
        $data['errors']              = $errors;
        $data['redirect']            = $redirect;
        $data['message']             = $message;
        
        echo json_encode($data);
    }

    public function delete_properties()
    {
        $id = $this->input->post('id');
        $this->admin_model->delete_properties($id);
        $data = base_url('admin/properties_list');
        echo json_encode($data);
    }

    public function delete_properties_images()
    {
        $id = $this->input->post('id');
        $this->admin_model->delete_properties_images($id);
        $data = base_url('admin/properties_list');
        echo json_encode($data);
    }

    public function delete_properties_floor_plan()
    {
        $id = $this->input->post('id');
        $this->admin_model->delete_properties_floor_plan($id);
        $data = base_url('admin/properties_list');
        echo json_encode($data);
    }
    

    /******************** Properties End **********************/

    /******************** Slider Start **********************/

    public function slider_list()
    {
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }
        $data['slider_list'] = $this->admin_model->get_all_slider_list();

        $this->load->view('admin/slider_list',$data);
    }

    public function add_slider()
    {
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }
        $this->load->view('admin/add_slider');
    }

    public function save_slider()
    {
        //print_r('expression');exit;
        $errors   = array();
        $message  = '';
        $redirect = '';
    
        $this->db->trans_begin();

        //$data['users'] = $this->admin_model->get_users_data();
        //$user_id = $data['users']->id;


        $this->load->library('upload');

        if (!empty($_FILES['photo']['name']))
        {
            $photo  = $_FILES['photo']['name'];
            $config = array(
                'file_name'   => $photo,
                'upload_path' => "./uploads/slider/",
                'allowed_types' => "gif|jpg|png|jpeg",
                'overwrite' => TRUE,
                'max_size' => "100000", // Can be set to particular file size , here it is 2 MB(2048 Kb) 2048000
                //'max_height' => "768",
                //'max_width' => "1024"
            );
            $this->upload->initialize($config);
            if($this->upload->do_upload('photo'))
            {
                //print_r('aaaa');exit;
                $upload_photo = $this->upload->data();
            } 
            else 
            {
                $status = 'error';
                $errors['photoError'] = $this->upload->display_errors();
            }
        }
        else
        {
            $upload_photo['file_name'] = '';
            //print_r($upload_photo);exit;
        }

        $data = array(
            'slider_name1'      => $this->input->post('slider_name1'),
            'slider_name2'      => $this->input->post('slider_name2'),
            'slider_name3'      => $this->input->post('slider_name3'),
            'photo'    => $upload_photo['file_name'],
            'added_at'   => date('Y-m-d')
        );
        //print_r($data);exit;
        $this->db->insert('slider', $data);
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }

        $status = 'success';
        $message = '<br><div class="alert alert-info">';
        $message.='<strong>Slider Added Successfully. </strong>';
        $message.='</div>';
        $this->session->set_flashdata('message',$message);
        $redirect = base_url('admin/slider_list');

        $data['status']              = $status;
        $data['errors']              = $errors;
        $data['redirect']            = $redirect;
        $data['message']             = $message;
        
        echo json_encode($data);
    }

    public function edit_slider($id)
    {
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }
        $data['edit_slider'] = $this->admin_model->get_all_edit_slider($id);

        $this->load->view('admin/edit_slider',$data);
    }

    public function update_slider()
    {
        //print_r('expression');exit;
        $errors   = array();
        $message  = '';
        $redirect = '';
    
        $this->db->trans_begin();

        $slider_id = $this->input->post('slider_id');

        //$data['users'] = $this->admin_model->get_users_data();
        //$user_id = $data['users']->id;

        $this->load->library('upload');

        $old_photo   = $this->input->post('old_photo');
        //print_r($old_photo);exit;

        if (!empty($_FILES['photo']['name']))
        {
            if($old_photo != '')
            {
                $delete_file = './uploads/slider/'.$old_photo;
                if(file_exists($delete_file))
                {
                    unlink('./uploads/slider/'.$old_photo);
                }
            }

            $photo  = $_FILES['photo']['name'];
            $config = array(
                'file_name'   => $photo,
                'upload_path' => "./uploads/slider/",
                'allowed_types' => "gif|jpg|png|jpeg",
                'overwrite' => TRUE,
                'max_size' => "100000", // Can be set to particular file size , here it is 2 MB(2048 Kb) 2048000
                //'max_height' => "768",
                //'max_width' => "1024"
            );
            $this->upload->initialize($config);
            if($this->upload->do_upload('photo'))
            {
                //print_r('aaaa');exit;
                $upload_photo = $this->upload->data();
            } 
            else 
            {
                $status = 'error';
                $errors['photoError'] = $this->upload->display_errors();
            }
        }
        else
        {
            $upload_photo['file_name'] = $old_photo;
            //print_r($upload_photo);exit;
        }

        $data = array(
            'slider_name1'      => $this->input->post('slider_name1'),
            'slider_name2'      => $this->input->post('slider_name2'),
            'slider_name3'      => $this->input->post('slider_name3'),
            'photo'    => $upload_photo['file_name'],
            'updated_at'   => date('Y-m-d')
        );
        //print_r($data);exit;
        $this->db->where('id', $slider_id)->update('slider', $data);
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }

        $status = 'success';
        $message = '<br><div class="alert alert-info">';
        $message.='<strong>Slider Updated Successfully. </strong>';
        $message.='</div>';
        $this->session->set_flashdata('message',$message);
        $redirect = base_url('admin/slider_list');

        $data['status']              = $status;
        $data['errors']              = $errors;
        $data['redirect']            = $redirect;
        $data['message']             = $message;
        
        echo json_encode($data);
    }

    public function delete_slider()
    {
        $id = $this->input->post('id');
        $this->admin_model->delete_slider($id);
        $data = base_url('admin/slider_list');
        echo json_encode($data);
    }
    

    /******************** Slider End **********************/

    /******************** Loan Start **********************/

    public function loan_list()
    {
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }
        $data['loan_list'] = $this->admin_model->get_all_loan_list();

        $this->load->view('admin/loan_list',$data);
    }    

    public function edit_loan($id)
    {
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }
        $data['edit_loan'] = $this->admin_model->get_all_edit_loan($id);

        $this->load->view('admin/edit_loan',$data);
    }

    public function update_loan()
    {
        //print_r('expression');exit;
        $errors   = array();
        $message  = '';
        $redirect = '';
    
        $this->db->trans_begin();

        $loan_id = $this->input->post('loan_id');

        //$data['users'] = $this->admin_model->get_users_data();
        //$user_id = $data['users']->id;

        $data = array(
            'full_name'      => $this->input->post('full_name'),
            'email_address'      => $this->input->post('email_address'),
            'phone_number'       => $this->input->post('phone_number'),
            'bank_name'       => $this->input->post('bank_name'),
            'profession'       => $this->input->post('profession'),
            'area'       => $this->input->post('area'),
            'percent'       => $this->input->post('percent'),
            'message'       => $this->input->post('message'),
            'updated_at'   => date('Y-m-d')
        );
        //print_r($data);exit;
        $this->db->where('id', $loan_id)->update('loan_form', $data);
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }

        $status = 'success';
        $message = '<br><div class="alert alert-info">';
        $message.='<strong>Loan Details Updated Successfully. </strong>';
        $message.='</div>';
        $this->session->set_flashdata('message',$message);
        $redirect = base_url('admin/loan_list');

        $data['status']              = $status;
        $data['errors']              = $errors;
        $data['redirect']            = $redirect;
        $data['message']             = $message;
        
        echo json_encode($data);
    }

    public function delete_loan()
    {
        $id = $this->input->post('id');
        $this->admin_model->delete_loan($id);
        $data = base_url('admin/loan_list');
        echo json_encode($data);
    }    

    /******************** Loan End **********************/

    /******************** Bank Loan Start **********************/

    public function bank_loan_list()
    {
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }
        $data['bank_loan_list'] = $this->admin_model->get_all_bank_loan_list();

        $this->load->view('admin/bank_loan_list',$data);
    }

    public function add_bank_loan()
    {
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }
        $this->load->view('admin/add_bank_loan');
    }

    public function save_bank_loan()
    {
        //print_r('expression');exit;
        $errors   = array();
        $message  = '';
        $redirect = '';
    
        $this->db->trans_begin();

        //$data['users'] = $this->admin_model->get_users_data();
        //$user_id = $data['users']->id;


        $this->load->library('upload');

        $data = array(
            'description'       => $this->input->post('description'),
            'added_at'   => date('Y-m-d')
        );
        //print_r($data);exit;
        $this->db->insert('bank_loan', $data);
        $last_insert_id = $this->db->insert_id();

        if(count($_FILES["gallery"]['name'])!=0)
        {
            //echo "adsndsaiondasjn";die();
            for($j=0; $j < count($_FILES["gallery"]['name']); $j++)
            {   
                //$filen =date('ymdhis')."_".str_replace(" ","_", $_FILES["gallery"]['name']["$j"]); //file name

                $filen =$_FILES["gallery"]['name']["$j"]; //file name
                $path = './uploads/bank_logo/'.$filen; //generate the destination path
                if(move_uploaded_file($_FILES["gallery"]['tmp_name']["$j"],$path)) 
                {
                    $images[$j]=$filen;
                }
            }
            foreach($images as $image)
            {
                

                $data1 = array(
                'bank_loan_id'      => $last_insert_id,
                'gallery'              => $image,
                'added_at'   => date('Y-m-d')
                );
                //print_r($data);exit;
                $this->db->insert('bank_loan_images', $data1);
            }
        }

        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }

        $status = 'success';
        $message = '<br><div class="alert alert-info">';
        $message.='<strong>Bank Loan Added Successfully. </strong>';
        $message.='</div>';
        $this->session->set_flashdata('message',$message);
        $redirect = base_url('admin/bank_loan_list');

        $data['status']              = $status;
        $data['errors']              = $errors;
        $data['redirect']            = $redirect;
        $data['message']             = $message;
        
        echo json_encode($data);
    }

    public function edit_bank_loan($id)
    {
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }
        $data['edit_bank_loan'] = $this->admin_model->get_all_edit_bank_loan($id);
        $data['edit_bank_loan_images'] = $this->admin_model->get_all_edit_bank_loan_images($id);

        $this->load->view('admin/edit_bank_loan',$data);
    }

    public function update_bank_loan()
    {
        //print_r('expression');exit;
        $errors   = array();
        $message  = '';
        $redirect = '';
    
        $this->db->trans_begin();

        $bank_loan_id = $this->input->post('bank_loan_id');

        //$data['users'] = $this->admin_model->get_users_data();
        //$user_id = $data['users']->id;

        $this->load->library('upload');

        $data = array(
            'description'       => $this->input->post('description'),
            'updated_at'   => date('Y-m-d')
        );
        //print_r($data);exit;
        $this->db->where('id', $bank_loan_id)->update('bank_loan', $data);
        $last_insert_id = $this->db->insert_id();

        if(isset($_FILES['gallery']['name'])!=0)
        {
            //echo "adsndsaiondasjn";die();
            for($j=0; $j < count($_FILES["gallery"]['name']); $j++)
            {   
                //$filen =date('ymdhis')."_".str_replace(" ","_", $_FILES["image"]['name']["$j"]); //file name

                $filen =$_FILES["gallery"]['name']["$j"]; //file name
                $path = './uploads/bank_logo/'.$filen; //generate the destination path
                if(move_uploaded_file($_FILES["gallery"]['tmp_name']["$j"],$path)) 
                {
                $images[$j]=$filen;
                }
            }
            foreach($images as $image)
            {

                $data1 = array(
                    'bank_loan_id'      => $bank_loan_id,
                    'gallery'    => $image,
                    'added_at'   => date('Y-m-d')
                );
                //print_r($data);exit;
                //$this->db->where('id', $properties_id)->update('properties_images', $data);
                $this->db->insert('bank_loan_images', $data1);
            }
        }
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }

        $status = 'success';
        $message = '<br><div class="alert alert-info">';
        $message.='<strong>Bank Loan Updated Successfully. </strong>';
        $message.='</div>';
        $this->session->set_flashdata('message',$message);
        $redirect = base_url('admin/bank_loan_list');

        $data['status']              = $status;
        $data['errors']              = $errors;
        $data['redirect']            = $redirect;
        $data['message']             = $message;
        
        echo json_encode($data);
    }

    public function delete_bank_loan()
    {
        $id = $this->input->post('id');
        $this->admin_model->delete_bank_loan($id);
        $data = base_url('admin/bank_loan_list');
        echo json_encode($data);
    }

    public function delete_bank_loan_images()
    {
        $id = $this->input->post('id');
        $this->admin_model->delete_bank_loan_images($id);
        $data = base_url('admin/bank_loan_list');
        echo json_encode($data);
    }
    

    /******************** Bank Loan End **********************/

    /******************** Bank Offer Start **********************/

    public function bank_offer_list()
    {
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }
        $data['bank_offer_list'] = $this->admin_model->get_all_bank_offer_list();

        $this->load->view('admin/bank_offer_list',$data);
    }

    public function add_bank_offer()
    {
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }
        $this->load->view('admin/add_bank_offer');
    }

    public function save_bank_offer()
    {
        //print_r('expression');exit;
        $errors   = array();
        $message  = '';
        $redirect = '';
    
        $this->db->trans_begin();

        //$data['users'] = $this->admin_model->get_users_data();
        //$user_id = $data['users']->id;


        $this->load->library('upload');

        if (!empty($_FILES['photo']['name']))
        {
            $photo  = $_FILES['photo']['name'];
            $config = array(
                'file_name'   => $photo,
                'upload_path' => "./uploads/bank_logo/",
                'allowed_types' => "gif|jpg|png|jpeg",
                'overwrite' => TRUE,
                'max_size' => "100000", // Can be set to particular file size , here it is 2 MB(2048 Kb) 2048000
                //'max_height' => "768",
                //'max_width' => "1024"
            );
            $this->upload->initialize($config);
            if($this->upload->do_upload('photo'))
            {
                //print_r('aaaa');exit;
                $upload_photo = $this->upload->data();
            } 
            else 
            {
                $status = 'error';
                $errors['photoError'] = $this->upload->display_errors();
            }
        }
        else
        {
            $upload_photo['file_name'] = '';
            //print_r($upload_photo);exit;
        }

        $data = array(
            'bank_name'      => $this->input->post('bank_name'),
            'interest_rate'      => $this->input->post('interest_rate'),
            'offer'      => $this->input->post('offer'),
            'loan_amount'      => $this->input->post('loan_amount'),
            'photo'    => $upload_photo['file_name'],
            'added_at'   => date('Y-m-d')
        );
        //print_r($data);exit;
        $this->db->insert('bank_offer', $data);
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }

        $status = 'success';
        $message = '<br><div class="alert alert-info">';
        $message.='<strong>Bank Offer Added Successfully. </strong>';
        $message.='</div>';
        $this->session->set_flashdata('message',$message);
        $redirect = base_url('admin/bank_offer_list');

        $data['status']              = $status;
        $data['errors']              = $errors;
        $data['redirect']            = $redirect;
        $data['message']             = $message;
        
        echo json_encode($data);
    }

    public function edit_bank_offer($id)
    {
        if(!$this->session->userdata('email')) 
        {
            redirect('admin');
        }
        $data['edit_bank_offer'] = $this->admin_model->get_all_edit_bank_offer($id);

        $this->load->view('admin/edit_bank_offer',$data);
    }

    public function update_bank_offer()
    {
        //print_r('expression');exit;
        $errors   = array();
        $message  = '';
        $redirect = '';
    
        $this->db->trans_begin();

        $bank_offer_id = $this->input->post('bank_offer_id');

        //$data['users'] = $this->admin_model->get_users_data();
        //$user_id = $data['users']->id;

        $this->load->library('upload');

        $old_photo   = $this->input->post('old_photo');
        //print_r($old_photo);exit;

        if (!empty($_FILES['photo']['name']))
        {
            if($old_photo != '')
            {
                $delete_file = './uploads/bank_logo/'.$old_photo;
                if(file_exists($delete_file))
                {
                    unlink('./uploads/bank_logo/'.$old_photo);
                }
            }

            $photo  = $_FILES['photo']['name'];
            $config = array(
                'file_name'   => $photo,
                'upload_path' => "./uploads/bank_logo/",
                'allowed_types' => "gif|jpg|png|jpeg",
                'overwrite' => TRUE,
                'max_size' => "100000", // Can be set to particular file size , here it is 2 MB(2048 Kb) 2048000
                //'max_height' => "768",
                //'max_width' => "1024"
            );
            $this->upload->initialize($config);
            if($this->upload->do_upload('photo'))
            {
                //print_r('aaaa');exit;
                $upload_photo = $this->upload->data();
            } 
            else 
            {
                $status = 'error';
                $errors['photoError'] = $this->upload->display_errors();
            }
        }
        else
        {
            $upload_photo['file_name'] = $old_photo;
            //print_r($upload_photo);exit;
        }

        $data = array(
            'bank_name'      => $this->input->post('bank_name'),
            'interest_rate'      => $this->input->post('interest_rate'),
            'offer'      => $this->input->post('offer'),
            'loan_amount'      => $this->input->post('loan_amount'),
            'photo'    => $upload_photo['file_name'],
            'updated_at'   => date('Y-m-d')
        );
        //print_r($data);exit;
        $this->db->where('id', $bank_offer_id)->update('bank_offer', $data);
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }

        $status = 'success';
        $message = '<br><div class="alert alert-info">';
        $message.='<strong>Bank Offer Updated Successfully. </strong>';
        $message.='</div>';
        $this->session->set_flashdata('message',$message);
        $redirect = base_url('admin/bank_offer_list');

        $data['status']              = $status;
        $data['errors']              = $errors;
        $data['redirect']            = $redirect;
        $data['message']             = $message;
        
        echo json_encode($data);
    }

    public function delete_bank_offer()
    {
        $id = $this->input->post('id');
        $this->admin_model->delete_bank_offer($id);
        $data = base_url('admin/bank_offer_list');
        echo json_encode($data);
    }
    

    /******************** Slider End **********************/
}
