<?php



class Categories_load_model extends CI_Model {



    public function get_categories()

    {

        $query = $this->db->get('category');

        $return = array();



        foreach ($query->result() as $category)

        {

            $return[$category->category_id] = $category;

        $return[$category->category_id]->subs = $this->get_sub_categories($category->category_id); // Get the categories sub categories

    }



    return $return;

}





public function get_sub_categories($category_id)

{

    $this->db->where('sub_parent_id', $category_id);

    $query = $this->db->get('sub_cat');

    return $query->result();

}
public function get_services()
    {
        $query = $this->db->get('services');
        $return = array();

        foreach ($query->result() as $services)
        {
            $return[$services->service_id] = $services;
        $return[$services->service_id]->subs = $this->get_servicesub_categories($services->service_id); // Get the categories sub categories
    }

    return $return;
}


public function get_servicesub_categories($category_id)
{
    $this->db->where('parent_id', $category_id);
    $query = $this->db->get('service_sub_cat');
    return $query->result();
}



}