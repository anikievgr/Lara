<?php

namespace App\Services\serch;

interface SearchInterface
{
    public function search($request, $status);
    public function searchUser($request, $status);
    public function delivered($request, $status);
}
