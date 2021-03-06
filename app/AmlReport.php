<?php

namespace App;


class AmlReport extends AppModel 
{
	protected $table = 'aml_report';
	
	protected $fillable = [
	        'mini_quest_id', 'store_id', 'initiator_id', 'responsible_id',
	        'client_id', 'first_name', 'middle_name', 'last_name', 'birth_date', 
	        'citizenship_id', 'passport_series', 'passport_number', 'passport_issued_date',
	        'passport_issued_by', 'passport_subdivision_code',
	        'inn', 'registration_address', 'residence_address',
	        'migration_series', 'migration_number', 'migration_stay_from', 'migration_stay_to',
	        'permission_series', 'permission_number', 'permission_stay_from', 'permission_stay_to',
	        'questionnaire', 'status', 'check_number', 'check_date', 'qty', 'amount', 'amount_no_disc', 'sales_id'
	];
	
	public function __construct(array $attributes = [])
	{
	    parent::__construct($attributes);
	    
	    $this->casts['questionnaire'] = 'json';
	}
	
	public function miniQuest()
	{
	    return $this->belongsTo('App\AmlMini', 'mini_quest_id');
	}
	public function store()
	{
	    return $this->belongsTo('App\Store')->withDefault(['name' => '---']);
	}
	
	public function initiator()
	{
	    return $this->belongsTo('App\Employee')->withDefault(['name' => '---']);
	}

	public function responsible()
	{
	    return $this->belongsTo('App\Employee')->withDefault(['name' => '---']);
	}
	
	public function client()
	{
	    return $this->belongsTo('App\Client')->withDefault(['name' => '---']);
	}
	
	public function citizenship()
	{
	    return $this->belongsTo('App\Country')->withDefault(['name' => '---']);
	}
	
	public function status()
	{
	    $model = new \App\AmlReportStatus();
	    return $model->find($this->status);
	}
	
}
