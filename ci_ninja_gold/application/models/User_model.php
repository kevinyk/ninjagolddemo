<?php
class User_model extends CI_Model {
     function get_all_users()
     {
         return $this->db->query("SELECT * FROM users")->result_array();
     }
     function get_course_by_id($course_id)
     {
         return $this->db->query("SELECT * FROM courses WHERE id = ?", array($course_id))->row_array();
     }
     function add_user($newUser)
     {
        $query = "INSERT INTO users (name, email, password, created_at, updated_at) VALUES (?,?,?,?,?)";
        $values = array($newUser['name'], $newUser['email'],$newUser['password'] ,date("Y-m-d, H:i:s"),date("Y-m-d, H:i:s")); 
        return $this->db->query($query, $values);
    }
     function login_user($user)
     {
        $query = "SELECT id FROM users WHERE email = ? AND password = ?";
        $values = array($user['email'], $user['password']);
        return $this->db->query($query,$values)->result_array();
        
     }
     function update_user($newGold)
     {
        $userId = $this->session->userdata('id');
        $query = "UPDATE users SET gold=? WHERE id = ?";
        $values = array($newGold, $userId);
        return $this->db->query($query,$values);
     }
}
?>