<?php
class Firmmodel extends CI_Model 
{

    function __construct()
    {
        parent::__construct();
    }

    public function all(){
        return $this->db->get('firm')->result();
    }

    function getFirm($firm_id)
    {

        $this->db->select('firm_name');
        $this->db->from('firm');
        $this->db->where("firm_id",$firm_id);

        $query = $this->db->get();

        if($query->num_rows()>0)
        {
           return $query->result();
        }else{
            return false;
        }
        
    }


    public function add($data){
		if(!empty($data) && is_array($data)){
            $this->db->insert('firm',$data);
        }
    }

    public function editFirm($firm_id = 0, $firm_name =""){
    	if($firm_id != 0 && $firm_name != ""){
            $this->db->where('firm_id', $firm_id);
            $this->db->update('firm', array('firm_name' => $firm_name )); 
            return true;
        }else{
            return false;
        }
    }

    public function delete($firm_id){
		if($firm_id){
            return $this->db->delete('firm', array('firm_id' => $firm_id));
        }else{
            return false;
        }
    }

}
?>