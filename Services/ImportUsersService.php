<?php

namespace Services;

class ImportUsersService
{
    public function importCSV()
    {
        $config = require(__DIR__.'/../config.php');

        $database = new \Services\Database($config);

    }

}
