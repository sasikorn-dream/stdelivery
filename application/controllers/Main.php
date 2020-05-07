<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Product_model");
    }
    public function index()
    {
        $this->load->helper("main_helper");
        $all_restaurant = $this->Product_model->all_res();

        $this->load->view('header');
        $this->load->view('content_menushow', array('restaurants' => $all_restaurant));
        // $this->load->view('footer');
    }

    public function test($products_id)
    {
        $product = $this->db->get_where("products", array('restaurant_id' => $products_id));
        if ($product->num_rows() > 0) {
            $this->load->view('header');
            $this->load->view('detailproduct', array('products' => $product->result_array()));
            // $this->load->view('footer');
        } else {
            echo 'not have';
        }
    }


    public function product()
    {
        // $products_name = $this->input->post('products_name');
        // $products_price = $this->input->post('products_price');
        // $products_detail = $this->input->post('products_detail');
        // $products_img = $this->input->post('products_img');
        // $products_type = $this->input->post('products_type');
        // echo "products_name : " . $products_name . "<br/>";
        // echo "products_price : " . $products_price . "<br/>";
        // echo "products_detail : " . $products_detail . "<br/>";
        // echo "products_img : " . $products_img . "<br/>";
        // echo "products_type : " . $products_type . "<br/>";

        // $this->db->insert('products',$products_name);
    }
}