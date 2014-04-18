# PeacHPope Static Site Bundle

Site: [https://github.com/PeacHPope/StaticSiteBundle](https://github.com/PeacHPope/StaticSiteBundle)

## Installation

### Composer

Add static-site-bundle to your composer.json

    {
        "require": {
                "peachpope/static-site-bundle": "dev-master"
        }
    }

Next run a composer update

    $ php composer.phar update peachpope/static-site-bundle

### AppKernel

Add PeachpopeStaticSiteBundle to the app/AppKernel.php file.

    class AppKernel extends Kernel
    {
        public function registerBundles()
        {
            $bundles = array(
                // ...
                new PeacHPope\Web\StaticSiteBundle\PeachpopeStaticSiteBundle(),
            )
        }
    }

## Configuration

In the config.yml file add a section for **peachpope_static_site** followed by the two options of **bundle** and **folder**.
The **bundle** would be the bundle shortname housing the twig files. **Folder** would be the specific folder (located
under Resources/views) where the static content lives. These default to the PeacHPope StaticSite Bundle.

### Example:

Accepting defaults:

    peachpope_static_site:
        bundle: ~
        folder: ~

Using Acme Bundle
    peachpope_static_site:
        bundle: AcmeWebBundle
        folder: Homepage

Given the Acme example this defines that the twig web content lives in AcmeWebBundle\Resources\views\Homepage.

