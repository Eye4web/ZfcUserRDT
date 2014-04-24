ZfcUserRDT
=======

Introduction
------------

This module adds debug information from ZfcUser to RoaveDeveloperTools.

Dependencies
------------

- [ZfcUser](https://github.com/ZF-Commons/ZfcUser)
- [RoaveDeveloperTools](https://github.com/Roave/RoaveDeveloperTools)

Installation
------------

### Main Setup

#### With composer

1. Add this project in your composer.json:

    ```json
    "require": {
        "eye4web/zfc-user-rdt": "dev-master"
    }
    ```

2. Now tell composer to download ZfcUserRDT by running the command:

    ```bash
    $ php composer.phar update
    ```

#### Post installation

1. Enable it in your `application.config.php` file after RoaveDeveloperTools

    ```php
    <?php
    return array(
        'modules' => array(
            // ...
            'Roave\DeveloperTools',
            'Eye4web\ZfcUserRDT',
        ),
        // ...
    );
    ```