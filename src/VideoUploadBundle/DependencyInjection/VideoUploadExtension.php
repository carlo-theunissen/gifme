<?php
namespace VideoUploadBundle\DependencyInjection;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;

class VideoUploadExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
        $container->setParameter( 'video_upload.ffprobe_command', $config[ 'ffprobe_command' ] );
        $container->setParameter( 'video_upload.accepted_formats', $config[ 'accepted_formats' ] );

        $loader = new YamlFileLoader(
			$container,
			new FileLocator(__DIR__.'/../Resources/config')
		);
		$loader->load('services.yml');
    }
}
