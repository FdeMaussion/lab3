<?php
class News extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('news_model');
    }
    public function index()
    {
        $data['news'] = $this->news_model->get_news();
        $data['title'] = 'News Archive';
        
        $this->load->view('templates/header' , $data);
        $this->load->view('news/index' , $data);
        $this->load->view('templates/footer' , $data);
    }
    public function view($slug)
    {
        $data['news_item'] = $this->news_model->get_news($slug);
        if (empty($data['news_item']))
        {
            show_404();
        }
        $data['title'] = $data['news_item']['title'];
        $this->load->view('templates/header', $data);
        $this->load->view('news/view', $data);
        $this->load->view('templates/footer');
    }
    
    public function delete($slug = FALSE)
    {
        $borrado = $this->news_model->delete_news($slug);
        /*
        if ($borrado == TRUE)
        {
            $data['title'] = "Noticia Borrada";
        
            $this->load->view('templates/header',$data);
            $this->load->view('erased_news', $data);
            $this->load->view('templates/footer',$data);
        }
        else
        {
            $data['title'] = "Noticia No Borrada";
        
            $this->load->view('templates/header',$data);
            $this->load->view('not_erased_news', $data);
            $this->load->view('templates/footer',$data);
        }*/
        
    }
    
    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('title','title','required');
        $this->form_validation->set_rules('text','text','required');
        $this->form_validation->set_rules('slug','slug','required');
        
        if($this->form_validation->run() === FALSE)
        {
            $data['title'] = 'Create';
            $this->load->view('templates/header',$data);
            $this->load->view('news/create', $data);
            $this->load->view('templates/footer');
        }
        else 
        {
            $data['title'] = 'Success';
            $this->news_model->set_news();
            $this->load->view('templates/header',$data);
            $this->load->view('news/create', $data);
            $this->load->view('templates/footer');
        }
        
    }
}
?>
