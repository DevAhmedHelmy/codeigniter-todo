<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------


    public $login = [
        'email' => [
            'rules' => 'required',
            'errors' => [
                'required' => '{field} is required',
            ]
        ],
        'password' => [
            'rules' => 'required',
            'errors' => [
                'required' => '{field} is required',
            ]
        ]
    ];

    public $signup = [
        'name' => [
            'rules' => 'required',
            'errors' => [
                'required' => '{field} is required',
            ]
        ],
        'email' => [
            'rules' => 'required',
            'errors' => [
                'required' => '{field} is required',
            ]
        ],
        'password' => [

            'rules' => 'required',
            'errors' => [
                'required' => '{field} is required',
            ]
        ],
        'passconf' => [
            'rules' => 'required|matches[password]',
            'errors' => [
                'required' => '{field} is required',
            ]
        ]
    ];
}
