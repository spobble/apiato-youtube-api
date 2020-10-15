<?php

namespace App\Containers\YoutubeApi\Data\Transporters;

use App\Ship\Parents\Transporters\Transporter;

class InputVideoTransporter extends Transporter
{

    /**
     * @var array
     */
    protected $schema = [
        'type' => 'object',
        'properties' => [
            'title',
            'description',
            'date',
            'informations',
            'categoryId'
        ],
        'required' => [
            'title',
            'date',
            'informations'
        ],
        'default' => [
            // provide default values for specific properties here
        ]
    ];
}
