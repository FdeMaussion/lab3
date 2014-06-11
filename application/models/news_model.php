<?php
    class news_model extends CI_Model
    {
        public function __construct()
        {
            $this->load->database();
        }
        public function get_news($slug = FALSE)
        {
            if ($slug === FALSE)
            {
                $query = $this->db->get('news');
                return $query->result_array();
            }
            $query = $this->db->get_where('news', array ('slug'=> $slug));
            return $query->row_array();
        }
        public function delete_news($slug = FALSE)
        {
            if ($slug === FALSE)
            {
                return FALSE;
            }
            $query = NULL;
            $query = $this->db->get_where('news', array ('slug'=> $slug));
            if ($query)
            {
                $this->db->delete('news', array ('slug'=> $slug));
                return TRUE;
            }
            
            return FALSE;
        }
        
        public function set_news($slug = FALSE)
        {
            $this->load->helper('url');
            
            //$slug = url_title($this->input->post('title'), dash, TRUE);
            $data = array(
                'title' => $this->input->post('title'),
                'slug' => $this->input->post('slug'),
                'text' => $this->input->post('text')
            );
            
            return $this->db->insert('news',$data);
        }
        
    }
?>
