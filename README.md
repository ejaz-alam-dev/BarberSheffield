# Mage2 Module Barber Sheffield

    ``barber/module-sheffield``

 - [Main Functionalities](#markdown-header-main-functionalities)
 - [Installation](#markdown-header-installation)
 - [Configuration](#markdown-header-configuration)
 - [Specifications](#markdown-header-specifications)
 - [Attributes](#markdown-header-attributes)


## Main Functionalities
Sheffield Test Module

## Installation
\* = in production please use the `--keep-generated` option

### Type 1: Zip file

 - Unzip the zip file in `app/code/Barber`
 - Enable the module by running `php bin/magento module:enable Barber_Sheffield`
 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

 - Make the module available in a composer repository for example:
    - private repository `repo.magento.com`
    - public repository `packagist.org`
    - public github repository as vcs
 - Add the composer repository to the configuration by running `composer config repositories.repo.magento.com composer https://repo.magento.com/`
 - Install the module composer by running `composer require barber/module-sheffield`
 - enable the module by running `php bin/magento module:enable Barber_Sheffield`
 - apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`


## Configuration
 - enable_promotion (configurations/module_configs/enable_promotion)

 - promotion_message (configurations/module_configs/promotion_message)


## Specifications

 - Block
	- Promotion > promotion.phtml


## Attributes



