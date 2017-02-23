<?php
/*
 * WellCommerce Open-Source E-Commerce Platform
 *
 * This file is part of the WellCommerce package.
 *
 * (c) Adam Piotrowski <adam@wellcommerce.org>
 *
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;

/**
 * Class AppKernel
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = [
            new \Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new \Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new \Symfony\Bundle\TwigBundle\TwigBundle(),
            new \Symfony\Bundle\MonologBundle\MonologBundle(),
            new \Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new \Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new \Doctrine\Bundle\DoctrineCacheBundle\DoctrineCacheBundle(),
            new \Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle(),
            new \Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(),
            new \Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new \FOS\JsRoutingBundle\FOSJsRoutingBundle(),
            new \Bazinga\Bundle\JsTranslationBundle\BazingaJsTranslationBundle(),
            new \Liip\ImagineBundle\LiipImagineBundle(),
            new \Knp\DoctrineBehaviors\Bundle\DoctrineBehaviorsBundle(),
            new \Cache\AdapterBundle\CacheAdapterBundle(),
            new \EmanueleMinotto\TwigCacheBundle\TwigCacheBundle(),
            new \WellCommerce\Bundle\ApiBundle\WellCommerceApiBundle(),
            new \WellCommerce\Bundle\AppBundle\WellCommerceAppBundle(),
            new \WellCommerce\Bundle\CoreBundle\WellCommerceCoreBundle(),
            new \WellCommerce\Bundle\SearchBundle\WellCommerceSearchBundle(),
            new \WellCommerce\Bundle\GeneratorBundle\WellCommerceGeneratorBundle(),
            new \WellCommerce\Bundle\OrderBundle\WellCommerceOrderBundle(),
            new \WellCommerce\Bundle\CatalogBundle\WellCommerceCatalogBundle(),
            new \WellCommerce\Bundle\CouponBundle\WellCommerceCouponBundle(),
            new \WellCommerce\Bundle\OAuthBundle\WellCommerceOAuthBundle(),
            new \WellCommerce\Bundle\CmsBundle\WellCommerceCmsBundle(),
            new \WellCommerce\Bundle\ReviewBundle\WellCommerceReviewBundle(),
            new \WellCommerce\Bundle\RoutingBundle\WellCommerceRoutingBundle(),
            new \WellCommerce\Bundle\ShowcaseBundle\WellCommerceShowcaseBundle(),
            new \WellCommerce\Bundle\WishlistBundle\WellCommerceWishlistBundle(),
        ];
        
        if (in_array($this->getEnvironment(), ['dev', 'test'])) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();

            if ($this->getEnvironment() === 'test') {
                $bundles[] = new \DAMA\DoctrineTestBundle\DAMADoctrineTestBundle();
            }
        }
        
        return $bundles;
    }
    
    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir() . '/config/config_' . $this->getEnvironment() . '.yml');
    }
}
