<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class RAST_DB_postgre_utility extends RAST_DB_utility {

	protected $_list_databases	= 'SELECT datname FROM pg_database';
	protected $_optimize_table	= 'REINDEX TABLE %s';

	protected function _backup($params = array())
	{
		return $this->db->display_error('db_unsupported_feature');
	}
}
