<?php
require_once(__DIR__ . '/../seearch.php');

class searchDao {
    private $db;
    private search $search;

    public function __construct() {
        $this->db = new Database();
        $this->search = new search();
    }


}