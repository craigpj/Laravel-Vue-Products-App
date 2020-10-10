<?php

namespace App\Utility;

class Utility
{
    /**
     * Get API details
     */
    public static function getAPIDetails()
    {
        return [
            'application' => 'Laravue Test',
            'version' => '1.0.0',
            'author_name' => 'Craig Johnson',
            'author_email' => 'craigpj@gmail.com'
        ];

    }
}