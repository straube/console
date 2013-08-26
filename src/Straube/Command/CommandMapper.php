<?php

namespace Straube\Command;

use Symfony\Component\Console\Application;
use Symfony\Component\Finder\Finder;

/**
 * The command mapper.
 *
 * @author Gustavo Straube <gustavo@codekings.com.br>
 * @since 0.1
 */
class CommandMapper
{

    /**
     *
     * @var string 
     */
    private $basePath;
    
    /**
     *
     * @var string
     */
    private $namespace;

    /**
     * 
     * @param string $basePath
     * @param string $namespace
     */
    public function __construct($basePath, $namespace)
    {
        $this->basePath = rtrim($basePath, '/').'/';
        $this->namespace = $namespace;
    }

    /**
     * The namespace.
     *
     * @return string
     */
    public function getNamespace()
    {
        return $this->namespace;
    }

    /**
     * The path (dirname).
     *
     * @return string
     */
    public function getPath()
    {
        return $this->basePath.str_replace('\\', '/', $this->namespace).'/';
    }

    /**
     * Register commands associated to this path.
     *
     * @param \Symfony\Component\Console\Application $application
     */
    public function registerCommands(Application $application)
    {
        $finder = new Finder();
        $finder->files()->name('*Command.php')->in($this->getPath());
        $prefix = $this->getNamespace();
        foreach ($finder as $file) {
            $ns = $prefix;
            if (null !== ($relativePath = $file->getRelativePath())) {
                $ns .= '\\'.strtr($relativePath, '/', '\\');
            }
            $r = new \ReflectionClass(rtrim($ns, '\\').'\\'.$file->getBasename('.php'));
            if ($r->isSubclassOf('Symfony\\Component\\Console\\Command\\Command')
                    && !$r->isAbstract()
                    && !$r->getConstructor()->getNumberOfRequiredParameters()) {
                $application->add($r->newInstance());
            }
        }
    }

}
