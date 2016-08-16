<?php

namespace App;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Post extends Eloquent {

    protected $connection = 'mongodb';
    protected $collection = 'posts';
    protected $fillable = ['_id', 'title', 'description'];

    public function getId() {
        return (string) $this->_id;
    }

}
