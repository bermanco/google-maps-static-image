<?php

namespace bermanco\GoogleMapsStaticImage;

class GoogleMapsStaticImage {

	protected $address_1;
	protected $address_2;
	protected $city;
	protected $state;
	protected $zip;
	protected $api_key;
	protected $size = '600x300';
	protected $type = 'roadmap';
	protected $marker_color = 'red';
	protected $zoom = '15';

	const BASE_URL = 'https://maps.googleapis.com/maps/api/staticmap';

	public function set_address_1($address_1){
		$this->address_1 = $address_1;
	}

	public function set_address_2($address_2){
		$this->address_2 = $address_2;
	}

	public function set_city($city){
		$this->city = $city;
	}

	public function set_state($state){
		$this->state = $state;
	}

	public function set_zip($zip){
		$this->zip = $zip;
	}

	public function set_api_key($api_key){
		$this->api_key = $api_key;
	}

	public function set_size($size){
		$this->size = $size;
	}

	public function set_type($type){
		$this->type = $type;
	}

	public function set_zoom($zoom){
		$this->zoom = $zoom;
	}

	public function set_marker_color($marker_color){
		$this->marker_color = $marker_color;
	}

	public function get_map_image(){

		$base = self::BASE_URL;

		$params = array();

		if ($this->api_key){
			$params['key'] = $this->api_key;
		}

		if ($this->size){
			$params['size'] = $this->size;
		}

		if ($this->type){
			$params['type'] = $this->type;
		}

		if ($this->get_address_string()){
			$params['center'] = $this->get_address_string();
			$params['markers'] = $this->get_marker_string();
		}

		if ($this->zoom){
			$params['zoom'] = $this->zoom;
		}

		if ($params){
			$query_string = http_build_query($params);
			return "$base?$query_string";
		}

	}

	///////////////
	// Protected //
	///////////////

	protected function get_marker_string(){

		$parts = array();

		$parts[] = "color:" . $this->marker_color;
		$parts[] = $this->get_address_string();

		return implode('|', $parts);

	}

	protected function get_address_string(){

		$parts = array();

		if ($this->address_1){
			$parts[] = $this->address_1;
		}

		if ($this->address_2){
			$parts[] = $this->address_2;
		}

		if ($this->city){
			$parts[] = $this->city;
		}

		if ($this->state){
			$parts[] = $this->state;
		}

		if ($this->zip){
			$parts[] = $this->zip;
		}

		if ($parts){
			return implode(',', $parts);
		}

	}

	// Aliases
	
	/**
	 * Creating this alias so code that uses the old method name won't break.
	 * */
	public function size($size){
		$this->set_size($size);
	}

}


