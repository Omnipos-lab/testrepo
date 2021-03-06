<?php

namespace App;


class Client extends AppModel 
{
	protected $table = 'client';
	
	protected $fillable = [
	        'code', 'first_name', 'middle_name', 'last_name', 'first_name_lat', 'last_name_lat',
	        'gender', 'comment', 'phone', 'email', 'bd_day', 'bd_month', 'bd_year', 'birth_place',
	        'time_zone_id', 'country_id', 'postcode', 'city', 'address', 'citizenship_id', 'passport_series',
	        'passport_number', 'passport_issued_date', 'passport_issued_by', 'passport_subdivision_code', 'inn',
	        'registration_address', 'discount', 'discount_auto_calc', 'postal_opt_in', 'voice_opt_in',
	        'email_opt_in', 'msg_opt_in', 'consent_file', 'consent_signed', 'sent_welcome', 'sent_welcome_date',
	        'employee_id', 'responsible_id', 'created_employee_id', 'created_store_id', 'attached_store_id'
	];
	
	
	public function country()
	{
	    return $this->belongsTo('App\Country')->withDefault();
	}
	
	public function citizenship()
	{
	    return $this->belongsTo('App\Country')->withDefault();
	}
	
	public function timeZone()
	{
	    return $this->belongsTo('App\TimeZone', 'time_zone_id')->withDefault();
	}
	
	public function employee()
	{
	    return $this->belongsTo('App\Employee')->withDefault();
	}
	
	public function responsible()
	{
	    return $this->belongsTo('App\Employee')->withDefault();
	}
	
	public function createdEmployee()
	{
	    return $this->belongsTo('App\Employee', 'created_employee_id')->withDefault();
	}
	
	public function createdStore()
	{
	    return $this->belongsTo('App\Store', 'created_store_id')->withDefault();
	}
	
	public function attachedStore()
	{
	    return $this->belongsTo('App\Store', 'attached_store_id')->withDefault();
	}
	
	/*
	public function createdBy()
	{
	    return $this->belongsTo('App\User', 'created_by');
	}

	public function modifiedBy()
	{
	    return $this->belongsTo('App\User', 'modified_by');
	}
	*/
	
}
