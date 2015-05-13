<?php
class Usermodel extends CI_Model 
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

    function login($name,$password)
    {
        $this->db->where("user_name",$name);
        $this->db->where("user_password",$password);

        $query=$this->db->get("user");

        if($query->num_rows()>0)
        {
            foreach($query->result() as $rows)
            {
                $newdata = array(
                    'user_id'  => $rows->user_id,
                    'user_name'  => $rows->user_name,
                    'logged_in'  => TRUE,
                    );
            }

            $this->session->set_userdata($newdata);
            return true;
        }
        return false;
    }

    public function add_user()
    {
        $data=array(
            'user_name'=> $this->input->post('user_name'),
            'user_password'=> md5($this->input->post('user_password'))
            );

        $this->db->insert('user',$data);
    }


}
?>