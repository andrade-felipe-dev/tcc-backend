<?php

namespace App\UseCases\About;

use App\Models\About;

class AboutManager
{
    private About $about;

    public  function __construct()
    {
        $this->about = About::firstOrCreate();
    }

    public function getAbout()
    {
        return $this->about;
    }

    public function updateAbout(AboutDTO $data)
    {
        return app(UpdateAbout::class)->execute($this->about, $data);
    }
}
