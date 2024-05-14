<?php
namespace App\Repositories\Interface;

interface ColorInterface{

    public function all();

    public function store(array $data);

    public function get($slug);

    public function update(array $data,$id);

    public function delete($id);

}
