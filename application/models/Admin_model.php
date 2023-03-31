<?php

class Admin_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

    /************ Dashboard Start ************/

    public function get_total_customer()
    {
        $this->db->select('count(*) as member');
        $this->db->from('customer');
        //$this->db->where(array('added_by' => $user_id));
        $query = $this->db->get();
        //echo $this->db->last_query();exit;
        $result = $query->row();
        return $result->member;
    }

    public function get_total_vendor()
    {
        $this->db->select('count(*) as member');
        $this->db->from('vendor');
        //$this->db->where(array('added_by' => $user_id));
        $query = $this->db->get();
        //echo $this->db->last_query();exit;
        $result = $query->row();
        return $result->member;
    }

    public function get_total_invoice()
    {
        $this->db->select('count(*) as member');
        $this->db->from('invoice');
        //$this->db->where(array('added_by' => $user_id));
        $query = $this->db->get();
        //echo $this->db->last_query();exit;
        $result = $query->row();
        return $result->member;
    }

    public function get_total_bill()
    {
        $this->db->select('count(*) as member');
        $this->db->from('bill');
        //$this->db->where(array('added_by' => $user_id));
        $query = $this->db->get();
        //echo $this->db->last_query();exit;
        $result = $query->row();
        return $result->member;
    }

    public function get_recent_invoice()
    {
        $query = $this->db->select("a.id,a.invoice_date, a.invoice_no, a.order_no, a.status, a.due_date, a.due_amount, a.totalamt, b.invoiceno, b.payment, c.name FROM invoice a LEFT JOIN (SELECT payment_received_id, invoiceno, SUM(payment) as payment FROM payment_received_entries GROUP BY invoiceno) b on a.invoice_no= b.invoiceno LEFT JOIN (SELECT id, name FROM customer) c on c.id= a.customer_name")
                    ->Limit('5')
                    ->order_by('a.id','desc')
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function get_recent_bill()
    {
        $query = $this->db->select("a.id,a.bill_date, a.bill_no, a.order_no, a.status, a.due_date, a.due_amount, a.totalamt, b.invoiceno, b.payment, c.company_name FROM bill a LEFT JOIN (SELECT payment_made_id, invoiceno, SUM(payment) as payment FROM payment_made_entries GROUP BY invoiceno) b on a.bill_no= b.invoiceno LEFT JOIN (SELECT id, company_name FROM vendor) c on c.id= a.vendor_name")
                    ->Limit('5')
                    ->order_by('a.id','desc')
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }

    /************ Dashboard End ************/

    /************ Customer Start ************/

	public function get_all_customer_list()
    {
        $query = $this->db->select('*')
                    ->from('customer')
                    ->order_by('id','desc')
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function get_all_edit_customer($id)
    {
        $query = $this->db->select('*')
                    ->from('customer')
                    ->where(array('id' => $id))
                    ->get()
                    ->row();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function delete_customer($id)
    {
        $query = $this->db->where('id',$id)->delete('customer');
        return $query;
    }

    public function get_customer_details($id)
    {
        $query = $this->db->select('*')
                    ->from('customer')
                    ->where(array('id' => $id))
                    ->order_by('id','desc')
                    ->get()
                    ->row();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function get_customer_invoice_amt($customerid)
    {
        $query = $this->db->select_sum('totalamt')
                    ->from('invoice')
                    ->where(array('customer_name' => $customerid))
                    ->group_by('customer_name')
                    ->get()
                    ->row();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function get_customer_paid_amt($customerid)
    {
        $query = $this->db->select_sum('amount_received')
                    ->from('payment_received')
                    ->where(array('customer' => $customerid))
                    ->group_by('customer')
                    ->get()
                    ->row();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function get_customer_transaction_invoice($customerid)
    {
        $query = $this->db->select('id,invoice_no,invoice_date,totalamt,status,due_amount')
                    ->from('invoice')
                    ->where(array('customer_name' => $customerid))
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function get_customer_transaction_payment_received($customerid)
    {
        $query = $this->db->select('a.id,a.customer,a.date,a.payment_mode,a.reference,a.amount_received,b.name')
                    ->from('payment_received a')
                    ->join('customer b','b.id = a.customer')
                    ->where(array('a.customer' => $customerid))
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function get_customer_transaction_challan($customerid)
    {
        $query = $this->db->select('id,challan_no,challan_date,totalamt,status')
                    ->from('delivery_challan')
                    ->where(array('customer_name' => $customerid))
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function get_address_by_customer_name($customer_id)
    {
        $query = $this->db
                ->select('*')
                ->from('customer')
                ->where('id',$customer_id)
                //->order_by('city_name','ASC')
                ->get()
                ->row();
        //echo $this->db->last_query();exit;
        return $query;
                             
    }

    /*public function get_pending_invoice_by_customer_dueamt($customer_id)
    {
        $query = $this->db->select('id,invoice_no,invoice_date,customer_name,due_amount,totalamt,status')
                    ->from('invoice')
                    ->where(array('customer_name' => $customer_id, 'due_amount !=' => '0'))
                    ->order_by('id','desc')
                    ->get()
                    ->result();
        echo $this->db->last_query();exit;
        return $query;
    }*/

    /*public function get_pending_invoice_by_customer_dueamt($customer_id)
    {
        $query = $this->db->select('a.id,a.invoice_no,a.invoice_date,a.customer_name,a.due_amount,a.due_date,a.totalamt,a.status,sum(b.payment) as payment, b.invoiceno')
                    ->from('invoice a,payment_received_entries b')
                    ->where('a.customer_name', $customer_id)
                    ->where('a.invoice_no', 'b.invoiceno')
                    ->where_not_in('a.due_amount', 'b.payment')
                    ->group_by('b.invoiceno')
                    ->order_by('a.id','desc')
                    ->get()
                    ->result();
        echo $this->db->last_query();exit;
        return $query;
    }*/

    /*public function get_pending_invoice_by_customer_dueamt($customer_id)
    {
        $payment = 'b.payment';
        $due_amount = 'a.due_amount';
        $query = $this->db->select("a.id,a.invoice_date, a.invoice_no, a.status, a.customer_name, a.due_date,a.due_amount, a.totalamt, b.invoiceno, b.payment, c.name FROM invoice a LEFT JOIN (SELECT payment_received_id, invoiceno, SUM(payment) as payment FROM payment_received_entries GROUP BY invoiceno) b on a.invoice_no= b.invoiceno LEFT JOIN (SELECT id, name FROM customer) c on c.id= a.customer_name")
                    ->where('a.customer_name', $customer_id)
                    ->where($due_amount, 'b.payment', )
                    //->order_by('a.id','desc')
                    ->get()
                    ->result();
        echo $this->db->last_query();exit;
        return $query;
    }*/

    /*public function get_pending_invoice_by_customer_dueamt($customer_id)
    {
        $query = $this->db->select("a.id,a.invoice_date, a.invoice_no, a.status, a.customer_name, a.due_date,a.due_amount, a.totalamt, b.invoiceno, b.payment, c.name FROM invoice a LEFT JOIN (SELECT payment_received_id, invoiceno, SUM(payment) as payment FROM payment_received_entries GROUP BY invoiceno) b on a.invoice_no= b.invoiceno LEFT JOIN (SELECT id, name FROM customer) c on c.id= a.customer_name where 'a.customer_name'= $customer_id AND 'a.due_amount' != 'b.payment'")
                    //->where(array('a.customer_name' => $customer_id, 'a.due_amount !=' => 'b.payment'))
                    //->order_by('a.id','desc')
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }*/

    /*public function get_pending_invoice_by_customer_dueamt($customer_id)
    {
        $query = $this->db->select("a.id,a.invoice_date, a.invoice_no, a.status, a.customer_name, a.due_date,a.due_amount, a.totalamt, b.invoiceno, b.payment, c.name FROM invoice a INNER JOIN (SELECT payment_received_id, invoiceno, SUM(payment) as payment FROM payment_received_entries GROUP BY invoiceno) b  LEFT JOIN (SELECT id, name FROM customer) c on c.id= a.customer_name")
                    //->where(array('a.customer_name' => $customer_id, 'b.payment !=' => 'a.due_amount'))
                    ->where('a.customer_name', $customer_id)
                    ->where_not_in('b.invoiceno', 'a.invoice_no')
                    //->order_by('a.id','desc')
                    ->group_by('a.invoice_no')
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }*/

    public function get_pending_invoice_by_customer_dueamt($customer_id)
    {
        $query = $this->db->select("a.id,a.invoice_date, a.invoice_no, a.order_no, a.status, a.due_date, a.due_amount, a.totalamt, b.invoiceno, b.payment, c.name FROM invoice a LEFT JOIN (SELECT payment_received_id, invoiceno, SUM(payment) as payment FROM payment_received_entries GROUP BY invoiceno) b on a.invoice_no= b.invoiceno LEFT JOIN (SELECT id, name FROM customer) c on c.id= a.customer_name")
                    ->where('a.customer_name', $customer_id)
                    ->order_by('a.id','desc')
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }

    /*public function get_total_dueamt_pending_invoice_by_customer($customer_id)
    {
        $query = $this->db->select('sum(due_amount) as due_amount, count(id) as invoiceid, customer_name')
                    ->from('invoice')
                    ->where(array('customer_name' => $customer_id, 'due_amount !=' => '0'))
                    ->get()
                    ->row();
        //echo $this->db->last_query();exit;
        return $query;
    }*/

    public function get_total_dueamt_pending_invoice_by_customer($customer_id)
    {
        $query = $this->db->select("count(a.id) as invoiceid,a.invoice_date, a.invoice_no, a.order_no, a.status, a.due_date, a.due_amount, a.totalamt, b.invoiceno, b.payment, c.name FROM invoice a LEFT JOIN (SELECT payment_received_id, invoiceno, SUM(payment) as payment FROM payment_received_entries GROUP BY invoiceno) b on a.invoice_no= b.invoiceno LEFT JOIN (SELECT id, name FROM customer) c on c.id= a.customer_name")
                    ->where(array('a.customer_name' => $customer_id, 'a.due_amount !=' => 'b.payment'))
                    //->order_by('a.id','desc')
                    ->get()
                    ->row();
        //echo $this->db->last_query();exit;
        return $query;
    }

    /************ Customer End ************/

    /************ Inventory Start ************/

    public function get_all_inventory_list()
    {
        $query = $this->db->select('*')
                    ->from('inventory')
                    ->order_by('id','desc')
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function get_all_edit_inventory($id)
    {
        $query = $this->db->select('*')
                    ->from('inventory')
                    ->where(array('id' => $id))
                    ->get()
                    ->row();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function delete_inventory($id)
    {
        $query = $this->db->where('id',$id)->delete('inventory');
        return $query;
    }

    public function get_view_inventory_sales($inventoryname)
    {
        $query = $this->db->select('a.*,b.id as invoiceid,b.invoice_date,b.invoice_no,a.qty,c.name')
                    ->from('invoice_entries a')
                    ->join('invoice b','b.id = a.invoiceid')
                    ->join('customer c','c.id = b.customer_name')
                    ->where(array('a.item' => $inventoryname))
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function get_view_inventory_purchase($inventoryname)
    {
        $query = $this->db->select('a.*,b.id as billid,b.bill_date,b.bill_no,a.qty,c.company_name')
                    ->from('bill_entries a')
                    ->join('bill b','b.id = a.billid')
                    ->join('vendor c','c.id = b.vendor_name')
                    ->where(array('a.item' => $inventoryname))
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function get_available_purchase_qty($inventoryname)
    {
        $query = $this->db->select_sum('qty')
                    ->from('bill_entries')
                    ->where(array('item' => $inventoryname))
                    ->get()
                    ->row();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function get_available_sales_qty($inventoryname)
    {
        $query = $this->db->select_sum('qty')
                    ->from('invoice_entries')
                    ->where(array('item' => $inventoryname))
                    ->get()
                    ->row();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function get_all_godown_qty($godown_name)
    {
        $query = $this->db->select('available_qty')
                    ->from('godown')
                    ->where('name',$godown_name)
                    ->get()
                    ->row();
        //echo $this->db->last_query();exit;
        return $query;
    }

    /************ Inventory End ************/

    /************ Godown Start ************/

    /*public function get_all_godown_list()
    {
        $query = $this->db->select('a.*,sum(b.qty) as qty')
                    ->from('godown a')
                    ->join('bill_entries b','b.godown = a.name')
                    ->group_by('a.name')
                    ->order_by('a.id','desc')
                    ->get()
                    ->result();
        echo $this->db->last_query();exit;
        return $query;
    }*/

    public function get_all_godown_list()
    {
        $query = $this->db->select('a.id, a.name, a.available_qty, a.added_at, sum(b.qty) as billqty, sum(c.qty) as invoiceqty FROM godown AS a LEFT JOIN bill_entries as b ON (b.godown = a.name) LEFT JOIN invoice_entries as c ON (c.godown = a.name) GROUP BY a.name')
                    ->order_by('a.id','desc')
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function get_all_edit_godown($id)
    {
        $query = $this->db->select('*')
                    ->from('godown')
                    ->where(array('id' => $id))
                    ->get()
                    ->row();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function delete_godown($id)
    {
        $query = $this->db->where('id',$id)->delete('godown');
        return $query;
    }

    /************ Godown End ************/

    /*public function get_all_item_name()
    {
        $query = $this->db->select('*')
                    ->from('inventory')
                    ->order_by('id','desc')
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }*/

    /************ Vendor Start ************/

    public function get_all_vendor_list()
    {
        $query = $this->db->select('*')
                    ->from('vendor')
                    ->order_by('id','desc')
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function get_all_edit_vendor($id)
    {
        $query = $this->db->select('*')
                    ->from('vendor')
                    ->where(array('id' => $id))
                    ->get()
                    ->row();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function delete_vendor($id)
    {
        $query = $this->db->where('id',$id)->delete('vendor');
        return $query;
    }

    public function get_vendor_details($id)
    {
        $query = $this->db->select('*')
                    ->from('vendor')
                    ->where(array('id' => $id))
                    ->order_by('id','desc')
                    ->get()
                    ->row();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function get_vendor_bill_amt($vendorid)
    {
        $query = $this->db->select_sum('totalamt')
                    ->from('bill')
                    ->where(array('vendor_name' => $vendorid))
                    ->group_by('vendor_name')
                    ->get()
                    ->row();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function get_vendor_paid_amt($vendorid)
    {
        $query = $this->db->select_sum('amount_received')
                    ->from('payment_made')
                    ->where(array('vendor' => $vendorid))
                    ->group_by('vendor')
                    ->get()
                    ->row();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function get_vendor_transaction_bill($vendorid)
    {
        $query = $this->db->select('a.id,a.bill_no,a.bill_date,a.totalamt,a.due_date,a.status,b.company_name')
                    ->from('bill a')
                    ->join('vendor b','b.id = a.vendor_name')
                    ->where(array('vendor_name' => $vendorid))
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function get_vendor_transaction_payment_made($vendorid)
    {
        $query = $this->db->select('a.id,a.vendor,a.date,a.payment_mode,a.reference,a.amount_received,b.company_name')
                    ->from('payment_made a')
                    ->join('vendor b','b.id = a.vendor')
                    ->where(array('a.vendor' => $vendorid))
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function get_vendor_transaction_order($vendorid)
    {
        $query = $this->db->select('a.id,a.purchase_order,a.order_date,a.totalamt,a.status,b.company_name')
                    ->from('purchase_order a')
                    ->join('vendor b','b.id = a.vendor_name')
                    ->where(array('a.vendor_name' => $vendorid))
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function get_address_by_vendor_name($vendor_id)
    {
        $query = $this->db
                ->select('*')
                ->from('vendor')
                ->where('id',$vendor_id)
                //->order_by('city_name','ASC')
                ->get()
                ->row();
        //echo $this->db->last_query();exit;
        return $query;
                             
    }

    /*public function get_pending_bill_by_vendor_dueamt($vendorid)
    {
        $query = $this->db->select('id,bill_no,bill_date,vendor_name,due_amount,totalamt,status')
                    ->from('bill')
                    ->where(array('vendor_name' => $vendorid, 'due_amount !=' => '0'))
                    ->order_by('id','desc')
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }*/

    public function get_pending_bill_by_vendor_dueamt($vendorid)
    {
        $query = $this->db->select("a.id,a.bill_date, a.bill_no, a.order_no, a.status, a.due_date, a.due_amount, a.totalamt, b.invoiceno, b.payment, c.name FROM bill a LEFT JOIN (SELECT payment_made_id, invoiceno, SUM(payment) as payment FROM payment_made_entries GROUP BY invoiceno) b on a.bill_no= b.invoiceno LEFT JOIN (SELECT id, name FROM customer) c on c.id= a.vendor_name")
                    ->where('a.vendor_name', $vendorid)
                    ->order_by('a.id','desc')
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function get_total_dueamt_pending_bill_by_vendor($vendorid)
    {
        $query = $this->db->select('sum(due_amount) as due_amount, count(id) as billid, vendor_name')
                    ->from('bill')
                    ->where(array('vendor_name' => $vendorid, 'due_amount !=' => '0'))
                    ->get()
                    ->row();
        //echo $this->db->last_query();exit;
        return $query;
    }

    /************ Vendor End ************/

    function getitemsdetails($name)
    {
        $result=$this->db->select('*')
                    ->from('inventory')
                    ->where("name LIKE '%$name%'")
                    ->get()
                    ->result_array();
        return $result;
    }

    /************ Invoice Start ************/

    /*public function get_all_invoice_list()
    {
        $query = $this->db->select('a.*, b.name')
                    ->from('invoice a')
                    ->join('customer b','b.id = a.customer_name')
                    ->order_by('a.id','desc')
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }*/

    public function get_all_invoice_list()
    {
        $query = $this->db->select("a.id,a.invoice_date, a.invoice_no, a.order_no, a.status, a.due_date, a.due_amount, a.totalamt, b.invoiceno, b.payment, c.name FROM invoice a LEFT JOIN (SELECT payment_received_id, invoiceno, SUM(payment) as payment FROM payment_received_entries GROUP BY invoiceno) b on a.invoice_no= b.invoiceno LEFT JOIN (SELECT id, name FROM customer) c on c.id= a.customer_name")
                    ->order_by('a.id','desc')
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }

    /*public function get_all_edit_invoice($id)
    {
        $query = $this->db->select('*')
                    ->from('invoice')
                    ->where(array('id' => $id))
                    ->get()
                    ->row();
        //echo $this->db->last_query();exit;
        return $query;
    }*/

    public function get_all_edit_invoice($id)
    {
        $query = $this->db->select("a.id,a.invoice_date, a.invoice_no, a.order_no, a.status, a.due_date, a.due_amount, a.totalamt, a.customer_name, a.place_of_supply, b.invoiceno, b.payment, c.name FROM invoice a LEFT JOIN (SELECT payment_received_id, invoiceno, SUM(payment) as payment FROM payment_received_entries GROUP BY invoiceno) b on a.invoice_no= b.invoiceno LEFT JOIN (SELECT id, name FROM customer) c on c.id= a.customer_name")
                    ->where(array('a.id' => $id))
                    ->get()
                    ->row();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function get_all_edit_invoice_entries($invoiceid)
    {
        $query = $this->db->select('*')
                    ->from('invoice_entries')
                    ->where(array('invoiceid' => $invoiceid))
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function delete_invoice_entries($invoice_id)
    {
        //print_r($invoice_id);exit;
        $query = $this->db->where('invoiceid',$invoice_id)->delete('invoice_entries');
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function delete_invoice($id)
    {
        $query = $this->db->where('id',$id)->delete('invoice');
        $query = $this->db->where('invoiceid',$id)->delete('invoice_entries');
        return $query;

        
    }

    public function get_all_customer_name()
    {
        $query = $this->db->select('*')
                    ->from('customer')
                    ->order_by('id','desc')
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function get_customer_address($customerid)
    {
        $query = $this->db->select('*')
                    ->from('customer')
                    ->where(array('id' => $customerid))
                    ->order_by('id','desc')
                    ->get()
                    ->row();
        //echo $this->db->last_query();exit;
        return $query;
    }

    /************ Invoice End ************/

    /************ Bill Start ************/

    /*public function get_all_bill_list()
    {
        $query = $this->db->select('a.*, b.company_name')
                    ->from('bill a')
                    ->join('vendor b','b.id = a.vendor_name')
                    ->order_by('a.id','desc')
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }*/

    public function get_all_bill_list()
    {
        $query = $this->db->select("a.id,a.bill_date, a.bill_no, a.order_no, a.status, a.due_date, a.due_amount, a.totalamt, b.invoiceno, b.payment, c.company_name FROM bill a LEFT JOIN (SELECT payment_made_id, invoiceno, SUM(payment) as payment FROM payment_made_entries GROUP BY invoiceno) b on a.bill_no= b.invoiceno LEFT JOIN (SELECT id, company_name FROM vendor) c on c.id= a.vendor_name")
                    ->order_by('a.id','desc')
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }

    /*public function get_all_edit_bill($id)
    {
        $query = $this->db->select('*')
                    ->from('bill')
                    ->where(array('a.id' => $id))
                    ->get()
                    ->row();
        //echo $this->db->last_query();exit;
        return $query;
    }*/

    public function get_all_edit_bill($id)
    {
        $query = $this->db->select("a.id,a.bill_date, a.bill_no, a.order_no, a.status, a.due_date, a.due_amount, a.totalamt, a.vendor_name, a.source_of_supply, a.destination_of_supply, a.subtotal, a.total_taxamt, a.adjustment, b.invoiceno, b.payment, c.company_name FROM bill a LEFT JOIN (SELECT payment_made_id, invoiceno, SUM(payment) as payment FROM payment_made_entries GROUP BY invoiceno) b on a.bill_no= b.invoiceno LEFT JOIN (SELECT id, company_name FROM vendor) c on c.id= a.vendor_name")
                    ->where(array('a.id' => $id))
                    ->get()
                    ->row();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function get_all_edit_bill_entries($billid)
    {
        $query = $this->db->select('*')
                    ->from('bill_entries')
                    ->where(array('billid' => $billid))
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function delete_bill_entries($bill_id)
    {
        //print_r($invoice_id);exit;
        $query = $this->db->where('billid',$bill_id)->delete('bill_entries');
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function delete_bill($id)
    {
        /*$data = array(
            'status'      => 'Open'
        );
        //print_r($data);exit;
        $this->db->where('id', $id)->update('purchase_order', $data);*/

        $query = $this->db->where('id',$id)->delete('bill');
        $query = $this->db->where('billid',$id)->delete('bill_entries');
        return $query;
    }

    public function get_all_vendor_name()
    {
        $query = $this->db->select('*')
                    ->from('vendor')
                    ->order_by('id','desc')
                    ->get()
                    ->row();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function get_vendor_address($vendorid)
    {
        $query = $this->db->select('*')
                    ->from('vendor')
                    ->where(array('id' => $vendorid))
                    ->order_by('id','desc')
                    ->get()
                    ->row();
        //echo $this->db->last_query();exit;
        return $query;
    }

    /************ Bill End ************/

    /************ Purchase Order Start ************/

    /*public function get_all_purchase_order_list()
    {
        $query = $this->db->select('a.*,b.company_name')
                    ->from('purchase_order a')
                    ->join('vendor b','b.id = a.vendor_name')
                    ->order_by('a.id','desc')
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }*/

    public function get_all_purchase_order_list()
    {
        $query = $this->db->select("a.id,a.vendor_name, a.order_date, a.purchase_order, a.totalamt, a.status, b.order_no, c.company_name FROM purchase_order a LEFT JOIN (SELECT order_no FROM bill) b on a.purchase_order= b.order_no LEFT JOIN (SELECT id, company_name FROM vendor) c on c.id= a.vendor_name")
                    ->order_by('a.id','desc')
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }

    /*public function get_all_vendor_name()
    {
        $query = $this->db->select('*')
                    ->from('vendor')
                    ->order_by('id','desc')
                    ->get()
                    ->row();
        //echo $this->db->last_query();exit;
        return $query;
    }*/

    public function get_all_edit_purchase_order($id)
    {
        $query = $this->db->select('*')
                    ->from('purchase_order')
                    ->where(array('id' => $id))
                    ->get()
                    ->row();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function get_all_edit_purchase_order_entries($purchaseorderid)
    {
        $query = $this->db->select('*')
                    ->from('purchase_order_entries')
                    ->where(array('purchaseorderid' => $purchaseorderid))
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function delete_purchase_order_entries($purchase_order_id)
    {
        //print_r($invoice_id);exit;
        $query = $this->db->where('purchaseorderid',$purchase_order_id)->delete('purchase_order_entries');
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function delete_purchase_order($id)
    {
        $query = $this->db->where('id',$id)->delete('purchase_order');
        $query = $this->db->where('purchaseorderid',$id)->delete('purchase_order_entries');
        return $query;
    }

    /************ Purchase Order End ************/

    /************ Payment Received Start ************/

    /*public function get_pending_invoice($customer)
    {
        $query = $this->db->select('*')
                    ->from('invoice')
                    ->where(array('customer_name' => $customer))
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }*/

    /*public function get_pending_invoice($customer)
    {
        $query = $this->db->select('a.id,a.invoice_date, a.invoice_no, a.due_date, a.due_amount, a.totalamt, a.customer_name, b.invoiceno, b.payment, sum(a.totalamt - b.payment) as damt')
                    ->from(['invoice a','payment_received_entries b'])
                    ->where(array('a.customer_name' => $customer))
                    ->group_by('b.invoiceno')
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }*/

    /*public function get_pending_invoice($customer)
    {
        $query = $this->db->select("a.id,a.invoice_date, a.invoice_no, a.due_date, a.due_amount, a.totalamt, b.invoiceno, b.paymentt, (a.totalamt - b.paymentt) as damt FROM invoice a LEFT JOIN (SELECT payment_received_id, invoiceno, sum(payment) as paymentt FROM payment_received_entries GROUP BY invoiceno) b on a.invoice_no= b.invoiceno")
                    ->where(array('a.customer_name' => $customer))
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }*/

    public function get_pending_invoice($customer)
    {
        $query = $this->db->select("a.id,a.customer_name,a.invoice_date, a.invoice_no, a.due_date, a.due_amount, a.totalamt, b.invoiceno, b.payments FROM invoice a LEFT JOIN (SELECT payment_received_id, invoiceno, sum(payment) as payments FROM payment_received_entries GROUP BY invoiceno) b on a.invoice_no= b.invoiceno")
                    ->where(array('a.customer_name' => $customer))
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }

    /*public function get_pending_invoice($customer)
    {
        $query = $this->db->select("a.id,a.customer_name,a.invoice_date, a.invoice_no, a.due_date, a.due_amount, a.totalamt, b.invoiceno, b.payments, b.customername, c.display_name FROM invoice a LEFT JOIN (SELECT payment_received_id, customername, invoiceno, sum(payment) as payments FROM payment_received_entries GROUP BY invoiceno) b on a.invoice_no= b.invoiceno LEFT JOIN (SELECT id, display_name FROM customer) c on c.id= a.customer_name")
                    ->where(array('a.customer_name' => $customer))
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }*/

    

    public function get_all_payment_received_list()
    {
        $query = $this->db->select('a.*,b.company_name,b.name')
                    ->from('payment_received a')
                    ->join('customer b','b.id = a.customer')
                    //->order_by('a.id','desc') //desc not working
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function get_payment_received_last_id()
    {
        $query = $this->db->select('*')
                    ->from('payment_received')
                    ->order_by('id','desc')
                    ->get()
                    ->row();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function get_all_edit_payment_received($id)
    {
        $query = $this->db->select('*')
                    ->from('payment_received')
                    ->where(array('id' => $id))
                    ->get()
                    ->row();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function get_all_edit_payment_received_entries($paymentreceivedid)
    {
        $query = $this->db->select('*')
                    ->from('payment_received_entries')
                    ->where(array('payment_received_id' => $paymentreceivedid))
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function delete_payment_received($id)
    {
        $query = $this->db->where('id',$id)->delete('payment_received');
        $query = $this->db->where('payment_received_id',$id)->delete('payment_received_entries');
        return $query;
    }

    public function delete_payment_received_entries($payment_received_id)
    {
        //print_r($invoice_id);exit;
        $query = $this->db->where('payment_received_id',$payment_received_id)->delete('payment_received_entries');
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function get_view_payment_received($id)
    {
        $query = $this->db->select('a.*,b.name,b.billing_attention,b.billing_street,b.billing_city,b.billing_state,b.billing_pincode,c.bank_name')
                    ->from('payment_received a')
                    ->join('customer b','b.id = a.customer')
                    ->join('bank c','c.id = a.deposit')
                    ->where(array('a.id' => $id))
                    ->get()
                    ->row();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function get_payment_received_id_increment()
    {
        $query = $this->db->select('*')
                    ->from('payment_received')
                    //->order_by('a.id','desc') //desc not working
                    ->get();
        $result = $query->row();
        //echo $this->db->last_query();exit;
        $query2 = $result->id+1;
        return $query2;
    }

    /************ Payment Received End ************/

    /************ Bank Start ************/

    /*public function get_all_bank_list()
    {
        $query = $this->db->select('*')
                    ->from('bank')
                    ->order_by('id','desc')
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }*/

    public function get_all_bank_list()
    {
        $query = $this->db->select("a.id,a.account_name,a.account_no,a.account_code,a.status,b.deposit, b.received_total, c.deposit, c.made_total FROM bank a LEFT JOIN (SELECT deposit, total, SUM(total) as received_total FROM payment_received GROUP BY deposit) b on a.id= b.deposit LEFT JOIN (SELECT deposit, total, SUM(total) as made_total FROM payment_made GROUP BY deposit) c on a.id= c.deposit")
                    ->order_by('a.id','desc')
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function get_all_edit_bank($id)
    {
        $query = $this->db->select('*')
                    ->from('bank')
                    ->where(array('id' => $id))
                    ->get()
                    ->row();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function delete_bank($id)
    {
        $query = $this->db->where('id',$id)->delete('bank');
        return $query;
    }

    /************ Bank End ************/

    /************ Payment Made Start ************/

    /*public function get_pending_bill($vendor)
    {
        $query = $this->db->select('*')
                    ->from('bill')
                    ->where(array('vendor_name' => $vendor))
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }*/

    public function get_pending_bill($vendor)
    {
        $query = $this->db->select("a.id,a.bill_date, a.bill_no, a.due_date, a.due_amount, a.totalamt, b.invoiceno, b.payments FROM bill a LEFT JOIN (SELECT payment_made_id, invoiceno, sum(payment) as payments FROM payment_made_entries GROUP BY invoiceno) b on a.bill_no= b.invoiceno")
                    ->where(array('a.vendor_name' => $vendor))
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function get_all_payment_made_list()
    {
        $query = $this->db->select('a.*,b.company_name')
                    ->from('payment_made a')
                    ->join('vendor b','b.id = a.vendor')
                    ->order_by('a.id','asc')
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function get_payment_made_last_id()
    {
        $query = $this->db->select('*')
                    ->from('payment_made')
                    ->order_by('id','desc')
                    ->get()
                    ->row();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function get_all_edit_payment_made($id)
    {
        $query = $this->db->select('*')
                    ->from('payment_made')
                    ->where(array('id' => $id))
                    ->get()
                    ->row();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function get_all_edit_payment_made_entries($paymentmadeid)
    {
        $query = $this->db->select('*')
                    ->from('payment_made_entries')
                    ->where(array('payment_made_id' => $paymentmadeid))
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function delete_payment_made($id)
    {
        $query = $this->db->where('id',$id)->delete('payment_made');
        $query = $this->db->where('payment_made_id',$id)->delete('payment_made_entries');
        return $query;
    }

    public function delete_payment_made_entries($payment_made_id)
    {
        //print_r($invoice_id);exit;
        $query = $this->db->where('payment_made_id',$payment_made_id)->delete('payment_made_entries');
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function get_all_vendor_name_payment_made()
    {
        $query = $this->db->select('*')
                    ->from('vendor')
                    ->order_by('id','desc')
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function get_view_payment_made($id)
    {
        $query = $this->db->select('a.*, ,b.company_name,b.billing_attention,b.billing_street,b.billing_city,b.billing_state,b.billing_pincode,c.bank_name')
                    ->from('payment_made a')
                    ->join('vendor b','b.id = a.vendor')
                    ->join('bank c','c.id = a.deposit')
                    ->where(array('a.id' => $id))
                    ->get()
                    ->row();
        //echo $this->db->last_query();exit;
        return $query;
    }

    /************ Payment Made End ************/

    /************ Delivery Challan Start ************/

    /*public function get_all_delivery_challan_list()
    {
        $query = $this->db->select('a.*, b.name')
                    ->from('delivery_challan a')
                    ->join('customer b','b.id = a.customer_name')
                    ->order_by('a.id','desc')
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }*/

    public function get_all_delivery_challan_list()
    {
        $query = $this->db->select("a.id,a.customer_name, a.challan_date, a.challan_no, a.totalamt, a.status, b.order_no, c.name FROM delivery_challan a LEFT JOIN (SELECT order_no FROM invoice) b on a.challan_no= b.order_no LEFT JOIN (SELECT id, name FROM customer) c on c.id= a.customer_name")
                    ->order_by('a.id','desc')
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function get_all_edit_delivery_challan($id)
    {
        $query = $this->db->select('*')
                    ->from('delivery_challan')
                    ->where(array('id' => $id))
                    ->get()
                    ->row();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function get_all_edit_delivery_challan_entries($deliverychallanid)
    {
        $query = $this->db->select('*')
                    ->from('delivery_challan_entries')
                    ->where(array('deliverychallanid' => $deliverychallanid))
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function delete_delivery_challan_entries($delivery_challan_id)
    {
        //print_r($invoice_id);exit;
        $query = $this->db->where('deliverychallanid',$delivery_challan_id)->delete('delivery_challan_entries');
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function delete_delivery_challan($id)
    {
        $query = $this->db->where('id',$id)->delete('delivery_challan');
        $query = $this->db->where('deliverychallanid',$id)->delete('delivery_challan_entries');
        return $query;
    }

    /************ Delivery Challan End ************/

    /************ Company Details Start ************/

    public function get_all_company_list()
    {
        $query = $this->db->select('*')
                    ->from('company_details')
                    ->order_by('id','desc')
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function get_all_edit_company($id)
    {
        $query = $this->db->select('*')
                    ->from('company_details')
                    ->where(array('id' => $id))
                    ->get()
                    ->row();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function delete_company($id)
    {
        $query = $this->db->where('id',$id)->delete('company_details');
        return $query;
    }

    public function get_company_details()
    {
        $query = $this->db->select('*')
                    ->from('company_details')
                    ->where(array('status' => 'Active'))
                    ->get()
                    ->row();
        //echo $this->db->last_query();exit;
        return $query;
    }

    /************ Company Details End ************/

    public function check_admin_login($email, $password)
    {
        //print_r('expression');exit;
        return $this->db->limit(1)
            ->select(array('id', 'email'))
            ->get_where('users', array('email'=>$email, 'password'=>md5($password)));
            //echo $this->db->last_query();exit;
    }

    /************ Inventory Summary Start ************/

    public function get_inventory_summary()
    {
        $query = $this->db->select("a.id,a.name, a.sale_rate, a.purchase_rate, a.opening_stock,  b.billqty, c.invoiceqty FROM inventory a LEFT JOIN (SELECT item, sum(qty) as billqty FROM bill_entries) b on a.name= b.item LEFT JOIN (SELECT item, sum(qty) as invoiceqty FROM invoice_entries) c on c.item= a.name")
                    //->where(array('a.name' => $id))
                    ->order_by('a.id','desc')
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }
    /************ Inventory Summary End ************/

    /************ Godown Summary Start ************/

    /*public function get_godown_summary_details($godownname)
    {
        $query = $this->db->select('a.id, a.name, a.available_qty, a.added_at, sum(b.qty) as billqty, sum(c.qty) as invoiceqty, d.name as inventoryname, d.purchase_rate FROM godown AS a LEFT JOIN inventory as d ON (d.godown = a.name) LEFT JOIN bill_entries as b ON (b.godown = a.name) LEFT JOIN invoice_entries as c ON (c.godown = a.name) GROUP BY a.name')
                    ->where('a.id',$godownname)
                    ->order_by('a.id','desc')
                    ->get()
                    ->result();
        echo $this->db->last_query();exit;
        return $query;
    }*/

    public function get_godown_summary_details($godownname)
    {
        //print_r($godownname);exit;
        $query = $this->db->select('a.name as inventoryname, a.purchase_rate, a.godown, sum(b.qty) as billqty, sum(c.qty) as invoiceqty, d.available_qty, d.id from inventory AS a LEFT JOIN bill_entries as b ON (b.godown = a.godown) LEFT JOIN invoice_entries as c ON (c.godown = a.godown) LEFT JOIN godown as d ON (d.id = a.godown) ')
                //->where(array('a.godown' => $godownname))
                //->order_by('a.name','Asc')
                ->get()
                ->result();
        echo $this->db->last_query();exit;
        return $query;
    }

    /************ Godown Summary End ************/

    /************ Properties Start ************/

    public function get_all_properties_list()
    {
        $query = $this->db->select('*')
                    ->from('properties')
                    ->order_by('id','desc')
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function get_all_edit_properties($id)
    {
        $query = $this->db->select('*')
                    ->from('properties')
                    ->where(array('id' => $id))
                    ->get()
                    ->row();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function get_all_edit_properties_images($id)
    {
        $query = $this->db->select('*')
                    ->from('properties_images')
                    ->where(array('properties_id' => $id))
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function get_all_edit_properties_floor_plan($id)
    {
        $query = $this->db->select('*')
                    ->from('properties_floor_plan')
                    ->where(array('properties_id' => $id))
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function delete_properties($id)
    {
        $query = $this->db->where('id',$id)->delete('properties');
        return $query;
    }

    public function delete_properties_images($id)
    {
        $query = $this->db->where('id',$id)->delete('properties_images');
        return $query;
    }

    public function delete_properties_floor_plan($id)
    {
        $query = $this->db->where('id',$id)->delete('properties_floor_plan');
        return $query;
    }

    /************ Properties End ************/


    /************ Slider Start ************/

    public function get_all_slider_list()
    {
        $query = $this->db->select('*')
                    ->from('slider')
                    ->order_by('id','desc')
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function get_all_edit_slider($id)
    {
        $query = $this->db->select('*')
                    ->from('slider')
                    ->where(array('id' => $id))
                    ->get()
                    ->row();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function delete_slider($id)
    {
        $query = $this->db->where('id',$id)->delete('slider');
        return $query;
    }

    /************ Slider End ************/

    /************ Loan Start ************/

    public function get_all_loan_list()
    {
        $query = $this->db->select('*')
                    ->from('loan_form')
                    ->order_by('id','desc')
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function get_all_edit_loan($id)
    {
        $query = $this->db->select('*')
                    ->from('loan_form')
                    ->where(array('id' => $id))
                    ->get()
                    ->row();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function delete_loan($id)
    {
        $query = $this->db->where('id',$id)->delete('loan_form');
        return $query;
    }

    /************ Loan End ************/

    /************ Bank Loan Start ************/

    public function get_all_bank_loan_list()
    {
        $query = $this->db->select('*')
                    ->from('bank_loan')
                    ->order_by('id','desc')
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function get_all_edit_bank_loan($id)
    {
        $query = $this->db->select('*')
                    ->from('bank_loan')
                    ->where(array('id' => $id))
                    ->get()
                    ->row();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function get_all_edit_bank_loan_images($id)
    {
        $query = $this->db->select('*')
                    ->from('bank_loan_images')
                    ->where(array('bank_loan_id' => $id))
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function delete_bank_loan($id)
    {
        $query = $this->db->where('id',$id)->delete('bank_loan');
        return $query;
    }

    public function delete_bank_loan_images($id)
    {
        $query = $this->db->where('id',$id)->delete('bank_loan_images');
        return $query;
    }

    /************ Bank Loan End ************/

    /************ Bank Offer Start ************/

    public function get_all_bank_offer_list()
    {
        $query = $this->db->select('*')
                    ->from('bank_offer')
                    ->order_by('id','desc')
                    ->get()
                    ->result();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function get_all_edit_bank_offer($id)
    {
        $query = $this->db->select('*')
                    ->from('bank_offer')
                    ->where(array('id' => $id))
                    ->get()
                    ->row();
        //echo $this->db->last_query();exit;
        return $query;
    }

    public function delete_bank_offer($id)
    {
        $query = $this->db->where('id',$id)->delete('bank_offer');
        return $query;
    }

    /************ Slider End ************/

}

?>