<?php
class Pages extends CI_Controller
{
    public function mostrar($page = 'home')
    {
        if (!file_exists('application/views/'.$page.'.php'))
        {
            show_404();
        }
        $data['title'] = ucfirst($page);
        
        $this->load->view('templates/header',$data);
        $this->load->view($page, $data);
        $this->load->view('templates/footer',$data);
    }
}

?>
