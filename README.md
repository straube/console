Console
=======

Foundation project for Symfony Console application.

The advantage of using this project as a start for your own projects is that it has a CommandMapper that loads all 
command classes within a specific dir.

## Installation

1. Clone this repository.
2. Run `composer install` to install the required resources.

## Basic usage

Run `php app.php list` from command line.

There is a **Demo** command inside `src/App/Command` dir. You can use it as base for your own commands.

If you create a new namespace for your commands - what you'll probably do - remember to update `composer.json` file to 
load your new namespace and `app.php` to look for your commands at the right place.
