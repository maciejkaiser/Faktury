<?php
class Invoicemodel extends CI_Model 
{

    function __construct()
    {
        parent::__construct();
    }

    function getFirms(){
        return $this->db->get('firm')->result();
    }
    /**
    * getUserInvoices
    */
    function countInvoices($user_id)
    {

        $this->db->select('invoice_id');
        $this->db->from('invoice');

        $this->db->where("invoice_user",$user_id);

        $this->db->count_all();

        $query = $this->db->get();

        if($query->num_rows()>0)
        {
           return $query->result();
        }else{
            return false;
        }
        
    }


    /**
    * getUserInvoices
    */
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

     /**
    * getUserInvoices
    */
    function getInvoice($invoice_id)
    {

        $this->db->select('invoice_id, user_id, firm_id, invoice_id, invoice_title, invoice_cost, invoice_status, invoice_file, firm_name');
        $this->db->from('invoice');
        $this->db->join('user', 'user_id = invoice_user');
        $this->db->join('firm', 'firm_id = invoice_firm');

        $this->db->where("invoice_id",$invoice_id);

        $query = $this->db->get();

        if($query->num_rows()>0)
        {
           return $query->result();
        }else{
            return false;
        }
        
    }

    /**
    * addInvoice
    */
    public function addInvoice($data)
    {
        if(!empty($data) && is_array($data)){
            $this->db->insert('invoice',$data);
        }
    }

     /**
    * editInvoice
    */
    public function editInvoice($invoice_id, $data)
    {
        if(!empty($data) && is_array($data)){
            $this->db->where('invoice_id', $invoice_id);
            $this->db->update('invoice', $data); 

            return true;
        }else{
            return false;
        }
    }

    /**
    * deleteInvoice
    */
    public function deleteInvoice($invoice_id)
    {
        if($invoice_id){
            return $this->db->delete('invoice', array('invoice_id' => $invoice_id));
        }else{
            return false;
        }
    }

     /**
    * payInvoice
    */
    public function pay($invoice_id)
    {
        if($invoice_id){
            $this->db->where('invoice_id', $invoice_id);
            $this->db->update('invoice', array('invoice_status' => 1)); 
            return true;
        }else{
            return false;
        }
    }


}
?>