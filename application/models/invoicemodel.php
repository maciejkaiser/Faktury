<?php
class Invoicemodel extends CI_Model 
{

    function __construct()
    {
        parent::__construct();
    }
    
    function get_last_ten_entries()
    {
        $query = $this->db->get('user', 10);
        return $query->result();
    }

    function getUserInvoices($user_id)
    {


        $this->db->select('invoice_id, user_id, firm_id, invoice_id, invoice_title, invoice_cost, invoice_status, invoice_file, firm_name');
        $this->db->from('invoice');
        $this->db->join('user', 'user_id = invoice_user');
        $this->db->join('firm', 'firm_id = invoice_firm');

        $this->db->where("invoice_user",$user_id);

        $query = $this->db->get();

        if($query->num_rows()>0)
        {
           return $query->result();
        }else{
            return false;
        }
        
    }

    public function addInvoice()
    {
        $data=array();

        $this->db->insert('invoice',$data);
    }


}
?>