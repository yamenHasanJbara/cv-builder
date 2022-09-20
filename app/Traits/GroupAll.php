<?php


namespace App\Traits;

trait GroupAll
{
    use JSONResponse, ApiResponse;

    public function setConstruct($resource)
    {
        $this->setResource($resource);
    }

}
