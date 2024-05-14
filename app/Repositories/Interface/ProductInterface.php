<?php
namespace App\Repositories\Interface;

interface ProductInterface{

    public function all();

    public function store(array $data);

    public function get($slug);

    public function update(array $data,$slug);

    public function delete($slug);

    public function statusChange(array $data);
}
