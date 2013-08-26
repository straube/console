Base Command
============

A base project grounded on Command component from Symfony2.

## Installation

Installation is quick:

1. Clone the source from this repository;
2. Run `composer install` to install the required resources.

## Basic usage

Run `php app/console list` from command line.

There is a **Demo** command inside `src/Acme/Demo` dir. You can use it as base for your own commands.

If you create a new namespace for your commands - what you'll probably do - remember to update `composer.json` file to load your new namespace and `app/console`to look for your commands in the right place.
