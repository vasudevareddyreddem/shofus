<?php

class Category_m extends MY_Model {

    public $belongs_to     = array('parent_category' => array('model' => 'Category_m', 'primary_key' => 'parent_id'));
    public $has_many       = array(
        'sub_categories' => array('model' => 'Category_m', 'primary_key' => 'parent_id'),
        'cards' => array('model' => 'Card_m', 'primary_key' => 'sub_category_id'),
        );
    public $before_create  = array('created_at', 'updated_at','slug');
    public $before_update  = array('updated_at','slug');
    protected $soft_delete = TRUE;

    public function get_new() {
        $columns  = $this->fields();
        $category = new stdClass();
        foreach ($columns as $key => $value) {
            $category->{$value} = null;
        }
        return $category;
    }

    protected function slug($data) {
        $data['slug'] = slug($data['category_name'],'-');
        return $data;
    }

}
