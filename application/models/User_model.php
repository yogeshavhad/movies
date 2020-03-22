<?php

class User_model extends CI_Model {

    protected $User_table_name = "users";

    /**
     * Insert User Data in Database
     * @param: {array} userData
     */
    public function insert_user($userData) {
        return $this->db->insert($this->User_table_name, $userData);
    }

    /**
     * Check User Login in Database
     * @param: {array} userData
     */
    public function check_login($userData) {

        /**
         * First Check Email is Exists in Database
         */
        $query = $this->db->get_where($this->User_table_name, array('email' => $userData['email']));
        if ($this->db->affected_rows() > 0) {

            $password = $query->row('password');

            /**
             * Check Password Hash
             */
            if (password_verify($userData['password'], $password) === TRUE) {

                /**
                 * Password and Email Address Valid
                 */
                return [
                    'status' => TRUE,
                    'data' => $query->row(),
                ];

            } else {
                return ['status' => FALSE,'data' => FALSE];
            }

        } else {
            return ['status' => FALSE,'data' => FALSE];
        }
    }
	public function update($where, $data)
	{
		$this->db->update($this->User_table_name, $data, $where);
		return $this->db->affected_rows();
	}
  public function get_by_id($id)
  {
    $this->db->from($this->User_table_name);
    $this->db->where('id',$id);
    $query = $this->db->get();

    return $query->row();
  }
}
