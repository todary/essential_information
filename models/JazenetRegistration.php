<?php

class JazenetRegistration extends My_Model
{

    protected $table_name = "jazenet_registration";
    protected $primary_key = "id";
    protected $meta_key = "meta_key";
    public $meta_key_value;
    public $group_id = 1;
    public $meta_value;

    public $meta_key_DB =['company_name','email','website','industry','landline_country_code',
                        'landline_number','mobile_country_code','mobile_number','country','state',
                        'city','suburb','street_name','property_no','building_name','appartment_no',
                        'logo_url','youtube_url',
                        ];
    protected $fields = array("group_id", "meta_value");


    public function __construct($id = -1)
    {
        if ($id != -1) {
            $this->group_id = $id;
            $result = $this->list_data_id();
        }
    }


    function list_data($additionWere='')
    {
        return $this->all_data($additionWere);
    }

    function update_data_with_meta($additionWere='')
    {
        return $this->editMetaKey($additionWere);
    }

    function delete_data()
    {
        return $this->delete();
    }

}
