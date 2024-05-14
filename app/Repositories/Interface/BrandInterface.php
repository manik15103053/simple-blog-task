<?php
namespace App\Repositories\Interface;

interface BrandInterface{

    public function all();

    public function store(array $data);

    public function get($slug);

    public function update(array $data,$slug);

    public function delete($slug);

    public function statusChange(array $data);
}
