<?php
namespace libs;

class facebook extends \Facebook\Facebook{
    public function __construct(){
        parent::__construct([
            'app_id' => '1651604578442142',
            'app_secret' => '2d85d908282ee449d789db9bc999e782',
            'default_graph_version' => 'v2.2',
        ]);
    }
}
